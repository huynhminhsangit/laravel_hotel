<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ContactModel;
use App\Models\DashboardModel as MainModel;
class DashboardController extends Controller
{
    private $pathViewController = 'admin.pages.dashboard.';
    private $controllerName = 'dashboard';
    public function __construct()
    {
        view()->share('controllerName',$this->controllerName);
        $this->model = new MainModel();
    }
    public function index()
    {
        $countItems = $this->model->countItems();
        $countContact = DB::table('contact')->whereRaw('DATE(created)=CURDATE()')->count();
        $contactModel = new ContactModel();
        $itemsContact = $contactModel->listItems(null, ['task' => 'admin-list-items-in-dashboard-page']);
        $titlePage = 'Thống kê';
        return view($this->pathViewController.'index',compact('countItems','countContact','itemsContact', 'titlePage'));
    }
}
