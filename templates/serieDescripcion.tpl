 

    <ul>
    <h1>DESCRIPCGF FI FOHFCESLVKÑWLJREÑLVW</h1>
        {foreach from=$serie item=info}
       
           <li> {$info->name} </li>          
           <li> {$info->description} </li>          
           <li> {$info->score} </li>     
           {* <li> {$info->score} </li> ACÁ VA LA FOTO *}
           
        {/foreach}
    </ul>
