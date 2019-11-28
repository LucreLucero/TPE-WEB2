<!-- LISTA DE SERIES DE UN GENERO X -->
        {* <ul>
            {foreach from=$seriesOfGender item=serie}
            
                <li>
                    <a href='{$BASE_URL}serie/{$serie->name}'> {$serie->name} </a>
                </li>  

            {/foreach}
        </ul> *}
<div class="list-group" id="seriesDeGenero">
    <ul>
    {* <li>{$series ->name}</li> *}
    <p class="list-group-item active">Series</p>
                {foreach from=$series item=serie}
                    <li>
                        <a href="{$BASE_URL}serie/{$serie->name}" class="list-group-item">{$serie->name}</a>
                    </li>
                {/foreach}
        {* {foreach from=$series item=serie}   
            <li>
                <a href="{$BASE_URL}serie/{$serie->name}" class="list-group-item list-group-item-action active">{$serie->name}</a>
            </li>  
        {/foreach} *}
    </ul>
</div>
