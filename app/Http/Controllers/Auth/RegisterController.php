<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/home';

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'digits:11'],
            'dob' => ['required', 'date'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $id=count(Patient::all())+1;
        $patient=new Patient;
        $patient->patient_id=$id;
        $patient->name=$data['name'];
        $patient->email=$data['email'];
        $patient->mobile=$data['mobile'];
        $patient->dob=$data['dob'];
        if($data['radiom'])
            $patient->gender='m';
        else
            $patient->gender='f';
        $patient->save();
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'type' => 1,
            'foreign_id' => $id,
            'password' => Hash::make($data['password']),
        ]);
    }
}
