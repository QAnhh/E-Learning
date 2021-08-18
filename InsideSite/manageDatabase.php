<?php
session_start();
if(isset($_SESSION['id'])){
    
    require_once "progress/dbConnect.php";
    ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/imgdb/eel.ico" type="image/ico" />

    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/cssdb/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
          <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
            <!-- /top navigation -->
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-rocket"></i> <span>Adminator</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="img/imgdb/ntluon.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Database</h3>
                <ul class="nav side-menu">                       
                    <li><a href="manageDatabase.php?page=batch_exercises">Batch Exercises</a></li>
                    <li><a href="manageDatabase.php?page=class_rooms">Classroom</a></li>
                    <li><a href="manageDatabase.php?page=classroom_units">Classroom Units</a></li>
                    <li><a href="manageDatabase.php?page=files">Files</a></li>
                    <li><a href="manageDatabase.php?page=students">Students</a></li>
                    <li><a href="manageDatabase.php?page=student_classrooms">Student Classrooms</a></li>
                    <li><a href="manageDatabase.php?page=student_exercises_submissions">Student Exercises Submissions</a></li>
                    <li><a href="manageDatabase.php?page=student_register_topics">Student Register Topics</a></li>
                    <li><a href="manageDatabase.php?page=topic_exercises">Topic Exercises</a></li>
                    <li><a href="manageDatabase.php?page=user_">User</a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="loginAdmin.php">
                <span class="fa fa-sign-out" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- page content -->

        <!-- /page content -->

        
      

    <!-- jQuery -->
    <script src="js/jsdb/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/jsdb/bootstrap.bundle.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="js/jsdb/custom.min.js"></script>
    
        <?php
        $page = $_GET['page']??'batch_exercises';
        switch ($page)
        {
            case 'batch_exercises':
                include_once 'displayDB/batch_exercises.php';
                break;
            case 'class_rooms':
                include_once 'displayDB/class_rooms.php';
                break;
            case 'classroom_units':
                include_once 'displayDB/classroom_units.php';
                break;
            case 'comments':
                include_once 'displayDB/comments.php';
                break;
            case 'comment_submissions':
                include_once 'displayDB/comment_submissions.php';
                break;
            case 'email_logs':
                include_once 'displayDB/email_logs.php';
                break;
            case 'files':
                include_once 'displayDB/files.php';
                break;
            case 'permissions':
                include_once 'displayDB/permissions.php';
                break;
            case 'posts':
                include_once 'displayDB/posts.php';
                break;
            case 'roles':
                include_once 'displayDB/roles.php';
                break;
            case 'role_permissions':
                include_once 'displayDB/role_permissions.php';
                break;
            case 'students':
                include_once 'displayDB/students.php';
                break;
            case 'student_attendances':
                include_once 'displayDB/student_attendances.php';
                break;
            case 'student_classrooms':
                include_once 'displayDB/student_classrooms.php';
                break;
            case 'student_exercises_submissions':
                include_once 'displayDB/student_exercises_submissions.php';
                break;
            case 'student_register_topics':
                include_once 'displayDB/student_register_topics.php';
                break;
            case 'topic_exercises':
                include_once 'displayDB/topic_exercises.php';
                break;
            case 'user_':
                include_once 'displayDB/user_.php';
                break;
            case 'user_roles':
                include_once 'displayDB/user_roles.php';
                break;
            default :
                include_once 'displayDB/batch_exercises.php';
        }
        ?>
    </div>
</body>
</html>
<?php
}
else{
   header("location:loginAdmin.php");
}
?>
