<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class ContactModel extends AdminModel
{
    public function __construct()
    {
        $this->controllerName      = 'contact';
        $this->table               = 'contact';
        $this->fieldSearchAccepted = ['id', 'name', 'link'];
        $this->crudNotAccepted     = ['_token', 'id'];
    }

    public function listItems($params = null, $options = null)
    {

        $result = null;
        if ($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'fullname', 'email', 'message', 'status', 'created', 'created_by', 'modified', 'modified_by');

            if ($params['filter']['status'] !== "all") {
                $query->where('status', '=', $params['filter']['status']);
            }

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
        if ($options['task'] == "admin-list-items-in-dashboard-page") {
            $query = $this->select('fullname', 'email', 'message', 'status', 'created');
            $result =  $query->where('status', 'pending')->orderBy('created', 'desc')->limit(5)
                ->get();
        }
        if ($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name', 'type_menu', 'type_open', 'link')
                ->orderBy('ordering', 'asc')
                ->where('status', '=', 'active');
            $result = $query->get()->toArray();
        }
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
            $result = self::select('id', 'fullname', 'email', 'message', 'status')->where('id', $params['id'])->first();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null)
    {
        if ($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "called") ? "pending" : "called";
            $update = self::where('id', $params['id'])->update(['status' => $status]);
            if ($update) $typeMessage = true;
            else $typeMessage = false;
            $result = [
                'id'          => $params['id'],
                'status'      => ['class' => Config::get("zvn.template.status.$status.class"), 'name'=>Config::get("zvn.template.status.$status.name")],
                'link'        => route($this->controllerName . '/status', ['status' => $status, 'id' => $params['id']]),
                'typeMessage' => $typeMessage,
                'message'     => ($typeMessage == true) ? Config::get('zvn.config.message.success') : Config::get('zvn.config.message.error'),
            ];
            return $result;
        }

        if ($options['task'] == 'add-item') {
            $params['created']    = date('Y-m-d H:i:s');
            $params['created_by'] = $params['email'];
            $params['status']     = 'pending';
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
