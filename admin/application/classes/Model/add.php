<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Add extends Model
{

	public function specialties($cod, $title)
    {
        DB::insert('specialty', array('cipher', 'title_spec'))
            ->values(array($cod, $title))
            ->execute();
    }

    public function view_project($view)
    {
        DB::insert('view', array('view'))
            ->values(array($view))
            ->execute();
    }

    public function user($full_name, $group, $password, $e_mail)
    {
        DB::insert('user', array('id_group', 'full_name', 'password', 'e-mail', 'active'))
            ->values(array($group, $full_name, md5(md5($password)), $e_mail, '1'))
            ->execute();
    }

    public function manager($full_name)
    {
        DB::insert('manager', array('full_name'))
            ->values(array($full_name))
            ->execute();
    }

    public function group($numbgr, $year, $spec)
    {
        DB::insert('group', array('group', 'date_receipt', 'cipher'))
            ->values(array($numbgr, $year, $spec))
            ->execute();
    }

}