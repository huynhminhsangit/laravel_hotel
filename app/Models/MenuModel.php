<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Kalnoy\Nestedset\NodeTrait;

class MenuModel extends AdminModel
{
    use NodeTrait;
    protected $fillable       = ['name', 'status', 'ordering', 'link', 'type_menu', 'type_open','created', 'created_by', 'modified', 'modified_by'];
    protected $table          = 'menu';
    public    $timestamps     = false;
    protected $controllerName = 'menu';
    public function listItems($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'name', 'status', 'ordering', 'link', 'type_menu', 'type_open','created', 'created_by', 'modified', 'modified_by');
            if ($params['filter']['status'] !== "all") {
                $query->where('status', '=', $params['filter']['status']);
            }
            $result =  $query->withDepth()->having('depth', '>', 0)->defaultOrder()->get()->toFlatTree()->toArray();
        }
        if ($options['task'] == 'admin-list-items-in-select-box') {
            $query = $this->select('id', 'name')
                ->withDepth()->defaultOrder();
            if (isset($params['id'])) {
                $node = self::find($params['id']);
                $query->where('_lft', '<', $node->_lft)->orWhere('_lft', '>', $node->_rgt);
            }
            $nodes = $query->get()->toFlatTree()->toArray();
            foreach ($nodes as $value) {
                $name = $value['name'];
                for ($i = 1; $i <= $value['depth']; $i++) {
                    $name = '|---- ' . $name;
                }
                $result[$value['id']] = $name;
            }
        }
        if ($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name', 'type_menu', 'type_open', 'link')
                ->orderBy('ordering', 'asc')
                ->where('status', '=', 'active')
                ->where('id', '>', 1);
            // $result = $query->get()->toArray();
            $result =  $query->withDepth()->having('depth', '>', 0)->defaultOrder()->get()->toFlatTree()->toArray();
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
            $result = self::select('id', 'name', 'status', 'ordering', 'link', 'type_menu', 'type_open', 'parent_id')->where('id', $params['id'])->first();
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

        if ($options['task'] == 'change-type-menu') {
            $typeMenu = $params['currentTypeMenu'];
            $update = self::where('id', $params['id'])->update(['type_menu' => $typeMenu]);
            if ($update) $typeMessage = true;
            else $typeMessage = false;
            $result = [
                'id'          => $params['id'],
                'typeMenu'    => $typeMenu,
                'link'        => route($this->controllerName . '/type_menu', ['typeMenu' => $typeMenu, 'id' => $params['id']]),
                'typeMessage' => $typeMessage,
                'message'     => ($typeMessage == true) ? Config::get('zvn.config.message.success') : Config::get('zvn.config.message.error'),
            ];
            return $result;
        }

        if ($options['task'] == 'change-type-open') {
            $typeOpen = $params['currentTypeOpen'];
            $update = self::where('id', $params['id'])->update(['type_open' => $typeOpen]);
            if ($update) $typeMessage = true;
            else $typeMessage = false;
            $result = [
                'id'          => $params['id'],
                'typeOpen'    => $typeOpen,
                'link'        => route($this->controllerName . '/type_open', ['typeOpen' => $typeOpen, 'id' => $params['id']]),
                'typeMessage' => $typeMessage,
                'message'     => ($typeMessage == true) ? Config::get('zvn.config.message.success') : Config::get('zvn.config.message.error'),
            ];
            return $result;
        }

        if ($options['task'] == 'add-item') {
            if (isset($params['parent_id']) && $params['parent_id'] !== null) {
                $params['created_by'] = session()->get('userInfo')['username'];
                $params['created']    = date('Y-m-d');
                $nodeParent = $this::find($params['parent_id']);
                $nodeParent->children()->create($this->prepareParams($params));
            }
        }

        if ($options['task'] == 'edit-item') {
            $params['modified_by'] = session()->get('userInfo')['username'];
            $params['modified']    = date('Y-m-d');
            $params['link']        = $params['link'];
            $nodeOld              = self::find($params['id']);
            $nodeOld->name        = $params['name'];
            $nodeOld->status      = $params['status'];
            $nodeOld->link        = $params['link'];
            $nodeOld->type_menu   = $params['type_menu'];
            $nodeOld->type_open   = $params['type_open'];
            $nodeOld->modified    = $params['modified'];
            $nodeOld->modified_by = $params['modified_by'];
            if ($params['parent_id'] == $nodeOld->parent_id) {
                $nodeOld->save();
            } else {
                $nodeNew = self::find($params['id']);
                $parent = self::find($params['parent_id']);
                $parent->appendNode($nodeNew);
            }
        }
    }
    public function ordering($params = null, $options = null)
    {
        $node = self::find($params['id']);
        if ($params['type'] == 'down') $node->down();
        if ($params['type'] == 'up') $node->up();
    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            self::where('id', $params['id'])->delete();
        }
    }
}
