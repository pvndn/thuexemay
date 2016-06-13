<?php

namespace App\Http\Controllers\Users;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthenticatesController;
class AuthController extends Controller
{
    use AuthenticatesController;
    
    protected $guard = 'web_users';
    protected $redirectTo = '/admin';
    
    public function index()
    {
        return $this->getlogin();
    }

    public function getlogin () {
    	return view('administrator.authentications.login');
    }

}
