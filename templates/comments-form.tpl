{* <form id="formAdd" method="POST" name= "addComment" action="addComment">
    <label>Agrega un comentario</label>
    <div class="input-group">
        <input type="text"  name= "comment" class="form-control" placeholder="Ingrese su comentario"/>
        <input type="number" name = "score" max = "5" name= "scoreSerieEdit" placeholder="Puntaje" class="form-control" id="exampleFormControlSelect1"/>
        <input type="hidden" name="id_serie" value="{$serie["id_serie"]}"/>
        {* <input type="hidden" name="id_usuario" value="1"></input>  *}
    {* </div>
    <button value="insert" type="submit" @click="addComment"class="btn btn-outline-secondary">Enviar</button>
</form> *}


<form class="formAdd" id="formAdd" method="POST" name= "addComment" action="addComment">
    <label>Agrega un comentario:</label>
    <div class="input-group">
        <input type="text"  name= "comment" class="form-control" placeholder="Ingrese su comentario"/>
        <input type="number" name = "score" max = "5" min = "1" name= "scoreSerieEdit" placeholder="Puntaje" class="form-control" id="exampleFormControlSelect1"/>
        <input type="hidden" name="id_serie" value="{$serie->id_serie}"/>
        <input type="hidden" name="id_user" value="{$userDates->id_user}"/>
        <input type="hidden" name="userName" value="{$userDates->name}"/>


        <button value="add" type="submit"  class="btn btn-outline-secondary">Enviar</button>
    </div>
</form>
