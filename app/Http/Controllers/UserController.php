<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function check()
    {
        //nanti bikin if nokk
        return view('user.dashboard.gformkuisoner.index');
    }
}
