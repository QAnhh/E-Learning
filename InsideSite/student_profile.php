<?php
    session_start();
    require_once "progress/dbConnect.php";
    $sql = "select * from students where id like '".$_SESSION['id']."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $name = $row['name'];
    $birthday = $row['birthday'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
    $image = $row['image_url'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>User profile with friends and chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style_profile.css">
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdeys">
    <div class="row" id="user-profile">
        <div class="col-lg-3 col-md-4 col-sm-4">
            <div class="main-box clearfix">
                <h2><?php print($name);?> </h2>
                <div class="profile-status">
                    <i class="fa fa-check-circle"></i> Online
                </div>
                <img src="img/phoenix.jpg" alt="" class="profile-img img-responsive center-block">
                <div class="profile-label">
                    <span class="label label-danger">Student</span>
                </div>
                <nav class="side-menu">
        				<ul class="nav">
        					<li class="active"><a href="student_profile.php"><span class="fa fa-user"></span> Profile</a></li>
        					<li><a href="#"><span class="fa fa-cog"></span> Settings</a></li>
        					<li><a href="#"><span class="fa fa-calendar"></span> Schedule</a></li>
        					<li><a href="#"><span class="fa fa-envelope"></span> Messages</a></li>
        					<li><a href="#"><span class="fa fa-clock-o"></span> Reminders</a></li>
        				</ul>
        			</nav>

                <div class="profile-message-btn center-block text-center">
                    <a href="#" class="btn btn-success">
                        <i class="fa fa-envelope"></i> Send message
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-8 col-sm-8">
            <div class="main-box clearfix">
                <div class="profile-header">
                    <h3><span>User info</span></h3>
                        <tr>
                            <a href="edit_profile.php" class="btn btn-primary edit-profile">
                            <i class="fa fa-pencil-square fa-lg"></i> Edit profile
                            </a>
                        </tr>
                        <tr>
                            <a href="index.php" class="btn btn-primary pull-right back">
                            <i class="fa fa-repeat "></i> Back
                            </a>
                        </tr>
                </div>
                <div class="row profile-user-info">
                    <div class="col-sm-8">
                        <div class="profile-user-details clearfix">
                            <div class="profile-user-details-label">
                                Full name
                            </div>
                            <div class="profile-user-details-value">
                                <?php print($name);?>
                            </div>
                        </div>
                        <div class="profile-user-details clearfix">
                            <div class="profile-user-details-label">
                                Birthday
                            </div>
                            <div class="profile-user-details-value">
                                <?php print($birthday);?>
                            </div>
                        </div>
                        <div class="profile-user-details clearfix">
                            <div class="profile-user-details-label">
                                Email
                            </div>
                            <div class="profile-user-details-value">
                                <?php print($email);?>
                            </div>
                        </div>
                        <div class="profile-user-details clearfix">
                            <div class="profile-user-details-label">
                                Phone
                            </div>
                            <div class="profile-user-details-value">
                                <?php print($phone);?>
                            </div>
                        </div>
                        <div class="profile-user-details clearfix">
                            <div class="profile-user-details-label">
                                Address
                            </div>
                            <div class="profile-user-details-value">
                                <?php print($address);?>
                            </div>
                        </div>
                        
                    </div>
                                       
                <div class="tabs-wrapper profile-tabs">

                        <div class="tab-pane fade" id="tab-friends">
                            <ul class="widget-users row">
                                <li class="col-md-6">
                                    <div class="img">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="name">
                                            <a href="#">John Doe </a>
                                        </div>
                                        <div class="type">
                                            <span class="label label-danger">Admin</span>
                                        </div>
                                    </div>
                                </li>
                                        <div class="clearfix">
                                            <button type="submit" class="btn btn-success pull-right">Send message</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>