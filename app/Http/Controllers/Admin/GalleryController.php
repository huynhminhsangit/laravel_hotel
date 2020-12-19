<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest as MainRequest;
use App\Models\GalleryModel as MainModel;
class GalleryController extends AdminController
{

    public function __construct()
    {
        $this->pathViewController = 'admin.pages.gallery.';
        $this->controllerName     = 'gallery';
        $this->model = new MainModel();
        parent::__construct();
        $this->titlePage = 'Thư viện hình ảnh - video';
    }
    public function picture(Request $request) {
        return view($this->pathViewController . "picture",[
            'titlePage' => $this->titlePage
        ]);
    }
    public function video(Request $request) {
        $item = $this->model->getItem(null,['task' => 'get-item']);
        return view($this->pathViewController . "video",[
            'item' => $item,
            'titlePage' => $this->titlePage
        ]);
    }
    public function save(MainRequest $request) {
        if ($request->method() == 'POST') {
            $params = $request->all();
                $task   = "edit-item";
                $notify = "Lưu Link Video Thành Công!";
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName.'/video')->with("zvn_notify", $notify);
        }
    }
}
