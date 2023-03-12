<?php
//ob_start();
    include_once("../conn_php/session.php");
    include_once("../conn_php/theme.php");
    include_once("../conn_php/edit_article.php");
    include_once("../conn_php/conn_template.php");
    global $body_tag;
    global $admin_display;
//ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&family=Newsreader:opsz,wght@6..72,700;6..72,800&display=swap" rel=
    "stylesheet">
    <link rel="stylesheet" href="../template/template.css">
    <script defer src="../template/template.js"></script>
    <title><?php global $title; echo $title; ?></title>
</head>
<?php echo $body_tag; ?>
    <div class="wrapper">
        <header id="open" class="header">
            <div id="close" class="header_container ">
                <nav class="header_menu">
                    <ul class="menu_list m_list">
                        <li class="menu_item">
                            <a href="index.php" class="menu_link">HOME</a>
                        </li>
                        <li class="menu_item">
                            <a href="cafes.php" class="menu_link">CAFE</a>
                        </li>
                    </ul>
                </nav>
                <img  src="
                <?php global $icon;
                echo $icon;?>" alt="change theme" id="theme">
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
            <h1><?php echo $title; ?></h1>
            <button type="submit" id="edit_title" class="button edit_title" style="display: <?php echo $admin_display; ?>;">Edit</button>
            <form method="post" id="edit_form_title" style="display: <?php echo $admin_display; ?>;" >
                <div class="edit_form" style="display: <?php echo $admin_display; ?>;">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <label for="title" class="label_title"> title </label>
                    <textarea name="title" id="title" class="new_area_title" rows="2" cols="75"><?php echo $title; ?></textarea>
                    <input type = 'submit' class="button update" value = 'update' name = 'submitTitle'>
                </div>
            </form>
            <div class="decsription">
                <div class="gallery">
                    <img src="<?php global $array; echo $array[0]; ?>" alt="enter to cafe">
                    <img src="<?php echo $array[1]; ?>" alt="indoor view of cafe">
                    <img src="<?php echo $array[2]; ?>" alt="hat on the stairs">
                    <img src="<?php echo $array[3]; ?>" alt="round table">
                    <img src="<?php echo $array[4]; ?>" alt="walls design">
                    <img src="<?php echo $array[5]; ?>" alt="red interier">
                    <img src="<?php echo $array[6]; ?>" alt="white interier">
                    <img src="<?php echo $array[7]; ?>" alt="cafe with customers">
                    <img src="<?php echo $array[8]; ?>" alt="cafe mirror">
                </div>
                <div class="edit_form">
                    <p id="description"><?php global $description; echo $description; ?></p>
                    <button type="submit" id="edit" class="button edit" style="display: <?php echo $admin_display; ?>;">Edit</button>
                </div>
                <form method="post" id="edit_form" >
                    <div class="edit_form">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <label for="descr">description </label><br>
                        <textarea name="description" id="descr" class="new_area" rows="9" cols="75"><?php echo $description?></textarea>
                        <input type = 'submit' class="button update" value = 'Update' name = 'submit'>
                    </div>
                </form>

            </div>
            <div class="comments_form">
                <h2>Your view of <?php echo $title; ?>:</h2>
                <?php if (isset($_SESSION['user'])): ?>
                    <form method="post" class="form" id="form">
                        <button type="submit" name="submitComment" class="button opinion"><img src="../template/cafe_3_images/Rectangle4.svg" alt="plus_button"> add your opinion</button>
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <input type="hidden" name="name" value="<?php echo $_SESSION['user']; ?>">
                        <?php if (isset($_SESSION['comment_error'])) { ?>
                            <div class="error">
                                <?php echo $_SESSION['comment_error']; ?>
                            </div>
                            <?php unset($_SESSION['comment_error']); ?>
                        <?php } ?>
                        <label for="comment"> comment </label><br>
                        <textarea name="comment" cols="30" rows="10" minlength="1" maxlength="1000" id="comment" class="comments_text" placeholder="Write here your opinion (max number of symbols is 1000!)" ><?php echo (isset($_SESSION['comment_text'])) ? htmlspecialchars($_SESSION['comment_text']) : ''; unset ($_SESSION['comment_text']); ?></textarea>
                    </form>
                <?php else: ?>
                    <p>You must be logged in to add a comment</p>
                <?php endif; ?>
            </div>
            <div class="all_comments">
                <h2 class="all_comment_header">Visitors' opinions on <?php echo $title; ?></h2>
                <?php global $comments; foreach ($comments as $comment): ?>
                    <div class="comment">
                        <div class="username" title="your username"><?php echo html_entity_decode($comment['username'], ENT_QUOTES); ?> </div>
                        <?php if (isset($_SESSION['user']) && $_SESSION['user'] == $comment['username'] || (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] == 1)) { ?>
                        <form method="post">
                            <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
                            <button type = "submit" class="delete_comments"  name = "delete" ><img src="../template/trash.png" alt="delete_button" title="delete comment" class = 'trash_image'></button >
                        </form>
                        <?php } ?>
                        <div class="opinion_comment"><?php echo htmlspecialchars($comment['comment']); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
        <?php include "footer.php";?>
    </div>
</body>
</html>
