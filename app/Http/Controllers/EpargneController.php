<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EpargneController extends Controller
{
    public function viewEpargnePage()
    {
        return view("dashboard/user/epargne");
    }
}
