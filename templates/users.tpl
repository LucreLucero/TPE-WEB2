<div class="container">
    <div class="list-group">
        {* <form action="users" method="post"> *}
            <ul>
                <p class="list-group-item active">Usuarios</p>
                {foreach from=$users item=user}
                    <li>
                        <a href="{$BASE_URL}user/{$user->id_user}" class="list-group-item">{$user->name}</a>
                    </li>
                    {if $user->isAdmin}
                        <a href="{$BASE_URL}convertToAdmin/{$user->id_user}">Quitar Permisos</a>
                    {else}
                        <a href="{$BASE_URL}convertToAdmin/{$user->id_user}">Dar Permisos</a>
                    {/if}
                {/foreach}
            </ul>
        {* </form> *}
    </div>
</div>
<!-- DELETE USER -->
<form class="formAdd" method="POST" action="deleteUser">
    <label>Borrar un usuario:</label>
    <div class="input-group">
    <select name="userName" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
        {foreach from= $users item=user }
            <option value="{$user->id_user}">{$user->name}</option>   
        {/foreach}
    </select>
    <button value="Borrar" type="submit" class="btn btn-outline-secondary">Borrar usuario</button>
    </div>
</form>
