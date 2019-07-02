<?php
$name = $_POST['name'];
$email = $_POST['email'];
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

if(empty($name) || empty($email) || empty($country) || empty($organization) || empty($stage)){
  echo "All fields are required.";
  die();
}

else{
  //echo "name". $name. "email". $email. "country". $country. "organization". $organization. "stage". $stage;

  $stmt = $conn->prepare("INSERT into general(name, email, country, organization, stage)
  values(?,?,?,?,?)");

  $stmt->bind_param("sssss",$name,$email,$country,$organization,$stage);
  $stmt->execute();
  echo "general submitted";
  // $stmt->close();
  // $conn->close();
  // die();

  if($stage == "Early"){
    $early_goal = $_POST['early_questions'];
    $early_contest_type = $_POST['early_contest_type'];
    $early_field = $_POST['early_field'];
    $early_online = $_POST['early_online'];
    $early_comments = $_POST['early_comments'];

    if(empty($early_goal) || empty($early_contest_type) || empty($early_field) || empty($early_online) || empty($early_comments)){
      echo "make sure to fill out the Early segment fields!";
      die();
    }

    $stmt = $conn->prepare("insert into early_storage(goal, contest_type, field, online, comments)
    values(?,?,?,?,?)");
    $stmt->bind_param("sssss",$early_goal,$early_contest_type, $early_field,$early_online,$early_comments);


    echo "Your early registration has been submitted!";
    $stmt->execute();
    $stmt->close();
    $conn->close();
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

      if(empty($mid_goal) || empty($mid_contest_type) || empty($mid_field) || empty($mid_online) ||
      empty($mid_target) || empty($mid_entry_type) || empty($mid_promotion_strategy) ||
      empty($mid_team_size) || empty($mid_partners) || empty($mid_contest_date) || empty($mid_comments)){
        echo "make sure to fill out the mid segment fields!";
        die();
      }

      $stmt = $conn->prepare("insert into mid_storage(goal, contest_type, field, online, target,
      entry_type, promotion_strategy, team_size, partners, contest_date, comments)
      values(?,?,?,?,?,?,?,?,?,?,?)");
      $stmt->bind_param("sssssssssss",$mid_goal,$mid_contest_type, $mid_field,$mid_online,
      $mid_target, $mid_entry_type, $mid_promotion_strategy, $mid_team_size,
      $mid_partners, $mid_contest_date, $mid_comments);

      echo "Your mid registration has been submitted!";
      $stmt->execute();
      $stmt->close();
      $conn->close();
      die();
  }
  else if($stage == "Completed"){
    echo "inside";
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

    if(empty($completed_goal) || empty($completed_contest_type) || empty($completed_field) || empty($completed_online) ||
    empty($completed_target) || empty($completed_entry_type) || empty($completed_promotion_strategy) ||
    empty($completed_team_size) || empty($completed_partners) || empty($completed_contest_date) ||
    empty($completed_num_submissions) || empty($completed_contest_summary) || empty($completed_contest_sharing) ||
    empty($completed_shared_links) || empty($completed_attachments) || empty($completed_comments)){
      echo "make sure to fill out the completed segment fields!";
      die();
    }

    $stmt = $conn->prepare("insert into completed_storage(goal, contest_type, field, online, target,
    entry_type, promotion_strategy, team_size, partners, contest_date, num_submissions, contest_summary,
    contest_sharing, shared_links, attachments, comments)
    values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssssisssbs",$completed_goal,$completed_contest_type, $completed_field,$completed_online,
    $completed_target, $completed_entry_type, $completed_promotion_strategy, $completed_team_size,
    $completed_partners, $completed_contest_date, $completed_num_submissions, $completed_contest_summary,
    $completed_contest_sharing, $completed_shared_links, $completed_attachments, $completed_comments);

    echo "Your completed registration has been submitted!";
    $stmt->execute();
    $stmt->close();
    $conn->close();
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
