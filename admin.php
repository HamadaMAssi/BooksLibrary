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
                    <li><a href="home.php">Home</a></li>
                    <li><a href="home.php?#services">Services</a></li>
                    <li><a href="home.php?#books">Books</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a class="active" href="admin.php">Admin</a></li>
                    <li><a href="index.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <div class="admin">
        <h2 class="main-heading">Administration home screen</h2>
        <div class="container">
            <div class="text">
                <h3>welcome</h3>
                <p>
                    You can do one of the following operations: <span>add users</span> or <span>delete and modify</span>
                    their data, and you can also <span>add books</span>, <span>delete and modify them</span>.</p>

                <p>So that the following data must be filled in when adding each book: the <span>title</span> of the
                    book,
                    the <span>name</span> of the
                    author and the <span>classification</span> (comic, political, economic, novel). And
                    <span>upnload</span>
                    the book itself as a file.
                </p>
            </div>
        </div>
    </div>
    <!-- start operations -->
    <div class="operations" id="show">
        <form action="admin.php?#show" method="post" class="container">
            <div class="row">
                <button type="submit" name="books" class="col">show books</button>
                <button type="submit" name="users" class="col">show users</button>
                <button type="submit" name="messages" class="col">show messages</button>
            </div>
        </form>

        <div class="table-area">
            <?php if ($show == "books") { ?>
                <!-- start show books -->
                <div class="show-books">
                    <div class="container">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>title</th>
                                <th>author</th>
                                <th>pages</th>
                                <th>size (in mb)</th>
                                <th>cat</th>
                                <th>poster</th>
                            </tr>
                            <?php foreach ($files as $file) { ?>
                                <tr>
                                    <td><?php echo $file['id']; ?></td>
                                    <td><?php echo $file['title']; ?></td>
                                    <td><?php echo $file['author']; ?></td>
                                    <td><?php echo $file['pages']; ?></td>
                                    <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
                                    <td><?php echo $file['category']; ?></td>
                                    <td><img src="uploads/<?php echo $file['poster']; ?>" alt=""></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <!-- end show books -->
            <?php } elseif ($show == "users") { ?>
                <!-- start show users -->
                <div class="show-users">
                    <div class="container">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Username</th>
                                <th>Password</th>
                            </tr>
                            <?php foreach ($users as $user) { ?>
                                <tr>
                                    <td><?php echo $user['id']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['type']; ?></td>
                                    <td><?php echo $user['username']; ?></td>
                                    <td><?php echo $user['password']; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <!-- end show users -->
            <?php } elseif ($show == "messages") { ?>
                <!-- start show messages -->
                <div class="show-messages" id="show-message">
                    <div class="container">
                        <table>
                            <tr>
                                <th>name</th>
                                <th>email</th>
                                <th>subjects</th>
                                <th>message</th>
                                <th>delete</th>
                            </tr>
                            <?php foreach ($messages as $message) { ?>
                                <tr>
                                    <td><?php echo $message['name']; ?></td>
                                    <td><?php echo $message['email']; ?></td>
                                    <td><?php echo $message['subjects']; ?></td>
                                    <td><?php echo $message['message']; ?></td>
                                    <td><a class="button" href="admin.php?message_id=<?php echo $message['id'] ?>">Delete</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <!-- end show messages -->
            <?php } ?>
        </div>

        <div class="container">
            <div class="row">
                <a href="#add-user" class="button col">ADD USER</a>
                <a href="#add-book" class="button col">ADD BOOKS</a>
                <a href="#edit-user" class="button col">EDIT USER</a>
                <a href="#edit-book" class="button col">EDIT BOOK</a>
                <a href="#delete-user" class="button col">DELETE USER</a>
                <a href="#delete-book" class="button col">DELETE BOOK</a>
                <a href="#search-book" class="button col">search</a>
            </div>
        </div>
    </div>
    <!-- end operations -->
    <!-- ______________________________________________ user ___________________________________________ -->
    <hr>
    <hr>
    <div class="spikes spikes-white-gray"></div>
    <!-- start search for user-->
    <div class="search" id="search-user">
        <div class="container">
            <h2 class="main-heading">find user</h2>
            <form action="admin.php?#search-user" method="post">
                <input type="number" name="id" placeholder="User Id">
                <label for="">or</label>
                <input type="email" name="email" placeholder="User Email">
                <label for="">or</label>
                <input type="text" name="username" placeholder="User Name">
                <button type="submit" name="find-user">find</button>
            </form>
            <div class="table-area">
                <?php if ($find_by == "id") { ?>
                    <?php
                    $sql = "SELECT * FROM users WHERE id='$find' ";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) { ?>
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Username</th>
                                <th>Password</th>
                            </tr>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                </tr>
                            <?php  } ?>
                        </table>
                    <?php  } ?>
                <?php  } elseif ($find_by == "email") { ?>
                    <?php
                    $sql = "SELECT * FROM users WHERE email='$find' ";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) { ?>
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Username</th>
                                <th>Password</th>
                            </tr>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                </tr>
                            <?php  } ?>
                        </table>
                    <?php  } ?>
                <?php  } elseif ($find_by == "username") { ?>
                    <?php
                    $sql = "SELECT * FROM users WHERE username='$find' ";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) { ?>
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Username</th>
                                <th>Password</th>
                            </tr>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                </tr>
                            <?php  } ?>
                        </table>
                    <?php  } ?>
                <?php  } ?>
            </div>
        </div>
    </div>
    <!-- end search -->
    <div class="spikes spikes-gray-white"></div>
    <!-- start add user -->
    <div class="add-user" id="add-user">
        <div class="container">
            <h2 class="main-heading">ADD USERS</h2>
            <form action="admin.php?#add-user" method="post">
                <input type="email" name="email" required placeholder="User Email">
                <input type="text" name="username" required placeholder="User Name">
                <input type="password" name="password" required placeholder="User password">
                <button type="submit" name="add-user">ADD</button>
            </form>
        </div>
    </div>
    <!-- end add user -->
    <div class="spikes spikes-white-gray"></div>
    <!-- start edit-user -->
    <div class="edit-user" id="edit-user">
        <div class="container">
            <h2 class="main-heading">EDIT USERS</h2>

            <form action="admin.php?#edit-user" method="post">
                <input type="number" name="id" placeholder="User Id">
                <label for="">or</label>
                <input type="email" name="email" placeholder="User Email">
                <input type="hidden" name="username" value="">
                <button type="submit" name="find-user">find</button>
            </form>
            <div class="table-area">
                <?php if ($find_by == "id") {
                    $sql = "SELECT * FROM users WHERE id='$find' ";
                } elseif ($find_by == "email") {
                    $sql = "SELECT * FROM users WHERE email='$find' ";
                }
                if ($find_by == "id" or $find_by == "email") {
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) { ?>
                            <?php while ($user = mysqli_fetch_assoc($result)) { ?>
                                <form action="admin.php?#edit-user" method="post">
                                    <input type="number" readonly name="id" value="<?php echo $user['id']; ?>">
                                    <input type="email" name="email" value="<?php echo $user['email']; ?>">
                                    <input type="text" name="type" value="<?php echo $user['type']; ?>">
                                    <input type="text" name="username" value="<?php echo $user['username']; ?>">
                                    <input type="text" name="password" value="<?php echo $user['password']; ?>">
                                    <button type="submit" name="edit-user">edit</button>
                                </form>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- end edit-user -->
    <div class="spikes spikes-gray-white"></div>
    <!-- start delete-user -->
    <div class="delete-user" id="delete-user">
        <div class="container">
            <h2 class="main-heading">delete USERS</h2>
            <form action="admin.php?#delete-user" method="post">
                <input type="number" name="id" placeholder="User Id">
                <label for="">or</label>
                <input type="email" name="email" placeholder="User Email">
                <label for="">or</label>
                <input type="text" name="username" placeholder="User Name">
                <button type="submit" name="delete-user">delete</button>
            </form>
        </div>
    </div>
    <!-- end delete-user -->
    <!-- ____________________________________________ book _______________________________________________- -->
    <hr>
    <hr>
    <div class="spikes spikes-white-gray"></div>
    <!-- start search -->
    <div class="search" id="search-book">
        <div class="container">
            <h2 class="main-heading">find book</h2>
            <form action="admin.php?#search-book" method="post">
                <input type="number" name="id" placeholder="Book Id">
                <label for="">or</label>
                <input type="text" name="title" placeholder="Book Name">
                <button type="submit" name="find-book">find</button>
            </form>
            <div class="table-area">
                <?php if ($find_by == "id") { ?>
                    <?php
                    $sql = "SELECT * FROM books WHERE id='$find' ";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) { ?>
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>title</th>
                                <th>author</th>
                                <th>pages</th>
                                <th>size (in mb)</th>
                                <th>cat</th>
                                <th>poster</th>
                            </tr>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['author']; ?></td>
                                    <td><?php echo $row['pages']; ?></td>
                                    <td><?php echo floor($row['size'] / 1000) . ' KB'; ?></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><img src="uploads/<?php echo $row['poster']; ?>" alt=""></td>
                                </tr>
                            <?php  } ?>
                        </table>
                    <?php  } ?>
                <?php  } elseif ($find_by == "title") { ?>
                    <?php
                    $sql = "SELECT * FROM books WHERE title='$find' ";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) { ?>
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>title</th>
                                <th>author</th>
                                <th>pages</th>
                                <th>size (in mb)</th>
                                <th>cat</th>
                                <th>poster</th>
                            </tr>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['author']; ?></td>
                                    <td><?php echo $row['pages']; ?></td>
                                    <td><?php echo floor($row['size'] / 1000) . ' KB'; ?></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><img src="uploads/<?php echo $row['poster']; ?>" alt=""></td>
                                </tr>
                            <?php  } ?>
                        </table>
                    <?php  } ?>
                <?php  } ?>
            </div>
        </div>
    </div>
    <!-- end search -->
    <div class="spikes spikes-gray-white"></div>
    <!-- start add book -->
    <div class="add-book" id="add-book">
        <div class="container">
            <h2 class="main-heading">UPLOAD BOOKS</h2>
            <form action="admin.php?#add-book" method="post" enctype="multipart/form-data">
                <input type="text" name="title" require placeholder="title">
                <input type="text" name="author" require placeholder="author">
                <input type="text" name="pages" require placeholder="pages">
                <input type="text" name="category" require placeholder="category(comic, economic, novel, policy)">
                <input type="text" name="description" require placeholder="description">
                <div class="files">
                    <div class="file">
                        <label for="poster">poster : </label>
                        <input type="file" name="poster" id="poster">
                    </div>
                    <div class="file">
                        <label for="book">Book File : </label>
                        <input type="file" name="myfile" id="book">
                    </div>
                </div>
                <button type="submit" name="save">upload</button>
            </form>
        </div>
    </div>
    <!-- end add book -->
    <div class="spikes spikes-white-gray"></div>
    <!-- start edit-book -->
    <div class="edit-book" id="edit-book">
        <div class="container">
            <h2 class="main-heading">EDIT BOOK</h2>
            <form action="admin.php?#edit-book" method="post">
                <input type="number" name="id" placeholder="Book Id">
                <label for="">or</label>
                <input type="text" name="title" placeholder="Book Title">
                <button type="submit" name="find-book">find</button>
            </form>

            <div class="table-area">
                <?php if ($find_by == "id") {
                    $sql = "SELECT * FROM books WHERE id='$find' ";
                } elseif ($find_by == "title") {
                    $sql = "SELECT * FROM books WHERE title='$find' ";
                }
                if ($find_by == "id" or $find_by == "title") {
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) { ?>
                            <?php while ($book = mysqli_fetch_assoc($result)) { ?>
                                <form action="admin.php?#edit-book" method="post">
                                    <input type="number" readonly name="id" value="<?php echo $book['id']; ?>">
                                    <input type="text" name="title" value="<?php echo $book['title']; ?>">
                                    <input type="text" name="author" value="<?php echo $book['author']; ?>">
                                    <input type="text" name="pages" value="<?php echo $book['pages']; ?>">
                                    <input type="text" name="category" value="<?php echo $book['category']; ?>">
                                    <input type="text" name="description" value="<?php echo $book['description']; ?>">
                                    <button type="submit" name="edit-book">edit</button>
                                </form>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- end edit-book -->
    <div class="spikes spikes-gray-white"></div>
    <!-- start delete-book -->
    <div class="delete-book" id="delete-book">
        <div class="container">
            <h2 class="main-heading">DELETE BOOK</h2>
            <form action="admin.php?#delete-book" method="post">
                <input type="number" name="id" placeholder="Book Id">
                <label for="">or</label>
                <input type="text" name="title" placeholder="Book Name">
                <button type="submit" name="delete-book">delete</button>
            </form>
        </div>
    </div>
    <!-- end delete-book -->
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