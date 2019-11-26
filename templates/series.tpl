 <!-- BOOTSTRAP -->
<div class="container">
    <div class="list-group">
        <form action="serie" method="post">
            <ul>
                <p class="list-group-item active">Series</p>
                {foreach from=$series item=serie}
                    <li>
                        <a href="{$BASE_URL}serie/{$serie["name"]}" class="list-group-item">{$serie["name"]}</a>
                    </li>
                {/foreach}
            </ul>
        </form>
    </div>
</div>

