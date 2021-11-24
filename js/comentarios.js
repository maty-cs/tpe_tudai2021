"use strict"

const API_URL = 'http://localhost/proyectos/90-Crespo_Matias-Torres_Agustin/api/comentarios/';

let conteiner = new Vue({
    el: "#containerComentarios",
    data: {
        titulo: "Comentarios",
        comentarios: []
    }
})

async function getComentarios(){
    try {
        let response = await fetch(API_URL);
        let json = await response.json();
        conteiner.comentarios = json;
    } 
    catch (error) {
        console.log("ERROR: "+error);
    }
}

async function getCommentsOrdered(){
    let order = document.getElementById("order").value;
    console.log(order);
    try {
        let response = await fetch(API_URL+'order/'+0);
        let json = await response.json();
        conteiner.comentarios = json;
    } 
    catch (error) {
        console.log("ERROR: "+error);
    }

}

async function getComentariosDetail(id){
    try {
        let response = await fetch(API_URL+'detail/'+id);
        let json = await response.json();
        conteiner.comentarios = json;
    } 
    catch (error) {
        console.log("ERROR: "+error);
    }
}

async function postComment() {
    let user = document.getElementById("user").innerHTML;
    let comment = document.getElementById("userComment").value;
    let review = document.getElementById("userReview").value;
    let date = new Date().toISOString().slice(0, 19).replace('T', ' ');
    let id = document.getElementById("productoID").innerHTML;
    console.log(id)
        
    if(user != null && user != "" && comment != null && comment != "" && review != null && review != ""){
        if(id == null){
            let item = {
                usuario: user,
                comentario: comment,
                id_product: null,
                puntaje: review,
                fecha: date
            }
            console.log(id)
            
            try {
                let response = await fetch(API_URL, {
                    "method": "POST",
                    "headers": {"Content-type": "application/json"},
                    "body": JSON.stringify(item)
                });
                if(response.ok){
                    getComentarios();
                }
                else{
                    console.log("error al crear comentario");
                }
                
            }
            catch (error) {
                console.log(error);
            }
        }
        else{
            let item = {
                usuario: user,
                comentario: comment,
                id_product: id,
                puntaje: review,
                fecha: date
            }
            console.log(id)
            
            try {
                let response = await fetch(API_URL, {
                    "method": "POST",
                    "headers": {"Content-type": "application/json"},
                    "body": JSON.stringify(item)
                });
                if(response.ok){
                    getComentariosDetail(id);
                }
                else{
                    console.log("error al crear comentario");
                }
                
            }
            catch (error) {
                console.log(error);
            }   
        }
    }
    else{
        console.log("datos nulos");
    }
}

async function deleteComment(i){
    let btn = document.querySelectorAll(".btn-delete");
    let id = btn[i].nextElementSibling.innerHTML;

    try {
        let response = await fetch(API_URL+'/'+id, {
            "method": "DELETE"
        });
        if(response.ok){
            console.log("comentario "+id+" eliminado");
            getComentarios();
        }
        else{
            console.log("error al eliminar comentario");
        }
    }
    catch (error) {
     console.log(error);
    }
}

function addEventos(){
    if(document.querySelector(".btn-delete") != null){
        let btnDelete = document.querySelectorAll(".btn-delete");
        for (let i = 0; i < btnDelete.length; i++) {
            btnDelete[i].addEventListener("click", function(e){
                e.preventDefault();
               deleteComment(i);
               setTimeout(addEventos, 1000);
            });
        }
    }
    if(document.getElementById("btnFilter") != null){
        let btnFilter = document.getElementById("btnFilter");
        btnFilter.addEventListener("click", function(e){
            e.preventDefault();
            getCommentsOrdered();
        });
    }
}

if(document.title = "Home"){
    if(document.getElementById("productoID")){
        let id = document.getElementById("productoID").innerHTML;
        window.onload = getComentariosDetail(id);  
    }
    else{
        window.onload = getComentarios();
    }
    setTimeout(addEventos, 1000);
}