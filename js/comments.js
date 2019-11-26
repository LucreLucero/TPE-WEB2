"use strict"
document.addEventListener("DOMContentLoaded", function(){

    function getComments() {
        fetch('api/comments/')
        .then(response => response.json())
        .then(tasks => {
            let content = document.querySelector(".lista-tareas");
            content.innerHTML = "";
            for(let task of tasks) {
                content.innerHTML += createTaskHTML(task);
            }
        })
        .catch(error => console.log(error));
    }
    

});