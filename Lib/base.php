<?php
//require_once(PATH_LIB.'SecureKey/SecureKey.php');



class Bases{

  public static function isAlpha($string){
    if(isset($string) && $string != '' && is_string($string) && !preg_match('/[\'^$£*µ_]/', $string)){
      return htmlspecialchars($string);
    }else return false;
  }

  public static function isNumber(){
    
  }
  function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

  function __construct(){
    session_name("p1505527");
    session_start();

  }

  public static function isPassword($string){
    if(isset($string) && !preg_match('/[\'^$£*µ_]/', $string)){
      return true;
    }else{
      return false;
    }
  }
  function login($user){
    $_SESSION['user'] = $user;
    $_SESSION['logged'] = 1;
  }
  function deconnexion($user){
    unset($_SESSION['user']);
    unset($_SESSION['logged']);
  }

  public function __destruct(){

  }
}
