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
</style>
</head>
<body>
<div class="container">
<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_kwota">Kwota: </label>
        <input id="id_kwota" type="text" name="kwota" value="<?php if (isset($kwota)){ print($kwota); } ?>" /><br />
        
	<label for="id_lata">Lat: </label>
        <input id="id_lata" type="text" name="lata" value="<?php if (isset($lata)){ print($lata); } ?>" /><br />
        
	<label for="id_opr">Oprocentowanie: </label>
        <input id="id_opr" type="text" name="oprocentowanie" value="<?php if(isset($opr)){ print($opr); } ?>" /><br />
        
	<input type="submit" value="Oblicz" />
</form>	


<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	
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