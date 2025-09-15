<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;

class RoleController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            'auth',
            'role_or_permission:Admin|create-role|edit-role|delete-role',
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index', [
            'roles'=> Role::with('permissions')->orderBy('id', 'DESC')->paginate(3), 'title'=>"All roles"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
