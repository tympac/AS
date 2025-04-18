<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;

class LoginCtrl {
    private $form;

    public function __construct() {
        // Stworzenie obiektu formularza
        $this->form = new LoginForm();
    }

    public function validate() {
        // Pobranie danych logowania z formularza
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        // Sprawdzenie, czy dane są podane
        if (!isset($this->form->login) || !isset($this->form->pass)) {
            Utils::addErrorMessage('Nie podano loginu lub hasła');
            return false;
        }

        // Sprawdzenie, czy pola nie są puste
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Pole login jest puste');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Pole hasło jest puste');
        }

        // Jeśli występują błędy, zakończ walidację
        if (App::getMessages()->isError()) {
            return false;
        }

        try {
            // Pobranie użytkownika z bazy na podstawie loginu
            $user = App::getDB()->get("user", [
                "[>]userrole" => ["idUser" => "idUser"],
                "[>]role" => ["userrole.idRole" => "idRole"]
            ], [
                "user.idUser",
                "user.password",
                "role.roleName"
            ], [
                "user.login" => $this->form->login
            ]);

            // Jeśli użytkownik nie istnieje
            if (!$user) {
                Utils::addErrorMessage('Niepoprawny login lub hasło');
                return false;
            }

            // Sprawdzenie poprawności hasła
            if (!password_verify($this->form->pass, $user['password'])) {
                Utils::addErrorMessage('Niepoprawny login lub hasło');
                return false;
            }

            // Jeśli login i hasło są poprawne, dodanie roli użytkownika
            if ($user['roleName'] === 'admin') {
                RoleUtils::addRole('admin');
            } else {
                RoleUtils::addRole('user');
            }
            
            $_SESSION['idUser'] = $user['idUser'];

            Utils::addInfoMessage('Zalogowano pomyślnie jako ' . $user['roleName']);
            return true;

        } catch (\PDOException $e) {
            // Obsługa błędów połączenia z bazą danych
            Utils::addErrorMessage('Błąd połączenia z bazą danych');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
            return false;
        }
    }

    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login() {
        if ($this->validate()) {
            // Zalogowany => przekieruj na główną akcję
            if ($user['roleName'] === 'admin') {
                App::getRouter()->redirectTo("admin");
            } else {
                App::getRouter()->redirectTo("hello");
            }
        } else {
            // Niezalogowany => pozostań na stronie logowania
            $this->generateView();
        }
    }

    public function action_logout() {
        // Zakończenie sesji
        session_destroy();
        // Przekierowanie na stronę główną
        App::getRouter()->redirectTo('hello');
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // Dane formularza do widoku
        App::getSmarty()->display('login.tpl');
    }
}
