<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\RegisterForm;

class RegisterUserCtrl {

    private $form; // dane formularza

    public function __construct() {
        $this->form = new RegisterForm();
    }

    // Walidacja danych użytkownika
    public function validateSave() {
    $validator = new \core\Validator();

    // Validate 'login'
    $this->form->login = $validator->validateFromRequest('login', [
        'required' => true,
        'email' => true,
        'required_message' => 'Login (email) is required.',
        'validator_message' => 'Login must be a valid email address.'
    ]);

    // Validate 'password'
    $this->form->password = $validator->validateFromRequest('password', [
        'required' => true,
        'min_length' => 8,
        'max_length' => 64,
        'required_message' => 'Password is required.',
        'validator_message' => 'Password must be between 8-64 characters long.'
    ]);

    // Validate 'firstName'
    $this->form->firstName = $validator->validateFromRequest('firstName', [
        'required' => true,
        'min_length' => 2,
        'max_length' => 50,
        'regexp' => '/^[a-zA-Z\s]+$/',
        'required_message' => 'First name is required.',
        'validator_message' => 'First name must be 2-50 characters long and contain only letters and spaces.'
    ]);

    // Validate 'lastName'
    $this->form->lastName = $validator->validateFromRequest('lastName', [
        'required' => true,
        'min_length' => 2,
        'max_length' => 50,
        'regexp' => '/^[a-zA-Z\s]+$/',
        'required_message' => 'Last name is required.',
        'validator_message' => 'Last name must be 2-50 characters long and contain only letters and spaces.'
    ]);

    // Check if any errors were added during validation
    return !App::getMessages()->isError();
}

    // Zapis użytkownika do bazy
   public function action_userSave() {
    if ($this->validateSave()) {
        try {
            $userExists = App::getDB()->has("user", ["login" => $this->form->login]);

            if (!$userExists) {
                App::getDB()->insert("userrole", [
                    "idRole" => 2, // Assuming 2 is the default 'User' role
                    "assignedDate" => date("Y-m-d H:i:s")
                ]);

                $newUserId = App::getDB()->id();

                $hashedPassword = password_hash($this->form->password, PASSWORD_DEFAULT);

                App::getDB()->insert("user", [
                    "idUser" => $newUserId,
                    "login" => $this->form->login,
                    "password" => $hashedPassword,
                    "firstName" => $this->form->firstName,
                    "lastName" => $this->form->lastName,
                    "dateCreated" => date("Y-m-d H:i:s"),
                    "lastModifiedBy" => null,
                    "lastModifiedDate" => null
                ]);

                Utils::addInfoMessage('Pomyślnie dodano użytkownika.');
                
                // After successfully saving the user, clear the form data
                $this->form->firstName = '';
                $this->form->lastName = '';
                $this->form->login = '';
                $this->form->password = '';
                
                
            } else {
                Utils::addErrorMessage('Użytkownik o podanym loginie już istnieje.');
            }
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas zapisu użytkownika.');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }
    }
    
    // Show the registration form again, keeping the success message
    $this->generateView(); 
}


    public function action_registerUser() {
        $this->generateView();
    }
    

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('register.tpl'); // Szablon dla formularza dodawania/edycji użytkownika
    }
}
