<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php"> <img src="img/logo.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=userSchedule">Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=product">Live Class</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=document">Documents</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=contact">Contact</a>
                            </li>
                            <?php
                            if (!isset($_SESSION['ten'])) {
                            ?>

                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?page=login">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?page=register">sign up</a>
                                </li>

                            <?php
                            } else {
                            ?>

                                <li class="nav-item">
                                    <p class="nav-link">Hi, <a href="./student_profile.php" style="font-weight: bold"><?php print($_SESSION["ten"]); ?> </a></p>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="progress/pLogout.php"> Thoát</a></span></button>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>


                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>