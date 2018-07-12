<?php

namespace EPHP\Controllers;

use EPHP\Auth\Auth;
use EPHP\Core\App;
use EPHP\Core\View;
use EPHP\Models\User;
use EPHP\Storage\Session;

class RegisterController
{
    public function index()
    {
        View::render('register');
    }

    public function save() {

    	//Verify if method post
    	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    		$user = User::crear($_POST);

    		if($user['status']) {
    			//save user session data
    			Session::set('user', $user['data']);

    			//redirect continue panel
    			App::redirect('login');

    		} else {
    			View::render('register', compact('user'));
    		}

    	}

    }
}
