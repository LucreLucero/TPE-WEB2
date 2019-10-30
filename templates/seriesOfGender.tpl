<!-- LISTA DE SERIES DE UN GENERO X -->
<form action="seriesOfGender" method="post">
    <ul>
        {foreach from=$seriesOfGender item=serie}

           <li> {$serie->name}  </li>          
        
        {/foreach}
    </ul>
</form>