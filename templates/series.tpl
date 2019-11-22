 {* <button type="button"><a href="{$BASE_URL}"><<</a></button> *}

<!-- LISTA DE SERIES DE TODOS LOS // VISITANTE -->
{* <div class="series">
    <h2>Series:</h2>
    <form action="serie" method="post">
        <ul>
        <h2>Series:</h2>
            {foreach from=$series item=serie}
            <li class= listaSeries>
            <a href='{$BASE_URL}serie/{$serie->name}'><li> {$serie->name}  </li></a>  
            {* <a href='{$BASE_URL}deleteSerie/{$serie->id_serie}'> Delete </a> 
            </li>      
            {/foreach}
        </ul>
    </form>
</div> *}

 <!-- BOOTSTRAP -->
<div class="container">
    <div class="list-group">
        <form action="serie" method="post">
            <ul>
                <p class="list-group-item active">Series</p>
                {foreach from=$series item=serie}
                    <li>
                        <a href="{$BASE_URL}serie/{$serie["name"]}" class="list-group-item">{$serie["name"]}</a>
                    </li>
                    {foreach from= {$images["id_image"]} item=image}
                    {* echo $serie; *}
                        {* <li> *}
                            <img src="{$image["path"]}" alt="Imagen de la serie {$serie["name"]}">
                            {* <a href="{$BASE_URL}serie/{$serie->name}" class="list-group-item">{$serie->name}</a> *}
                        {* </li> *}
                    {/foreach}
                {/foreach}
            </ul>
        </form>
    </div>
</div>

