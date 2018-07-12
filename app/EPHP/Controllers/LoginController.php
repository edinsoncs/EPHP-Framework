<?php

namespace EPHP\Controllers;

use EPHP\Auth\Auth;
use EPHP\Core\App;
use EPHP\Core\View;
use EPHP\Models\User;
use EPHP\Storage\Session;

class LoginController
{
    public function index()
    {
        View::render('login');
    }

    public function access() {

    	//Verify if method post
    	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    		$user = Auth::login($_POST['email'], $_POST['pw']);
    		if($user) {
    			App::redirect('dashboard');
    		}
			Session::set('_old_input', $_POST);
			Session::set('_errors', ['login' => "Email y/o password incorrectos."]);
			App::redirect('login');

    	}

    }
}
