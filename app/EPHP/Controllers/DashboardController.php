<?php

namespace EPHP\Controllers;

use EPHP\Auth\Auth;
use EPHP\Core\App;
use EPHP\Core\View;
use EPHP\Models\Post;

class DashboardController
{
    public function index()
    {
    	$all = Post::show();
        View::render('dashboard', compact('all'));
    }

    public function actions() {

    	//Verify if method post
    	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if($_POST['comment'] == 2) {

                $comment = Post::comment($_POST);
                if($comment) {
                     App::redirect('dashboard');
                 }

            } else {

                $post = Post::save($_POST);

                if($post) {
                    App::redirect('dashboard');
                } else {
                    Session::set('_error_post', 'Hubo un problema al subir el post');
                    App::redirect('dashboard');
                }

            }

    		


    	}

    }
}