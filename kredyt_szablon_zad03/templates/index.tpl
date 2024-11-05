<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>{$page_title|default:"Tytuł domyślny"}</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="{$app_url}/assets/css/main.css" />
        {if $hide_intro }
            <link rel="stylesheet" href="{$app_url}/assets/css/style_hide_intro.css">
        {/if}
    </head>

    <body class="is-preload">

        <!-- Header -->
        <section id="header" class="dark">
            <header>
                <h1>{$page_title|default:"Tytuł domyślny"}</h1>
                <p>{$page_description|default:"Opis domyślny"}</p>
            </header>
            <footer>
                <a href="#fourth" class="button scrolly">Rozwiń</a>
            </footer>
        </section>

        <!-- Main Content -->

        <section id="fourth" class="main">
            <header>
                <div class="container">
                    <h2>Kalkulator kredytów</h2>
                    <p>Podaj kwtotę, liczbę lat oraz oprocentowanie, aby obliczyc wysokość miesięcznej raty.</p>
                </div>
            </header>
            {block name=content} Domyślna treść zawartości {/block}
        </section>







        <!-- Footer -->
        {block name=footer}

        {/block}

        <!-- Scripts -->
        <script src="{$app_url}/assets/js/jquery.min.js"></script>
        <script src="{$app_url}/assets/js/jquery.scrolly.min.js"></script>
        <script src="{$app_url}/assets/js/browser.min.js"></script>
        <script src="{$app_url}/assets/js/breakpoints.min.js"></script>
        <script src="{$app_url}/assets/js/util.js"></script>
        <script src="{$app_url}/assets/js/main.js"></script>

    </body>
</html>
