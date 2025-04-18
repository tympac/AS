{* app/views/templates/properties_fragment.tpl *}

<div id="results">
    <div class="row">
        {foreach $house as $h}
        {strip}
        <div class="col-lg-4">
            <div class="trainer-item">
                {foreach $housefoto as $hf}
                {strip}
                {if $hf["idHouse"] == $h["idHouse"]}
                <div class="image-thumb">
                    <img src="{$hf["imagePath"]}">
                </div>
                {/if}
                {/strip}
                {/foreach}
                <div class="down-content">
                    <span>
                        <del><sup>$</sup>{$h["price"] + ($h["price"])/10}</del>
                        <sup>$</sup>{$h["price"]}
                    </span>
                    <h4>{$h["descryption"]}</h4>
                    <p>{$h["address"]}</p>
                    <p>{$h["type"]}</p>
                    <ul class="social-icons">
                        <li><a href="{$conf->action_root}propertiesDetails?id={$h["idHouse"]}">+ View More</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {/strip}
        {/foreach}
    </div>

    {if isset($totalPages) && $totalPages > 0}
    <nav id="pagination">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item {if $page == 1}disabled{/if}">
                <a class="page-link" href="{$conf->action_root}properties?page={$page-1}&sf_type={$searchType}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>

            {for $i = 1 to $totalPages}
            <li class="page-item {if $i == $page}active{/if}">
                <a class="page-link" href="{$conf->action_root}properties?page={$i}&sf_type={$searchType}">{$i}</a>
            </li>
            {/for}

            <li class="page-item {if $page == $totalPages}disabled{/if}">
                <a class="page-link" href="{$conf->action_root}properties?page={$page+1}&sf_type={$searchType}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
    {/if}
</div>