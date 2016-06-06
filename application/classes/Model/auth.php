<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Add extends Model
{
	public function auth($login, $pass)
    {

		if(isset($login) && isset($pass)){
    // запрос на получение хэша пароля из таблицы
    		$sql = DB::select('password')
            ->from("user")
            ->where('e-mail', '=', '?s')
            ->execute();
    		$pas = DB::getOne($sql, $login);

    // сравнение с введенным юзером паролем
    		if ($pas === md5(md5($pass))){
        		exit('yes');
    		}
		}	
		echo 'no';
    }
}