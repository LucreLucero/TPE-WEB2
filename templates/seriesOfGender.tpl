<!-- LISTA DE SERIES DE UN GENERO X -->
        <ul>
            {foreach from=$seriesOfGender item=serie}
            
                <li>
                    <a href='{$BASE_URL}serie/{$serie->name}'> {$serie->name} </a>
                </li>  

            {/foreach}
        </ul>
