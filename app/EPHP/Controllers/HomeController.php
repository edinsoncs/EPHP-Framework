<?php

namespace EPHP\Controllers;

use EPHP\Auth\Auth;
use EPHP\Core\App;
use EPHP\Core\View;
use EPHP\Storage\Session;

class HomeController
{
    public function index()
    {	
        View::render('home');

    }
}