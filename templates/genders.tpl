{*
<div class="generos">
    {* <h2>Géneros:</h2>
    <form action="genero" method="post">
        {* <div class="listaGender"> *}
            {* <ul>
                {foreach from= $genders item= gender }
                    <li class="listaGender">
                        <a href='{$BASE_URL}genero/{$gender ->name}'> {$gender ->name}</a>
                    </li>
                {/foreach}
            </ul> *}
        {* </div> 
    </form> 
</div> *}


                                    <!-- BOOTSTRAP -->
<div class="container">
    <div class="list-group">
    <form action="genero" method="post">
        <ul>
            <p class="list-group-item list-group-item-action active">Géneros</p>
            {foreach from= $genders item= gender }
                <li>
                    <a href="{$BASE_URL}genero/{$gender->id_gender}" class="list-group-item list-group-item-action"> {$gender ->name} </a>
                </li>
            {/foreach}

        </ul>
    </form>
    </div>
</div>  

<!-- PROBANDO -->
{* <div class="container">
    <div class="list-group">
    <form action="genero" method="post">
            <p class="list-group-item list-group-item-action active">Géneros</p>
        <ul class="list-group list-group-horizontal">
            {foreach from= $genders item= gender }
                <li list-group-item>
                    <a href="{$BASE_URL}genero/{$gender ->name}" class="list-group-item list-group-item-action"> {$gender ->name} </a>
                </li>
            {/foreach}

        </ul>
    </form>
    </div>
</div>   *}
