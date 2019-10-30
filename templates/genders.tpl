<p>Géneros:</p>
<form action="seriesOfGender" method="post">
    <ul>
        {foreach from= $genders item= gender }
            <a href='{$BASE_URL}genero/{$gender ->name}'><li> {$gender ->name}  </li></a>
            {* <a href='{$BASE_URL}delete/{$gender ->id_gender}'> Delete </a> *}
        {/foreach}
    </ul>
</form>
<!--HACER UN SELECT-->

{* <form action="seriesOfGender" method="post">
    <select>
        {foreach from= $genders item= gender}
       
           <option href='{$BASE_URL}genders/{$gender ->name}'> {$gender ->name} </a></option>          
        {/foreach}
    </select>
</form> *}


