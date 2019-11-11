"use strict";
document.addEventListener('DOMContentLoaded', function()

{

    

    let numAleatorio= 0;
    let btnEnviar= document.getElementById("btnEnviar");

    function generarNumAleatorio(){
        numAleatorio= 100 + Math.floor(Math.random()* 999);
        document.getElementById("numAleatorio").innerHTML= numAleatorio;
    }

    function validarCaptcha(event){
        event.preventDefault();
        let num2= document.getElementById("numIngresado").value;
        if (numAleatorio == num2 ){ 

            alert("Formulario enviado!");
                        
            return true;
        
        }
        else{
            alert("El formulario no será enviado, el número ingresado es incorrecto.");
                
        return false;
        
        }
        
    }
  
     btnEnviar.addEventListener("click",validarCaptcha);
    

    generarNumAleatorio();
})