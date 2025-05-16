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