<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class ProductModel extends AdminModel
{

    public function __construct()
    {
        $this->controllerName      = 'product';
        $this->table               = 'product as a';
        $this->folderUpload        = 'product';
        $this->fieldSearchAccepted = ['name', 'content'];
        $this->crudNotAccepted     = [
            '_token', 'thumb_current', 'filename', 'document', 'alt',
             'attr', 'arrMeta',
            'id', 'selectGroupAttr'
        ];
    }

    public function listItems($params = null, $options = null)
    {

        $result = null;

        if ($options['task'] == "admin-list-items") {
            $query = $this->select('a.id', 'a.name', 'a.status', 'a.content', 'a.thumb', 'a.price', 'c.id as category_id')
                ->leftJoin('category_product as c', 'a.category_id', '=', 'c.id');


            if ($params['filter']['status'] !== "all") {
                $query->where('a.status', '=', $params['filter']['status']);
            }
            if ($params['filter']['category'] !== "all") {
                $query->where('a.category_id', '=', $params['filter']['category']);
            }

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere('a.' . $column, 'LIKE',  "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where('a.' . $params['search']['field'], 'LIKE',  "%{$params['search']['value']}%");
                }
            }

            $result =  $query->orderBy('a.id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);
        }

        if ($options['task'] == 'news-list-items-section-rooms') {
            $query = $this->select('id', 'name', 'thumb', 'price')
                ->where('status', '=', 'active')
                ->limit(6);
            $result = $query->get()->toArray();
        }
        if ($options['task'] == 'news-list-items-header-menu') {
            $query = $this->select('id', 'name')
                ->where('status', '=', 'active')
                ->limit(6);
            $result = $query->get()->toArray();
        }

        if ($options['task'] == 'news-list-items-featured') {

            $query = $this->select('a.id', 'a.name', 'a.content', 'a.created', 'a.category_id', 'c.name as category_name', 'a.thumb')
                ->leftJoin('category_product as c', 'a.category_id', '=', 'c.id')
                ->where('a.status', '=', 'active')
                ->where('a.type', 'featured')
                ->orderBy('a.id', 'desc')
                ->take(3);

            $result = $query->get()->toArray();
        }

        if ($options['task'] == 'news-list-items-latest') {

            $query = $this->select('a.id', 'a.name', 'a.created', 'a.category_id', 'c.name as category_name', 'a.thumb')
                ->leftJoin('category_product as c', 'a.category_id', '=', 'c.id')
                ->where('a.status', '=', 'active')
                ->orderBy('id', 'desc')
                ->take(4);;
            $result = $query->get()->toArray();
        }

        if ($options['task'] == 'news-list-items-in-category') {
            $query = $this->select('id', 'name', 'content', 'thumb', 'price')
                ->where('status', '=', 'active')
                ->where('category_id', '=', $params['category_id'])
                ->take(4);
            $result = $query->get()->toArray();
        }

        if ($options['task'] == 'admin-list-items-in-select-box-for-review' ||
        $options['task'] == 'admin-list-items-in-select-box-for-reservation') {
            $query = $this->select('id', 'name')
                ->orderBy('name', 'asc')
                ->where('status', '=', 'active');

            $result = $query->pluck('name', 'id')->toArray();
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
            $query = $this->select(DB::raw('COUNT(id) as count'))->where('a.id', '>=', 0);
            $result = $query->get()->toArray();
        }

        return $result;
    }

    public function getItem($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'get-item') {
            $result = self::select('id', 'name', 'slug', 'price', 'content', 'status', 'thumb', 'category_id','group_attribute_id','attribute','meta')->where('id', $params['id'])->first();
        }

        if ($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }
        if ($options['task'] == 'menu-list-item') {
            $result = self::select('id', 'name')->where('status','active')->get()->toArray();
        }
        if ($options['task'] == 'get-all-items') {
            $result = self::select('id','name','content','thumb','price','attribute')->where('status','active')->get()->toArray();
        }
        if ($options['task'] == 'news-get-item') {
            $result = self::select('a.id', 'a.name', 'content', 'a.category_id', 'c.name as category_name', 'a.thumb', 'a.created', 'a.price','a.attribute', 'a.meta')
                ->leftJoin('category_product as c', 'a.category_id', '=', 'c.id')
                ->where('a.id', '=', $params['product_id'])
                ->where('a.status', '=', 'active')->first();
            if ($result) $result = $result->toArray();
        }
        if ($options['task'] == 'get-other-item') {
            $result = self::select('id', 'name', 'content','thumb', 'created', 'price','attribute')
                ->where('id', '!=', $params['product_id'])
                ->where('status', '=', 'active')->limit(4)->get();
            if ($result) $result = $result->toArray();
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
                'status'      => ['class' => Config::get("zvn.template.status.$status.class"), 'name' => Config::get("zvn.template.status.$status.name")],
                'link'        => route($this->controllerName . '/status', ['status' => $status, 'id' => $params['id']]),
                'typeMessage' => $typeMessage,
                'message'     => ($typeMessage == true) ? Config::get('zvn.config.message.success') : Config::get('zvn.config.message.error'),
            ];
            return $result;
        }
        if ($options['task'] == 'change-type') {
            // featured or normal
            $type = $params["currentType"];
            $update =  self::where('id', $params['id'])->update(['type' => $type]);
            if ($update) $typeMessage = true;
            else $typeMessage = false;
            $result = [
                'id'          => $params['id'],
                'type'        => $type,
                'link'        => route($this->controllerName . '/type', ['type' => $type, 'id' => $params['id']]),
                'typeMessage' => $typeMessage,
                'message'     => ($typeMessage == true) ? Config::get('zvn.config.message.success') : Config::get('zvn.config.message.error'),
            ];
            return $result;
        }
        if ($options['task'] == 'change-category') {
            $category_id = $params["category_id"];
            $update =  self::where('id', $params['id'])->update(['category_id' => $category_id]);
            if ($update) $typeMessage = true;
            else $typeMessage = false;
            $result = [
                'id'          => $params['id'],
                'category_id'        => $category_id,
                'link'        => route($this->controllerName . '/changeCategory', ['category_id' => $category_id, 'id' => $params['id']]),
                'typeMessage' => $typeMessage,
                'message'     => ($typeMessage == true) ? Config::get('zvn.config.message.success') : Config::get('zvn.config.message.error'),
            ];
            return $result;
        }
        if ($options['task'] == 'add-item') {
            $params['created_by'] = session()->get('userInfo')['username'];
            $params['created']    = date('Y-m-d');
            $params['slug']       = $params['slug'];
            $this->table = 'product';
            self::insert($this->prepareParams($params));
        }
        if ($options['task'] == 'edit-item') {
            $params['modified_by'] = session()->get('userInfo')['username'];
            $params['modified']    = date('Y-m-d');
            $this->table = 'product';
            self::where(['id' => $params['id']])->update($this->prepareParams($params));
        }
    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            $this->table = 'product';
            $item   = self::getItem($params, ['task' => 'get-thumb']);
            $this->deleteThumb(json_decode($item['thumb'], true), 'multiple');
            self::where('id', $params['id'])->delete();
        }
    }
}
