<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;

class ErrorController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.errors.';
        parent::__construct();
    }
    public function notfound()
    {
        return view($this->pathViewController.'404');
    }
    public function fatal()
    {
        return view($this->pathViewController. '500');
    }
}
