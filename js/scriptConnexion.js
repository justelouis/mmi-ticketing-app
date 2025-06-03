function SwitchVisibilityPw()
{
    const passwordField = document.getElementById("mdp");

    if(passwordField.type == "password")
    {
        passwordField.type = "text";
        document.getElementById("eye").src = "imgs/eyeOpen.jpg";
    }else
    {
        passwordField.type = "password";
        document.getElementById("eye").src = "imgs/eyeClose.jpg";
    }
}