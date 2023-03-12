<?php
/**
 * Initialize variable that determine the appearance of the body element
 * @var $body_tag
 */
$body_tag = '<body>';
/**
 * Initialize variable that determine the icon that toggles the themes
 * @var $icon
 */
$icon = "../images/homeph/start_photo_dark.jpg";
/**
 * If the 'theme' cookie is set and has a value of 'dark' or 'light',set the body class and the values of the $icon and $photo variables
 *
 * @var string $photo
 */
$photo = "../images/homeph/start_photo.jpg";
/**
 * Determines the appearance of the body element and the theme toggle icon
 * based on the value of the "theme" cookie
 */
if (isset($_COOKIE['theme'])) {
    if ($_COOKIE['theme'] === 'dark') {
        $body_tag = '<body class="dark-theme">';
        $icon = "../images/homeph/start_photo.jpg";
        $photo = "../images/homeph/start_photo_dark.jpg";
    } elseif ($_COOKIE['theme'] === 'light') {
        $body_tag = '<body>';
        $icon = "../images/homeph/start_photo_dark.jpg";
        $photo = "../images/homeph/start_photo.jpg";
    }
}