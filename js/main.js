// document.addEventListener("DOMContentLoaded", function(){
// //Inicio el DOMContentLoaded con una funcion anonima

//     get(); //Para que empiece leyendo la funcion get y trae lo que tenga el servidor

//     //GET funcion asincronica
//     let json;

//     async function get() {

//         let url= "https://web-unicen.herokuapp.com/api/groups/27/menus";

//         let carga = await fetch(url); // No especifico el metodo ya que por defecto hace un GET
        
//         json = await carga.json(); // Trnsformo la info del get (que está en string) en un json
//         document.getElementById("tbody").innerHTML = " ";//declaro la tabla en vacio
        
//         for (const elem of json.menus){
//             //para cada elemento del objeto menu dentro del objeto json
  
//             mostrarTabla(elem.thing.dia, elem.thing.almuerzo, elem.thing.cena, elem.thing.platoSaludable, elem._id);
//             //llamo a la funcion mostrar tabla y le paso por parametros los valores
//             //borrarTodo(elem.thing.dia, elem.thing.almuerzo, elem.thing.cena, elem.thing.platoSaludable, elem._id)
//         }
//     }

//     function mostrarTabla(dia, almuerzo, cena, platoSaludable, id){ //Agrego el contenido del JSON a la tabla
                
//         let tabla = document.getElementById("tbody");
//         let tdDia = document.createElement("td");//Creo una celda td
//         tdDia.innerText = dia;//inserto en la celda el valor de dia
//         let tdAlmuerzo = document.createElement("td");
//         tdAlmuerzo.innerText = almuerzo;
//         let tdCena = document.createElement("td");
//         tdCena.innerText = cena;
//         let tdPlatoS = document.createElement("td");
//         tdPlatoS.innerText = platoSaludable;
//         //fin celdas con valores del json
//         let btnborrar= document.createElement("button");
//         btnborrar.innerText = "Borrar";
//         //creo el boton borrar y le pongo borrar
//         let btneditar= document.createElement("button");
//         btneditar.innerText = "Editar";
//         //creo el boton editar y le pongo editar
//         btneditar.addEventListener("click", function(){editarFila(id)});
//         btnborrar.addEventListener("click", function(){borrarFila(id)});        
//         //funciones que pasan el parametro del id
//         let tdButtons = document.createElement("td");
//         tdButtons.append(btnborrar, btneditar);
//         //meto las declaraciones de los botones en una celda  

//         let tr = document.createElement("tr");// declaro una fila
//         tr.append(tdDia, tdAlmuerzo, tdCena, tdPlatoS, tdButtons);
//         //en la fila meto las declaraciones de los valores del json y los botones

//         tabla.appendChild(tr);// meto la fila en la tabla         
//     }

//     let btnAgregarFila= document.getElementById("btnAgregarFila");
//     btnAgregarFila.addEventListener("click", agregarFila); //Agregar fila

//     //AGREGAR
//     async function agregarFila(){ 
//         event.preventDefault();
//         let url= "https://web-unicen.herokuapp.com/api/groups/27/menus";
//         //Declaro variables y leo los valores que agrego desde los inputs
//         let dia = document.getElementById("diasInput").value;
//         let almuerzo = document.getElementById("almuerzoInput").value;
//         let cena = document.getElementById("cenaInput").value;
//         let platoSaludable = document.getElementById("platoSaludableInput").value;
        
//         //meto las vatiables en el objeto data JSON 
//         let data = {
//             "thing" : {
//                 "dia" : dia,
//                 "almuerzo" : almuerzo,
//                 "cena" : cena,
//                 "platoSaludable" : platoSaludable
//             }
//         };

//         try {  //hago el post en el server del objeto JSON data
//             let r = await fetch(url , {
//                 "method" : "POST",
//                 "headers" : {
//                     "Content-Type" : "application/json"
//                 },
//                 "body" : JSON.stringify(data)
//             });
//         }
//         catch(e) {
//             console.log(e);
//         }
        
//         get();
//     };

//     let btnAgregarTresFilas= document.getElementById("btnAgregarTresFilas");
//     btnAgregarTresFilas.addEventListener("click", agregarTresFilas);
    
//     //AGREGAR 3 FILAS
//     async function agregarTresFilas() { 
//         console.log(prueba);
//         event.preventDefault();
//         for(i=0; i<3; i++){
//             let url= "https://web-unicen.herokuapp.com/api/groups/27/menus";
//             //Declaro variables y leo los valores que agrego desde los inputs
//             let dia = document.getElementById("diasInput").value;
//             let almuerzo = document.getElementById("almuerzoInput").value;
//             let cena = document.getElementById("cenaInput").value;
//             let platoSaludable = document.getElementById("platoSaludableInput").value;
            
