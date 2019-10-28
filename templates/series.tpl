
<div class= "series">
    <ul>
        <li> Foto serie 1</li>
        <li>Foto serie 2 </li>
        <li>Foto serie 3 </li>
    </ul>
</div>

{* <form> *}
    {* {foreach from= $lista_series item=serie}
        {if $serie->end eq 1}
                <strike><li>{$tarea->titulo}: {$tarea->descripcion}</li></strike>
            {else}
            <li>{$serie->titulo}: {$serie->descripcion} - <a href='end/{$serie->id}'>Finalizar</a> - <a href='borrar/{$tarea->id}'>Borrar</a></li>
        {/if}
            
    {/foreach} *}
<form action= "enterSession" method= "POST">
        <div class="form-group">
            <label>Email address</label>
            <input type="email" name="userEmail" placeholder="Enter email"/>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name= "password" placeholder="Password"/>
        </div>
        <button type="submit">Iniciar Sesión</button>
</form>

{* <form action="insert" method="post">
    <input type="text" name="titulo" placeholder="Titulo">
    <input type="text" name="descripcion" placeholder="Descripcion">
    <input type="number" name="prioridad"  max="10">
    <input type="checkbox" name="finalizada" id="end">
    <input type="submit" value="Insertar"> *}
{* </form> *}
