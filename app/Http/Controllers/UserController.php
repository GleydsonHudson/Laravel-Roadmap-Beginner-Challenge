<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(): Factory|View|Application
    {
        $users = User::with('roles', 'permissions')->get();

        return view('backend.user.index', compact('users'));
    }
}
