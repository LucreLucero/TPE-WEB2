 {* <button type="button"><a href="{$BASE_URL}"><<</a></button> *}

<!-- LISTA DE SERIES DE TODOS LOS GENEROS -->
<p>Series:</p>
<form action="serie" method="post">
    <ul>
        {foreach from=$series item=serie}
       
           <a href='{$BASE_URL}serie/{$serie->name}'><li> {$serie->name}  </li></a>          
        {/foreach}
    </ul>
</form>


