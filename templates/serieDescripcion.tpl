{* <div class= "seriesDesription">
    <ul>
        <h1>Especificaciones de {$serie->name}</h1>
            {* {foreach from=$serie item=info} *}       
            {* <li>Nombre: {$serie ->name} </li>         
            <li>Descripción: {$serie ->description} </li>
            <li>Género: {$genderName ->name} </li>         
            <li>Puntuación: {$serie ->score} </li>  *}

            
   {* </ul>
</div> *}

<div class="list-group">
    {* <form action="genero" method="post"> *}
        <ul class="formAdd">
            <p class="list-group-item list-group-item-action active">Especificaciones de {$serie->name}</p>
            <div class ="list-group-item" id="imagenes">
                {foreach from=$images item=image}
                    <img src="../{$image->path}" alt="Imagen de la serie {$serie ->name}">
                            
                {/foreach}
            </div>
            <div {*class="lista"*} class="list-group-item">
                <li>>>Nombre: {$serie ->name} </li>         
                <li>>>Descripción: {$serie ->description} </li>
                <li>>>Género: {$genderName ->name} </li>         
                <li>>>Puntuación: {$serie ->score} </li> 
            </div>
            {* SECCION DE COMENTARIOS QUE MUESTRO SI SOY USUARIO *}
            {* {if isset($smarty.session.ID_USER)} *}
                <div class="list-group-item">
                    <p>SECCION DE COMENTARIOS</p>
                    {include file="./commentsVue.tpl"}
                </div>
            {* {/if} *}
        </ul>
</div>
{* agrego el archivo js *}
<script src="js/comments.js"></script>

