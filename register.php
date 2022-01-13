<?php

include 'config.php';

error_reporting(0);

session_start();

//Regisztraciohoz

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); //Titkositjuk a jelszot (md5)
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM customer WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result-> nums_rows > 0) {
            $sql = "INSERT INTO customer (username, password, email)
                    VALUES ('$username', '$password', '$email')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Cool! 🔥 you\'re now registered')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Something went wrong')</script>";
            }
        } else {
            echo "<script>alert('E-mail already in use!')</script>";
        }

    } else {
        echo "<script>alert('Passwords not match!')</script>";
    }
}

//Bejelentkezeshez

if (isset($_POST['login_submit'])) {
    $login = $_POST['login'];
    $login_password = md5($_POST['login_password']);

    $sql = "SELECT * FROM customer WHERE username='$login' AND password='$login_password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows>0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Username or password is wrong!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/bookfavicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/register-style.css">
    <title>Bookstore-Register</title>
</head>
<body>
    <header>
        <div class="logo-name">
                <a href="index.php"><img class="logo" src="icons/book.svg" alt="Logo"></a>
                <a href="index.php"><h1 class="name">Bookstore</h1></a>
        </div>
        <div class="header-icons">
            <svg id="account" aria-hidden="true" focusable="false" data-prefix="far" data-icon="user-circle" class="svg-inline--fa fa-user-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                <path fill="#fff" d="M248 104c-53 0-96 43-96 96s43 96 96 96 96-43 
                96-96-43-96-96-96zm0 144c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48
                48zm0-240C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 448c-49.7
                0-95.1-18.3-130.1-48.4 14.9-23 40.4-38.6 69.6-39.5 20.8 6.4 40.6 9.6 60.5 9.6s39.7-3.1 60.5-9.6c29.2 
                1 54.7 16.5 69.6 39.5-35 30.1-80.4 48.4-130.1 48.4zm162.7-84.1c-24.4-31.4-62.1-51.9-105.1-51.9-10.2 0-26
                9.6-57.6 9.6-31.5 0-47.4-9.6-57.6-9.6-42.9 0-80.6 20.5-105.1 51.9C61.9 339.2 48 299.2 48 256c0-110.3 
                89.7-200 200-200s200 89.7 200 200c0 43.2-13.9 83.2-37.3 115.9z">
                </path>
            </svg>
        </div>
    </header>
        <main>
            <div class="login-card">
                <h1 class=form-heading>Login</h1>
                <form class="loginform" method="POST">
                    <label class="login-header">Username</label>
                    <input class="login-input" name="login" type="text" value="<?php echo $login; ?>" required><br>
                    <label class="login-header">Password</label>
                    <input class="login-input" name="login_password" type="password" value="<?php echo $_POST['login_password']; ?>" required><br>
                    <input class="submit-button" name="login_submit" type="submit" value="Login">
                </form>
                <h1 class="form-heading">Register</h1>
                <form class="loginform" method="POST">
                    <label class="login-header">Username</label>
                    <input class="login-input" name="username" value="<?php echo $username; ?>" type="text" required><br>
                    <label class="login-header">Password</label>
                    <input class="login-input" name="password" value="<?php echo $_POST['password']; ?>" type="password" required><br>
                    <label class="login-header">Password again</label>
                    <input class="login-input" name="cpassword" value="<?php echo $_POST['cpassword'];?>" type="password" required><br>
                    <label class="login-header">E-mail</label>
                    <input class="login-input" name="email" value="<?php echo $email; ?>" type="email" required><br>
                    <input class="submit-button" name="submit" type="submit" value="Register">
                </form>
            </div>
        </main>
    <footer>
        <hr class="footer-logo-line">
        <img class="logo-bottom" src="icons/book.svg" alt="Logo">
        <hr class="footer-logo-line">
    </footer>
</body>
</html>