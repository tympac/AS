<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

/**
 * HelloWorld built in Amelia - sample controller
 *
 * @author Przemysław Kudłacik
 */
class HelloCtrl {
    
    public function action_hello() {
        try {
            // Pobranie wszystkich rekordów z tabeli `house`
            $houses = App::getDB()->select("house", "*");
            App::getSmarty()->assign('house', $houses); // przypisanie zmiennej house do szablonu
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd odczytu danych z bazy');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }
        try {
            // Pobranie wszystkich rekordów z tabeli `house`
            $housesfoto = App::getDB()->select("housefoto", "*");
            App::getSmarty()->assign('housefoto', $housesfoto); // przypisanie zmiennej house do szablonu
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd odczytu danych z bazy');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }
		             
        App::getSmarty()->display("index.tpl");
        
    }
    
}
