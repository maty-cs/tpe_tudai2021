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
        console.log(json)

        conteiner.comentarios = json;
    } 
    catch (error) {
        console.log("ERROR: "+error);
    }
}

window.onload = getComentarios();