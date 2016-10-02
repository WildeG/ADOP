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

    public function action_registration()
    {
        if ($post = $this->request->post())
        {
            try {
                // Сохраняем пользователя в БД
                $user = ORM::factory('user')->create_user($_POST, array('username','email','password'));
     
                // Выставляем ему роль, роль login означает что пользователь может авторизоваться
                $user->add('roles',ORM::factory('role',array('name'=>'login')));
     
                // Отправляем письмо пользователю с логином и паролем
                mail($post['email'],'Регистрация на сайте','Вы были зерегестрированы на сайте, ваш логин: '.$post['username'].' Ваш пароль: '.$post['password']);
               
                // Делаем редирект на страницу авторизации
                $this->redirect("/users/login");
            } catch (ORM_Validtion_Exception $e) {
                $errors = $e->errors('models');
                // echo Debug::vars($errors);
            }
        }
     
        // Выводим шаблон регистрации
        $this->template->content = View::factory('global/registration');
    }

} // End