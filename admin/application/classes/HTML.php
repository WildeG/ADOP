<?php defined('SYSPATH') OR die('No direct script access.');

class HTML extends Kohana_HTML {

	public static function date($data)
	{
		if (substr($data,0,10)!==date("Y-m-d")) {
			if (date('Y-m-d', strtotime('yesterday'))==substr($data,0,10)) {
				$res = "Вчера в ".substr(substr($data,11,8),0,5);
			} else {
				$date = explode(".", date("d.m.Y",strtotime($data)));
				switch ($date[1]){
					case 1: $m='января'; break;
					case 2: $m='февраля'; break;
					case 3: $m='марта'; break;
					case 4: $m='апреля'; break;
					case 5: $m='мая'; break;
					case 6: $m='июня'; break;
					case 7: $m='июля'; break;
					case 8: $m='августа'; break;
					case 9: $m='сентября'; break;
					case 10: $m='октября'; break;
					case 11: $m='ноября'; break;
					case 12: $m='декабря'; break;
				}
				$res = $date[0].'&nbsp;'.$m.'&nbsp;'.$date[2].date(' в G:i', strtotime($data));
			}
		} else {
			$res = "Сегодня в ".substr(substr($data,11,8),0,5);
		}
		return $res;
	}

	public static function category($category)
	{
		switch ($category){
			case 'one': $m='Первые блюда'; break;
			case 'two': $m='Вторые блюда'; break;
			case 'sal': $m='Салаты'; break;
			case 'des': $m='Десерты'; break;
			case 'bak': $m='Выпечка'; break;
			case 'bev': $m='Напитки'; break;
			case 'sau': $m='Соусы\заправки'; break;
			default: $m="Нет категории";
		}
		return $m;
	}

	public static function kitchens($kitchens)
	{
		switch ($kitchens){
			case 'rus': $m='Русская'; break;
			case 'f': $m='Французская'; break;
			case 'jkc': $m='Японская'; break;
			case 'loi': $m='Итальянская'; break;
			case 'gcu': $m='Грузинская'; break;
			case 'ukc': $m='Украинская'; break;
			default: $m="Не определено";
		}
		return $m;
	}
}










