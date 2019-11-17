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
            <div class ="imagenes">
                <li>>>Aca va la foto</li> 
            </div>
            <div class="lista">
                <li>>>Nombre: {$serie ->name} </li>         
                <li>>>Descripción: {$serie ->description} </li>
                <li>>>Género: {$genderName ->name} </li>         
                <li>>>Puntuación: {$serie ->score} </li> 
            </div>
        </ul>
    {* </form> *}
</div>
