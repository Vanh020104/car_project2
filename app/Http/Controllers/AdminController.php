<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function homeAdmin() {
        return view("admin.pages.homeAdmin");
    }
}
