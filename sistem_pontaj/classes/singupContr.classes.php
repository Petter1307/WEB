<?php
class SingupContr
{
  private $uid;
  private $email;
  private $first_name;
  private $last_name;
  private $pwd;
  private $pwdRepeat;

  public function __construct($uid,$email,$first_name,$last_name, $pwd,$pwdRepeat){
    $this->uid= $uid;
    $this->email= $email;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->pwd = $pwd;
    $this->pwdRepeat = $pwdRepeat;

  }
  private function emptyInput(){
    $result;
    if(empty($this->uid) || empty($this->emai) || empty($this->first_name) || empty($this->last_name) || empty($this->pwd) || empty($this->pwdRepeat))
    {
      $result = false;
    }else
    {
      $result = true;
    }
    return $result;
  }
  private function invalidUid(){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$this->$uid))
    {
      $result = false;
    }else
    {
      $result = true;
    }
    return $result;
  }
  private function invalidEmail(){
    $result;
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL){
      $result = false;
    }else
    {
      $result = true;
    }
    return $result;
  }

  private function pwdMatch(){
    $result;
    if($this->pwd !== $this->pwdRepeat){
      $result = false;
    }else
    {
      $result = true;
    }
    return $result; 
  }

}
