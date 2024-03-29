//MY FILE
<?php
  session_start();
  // echo $_SESSION['u_first'];

?>

<!doctype html>
<html lang="en">

<head>


    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title><?php echo $_SESSION['u_first']; ?> - Crowdsourcing Profile</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/SESH_logo.jpeg" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">

    <?php
        //see if there are any contests under this user
        $conn = new mysqli('localhost', 'root', '', 'registration_storage');
        $sql ="SELECT * FROM general WHERE email = '$_SESSION[u_email]' ";

        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);


        $all_early = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM early_storage"));
        $all_mid = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM mid_storage"));
        $all_completed = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM completed_storage"));

        $all_contests = $all_early + $all_mid + $all_completed;

      ?>

      <style>
          hr {
            border-top: 1px solid #007bff;
            width:70%;
          }

          a {color: #000;}


          .card{
            background-color: #FFFFFF;
            padding:0;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius:4px;
            box-shadow: 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.3);
          }


          .card:hover{
            box-shadow: 0 16px 24px 2px rgba(0,0,0,0.14), 0 6px 30px 5px rgba(0,0,0,0.12), 0 8px 10px -5px rgba(0,0,0,0.3);
            color:black;
          }

          address{
          margin-bottom: 0px;
          }




          #author a{
          color: #fff;
          text-decoration: none;

          }
      </style>

