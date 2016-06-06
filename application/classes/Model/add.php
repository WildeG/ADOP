<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Select extends Model
{

    public function adduser($full_name, $e_mail, $password, $group)
    {
        $query = DB::insert('user', array('full_name', 'e_mail', 'password', 'group'))
            ->values(array($full_name, $e_mail, $password, $group))
            ->execute();
    }