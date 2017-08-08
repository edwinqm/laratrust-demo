<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function data(Datatables $datatables)
    {
        $query = User::with('roles')
            ->select('users.*');

        return $datatables->eloquent($query)
            ->addColumn('role_name', function (User $user) {
                return $user->roles->map(function ($role) {
                    return str_limit($role->name, 5, '...');
                })->implode('<br>');
            })
            ->make(true);
    }
}
