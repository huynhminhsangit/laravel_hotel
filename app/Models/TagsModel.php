<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class TagsModel extends AdminModel
{
    public function __construct()
    {
        $this->controllerName      = 'tags';
        $this->table               = 'tags';
        $this->fieldSearchAccepted = ['id', 'name'];
        $this->crudNotAccepted     = ['_token', 'id'];
    }

    public function listItems($params = null, $options = null)
    {

        $result = null;
        if ($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'name', 'status', 'created','created_by');

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
            $result =  $query->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);
        }
        $tagsID = [];
        foreach ($result as $key => $value) {
            $tagsID[] = $value['id'];

        }
        $countTags = [];
        foreach ($tagsID as $key => $value) {
            $countTags[$value] = DB::table('article')->whereJsonContains('tags_id',$value)->count();

        }
        $result->countTags = $countTags;
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
            $result = self::select('id', 'email', 'status', 'created')->where('id', $params['id'])->first();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null)
    {
        if ($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "contact") ? "uncontact" : "contact";
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
            date_default_timezone_set("Asia/Bangkok");
            $params['created']    = date('Y-m-d H:i:s');
            self::insert($this->prepareParams($params));
        }
    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            // Lỗi xóa tag tại table tags thì trong article không xóa tags_id
            self::where('id', $params['id'])->delete();
        }
    }
}
