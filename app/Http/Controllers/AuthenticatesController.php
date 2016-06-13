<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\RedirectResponse as Redirection;
use App\Http\Requests\AuthRequest as Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Hash;

trait AuthenticatesController
{
    public function __construct () {
    	$this->middleware("guest:$this->guard", [ 'except' => 'logout' ]);
    }

    public function login ( Request $request, Auth $auth ) {
    	$authorized = $auth->guard($this->guard)->attempt($request->only('email', 'password'), $request->has('remember'));

    	if($authorized) {
    		return redirect()->intended($this->redirectTo);
    	}

    	return back()->with('authError', 'E-mail hoặc password không đúng.')
            		 ->withInput($request->except('password'));
    }

    public function logout ( Auth $auth ) {
    	$auth->guard($this->guard)->logout();
    	return redirect()->route('admin.login');
    }
}
