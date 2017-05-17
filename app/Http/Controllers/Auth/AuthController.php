<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $username = 'staff_id';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'name.required' => 'Sila isi nama penuh.',
            'email.required' => 'Sila isi email',
            'password.required' => 'Sila isi kata laluan',
            'jawatan.required' => 'Sila isi jawatan',
            'jabatan.required' => 'Sila isi jabatan',
            'fakulti.required' => 'Sila isi fakulti',
            'phone.required' => 'Sila isi no telefon',
            'staff_id.required' => 'Sila isi id staf',
            'image.required' => 'Sila upload gambar profil',
            
            'email.unique' => 'Email telah berdaftar',
            'email.email' => 'Sila isi format email yang betul',
            
            'password.confirmed' => 'Kata laluan tidak sama',
            'password.min' => 'Kata laluan mesti lebih 6 karakter',
            
            'staff_id.unique' => 'ID staf telah berdaftar',
        ];
        
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'jawatan' => 'required',
            'jabatan' => 'required',
            'fakulti' => 'required',
            'phone' => 'required',
            'staff_id' => 'required|unique:users',
            'image' => 'required'
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $filename = '';

        if(!empty($data['image'])){

            $file = $data['image'];

            $filename = time() . $file->getClientOriginalName();

            $file->move('images', $filename);

        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'jabatan' => $data['jabatan'],
            'jawatan' => $data['jawatan'],
            'fakulti' => $data['fakulti'],
            'phone' => $data['phone'],
            'staff_id' => $data['staff_id'],
            'password' => bcrypt($data['password']),
            'image' =>  $filename,
        ]);
    }
}
