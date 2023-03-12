<?php
/**
 *
 * @var mysqli $conn Connection to the database using MySQLi
 */
$conn = new mysqli('localhost', 'root', '', 'login_db');
//$conn = new mysqli('localhost', 'bunkovik', 'webove aplikace', 'bunkovik');

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
} else {
    /**
     * Number of records to display per page
     *
     * @var int $num_per_page
     */
    $num_per_page = 3;
    if (isset($_GET["page_number"])) {
        /**
         * Current page number
         *
         * @var int $page_number
         */
        $page_number = $_GET["page_number"];
    } else {
        $page_number = 1;
    }
    /**
     * MySQL query to select all records from the table
     *
     * @var string $sqlq
     */
    $sqlq = "SELECT * FROM `cafestable`";
    /**
     * MySQL result of the above query
     *
     * @var mysqli_result $rs_resultq
     */
    $rs_resultq = mysqli_query($conn, $sqlq);
    /**
     * Total number of records in the table
     *
     * @var int $total_records
     */
    $total_records = mysqli_num_rows($rs_resultq);
    /**
     * Total number of pages based on the number of records and number of records per page
     *
     * @var int $total_pages
     */
    $total_pages = ceil($total_records/$num_per_page);
    if (!is_numeric($page_number) || $page_number <= 0 || $page_number > $total_pages) {
        exit("You have written bad location, turn back and try again");
    }
    /**
     * Starting record for the current page
     *
     * @var int $start_from
     */
    $start_from = ($page_number-1) * $num_per_page;
    /**
     * MySQL query to select records for the current page
     *
     * @var string $sql
     */
    $sql = "SELECT * FROM `cafestable` LIMIT $start_from, $num_per_page";
    /**
     * MySQL result of the above query
     *
     * @var mysqli_result $rs_result
     */
    $rs_result = mysqli_query($conn, $sql);
}




