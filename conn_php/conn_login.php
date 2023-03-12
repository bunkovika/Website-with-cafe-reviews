<?php

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
/**
 * Generate a new CSRF token and store it in the session if one does not already exist.
 *
 * @var string $csrf_token The current CSRF token.
 */
$csrf_token = $_SESSION['csrf_token'];
/**
 * Initialize error variable for username field.
 *
 * @var string $nameErr Error message for username field.
 */
$nameErr = "";
/**
 * Initialize error variable for password field.
 *
 * @var string $passErr Error message for password field.
 */
$passErr = "";
/**
 * Regular expression for disallowed punctuation in username and password.
 *
 * @var string $punctuation The regular expression for disallowed punctuation.
 */

if (isset($_POST['login'])) {
    /**
     * The CSRF token submitted with the login form.
     *
     * @var string $post_token The submitted CSRF token.
     */
    $post_token = $_POST['csrf_token'];
    /**
     * The username entered in the form.
     *
     * @var string $username The entered username.
     */
    $username=$_POST['username'];
//    $username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');

    /**
     * The password entered in the form.
     *
     * @var string $password The entered password.
     */
    $password = $_POST['password'];

    if ($post_token !== $csrf_token) {
        exit("Something went wrong.... Try again");
    }
    /**
     * Sanitize user input.
     *
     * @param string $data The input data to sanitize.
     * @return string The sanitized input data.
     */
    function testInput($data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
//        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }

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
                $nameErr = "Name can not contain only letters and numbers";
            }
            $username = testInput($username);
        }

        if (empty($password)) {
            $passErr = "Password is required";
        } else {
            if (strlen($password) < 8) {
                $passErr = "Password is must contain more than 8 characters";
            }
            if (!preg_match('/^[a-zA-Z0-9_]+$/', $password)) {
                $passErr = "Password can not contain only letters and numbers";
            }
            if(strlen($password)>50){
                $passErr = "Password couldn't contain more than 50 characters";
            }
            $password = testInput($password);
        }
    }
    if ($nameErr !== "" || $passErr !== "") {
        // Show the error in HTML and do not send data to the database
    } else {
        /**
         * The MySQL connection.
         *
         * @var mysqli $conn The MySQL connection.
         */
        $conn= new mysqli('localhost', 'root', '', 'login_db');
//        $conn = new mysqli('localhost', 'bunkovik', 'webove aplikace', 'bunkovik');
        if ($conn->connect_error) {
            die("Connection error: " . $conn->connect_error);
        } else {
//            $username=mysqli_real_escape_string($conn, $username);
//            $password=mysqli_real_escape_string($conn, $password);
            /**
             * The result of a query to select the is_admin value from the mytable table where the username matches the provided username.
             *
             * @var mysqli_result $new_result The result of the query.
             */
            $new_result = mysqli_query($conn, "SELECT is_admin FROM `mytable` WHERE username='$username' ");
            /**
             *   @var mysqli_fetch_assoc $check_admin the query result as an associative array
             */
            $check_admin = mysqli_fetch_assoc($new_result);

            if ($check_admin == null) {
                $nameErr = "It seems like you don't have an account yet. Try to register!";
            } else {
                /**
                 * The is_admin value from the mytable table.
                 *
                 * @var string $admin_value The is_admin value.
                 */
                $admin_value = $check_admin["is_admin"];
                /**
                 * The result of a query to select the salt value from the mytable table where the username matches the provided username.
                 *
                 * @var mysqli_result $result The result of the query.
                 */
                $result = mysqli_query($conn, "SELECT salt FROM `mytable` WHERE username='$username' ");
                /**
                 * @var mysqli_fetch_assoc $user the query result as an associative array
                 */
                $user = mysqli_fetch_assoc($result);
                /**
                 * @var string $salt the salt of the user password from database
                 */
                $salt = $user["salt"];
                /**
                 * @var string $hashpass  Hashing the password using the salt
                 */
                $hashpass = md5($password . $salt);
                /**
                 * MySQL query to select username and password
                 *
                 * @var string $sql Selecting all rows from the mytable table where the username and password match the provided username and hashed password
                 */
                $sql = "SELECT * FROM `mytable` WHERE username='$username' && password='$hashpass'";
                $gry = mysqli_query($conn, $sql) or die("Login problems");
                $count = mysqli_num_rows($gry);
                if ($count === 1) {
                    $_SESSION['is_admin'] = $admin_value;
                    $_SESSION['user'] = $username ;
//                    $_SESSION['user'] = $username;
                    exit(header("Location: ../index/index.php"));
                } else {
                    $nameErr = "Your username or password is incorrect. Please try again!";
                }
                $conn->close();
            }
        }
    }
}
