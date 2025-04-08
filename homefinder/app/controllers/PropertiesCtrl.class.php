<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\HouseEditForm;

/**
 * HelloWorld built in Amelia - sample controller
 *
 * @author Przemysław Kudłacik
 */
class PropertiesCtrl {

  public function action_properties() {
    try {
        // Ustawienie domyślnej liczby wyników na stronę i numeru strony
        $perPage = 6;  // Liczba wyników na stronie
        $page = ParamUtils::getFromRequest('page', true, 'int');  // Pobranie numeru strony z requestu
        $page = ($page) ? $page : 1;  // Jeżeli brak numeru strony, ustawiamy domyślnie na 1

        // Pobranie wartości z wyszukiwarki
        $searchType = ParamUtils::getFromRequest('sf_type'); // Przechowujemy wyszukiwany typ

        // Obliczamy offset na podstawie numeru strony
        $offset = ($page - 1) * $perPage;

        // Pobranie wyników z tabeli `house` z LIMIT i OFFSET, uwzględniając filtr
        $houses = App::getDB()->select("house", "*", [
            "LIMIT" => [$offset, $perPage],
            "type[~]" => $searchType ? "%$searchType%" : null  // Filtrujemy po typie, jeśli podano
        ]);
        App::getSmarty()->assign('house', $houses); // przypisanie zmiennej house do szablonu

        // Pobranie wszystkich rekordów z tabeli `housefoto`
        $housesfoto = App::getDB()->select("housefoto", "*");
        App::getSmarty()->assign('housefoto', $housesfoto); // przypisanie zmiennej housefoto do szablonu

        // Pobranie całkowitej liczby rekordów z tabeli `house`, uwzględniając filtr
        $totalHouses = App::getDB()->count("house", [
            "type[~]" => $searchType ? "%$searchType%" : null  // Liczymy tylko te, które pasują do wyszukiwania
        ]);
        App::getSmarty()->assign('totalHouses', $totalHouses); // całkowita liczba wyników

        // Liczba stron
        $totalPages = ($totalHouses > 0) ? ceil($totalHouses / $perPage) : 0;
        App::getSmarty()->assign('totalPages', $totalPages);  // Assign totalPages to template
        App::getSmarty()->assign('page', $page);  // Przypisanie numeru strony do szablonu
        App::getSmarty()->assign('searchType', $searchType); // Przekazanie wartości wyszukiwania do szablonu

    } catch (\PDOException $e) {
        Utils::addErrorMessage('Błąd odczytu danych z bazy');
        if (App::getConf()->debug) {
            Utils::addErrorMessage($e->getMessage());
        }
    }

    App::getSmarty()->display("properties.tpl");
}






}
