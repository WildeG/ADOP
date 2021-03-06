<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Template {

    public $template = 'global/basic';

	public function action_login() 
    {
        $login = Arr::get($_POST, 'username');
        $password = Arr::get($_POST, 'password');
        unset($errors);
        if (Auth::instance()->login($login, $password)) {
            $this->redirect('http://diplom.loc/');
        } else {
            $errors = "Ошибка авторизации. Неправильно введен логин или пароль";
        }
        $this->template->styles = array('style');
        $content = View::factory('login')->bind('error', $errors);
        $this->template->title = 'Авторизация';
        $this->template->content = $content;
    } 

    public function action_exit()
    {
        Auth::instance()->logout(TRUE);
        $this->redirect('http://diplom.loc/');
    }

    public function action_registration()
    {
        if ($post = $this->request->post())
        {
            try {
                // Сохраняем пользователя в БД
                $user = ORM::factory('user')->create_user($_POST, array('username','full_name','email','password'));
     
                // Выставляем ему роль, роль login означает что пользователь может авторизоваться
                $user->add('roles',ORM::factory('role',array('name'=>'login')));
     
                // Отправляем письмо пользователю с логином и паролем
                mail($post['email'],'Регистрация на сайте','Вы были зерегестрированы на сайте, ваш логин: '.$post['username'].' Ваш пароль: '.$post['password']);
               
                // Делаем редирект на страницу авторизации
                $this->redirect('http://diplom.loc/');
            } catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('models');
            }
        }
     
        // Выводим шаблон регистрации
        $this->template->content = View::factory('global/registrations')->bind('error', $errors);
        $this->template->styles = array('style');
        $this->template->title = 'Регистрация';
    }

} // End