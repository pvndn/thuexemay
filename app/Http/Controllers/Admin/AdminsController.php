<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Contracts\Auth\Factory as Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class AdminsController extends Controller
{
	protected $guard = 'web_users';
    protected $redirectTo = '/admin';

    public function dashboard () {
    	return view('administrator.dashboard');
    }
    public function getRegister()
    {
        return view('administrator.authentications.signup');
    }
    public function register ( RegisterRequest $request, Auth $auth ) {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        if( $auth->guard($this->guard) ) User::create($input);
        return redirect($this->redirectTo);
    }

}
