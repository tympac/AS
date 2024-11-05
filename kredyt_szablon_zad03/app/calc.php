<?php

// KONTROLER strony kalkulatora
require_once dirname(__FILE__) . '/../config.php';

require_once _ROOT_PATH . '/lib/smarty/Smarty.class.php';

// Funkcja do pobrania parametrów z formularza
function getParams(&$form) {
    $form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
    $form['lata'] = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
    $form['opr'] = isset($_REQUEST['opr']) ? $_REQUEST['opr'] : null;
}

// Funkcja walidująca dane wejściowe
function validate(&$form, &$messages,&$hide_intro) {
    if (!isset($form['kwota'], $form['lata'], $form['opr'])) {
        return false;
    }
    
    $hide_intro = true;
    
    if ($form['kwota'] == "") {
        $messages[] = 'Nie podano liczby kwoty';
    }
    if ($form['lata'] == "") {
        $messages[] = 'Nie podano liczby lat';
    }
    if ($form['opr'] == "") {
        $messages[] = 'Nie podano oprocentowania';
    }
    if (count($messages) > 0)
        return false;

    // Sprawdzenie, czy wartości są liczbami
    if (!is_numeric($form['kwota'])) {
        $messages[] = 'Kwota nie jest liczbą';
    }
    if (!is_numeric($form['lata'])) {
        $messages[] = 'Liczba lat nie jest liczbą';
    }
    if (!is_numeric($form['opr'])) {
        $messages[] = 'Oprocentowanie nie jest liczbą';
    }

    return count($messages) === 0;
}

// Funkcja wykonująca obliczenia
function process(&$form, &$messages, &$result) {

    $form['kwota'] = floatval($form['kwota']);
    $form['lata'] = floatval($form['lata']);
    $form['opr'] = floatval($form['opr']);

    $result = ($form['kwota'] + $form['kwota'] * ($form['opr'] / 100)) / ($form['lata'] * 12);
}

// Definicja zmiennych kontrolera
$form = null;
$result = null;
$messages = [];
$hide_intro = false;

getParams($form);

// Walidacja i przetwarzanie, jeśli brak błędów
if (validate($form, $messages, $hide_intro)) {
    process($form, $messages, $result);
}

// Konfiguracja Smarty
$smarty = new Smarty();

$smarty->assign('app_url', _APP_URL);
$smarty->assign('root_path', _ROOT_PATH);
$smarty->assign('page_title', 'Kalkulator kredytów');
$smarty->assign('page_description', 'Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header', 'Szablony Smarty');

$smarty->assign('hide_intro',$hide_intro);

// Przypisanie zmiennych do wyświetlenia w widoku
$smarty->assign('form', $form);
$smarty->assign('result', $result);
$smarty->assign('messages', $messages);

// Wywołanie szablonu, by zawsze się wyświetlał
$smarty->display(_ROOT_PATH . '/app/calc_view.tpl');

