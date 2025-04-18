<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\HouseEditForm;

class PropertiesCtrl {

  public function action_properties() {
    try {
        // Ustawienie domyślnej liczby wyników na stronę i numeru strony
        $perPage = 6;
        $page = ParamUtils::getFromRequest('page', true, 'int');
        $page = $page ? $page : 1;

        // Pobranie wartości z wyszukiwarki
        $searchType = ParamUtils::getFromRequest('sf_type');

        // Obliczamy offset na podstawie numeru strony
        $offset = ($page - 1) * $perPage;

        // Pobranie wyników z tabeli house z LIMIT i OFFSET, uwzględniając filtr
        $houses = App::getDB()->select('house', '*', [
            'LIMIT'   => [$offset, $perPage],
            'type[~]' => $searchType ? "%$searchType%" : null
        ]);
        App::getSmarty()->assign('house', $houses);

        // Pobranie wszystkich rekordów z tabeli housefoto
        $housesfoto = App::getDB()->select('housefoto', '*');
        App::getSmarty()->assign('housefoto', $housesfoto);

        // Pobranie całkowitej liczby rekordów z tabeli house, uwzględniając filtr
        $totalHouses = App::getDB()->count('house', [
            'type[~]' => $searchType ? "%$searchType%" : null
        ]);
        App::getSmarty()->assign('totalHouses', $totalHouses);

        // Liczba stron
        $totalPages = $totalHouses > 0 ? ceil($totalHouses / $perPage) : 0;
        App::getSmarty()->assign('totalPages', $totalPages);
        App::getSmarty()->assign('page', $page);
        App::getSmarty()->assign('searchType', $searchType);

    } catch (\PDOException $e) {
        Utils::addErrorMessage('Błąd odczytu danych z bazy');
        if (App::getConf()->debug) {
            Utils::addErrorMessage($e->getMessage());
        }
    }

    // AJAX fragment support: detect XHR and return only the results snippet
    $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
           && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

    if ($isAjax) {
        echo App::getSmarty()->fetch('properties_fragment.tpl');
        exit;
    }

    // Full page render for non-AJAX requests
    App::getSmarty()->display('properties.tpl');
  }

}