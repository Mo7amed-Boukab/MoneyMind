<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function viewCategoriePage()
    {
        return view('dashboard.admin.categories');
    }
}
