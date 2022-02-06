<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(): View
    {
        $users = User::with('roles', 'permissions')->paginate(10);

        return view('backend.user.index', compact('users'));
    }
}
