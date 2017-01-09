<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Role;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;
use PDOException;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try 
        {
            $roles = Role::all();
            return view('admin.roles.index', compact('roles'));
        }
        catch(QueryException $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('admin/roles');
        }
        catch(PDOException $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('admin/roles');
        }
        catch(Exception $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('admin/roles');
        }
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
        if (Auth::user()->hasRole('super_admin')) 
        {
            try 
            {
                Role::create($request->all());
                flash('Rol agregado exitosamente', 'success');
                return redirect('admin/roles');
            }
            catch(QueryException $e)
            {
                flash('Rol no pudo ser agregado', 'danger');
                return redirect('admin/roles');
            }
            catch(PDOException $e)
            {
                flash('Rol no pudo ser agregado', 'danger');
                return redirect('admin/roles');
            }
            catch(Exception $e)
            {
                flash('Rol no pudo ser agregado', 'danger');
                return redirect('admin/roles');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('admin/roles');
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
        if (Auth::user()->hasRole('super_admin'))
        {
            try
            {
                $role = Role::findOrFail($id);
                return view('admin.roles.edit', compact('role'));
            }
            catch (QueryException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/roles');
            }
            catch (PDOException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/roles');
            }
            catch (Exception $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/roles');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('admin/roles');
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
        if (Auth::user()->hasRole('super_admin'))
        {
            try
            {
                $role = Role::findOrFail($id);
                $role->update($request->all());
                flash('Rol actualizado exitosamente', 'success');
                return redirect ('admin/roles');
            }
            catch(QueryException $e)
            {
                flash('Rol no pudo ser actualizado', 'danger');
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062)
                {
                    flash('Rol ya registrado en la base de datos', 'danger');
                }
                return redirect('admin/roles');
            }
            catch(PDOException $e)
            {
                flash('Rol no pudo ser actualizado', 'danger');
                return redirect('admin/roles');
            }
            catch(Exception $e)
            {
                flash('Rol no pudo ser actualizado', 'danger');
                return redirect('admin/roles');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('admin/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasRole('super_admin'))
        {
            try
            {
                Role::destroy($id);
                flash('Rol eliminado exitosamente', 'success');
                return redirect('admin/roles');
            }
            catch (QueryException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/roles');
            }
            catch (PDOException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/roles');
            }
            catch (Exception $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/roles');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('admin/roles');
    }

    public function roleAssignment()
    {
        if (Auth::user()->hasRole('super_admin'))
        {
            try
            {
                $select_users = User::pluck('doc_id', 'id');
                $select_roles = Role::pluck('name', 'id');

                $users = User::all();

                return view ('admin.roles.assignment', compact('select_users', 'select_roles', 'users'));
            }
            catch (QueryException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/roles');
            }
            catch (PDOException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/roles');
            }
            catch (Exception $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/roles');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('admin/roles');
    }

    public function roleAttachment(Request $request)
    {
        if (Auth::user()->hasRole('super_admin'))
        {
            try
            {
                $user_id = $request->user;
                $role_id = $request->role;

                $user = User::findOrFail($user_id);
                $role = Role::findOrFail($role_id);

                $user->attachRole($role);
                flash('Rol asignado exitosamente', 'success');
            }
            catch (QueryException $e)
            {
                flash('Rol ya asignado', 'danger');
                return redirect('admin/roles');
            }
            catch (PDOException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/roles');
            }
            catch (Exception $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/roles');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect ('admin/roles/role-assignment');
    }

    public function roleDetachment(User $user, Role $role)
    {
        if (Auth::user()->hasRole('super_admin')) {
            try
            {
                $user->detachRole($role);
                flash('Rol eliminado exitosamente', 'success');
            }
            catch (QueryException $e)
            {
                flash('Rol ya asignado', 'danger');
                return redirect('admin/roles');
            }
            catch (PDOException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/roles');
            }
            catch (Exception $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/roles');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect ('admin/roles/role-assignment');
    }
}
