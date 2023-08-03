<?php

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// connect to the database
$conn = mysqli_connect('sql202.ezyro.com', 'ezyro_33775848', 's1g9ar1a', 'ezyro_33775848_book_library_db');

$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM message";
$result = mysqli_query($conn, $sql);
$messages = mysqli_fetch_all($result, MYSQLI_ASSOC);


// set category
if (isset($_GET['comic'])) {
    $set_category = "comic";
} elseif (isset($_GET['economic'])) {
    $set_category = "economic";
} elseif (isset($_GET['novel'])) {
    $set_category = "novel";
} elseif (isset($_GET['policy'])) {
    $set_category = "policy";
} else {
    $set_category = "all";
}

// login 
if (isset($_POST['log-in'])) {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['type'] == "user") {
                    $_SESSION['login'] = 'user';
                    $error_message = "__Login_successfully_as_user__";
                    header('Location: home.php?' . $error_message);
                    exit;
                } elseif ($row['type'] == "admin") {
                    $_SESSION['login'] = 'admin';
                    $error_message = "__Login_successfully_as_admin__";
                    header('Location: home.php?' . $error_message);
                    exit;
                }
            }
        } else {
            $_SESSION['login'] = 'no';
            $error_message = "__This_user_not_exists__";
            header('Location: login.php?' . $error_message);
            exit;
        }
    } else {
        $error_message = "__Something_Wrong__";
        header('Location: login.php?' . $error_message);
        exit;
    }
}

// register
if (isset($_POST['register'])) {
    session_start();
    $useremail = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = "user";
    $sql = "SELECT * FROM users WHERE (username='$username' AND password='$password') OR (email='$useremail') ";
    if ($result = mysqli_query($conn, $sql)) {
        if ((mysqli_num_rows($result) > 0)) {
            $error_message = "This_user_already_exists_";
            header('Location: registerUser.php?error_message=' . $error_message);
            exit;
        } else {
            $sql = "INSERT INTO users (email, type, username, password) VALUES ('$useremail', '$type','$username','$password')";
            mysqli_query($conn, $sql);
            $_SESSION['login'] = 'user';
            $error_message = "__Registeration_done_successfully__";
            header('Location: home.php?' . $error_message);
            exit;
        }
    } else {
        $error_message = "__Something_Wrong__";
        header('Location: registerUser.php?' . $error_message);
        exit;
    }
}


// get message from contact page:
if (isset($_POST['contact'])) {
    $message_name = $_POST['name'];
    $message_email = $_POST['email'];
    $message_subjects = $_POST['subjects'];
    $message = $_POST['message'];
    $sql = "INSERT INTO message (name, email, subjects, message) VALUES ('$message_name','$message_email', '$message_subjects', '$message')";
    if (mysqli_query($conn, $sql)) {
        $error_message = "__Your_Message_was_sent_successfully__";
        header('Location: contact.php?' . $error_message);
        exit;
    } else {
        $error_message = "__Something_Wrong__";
        header('Location: contact.php?' . $error_message);
        exit;
    }
}

// delete message
if (isset($_GET['message_id'])) {
    $id = $_GET['message_id'];
    $sql = "DELETE FROM message WHERE id='$id' ";
    if (mysqli_query($conn, $sql)) {
        $error_message = "__Message_was_Deleted_Successfully__";
    } else {
        $error_message = "__Something_Wrong__";
    }
    $show = "messages";
    header('Location: admin.php?' . $error_message . '#show');
    exit;
}

// show users and books or messages
$show = "not set";
if (isset($_POST['books'])) {
    $show = "books";
} elseif (isset($_POST['users'])) {
    $show = "users";
} elseif (isset($_POST['messages'])) {
    $show = "messages";
}

// search for user
$find = "not set";
$find_by = "not set";
if (isset($_POST['find-user'])) {
    if (empty($_POST['id'])) {
        if (empty($_POST['email'])) {
            if (empty($_POST['username'])) {
            } else {
                $find = test_input($_POST['username']);
                $find_by = "username";
            }
        } else {
            $find = test_input($_POST['email']);
            $find_by = "email";
        }
    } else {
        $find = test_input($_POST['id']);
        $find_by = "id";
    }
}

// add new user by admin
if (isset($_POST['add-user'])) {
    $useremail = test_input($_POST['email']);
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $type = "user";
    $sql = "SELECT * FROM users WHERE (username='$username' AND password='$password') OR (email='$useremail') ";
    if ($result = mysqli_query($conn, $sql)) {
        if ((mysqli_num_rows($result) > 0)) {
            $error_message = "__This_user_already_exists__";
        } else {
            $sql = "INSERT INTO users (email, type, username, password) VALUES ('$useremail', '$type','$username','$password') ";
            if (mysqli_query($conn, $sql)) {
                $error_message = "__add_user_successfully__";
            }
        }
    } else {
        $error_message = "__Something_Wrong__";
    }
    header('Location: admin.php?error_message=' . $error_message . '#add-user');
    exit;
}

// edit user
if (isset($_POST['edit-user'])) {
    $userid = $_POST['id'];
    $useremail = test_input($_POST['email']);
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $type = test_input($_POST['type']);
    $sql = "SELECT * FROM users WHERE (username='$username' AND password='$password' AND email='$useremail' AND type='$type') ";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $error_message = "__This_user_already_exists__";
            header('Location: admin.php?error_message=' . $error_message . '#edit-user');
            exit;
        } else {
            $sql = "UPDATE users SET email='$useremail', type='$type', username='$username', password='$password' WHERE id='$userid' ";
            if ($result = mysqli_query($conn, $sql)) {
                $error_message = "__update_user_successfully__";
                header('Location: admin.php?' . $error_message . '#edit-user');
                exit;
            }
        }
    } else {
        $error_message = "__Something_Wrong__";
        header('Location: admin.php?' . $error_message . '#edit-user');
        exit;
    }
}

