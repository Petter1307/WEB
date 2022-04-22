<?php 

    class Dbh{
        protected function connect(){
            try{
                $username="";
                $password="";
                $dbh = new PDO('mysql:host=localhost;dbname=database_name',$username,$password);
                return $dbh;
            } catch(PDOException $e){
                print "Error: " . $e->getMessage() . "<br/>";
                die();
            }

        }
    }

?>
