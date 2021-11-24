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

    if(document.getElementById("productoID") != null){
        let productID = document.getElementById("productoID").innerHTML;

        try {
            if(order != 'none'){
                let response = await fetch(API_URL+'puntaje/'+productID+'/'+order);
                let json = await response.json();
                conteiner.comentarios = json;
            }
            else{
                getComentariosDetail(productID);
            }
    
        } 
        catch (error) {
            console.log("ERROR: "+error);
        }
    }
    else{
        try {
            if(order != 'none'){
                let response = await fetch(API_URL+'puntaje/'+0+'/'+order);
                let json = await response.json();
                conteiner.comentarios = json;
            }
            else{
                getComentarios();
            }
    
        } 
        catch (error) {
            console.log("ERROR: "+error);
        }        
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

async function getComentariosPuntos(){
    let puntos = document.getElementById("points").value;

    if(document.getElementById("productoID") != null){
        let productID = document.getElementById("productoID").innerHTML;

        try {
            if(puntos != 'none'){
                let response = await fetch(API_URL+'puntos/'+productID+'/'+puntos);
                let json = await response.json();
                conteiner.comentarios = json;
            }
            else{
                getComentariosDetail(productID);
            }
    
        } 
        catch (error) {
            console.log("ERROR: "+error);
        }
    }
    else{
        try {
            if(puntos != 'none'){
                let response = await fetch(API_URL+'puntos/'+0+'/'+puntos);
                let json = await response.json();
                conteiner.comentarios = json;
            }
            else{
                getComentarios();
            }
    
        } 
        catch (error) {
            console.log("ERROR: "+error);
        }        
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
                    setTimeout(addEventos, 1000)

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
                    setTimeout(addEventos, 1000);
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
    let product = document.getElementById("productoID").innerHTML;

    try {
        let response = await fetch(API_URL+'/'+id, {
            "method": "DELETE"
        });
        if(response.ok){
            console.log("comentario "+id+" eliminado");
            if(product != null){
                getComentariosDetail(product);
            }
            else{
                getComentarios();
            }
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
    if(document.getElementById("btnPoints") != null){
        let btnPoints = document.getElementById("btnPoints");
        btnPoints.addEventListener("click", function(e){
            e.preventDefault();
            getComentariosPuntos();
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