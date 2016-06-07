<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Add extends Model
{
	public function auth($login, $pass)
    {

		if(($login != 'false') && ($pass != 'false')){
    // запрос на получение хэша пароля из таблицы
    		$sql = DB::select('full_name')
            ->from("user")
            ->where('e-mail', '=', $login)
            ->and_where('password', '=', md5(md5($pass)))
            ->execute();
}}}