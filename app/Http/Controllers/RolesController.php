<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class RolesController extends Controller
{
    public function index()
    {
        return view('roles.index');
    }

    public function data(Datatables $datatables)
    {
        $query = Role::with('permissions')
            ->select('roles.*');

        return $datatables->eloquent($query)
            ->addColumn('permission_name', function(Role $role){
                return $role->permissions->map(function($permission){
                    return $permission->name;
                })->implode(' | ');
            })
            ->make(true);
    }
}
