<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::all(),
            'breadcrumbs' => ['User', 'Tambah Pengguna'],
            'title' => 'Pengguna'
        ]);
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    public function create()
    {
        $roles = Role::all();

        // dd($roles);
        return view('users.create', [
            'title' => 'Tambah',
            'roles' => $roles,
        ]);

    }

    protected function store(Request $request)
    {
        request()->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => 'required'
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'],),
            'address' => $request['address'],
        ]);

        $user->assignRole($request['roles']);
        return redirect()->route('users')->with('success', 'Pengguna berhasil ditambahkan');
    }
}
