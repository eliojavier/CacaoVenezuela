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
    protected $redirectTo = '/';

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
        if($data['category']=='Aficionado/Público General') {
            return Validator::make($data, [
                'name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'doc_id' => 'required|max:15|unique:users',
                'password' => 'required|min:6|confirmed',
                'birthday' => 'required',
                'phone' => 'required',
                'city_id' => 'required',
                'size' => 'required',
                'category' => 'required',
            ]);
        }
        return Validator::make($data, [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'doc_id' => 'required|max:15',
            'password' => 'required|min:6|confirmed',
            'birthday' => 'required',
            'phone' => 'required',
            'city_id' => 'required',
            'size' => 'required',
            'category' => 'required',
            'type' => 'required',
            'academy_id' => 'required',
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
        if($data['type']=='')
        {
            $user = User::create([
                'name' => $data['name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'doc_id' => $data['doc_id'],
                'password' => bcrypt($data['password']),
                'birthday' => DateTime::createFromFormat('d/m/Y', $data['birthday'])->format('Y-m-d'),
                'phone' => $data['phone'],
                'city_id' => $data['city_id'],
                'twitter' => $data['twitter'],
                'instagram' => $data['instagram'],
                'size' => $data['size'],
                'category' => $data['category'],
                'type' => $data['type'],
                'academy_id' => null
            ]);
        }
        else
        {
            $user = User::create([
                'name' => $data['name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'doc_id' => $data['doc_id'],
                'password' => bcrypt($data['password']),
                'birthday' => DateTime::createFromFormat('d/m/Y', $data['birthday'])->format('Y-m-d'),
                'phone' => $data['phone'],
                'city_id' => $data['city_id'],
                'twitter' => $data['twitter'],
                'instagram' => $data['instagram'],
                'size' => $data['size'],
                'category' => $data['category'],
                'type' => $data['type'],
                'academy_id' => $data['academy_id']
            ]);
        }
        
        $user->RoleAssignment('participant');

        return $user;
    }
}
