/**
 * The element with the ID of 'login'
 *
 * @var {HTMLElement} login
 */
const button = document.getElementById("button");
const login = document.getElementById("login");
/**
 * The element with the ID of 'name'
 *
 * @var {HTMLElement} us_name
 */
const us_name = document.getElementById("name");
/**
 * The element with the ID of 'password'
 *
 * @var {HTMLElement} password
 */
const password = document.getElementById("password");
/**
 * A regular expression that matches punctuation characters
 *
 * @var {RegExp} punctuation
 */
const punctuation = /[-=+.,?|\/*#!()]/;
/**
 * Shows an error message for a given element and message.
 *
 * @param {HTMLElement} item - The element to show the error message for
 * @param {string} message - The error message to display
 */
const showError = (item, message) => {
    const inputControl = item.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}
/**
 * Sets the success state for a given element.
 *
 * @param {HTMLElement} item - The element to set the success state for
 */
const setSuccess = (item) => {
    const inputControl = item.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
}
/**
 * Toggles the password field between visible and hidden.
 */
// let passwordValue = "";
const checkbox = document.getElementById("checkbox");
function ShowPassword() {
    if (password.type === "password") {
        // passwordValue = password.value;
        password.type = "text";
    } else {
        password.type = "password";
        // passwordValue = password.value;
    }
}
/**
 * The element with the ID of 'checkbox'
 *
 * @var {HTMLElement} checkbox
 */
checkbox.addEventListener('click', ShowPassword);
/**
 * Validates the form fields and shows error messages if any fields are invalid.
 *
 * @param {Event} e - The submit event for the form
 */
const check = (e) => {
    /**
     * The trimmed value of the 'name' field
     *
     * @var {string} username
     */
    const username = us_name.value.trim();
    /**
     * The trimmed value of the 'password' field
     *
     * @var {string} pass
     */
    const pass = password.value.trim();

    if (punctuation.test(username)) {
        showError(us_name, "Name can not contain punctuation mark like -=+.,?|\/*#!() ");
        e.preventDefault();
    } else if (username === "") {
        showError(us_name, "Name is empty ");
        e.preventDefault();
    } else {
        setSuccess(us_name);
    }

    if (punctuation.test(pass)) {
        showError(password, "Password can not contain punctuation mark like -=+.,?|\/*#!()");
        e.preventDefault();
    } else if (pass === "") {
        showError(password, "Password is empty ");
        e.preventDefault();
    } else {
        setSuccess(password);
    }
};

login.addEventListener("submit", check);


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

    } else {
        localStorage.setItem('theme', 'dark');
        document.body.classList.add('dark-theme');

    }

    document.cookie = "theme=" + localStorage.getItem('theme');

}
icon.addEventListener('click', toggleTheme);
