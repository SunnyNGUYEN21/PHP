<?php
//require_once(PATH_LIB.'SecureKey/SecureKey.php');

class base {
	
		function _construct()
		{
			session_start();
			session_name();
		}
		public function _destruct()
		{
			
		}
		public static function isAlpha($string)
		{
	//	
		if (isset($string) && $string !='' && is_string($string) && !preg_match('/[\'^£$%&*()}{@#-?!><>_+~]/', $string))
		{
			return htmlspecialchars($string);
		}
		else return false;
	}
	public static function isMessage($string)
	{
		if (isset($string) && $string !='' && is_string($string) && !preg_match('/[a-z_]$/', $string))
		{
			return htmlspecialchars($string);
		}
		else return false;
	}
	 public static function isPassword($string)
	{
		if (isset($string) && $string !='' && is_string($string) && !preg_match('/[A-Za-z0-9_]$/', $string))
		{
			return htmlspecialchars($string);
		}
		else return false;
	}
		
}