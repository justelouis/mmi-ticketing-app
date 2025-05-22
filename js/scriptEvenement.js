function ChangerEtatMenuReservation(etatCible)  //true=>on l affiche / false => on le desaffiche
{
    const reservationMenu = document.getElementById("reservationMenu");
    if(etatCible)
    {   
        reservationMenu.style.display = "block";
    }else
    {
        reservationMenu.style.display = "none";
    }
}

function ChangerEtatModifMenu(etatCible) //true=>on l affiche / false => on le desaffiche
{
    const modifMenu = document.getElementById("modifMenu");

    if(etatCible)
    {   
        modifMenu.style.display = "block";
    }else
    {
        modifMenu.style.display = "none";
    }
}