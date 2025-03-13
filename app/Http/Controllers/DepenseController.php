<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepenseController extends Controller
{
    public function viewDepensePage()
    {
        return view('dashboard.user.depense');
    }
}
