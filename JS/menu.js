//Revision history:
//
//DEVELOPER                    DATE:         COMMNETS
//Andres Ardila (student_id)   2021-04-28    create animation for the login menu
//Andres Ardila (student_id)   2021-04-28    add a annonimous function to delay the display property


// This function allows the login button to hide and show the login menu 
function menu(){

    let login = document.getElementById("login-menu");
    let state = login.className;
    if(state == "hide-element")
    {
        login.style.display = 'block';
        login.classList.add("show-element");
        login.classList.remove("hide-element");

    }
    else
    {
        login.classList.remove("show-element");
        login.classList.add("hide-element");
        // this is need it to remove the item from the screen that way it will not 
        // occupied any space on screen
        setTimeout
        (
            function()
            {
                login.style.display = 'none';
            }
            ,150
        );
    }
}