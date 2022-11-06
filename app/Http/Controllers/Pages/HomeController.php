<?php

namespace App\Http\Controllers\Pages;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
}
