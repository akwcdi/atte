<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    public function attendance(Request $request)
    {if (Auth::check()) {
            // ログイン済みだったら勤怠管理画面を表示
            $items = User::all();
            $items = User::simplePaginate(5);
            return view('attendance', ['items' => $items]);

        } else {
            // ログインしていなかったらログイン画面を表示
            return view('auth/login');
        }

        
    }
}
