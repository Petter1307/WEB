<?php 
class Mess extends Dbh{
     
    protected function saveMEssage($name, $email, $regarding, $message){
        $stmt = $this->connect()->prepare('INSERT into message(name, email, regarding,mess) values(?,?,?,?)');
        if(!$stmt->execute(array($name,$email,$regarding,$message))){
            $stmt= null;
            session_start();  
            $error = "stmtfailed";
            $_SESSION['error'] = $error;
            header('location: ../index.php');
            exit();
        }
        $stmt = null;
    }
    protected function getXEmail($email){
        $stmt = $this->connect()->prepare('SELECT email from message where email = ?');
        if(!$stmt->execute(array($email))){
            session_start();  
            $stmt= null;
            $error = "stmtfailed";
            $_SESSION['error'] = $error;
            header('location: ../index.php');
            exit();
        }
        if($stmt->rowCount()>5){
            session_start();  
            $error = "spamEmail";
            $_SESSION['error'] = $error;
            $resultCheck=false;
        }
        else{
            $resultCheck = true;
        }
        return $resultCheck;
    }
    protected function time_limit($email){
        $stmt = $this->connect()->prepare('SELECT sent_time from message where email = ?');
        if(!$stmt->execute(array($email))){
            session_start();  
            $stmt= null;
            $error = "stmtfailed";
            $_SESSION['error'] = $error;
            header('location: ../index.php');
            exit();
        }
    }
}




?>
