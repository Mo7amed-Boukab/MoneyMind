<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RevenuController extends Controller
{
    public function viewRevenuPage()
    {
        return view('dashboard/user/revenu');
    }
}
