<?php
/**
 * If the user is an admin and the 'id' URL parameter is set, connect to the database
 * and update the description or title of the specified cafe
 */
if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
    $admin_display = "block";
    /**
     * ID of the cafe to update
     *
     * @var int $id
     */
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    /**
     * Connection to the database
     *
     * @var mysqli $db
     */
   $db = mysqli_connect('localhost', 'root', '', 'login_db');
//    $db = new mysqli('localhost', 'bunkovik', 'webove aplikace', 'bunkovik');

    // If the 'submit' button was clicked, update the description of the cafe
    if (isset($_POST['submit'])) {
        // Check if the CSRF token is valid
        if ($_POST['csrf_token'] == $_SESSION['csrf_token']) {
            /**
             * New description for the cafe
             *
             * @var string $description
             */
            $description = mysqli_real_escape_string($db, $_POST['description']);

            /**
             * MySQL query to update the description of the cafe
             *
             * @var string $sql
             */
            $sql = "UPDATE cafestable SET description='$description' WHERE id=$id";
            mysqli_query($db, $sql);

            // Generate a new CSRF token for the form
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

            /**
             * URL of the cafe page
             *
             * @var string $url
             */
            $url = "template.php?id=$id";
            header("Location: $url");
            exit;
        } else {
            // Display an error message
            exit("Something went wrong.... Try again");
        }
    }
    // If the 'submitTitle' button was clicked, update the title of the cafe
    if (isset($_POST['submitTitle'])) {
        // Check if the CSRF token is valid
        if ($_POST['csrf_token'] == $_SESSION['csrf_token']) {
            /**
             * New title for the cafe
             *
             * @var string $title
             */
            $title = mysqli_real_escape_string($db, $_POST['title']);

            /**
             * MySQL query to update the title of the cafe
             *
             * @var string $sql
             */
            $sql = "UPDATE cafestable SET title='$title' WHERE id=$id";
            mysqli_query($db, $sql);
            // Generate a new CSRF token for the form
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

            $url = "template.php?id=$id";
            header("Location: $url");
            exit;
        }
    }
    mysqli_close($db);
}else{
    // User is not logged in, hide the button
    $admin_display = "none";
//    echo '<style>#edit { display: none; }</style>';
//    echo '<style>#edit_form { display: none; }</style>';
//    echo '<style>#edit_title { display: none; }</style>';
//    echo '<style>#edit_form_title { display: none; }</style>';
}











//// Check if the form has been submitted
//    if (isset($_POST['submitt'])) {
//        echo "1111111111111111111";
//        $id = isset($_GET['id']) ? $_GET['id'] : '';
//        $conn = new mysqli('localhost', 'root', '', 'login_db');
//    //$conn = new mysqli('localhost', 'bunkovik', 'webove aplikace', 'bunkovik');
//        if ($conn->connect_error) {
//            die("Connection error: " . $conn->connect_error);
//        } else {
//            echo "cfcfcfffc";
//            $updatedText = mysqli_real_escape_string($conn, $_POST['updatedText']);;
//            // Update the database with the updated text
//            $sql = "INSERT Into cafestable SET description = $updatedText WHERE id = $id";
//            mysqli_query($conn, $sql);
//
//            exit(header("Location: template.php?id=$id"));
//    }
//    }

//    $db = mysqli_connect('localhost', 'root', '', 'login_db');
//
//// Check for form submission
//    if (isset($_POST['up_description'])) {
//        // Get the updated information from the form
//        $description = mysqli_real_escape_string($db, $_POST['up_description']);
//
//        // Update the database
//        $sql = "UPDATE cafestable SET description=$description WHERE id=1";
//        mysqli_query($db, $sql);
//
//        // Redirect to the updated page
//        header("Location: template.php?id=1");
//    }
//}

