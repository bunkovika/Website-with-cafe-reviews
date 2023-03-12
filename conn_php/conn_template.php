<?php

/**
 * ID of the cafe
 *
 * @var int $id
 */
$id = isset($_GET['id']) ? $_GET['id'] : '';
/**
 * The MySQL connection.
 *
 * @var mysqli $conn The MySQL connection.
 */
$conn = new mysqli('localhost', 'root', '', 'login_db');
//$conn = new mysqli('localhost', 'bunkovik', 'webove aplikace', 'bunkovik');

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);

} else {
    /**
     * MySQL query to select all rows from cafestable
     *
     * @var string $sql Selecting all rows from the cafestable table
     *
     */
    $sql="SELECT*FROM `cafestable`";
    /**
     * MySQL result of the above query
     *
     * @var mysqli_result $rs_result
     */
    $rs_result=mysqli_query($conn, $sql);
    /**
     * Total number of records in the table
     *
     * @var int $total_records
     */
    $total_records=mysqli_num_rows($rs_result);

    if (!is_numeric($id) || $id <= 0|| $id> $total_records) {
        exit("You have written bad location, turn back and try again");
    }
    /**
     * MySQL result of the query
     *
     * @var mysqli_result $result select from 'cafestable' table where cafe id is equal to the current cafe
     */
    $result = mysqli_query($conn,"SELECT * FROM `cafestable` WHERE id='$id' ");
    /**
     * @var mysqli_fetch_assoc $resultarray the query result as an associative array
     */
    $resultarray=mysqli_fetch_assoc($result);
    /**
     * @var string $title title from the $resultarray
     */
    $title=$resultarray["title"];
    /**
     * @var string $description description from the $resultarray
     */
    $description=$resultarray["description"];
    /**
     * @var string $photo photo from the $resultarray
     */
    $photo=$resultarray["photo"];
    /**
     * @var string $string several link of photo from the $resultarray
     */
    $string =$resultarray["link"];
    /**
     * @var array $array The exploded string as an array
     */
    $array= explode(" ", $string );
    /**
     * MySQL query to select all records from the row of the table with special id
     *
     * @var string $query
     */
    $query = "SELECT * FROM comments WHERE cafe_id = $id ORDER BY id DESC";
    /**
     * Prepares a statement for selecting the row from the `cafestable` table.
     *
     * @var PDOStatement $stmt
     */
    $stmt = $conn->prepare($query);
    $stmt->execute();
    /**
     * Executes a prepared statement and returns the result.
     *
     * @var mysqli_stmt $result The prepared statement to execute.
     */
    $result = $stmt->get_result();
    /**
     * Retrieves all rows from the result set as an associative array.
     *
     * @return array The rows as an associative array.
     * @var mysqli_result $comments The result set to retrieve rows
     */
    $comments = $result->fetch_all(MYSQLI_ASSOC);
    /**
     * Initialize error variable for comment field.
     *
     * @var string $commentErr Error message for comment field.
     */
    $commentErr="";
    if (isset($_POST['submitComment'])) {

        if ($_POST['csrf_token'] != $_SESSION['csrf_token']) {
            die('Invalid CSRF token');
        }
        if (empty($_POST['comment'])) {
            $_SESSION['comment_error'] = 'Comment cannot be empty';
        } else {
            if (strlen($_POST['comment']) >= 1000) {
                $_SESSION['comment_error'] = 'Comment cannot be longer than 1000 characters';
                $_SESSION['comment_text'] = $_POST['comment'];
            } else {
                unset($_SESSION['comment_error']);
                /**
                 *
                 * @var string $username username of the user taken from the input field
                 */
                $username = $_POST['name'];
                /**
                 *
                 * @var string $comment comment of the user taken from the input field
                 */
                $comment = $_POST['comment'];
                /**
                 * Prepares a statement for inserting a new row into the `comments` table.
                 *
                 * @var PDOStatement $stmt
                 */
                $stmt = $conn->prepare("insert into `comments`(username, comment,cafe_id)
                               values(?, ?, ?)");
                $stmt->bind_param("ssi", $username, $comment, $id);
                $stmt->execute();
                $stmt->close();
                $conn->close();
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
                /**
                 * @var string $url URL with the query string parameter.
                 */
                $url = "template.php?id=$id";
                header("Location: $url");
                exit;
            }
        }
        if(!empty($_SESSION['comment_error'])){
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
    }

    if (isset($_POST['delete'])) {
        /**a
         * @param int $comment_id The ID of the comment to delete.
         */
        $comment_id = mysqli_real_escape_string($conn, $_POST['comment_id']);
        $sql = "DELETE FROM `comments` WHERE id=$comment_id";
        mysqli_query($conn, $sql);
        $url = "template.php?id=$id";
        header("Location: $url");
        exit;
    }

}