    <div id="comments-list" class="list-group">
            <ul id= "listaDeComentarios">
            </ul>
    </div>
    {if isset($smarty.session.ID_USER)}
        {literal}
            <form class="formAdd" method="POST" name= "" action="addComment">
                <label>Agrega un comentario</label>
                <div class="input-group">
                    <input type="text"  class="form-control" placeholder="Ingrese su comentario"/>
                    <select type="number" max="5" name= "scoreSerieEdit" placeholder="Puntaje" class="form-control" id="exampleFormControlSelect1">
                    
                </div>
                <button value="agregarComment" type="submit" @click="addComment"class="btn btn-outline-secondary">Enviar</button>
            </form>
        {/literal}
    {/if}

{* 
    <label>Agrega un comentario:</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" name= "nameSerieAdd" placeholder="Serie" aria-label="Recipient's username" aria-describedby="button-addon2">
    </div>
    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Enviar</button> *}