</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader_34">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER ENDS START ======-->

    <!--====== HEADER PART START ======-->

    <header id="home" class="header-area">
        <div class="navigation fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.php">
                                <img src="assets/images/SESH_logo.jpeg" alt="Logo" width="100" height="100">
                            </a> <!-- Logo -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active"><a class="page-scroll" href="#home">Home</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#about">About</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#service">Contests</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#call-to-action">Search</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#pricing">Resources</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#contact">Contact</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="logout.php"><font color="red"><b>Logout</b></font> </a></li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navigation -->

        <div id="parallax" class="header-content d-flex align-items-center">
            <div class="header-shape shape-one layer" data-depth="0.10">
                <img src="assets/images/banner/shape/shape-1.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-tow layer" data-depth="0.30">
                <img src="assets/images/banner/shape/shape-2.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-three layer" data-depth="0.40">
                <img src="assets/images/banner/shape/shape-3.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-fore layer" data-depth="0.60">
                <img src="assets/images/banner/shape/shape-2.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-five layer" data-depth="0.20">
                <img src="assets/images/banner/shape/shape-1.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-six layer" data-depth="0.15">
                <img src="assets/images/banner/shape/shape-4.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-seven layer" data-depth="0.50">
                <img src="assets/images/banner/shape/shape-5.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-eight layer" data-depth="0.40">
                <img src="assets/images/banner/shape/shape-3.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-nine layer" data-depth="0.20">
                <img src="assets/images/banner/shape/shape-6.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-ten layer" data-depth="0.30">
                <img src="assets/images/banner/shape/shape-3.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="header-content-right">
                            <h4 class="sub-title">Welcome</h4>
                            <h1 class="title"><?php echo "{$_SESSION['u_first']}" ?> <?php echo $_SESSION["u_last"]; ?></h1>
                            <a class="main-btn" href="#service">My Contests</a>
                        </div> <!-- header content right -->
                    </div>
                    <div class="col-lg-6 offset-xl-1">
                        <div class="header-image d-none d-lg-block">
                            <img src="assets/images/banner/hero2.png" alt="hero">
                        </div> <!-- header image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <!-- <div class="header-social">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header-social-icon">
                                <ul>
                                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                    <li><a href="#"><i class="lni-behance-original"></i></a></li>
                                    <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  -->

        </div> <!-- header content -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== ABOUT ME PART START ======-->

    <section id="about" class="about-area pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h2 class="title">About Me</h2>
                        <!-- <p>Nunc id dui at sapien faucibus fermentum ut vel diam. Nullam tempus, nunc id efficitur sagittis, urna est ultricies eros, ac porta sem turpis quis leo.</p> -->
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50">
                        <h5 class="about-title"><?php echo $_SESSION["u_first"]; ?>  <?php echo $_SESSION["u_last"]; ?></h5>
                        <!-- <p>Lo  rem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> -->
                        <ul class="clearfix">
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-calendar"></i>
                                    </div>
                                    <div class="info-text">
                                          <p><span>Joined the SESH Clinic:</span> </br><?php
                                            $datestring =  $_SESSION["u_timestamp"];
                                            $pieces = explode(" ", $datestring);
                                            echo $pieces[0];
                                          ?></p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-envelope"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Email:</span> <?php echo $_SESSION["u_email"]; ?></p>
                                    </div>
                                </div> <!-- single info -->
                            </li>

                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-map-marker"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Location:</span> <?php echo $_SESSION["u_country"]; ?></p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                        </ul>
                    </div> <!-- about content -->
                </div>
                <?php
                    $earlyCount = 0;
                    $midCount = 0;
                    $completeCount = 0;
                    while($row = mysqli_fetch_array($result)){
                      $stage = $row['stage'];
                      if($stage == 'Early'){
                          $earlyCount++;
                      }elseif ($stage == 'Mid') {
                          $midCount++;// code...
                      }elseif ($stage == 'Completed') {
                          $completeCount++;// code...
                      }
                    }

                  ?>

                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="about-skills pt-25">
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <h6 class="skill-title">Early</h6>
                                <div class="skill-percentage">
                                    <div class="count-box counted">
                                        <span class="counter"><?php if($numRows > 0){echo round($earlyCount*100/$numRows);}else{echo "0";} ?></span>
                                    </div>
                                    %
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="<?php if($numRows > 0){echo round($earlyCount*100/$numRows);}else{echo "0";} ?>"></div>
                                </div>
                            </div>
                        </div> <!-- skill item -->
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <h6 class="skill-title">Mid</h6>
                                <div class="skill-percentage">
                                    <div class="count-box counted">
                                        <span class="counter"><?php if($numRows > 0){echo round($midCount*100/$numRows);}else{echo "0";} ?></span>
                                    </div>
                                    %
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="<?php if($numRows > 0){echo round($midCount*100/$numRows);}else{echo "0";} ?>"></div>
                                </div>
                            </div>
                        </div> <!-- skill item -->
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <h6 class="skill-title">Complete</h6>
                                <div class="skill-percentage">
                                    <div class="count-box counted">
                                        <span class="counter"><?php if($numRows > 0){echo round($completeCount*100/$numRows);}else{echo "0";} ?></span>
                                    </div>
                                    %
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="<?php if($numRows > 0){echo round($completeCount*100/$numRows);}else{echo "0";} ?>"></div>
                                </div>
                            </div>
                        </div> <!-- skill item -->
                        <!-- <div class="skill-item mt-25">
                            <div class="skill-header">
                                <h6 class="skill-title">Sketch</h6>
                                <div class="skill-percentage">
                                    <div class="count-box counted">
                                        <span class="counter">90</span>
                                    </div>
                                    %
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="90"></div>
                                </div>
                            </div>
                        </div> -->
                         <!-- skill item -->
                    </div> <!-- about skills -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== MY CONTESTS PART START ======-->

    <section id="service" class="services-area gray-bg pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-30">
                        <h2 class="title">My Contests</h2>

                        <?php

                          $conn = new mysqli('localhost', 'root', '', 'registration_storage');
                          $sql ="SELECT * FROM general WHERE email = '$_SESSION[u_email]' ";

                          $result = mysqli_query($conn, $sql);
                          $numRows = mysqli_num_rows($result);
                          //see if there are any contests under this user
                          if($numRows > 0){
                            echo "<p>You have created <b>". $numRows. "</b> challenges. To create a new contest, click below! </br></a>.</p>";
                          }
                          else{
                            echo "<p>You have not yet created a contest. Create a new contest to gain access to our resources! </br></a>.</p>";
                          }
                          ?>

                        <a class="main-btn" href="../../../register_form2.php?contest_name=new">New Contest</a>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->



