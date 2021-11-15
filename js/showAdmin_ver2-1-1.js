"use strict"

function asignarEventos(){    
    document.getElementById("addProducto").addEventListener("click", function(){
        let aux = document.getElementById("addProducto").nextElementSibling
        aux = aux.nextElementSibling
        let formAdd = aux.nextElementSibling
        formAdd.classList.toggle("mostrar-form")
    });

    document.getElementById("updateProducto").addEventListener("click", function(){
        let aux = document.getElementById("updateProducto").nextElementSibling
        aux = aux.nextElementSibling
        let formUpdate = aux.nextElementSibling
        formUpdate.classList.toggle("mostrar-form")
    });

    document.getElementById("deleteProducto").addEventListener("click", function(){
        let aux = document.getElementById("deleteProducto").nextElementSibling
        aux = aux.nextElementSibling
        let formDelete = aux.nextElementSibling
        formDelete.classList.toggle("mostrar-form")
    });

    document.getElementById("addCategoria").addEventListener("click", function(){
        let aux = document.getElementById("addCategoria").nextElementSibling
        aux = aux.nextElementSibling
        let formAdd = aux.nextElementSibling
        formAdd.classList.toggle("mostrar-form")
    });

    document.getElementById("updateCategoria").addEventListener("click", function(){
        let aux = document.getElementById("updateCategoria").nextElementSibling
        aux = aux.nextElementSibling
        let formUpdate = aux.nextElementSibling
        formUpdate.classList.toggle("mostrar-form")
    });

    document.getElementById("deleteCategoria").addEventListener("click", function(){
        let aux = document.getElementById("deleteCategoria").nextElementSibling
        aux = aux.nextElementSibling
        let formDelete = aux.nextElementSibling
        formDelete.classList.toggle("mostrar-form")
    });
}

function eventosSession() {
    let giveRol = document.getElementById("giveRol");
    giveRol.addEventListener("click", function(){
        let aux = giveRol.nextElementSibling;
        let formRol = aux.nextElementSibling;

        formRol.classList.toggle("mostrar-form");
    })

    let deleteRol = document.getElementById("deleteRol");
    deleteRol.addEventListener("click", function(){
        let aux = giveRol.nextElementSibling;
        let formDeleteRol = aux.nextElementSibling;

        formDeleteRol.classList.toggle("mostrar-form");
    });
}

if(document.title == "Cuentas"){
    window.onload = eventosSession();
}
else{
    window.onload = asignarEventos();
}