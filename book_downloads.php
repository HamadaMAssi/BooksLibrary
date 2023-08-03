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
    <?php $var_value = $_GET['result']; ?>
    <?php foreach ($files as $file) { ?>
        <?php if ($file['id'] === $var_value) { ?>
            <div class="show-book">
                <div class="container row">
                    <div class="poster col-sm-4">
                        <img src="uploads/<?php echo $file['poster']; ?>" alt="poster">
                    </div>
                    <div class="text col-sm-8">
                        <h2><?php echo $file['title']; ?></h2>
                        <div class="info">
                            <p>by <?php echo $file['author']; ?></p>
                            <p><?php echo $file['pages']; ?> page</p>
                            <p>size <?php echo floor($file['size'] / 1000) . 'mb'; ?></p>
                            <p><?php echo $file['category']; ?></p>
                        </div>
                        <div class="description">
                            <p><?php echo $file['description']; ?></p>
                        </div>
                        <div class="download">
                            <a class="button" href="book_downloads.php?file_id=<?php echo $file['id'] ?>">Download</a>
                            <a class="button read" target="_blank" href="book_read.php?file=<?php echo $file['data'] ?> ">Read</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>

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