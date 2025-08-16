<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $select = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = "User already exists!";
    } else {
        if ($password != $cpassword) {
            $error[] = "Password not matched!";
        } else {
            $insert = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
            mysqli_query($conn, $insert);
            header('location:index.php?form=login');
            exit();
        }
    }
}
?>