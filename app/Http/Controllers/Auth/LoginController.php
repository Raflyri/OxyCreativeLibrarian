<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function loginprocess(User $users,Request $request)
    {
        $users = User::where('email', $request->email)
                    ->where('password',$request->password)
                    ->where('level',1)
                    ->get();

        if (count($users) > 0) {
            foreach ($users as $u) {
                Session::put('id',$u->id);
                Session::put('name',$u->name);
                Session::put('nohp',$u->nohp);
                Session::put('email',$u->email);
                Session::put('level',$u->level);
                Session::put('login',TRUE);
            }
            return Redirect::to('/')->with(['keterangan' => 'Anda sudah login','tipe' => 'success']);
        }else{
            return Redirect::to('login')->withErrors(['keterangan' => 'Anda gagal Login']);
        }
            // User::create($users);
            // return Redirect::to('login')->with(['keterangan' => 'Anda berhasil registrasi','tipe' => 'success']);

    }

    public function loginadminprocess(User $users,Request $request)
    {
        $users = User::where('email', $request->email)
                    ->where('password',$request->password)
                    ->get();

        if (count($users) > 0) {
            foreach ($users as $u) {
                Session::put('id',$u->id);
                Session::put('name',$u->name);
                Session::put('nohp',$u->nohp);
                Session::put('email',$u->email);
                Session::put('level',$u->level);
                Session::put('login',TRUE);
            }
            return Redirect::to('/')->with(['keterangan' => 'Anda sudah login','tipe' => 'success']);
        }else{
            return Redirect::to('login')->withErrors(['keterangan' => 'Anda gagal Login']);
        }
            // User::create($users);
            // return Redirect::to('login')->with(['keterangan' => 'Anda berhasil registrasi','tipe' => 'success']);

    }
}
