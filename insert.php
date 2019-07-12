<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'registration_storage');
if($conn->connect_error){
  die('Connect Failed : '.$conn->connect_error);
}


$email = mysqli_real_escape_string($conn, $_SESSION['u_email']);
$country = mysqli_real_escape_string($conn, $_POST['country']);
$organization = mysqli_real_escape_string($conn, $_POST['organization']);
$stage = mysqli_real_escape_string($conn, $_POST['stage']);
// $contest_name = $_POST['contest_name'];

if($_SESSION['new_contest'] == true){
    $contest_name = $_POST['contest_name'];
}
else{
    if(!$_SESSION['new_contest'] && $_SESSION['cur_type'] != $stage){ //if you are editing and changing stages
      //then delete the old entry

      $sql ="DELETE FROM general WHERE contest_name = '$_SESSION[cur_contest]' ";

      if (mysqli_query($conn, $sql) == true) {
          echo "GENERAL Records deleted successfully";
      } else {
          echo "Error editing general record: ";
      }

      $sql2 = NULL;
      if($_SESSION['cur_type'] == "Early"){
        $sql2 ="DELETE FROM early_storage WHERE contest_name = '$_SESSION[cur_contest]' ";

      }elseif ($_SESSION['cur_type'] == "Mid") {
        $sql2 ="DELETE FROM mid_storage WHERE contest_name = '$_SESSION[cur_contest]' ";
      }elseif ($_SESSION['cur_type'] == "Completed") {
        $sql2 ="DELETE FROM completed_storage WHERE contest_name = '$_SESSION[cur_contest]' ";
      }

      if (mysqli_query($conn, $sql2) == true) {
          echo $_SESSION['cur_type']. "Records deleted successfully";
      } else {
          echo "Error deleting ". $_SESSION['cur_type'].  " from records";
      }

      // treat this entry as a new one
      $_SESSION['new_contest'] = true;
    }
    //regardless, contest name stays the same
    $contest_name = $_SESSION['cur_contest'];

}


  $sql ="SELECT * FROM general WHERE contest_name = '$_SESSION[cur_contest]'";
  $result = mysqli_query($conn, $sql);

  $resultCheck = mysqli_num_rows($result);

  echo $contest_name;
  echo $_SESSION['new_contest'];

  if($resultCheck > 0 && $_SESSION['new_contest']){ //check if user has been taken and if its a new contest
    echo "error, this contest name has already has been registered";
    exit();
    die();
  }

    if(!$_SESSION['new_contest']){ // if its not a new contest, remove the old entry in database
      $sql2 = "UPDATE general
          SET country = '$country',
          organization = '$organization',
          stage = '$stage'
      WHERE contest_name = '$_SESSION[cur_contest]' ";

      // $sql2 = "UPDATE general
      //     SET organization = '$organization'
      //     -- SET stage = '$stage'
      // WHERE contest_name = '$_SESSION[cur_contest]' ";

      if (mysqli_query($conn, $sql2) == true) {
          echo "GENERAL Record edited successfully";
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
      $sql2 = "UPDATE early_storage
          SET goal= '$early_goal',
           contest_type = '$early_contest_type',
           field = '$early_field',
           online = '$early_online',
           comments = '$early_comments'
      WHERE contest_name = '$_SESSION[cur_contest]' ";


      if (mysqli_query($conn, $sql2) == true) {
          echo "EARLY Record edited successfully";
      } else {
          echo "Error editing EARLY record: ";
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
    header("Location: sign-up-login-form/user_landing/index.php");
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
        $sql2 = "UPDATE mid_storage
            SET goal= '$mid_goal',
             contest_type = '$mid_contest_type',
             field = '$mid_field',
             online = '$mid_online',

             target = '$mid_target',
             entry_type = '$mid_entry_type',
             promotion_strategy = '$mid_promotion_strategy',
             team_size = '$mid_team_size',
             partners = '$mid_partners',
             contest_date = '$mid_contest_date',
             comments = '$mid_comments'

        WHERE contest_name = '$_SESSION[cur_contest]' ";

        if (mysqli_query($conn, $sql2)) {
            echo "MID Record edited successfully";
        } else {
            echo "Error editing MID record: ";
        }
      }
      else{
        $stmt = $conn->prepare("insert into mid_storage(goal, contest_type, field, online, target,
        entry_type, promotion_strategy, team_size, partners, contest_date, comments, email, contest_name)
        values(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssssssss",$mid_goal,$mid_contest_type, $mid_field,$mid_online,
        $mid_target, $mid_entry_type, $mid_promotion_strategy, $mid_team_size,
        $mid_partners, $mid_contest_date, $mid_comments, $email, $contest_name);

        $stmt->execute();
        $stmt->close();

      }
      echo "Your mid registration has been submitted!";
      $conn->close();
      header("Location: sign-up-login-form/user_landing/index.php");
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
      $sql2 = "UPDATE completed_storage
          SET goal= '$completed_goal',
           contest_type = '$completed_contest_type',
           field = '$completed_field',
           online = '$completed_online',

           target = '$completed_target',
           entry_type = '$completed_entry_type',
           promotion_strategy = '$completed_promotion_strategy',
           team_size = '$completed_team_size',
           partners = '$completed_partners',
           contest_date = '$completed_contest_date',
           num_submissions = '$completed_num_submissions',
           contest_summary = '$completed_contest_summary',
           contest_sharing = '$completed_contest_sharing',
           shared_links = '$completed_shared_links',
           attachments = '$completed_attachments',

           comments = '$completed_comments'

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
      $stmt->execute();
      $stmt->close();
    }
    echo "Your completed registration has been submitted!";
    $conn->close();
    header("Location: sign-up-login-form/user_landing/index.php?new_contest=registered");
    die();

  }
  echo "ERROR PLEASE CHOOSE A CONTEST STAGE";
  die();
  // $stmt->execute();
  // echo "registration succesgul";
  // $stmt->close();
  // $conn->close();



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
