<!--::footer_part start::-->
<footer class="footer_part">
    <div class="footer_iner">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-8">
                    <div class="footer_menu">
                        <div class="footer_logo">
                            <a href="index.php"><img src="img/logo.png" alt="#"></a>
                        </div>
                        <div class="footer_menu_item">
                            <a href="index.php">Home</a>
                            <a href="index.php?page=about">About</a>
                            <a href="index.php?page=product">Live Class</a>
                            <a href="">Documents</a>
                            <a href="index.php?page=contact">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="social_icon">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright_part">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <P>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            &copy;<script>
                                document.write(new Date().getFullYear());
                            </script></a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </P>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--::footer_part end::-->
<div class="action" onclick="actionToggle();">
    <span><i class="fas fa-bell"></i></span>
    <ul>
        <li><?php
            if ($student->is_loggedin()) {
                if (isset($_SESSION['student_code']) && $_SESSION['student_code'] === $_SESSION['code']) {
                    $rowClass = "SELECT * FROM `class_rooms` WHERE `id` = '" . $_SESSION['class_id'] . "'";
                    $classname = $conn->query($rowClass)->fetch();
                    echo "Bạn đã được thêm vào lớp " . $classname['class_name'] . "";
                } else {
                    echo "Không có thông báo";
                }
            } else {
                echo "Bạn phải đăng nhập";
            }
            ?></li>
    </ul>
</div>
<script type="text/javascript">
    function actionToggle() {
        var action = document.querySelector('.action');
        action.classList.toggle('active')
    }
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    .action {
        position: fixed;
        bottom: 50px;
        right: 50px;
        width: 40px;
        height: 40px;
        background: gray;
        border-radius: 50%;
        box-shadow: 0 5px 5px rgb(252, 246, 246);
    }

    .action span {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-size: 2em;
        transition: 0.3s ease-in-out;
    }

    .action.active span {
        transform: rotate(360deg);
    }

    .action ul {
        position: absolute;
        bottom: 55px;
        background: gray;
        min-width: 250px;
        padding: 20px;
        border-radius: 20px;
        opacity: 0;
        visibility: hidden;
        transition: 0.3s;
        right: -30px;
    }

    .action.active ul {
        bottom: 65px;
        opacity: 1;

        visibility: visible;
        transition: 0.3s;
    }

    .action.active ul li {
        list-style: none;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 50px 0;
        transition: 0.3s;
    }

    .action ul li:hover {
        font-weight: 600;
    }

    .action ul li:not(:last-child) {
        border-bottom: 1px solid rgb(8, 7, 7);
    }
</style>