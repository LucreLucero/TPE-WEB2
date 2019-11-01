{include file="series.tpl" }
<div class="seriesAdmin">
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
    <div>
        {*-------- para editar las series-------- *}
        <form class="editSerie" method="POST" action="enterSession/editSerie">
            <label>Editar una serie:</label>

            <select name="serieEdit">
                {foreach from=$series item=serie }
                    <option value="{$serie->name}">{$serie->name}</option>   
                {/foreach}
            </select>

            <input type="text" name = "nameSerieEdit" placeholder="Serie"/>
            <input type="text" name = "descriptionSerieEdit" placeholder="Descripcion"/>
            <input type="number" name = "scoreSerieEdit" placeholder="Puntaje"/>
            <select name="genderEdit">
                {foreach from=$genders item=genero }
                    <option value="{$genero->id_gender}">{$genero->name}</option>   
                {/foreach}
            </select>

            <button type="submit">Editar</button>

        </form>
            {*----- boton para borrar series------ *}
        <form class="deleteSerie" method="POST" action="enterSession/deleteSerie">
            <select name="serieDelete">
                {foreach from=$series item=serie }
                    <option value="{$serie->name}">{$serie->name}</option>   
                {/foreach}
            </select>
            <input type="submit" value="Borrar"/>
        </form>
</div>