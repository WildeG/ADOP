<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller {

	public function action_login() 
    {
        $login = Arr::get($_POST, 'username');
        $password = Arr::get($_POST, 'password');
        if (Auth::instance()->login($login, $password)) {
            $this->redirect('http://admin.diplom.loc/');
        } else {
            echo 'failed';
        }
    } 

    public function action_exit()
    {
        Auth::instance()->logout(TRUE);
        $this->redirect('http://admin.diplom.loc/');
    }

} // End