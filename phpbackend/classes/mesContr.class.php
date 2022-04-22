<?php 
    class mesContr extends Mess{
        private $name;
        private $email;
        private $regarding;
        private $message;

        public function __construct($name, $email, $regarding, $message)
        {
            $this->name = $name;
            $this->email = $email;
            $this->regarding = $regarding;
            $this->message = $message;
        }
        private function emptyInput(){
            $result = null;
            if(empty($this->name) || empty($this->email) || empty($this->regarding) || empty($this->message)){
                $result = false;
            } else
            $result = true;
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
          private function invalidName(){
            $result = null;
            if(!preg_match ('/^([a-zA-Z0-9 ]){1,}$/', $this->name))
            {
              $result = false;
            }else
            {
              $result = true;
            }
            return $result;
          }
          private function invalidRegarding(){
            $result = null;
            if(!preg_match ('/[a-zA-Z0-9 ]/', $this->regarding))
            {
              $result = false;
            }else
            {
              $result = true;
            }
            return $result;
          }
          private function invalidMess(){
            $result = null;
            if(!preg_match ('/[a-zA-Z0-9 ]/', $this->message))
            {
              $result = false;
            }else
            {
              $result = true;
            }
            return $result;
          }
          private function spamEmail(){
            $result = null;
            if(!$this->getXEmail($this->email)){
              $result = false;
            }
            else
            $result = true;
            return $result;
          }
        // Create a limit of 5 messages for 1 email and 5 mins for each message send.
        public function sendMessage(){
          session_start();
          if($this->emptyInput() == false){
            $error = "emptyInput";
            $_SESSION['error'] = $error;
            header('location: ../index.php');
            exit();
          }
          if($this->invalidEmail() == false){
            $error = "invalidEmail";
            $_SESSION['error'] = $error;
            header('location: ../index.php');
            exit();
          }
          if($this->invalidName() == false){
            $error = "invalidName";
            $_SESSION['error'] = $error;
            header('location: ../index.php');
            exit();
          }
          if($this->invalidRegarding() == false){
            $error = "invalidRegarding";
            $_SESSION['error'] = $error;
            header('location: ../index.php');
            exit();
          }
          if($this->spamEmail()== false){
            $error = "spamEmail";
            $_SESSION['error'] = $error;
            header('location: ../index.php');
            exit();
          }
          $this->saveMessage($this->name, $this->email, $this->regarding, $this->message);
        }
    }
?>
