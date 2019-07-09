<?php
session_start();

if($_SESSION['new_contest']){
    $contest_name = $_POST['contest_name'];
}
else{
    $contest_name = $_SESSION['cur_contest'];
}

$email = $_SESSION['u_email'];
$country = $_POST['country'];
$organization = $_POST['organization'];
$stage = $_POST['stage'];
//
// $host = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName = "registration_storage";

//create connection
$conn = new mysqli('localhost', 'root', '', 'registration_storage');

if($conn->connect_error){
  die('Connect Failed : '.$conn->connect_error);
}
//echo "connection goood";
//echo "name". $name. "email". $email. "country". $country. "organization". $organization. "stage". $stage;
//
// if(empty($contest_name) || empty($email) || empty($country) || empty($organization) || empty($stage)){
//   echo "All fields are required.";
//   die();
// }

else{
  //echo "name". $name. "email". $email. "country". $country. "organization". $organization. "stage". $stage;

  $sql ="SELECT * FROM general WHERE contest_name = '$contest_name'";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if($resultCheck != 0 && $_SESSION['new_contest']){ //check if user has been taken and if its a new contest
    echo "error, this contest name has already has been registered";
    exit();
  }

    if(!$_SESSION['new_contest']){ // if its not a new contest, remove the old entry in database
      $sql2 = "UPDATE general
          SET contest_name= '$contest_name',
          SET email = '$email',
          SET country = '$country',
          SET organization = '$organization',
          SET stage = '$stage'
      WHERE contest_name = '$contest_name' ";

      // "DELETE FROM general WHERE contest_name = '$_SESSION[cur_contest]' ";
      if (mysqli_query($conn, $sql2) == true) {
          echo "Record edited successfully";
      } else {
          echo "Error editing record: ";
      }
    }else {
    $stmt = $conn->prepare("INSERT into general(contest_name, email, country, organization, stage)
    values(?,?,?,?,?)");

    $stmt->bind_param("sssss",$contest_name,$email,$country,$organization,$stage);
    $stmt->execute();
  }


  //echo "general submitted";
  // $stmt->close();
  // $conn->close();
  // die();


  if($stage == "Early"){
    $early_goal = $_POST['early_questions'];
    $early_contest_type = $_POST['early_contest_type'];
    $early_field = $_POST['early_field'];
    $early_online = $_POST['early_online'];
    $early_comments = $_POST['early_comments'];

    // if(empty($early_goal) || empty($early_contest_type) || empty($early_field) || empty($early_online) || empty($early_comments)){
    //   echo "make sure to fill out the Early segment fields!";
    //   die();
    // }

    if(!$_SESSION['new_contest']){ // if its not a new contest, remove the old entry in database
      $sql2 = "UPDATE general
          SET goal= $early_goal,
          SET contest_type = $early_contest_type,
          SET field = $early_field,
          SET online = $early_online,
          SET comments = $early_comments,
          SET email = $email,
          SET contest_name = $contest_name
      WHERE contest_name = '$_SESSION[cur_contest]' ";

      if (mysqli_query($conn, $sql2) == true) {
          echo "Record edited successfully";
      } else {
          echo "Error deleting record: ";
      }
    }else{
      $stmt = $conn->prepare("insert into early_storage(goal, contest_type, field, online, comments, email, contest_name)
      values(?,?,?,?,?,?,?)");
      $stmt->bind_param("sssssss",$early_goal,$early_contest_type, $early_field,$early_online,$early_comments, $email, $contest_name);
      $stmt->execute();
      $stmt->close();
    }
    echo "Your early registration has been submitted!";
    $conn->close();
    //header("Location: sign-up-login-form/dist/user_landing/index.php");
    die();
  }
  else if($stage == "Mid"){
      $mid_goal = $_POST['mid_questions'];
      $mid_contest_type = $_POST['mid_contest_type'];
      $mid_field = $_POST['mid_field'];
      $mid_online = $_POST['mid_online'];

      $mid_target = $_POST['mid_target'];
      $mid_entry_type = $_POST['mid_entry_type'];
      $mid_promotion_strategy = $_POST['mid_promotion_strategy'];
      $mid_team_size = $_POST['mid_team_size'];
      $mid_partners = $_POST['mid_partners'];
      $mid_contest_date = $_POST['mid_contest_date'];

      $mid_comments = $_POST['mid_comments'];

      // if(empty($mid_goal) || empty($mid_contest_type) || empty($mid_field) || empty($mid_online) ||
      // empty($mid_target) || empty($mid_entry_type) || empty($mid_promotion_strategy) ||
      // empty($mid_team_size) || empty($mid_partners) || empty($mid_contest_date) || empty($mid_comments)){
      //   echo "make sure to fill out the mid segment fields!";
      //   die();
      // }
      if(!$_SESSION['new_contest']){  // if its not a new contest, remove the old entry in database
        $sql2 = "UPDATE general
            SET goal= $mid_goal,
            SET contest_type = $mid_contest_type,
            SET field = $mid_field,
            SET online = $mid_online,

            SET target = $mid_target,
            SET entry_type = $mid_entry_type,
            SET promotion_strategy = $mid_promotion_strategy,
            SET team_size = $mid_team_size,
            SET partners = $mid_partners,
            SET contest_date = $mid_contest_date,
            SET comments = $mid_comments,
            SET email = $email,
            SET contest_name = $contest_name

        WHERE contest_name = '$_SESSION[cur_contest]' ";

        if (mysqli_query($conn, $sql2)) {
            echo "Record edited successfully";
        } else {
            echo "Error edited record: ";
        }
      }
      else{
        $stmt = $conn->prepare("insert into mid_storage(goal, contest_type, field, online, target,
        entry_type, promotion_strategy, team_size, partners, contest_date, comments, email, contest_name)
        values(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssssssss",$mid_goal,$mid_contest_type, $mid_field,$mid_online,
        $mid_target, $mid_entry_type, $mid_promotion_strategy, $mid_team_size,
        $mid_partners, $mid_contest_date, $mid_comments, $email, $contest_name);
        $stmt->close();
        $conn->close();
      }
      echo "Your mid registration has been submitted!";

      $stmt->execute();
      header("Location: sign-up-login-form/dist/user_landing/index.php");
      die();
  }
  else if($stage == "Completed"){
    //echo "inside";
    $completed_goal = $_POST['completed_questions'];
    $completed_contest_type = $_POST['completed_contest_type'];
    $completed_field = $_POST['completed_field'];
    $completed_online = $_POST['completed_online'];

    $completed_target = $_POST['completed_target'];
    $completed_entry_type = $_POST['completed_entry_type'];
    $completed_promotion_strategy = $_POST['completed_promotion_strategy'];
    $completed_team_size = $_POST['completed_team_size'];
    $completed_partners = $_POST['completed_partners'];
    $completed_contest_date = $_POST['completed_contest_date'];

    $completed_num_submissions = $_POST['completed_num_submissions'];
    $completed_contest_summary = $_POST['completed_contest_summary'];
    $completed_contest_sharing = $_POST['completed_contest_sharing'];
    $completed_shared_links = $_POST['completed_shared_links'];
    $completed_attachments = $_POST['completed_attachments'];

    $completed_comments = $_POST['completed_comments'];

    // if(empty($completed_goal) || empty($completed_contest_type) || empty($completed_field) || empty($completed_online) ||
    // empty($completed_target) || empty($completed_entry_type) || empty($completed_promotion_strategy) ||
    // empty($completed_team_size) || empty($completed_partners) || empty($completed_contest_date) ||
    // empty($completed_num_submissions) || empty($completed_contest_summary) || empty($completed_contest_sharing) ||
    // empty($completed_shared_links) || empty($completed_attachments) || empty($completed_comments)){
    //   echo "make sure to fill out the completed segment fields!";
    //   die();
    // }
    if(!$_SESSION['new_contest']){ // if its not a new contest, remove the old entry in database
      $sql2 = "UPDATE general
          SET goal= $completed_goal,
          SET contest_type = $completed_contest_type,
          SET field = $completed_field,
          SET online = $completed_online,

          SET target = $completed_target,
          SET entry_type = $completed_entry_type,
          SET promotion_strategy = $completed_promotion_strategy,
          SET team_size = $completed_team_size,
          SET partners = $completed_partners,
          SET contest_date = $completed_contest_date,
          SET num_submissions = $completed_num_submissions,
          SET contest_summary = $completed_contest_summary,
          SET contest_sharing = $completed_contest_sharing,
          SET shared_links = $completed_shared_links,
          SET attachments = $completed_attachments,

          SET comments = $completed_comments,
          SET email = $email,
          SET contest_name = $contest_name

      WHERE contest_name = '$_SESSION[cur_contest]' ";

      if (mysqli_query($conn, $sql2)) {
          echo "Record edited successfully";
      } else {
          echo "Error editing record: ";
      }
    }
    else{
      $stmt = $conn->prepare("insert into completed_storage(goal, contest_type, field, online, target,
      entry_type, promotion_strategy, team_size, partners, contest_date, num_submissions, contest_summary,
      contest_sharing, shared_links, attachments, comments, email, contest_name)
      values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $stmt->bind_param("ssssssssssisssbsss",$completed_goal,$completed_contest_type, $completed_field,$completed_online,
      $completed_target, $completed_entry_type, $completed_promotion_strategy, $completed_team_size,
      $completed_partners, $completed_contest_date, $completed_num_submissions, $completed_contest_summary,
      $completed_contest_sharing, $completed_shared_links, $completed_attachments, $completed_comments, $email, $contest_name);
      $stmt->close();
      $conn->close();
    }
    echo "Your completed registration has been submitted!";
    $conn->close();
    //header("Location: sign-up-login-form/dist/user_landing/index.php");
    die();

  }
  echo "ERROR PLEASE CHOOSE A CONTEST STAGE";
  die();
  // $stmt->execute();
  // echo "registration succesgul";
  // $stmt->close();
  // $conn->close();
}


// else{ //send to database
//   $host = "localhost";
//   $dbUsername = "root";
//   $dbPassword = "";
//   $dbName = "registration_storage";
//
//   //create connection
//   $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
//
//   if(mysq_connect_error()){
//     die('Connect Error('. mysqli_connect_errorno(). ')' . mysqli_connect_error());
//   }
//   else {
//     $SELECT = "SELECT email From general Where email = ? Limit 1";
//     $INSERT = "INSERT Into general (name, email, country, organization, stage) values (?,?,?,?,?)";
//
//     //prepaere statement
//     $stmt = $conn->prepare($SELECT);
//     $stmt->bind_param("s",$email);
//     $stmt->execute();
//     $stmt->bind_result($email);
//     $stmt->store_result($email);
//     $rnum = $stmt->num_rows;
//
//     if($rnum == 0){
//       $stmt->close();
//
//       $stmt = $conn->prepare($INSERT);
//       $stmt->bind_param("sssss", $name, $email, $country, $organization, $stage);
//       $stmt->execute();
//       echo "You have sucessfully registered! The SESH team will be in touch with you shortly.";
//     }
//     else{
//       echo "You have already registered using this email";
//     }
//     $stmt->close();
//     $conn->close();
//
//
//   }
// }

?>
