 

    {* <ul> *}
    <h1>Series de Nefli</h1>
        {* {foreach from=$serie item=info} *}
       
           <li> {$serie->name} </li>          
           <li> {$serie->description} </li>          
           <li> {$serie->score} </li>     
           {* <li> {$info->score} </li> ACÁ VA LA FOTO *}
           
        {* {/foreach} *}
    {* </ul> *}
