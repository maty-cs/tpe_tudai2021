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
    })
}

window.onload = asignarEventos();