<?php
/**
 * Connect to the database using MySQLi
 *
 * @var mysqli $conn Connection to the database
 */
$conn = new mysqli('localhost', 'root', '', 'login_db');
//$conn = new mysqli('localhost', 'bunkovik', 'webove aplikace', 'bunkovik');

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
} else {
    /**
     * MySQL query to select all records from the cafestable table and limit the results to the first 3 records
     *
     * @var string $sql
     */
    $sql = "SELECT*FROM `cafestable` limit 0,3";
    /**
     * MySQL result of the above query
     *
     * @var mysqli_result $rs_result
     */
    $rs_result = mysqli_query($conn, $sql);
}


