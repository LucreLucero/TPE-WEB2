<!-- LISTA DE SERIES DE UN GENERO X -->
        {* <ul>
            {foreach from=$seriesOfGender item=serie}
            
                <li>
                    <a href='{$BASE_URL}serie/{$serie->name}'> {$serie->name} </a>
                </li>  

            {/foreach}
        </ul> *}

<div class="list-group">
    <ul>
        {foreach from=$seriesOfGender item=serie}   
            <li>
                <a href="{$BASE_URL}serie/{$serie->name}" class="list-group-item list-group-item-action active">{$serie->name}</a>
            </li>  
        {/foreach}
    </ul>
</div>

