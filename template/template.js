/**
 *  The element with the ID of 'theme'
 *
 * @var {HTMLElement} icon
 */
const icon=document.getElementById('theme');
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
    // document.location.reload();

// Set a cookie with the value of the active theme
    document.cookie = "theme=" + localStorage.getItem('theme');

}
icon.addEventListener('click', toggleTheme);

/**
 * The comment element
 * @var {HTMLElement} comment
 */
const comment = document.getElementById("comment");
/**
 * The form element
 * @var {HTMLElement} form
 */
const form = document.getElementById("form");

/**
 * check function is called when the form is submitted. It checks if the comment field is empty or not
 *
 * @param object $e The event object
 *
 * @return void
 */
const check = (e) => {
    const trim_comment=comment.value.trim();
    if(trim_comment===""){
        alert("Please write comment!");
        e.preventDefault();
    }
}
if(form){
    form.addEventListener("submit", check);
}

/**
 * DOMContentLoaded event listener for the "edit" button. When the event fires, it hides the form and shows the button.
 * When the "edit" button is clicked, it hides the button and shows the form
 */
document.addEventListener('DOMContentLoaded', function() {
    // Hide the form when the page loads
    const form = document.getElementById("edit_form")
    form.style.display = 'none';

    // Add an event listener to the "Edit" button
    const editButton = document.querySelector('#edit');
    editButton.addEventListener('click', function() {
        // When the "Edit" button is clicked, hide the button and show the form
        editButton.style.display = 'none';
        form.style.display = 'block';
    });
});

/**
 * DOMContentLoaded event listener for the "edit_title" button. When the event fires, it hides the form and shows the button.
 * When the "edit_title" button is clicked, it hides the button and shows the form
 */
document.addEventListener('DOMContentLoaded', function() {
    // Hide the form when the page loads
    const form = document.getElementById("edit_form_title")
    form.style.display = 'none';

    // Add an event listener to the "Edit" button
    const editButton = document.querySelector('#edit_title');
    editButton.addEventListener('click', function() {
        // When the "Edit" button is clicked, hide the button and show the form
        editButton.style.display = 'none';
        form.style.display = 'block';
    });
});
