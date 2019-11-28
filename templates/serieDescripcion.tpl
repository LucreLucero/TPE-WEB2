<div class="list-group">
    <ul class="formAdd">
        <p class="list-group-item list-group-item-action active">Especificaciones de {$serie->name}</p>
        <div class ="list-group-item" id="imagenes">
            {foreach from=$images item=image}
                <img src="../{$image->path}" alt="Imagen de la serie {$serie ->name}">
                        
            {/foreach}
        </div>
        <div class="list-group-item">
            <li><span class="badge badge-pill badge-info">Nombre</span> {$serie ->name} </li>         
            <li><span class="badge badge-pill badge-info">Descripción</span> {$serie ->description} </li>
            <li><span class="badge badge-pill badge-info">Género</span> {$genderName ->name} </li>         
            <li><span class="badge badge-pill badge-info">Puntuación</span> {$serie ->score} </li> 
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
                <input hidden id="user" value="{$userDates->name}"/> 


        </div>
    </ul>
</div>
{* agrego el archivo js *}
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="../js/comments.js" type="text/javascript"></script>

