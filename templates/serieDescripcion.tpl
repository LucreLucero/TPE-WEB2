<div class="list-group">
    <ul class="formAdd">
        <p class="list-group-item list-group-item-action active">Especificaciones de {$serie->name}</p>
        <div class ="list-group-item" id="imagenes">
            {foreach from=$images item=image}
                <img src="../{$image->path}" alt="Imagen de la serie {$serie ->name}">
                        
            {/foreach}
        </div>
        <div class="list-group-item">
            <li>Nombre: {$serie ->name} </li>         
            <li>Descripción: {$serie ->description} </li>
            <li>Género: {$genderName ->name} </li>         
            <li>Puntuación: {$serie ->score} </li> 
        </div>
    {* aca puedo llamar a $series, $genero $imagenes *}
            {* SECCION DE COMENTARIOS QUE MUESTRO SI SOY USUARIO *}
        <div class="list-group-item">
            <h2>Comentarios</h2>
                <input type="hidden" name="id_serie" value="{$serie->id_serie}"/>
            {* lista de comentarios con vue*}
                {include file="./vue/commentsVue.tpl"}

            {if $isAdmin}
                <input hidden id="admin" value="true">  
                {* si soy usuario pero no admin veo el formulario *}
                {elseif (isset($smarty.session.ID_USER))}
                    {include file="./comments-form.tpl"}
            {/if}


        </div>
    </ul>
</div>
{* agrego el archivo js *}
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="../js/comments.js" type="text/javascript"></script>

