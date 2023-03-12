/**
 *  The element with the ID of 'theme'
 *
 * @var {HTMLElement} icon
 */
const icon = document.getElementById('theme');
/**
 * Toggles the theme between light and dark.
 * If the current theme is light, the theme will switch to dark and the icon will change.
 * If the current theme is dark, the theme will switch to light and the icon will change.
 */
function toggleTheme() {
    if (localStorage.getItem('theme') === 'dark') {
        localStorage.setItem('theme', 'light');
        document.body.classList.remove('dark-theme');
        document.getElementById('theme').src='../images/homeph/start_photo_dark.jpg';
    } else {
        localStorage.setItem('theme', 'dark');
        document.body.classList.add('dark-theme');
        document.getElementById('theme').src='../images/homeph/start_photo.jpg';
    }
// Set a cookie with the value of the active theme
    document.cookie = "theme=" + localStorage.getItem('theme');
}
icon.addEventListener('click', toggleTheme);
