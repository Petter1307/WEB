<?php

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $regarding = $_POST['regarding'];
        $message = $_POST['message'];

    
        include "../classes/dbh.class.php";
        include "../classes/mes.class.php";
        include "../classes/mesContr.class.php";

        $mes = new mesContr($name, $email,$regarding,$message);
        $mes ->sendMessage();
        header('location: ../index.php');
    }

?>
