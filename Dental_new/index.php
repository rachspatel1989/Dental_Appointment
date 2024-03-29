<?php
session_start();
include_once 'include/DB_Functions.php';
$users = new DB_Functions();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['email_id'] && $_POST['password']) {
        $login = $users->check_login($_POST['email_id'], $_POST['password']);
        if ($login) {
            $login_id = $_SESSION['login_id'];
            $login_uid = $_SESSION['user_id'];
            header("location:dashboard.php");
        } else {
            echo "<script language='javascript' type='text/javascript'> alert('Email or Password Incorrect');</script>";
        }
    }
}
?>
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no"/>

        <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

        <title>Dental - Login Page</title>

        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

        <!-- uikit -->
        <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css"/>

        <!-- altair admin login page -->
        <link rel="stylesheet" href="assets/css/login_page.min.css" />

    </head>
    <body class="login_page">

        <div class="login_page_wrapper">
            <div class="md-card" id="login_card">
                <div class="md-card-content large-padding" id="login_form">
                    <div class="login_heading">
                        <div class="user_avatar"></div>
                    </div>
                    <form id="form_validation" method="post" class="uk-form-stacked" action="index.php" autocomplete="off">
                        <div class="uk-form-row parsley-row">
                            <label for="email_id">Username</label>
                            <input class="md-input" type="email" id="email_id" name="email_id" data-parsley-trigger="change" required />
                        </div>
                        <div class="uk-form-row parsley-row">
                            <label for="password">Password</label>
                            <input class="md-input" type="password" id="password" name="password" data-parsley-trigger="keyup" data-parsley-minlength="8" data-parsley-minlength="56"/>
                        </div>
                        <div class="uk-margin-medium-top">
                            <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign In</button>
                        </div>
                        <div class="uk-margin-top">
                            <a href="#" id="login_help_show" class="uk-float-right">Need help?</a>
                            <span class="icheck-inline">
                                <input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed" data-md-icheck />
                                <label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
                    <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                    <h2 class="heading_b uk-text-success">Can't log in?</h2>
                    <p>Here’s the info to get you back in to your account as quickly as possible.</p>
                    <p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps Lock is turned off, and that your username is spelled correctly, and then try again.</p>
                    <p>If your password still isn’t working, it’s time to <a href="#" id="password_reset_show">reset your password</a>.</p>
                </div>
                <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                    <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                    <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
                    <form>
                        <div class="uk-form-row">
                            <label for="login_email_reset">Your email address</label>
                            <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
                        </div>
                        <div class="uk-margin-medium-top">
                            <a href="index.html" class="md-btn md-btn-primary md-btn-block">Reset password</a>
                        </div>
                    </form>
                </div>                
            </div>            
        </div>

        <!-- common functions -->
        <script src="assets/js/common.min.js"></script>
        <!-- altair core functions -->
        <script src="assets/js/altair_admin_common.min.js"></script>

        <!-- altair login page functions -->
        <script src="assets/js/pages/login.min.js"></script>

        <!-- page specific plugins -->
        <!-- parsley (validation) -->
        <script>
            // load parsley config (altair_admin_common.js)
            altair_forms.parsley_validation_config();
        </script>
        <script src="bower_components/parsleyjs/dist/parsley.min.js"></script>

        <!--  forms validation functions -->
        <script src="assets/js/pages/forms_validation.min.js"></script>

    </body>
</html>