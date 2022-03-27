<?php
class SingupContr extends Singup
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
    $result = null;
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
    $result = null;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$this->uid))
    {
      $result = false;
    }else
    {
      $result = true;
    }
    return $result;
  }
  private function invalidEmail(){
    $result = null;
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
    {
      $result = false;
    }else
    {
      $result = true;
    }
    return $result;
  }
  private function pwdMatch(){
    $result = null;
    if($this->pwd !== $this->pwdRepeat){
      $result = false;
    }else
    {
      $result = true;
    }
    return $result; 
  }
  private function uidisTaken(){
    $result = null;
    if(!$this->checkUser($this->uid, $this->email))
    {
      $result=false; 
    } else
    {
      $result= true; 
    }
    return $result;
  }
  public function singupUser(){
    if($this->emptyInput() == false){
      header("location: ../index.php?error=emptyinput");
      exit();
    }
    if($this->invalidUid() == false){
      header("location: ../index.php?error=invalidUid");
      exit();
    }
    if($this->invalidEmail() == false){
      header("location: ../index.php?error=invalidEmail");
      exit();
    }
    if($this->pwdMatch() == false){
      header("location: ../index.php?error=pwdMatch");
      exit();
    }
    if($this->uidisTaken() == false){
      header("location: ../index.php?error=uidisTaken");
      exit();
    }
    $this->setUser($this->uid, $this->pwd, $this->email, $this->first_name, $this->last_name);
  }

}
