<?php
function testInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function returnFromPost($co) {
    if (isset($_POST[$co]))
        return htmlspecialchars($_POST[$co]);
    return "";
}

$username = $_POST['username'];
$birthday = $_POST['birthday'];
$birthday=explode('.', $birthday);
$birthday=$birthday[0];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password=$_POST['confirm_password'];

// define variables and set to empty values

$nameErr = $emailErr = $birthErr =$passErr = $conf_passErr = "";
$punctuation = "/[-=+.,?|\/*#!()]/";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($username)) {
        $nameErr = "Name is required";
    } else {
        $username = testInput($username);
        if (strlen($username) < 8) {
            $nameErr = "Name is must contain more than 8 characters";
        }
        if (preg_match($punctuation, $username)) {
            $nameErr = "Name can not contain punctuation mark like -=+.,?|\/*#!() ";
        }
    }

     if (empty($birthday)) {
         $birthErr = "Birthday is required";
     } else{
         $birthday=testInput($birthday);
     }

    if (empty($email)) {
        $emailErr = "Email is required";
    } else {
        $email = testInput($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($password)) {
        $passErr="Password is required";
    } else {
        $password = testInput($password);
        if(strlen($password)<8){
            $passErr = "Password is must contain more than 8 characters";
        }
        if(preg_match($punctuation,$password)){
            $passErr = "Password can not contain punctuation mark like -=+.,?|\/*#!() ";
        }
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
//to checkForPass if there are any errors
if($nameErr !== "" || $birthErr!== "" || $emailErr !== "" || $passErr !== "" || $conf_passErr !== ""){
    echo("You can't be signed up, because of such errors: ");
    echo($birthErr);
    echo($emailErr);
    echo($passErr);
    echo ($conf_passErr);
//    if (isset($_POST['nameErr'])) {
//        echo($nameErr);
//    }
}
//connecting to db
$conn = new mysqli('localhost', 'root', '', 'login_db');

if ($conn-> connect_error){
    die("Connection error: ".$conn->connect_error);

}else {
    //checkForPass if the user with this username is already in database
    $sql_u="SELECT*FROM `mytable` WHERE username='$username'";
    $res_u = mysqli_query($conn, $sql_u) or die(mysqli_error($conn));
    if(mysqli_num_rows($res_u)>0) {


        //return user to the same page after unsuccessful sign up
//        header("Location: login_html.php");
       echo ( "Username is already taken");
        
    } else{
    $stmt = $conn->prepare("insert into myTable(username, birthday, email, password)
    values(?, ?, ?, ?)");
    $hashpass = md5($password);
    $stmt->bind_param("ssss", $username, $birthday, $email, $hashpass );
    $stmt->execute();
    $stmt->close();
    $conn->close();
//    header("Location: /home/home.css");
//    exit( "Email is already taken");
    }
}



