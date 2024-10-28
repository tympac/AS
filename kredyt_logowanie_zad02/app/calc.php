<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.
include _ROOT_PATH.'/app/security/check.php';

$ifadmin = 0;

// 1. pobranie parametrów
function getParams(&$kwota, &$lata, &$opr){

    $kwota = isset($_REQUEST ['kwota']) ? $_REQUEST['kwota'] : null;
    $lata = isset($_REQUEST ['lata']) ? $_REQUEST['lata'] : null;
    $opr = isset($_REQUEST ['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;
}
// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

function validate(&$kwota, &$lata, &$opr, &$messages){
    
        // sprawdzenie, czy parametry zostały przekazane
        if ( ! (isset($kwota) && isset($lata) && isset($opr))) {
                //sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
                return false;
        }  
// sprawdzenie, czy potrzebne wartości zostały przekazane
        if ( $kwota == "") {
                $messages [] = 'Nie podano liczby kwoty';
        }
        if ( $lata == "") {
                $messages [] = 'Nie podano liczby lat';
        }
        if( $opr == ""){
                $messages [] = 'Nie podano opocentowania';
        }

        if(count( $messages ) != 0)    return false;


	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $kwota )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $lata )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	
        
        if (! is_numeric( $opr )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}
        
        if(count( $messages ) != 0)    return false;
        else return true;
        
}

function process(&$kwota, &$lata, &$opr, &$messages, &$result){
    global $role;
    // 3. wykonaj zadanie jeśli wszystko w porządku

    if (($kwota > 1000) && ($_SESSION['role'] != 'admin') ) {
    $_SESSION['ifadmin'] = 1; // Ustawienie zmiennej sesji
    include _ROOT_PATH.'/app/security/login.php';
    exit;
}    else {
        if (empty ( $messages )) { // gdy brak błędów


        $result = ($kwota + $kwota * ($opr / 100)) / ($lata * 12);

    }
    
}}

//definicja zmiennych kontrolera
$kwota = null;
$lata = null;
$opr = null;
$result = null;
$messages = [];

getParams($kwota, $lata, $opr);

if ( validate($kwota, $lata, $opr, $messages) ){
process($kwota, $lata, $opr, $messages, $result);
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';