<?php
//    ob_start();
    session_start();
    include_once("../conn_php/theme.php");
    include_once("../conn_php/conn_register.php");
    global $body_tag;
//    ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../register/register.css">
    <script defer src="../register/register.js"></script>
    <title>SignUp</title>
</head>
<?php echo $body_tag; ?>
<div class="container">
    <form class="form " method="POST" id="createAccount" name="register" >
        <div>
            <img src="../images/homeph/start_photo_dark.jpg" alt="change theme" id="theme">
            <h1 class="form__title">Create account</h1>
            <div class="required_meaning">* - means required field</div>
        </div>
        <input type="hidden" name="csrf_token" value="<?php global $csrf_token;echo $csrf_token ?>">
        <div class="form__input_group">
            <div class="error"><?php global $nameErr; echo htmlspecialchars($nameErr); ?></div>
            <label for="signupUsername">Username <span class="red" title="required">*</span> </label>
            <input type="text" id="signupUsername" name="username" class="form__input "
                   placeholder="Username" pattern=".{8,}" title="Eight or more characters" required
                   value="<?php if(isset($_POST['username'])) echo htmlspecialchars($_POST['username']); ?>">
            <div class="error"> </div>
        </div>
        <div class="form__input_group">
            <div class="error"> <?php global $birthErr; echo htmlspecialchars($birthErr); ?> </div>
            <label for="date">Birthday <span class="red" title="required">*</span></label>
            <input type="date" id="date" name="birthday" class="form__input"
                   title="Eight or more characters"
                   value= "<?php if(isset($_POST['birthday'])) echo htmlentities($_POST['birthday'], ENT_QUOTES, 'UTF-8');?>"
                   max="<?php echo date('Y-m-d'); ?>" required>
            <div class="error"></div>
        </div>
        <div class="form__input_group">
            <div class="error"> <?php global $emailErr; echo htmlspecialchars($emailErr); ?> </div>
            <label for="email">Email <span class="red" title="required">*</span></label>
            <input type="text" id="email" name="email" class="form__input "  placeholder="E-mail Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                   title="email must be in the following order: characters@characters.domain" required
                   value="<?php if(isset($_POST['email'])) echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'); ?>">
            <div class="error"></div>
        </div>
        <div class="form__input_group">
            <div class="error"> <?php global $passErr; echo htmlspecialchars($passErr); ?> </div>
            <label for="sign_password">Password <span class="red" title="required">*</span></label>
            <input type="password"  id="sign_password" name="password" class="form__input "  placeholder="Password"
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required
                   value="<?php if(isset($_POST['password'])) echo ""; ?>">
            <input type="checkbox" id="checkbox" name="password_toggle"><label for="checkbox" class="show_password">Show Password</label>
            <div class="error"></div>
        </div>
        <div class="form__input_group">
            <div class="error"> <?php global $conf_passErr; echo htmlspecialchars($conf_passErr); ?> </div>
            <label for="sign_conf_password">Confirm password <span class="red" title="required">*</span></label>
            <input type="password" id="sign_conf_password" name="confirm_password" class="form__input "  placeholder=" Confirm Password"
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <input type="checkbox" id="checkbox1" name="confirm_password_toggle"><label for="checkbox1" class="show_password">Show Confirm Password</label>
            <div class="error"></div>
        </div>
        <button class="form__button" name="register" type="submit"> Continue</button>
        <p class="form__text">
            <a class="form__link" href="login_html.php" id="linkLogin" >Already have an account? Log in</a>
        </p>
    </form>
</div>
</body> 
</html>