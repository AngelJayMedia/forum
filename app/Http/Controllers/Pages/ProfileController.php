<?php

namespace App\Http\Controllers\Pages;

use App\Models\User;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function show(User $user): View {
        return view('pages.profiles.show', compact('user'));
    }
}
