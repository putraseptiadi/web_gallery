<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramAdminController extends Controller
{
    public function index()
    {
        return view('admin.manage_program');
    }
}
