<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class ReservationModel extends AdminModel
{
    public function __construct()
    {
        $this->controllerName      = 'reservation';
        $this->table               = 'reservation';
        $this->folderUpload        = 'reservation';
        $this->fieldSearchAccepted = ['id', 'fullname', 'phone', 'code'];
        $this->crudNotAccepted     = ['_token', 'id'];
    }

    public function listItems($params = null, $options = null)
    {

        $result = null;
        if ($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'code', 'fullname', 'email', 'phone', 'status', 'note', 'check_in', 'check_out', 'room_name', 'room_id', 'price', 'created', 'created_by', 'modified', 'modified_by');
            // Filter by status
            if ($params['filter']['status'] !== "all") {
                $query->where('status', '=', $params['filter']['status']);
            }
            // Filter by date
            if (!empty($params['filter']['date'])) {
                if ($params['filter']['date'] === "today") {
                    $query->whereDate('created', Carbon::today());
                }
                if ($params['filter']['date'] === "yesterday") {
                    $query->whereDate('created', Carbon::yesterday());
                }
                if ($params['filter']['date'] === "this_week") {
                    $query->whereBetween('created', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                }
                if ($params['filter']['date'] === "this_month") {
                    $query->whereMonth('created', Carbon::now()->month);
                }
                if ($params['filter']['date'] === "last_month") {
                    $query->whereMonth('created', Carbon::now()->subMonth()->month);
                }
            }
            // Filter by room
            if (!empty($params['filter']['room']) && $params['filter']['room'] !== "all") {
                $query->where('room_id', '=', $params['filter']['room']);
            }
            // Filter by value
            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%");
                }
            }

            $result =  $query->orderBy('created', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);
        }
        if ($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name', 'description', 'link', 'thumb')
                ->where('status', '=', 'active')
                ->limit(5);

            $result = $query->get()->toArray();
        }
        return $result;
    }
    public function checkAvaibleRoom($params = null, $options  = null)
    {
        $result = null;

        $query = DB::table('product as p')
            ->leftJoin("$this->table as r", 'p.id', '=', 'r.room_id')
            ->select('p.id')->distinct();
        if ($options['task'] == 'check-avaiable-roomID') {
            $query->where('p.id', $params['room_id']);
        }
        $query->whereNotIn('p.id', DB::table("$this->table as r")->select('r.room_id')
            ->where(function ($query) use ($params) {
                $query->where('r.check_in', '<=', $params['check_in'])
                    ->where('r.check_out', '>=', $params['check_in']);
            })->orWhere(function ($query) use ($params) {
                $query->where('r.check_in', '<=', $params['check_out'])
                    ->where('r.check_out', '>=', $params['check_out']);
            })->orWhere(function ($query) use ($params) {
                $query->where('r.check_in', '>=', $params['check_in'])
                    ->where('r.check_out', '<', $params['check_out']);
            }));
        $result = $query->pluck('id');
        return $result;
    }
    public function countItems($params = null, $options  = null)
    {

        $result = null;

        if ($options['task'] == 'admin-count-items-group-by-status') {

            $query = $this::groupBy('status')
                ->select(DB::raw('status , COUNT(id) as count'));

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%");
                }
            }

            $result = $query->get()->toArray();
        }
        if ($options['task'] == 'admin-count-items') {
            $query = $this->select(DB::raw('COUNT(id) as count'))->where('id', '>=', 0);
            $result = $query->get()->toArray();
        }
        return $result;
    }

    public function getItem($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'get-item') {
            $result = self::select('id', 'name', 'description', 'status', 'link', 'thumb')->where('id', $params['id'])->first();
        }

        if ($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null)
    {
        if ($options['task'] == 'change-type-booking') {
            $typeBooking = $params['currentType'];
            $update = self::where('id', $params['id'])->update(['status' => $typeBooking]);
            if ($update) $typeMessage = true;
            else $typeMessage = false;
            $result = [
                'id'          => $params['id'],
                'typeBooking' => $typeBooking,
                'link'        => route($this->controllerName . '/changeTypeBooking', ['status' => $typeBooking, 'id' => $params['id']]),
                'typeMessage' => $typeMessage,
                'message'     => ($typeMessage == true) ? Config::get('zvn.config.message.success') : Config::get('zvn.config.message.error'),
            ];
            return $result;
        }
        if ($options['task'] == 'change-room') {
            $room_id = $params["currentRoomId"];
            $update =  self::where('id', $params['id'])->update(['room_id' => $room_id]);
            if ($update) $typeMessage = true;
            else $typeMessage = false;
            $result = [
                'id'          => $params['id'],
                'room_id'     => $room_id,
                'link'        => route($this->controllerName . '/changeRoom', ['room_id' => $room_id, 'id' => $params['id']]),
                'typeMessage' => $typeMessage,
                'message'     => ($typeMessage == true) ? Config::get('zvn.config.message.success') : Config::get('zvn.config.message.error'),
            ];
            return $result;
        }
        if ($options['task'] == 'add-item') {
            $params['created']   = date('Y-m-d H:i:s');
            $params['check_in']  = date('Y-m-d', strtotime($params['check_in']));
            $params['check_out'] = date('Y-m-d', strtotime($params['check_out']));
            $params['status']    = 'booked';
            self::insert($this->prepareParams($params));
        }

        if ($options['task'] == 'edit-item') {
            $params['modified_by']   = session()->get('userInfo')['username'];
            $params['modified']      = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            self::where('id', $params['id'])->delete();
        }
    }
}
