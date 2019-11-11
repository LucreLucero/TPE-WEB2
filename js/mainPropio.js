"use strict"
document.addEventListener("DOMContentLoaded", function(){

    // darle comprotamiento al boton de log out mediante mandarle un cambio de estilo con hidden
    let btnLogOut = document.getElementById("logOut");
    function LogOut(){
        btnLogOut.ClastList.toggle("esconderBoton");
    };

    btnLogOut.addEventListener("click", LogOut);

});