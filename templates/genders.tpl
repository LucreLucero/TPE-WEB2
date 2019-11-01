{* <div class="listaGender"> *}

<div class="generos">
    <form action="genero" method="post">
            <ul>
            <h2>Géneros:</h2>
                {foreach from= $genders item= gender }
                    <li class="listaGender">
                        <a href='{$BASE_URL}genero/{$gender ->name}'> {$gender ->name}</a>
                    </li>
                {/foreach}
            </ul>
    </form> 
</div>
{* </div> *}