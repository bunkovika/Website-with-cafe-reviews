<?php
    // Start a PHP session and buffer the output
//    ob_start();
    session_start();

    // Include the theme and connection PHP files
    include_once("../conn_php/theme.php");
    include_once("../conn_php/conn_login.php");
    global $body_tag;
    // Flush the output buffer
//    ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../login/login.css">
    <script defer src="../login/login.js"></script>
    <title>LogIn</title>
</head>
<?php echo $body_tag; ?>
<div class="container">
    <form class="form " method="POST" id="login" name="login">
        <div>
            <img src="../images/homeph/start_photo_dark.jpg" alt="change theme" id="theme">
            <h1 class="form__title">Login </h1>
            <div class="required_meaning">* - means required field</div>
        </div>
        <input type="hidden" name="csrf_token" value="<?php global $csrf_token; echo $csrf_token; ?>">
        <div class="form__input_group">
            <label for="name">Username <span class="red" title="required">*</span></label>
            <input type="text"  id="name" name="username" class="form__input" autofocus placeholder="Username" pattern=".{8,}" title="Eight or more characters" required
                   value="<?php if(isset($_POST['username'])) echo htmlspecialchars($_POST['username']); ?>" >
            <div class="error"> <?php global $nameErr; echo htmlspecialchars($nameErr); ?> </div>
            <div class="error"> </div>
        </div>
        <div class="form__input_group">
            <label for="password">Password <span class="red" title="required">*</span></label>
            <input type="password" id="password" name="password" class="form__input" placeholder="Password"
                   title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <input type="checkbox" id="checkbox" name="password_checkbox"><label for="checkbox" class="show_password">Show Password</label>
            <div class="error"> <?php global $passErr; echo htmlspecialchars($passErr); ?> </div>
            <div class="error"> </div>
        </div>
        <button class="form__button" id="button" type="submit" name="login"> Continue</button>
        <p class="form__text">
            <a class="form__link" href="register_html.php" id="linkCreateAccount">Don't have an account? Create account</a>
        </p>
    </form>
</div>
</body> 
</html>
