<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\Provider;
use App\ProviderImg;
use App\Region;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Auth;

class ProviderRegisterController extends Controller
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

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        $img = new ProviderImg;
        $img->ak_provider_id = $user->getId();
        $img->ak_provider_img_path = 'default.jpg';
        $img->save();
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $query = DB::table('ak_province')
                    ->select('*');
        $province = $query->get();
        $query = DB::table('ak_region')
                    ->select('*');
        $region = $query->get();
        $content = false;
        return view('auth.provider-register')
                ->with('province', $province)
                ->with('region', $region)
                ->with('content', $content);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('provider');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/provider/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:provider');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd(request()->all());
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:ak_provider,ak_provider_email|unique:ak_user,ak_user_email',
            'password' => 'required|min:6|confirmed',
            'region' => 'required|max:11',
            'address' => 'required',
            'zipcode' => 'required|max:5',
            'description' => 'required',
            'telephone' => 'required|max:13',
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
        return Provider::create([
            'ak_provider_firstname' => $data['firstname'],
            'ak_provider_lastname' => $data['lastname'],
            'ak_provider_email' => $data['email'],
            'ak_provider_password' => bcrypt($data['password']),
            'ak_provider_region' => $data['region'],
            'ak_provider_address' => $data['address'],
            'ak_provider_zipcode' => $data['zipcode'],
            'ak_provider_description' => $data['description'],
            'ak_provider_telephone' => $data['telephone'],
        ]);
    }
}
