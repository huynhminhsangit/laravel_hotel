<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class UserModel extends AdminModel
{
    public function __construct() {
        $this->controllerName      = 'user';
        $this->table               = 'user';
        $this->folderUpload        = 'user' ;
        $this->fieldSearchAccepted = ['id', 'username', 'email', 'fullname'];
        $this->crudNotAccepted     = ['_token','avatar_current', 'password_confirmation', 'task'];
    }

    public function listItems($params = null, $options = null) {

        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'username', 'email', 'fullname', 'avatar', 'status', 'level','created', 'created_by', 'modified', 'modified_by');

            if ($params['filter']['status'] !== "all")  {
                $query->where('status', '=', $params['filter']['status'] );
            }

            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%" );
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
                }
            }

            $result =  $query->orderBy('id', 'desc')
                            ->paginate($params['pagination']['totalItemsPerPage']);

        }



        return $result;
    }

    public function countItems($params = null, $options  = null) {

        $result = null;

        if($options['task'] == 'admin-count-items-group-by-status') {

            $query = $this::groupBy('status')
                        ->select( DB::raw('status , COUNT(id) as count') );

            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%" );
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
                }
            }

            $result = $query->get()->toArray();


        }
        if ($options['task'] == 'admin-count-items') {
            $query = $this->select(DB::raw('COUNT(id) as count'))->where('id','>=', 0);
            $result = $query->get()->toArray();
        }
        return $result;
    }

    public function getItem($params = null, $options = null) {
        $result = null;

        if($options['task'] == 'get-item') {
            $result = self::select('id', 'username', 'email', 'status', 'fullname', 'level', 'avatar')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'get-avatar') {
            $result = self::select('id', 'avatar')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'auth-login') {
            $result = self::select('id', 'username', 'fullname', 'email', 'level', 'avatar')
                    ->where('status', 'active')
                    ->where('email', $params['email'])
                    ->where('password', md5($params['password']) )->first();

            if($result) $result = $result->toArray();
        }
        if($options['task'] == 'current-password-of-id') {
            $result = self::select('password')
                    ->where('id', '=', $params['id'])
                    ->where('password', md5($params['current_password']) )->first();
                    // die('Function die is called!');
        }
        if($options['task'] == 'get-password') {
            $result = self::select('password')
                    ->where('id', '=', $params['id'])
                    ->first();
            if($result) $result = $result->toArray();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null) {
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

        if($options['task'] == 'add-item') {
            $params['created_by'] = session()->get('userInfo')['username'];
            $params['created']    = date('Y-m-d');
            $params['avatar']      = $this->uploadThumb($params['avatar']);
            $params['password']    = md5($params['password']);
            self::insert($this->prepareParams($params));
        }

        if($options['task'] == 'edit-item') {
            if(!empty($params['avatar'])){
                $this->deleteThumb($params['avatar_current']);
                $params['avatar'] = $this->uploadThumb($params['avatar']);
            }
            $params['modified_by']   = session()->get('userInfo')['username'];
            $params['modified']      = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }

        if($options['task'] == 'change-level') {
            $level  = $params['currentLevel'];
            $update = self::where('id', $params['id'])->update(['level' => $level]);
            if ($update) $typeMessage = true;
            else $typeMessage = false;
            $result = [
                'id'          => $params['id'],
                'level'       => $level,
                'link'        => route($this->controllerName . '/level', ['level' => $level, 'id' => $params['id']]),
                'typeMessage' => $typeMessage,
                'message'     => ($typeMessage == true) ? Config::get('zvn.config.message.success') : Config::get('zvn.config.message.error'),
            ];
            return $result;
        }

        if($options['task'] == 'change-level-post') {
            $level = $params['level'];
            self::where('id', $params['id'])->update(['level' => $level]);
        }

        if($options['task'] == 'change-password') {
            $password       = md5($params['new_password']);
            self::where('id', $params['id'])->update(['password' => $password]);
        }
    }

    public function deleteItem($params = null, $options = null)
    {
        if($options['task'] == 'delete-item') {
            $item   = self::getItem($params, ['task'=>'get-avatar']); //
            $this->deleteThumb($item['avatar']);
            self::where('id', $params['id'])->delete();
        }
    }

}

