{literal}   
 
   <!-- --------------------------------------------------------- -->
    <section id="template-vue-comments">
        <h3><span class="badge badge-info">Promedio: {{prom.promedio}}</span></h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Comentario</th>
                    <th scope="col">Puntaje</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="comment in comments">
                        <td>{{comment.comment}}</td>
                        <td>{{comment.score}}</td>
                        <td><span v-if="aux">                
                            <a class="btn-eliminar" v-on:click="deleteComment(comment.id_comment)" href="#">Eliminar</a>
                        </span>
                        </td>
                    </span>   
                </tr>
            </tbody>
        </table>
        
    </section>
{/literal}

