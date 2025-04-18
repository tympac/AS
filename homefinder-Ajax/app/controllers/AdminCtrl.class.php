<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use core\RoleUtils;
use app\forms\AdminForm;

class AdminCtrl {

    private $form;

    public function __construct() {
        $this->form = new AdminForm();
    }

    // Show the admin panel
    public function action_adminShow() {
    $this->generateView();
    try {
        // Pobierz role użytkowników z tabeli `role`
        $roles = App::getDB()->select("role", ["idRole", "roleName"]);
        
        // Sprawdź, czy zmienna roles zawiera dane
        if ($roles === false || empty($roles)) {
            $roles = [];  // Jeśli brak danych, ustaw pustą tablicę
        }

        // Przypisz dane do widoku
        App::getSmarty()->assign('roles', $roles);
    } catch (\PDOException $e) {
        Utils::addErrorMessage('Błąd odczytu danych z bazy');
        if (App::getConf()->debug) {
            Utils::addErrorMessage($e->getMessage());
        }
    }
}

    // Generate the view for the admin panel
    public function generateView() {
        try {
            // Pobierz listę użytkowników z ich rolami (łączy tabelę `user`, `userrole` i `role`)
            $users = App::getDB()->select("user", [
                "[>]userrole" => ["idUser" => "idUser"],
                "[>]role" => ["userrole.idRole" => "idRole"]
            ], [
                "user.idUser",
                "user.login",
                "role.roleName"
            ]);

            App::getSmarty()->assign('users', $users); // Przypisz dane użytkowników do widoku
            App::getSmarty()->display('admin.tpl'); // Renderowanie widoku panelu administracyjnego
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd odczytu danych z bazy');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }
    }

    // Handle make admin action
    public function action_makeAdmin() {
        $userId = ParamUtils::getFromRequest('idUser', true, 'Błędne wywołanie aplikacji');
        
        try {
            // Sprawdzenie, czy rola "Admin" istnieje w bazie
            $adminRole = App::getDB()->select("role", ["idRole"], ["roleName" => "Admin"]);
            
            if (empty($adminRole)) {
                throw new \Exception("Rola 'Admin' nie istnieje.");
            }

            $adminRoleId = $adminRole[0]['idRole'];

            // Sprawdź, czy użytkownik już ma rolę administratora
            $userRole = App::getDB()->select("userrole", "*", ["idUser" => $userId, "idRole" => $adminRoleId]);

            if (!empty($userRole)) {
                Utils::addErrorMessage('Użytkownik już posiada rolę administratora');
                App::getRouter()->forwardTo('adminShow');
                return;
            }

            // Dodaj rolę administratora dla użytkownika
            App::getDB()->insert("userrole", [
                "idUser" => $userId,
                "idRole" => $adminRoleId,
                "assignedDate" => date('Y-m-d H:i:s') // Dodanie daty przypisania roli
            ]);
            Utils::addInfoMessage('Użytkownik został przypisany do roli administratora');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd przypisywania roli administratora');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        } catch (\Exception $e) {
            Utils::addErrorMessage($e->getMessage());
        }

        // Redirect back to admin panel
        App::getRouter()->forwardTo('adminShow');
    }

    // Handle delete user action
    public function action_deleteUser() {
        $userId = ParamUtils::getFromRequest('idUser', true, 'Błędne wywołanie aplikacji');
        
        try {
            // Usuń powiązania użytkownika z rolą w tabeli `userrole`
            App::getDB()->delete("userrole", ["idUser" => $userId]);
            
            // Usuń użytkownika z tabeli `user`
            App::getDB()->delete("user", ["idUser" => $userId]);
            Utils::addInfoMessage('Użytkownik został usunięty');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd podczas usuwania użytkownika');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }

        // Redirect back to admin panel
        App::getRouter()->forwardTo('adminShow');
    }
}
