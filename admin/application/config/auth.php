<?php defined('SYSPATH') OR die('No direct access allowed.');

return array(

	'driver'       => 'orm',
	'hash_method'  => 'sha256',
	'hash_key'     => '2901',
	'lifetime'     => 1209600,
	'session_type' => Session::$default,
	'session_key'  => 'auth_user',

	// Username/password combinations for the Auth File driver
	// 'users' => array(
	// 	'Admin' => '3b51cd877c06205d637d25a2dd24c1cb93a0501a953f647dbc4115cfbd40f515', 
	// ),

);