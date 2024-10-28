<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Logowanie</title>
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
        legend {
            display: block;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
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
    </style>
</head>
<body>
<div class="container">

    <form action="<?php print(_APP_URL);?>/app/security/login.php" method="post">
        <legend>Logowanie</legend>
        <label for="id_login">Login: </label>
        <input id="id_login" type="text" name="login" value="<?php out($form['login'])?>" /><br />
        
        <label for="id_pass">Hasło: </label>
        <input id="id_pass" type="password" name="pass" value="<?php out($form['pass']) ?>" /><br />
        
        <input type="submit" value="Zaloguj" />
    </form>

    <?php
    // wyświetlenie listy błędów, jeśli istnieją
    if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
    }
    ?>

</div>

</body>
</html>



