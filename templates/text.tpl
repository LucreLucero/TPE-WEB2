   {* <section id="template-vue-comments">
        <ul>
            <label><span class="prom">Promedio: </span>{{prom[0].promedio}}  </label>
            <li v-for="comment in comments">
                <p>Comentario: {{comment.comment}}</p>
                <p>Puntaje:<span>{{comment.score}}</span></p>
                
                <span v-if="aux">                
                    <a class="btn-eliminar" v-on:click="deleteComment(comment.id_comment)" href="#">Eliminar</a>
                </span>
            </li> 
        </ul>
    </section>  *}
    
    {* <table >
        <thead>
            <tr> <!-- para campo en columnas, programar el click sobre cada columnas -->
                <th>Comentario</th>
                <th>Puntaje</th>
            </tr>
        </thead>   
        <tbody>
            <span >
            <tr v-for="comment in comments">
                <td>{{comment.comment}}</td>
                <td>{{comment.score}}</td>
            </tr>
            </span>
        </tbody>
    </table> *}