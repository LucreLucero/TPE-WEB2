
        {include file="header.tpl" }

        <div class="container">
                <div class="page-header">
                    <h1>Algo que va aca de series</h1>
                </div>
                <div class="row">
                    <div class="column">
                        <label class="c-label">Columna</label>
                        <ul class="list">
                            {foreach $serie as $series}
                                <li class="item-list"
                                    {$serie}>
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                </div>
        </div>
        {include file="series.tpl"}
        {include file="footer.tpl"}

