<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class HomeController extends Controller
{
    //

    // public function index()
    // {
    //     return view('home.userpage');
    // }

    public function redirect()
    {
        $role = Auth::user()->role;

        if($role == '1')
        {
            // $users = User::all();
            // $users = User::paginate(10);
            return view('admin.home');
        }
        else
        {
            // $users = User::paginate(10);
            return view('student.homeStu');
            // , ['users'=> $users]
        }

    }



}
