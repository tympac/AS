<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\HouseEditForm;

class AddHouseCtrl {

    public function action_addShow() {

        $this->generateView();
    }

    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new HouseEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji id');
        $this->form->address = ParamUtils::getFromRequest('address', true, 'Błędne wywołanie aplikacji address');
        $this->form->descryption = ParamUtils::getFromRequest('descryption', true, 'Błędne wywołanie aplikacji descryption');
        $this->form->price = ParamUtils::getFromRequest('price', true, 'Błędne wywołanie aplikacji price');
        $this->form->type = ParamUtils::getFromRequest('type', true, 'Błędne wywołanie aplikacji type');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->address))) {
            Utils::addErrorMessage('Wprowadź adres');
        }
        if (empty(trim($this->form->descryption))) {
            Utils::addErrorMessage('Wprowadź opis');
        }
        if (empty(trim($this->form->price))) {
            Utils::addErrorMessage('Wprowadź cene');
        }
        if (empty(trim($this->form->type))) {
            Utils::addErrorMessage('Wprowadź typ');
        }

        if (App::getMessages()->isError())
            return false;


        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_houseNew() {
        $this->generateView();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_houseEdit() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEdit()) {
            try {
                App::getDB()->delete("housefoto", [
                    "idHouse" => $this->form->id
                ]);
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("house", "*", [
                    "idHouse" => $this->form->id
                ]);
                
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['idHouse'];
                $this->form->address = $record['address'];
                $this->form->descryption = $record['descryption'];
                $this->form->price = $record['price'];
                $this->form->type = $record['type'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_houseDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("housefoto", [
                    "idHouse" => $this->form->id
                ]);
                App::getDB()->delete("house", [
                    "idHouse" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('addShow');
    }

    public function action_houseSave() {
    if ($this->validateSave()) {
        try {
            // Sprawdzamy, czy idUser jest zapisane w sesji
            $ownerId = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : null;
            if (!$ownerId) {
                Utils::addErrorMessage('Błąd: Brak zalogowanego użytkownika');
                $this->generateView();
                return;
            }

            // Obsługa przesłanego pliku
            $uploadedFilePath = null;
            if (isset($_FILES['houseImage']) && $_FILES['houseImage']['error'] == UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/'; // Katalog na serwerze do przechowywania zdjęć
                $fileName = uniqid() . '_' . basename($_FILES['houseImage']['name']); // Unikalna nazwa pliku
                $uploadedFilePath = $uploadDir . $fileName;

                // Tworzenie katalogu, jeśli nie istnieje
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Przeniesienie przesłanego pliku
                move_uploaded_file($_FILES['houseImage']['tmp_name'], $uploadedFilePath);
            }

            // 2.1 Nowy rekord w tabeli `house`
            if ($this->form->id == '') {
                $count = App::getDB()->count("house");
                if ($count <= 20) {
                    App::getDB()->insert("house", [
                        "address" => $this->form->address,
                        "descryption" => $this->form->descryption,
                        "price" => $this->form->price,
                        "type" => $this->form->type,
                        "ownerId" => $ownerId // Dodanie ownerId
                    ]);

                    // Pobierz ID nowo dodanego domu
                    $this->form->id = App::getDB()->id();
                } else {
                    Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy, usuń wybrany wpis.');
                    $this->generateView();
                    exit();
                }
            } else {
                // 2.2 Edycja rekordu w tabeli `house`
                App::getDB()->update("house", [
                    "address" => $this->form->address,
                    "descryption" => $this->form->descryption,
                    "price" => $this->form->price,
                    "type" => $this->form->type
                ], [
                    "idHouse" => $this->form->id
                ]);
            }

            // 3. Zapis ścieżki zdjęcia w tabeli `housefoto`
            if ($uploadedFilePath) {
                App::getDB()->insert("housefoto", [
                    "idHouse" => $this->form->id, // Powiązanie zdjęcia z odpowiednim rekordem w `house`
                    "imagePath" => $uploadedFilePath
                ]);
            }

            Utils::addInfoMessage('Pomyślnie zapisano rekord.');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu.');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('addShow');
    } else {
        $this->generateView();
    }
}


    public function generateView() {
    try {
        // Sprawdzenie, czy użytkownik jest zalogowany (czy jest zapisane idUser w sesji)
        if (isset($_SESSION['idUser'])) {
            $userId = $_SESSION['idUser'];

            // Pobranie wszystkich rekordów z tabeli `house`, tylko tych, które należą do zalogowanego użytkownika
            $houses = App::getDB()->select("house", "*", [
                "ownerId" => $userId // Filtrowanie domów po właścicielu
            ]);
        } else {
            $houses = []; // Jeśli użytkownik nie jest zalogowany, zwróć pustą tablicę
            Utils::addErrorMessage('Aby zobaczyć swoje domy, musisz być zalogowany');
        }

        App::getSmarty()->assign('house', $houses); // Przypisanie wyników do szablonu
    } catch (\PDOException $e) {
        Utils::addErrorMessage('Błąd odczytu danych z bazy');
        if (App::getConf()->debug) {
            Utils::addErrorMessage($e->getMessage());
        }
    }

    App::getSmarty()->assign('form', $this->form); // Przypisanie danych formularza do widoku
    App::getSmarty()->display('add.tpl'); // Wyświetlenie szablonu
}

    private $records; //rekordy pobrane z bazy danych


    

    
}
