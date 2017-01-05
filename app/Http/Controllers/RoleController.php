<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Role;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\CountValidator\Exception;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view ('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        Role::create($request->all());
        flash('Rol agregado exitosamente', 'success');
        return redirect ('admin/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        flash('Rol actualizado exitosamente', 'success');
        return redirect ('admin/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        flash('Rol eliminado exitosamente', 'success');
        return redirect('admin/roles');
    }

    public function roleAssignment()
    {
        $select_users = User::pluck('doc_id', 'id');
        $select_roles = Role::pluck('name', 'id');

        $users = User::all();

        return view ('admin.roles.assignment', compact('select_users', 'select_roles', 'users'));
    }

    public function roleAttachment(Request $request)
    {
        $user_id = $request->user;
        $role_id = $request->role;

        $user = User::findOrFail($user_id);
        $role = Role::findOrFail($role_id);

        try
        {
            $user->attachRole($role);
            flash('Rol asignado exitosamente', 'success');
        }
        catch(QueryException $e)
        {
            flash('Rol ya asignado', 'danger');
        }
        return redirect ('admin/roles/role-assignment');
    }

    public function roleDetachment(User $user, Role $role)
    {
        try
        {
            $user->detachRole($role);
            flash('Rol eliminado exitosamente', 'success');
        }
        catch(Exception $e)
        {
            flash('No se pudo realizar la acción', 'danger');
        }
        return redirect('admin/roles/role-assignment');
    }
}
