<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\HomeSearchForm;

class HouseListCtrl {

    private $form; // dane formularza wyszukiwania
    private $records1; // rekordy pobrane z tabeli house
    private $records2; // rekordy pobrane z tabeli housefoto

    public function __construct() {
        // stworzenie obiektu formularza wyszukiwania
        $this->form = new HomeSearchForm();
    }

    public function validate() {
        // Pobranie parametru wyszukiwania "type" z żądania
        $this->form->type = ParamUtils::getFromRequest('sf_type');

        // Nie jest wymagane sprawdzanie poprawności wprowadzonej wartości
        return !App::getMessages()->isError();
    }

    public function action_houseList() {
        // Walidacja danych formularza wyszukiwania
        $this->validate();

        // Przygotowanie mapy z parametrami wyszukiwania
        $search_params = [];
        if (isset($this->form->type) && strlen($this->form->type) > 0) {
            $search_params['type[~]'] = $this->form->type . '%';
        }

        // Przygotowanie warunku WHERE
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        $where["ORDER"] = "type";

        try {
            // Pobranie danych z tabeli house
            $this->records1 = App::getDB()->select("house", [
                "idHouse",
                "address",
                "descryption",
                "price",
                "type",
            ], $where);

            // Przygotowanie listy idHouse na podstawie wyników wyszukiwania w tabeli house
            $houseIds = array_column($this->records1, 'idHouse');

            // Pobranie zdjęć tylko dla domów z wyników wyszukiwania
            if (!empty($houseIds)) {
                $this->records2 = App::getDB()->select("housefoto", [
                    "idHouse",
                    "imagePath"
                ], [
                    "idHouse" => $houseIds
                ]);
            } else {
                $this->records2 = []; // Jeśli nie ma wyników, ustaw pustą tablicę
            }
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        // Przekazanie danych do widoku
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza wyszukiwania
        App::getSmarty()->assign('house', $this->records1); // wyniki z tabeli house
        App::getSmarty()->assign('housefoto', $this->records2); // zdjęcia z tabeli housefoto
        App::getSmarty()->display('properties.tpl');
    }
}