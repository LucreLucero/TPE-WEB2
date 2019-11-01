
<div class="generos">
    <h2>Géneros:</h2>
    <form action="genero" method="post">
        {* <div class="listaGender"> *}
            <ul>
                {foreach from= $genders item= gender }
                    <li class="listaGender">
                        <a href='{$BASE_URL}genero/{$gender ->name}'> {$gender ->name}</a>
                    </li>
                {/foreach}
            </ul>
        {* </div> *}
    </form> 
</div>



