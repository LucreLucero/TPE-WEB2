{literal}   
    <section id="template-vue-comments">
        <ul>
            <label><span class="prom">Promedio: </span>{{prom[0].promedio}}  </label>
            <li v-for="comment in comments">
                <p>{{comment.comment}}</p>
                <p>Puntaje:<span>{{comment.score}}</span></p>
                
                <span v-if="aux">                
                    <a class="btn-eliminar" v-on:click="deleteComment(comment.id_comment)" href="#">Eliminar</a>
                </span>
            </li> 
        </ul>
    </section> 
<section id="template-vue-comments">
<table>
    <tr>
        <th>Promedio: {{prom[0].promedio}}</th>
        
    </tr>
    <tr>
        <td>Comentario</td>
        <td>Puntaje</td>
    </tr>
    <tr v-for="comment in comments">
        <td>{{comment.comment}}</td>
        <td>{{comment.score}}</td>
    </tr>
</table>
  </section>
{/literal}

