var btn = document.getElementById("theme");
var link = document.getElementById("theme-link");

btn.addEventListener("click", function () { ChangeTheme(); });

function Save(theme)
{
    var Request = new XMLHttpRequest();
    Request.open("GET", "..all_php/theme.php?theme=" + theme, true); 
    Request.send();
}

function ChangeTheme()
{
    let lightTheme = "../home/login.css";
    let darkTheme = "../home/dark.css";

    var currTheme = link.getAttribute("href");
    var theme = "";

    if(currTheme == lightTheme)
    {
        currTheme = lightTheme;
        theme = "light";
    }
    else
    {
        currTheme = darkTheme;
        theme = "dark";

    }

    link.setAttribute("href", currTheme);

    Save(theme);
}
