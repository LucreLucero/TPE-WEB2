"use strict"
// document.addEventListener("DOMContentLoaded", function(){
        
    getComments();
    // inicio vue js
    let app = new Vue({
        el: "#comments-list",
        data: {
            commentsArray: []
        }
    });
    
//------- proobando con la filmina---------
    function getComments() {
        fetch("api/comments")
        .then(response => response.json())
        .then(comments => {
            let commentsUl = document.querySelector(".listaDeComentarios");
            commentsUl.innerHTML = "";
            for (let comm of comments) {
                commentsUl.innerHTML += showComments(comm);
                }
            app.commentsArray = commentsArray;
        });
        .catch(error => console.log(error));
    }
// ------------------------------
    // function getComments() {
    //     fetch('api/comments')
    //     .then(response => {
    //         if(response.ok){ 
    //             return response.json();
    //         }
    //     })
    //     .then(comments => showComments(comments) )
    
    //     .catch(error => console.log(error));
    // }
    
    function showComments(comments){
        let listaComments = document.querySelector("#listaDeComentarios");
        listaComments.innerHTML = "";
        for(let comment of comments) {
            listaComments.innerHTML += "<li>" + comment.commentsArray + "</li>";
        }

    }

// });