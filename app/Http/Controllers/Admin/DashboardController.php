<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;

class DashboardController extends Controller
{
    public function __construct() {
        return $this->middleware([IsAdmin::class, Authenticate::class]);
    }

    public function index() {
        return view('admin.dashboard.index');
    }
}
