<?php

namespace App\Http\Controllers\Dashboard\Authentication;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationRequest;

class AuthenticationController extends Controller
{
    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('dashboard.authentication.form-login');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(AuthenticationRequest $authReq)
    {
        $email      = $authReq->email;
        $password   = $authReq->password;

        if(Auth::attempt([
            'email' => $email, 'password' => $password
        ])) {
            return redirect()
                ->intended('/dashboard');
        }
        
        return redirect()
            ->back()
            ->withErrors([
                'notification' => 'Login gagal! Periksa kembali email dan password anda'
            ]);
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request
            ->session()
            ->flush();
        $request
            ->session()
            ->regenerate();

        return redirect('/dashboard');
    }
}
