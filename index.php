<?php


$form_to_display = 'login';
$errors = [];

if (isset($_POST['submit'])) {
    if (isset($_POST['login_form'])) {
        
        include 'login.php';
        if (isset($error)) {
            $errors = $error;
            $form_to_display = 'login';
        }
    } elseif (isset($_POST['register_form'])) {
        
        include 'register.php';
        if (isset($error)) {
            $errors = $error;
            $form_to_display = 'register';
        }
    }
} else {
    
    if (isset($_GET['form']) && ($_GET['form'] === 'register' || $_GET['form'] === 'login')) {
        $form_to_display = $_GET['form'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container" id="login-form" style="<?php echo $form_to_display === 'login' ? '' : 'display: none;'; ?>">
        <form action="index.php" method="post">
            <input type="hidden" name="login_form" value="1">
            <h3>Login Now</h3>
            <?php
            if (!empty($errors) && $form_to_display === 'login') {
                foreach ($errors as $msg) {
                    echo '<span class="error-msg">' . htmlspecialchars($msg) . '</span>';
                }
            }
            ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Login Now" class="form-btn">
            <p>Don't have an account? <a href="index.php?form=register">Register Now</a></p>
        </form>
    </div>

    <div class="form-container" id="register-form" style="<?php echo $form_to_display === 'register' ? '' : 'display: none;'; ?>">
        <form action="index.php" method="post">
            <input type="hidden" name="register_form" value="1">
            <h3>Register Now</h3>
            <?php
            if (!empty($errors) && $form_to_display === 'register') {
                foreach ($errors as $msg) {
                    echo '<span class="error-msg">' . htmlspecialchars($msg) . '</span>';
                }
            }
            ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="cpassword" placeholder="Confirm Password" required>
            <input type="submit" name="submit" value="Register" class="form-btn">
            <p>Already have an account? <a href="index.php?form=login">Login Now</a></p>
        </form>
    </div>
</body>
</html>