<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Add extends Model
{
    public function adduser($full_name, $e_mail, $password, $group)
    {
        DB::insert('user', array('full_name', 'e-mail', 'password', 'id_group'))
            ->values(array($full_name, $e_mail, $password, $group))
            ->execute();
    }
}