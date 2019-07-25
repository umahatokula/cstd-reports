<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RolesController extends Controller
{
    public function getRoles() {
        $data['rolesMenue'] = 1;
        $data['roles'] = Role::all();

        return view('roles.index', $data);
    }
}
