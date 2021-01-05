<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class ArticleModel extends AdminModel
{
    public function __construct()
    {
        $this->controllerName      = 'article';
        $this->table               = 'article as a';
        $this->folderUpload        = 'article';
        $this->fieldSearchAccepted = ['name', 'content'];
        $this->crudNotAccepted     = ['_token', 'thumb_current','tags'];
    }

    public function listItems($params = null, $options = null)
    {

        $result = null;

        if ($options['task'] == "admin-list-items") {
            $query = $this->select('a.id', 'a.name', 'a.status', 'a.content', 'a.thumb', 'a.type', 'c.name as category_name')
                ->leftJoin('category_article as c', 'a.category_id', '=', 'c.id');


            if ($params['filter']['status'] !== "all") {
                $query->where('a.status', '=', $params['filter']['status']);
            }
            if($params['filter']['category'] !== "all") {
                $query->where('a.category_id','=',$params['filter']['category']);
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

        if ($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name', 'thumb')
                ->where('status', '=', 'active')
                ->limit(5);

            $result = $query->get()->toArray();
        }

        if ($options['task'] == 'news-list-items-featured') {

            $query = $this->select('a.id', 'a.name', 'a.content', 'a.created', 'a.category_id', 'c.name as category_name', 'a.thumb')
                ->leftJoin('category_article as c', 'a.category_id', '=', 'c.id')
                ->where('a.status', '=', 'active')
                ->where('a.type', 'featured')
                ->orderBy('a.id', 'desc')
                ->take(3);

            $result = $query->get()->toArray();
        }

        // if ($options['task'] == 'news-list-items-latest') {

        //     $query = $this->select('a.id', 'a.name', 'a.created', 'a.category_id', 'c.name as category_name', 'a.thumb')
        //         ->leftJoin('category_article as c', 'a.category_id', '=', 'c.id')
        //         ->where('a.status', '=', 'active')
        //         ->orderBy('id', 'desc')
        //         ->take(4);;
        //     $result = $query->get()->toArray();
        // }

        if ($options['task'] == 'news-list-items-in-category') {
            $query = $this->select('id', 'name', 'content', 'thumb', 'created')
                ->where('status', '=', 'active')
                ->where('category_id', '=', $params['category_id'])
                ->take(4);
            $result = $query->get()->toArray();
        }

        if ($options['task'] == 'news-list-items-related-in-category') {
            $query = $this->select('id', 'name', 'content', 'thumb', 'created')
                ->where('status', '=', 'active')
                ->where('a.id', '!=', $params['article_id'])
                ->where('category_id', '=', $params['category_id'])
                ->take(4);
            $result = $query->get()->toArray();
        }

        if ($options['task'] == 'news-list-items-latest') {
            $result = self::select('a.id', 'a.name', 'a.content', 'a.category_id', 'c.name as category_name', 'a.thumb', 'a.created', 'a.created_by','a.tags_id')->leftJoin('category_article as c', 'a.category_id', '=', 'c.id')
            ->where('a.status', '=', 'active')->orderBy('a.id', 'desc')
            ->paginate($params['pagination']['totalItemsPerPage']);
            if(!empty($result)) {
                foreach ($result as $key => $value) {
                    $result[$key]['tags_name'] = self::getTagsName($value['tags_id']);
                }
            }
        }
        if ($options['task'] == 'news-list-article-in-category') {
            $result = self::select('a.id', 'a.name', 'a.content', 'a.category_id', 'c.name as category_name', 'a.thumb', 'a.created', 'a.created_by','a.tags_id')->leftJoin('category_article as c', 'a.category_id', '=', 'c.id')
            ->where('a.status', '=', 'active')
            ->where('category_id',$params['category_id'])
            ->orderBy('a.id', 'desc')
            ->paginate($params['pagination']['totalItemsPerPage']);;
            if(!empty($result)) {
                foreach ($result as $key => $value) {
                    $result[$key]['tags_name'] = self::getTagsName($value['tags_id']);
                }
            }
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
            $query = $this->select(DB::raw('COUNT(id) as count'))->where('a.id','>=', 0);
            $result = $query->get()->toArray();
        }


        return $result;
    }

    public function getItem($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'get-item') {
            $result = self::select('id', 'name', 'content', 'status', 'thumb', 'meta_keyword','meta_description', 'category_id','tags_id')->where('id', $params['id'])->first();
        }

        if ($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        if ($options['task'] == 'news-get-item') {
            $result = self::select('a.id', 'a.name', 'content', 'a.category_id', 'c.name as category_name', 'a.thumb', 'a.created', 'a.created_by', 'c.display','a.tags_id')
                ->leftJoin('category_article as c', 'a.category_id', '=', 'c.id')
                ->where('a.id', '=', $params['article_id'])
                ->where('a.status', '=', 'active')->first();
            if ($result) $result = $result->toArray();
                $result['tags_name'] = self::getTagsName($result['tags_id']);

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
        if ($options['task'] == 'change-type') {
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
        if ($options['task'] == 'add-item') {
            $this->table = 'article';
            $params['tags_id']    = self::addTags($params);
            $params['created_by'] = session()->get('userInfo')['username'];
            $params['created']    = date('Y-m-d');
            $params['thumb']      = $this->uploadThumb($params['thumb']);
            self::insert($this->prepareParams($params));
        }
        if ($options['task'] == 'edit-item') {
            $params['tags_id']    = self::addTags($params);
            if (!empty($params['thumb'])) {
                $this->deleteThumb($params['thumb_current']); // Xóa hình cũ
                $params['thumb']      = $this->uploadThumb($params['thumb']);// Up hình mới
            }
            $params['modified_by']   = session()->get('userInfo')['username'];
            $params['modified']      = date('Y-m-d');
            self::where(['id' => $params['id']])->update($this->prepareParams($params));
        }
    }

    public function deleteItem($params = null, $options = null)
    {
        $this->table = 'article';
        if ($options['task'] == 'delete-item') {
            $item   = self::getItem($params, ['task' => 'get-thumb']);
            $this->deleteThumb($item['thumb']);
            self::where('id', $params['id'])->delete();
        }
    }
    public function addTags($params = null,$task = null) {
        if(!empty($params['tags'])) {
            foreach ($params['tags'] as $key => $value) {
                $existTags = DB::table('tags')->select()->where('name',$value)->get()->toArray();
                if(empty($existTags)) {
                    $params['tags_id'][] = DB::table('tags')->insertGetId([
                        'name'       => $value,
                        'created'    => date('Y-m-d'),
                        'created_by' => session()->get('userInfo')['username']
                        ]);
                } else {
                    $params['tags_id'][] = DB::table('tags')->where('name',$value)->first()->id;
                }
            }
            return json_encode($params['tags_id']);
        } else {
            return null;
        }
    }
    function getTagsName($params) {
        if(empty($params)) {
            return null;
        } else {
            $tmp = [];
            foreach (json_decode($params) as $key => $value) {
                $tmp[$value] = DB::table('tags')->where('id',$value)->first()->name;
            }
            return $tmp;
        }
    }
}
