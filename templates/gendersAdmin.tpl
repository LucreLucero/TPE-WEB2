{include file="genders.tpl"}
<div class= "generoAdmin">
    <form class="addGender" method="POST" action="enterSession/add">
        <label>Agrega un genero</label>
        <input type="text" name= "nameGenderAdd" placeholder="Gender"/>
        <button type="submit">Agregar</button>
    </form>

    {*----- hacer-------- *}
        <label>Editar un genero</label>
        <ul>
            {foreach from= $genders item= item }
                <form class="editGender" method="POST" action="enterSession/edit/{$item->name} ">
                    <li>
                        {$item->name} 
                        <input type="text" name= "nameGenderEdit" placeholder="Gender"/>
                        <input value="Editar" type="submit"/>
                        
                            <button><a href="{$BASE_URL}enterSession/delete/{$item->name}">Borrar</a></button>
                    </li>
                </form>
            {/foreach}
        </ul>
</div>
    {* <button type="submit">Editar</button>

<form class="deleteGender" method="POST" action="enterSession/delete">
    <label>Borrar un genero</label>
    <input type="text" name= "nameGenderDelete" placeholder="Gender"/>
    <button type="submit">Borrar</button>
</form> *}
