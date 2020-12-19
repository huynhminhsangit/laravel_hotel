<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class ReviewModel extends AdminModel
{
    public function __construct()
    {
        $this->controllerName      = 'review';
        $this->table               = 'review';
        $this->folderUpload        = 'review';
        $this->fieldSearchAccepted = ['id', 'name', 'content'];
        $this->crudNotAccepted     = ['_token','thumb_current'];
    }

    public function listItems($params = null, $options = null)
    {

        $result = null;
        if ($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'status', 'ordering','star' ,'name', 'content','created', 'created_by', 'modified', 'modified_by','product_id','thumb');

            if ($params['filter']['status'] !== "all") {
                $query->where('status', '=', $params['filter']['status']);
            }
            if($params['filter']['product'] !== "all") {
                $query->where('product_id','=',$params['filter']['product']);
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
        if ($options['task'] == 'news-list-items-section-review-home-page') {
            $query = $this->select('id', 'name', 'content', 'star', 'thumb')
                ->orderBy('created', 'desc')
                ->where('status', 'active')
                ->where('star', '>=', '4')
                ->limit(10);
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
            $result = self::select('id','star' ,'status', 'ordering', 'name', 'content','product_id','thumb')->where('id', $params['id'])->first();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null)
    {
        if ($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
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

        if ($options['task'] == 'change-ordering') {
            $ordering = $params['currentOrdering'];
            $typeMessage = false;
            if(!is_numeric($params['currentOrdering'])) {
                $result = [
                    'typeMessage' => $typeMessage,
                    'link'        => route($this->controllerName),
                    'message'     => Config::get('zvn.config.message.error'),
                ];
            }else{
                $typeMessage = true;
                $update = self::where('id', $params['id'])->update(['ordering' => $ordering]);
                $result = [
                    'id'          => $params['id'],
                    'ordering'    => $ordering,
                    'link'        => route($this->controllerName . '/ordering', ['ordering' => $ordering, 'id' => $params['id']]),
                    'typeMessage' => $typeMessage,
                    'message'     => ($typeMessage == true) ? Config::get('zvn.config.message.success') : Config::get('zvn.config.message.error'),
                ];
            }
            return $result;
        }

        if ($options['task'] == 'change-product') {
            $update = self::where('id', $params['id'])->update(['product_id' => $params['product_id']]);
            if ($update) $typeMessage = true;
            else $typeMessage = false;
            $result = [
                'id'          => $params['id'],
                'typeMessage' => $typeMessage,
                'message'     => ($typeMessage == true) ? Config::get('zvn.config.message.success') : Config::get('zvn.config.message.error'),
            ];
            return $result;
        }
        if ($options['task'] == 'change-star') {
            $update = self::where('id', $params['id'])->update(['star' => $params['star']]);
            if ($update) $typeMessage = true;
            else $typeMessage = false;
            $result = [
                'id'          => $params['id'],
                'typeMessage' => $typeMessage,
                'message'     => ($typeMessage == true) ? Config::get('zvn.config.message.success') : Config::get('zvn.config.message.error'),
            ];
            return $result;
        }

        if ($options['task'] == 'add-item') {
            $params['created_by'] = session()->get('userInfo')['username'];
            $params['created']    = date('Y-m-d');
            $params['thumb']      = $this->uploadThumb($params['thumb']);
            self::insert($this->prepareParams($params));
        }

        if ($options['task'] == 'edit-item') {
            if (!empty($params['thumb'])) {
                $this->deleteThumb($params['thumb_current']);
                $params['thumb'] = $this->uploadThumb($params['thumb']);
            }
            $params['modified_by']   = session()->get('userInfo')['username'];
            $params['modified']      = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            $item   = self::getItem($params, ['task' => 'get-thumb']); //
            $this->deleteThumb($item['thumb']);
            self::where('id', $params['id'])->delete();
        }
    }
}
