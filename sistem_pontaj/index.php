<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Proiect</title>
  </head>
  <body>
    <div class="signup_wrapper">
      <form action="includes/singup.inc.php" method="post">
          <input type="text" name="uid" placeholder="Username"><br>
          <input type="text" name="email" placeholder="Email"><br>
          <input type="text" name="first_name" placeholder="Prenume"><br>
          <input type="text" name="last_name" placeholder="Name"><br>
          <input type="password" name="pwd" placeholder="Parola"><br>
          <input type="password" name="pwdRepeat" placeholder="Repeta parola"><br>
          <!-- <input type="radio" name="user_type" value="Student" id = "student" checked>
          <label for="student">Student</label><br>
          <input type="radio" id ="profesor" name="user_type" value="Profesor">
          <label for="profesor">Profesor</label><br> -->

          <br>
          <button type="submit" name="submit">Sing Up</button>
      </form>
    </div>
  </body>
</html>
