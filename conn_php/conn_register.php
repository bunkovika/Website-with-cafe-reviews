<?php
if (!isset($_SESSION['csrf_token'])) {
    try {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    } catch (Exception $e) {
    }
}
/**
 * Generate a new CSRF token and store it in the session if one does not already exist.
 *
 * @var string $csrf_token The current CSRF token.
 */
$csrf_token = $_SESSION['csrf_token'];

/**
 * Initializes variables used to store error messages
 * for PHP form validation
 * @var string
 */
$nameErr = $emailErr = $birthErr = $passErr = $conf_passErr = "";
/**
 * Validates form input and processes form submission
 */
if (isset($_POST['register'])) {
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        exit("Something went wrong.... Try again");
    }
    /**
     * Sanitizes user input by removing leading and trailing
     * whitespace, and converting special characters to
     * HTML entities
     * @param string $data
     * @return string
     */
    function testInput($data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
//        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }
    /**
     * The username entered in the form.
     *
     * @var string $username The entered username.
     */
    $username=$_POST['username'];
//    $username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');

    /**
     * The birthday entered in the form.
     *
     * @var string $birthday The entered birthday.
     */
    $birthday = $_POST['birthday'];
    $timestamp = strtotime($birthday);
    if ($timestamp > time()) {
        $birthErr = "Birthday cannot be in the future";
    } else {
        $birthday = explode('.', $birthday);
        $birthday=$birthday[0];
    }
    /**
     * The email entered in the form.
     *
     * @var string $email The entered email.
     */
    $email = $_POST['email'];
    /**
     * The password entered in the form.
     *
     * @var string $password The entered password.
     */
    $password = $_POST['password'];
    /**
     * The confirm password entered in the form.
     *
     * @var string $confirm_password The entered confirm password.
     */
    $confirm_password=$_POST['confirm_password'];
    /**
     * @var string $salt the salt for the user's password
     */
    $salt = bin2hex(random_bytes(32));

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($username)) {
            $nameErr = "Name is required";
        } else {
            if (strlen($username) < 8) {
                $nameErr = "Name must contain more than 8 characters";
            }
            if(strlen($username)>50){
                $nameErr = "Name couldn't contain more than 50 characters";
            }
            if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
                $nameErr = "Name can contain only letters and numbers";
            }
            $username = testInput($username);
        }

        if (empty($birthday)) {
            $birthErr = "Birthday is required";
        } else{
            $birthday=testInput($birthday);
        }

        if (empty($email)) {
            $emailErr = "Email is required";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
            if(strlen($email)>50){
                $emailErr = "Email couldn't contain more than 50 characters";
            }
            $email = testInput($email);
        }

        if (empty($password)) {
            $passErr="Password is required";
        } else {
            if(strlen($password) < 8){
                $passErr = "Password must contain more than 8 characters";
            }
            if(strlen($password)>50){
                $passErr = "Password couldn't contain more than 50 characters";
            }
            if(!preg_match('/^[a-zA-Z0-9_]+$/', $password)){
                $passErr = "Password can contain only letters and numbers";
            }
            $password = testInput($password);
        }

        if (empty($confirm_password)) {
            $conf_passErr="Confirm password is required";
        } else{
            $confirm_password = testInput($confirm_password);
            if($password!=$confirm_password){
                $conf_passErr="Confirm password should be equal to password";
            }
        }
    }
    if($nameErr !== "" || $birthErr!== "" || $emailErr !== "" || $passErr !== "" || $conf_passErr !== ""){
//        nothing to happen,  show error in html and don't send data to db
    }else {
        /**
         * The MySQL connection.
         *
         * @var mysqli $conn The MySQL connection.
         */
//        $conn = new mysqli('localhost', 'root', '', 'login_db');
        $conn = new mysqli('localhost', 'bunkovik', 'webove aplikace', 'bunkovik');

        $username=mysqli_real_escape_string($conn,$username) ;

        if ($conn->connect_error) {
            die("Connection error: " . $conn->connect_error);
        } else {
            /**
             * MySQL query to select username
             *
             * @var string $sql_u Selecting the row from the mytable table where the username matches the provided username
             */
            $sql_u = "SELECT*FROM `mytable` WHERE username='$username'";
            /**
             * MySQL result of the above query
             *
             * @var mysqli_result $res_u
             */
            $res_u = mysqli_query($conn, $sql_u) or die(mysqli_error($conn));
            /**
             * MySQL query to select email
             *
             * @var string $sql_e Selecting the row from the mytable table where the email matches the provided email
             */
            $sql_e = "SELECT*FROM `mytable` WHERE email='$email'";
            /**
             * MySQL result of the above query
             *
             * @var mysqli_result $res_e
             */
            $res_e = mysqli_query($conn, $sql_e) or die(mysqli_error($conn));
            if (mysqli_num_rows($res_u) > 0) {
                $nameErr = "Username is already taken. Please write another one";
            }elseif (mysqli_num_rows($res_e) > 0){
                $emailErr = "Email is already taken. Please write another one";
            } else {
                /**
                 * Prepares a statement for inserting a new row into the `mytable` table.
                 *
                 * @var PDOStatement $stmt
                 */
                $stmt = $conn->prepare("insert into mytable(username, birthday, email, password, salt)
                   values(?, ?, ?, ?, ?)");
                /**
                 * @var string $hashpass  Hashing the password using the salt
                 */
                $hashpass = md5($password.$salt);
                if ($stmt === false) {
                    die("Failed to prepare statement: " . $conn->error);
                }
                $stmt->bind_param("sssss", $username, $birthday, $email, $hashpass, $salt);
                $stmt->execute();
                $stmt->close();
                $conn->close();
                header("Location:../index/login_html.php");
            }
        }
    }
}
