<?php

    if($student->is_loggedin())
    {
        header("Location:index.php");   
    }
    if(isset($_POST['btn-signup']))
    {
       $uname = trim($_POST['txtUsername']);
       $umail = trim($_POST['txtEmail']);
       $upass = trim($_POST['txtPassword']); 
       $upass2 = trim($_POST['txtPassword2']); 
       $ufullname = trim($_POST['txtFullname']);
       $uaddress = trim($_POST['txtAddress']);
       $uphone = trim($_POST['txtPhoneNumber']);
       $ugender = $_POST['rdGender']=='male';
     
       if($uname=="") {
          $error[] = "Nhập username!"; 
       }
       else if($umail=="") {
          $error[] = "Nhập email!"; 
       }
       else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
          $error[] = 'Email phải hợp lệ!';
       }
       else if($upass=="") {
          $error[] = "Nhập password !";
       }
       else if ($upass2!=$upass){
          $error[] = "Mật khẩu phải trùng khớp";
       }
       else if(strlen($upass) < 8){
          $error[] = "Mật khẩu phải dài hơn 7 kí tự"; 
       }
       else
       {
          try
          {
             $stmt = $conn->prepare("SELECT code FROM students WHERE code=:uname");
             $stmt->execute(array(':uname'=>$uname));
             $row=$stmt->fetch(PDO::FETCH_ASSOC);
        
             if($row['code']==$uname) {
                $error[] = "Username bị trùng!";
             }
             else
             {
                $row = array($uname,$ufullname,$umail,password_hash($upass, PASSWORD_DEFAULT),$uaddress,$uphone);
                if($student->register($uname,$upass,$ufullname,$ugender,$umail,$uphone,$uaddress)) 
                {
                	echo "<script>alert('Đăng ký thành công');</script>";
                    header("Location:index.php?page=login");   
                }
             }
         }
         catch(PDOException $e)
         {
            echo $e->getMessage();
         }
      } 
    }

    ?>


<!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>register</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Already a member?</h2>
                            <p>Please sign in below if you are already one of us</p>
                            <a href="index.php?page=login" class="btn_3">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Please fill fields below</h3>
                            <?php
                            if(isset($error))
                            {
                                foreach($error as $err)
                                {
                                    ?>
                                    <div class="alert alert-danger">
                                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $err; ?>
                                    </div>
                                    <?php
                                }
                            }
                            else if(isset($_GET['joined']))
                            {
                                ?>
                                <div class="alert alert-info">
                                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                                </div>
                                <?php
                            }
                            ?>
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="txtUsername" value=""
                                        placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="fullName" name="txtFullname" value=""
                                        placeholder="Fullname">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="txtPassword" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password2" name="txtPassword2" value=""
                                        placeholder="Confirm Password">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="radio" class="" name="rdGender" value="male"> Male
                                    <input type="radio" class="" name="rdGender" value="female"> Female
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="txtEmail" value=""
                                        placeholder="Email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="number" class="form-control" id="phone" name="txtPhoneNumber" value=""
                                        placeholder="Phone number">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="address" name="txtAddress" value=""
                                        placeholder="Address">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Đồng ý với điều khoản sử dụng</label>
                                    </div>
                                    <button type="submit" value="submit" name = "btn-signup" class="btn_3">
                                        đăng ký
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->