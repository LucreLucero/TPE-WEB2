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
    <form action="genero" method="post">
        <ul>
            <p class="list-group-item list-group-item-action active">Especificaciones de {$serie->name}</p>
                <li>Nombre: {$serie ->name} </li>         
                <li>Descripción: {$serie ->description} </li>
                <li>Género: {$genderName ->name} </li>         
                <li>Puntuación: {$serie ->score} </li> 
        </ul>
    </form>
</div>
