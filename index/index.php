<?php
    include_once("../conn_php/session.php");
    include_once("../conn_php/theme_home.php");
    include_once("../conn_php/conn_home.php");
    global $body_tag;
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&family=Newsreader:opsz,wght@6..72,700;6..72,800&display=swap" rel=
    "stylesheet">
    <!-- link to other files -->
    <link rel="stylesheet" type="text/css" href="../home/home.css" >
    <script defer src="../home/home.js"></script>
    <title>Homepage</title>
</head>
<?php echo $body_tag; ?>
    <div class="wrapper">
        <header id="open" class="header">
            <div id="close" class="header_container">
                <nav>
                    <ul class="menu_list m_list">
                        <li class="menu_item">
                            <a href="index.php" class="menu_link">HOME</a>
                        </li>
                        <li class="menu_item">
                            <a href="cafes.php" class="menu_link">CAFE</a>
                        </li>
                    </ul>
                </nav>
                <img  src=" <?php global $icon; echo $icon;?>"
                      alt="change theme" id="theme">
                <?php if( isset($_SESSION['user']) && !empty($_SESSION['user']) )
                {
                ?>
                    <form>
                        <button type="submit" class="button login"  formaction="../conn_php/logout.php">LOG OUT</button>
                    </form>
                <?php }else{ ?>
                <form>
                    <button type="submit" class="button login" formtarget="blank_" formaction="login_html.php">LOG IN</button>
                </form>
                <?php } ?>
            </div>
        </header>
        <main class="main">
            <div class="start">
                <img src="<?php global $photo;
                echo $photo; ?>" id="start_photo" alt="picture of cup of coffee">
                <div class="block-text">
                    <h1>Do you want to find cafe you really enjoy?<br>Start discover our website </h1>
                    <form>
                        <button type="submit" class="button button_start" formaction="#to_scroll">START</button>
                    </form>
                </div>
            </div>
            <div class="cafes" id="to_scroll">
                <ul class="cafes_container" >
                    <?php
                    global $rs_result;
                    while($rows=mysqli_fetch_array($rs_result)){
                        ?>
                        <li class="cafe_item">
                            <div class="cafe-image">
                                <img class = 'cafe-img' src="<?php echo $rows['photo']; ?>" alt="cafe photo 1" width="200">
                            </div>
                            <div class="cafe-content">
                                <a href="template.php?id=<?php echo $rows['id'] ?>" class="cafe_title" > <?php echo $rows['title']; ?> </a>
                                <p class="cafe_description"> <?php echo $rows['description']; ?> </p>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <form>
                <button type="submit" class="button discover" formaction="../index/cafes.php">Discover more</button>
            </form>
        </main>
        <?php include_once("footer.php");?>
    </div>
</body>
</html>