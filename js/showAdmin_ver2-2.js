"use strict"

function asignarEventos(){   
    let btnActions = document.querySelectorAll(".btn-action");
    for (let i = 0; i < 6; i++) {
        btnActions[i].addEventListener("click", function(){
            let form = document.querySelectorAll(".opciones");
            form[i].classList.toggle("mostrar-form");
        });
    }
}

function eventosSession() {
    let btnAction = document.querySelectorAll(".btn-action");
    for (let i = 0; i < 3; i++) {
        btnAction[i].addEventListener("click", function(){
            let forms = document.querySelectorAll(".opciones");
            forms[i].classList.toggle("mostrar-form");
        });
    }
}

window.addEventListener('DOMContentLoaded', function() {
    if(document.title == "Administrador"){
        eventosSession();
    }
    else{
       asignarEventos();
    }
});
