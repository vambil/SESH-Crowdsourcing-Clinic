<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>USER PAGE</title>


    <h1>Here is your email: <?php
        $datestring =  $_SESSION["u_timestamp"];
        $pieces = explode(" ", $datestring);
        echo $pieces[0];
     ?> </h1>
  </head>
  <body>

  </body>
</html>
