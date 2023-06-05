<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function userDashboard(){
        $users = DB::select('select * from student_details');
        return view('user.user1',['users'=>$users]); 
    }
}
