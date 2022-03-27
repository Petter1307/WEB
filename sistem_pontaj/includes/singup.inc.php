<?php
if (isset($_POST["submit"])) {
  $uid = $_POST["uid"];
  $email = $_POST["email"];
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdRepeat"];

  include "../classes/singupContr.classes.php";
  include "../classes/singup.classes.php";
  $singup = new SingupContr($uid, $email, $first_name, $last_name, $pwd, $pwdRepeat);


}
