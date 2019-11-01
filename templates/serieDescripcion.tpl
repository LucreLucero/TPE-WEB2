<div class= "seriesDesription">
    <ul>
        <h1>Especificaciones de {$serie->name}</h1>
            {* {foreach from=$serie item=info} *}       
            <li>Nombre: {$serie ->name} </li>         
            <li>Descripción: {$serie ->description} </li>
            <li>Género: {$genderName ->name} </li>         
            <li>Puntuación: {$serie ->score} </li> 

            {* <li> {$info->score} </li> ACÁ VA LA FOTO *}           
            {* {/foreach} *}
    </ul>
</div>
