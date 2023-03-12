<?php
$username = $_POST['Lusername'];
$password = $_POST['Lpassword'];
$hashpass = md5($password);
$nameErr=
$conn = new mysqli('localhost', 'root', '', 'login_db');

if ($conn-> connect_error){
    die("Connection error: ".$conn->connect_error);

}else {
    $sql="SELECT * FROM `mytable` WHERE username='$username' && password='$hashpass'";
    $gry=mysqli_query($conn, $sql) or die("login problem");
    $count=mysqli_num_rows($gry);
    if($count === 1){
        $_SESSION['user']=$username;
        header("Location: index.php");
    }
    else{
        $nameErr= "Your username or password is incorrect. Please try again!";
    }

    $conn->close();
}