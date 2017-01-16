<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDOException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $user = User::findOrFail($id);
            return view ('auth/show', compact('user'));
        }
        catch(QueryException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('/');
        }
        catch(PDOException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('/');
        }
        catch(Exception $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view ('auth/edit', compact('user'));
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
        try
        {
            $user = User::findOrFail($id);
            $user->update($request->all());
            return redirect ('misrecetas');
        }
        catch(QueryException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('/');
        }
        catch(PDOException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('/');
        }
        catch(Exception $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('/');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword()
    {
        return view ('auth.change_password');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        try
        {
            $user = User::findOrFail(Auth::id());
            if (Hash::check($request->current_password, $user->password))
            {
                $user->password = Hash::make($request->new_password);
                $user->update();
                flash('Contraseña cambiada exitosamente', 'success');
                return redirect ('perfiles/changePassword');
            }
            flash('Contraseña incorrecta', 'danger');
            return back();
        }
        catch(QueryException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('perfiles/changePassword');
        }
        catch(PDOException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('perfiles/changePassword');
        }
        catch(Exception $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('perfiles/changePassword');
        }
    }
}
