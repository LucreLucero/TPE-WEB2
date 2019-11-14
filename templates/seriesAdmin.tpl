{include file="series.tpl" }
                        {* ---------- AGREGAR UNA SERIE ---------- *}
{* <div class="seriesAdmin">
    <div class= "addSerie">
        <form class="addSerie" method="POST" action="enterSession/addSerie">
            <label>Agrega una serie:</label>
            <input type="text" name = "nameSerieAdd" placeholder="Serie"/>
            <input type="text" name = "descriptionSerieAdd" placeholder="Descripcion"/>
            <input type="number" name = "scoreSerieAdd" placeholder="Puntaje"/>
            <select name="gender">
                {foreach from=$genders item=genero }
                    <option value="{$genero->id_gender}">{$genero->name}</option>   
                {/foreach}
            </select>

            <button type="submit">Agregar</button>
        </form>
    <div> *}

    <form class="formAdd" method="POST" action="addSerie">
        <label>Agregar una serie:</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name= "nameSerieAdd" placeholder="Serie" aria-label="Recipient's username" aria-describedby="button-addon2">
            <input type="text" class="form-control" name= "descriptionSerieAdd" placeholder="Descripcion" aria-label="Recipient's username" aria-describedby="button-addon2">
            {* <input type="number" class="form-control" name= "scoreSerieAdd" placeholder="Puntaje" aria-label="Recipient's username" aria-describedby="button-addon2"> *}
        {*----- PROBAR HACER EL SELECT ENTRE 1 Y 10 CON JS----------- *}
            <select type="number" name= "scoreSerieAdd" placeholder="Puntaje" class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>
            <select name="gender">
                {foreach from=$genders item=genero }
                    <option value="{$genero->id_gender}">{$genero->name}</option>   
                {/foreach}
            </select>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Agregar</button>
            </div>
        </div>
    </form>
    {if $existeSerie} 
        <p>La serie ya existe</p>
    {/if}
    
        {*-------- para editar las series-------- *}
    <form class="formAdd" method="POST" name= "nameGenderEdit" action="editSerie">
        <label>Editar una serie:</label>
        <div class="input-group">
            <select name="serieEdit" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                {foreach from=$series item=serie }
                    <option value="{$serie->name}">{$serie->name}</option>   
                {/foreach}
            </select>
            <input type="text" name = "nameSerieEdit" placeholder="Serie"/>
            <input type="text" name = "descriptionSerieEdit" placeholder="Descripcion"/>
            {* <input type="number" name = "scoreSerieEdit" placeholder="Puntaje"/> *}
        {*----- PROBAR HACER EL SELECT ENTRE 1 Y 10 CON JS----------- *}
            <select type="number" name= "scoreSerieAdd" placeholder="Puntaje" class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>
            <select name="genderEdit" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                {foreach from=$genders item=genero }
                    <option value="{$genero->id_gender}">{$genero->name}</option>   
                {/foreach}
            </select>
            <button value="Editar" type="submit" class="btn btn-outline-secondary">Editar</button>
        </div>
    </form>
     

            {*----- boton para borrar series------ *}
 <form class="formAdd" method="POST" action="deleteSerie">
    <label>Borrar una serie:</label>
    <div class="input-group" >
            <select name="serieDelete" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                {foreach from=$series item=serie }
                    <option value="{$serie->name}">{$serie->name}</option>   
                {/foreach}
            </select>
            <button type="submit" value="Borrar" class="btn btn-outline-secondary">Borrar</button>
    </div>
</form>

        