{extends file="../templates/index.tpl"}


{block name=footer}
    <section id="footer">
        <ul class="icons">
            <li><a href="https://github.com/tympac/AS" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
        </ul>
        <div class="copyright">
            <ul class="menu">
                <li>&copy; Untitled. All rights reserved.</li>
                <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </section>

{/block}

{block name=content}

    <div class="content style4 featured">
        <div class="container medium">
            <form method="post" action="{$conf->app_url}/app/calc.php">
                <div class="row gtr-50">

                    <div class="col-12 col-12-mobile"><input id="id_kwota" type="text" name="kwota" value="{$form->kwota}" placeholder="Kwota" /></div>
                    <div class="col-12 col-12-mobile"><input id="id_lata" type="text" name="lata" value="{$form->lata}" placeholder="Lata" /></div>
                    <div class="col-12 col-12-mobile"><input id="id_opr" type="text" name="opr" value="{$form->opr}" placeholder="Oprocentowanie" /></div>

                    <div class="col-12">
                        <ul class="actions special">
                            <li><input type="submit" class="button" value="Potwierdź" /></li>
                        </ul>
                    </div>
                </div>
            </form>


            <div class="Wynik">
                {if isset($res->result)}
                    <p>Wynik</p>
                    <p class="result-box">{$res->result}</p>
                {/if}

                {if $msgs->isError()}
                    <p>Wystąpiły błędy:<p>
                        {foreach $msgs->getErrors() as $err}
                        <h1>{$err}</h1>
                    {/foreach}
                {/if}          
            </div>



        </div>
    </div>

{/block}     






