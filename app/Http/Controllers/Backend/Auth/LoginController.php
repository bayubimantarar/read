<?php

namespace App\Http\Controllers\Backend\Auth;

use Auth;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function show()
    {
        return view('backend.auth.login');
    }

    public function login(AuthRequest $authReq)
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
