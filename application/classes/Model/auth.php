<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Auth extends Model
{
	public function auth($login, $pass)
    {
		if(($login != 'false') && ($pass != 'false')){
        // запрос на получение хэша пароля из таблицы
    		return DB::select()
            ->from("user")
            ->where('e-mail', '=', $login)
            ->and_where('password', '=', $pass)
            ->and_where('active', '!=', '0')
            ->execute()
            ->as_assoc();
        }
    }
}