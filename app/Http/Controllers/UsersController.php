<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index(User $user){
        $products=$user->products;
        return view('user.profile', compact('user','products'));
    }

}
