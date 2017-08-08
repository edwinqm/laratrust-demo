<?php

namespace App\Http\Controllers;

use App\DataTables\PermissionsDataTable;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function index(PermissionsDataTable $dataTable)
    {
        return $dataTable->render('permissions.index');
    }
}
