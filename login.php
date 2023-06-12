<?php

session_start();
require "login/User.php";
require "login/Utils.php";
if(User::isLoggedIn()){
    header("Location: index.php");
    exit;
}
$rand= rand(999999,100000);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stylish Portfolio - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <form action="login/auth.php" method="POST" class="auth-form" text-align:center; width: 400px;">
                                            <h2>Sign In</h2>
                                            <?php auth_error('auth_errors');?>
                                            <p>
                                                <label for="email"> Email Address </label><br>
                                                <input type="text" name="email" id="">                                            
                                            </p>
                                            <p>
                                                <label for="password"> Password </label><br>
                                                <input type="text" name="password" id="">                                            
                                            </p>
                                            <div class="form-group">
                                                <label for="captcha">Captcha: </label><br>
                                                <input type="text" name="captcha" placeholder="Enter Captcha" required>
                                                <input type="hidden" name="captcha-rand" value="<?php echo $rand; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="captcha-code">Captcha Code: </label><br>
                                                <div class="captcha"><?php echo $rand; ?></div>
                                            </div>
                                            <p>
                                                <input type="checkbox" name="remember" id="" value="yes"><!-- comment -->
                                                <label for="remember">Remember me</label>
                                            </p>
                                            <button type="submit" name="login">Login</button>

                                        </form>
                        <p style="text-align: center;"><a href="register.php">Create an account</a></p>
            </div>
        </header>
    </body>
</html>
