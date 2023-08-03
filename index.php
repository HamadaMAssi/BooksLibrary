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
    <div class="header" id="header">
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
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#books">Books</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#about">About</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- start landing -->
    <div class="landing">
        <div class="main-search">
            <form action="index.php?#books" method="post" class="container row">
                <input type="hidden" name="id" placeholder="Book Id" value="">
                <input type="text" name="title" placeholder="Book Name" class="col-sm-8">
                <button type="submit" name="find-book" class="col-sm-4">Search</button>
            </form>
        </div>
        <div class="text">
            <div class="content">
                <h2>Hello World!<br />
                    We Are Books World</h2>
                <p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget
                    tincidunt
                    nibh pulvinar a. Curabitur aliquet quam. Accumsan id imperdiet et, porttitor at sem. Mauris blandit
                    aliquet
                    elit, eget tincidunt.</p>
                <a href="login.php">sign in</a>
            </div>
        </div>
    </div>
    <!-- end landing -->
    <!-- start services -->
    <div class="services" id="services">
        <h2 class="main-heading">Services</h2>
        <div class="container">
            <div class="service">
                <i class="fa-solid fa-download"></i>
                <div class="text">
                    <h2>Download</h2>
                    <p>We provide book download service, This feature is completely free and without ads, All you have
                        to do is press the download button</p>
                </div>
            </div>
            <div class="service">
                <i class="fa-solid fa-book-open-reader"></i>
                <div class="text">
                    <h2>Reading Online</h2>
                    <p>We offer online book reading service, It allows users to browse books without having to download
                        books, This feature is completely free and without ads.</p>
                </div>
            </div>
            <div class="service">
                <i class="fa-solid fa-dollar-sign"></i>
                <div class="text">
                    <h2>Price</h2>
                    <p> All of our services are completely free, We strive to keep our services free and away from ads.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end services -->
    <div class="scroll-up">
        <a href="#header" class="go-up">
            <i class="fa-solid fa-angles-up"></i>
        </a>
    </div>
    <!-- start books -->
    <div class="ads">
        <div class="book-img">
            <img src="images/book.gif" alt="Book.gif">
        </div>
        <div class="text">
            <h2>Get The Best Reading Experience</h2>
            <p>FREE DOWNLOAD • GENRES • BESTSELLERS • BOOK CATALOG</p>
        </div>
    </div>
    <!-- end books -->
    <!-- start books -->
    <div class="books" id="books">
        <h2 class="main-heading">Books</h2>
        <div class="main-search">
            <form action="index.php?#books" method="post" class="container row">
                <input type="hidden" name="id" placeholder="Book Id" value="">
                <input type="text" name="title" placeholder="Book Name" class="col-sm-8">
                <button type="submit" name="find-book" class="col-sm-4">Search</button>
            </form>
        </div>
        <form action="index.php?#books" method="get" class="container category">
            <button type="submit" name="all">ALL</button>
            <button type="submit" name="comic">COMIC</button>
            <button type="submit" name="economic">ECONOMIC</button>
            <button type="submit" name="novel">NOVEL</button>
            <button type="submit" name="policy">POLICY</button>
        </form>
        <div class="bac">
            <div class="container">
                <?php foreach ($files as $file) { ?>
                    <?php if ($find_by === "title") { ?>
                        <?php if (test_input($file['title']) === $find) { ?>
                            <div class="book">
                                <a href="login.php">
                                    <img src="uploads/<?php echo $file['poster']; ?>" alt="poster" class="poster">
                                    <div class="content">
                                        <h3 class="title"><?php echo $file['title'] ?></h3>
                                        <h4 class="auther"><?php echo $file['author'] ?></h4>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } elseif ($set_category === "all") { ?>
                        <div class="book">
                            <a href="login.php">
                                <img src="uploads/<?php echo $file['poster']; ?>" alt="poster" class="poster">
                                <div class="content">
                                    <h3 class="title"><?php echo $file['title'] ?></h3>
                                    <h4 class="auther"><?php echo $file['author'] ?></h4>
                                </div>
                            </a>
                        </div>
                    <?php } elseif ($file['category'] === $set_category) { ?>
                        <div class="book">
                            <a href="login.php">
                                <img src="uploads/<?php echo $file['poster']; ?>" alt="poster" class="poster">
                                <div class="content">
                                    <h3 class="title"><?php echo $file['title'] ?></h3>
                                    <h4 class="auther"><?php echo $file['author'] ?></h4>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- end books -->
    <!-- start contact -->
    <div class="contact" id="contact">
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
            <form action="index.php" method="post">
                <input type="text" name="name" required placeholder="Your Name">
                <input type="email" name="email" required placeholder="Your Email">
                <input type="text" name="subjects" required placeholder="Your subject">
                <textarea name="message" required placeholder="Your Message"></textarea>
                <button type="submit" name="contact">SEND</button>
            </form>
        </div>
    </div>
    <!-- end contact -->
    <div class="wall">

    </div>
    <!-- start about -->
    <!-- start team -->
    <div class="team" id="about">
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
                    <p>Full Stack Developer</p>
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
                    <p>Full Stack Developer</p>
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
                    <p>Full Stack Developer</p>
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
        </div>
    </div>
    <!-- end testimonials -->
    <!-- end about -->
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