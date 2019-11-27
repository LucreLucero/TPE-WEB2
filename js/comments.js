console.log("inicio");
"use strict";
//document.addEventListener("DOMContentLoaded", function(){
// event listeners
    let formulario = document.querySelector("#formAdd");
    if(formulario != null) {
        formulario.addEventListener('submit', addComment);
    }

    // inicio vue js
    let app = new Vue({
        el: "#template-vue-comments",
        data: {
            subtitle: "Commentando con vue",
            comments: [],
            auth: true,
            aux: [],
            prom : [],
        },
        methods : {
            deleteComment : function (id_comment){
                borrar (id_comment);
            }
        }

    });

//------- proobando con la filmina---------
    function getComments(id_serie) {
        let url = "../api/serie/" + id_serie + "/comments";
        fetch(url)
    .then(response => response.json())
    .then(comments => {
        app.comments = comments;
    })
    .catch(error => console.log(error));
    // promedio(id_serie);  
    }

    function addComment(e){
        e.preventDefault();
        id = document.querySelector("input[name=id_serie]").value;
        // let date = new Date();
        let data = {
            comment : document.querySelector("input[name=comment]").value,
            score : document.querySelector("input[name=score]").value,
            id_serie : document.querySelector("input[name=id_serie]").value,
            id_user : document.querySelector("input[name=id_user]").value,
            // date = date.toUTCString()
        }

        fetch ('../api/comments',{
            method: 'POST',
            headers: {
                'Content-Type' : 'application/json'
            },
            body : JSON.stringify(data)
        }).then (response =>{ 
            getComments(id);
            promedio(id);
        })
        .catch(error=>console.log(error));
    }

    function borrar (id_comment){
        event.preventDefault();
        id = document.querySelector("input[name=id_serie]").value;

        fetch("../api/comments/" + id_comment,{
            method: 'DELETE',
            headers: {
                'Content-Type' : 'application/json'
            },
        }).then (response =>{
            getComments(id);
            promedio(id);
        })
        .catch(error=>console.log(error));
    }

    function promedio(id_serie){
        let url = "../api/serie/" + id_serie + "/promedio";
        fetch(url)
        .then(response => response.json())
        .then(promedio => {
            app.prom = promedio;
        })
        .catch(error => console.log(error));

    }
    
    document.addEventListener("DOMContentLoaded", function(){

    
        let form = document.querySelector("#formAdd");
        console.log(form);
        console.log(id_serie);
        let admin = document.getElementById("admin");
        //console.log(admin.value);
        if(admin) {
            app.aux = true;
        }else{
            app.aux = false;
        }
    })
    let id_serie = document.querySelector("input[name=id_serie]").value;
    getComments(id_serie);
    promedio(id_serie);