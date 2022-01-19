<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('role.index',[
            'roles' => Role::all(),
            'title' => 'Halaman Role'
        ]);
    }

    public function create()
    {
        return view('role.create', [
            'title' => 'Buat Role'
        ]);
    }
}
