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
                <a href="index.php">
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
                    <li><a class="active" href="contact.php">Contact</a></li>
                    <li><a href="about.php">About</a></li>
                    <?php if ($_SESSION['login'] == "admin") { ?>
                        <li><a href="admin.php">Admin</a></li>
                    <?php } ?>
                    <li><a href="index.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <div class="contact">
        <h2 class="main-heading">CONTACT US</h2>
        <div class="text">
            <p>For queries about an order you have placed please contact us
                by email <br> at <span>hamada98assi@gmail.com</span> or
                by phone on <span>059 584 6672</span>.</p>

            <p>For general customer enquiries you can call <span>056 870 1274</span> or fill in <br>
                the enquiry form below and one of our
                colleagues will get back to <br> you as soon as possible.
            </p>
        </div>
        <div class="container">
            <form action="contact.php" method="post">
                <input type="text" name="name" required placeholder="Your Name">
                <input type="email" name="email" required placeholder="Your Email">
                <input type="text" name="subjects" required placeholder="Your subject">
                <textarea name="message" required placeholder="Your Message"></textarea>
                <button type="submit" name="contact">SEND</button>
            </form>
        </div>
    </div>
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