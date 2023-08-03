<?php include 'filesLogic.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books World |</title>
    <!-- Render All Elements Normally -->
    <link rel="stylesheet" href="css/normalize.css" />

    <!-- start bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- end bootstrap -->

    <!-- Main CSS File -->
    <link rel="stylesheet" href="css/file.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500;600;700&display=swap" rel="stylesheet">
    <!-- my fontAwesome -->
    <script src="https://kit.fontawesome.com/0753c62cdd.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Start Header -->
    <div class="header img-header">
        <div class="container">
            <div class="logo">
                <a href="home.php">
                    <p>Books<span>/World</span></p>
                </a>
            </div>
            <div class="links">
                <span class="icon">
                    <!-- we use span to design icon -->
                    <span></span><!-- first line -->
                    <span></span><!-- line two -->
                    <span></span><!-- line three -->
                </span>
                <ul>
                    <?php session_start(); ?>

                    <li><a href="home.php">Home</a></li>
                    <li><a href="home.php?#services">Services</a></li>
                    <li><a href="home.php?#books">Books</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a class="active" href="about.php">About</a></li>
                    <?php if ($_SESSION['login'] == "admin") { ?>
                        <li><a href="admin.php">Admin</a></li>
                    <?php } ?>
                    <li><a href="index.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- start Thoughts -->
    <div class="thoughts">
        <h2 class="main-heading">thoughts</h2>
        <div class="container-fluid">
            <div class="thought c-1">
                <p>Your greatness lies in every moment you decided to surrender but then you did not</p>
            </div>
            <div class="thought c-2">
                <p>Keep going .. sometimes you win, sometimes you learn</p>
            </div>
            <div class="thought c-3">
                <p>Sometimes you don't get what you want because you deserve better</p>
            </div>
            <div class="thought c-4">
                <p>Give yourself a break. You deserve it</p>
            </div>
            <div class="thought c-2">
                <p>Your imagination is your world where there aren't impossible</p>
            </div>
            <div class="thought c-3">
                <p>One day you will thank yourself for not giving up</p>
            </div>
            <div class="thought c-4">
                <p>What makes you different, makes you beautiful</p>
            </div>
            <div class="thought c-1">
                <p>Don't give up</p>
            </div>
            <div class="thought c-3">
                <p>The more you live your discussions, the less you need others to love them</p>
            </div>
            <div class="thought c-1">
                <p>Every pain gives a lesson and every lesson changes a person</p>
            </div>
            <div class="thought c-1">
                <p>Your greatness lies in every moment you decided to surrender but then you did not</p>
            </div>
            <div class="thought c-2">
                <p>Keep going .. sometimes you win, sometimes you learn</p>
            </div>
        </div>
    </div>
    <!-- end Thoughts -->
    <!-- start team -->
    <div class="team">
        <h2 class="main-heading">Team Members</h2>
        <div class="container">
            <div class="box">
                <div class="data">
                    <img src="images/avatar-02.png" alt="" />
                    <div class="social">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="text">
                    <h3>Hamada Assi</h3>
                    <p>hamada98assi@gmail.com<br>
                        059 584 6672</p>
                </div>
            </div>
            <div class="box">
                <div class="data">
                    <img src="images/avatar-04.png" alt="" />
                    <div class="social">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="text">
                    <h3>Hamada Assi</h3>
                    <p>hamada98assi@gmail.com<br>
                        059 584 6672</p>
                </div>
            </div>
            <div class="box">
                <div class="data">
                    <img src="images/avatar-05.png" alt="" />
                    <div class="social">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="text">
                    <h3>Hamada Assi</h3>
                    <p>hamada98assi@gmail.com<br>
                        059 584 6672</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end team -->
    <!-- strat testimonials -->
    <div class="testimonials">
        <h2 class="main-heading">TESTIMONIALS</h2>
        <div class="container">
            <div class="box">
                <img src="images/avatar-01.png" alt="" />
                <h3>Hamada Assi</h3>
                <span class="title">Full Stack Developer</span>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est
                    natus
                    quaerat ducimus
                </p>
            </div>
            <div class="box">
                <img src="images/avatar-02.png" alt="" />
                <h3>Abdullah Assi</h3>
                <span class="title">Full Stack Developer</span>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est
                    natus
                    quaerat ducimus
                </p>
            </div>
            <div class="box">
                <img src="images/avatar-03.png" alt="" />
                <h3>Bara Mafarjeh</h3>
                <span class="title">Full Stack Developer</span>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est
                    natus
                    quaerat ducimus
                </p>
            </div>
            <div class="box">
                <img src="images/avatar-04.png" alt="" />
                <h3>Hamza Mousa</h3>
                <span class="title">Full Stack Developer</span>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est
                    natus
                    quaerat ducimus
                </p>
            </div>
            <div class="box">
                <img src="images/avatar-05.png" alt="" />
                <h3>Ahmad Assi</h3>
                <span class="title">Full Stack Developer</span>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est
                    natus
                    quaerat ducimus
                </p>
            </div>
            <div class="box">
                <img src="images/avatar-06.png" alt="" />
                <h3>Doaa Assi</h3>
                <span class="title">Full Stack Developer</span>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est
                    natus
                    quaerat ducimus
                </p>
            </div>
        </div>
    </div>
    <!-- end testimonials -->
    <!-- start footer -->
    <div class="footer">
        <div class="container">
            <div class="logo">
                <p>Books<span>/World</span></p>
            </div>
            <p>We Are Social</p>
            <div class="social-icons">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fas fa-home"></i>
                <i class="fab fa-linkedin"></i>
            </div>
        </div>
    </div>
    <!-- end footer -->
</body>

</html>