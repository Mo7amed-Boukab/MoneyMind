<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{
     public function index() 
     {
          return view("dashboard/admin/index");
     }

     public function viewUsersPage()
     {
        return view('dashboard/admin/users');
     }  

}