<!-- HTML CODE displays only if there are contests available-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
      <div class="container-fluid">
        <div class="row">

        <?php
            for ($x = 0; $x < $numRows; $x++) {

              $row = mysqli_fetch_array($result);
        ?>

        <!-- <h3>   <?php //echo $row['contest_name']; ?></br></h3> -->


            <!-- <a href="../../../register_form2.html"> -->
              <div class="col-md-4 mt-5">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title"> <?php echo $row['stage']. ": ". $row['contest_name']; ?> </h5>
                        <p><?php

                        $conn = new mysqli('localhost', 'root', '', 'registration_storage');

                        $sqli ="SELECT * FROM general WHERE contest_name = '$row[contest_name]' ";
                        $result2 = mysqli_query($conn, $sqli);
                        $general_row = mysqli_fetch_assoc($result2);

                        if($general_row['stage'] == "Early"){
                          $sqli ="SELECT * FROM early_storage WHERE contest_name = '$row[contest_name]' ";
                          $result2 = mysqli_query($conn, $sqli);
                          $cur_row = mysqli_fetch_assoc($result2);
                          echo $cur_row['goal'];

                        }elseif ($general_row['stage'] == "Mid") {
                          $sqli ="SELECT * FROM mid_storage WHERE contest_name = '$row[contest_name]' ";
                          $result2 = mysqli_query($conn, $sqli);
                          $cur_row = mysqli_fetch_assoc($result2);
                          echo $cur_row['goal'];

                        }elseif ($general_row['stage'] == "Completed") {
                          $sqli ="SELECT * FROM completed_storage WHERE contest_name = '$row[contest_name]' ";
                          $result2 = mysqli_query($conn, $sqli);
                          $cur_row = mysqli_fetch_assoc($result2);
                          echo $cur_row['goal'];
                        }
                         ?></p>
                        <hr>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11880.492291371422!2d12.4922309!3d41.8902102!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x28f1c82e908503c4!2sColosseo!5e0!3m2!1sit!2sit!4v1524815927977" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <!-- <a href="https://goo.gl/maps/drPW7JdCdy62"><address class="font-italic">Piazza del Colosseo, 1, 00184 Roma RM</address></a> -->
                      </div>
                      <div class="card-footer text-muted">
                        <div class="row">
                          <div class="col">
                            <?php
                              $_SESSION['cur_contest'] = $row['contest_name'];
                              $_SESSION['cur_type'] = $row['stage'];
                              $_SESSION['new_contest'] = false;
                              echo "<a href=\"../../../register_form2.php?contest_name=". $row['contest_name']. " \"><font color=\"blue\">edit</font></a>";
                            ?>
                            <!-- <a href="../../../register_form2.html" onclick="">edit</a> -->

                          </div>
                          <div class="col">
                            <?php
                              $_SESSION['cur_contest'] = $row['contest_name'];
                              $_SESSION['cur_type'] = $row['stage'];
                              // echo "<a href=\"delete_contest.php?contest_name=". $row['contest_name']. " \"><font color=\"red\">delete</font></a>";
                            ?>
                            <a href="delete_contest.php"><font color="red">delete</font></a>
                            <!-- <a><font color="red">delete</font></a> -->
                            <!-- <?php //echo "<a href=\"mailto:" . $_SESSION["u_email"] . "\"";?>><i class="fas fa-envelope"></i></a> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </a>

          <?php
              // echo "The number is: $x <br>";
            }
          ?>

           </div>
         </div>






            <!-- <div class="col s12 m7">
              <div class="card horizontal">
                <div class="card-image">
                  <img src="https://lorempixel.com/100/190/nature/6">
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.</p>
                  </div>
                  <div class="card-action">
                    <a href="#">This is a link</a>
                  </div>
                </div>
              </div>
            </div> -->



            <!-- row -->


        </div> <!-- container -->
    </section>

    <!--====== MY CONTESTS PART ENDS ======-->

    <!--====== CALL TO ACTION PART START ======-->

    <section id="call-to-action" class="call-to-action pt-125 pb-130 bg_cover" style="background-image: url(../../../Home-img.jpg)">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-14 col-lg-12">
                    <div class="call-action-content text-center">
                        <h3 class="action-title">The largest network of crowdsourcing innovation.</h3>
                        <p>
                          <?php
                            if($numRows >0){
                              echo "Since you have created a challenge, you are now part of the world's largest network of crowdsourcing collaborators! </br> Click below to get connected.";
                            }else{
                              echo "Click below to get started connecting with the world's largest network of crowdsourcing collaborators!";
                            }
                           ?>

                          <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua nostrud. -->
                        </p>
                        <ul>
                            <!-- <li><a class="main-btn custom" href="#">download cv</a></li> -->
                            <li><a class="main-btn custom-2" href="#work">Get Connected</a></li>
                        </ul>
                    </div> <!-- call action content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CALL TO ACTION PART ENDS ======-->

    <!--====== WORK PART START ======-->

    <section id="work" class="work-area pt-125 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="section-title pb-25">
                        <h2 class="title">Connect with innovators near you.</h2>
                        <p>Use our personalized search tool to help find contests, people, and materials.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="assets/images/work/w-1.jpg" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">Product Design</h3>
                                <ul>
                                    <li><a class="image-popup" href="assets/images/work/w-1.jpg"><i class="lni-plus"></i></a></li>
                                    <li><a href="#"><i class="lni-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- single work -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="assets/images/work/w-2.jpg" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">Product Design</h3>
                                <ul>
                                    <li><a class="image-popup" href="assets/images/work/w-2.jpg"><i class="lni-plus"></i></a></li>
                                    <li><a href="#"><i class="lni-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- single work -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="assets/images/work/w-3.jpg" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">Product Design</h3>
                                <ul>
                                    <li><a class="image-popup" href="assets/images/work/w-3.jpg"><i class="lni-plus"></i></a></li>
                                    <li><a href="#"><i class="lni-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- single work -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="assets/images/work/w-4.jpg" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">Product Design</h3>
                                <ul>
                                    <li><a class="image-popup" href="assets/images/work/w-4.jpg"><i class="lni-plus"></i></a></li>
                                    <li><a href="#"><i class="lni-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- single work -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="assets/images/work/w-5.jpg" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">Product Design</h3>
                                <ul>
                                    <li><a class="image-popup" href="assets/images/work/w-5.jpg"><i class="lni-plus"></i></a></li>
                                    <li><a href="#"><i class="lni-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- single work -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="assets/images/work/w-6.jpg" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">Product Design</h3>
                                <ul>
                                    <li><a class="image-popup" href="assets/images/work/w-6.jpg"><i class="lni-plus"></i></a></li>
                                    <li><a href="#"><i class="lni-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- single work -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="work-more text-center mt-50">
                        <a class="main-btn" href="#">more works</a>
                    </div> <!-- work more -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== WORK PART ENDS ======-->

    <!--====== PRICING PART START ======-->
    <?php
      $all_early = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM early_storage"));
      $all_mid = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM mid_storage"));
      $all_completed = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM completed_storage"));
    ?>

    <section id="pricing" class="pricing-area gray-bg pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-25">
                        <h2 class="title">Our Resources</h2>
                        <p>Welcome to the first network of crowdsourcing contests! </p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8 col-sm-9">
                    <div class="single-pricing text-center mt-30">
                        <div class="pricing-package">
                            <h4 class="package-title">Early</h4>
                        </div>
                        <div class="pricing-body">
                            <div class="pricing-text">
                                <p>Idea stage contests, with end to end assistance with contest planning.</p>

                                <span class="price"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM early_storage")); ?>
                                   total
                                   <?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM early_storage")) == 1){ echo "contest";} else{ echo "contests";}?></span>
                            </div>

                        </div>
                    </div> <!-- single pricing -->
                </div>
                <div class="col-lg-4 col-md-8 col-sm-9">
                    <div class="single-pricing active text-center mt-30">
                        <div class="pricing-package">
                            <h4 class="package-title">Mid</h4>
                        </div>
                        <div class="pricing-body">
                            <div class="pricing-text">
                                <p>Planning stage contests with full assistance for upcoming contests.</p>
                                <span class="price"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM mid_storage")); ?> total
                                  <?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM mid_storage")) == 1){ echo "contest";} else{ echo "contests";}?></span>
                            </div>

                        </div>
                    </div> <!-- single pricing -->
                </div>
                <div class="col-lg-4 col-md-8 col-sm-9">
                    <div class="single-pricing text-center mt-30">
                        <div class="pricing-package">
                            <h4 class="package-title">Completed</h4>
                        </div>
                        <div class="pricing-body">
                            <div class="pricing-text">
                                <p>Assistance with sharing of contest results.</p>
                                <span class="price"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM completed_storage")); ?> total <?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM completed_storage")) == 1){ echo "contest";} else{ echo "contests";}?></span>
                            </div>

                        </div>
                    </div> <!-- single pricing -->
                </div>


                <!-- <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-service text-center mt-30">
                            <div class="service-icon">
                                <i class="lni-code-alt"></i>
                            </div>
                            <div class="service-content">
                                <h4 class="service-title"><a href="#">Web Design</a></h4>
                                <p>Curabitur vitae magna felis. Nulla ac libero ornare, vestibulum lacus quis blandit enimdicta sunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-service text-center mt-30">
                            <div class="service-icon">
                                <i class="lni-color-pallet"></i>
                            </div>
                            <div class="service-content">
                                <h4 class="service-title"><a href="#contact">Graphic Design</a></h4>
                                <p>Curabitur vitae magna felis. Nulla ac libero ornare, vestibulum lacus quis blandit enimdicta sunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-service text-center mt-30">
                            <div class="service-icon">
                                <i class="lni-mobile"></i>
                            </div>
                            <div class="service-content">
                                <h4 class="service-title"><a href="#">App Design</a></h4>
                                <p>Curabitur vitae magna felis. Nulla ac libero ornare, vestibulum lacus quis blandit enimdicta sunt.</p>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-service text-center mt-30">
                            <div class="service-icon">
                                <i class="lni-vector"></i>
                            </div>
                            <div class="service-content">
                                <h4 class="service-title"><a href="#contact">Refined Materials</a></h4>
                                <p>We have compiled a folder with past contest materials that will help you bring your contest to the next level.</p>
                            </div>
                        </div> <!-- single service -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-service text-center mt-30">
                            <div class="service-icon">
                                <i class="lni-website"></i>
                            </div>
                            <div class="service-content">
                                <h4 class="service-title"><a href="#contact">Contest network</a></h4>
                                <p>With <b><?php echo $all_contests;?></b> total contests registered with our network, you will be part of the largest network of crowdsourcing collaborators. </p>
                            </div>
                        </div> <!-- single service -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-service text-center mt-30">
                            <div class="service-icon">
                                <i class="lni-support"></i>
                            </div>
                            <div class="service-content">
                                <h4 class="service-title"><a href="#contact">Consultancy and Support</a></h4>
                                <p>You will be working with personal SESH mentors that will help you with your contest.</p>
                            </div>
                        </div> <!-- single service -->
                    </div>
                </div>

            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PRICING PART ENDS ======-->

    <!--====== BLOG PART START ======-->


    <!--====== BLOG PART ENDS ======-->

    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area pt-125 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-25">
                        <h2 class="title">Get In Touch</h2>
                        <p>Feel free to reach out to the SESH team at any point! We are here to help you</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-map-marker"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">Address</h6>
                            <p>Guangzhou, China</p>
                        </div>
                    </div> <!-- contact box -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-phone"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">Phone</h6>
                            <p>020 7636 8636</p>
                        </div>
                    </div> <!-- contact box -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-envelope"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">Email</h6>
                            <p>clinic@seshglobal.org</p>
                        </div>
                    </div> <!-- contact box -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-form pt-30">
                        <form id="contact-form" action="mailto:clinic@seshglobal.org" method="post" >
                            <div class="single-form">
                                <input type="text" name="name" placeholder="Name">
                            </div> <!-- single form -->
                            <div class="single-form">
                                <input type="email" name="email" placeholder="Email">
                            </div> <!-- single form -->
                            <div class="single-form">
                                <textarea name="message" placeholder="Message"></textarea>
                            </div> <!-- single form -->
                            <p class="form-message"></p>
                            <div class="single-form">
                                <button class="main-btn" type="submit">Send Message</button>
                            </div> <!-- single form -->
                        </form>
                    </div> <!-- contact form -->
                </div>
                <div class="col-lg-6">
                    <div class="contact-map mt-60">
                        <div class="gmap_canvas">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9930.324421317933!2d-0.1302803!3d51.5209007!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8089d33bffbf9f00!2sLondon+School+of+Hygiene+%26+Tropical+Medicine!5e0!3m2!1sen!2suk!4v1562344053597!5m2!1sen!2suk" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                          <!--
                            <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe> -->
                        </div>
                    </div> <!-- contact map -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area">
        <div class="footer-widget pt-130 pb-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="footer-content text-center">
                            <a href="index.php">
                                <img src="assets/images/SESH_long.jpg" alt="Logo">
                            </a>
                            <p class="mt-">
                              The SESH (Social Entrepreneurship to Spur Health) project is a partnership joining individuals from the Southern Medical University Dermatology Hospital and the University of North Carolina-Project China. The main goal of this project is to create more creative, equitable, and effective health services using crowdsourcing contests and other social entrepreneurship tools. Crowdsourcing is the process of having a group solve a problem and then sharing that solution widely with the public.
                            </p>
                            <ul>
                                <li><a href="https://www.facebook.com/seshglobal/"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="https://twitter.com/sesh_global"><i class="lni-twitter-original"></i></a></li>
                            </ul>
                        </div> <!-- footer content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->

        <div class="footer-copyright pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text text-center pt-20">
                            <p>Copyright © 2022.  <a href="https://uideck.com" rel="nofollow">UIdeck</a></p>
                        </div> <!-- copyright text -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->

    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->







    <!--====== jquery js ======-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Parallax js ======-->
    <script src="assets/js/parallax.min.js"></script>

    <!--====== Counter Up js ======-->
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>


    <!--====== Appear js ======-->
    <script src="assets/js/jquery.appear.min.js"></script>

    <!--====== Scrolling js ======-->
    <script src="assets/js/scrolling-nav.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>


    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

</body>

</html>
