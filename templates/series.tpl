 {* <button type="button"><a href="{$BASE_URL}"><<</a></button> *}

<!-- LISTA DE SERIES DE TODOS LOS // VISITANTE -->
<div class="series">
    <form action="serie" method="post">
        <ul>
        <h2>Series:</h2>
            {foreach from=$series item=serie}
            <li class= listaSeries>
            <a href='{$BASE_URL}serie/{$serie->name}'><li> {$serie->name}  </li></a>  
            {* <a href='{$BASE_URL}deleteSerie/{$serie->id_serie}'> Delete </a> *}
            </li>      
            {/foreach}
        </ul>
    </form>
</div>


