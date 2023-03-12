<?php
    include_once("../conn_php/session.php");
    include_once("../conn_php/theme.php");
    include_once("../conn_php/conn_cafe.php");
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
    <link rel="stylesheet" href="../cafes/cafes.css">
    <script defer src="../cafes/cafes.js"></script>
    <title>Cafes</title>
</head>
<?php echo $body_tag; ?>
    <div class="wrapper">
        <header id="open" class="header">
            <div id="close" class="header_container">
                <nav>
                    <ul class="menu_list m_list">
                        <li class="menu_item">
                            <a href="../index/index.php" class="menu_link">HOME</a>
                        </li>
                        <li class="menu_item">
                            <a href="cafes.php" class="menu_link">CAFE</a>
                        </li>
                    </ul>
                </nav>
                <img  src="
                <?php global $icon;
                echo $icon; ?>" alt="change theme" id="theme">
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
            <div >
                <h1> Discover more cafes</h1>
            </div>
            <div class="cafes">
                <ul class="cafes_container" >
                    <?php
                    global $rs_result;
                        while($rows=mysqli_fetch_array($rs_result)){
                            ?>
                            <li class="cafe_item">
                                <div class="cafe-image">
                                    <img class = 'cafe-img' src="<?php echo $rows['photo']; ?>" alt="cafe photo 1">
                                </div>
                                <div class="cafe-content">
                                    <a href="template.php?id=<?php echo $rows['id']; ?>" class="cafe_title" > <?php echo $rows['title']; ?> </a>
                                    <p class="cafe_description"> <?php echo $rows['description']; ?> </p>
                                </div>
                            </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
            <?php
            $sql="SELECT*FROM `cafestable`";
            global $conn;
            $rs_result=mysqli_query($conn, $sql);
            $total_records=mysqli_num_rows($rs_result);
            global $num_per_page;
            // Calculate the total number of pages
            $total_pages=ceil($total_records/$num_per_page);
            for($i=1;$i<=$total_pages;$i++){
                echo "<a href='cafes.php?page_number=".$i."' class='page_links'>".$i."</a>";
            }
            ?>
        </main>
        <?php include "footer.php";?>
    </div>
</body>
</html>