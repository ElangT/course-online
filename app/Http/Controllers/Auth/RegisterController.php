<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
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
    /*
            $table->integer('ak_user_id', true);
            $table->string('ak_user_firstname');
            $table->string('ak_user_lastname');
            $table->string('ak_user_email')->unique();
            $table->string('ak_user_password');
            $table->date('ak_user_dob');
            $table->integer('ak_user_phone');
            $table->rememberToken();
            $table->timestamps();

    */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:ak_user,ak_user_email',
            'password' => 'required|min:6|confirmed',
            'dob' => 'required',
            'phone' => 'required',
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
            'ak_user_firstname' => $data['firstname'],
            'ak_user_lastname' => $data['lastname'],
            'ak_user_email' => $data['email'],
            'ak_user_password' => bcrypt($data['password']),
            'ak_user_dob' => $data['dob'],
            'ak_user_phone' => $data['phone'],
        ]);
    }
}
