<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Update extends Controller {

    public function action_user()
    {
        if (!empty($_POST['id'])||$_POST['id']==0){
            $id = $_POST['id'];
            $add = Model::factory('update')
                ->user($id);
            $user = Model::factory('select')
                ->user();
            $res = View::factory('result/user')
                ->bind('user', $user);
            $this->response->body($res);
        }
    }

}