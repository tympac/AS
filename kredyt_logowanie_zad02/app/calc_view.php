<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator Kredytu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form {
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            width: 300px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 80%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            text-align: center;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        input[type="submit"] {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result-box {
            margin: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #ff0;
            width: 300px;
            text-align: center;
        }
        .logout-btn {
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #f44336;
            color: white;
            text-decoration: none;
            border: none;
            display: inline-block;
            margin-bottom: 20px;
        }
        .logout-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
<div class="container">

    <div style="width:90%; margin: 2em auto; text-align: center;">
        <a class="logout-btn" href="<?php print(_APP_ROOT); ?>/app/security/logout.php">Wyloguj</a>
    </div>
    
    <form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
        <label for="id_kwota">Kwota: </label>
        <input id="id_kwota" type="text" name="kwota" value="<?php out($kwota)?>" /><br />
        
        <label for="id_lata">Lat: </label>
        <input id="id_lata" type="text" name="lata" value="<?php out($lata) ?>" /><br />
        
        <label for="id_opr">Oprocentowanie: </label>
        <input id="id_opr" type="text" name="oprocentowanie" value="<?php out($opr) ?>" /><br />
        
        <input type="submit" value="Oblicz" />
    </form>

    <?php
    // wyświetlenie listy błędów, jeśli istnieją
    if (isset($messages)) {
        if (count ( $messages ) > 0) {
            echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">';
            foreach ( $messages as $key => $msg ) {
                echo '<li>'.$msg.'</li>';
            }
            echo '</ol>';
        }
    }
    ?>

    <?php if (isset($result)){ ?>
    <div class="result-box">
        <?php echo 'Wynik: '.$result; ?>
    </div>
    <?php } ?>
</div>
</body>
</html>
