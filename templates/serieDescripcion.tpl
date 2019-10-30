<ul>
    <h1>Especificaciones de {$serie->name}</h1>
        {* {foreach from=$serie item=info} *}       
        <li> {$serie->name} </li>          
           <li> {$serie->description} </li>          
           <li> {$serie->score} </li>     
           {* <li> {$info->score} </li> ACÁ VA LA FOTO *}           
        {* {/foreach} *}
</ul>