//             //meto las vatiables en el objeto data JSON 
//             let data = {
//                 "thing" : {
//                     "dia" : dia,
//                     "almuerzo" : almuerzo,
//                     "cena" : cena,
//                     "platoSaludable" : platoSaludable
//                 }
//             };

//             try {  //hago el post en el server del objeto JSON data
//                 let r = await fetch(url , {
//                     "method" : "POST",
//                     "headers" : {
//                         "Content-Type" : "application/json"
//                     },
//                     "mode" : "cors",
//                     "body" : JSON.stringify(data)
//                 });
//             }
//             catch(e) {
//                 console.log(e);
//             }
//         }
        
//         get();//traigo los datos del server
//     }


//     //FILTRO

//     //Llamo a la funcion filtrar con el evento keyup
//     //(lee los caracteres una vez que dejas de escribir)
//     document.getElementById("filtrar").addEventListener("keyup", function(){  
//         let coincidencia = false;//declaro un booleano
//         let i = 0;//declaro a i en 0
//         console.log(i)
//         let buscar = filtrar.value.toUpperCase();//paso lo escrito a mayusculas
//         console.log(buscar);
//         let tr = Menu.getElementsByTagName('tr'); // declaro una variable filas de Menu que se llama tr
//         for (let j = 0; j < Menu.rows.length; j++) { //recorro las filas de la tabla
//             coincidencia = false;
//             i = 0;
//             let td = tr[j].getElementsByTagName('td');// declaro la celda de la fila tr en el valor de j, como td
//             while ((!coincidencia) && (i < td.length)) { 
//                 //Mientras coincidencia(false) sea distinta de false 
//                 //y i menor que el largo del string en la celda
//                 let comparar = td[i].innerHTML.toUpperCase();
//                 console.log(buscar);
//                 console.log(comparar);
//                 let aux = comparar.indexOf(buscar);
//                 console.log(aux);
//                 if (comparar.indexOf(buscar) > -1) {
//                     tr[j].classList.remove("ocultar");
//                     coincidencia = true;
//                 } else {
//                     tr[j].classList.add("ocultar");
//                 }
//                 i++;
//             }
//         }
//     })
//     //Borra todo
//     async function borrarTodo(){
//         //console.log(contador);
//         for(const elem of json.menus){
//             borrarFila(elem._id);
//         }
//     }
//     document.getElementById("btnBorrarTabla");
//     btnBorrarTabla.addEventListener("click", borrarTodo);


//     //Borro fila (recibo el id de parametro)y actualizo al final con get
//     async function borrarFila(id) {
        
//         let url= "https://web-unicen.herokuapp.com/api/groups/27/menus";

//         console.log('eliminar');
            
//         try{
//                 let carga= await fetch(url+"/"+id,
//                     {"method": "DELETE",
//                 });
//                 let json= await carga.json();
//                 console.log(json);
//                 notificacion.innerHTML= "Se borró con éxito"
//             }
            
//         catch(e){
//                 notificacion.innerHTML= "No se borró"
//                 console.log(e);
//             }

//         get();
//     }

//     // EDITAR
//     async function editarFila(id) {
        
//         event.preventDefault();
//         let url= "https://web-unicen.herokuapp.com/api/groups/27/menus";

//         //Declaro variables y leo los valores que agrego desde los inputs
//         let dia = document.getElementById("diasInput").value;
//         let almuerzo = document.getElementById("almuerzoInput").value;
//         let cena = document.getElementById("cenaInput").value;
//         let platoSaludable = document.getElementById("platoSaludableInput").value;
        
//         //meto las vatiables en el objeto data JSON 
//         let data = {
//             "thing" : {
//                 "dia" : dia,
//                 "almuerzo" : almuerzo,
//                 "cena" : cena,
//                 "platoSaludable" : platoSaludable}
//         };
//             try{
//                 await fetch(url +"/"+ id, //le paso la url y el ID
//                 {
//                     "method": "PUT", //método para editar el servidor
//                     "headers": {"Content-Type": "application/json"},
//                     "body": JSON.stringify(data)
//                 })
//                 //.then(await get().then(await mostrarTabla()));
//                 //await get();
//                 //await mostrarTabla();   
//             }
            
//             catch(e){
//                 console.log(e); 
//             }
//             get()
//     };
        
//     //REFRESH: Actualizamos la tabla cada 
//     setInterval(async function () {
//         await get();
//         //await mostrarTabla();
//     }, 1000)
// });
