//test mdp

let mdpCorrect = false;
function TestRobustesse(mdp)
{
    let liste = document.getElementById("testRobustesse");

    liste.childNodes[1].className = (mdp.length >= 8)?("valide"):("invalide");  //longueur

    liste.childNodes[3].className = (/[A-Z]/.test(mdp))?("valide"):("invalide");    //Majuscule

    liste.childNodes[5].className = (/[0-9]/.test(mdp))?("valide"):("invalide");    //chiffre

    liste.childNodes[7].className = (/[^a-zA-Z0-9]/.test(mdp))?("valide"):("invalide");    //caractère spécial

    mdpCorrect = (mdp.length >= 8 && /[A-Z]/.test(mdp) && /[0-9]/.test(mdp) && /[^a-zA-Z0-9]/.test(mdp))?(true):(false);
}

function VerifMdp(evt)
{
    if(!mdpCorrect)
    {
        evt.preventDefault();
        document.getElementById("mdpPasBon").style.display = "block";
    }
}


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