// delete user
$flag = "1";
if (isset($_POST['delete-user'])) {
    $userid = $_POST['id'];
    $useremail = test_input($_POST['email']);
    $username = test_input($_POST['username']);
    if (empty($userid)) {
        if (empty($useremail)) {
            if (empty($username)) {
                $flag = "0";
            } else {
                $sql = "SELECT * FROM users WHERE username='$username' ";
            }
        } else {
            $sql = "SELECT * FROM users WHERE  email='$useremail' ";
        }
    } else {
        $sql = "SELECT * FROM users WHERE id='$userid' ";
    }
    if ($flag == "1") {
        if ($result = mysqli_query($conn, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $sql = "DELETE FROM users WHERE id='$id' ";
                if (mysqli_query($conn, $sql)) {
                    $error_message = "__User_was_Deleted_Successfully__";
                } else {
                    $error_message = "__Something_Wrong__";
                }
            }
        } else {
            $error_message = "__Something_Wrong__";
        }
    } else {
        $error_message = "__empty_data__";
    }
    header('Location: admin.php?' . $error_message . '#delete-user');
    exit;
}

// search for book
if (isset($_POST['find-book'])) {
    if (empty($_POST['id'])) {
        if (empty($_POST['title'])) {
        } else {
            $find = test_input($_POST['title']);
            $find_by = "title";
        }
    } else {
        $find = test_input($_POST['id']);
        $find_by = "id";
    }
}


// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked

    $img_name = $_FILES['poster']['name'];

    // destination of the image on the server
    $img_destination = 'uploads/' . $img_name;

    // get the image extension
    $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
    $imag = $_FILES['poster']['tmp_name'];

    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if ((!in_array($extension, ['zip', 'pdf', 'docx'])) or (!in_array($img_extension, ['png', 'pdf', 'jpg']))) {
        $error_message = "__file_extension_must_be_(.zip,_.pdf_or_.docx)_for_file_and_(png,_jpg)_for_image__";
    } elseif ($_FILES['myfile']['size'] > 10000000000000) {
        $error_message = "__File_too_large!__";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if ((move_uploaded_file($file, $destination)) and (move_uploaded_file($imag, $img_destination))) {

            // get my data
            $title = $_POST['title'];
            $author = $_POST['author'];
            $pages = $_POST['pages'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            // end data

            $sql = "INSERT INTO books (title,author, pages, size,category,description,poster, data) VALUES ('$title','$author','$pages' ,'$size','$category','$description','$img_name', '$filename')";
            if (mysqli_query($conn, $sql)) {
                $error_message = "__File_uploaded_successfully__";
            }
        } else {
            $error_message = "__Failed_to_upload_file.__";
        }
    }
    header('Location: admin.php?' . $error_message . '#add-book');
    exit;
}

// delete book
if (isset($_POST['delete-book'])) {
    $bookid = $_POST['id'];
    $booktitle = test_input($_POST['title']);
    if (empty($bookid)) {
        if (empty($booktitle)) {
            $flag = "0";
        } else {
            $sql = "SELECT * FROM books WHERE  title='$booktitle' ";
        }
    } else {
        $sql = "SELECT * FROM books WHERE id='$bookid' ";
    }
    if ($flag == "1") {
        if ($result = mysqli_query($conn, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $sql = "DELETE FROM books WHERE id='$id' ";
                if (mysqli_query($conn, $sql)) {
                    $error_message = "__File_Deleted_Successfully__";
                } else {
                    $error_message = "__Failed_to_Delete_file.__";
                }
            }
        } else {
            $error_message = "__Something_Wrong__";
        }
    } else {
        $error_message = "__Empty_Data__";
    }
    header('Location: admin.php?message= ' . $error_message . '#delete-book');
    exit;
}

// edit book
if (isset($_POST['edit-book'])) {
    $id = $_POST['id'];
    $title = test_input($_POST['title']);
    $author = test_input($_POST['author']);
    $pages = test_input($_POST['pages']);
    $category = test_input($_POST['category']);
    $description = test_input($_POST['description']);

    $sql = "SELECT * FROM books WHERE (title='$title' AND category='$category' AND pages='$pages' AND author='$author' AND description='$description') ";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $error_message = "__This_book_already_exists__";
        } else {
            $sql = "UPDATE books SET title='$title', author='$author', category='$category', pages='$pages', description='$description' WHERE id = '$id' ";
            if (mysqli_query($conn, $sql)) {
                $error_message = "__File_Edit_Successfully__";
            } else {
                $error_message = "__Failed_to_Edit_file__";
            }
        }
    } else {
        $error_message = "__Something_Wrong__";
    }
    header('Location: admin.php?message=' . $error_message . '#edit-book');
    exit;
}

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM books WHERE id=$id";
    if ($result = mysqli_query($conn, $sql)) {
        $file = mysqli_fetch_assoc($result);
        $filepath = 'uploads/' . $file['data'];

        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize('uploads/' . $file['data']));
            readfile('uploads/' . $file['data']);
            exit;
        }
    } else {
        $error_message = "__Something_Wrong__";
        header('Location: book_downloads.php?' . $error_message);
        exit;
    }
}
