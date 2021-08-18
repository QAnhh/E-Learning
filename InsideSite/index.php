<?php
session_start();
require_once "progress/dbConnect.php";
ob_start();
?>
<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Elearning for KMA</title>
</head>

<body>
    <!--::header part start::-->
    <?php
    echo "<div>";
    require 'layout/header.php';
    echo "</div>";
    ?>
    <!-- Header part end-->

    <?php
    $page = $_GET['page'] ?? 'index';
    switch ($page) {
        case 'index':
            include_once 'indexContent.php';
            break;

        case 'userSchedule':
            include_once 'userSchedule.php';
            break;

        case 'product':
            include_once 'product_list.php';
            break;

        case 'pages':
            $action = $_GET['action'] ?? 'login';
            switch ($action) {

                case 'checkout':
                    include_once 'checkout.php';
                    break;

                case 'cart':
                    include_once 'cart.php';
                    break;

                case 'comfirmation':
                    include_once 'comfirmation.php';
                    break;

                case 'elements':
                    include_once 'elements.php';
                    break;
            }
            break;

        case 'blog':
            $action = $_GET['action'] ?? 'blog';
            switch ($action) {

                case 'blog':
                    include_once 'blog.php';
                    break;

                case 'single-blog':
                    include_once 'single-blog.php';
                    break;
            }
            break;
        case 'document':
            include_once 'assignment.php';
            break;
        case 'contact':
            include_once 'contact.php';
            break;

        case 'login':
            include_once 'login.php';
            break;

        case 'register':
            include_once 'register.php';
            break;
    }
    ?>

    <!--::footer_part start::-->
    <?php
    include_once 'layout/footer.php';
    ?>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- magnific popup js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>