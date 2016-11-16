<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use DateTime;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'cedula' => 'required|max:15',
            'password' => 'required|min:6|confirmed',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'estado' => 'required',
            'talla' => 'required',
            'categoria' => 'required',
            'academia' => 'required',
            'tipo' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'cedula' => $data['cedula'],
            'password' => bcrypt($data['password']),
            'fecha_nacimiento' => DateTime::createFromFormat('d/m/Y', $data['fecha_nacimiento'])->format('Y-m-d'),
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'twitter' => $data['twitter'],
            'instagram' => $data['instagram'],
            'talla' => $data['talla'],
            'categoria' => $data['categoria'],
            'tipo' => $data['tipo'],
            'lugar_id' => $data['estado'],
            'academia_id' => $data['academia'],
        ]);
    }
}
