{include file="genders.tpl"}

                            {* AGREGAR *}    
<form class="formAdd" method="POST" action="add">
    <label>Agregar Género:</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" name= "nameGenderAdd" placeholder="Gender" aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Agregar</button>
        </div>
    </div>
</form>

     {*----- hacer-------- *}

            {* EDITAR NUEVO CON SELECT *}
<form class="formAdd" method="POST" name= "nameGenderEdit" action="edit">
    <label>Editar un genero:</label>
    <div class="input-group">
    <select name="genderEdit" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
        {foreach from= $genders item= item }
            <option value="{$item->name}">{$item->name}</option>   
        {/foreach}
    </select>
    <input type="text" name= "nameGenderEdit" placeholder="Nuevo nombre"/>
    <button value="Editar" type="submit" class="btn btn-outline-secondary">Enviar</button>
    </div>
</form>
    
    {* BORRAR  *}
<form class="formAdd" method="POST" action="delete">
    <label>Borrar un genero:</label>
    <div class="input-group">
    <select name="gender" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
        {foreach from= $genders item= item }
            <option value="{$item->name}">{$item->name}</option>   
        {/foreach}
    </select>
    <button value="Borrar" type="submit" class="btn btn-outline-secondary">Borrar</button>
    </div>
</form>
{if $existeGender} 
    <p>El género ya existe</p>
{/if}

            
        {*  EDITAR ORIGINAL *}
{* <label>Editar un genero</label>
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
</div>  *}
    {* <button type="submit">Editar</button>

<form class="deleteGender" method="POST" action="enterSession/delete">
    <label>Borrar un genero</label>
    <input type="text" name= "nameGenderDelete" placeholder="Gender"/>
    <button type="submit">Borrar</button>
</form> *}
