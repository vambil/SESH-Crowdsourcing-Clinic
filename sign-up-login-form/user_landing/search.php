<?php

session_start();

if(isset($_POST['search'])){
  // echo "hELO";
  $_SESSION['search_stage'] = $_POST['search_stage'];
  $_SESSION['search_contest_type'] = $_POST['search_contest_type'];
  $_SESSION['search_field'] = $_POST['search_field'];
  $_SESSION['search_text'] = $_POST['search_text'];
  // echo $_SESSION['search_text'];

  header("Location: index.php#work");


}
