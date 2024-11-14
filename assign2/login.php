<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="public/images/logo/png/logo.png">
    <meta charset="utf-8">
    <meta name="author" content="Adrien">
    <meta name="keyword" content="html css">
    <meta name="description" content="Login page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Login Page</title>
    <style>
        .section {
            display: none;
        }
        :target {
            display: block;
        }
    </style>
</head>
<body>
<?php
session_start();

require_once('settings.php');

function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entered_username = sanitise_input($_POST["username"]);
    $entered_password = sanitise_input($_POST["password"]);

    $_SESSION['no_username'] = false;
    $_SESSION['no_password'] = false;
    $_SESSION['wrong_information'] = false;

    if (empty($entered_username)) {
        $_SESSION['no_username'] = true;
    }

    if (empty($entered_password)) {
        $_SESSION['no_password'] = true;
    }

    if (isset($_SESSION['no_username']) && $_SESSION["no_username"]) {
        echo "<p class='error-message'>Please enter a username</p>";
    } else if (isset($_SESSION['no_password']) && $_SESSION["no_password"]) {
        echo "<p class='error-message'>Please enter a password</p>";
    } else if (strcmp($entered_username, $user) == 0 && strcmp($entered_password, $pwd) == 0) {
        $_SESSION['loggedin'] = true;
        header("location: manage.php");
    } else {
        $_SESSION['wrong_information'] = true;
        echo "<p class='error-message'>Please enter the correct information</p>";
    }
}
?>
<?php include 'header.inc'; ?>
<br><br>
<div class="login-bulk">
    <section>
        <h2>Login</h2>
        <form method="post" class="login-form" novalidate="novalidate">
            <div class="container">
                <p><label for="username">Username</label>
                    <input type="text" placeholder="Enter username" name="username" required>
                </p>
                <p><label for="password">Password</label>
                    <input type="text" placeholder="Enter password" name="password" required>
                </p>
                <input type="submit" value="Login" />
            </div>
        </form>
    </section>
</div>
<?php include 'footer.inc'; ?>
</body>
</html>
