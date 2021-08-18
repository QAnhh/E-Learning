<?php
    //Nếu đã đăng nhập
require_once "progress/dbConnect.php";
if(isset($student) && $student->is_loggedin())
{
    header("Location:index.php");
    ob_end_flush();
}
//Nếu chưa đăng nhập
else {
    if (isset($_POST['btn-submit']))
    {
        $username = $_POST['txtUser'];
        $pass = $_POST['txtPassword'];

    //Nếu đăng nhập thành công
        if($student->login($username,$pass))
        {
            $_SESSION['user'] = $username;
            $sql = "select * from students where code like '".$username."'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id']=$row['id'];
            $_SESSION['ten'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['birthday'] = $row['birthday'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['image_url'] = $row['image_url'];
            echo $_SESSION['ten'];
            header("Location:  index.php"); 
            ob_end_flush();
        }
        else
        {
            $error = "Nhập sai!";
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
                        <h2>login</h2>
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
                            <h2>New to our Website?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="index.php?page=register" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="txtUser" value=""
                                        placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="txtPassword" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div>
                                    <button type="submit" value="submit" class="btn_3" name = "btn-submit">
                                        log in
                                    </button>
                                    <a class="lost_pass" href="#">forget password?</a>
                                </div>
                                <?php
                                if(isset($error))
                                {
                                      ?>
                                      <div class="alert alert-danger">
                                          <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                                      </div>
                                      <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->