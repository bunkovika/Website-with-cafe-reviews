/**
 * The element with the ID of 'createAccount'
 *
 * @var {HTMLElement} signup
 */
const signup = document.getElementById('createAccount');

/**
 * The element with the ID of 'signupUsername'
 *
 * @var {HTMLElement} signupname
 */
const signupname = document.getElementById('signupUsername');

/**
 * The element with the ID of 'date'
 *
 * @var {HTMLElement} date
 */
const date = document.getElementById('date');
/**
 * Sets the minimum and maximum allowable dates for the 'date' field.
 */
date.min = "1920-01-01";
date.max = new Date().toLocaleDateString('en-ca')

/**
 * The element with the ID of 'email'
 *
 * @var {HTMLElement} email
 */
const email = document.getElementById('email');
/**
 * The element with the ID of 'sign_password'
 *
 * @var {HTMLElement} sign_password
 */
const sign_password = document.getElementById('sign_password');
/**
 * The element with the ID of 'sign_conf_password'
 *
 * @var {HTMLElement} sign_conf_password
 */
const sign_conf_password = document.getElementById('sign_conf_password');
/**
 * The element with the ID of 'checkbox'
 *
 * @var {HTMLElement} checkbox
 */
const checkbox=document.getElementById("checkbox");
/**
 * The element with the ID of 'checkbox1'
 *
 * @var {HTMLElement} checkbox
 */
const checkbox1=document.getElementById("checkbox1");

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
function ShowPassword() {
    if (sign_password.type === "password") {
        sign_password.type = "text";
    } else {
        sign_password.type = "password";
    }
}
checkbox.addEventListener("click", ShowPassword);
/**
 * Toggles the confirm password field between visible and hidden.
 */
function ShowConfirmPassword() {
    if (sign_conf_password.type === "password") {
        sign_conf_password.type = "text";
    } else {
        sign_conf_password.type = "password";
    }
}
checkbox1.addEventListener("click", ShowConfirmPassword);

/**
 * ValidateEmail function checks if the given email is a valid email or not
 *
 * @param string $mail The email to be validated
 *
 * @return boolean True if the email is valid, False otherwise
 */
function ValidateEmail(mail) {
    if (/^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$/.test(mail)){
        return (true);
    }
    return (false);
};

/**
 * checkSignUp function checks if the input fields for sign up form are valid or not
 *
 * @param object $e The event object
 *
 * @return void
 */
const checkSignUp = (e) => {
    /**
     * sign_name stores the value of the `signupname` input field after trimming it
     *
     * @var string
     */
    const sign_name = signupname.value.trim();

    /**
     * sign_email stores the value of the `email` input field after trimming it
     *
     * @var string
     */
    const sign_email = email.value.trim();

    /**
     * sign_pass stores the value of the `sign_password` input field after trimming it
     *
     * @var string
     */
    const sign_pass = sign_password.value.trim();

    /**
     * sign_conf_pass stores the value of the `sign_conf_password` input field after trimming it
     *
     * @var string
     */
    const sign_conf_pass = sign_conf_password.value.trim();

    if(sign_name==""){
        showError( signupname, "Name is empty ");
        e.preventDefault();
    } else if (punctuation.test(sign_name)) {
        showError(signupname,"Name can not contain punctuation mark like -=+.,?|\/*#!() ");
        e.preventDefault();
    } else if(sign_name.length<8){
        showError(signupname,"Name should be in the range of (8-more) ");
        e.preventDefault();
    } else{
        setSuccess(signupname);
    }

    if (date.value==""){
        showError(date,"This field is required");
        e.preventDefault();
    } else{
        setSuccess(date);
    }

    if(sign_email==""){
        showError(email,"email can not be empty ");
        e.preventDefault();
    } else if (!ValidateEmail(sign_email)) {
        showError(email,"email is not valid ");
        e.preventDefault();
    } else{
        setSuccess(email);
    }

    if(sign_pass==""){
        showError(sign_password,"Password is empty ");
        e.preventDefault();
    } else if (punctuation.test(sign_pass)) {
        showError( sign_password, "Password can not contain punctuation mark like -=+.,?|\/*#!()");
        e.preventDefault();
    } else if(sign_pass.length <8){
        showError(sign_password,"Password should be in the range of (8-more) ");
        e.preventDefault();
    } else{
        setSuccess(sign_password);
    }

    if(sign_conf_pass==""){
        showError(sign_conf_password,"confirm password is empty ");
        e.preventDefault();
    } else if(sign_conf_pass !== sign_pass) {
        showError( sign_conf_password, "Password is not equal to confirm password");
        e.preventDefault();
    } else {
        setSuccess(sign_conf_password);
    }
};

signup.addEventListener("submit", checkSignUp);

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