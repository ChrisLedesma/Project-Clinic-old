<?php
$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$prod = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';


  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }


 ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Clinic System</title>
    <link href="https://fonts.googleapis.com/css?family=Reem+Kufi|Rubik&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/v4-shims.css">  
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" style="font-family: 'Reem Kufi', sans-serif; text-align: center;">
            <div class="sidebar-header">
                <h3 style="font-family: 'Reem Kufi', sans-serif; text-align: center;">CLINIC SYSTEM</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="index.php">HOME</a>
                </li>
                <li>
                    <a href="index.php?page=app">APPOINTMENT</a>
                </li>
                <li>
                    <a href="index.php?page=pat">PATIENTS</a>
                </li>
                <li>
                    <a href="index.php?page=doc">DOCTORS</a>
                </li>
                <li>
                    <a href="index.php?page=med">MEDICINE</a>
                </li>
                <li>
                    <a href="index.php?page=lab">LABORATORY</a>
                </li>
                <li>
                    <a href="index.php?logout='1'" style="font-family: 'Reem Kufi', sans-serif; color: red;">LOGOUT</a>
                </li>
                <br><br>
                <li>
                  Members: Christian Ledesma <br>
                  Angela Coronel<br>
                  Ron Lim<br>
                </li>
                <li>
                    <a href="https://drive.google.com/file/d/1opjz37vGIJ5NgGCCasi2H7YtNIvAjjiI/view?usp=sharing" target="blank" style="font-family: 'Reem Kufi', sans-serif; color: yellow;">HOW TO USE?</a>
                </li>
            </ul>

            <!--<ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>-->
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <?php
                    switch ($page) {  
                        case 'app':
                            require_once('appList.php');
                            break;
                        case 'pat':
                            require_once('patientList.php');
                            break;
                        case 'doc':
                            require_once('doc/doctor.php');
                            break;
                        case 'med':
                            require_once('meds/meds.php');
                            break;
                        case 'lab':
                            require_once('lab/lab.php');
                            break;
                        case 'checkUp':
                            require_once('checkupForm.php');
                            break;            
                        case 'viewPatient':
                            require_once('patientProfile.php');
                            break;
                        case 'viewDoc':
                            require_once('doc/doctorProfile.php');
                            break;
                        case 'setApp':
                            require_once('setApp.php');
                            break;
                        case 'addPat':
                            require_once('addPatient.php');
                            break; 
                        case 'addDoc':
                            require_once('doc/adddoc.php');
                            break;    
                        case 'editPat':
                            require_once('editPatient.php');
                            break;
                        case 'editDoc':
                            require_once('doc/editdoc.php');
                            break;    
                        case 'addMed':
                            require_once('meds/addmeds.php');
                            break;
                        case 'editMeds':
                            require_once('meds/editmeds.php');
                            break;
                        case 'addLab':
                            require_once('lab/addlab.php');
                            break;
                        case 'editLab':
                            require_once('lab/editlab.php');
                            break;
                        case 'editHistory':
                            require_once('editHistory.php');
                            break;
                        default: 
                            require_once('home.php');
                }
            ?>
            <!--<div class="line"></div>-->

             </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>
