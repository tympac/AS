<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl {

    
    
    private $form;   //dane formularza (do obliczeń i dla widoku)
    private $result; //inne dane dla widoku
    private $hide_intro;

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new CalcForm();
        $this->result = new CalcResult();
        
    }

    public function getParams() {
        $this->form->kwota = getFromRequest('kwota');
        $this->form->lata = getFromRequest('lata');
        $this->form->opr = getFromRequest('opr');
    }

    public function validate() {
        if (!( isset($this->form->kwota) && isset($this->form->lata) && isset($this->form->opr))) {
            return false;
        }

        $this->hide_intro = true;

        if ($this->form->kwota == "") {
            getMessages()->addError('Nie podano liczby kwoty');
        }
        if ($this->form->lata == "") {
            getMessages()->addError('Nie podano liczby lat');
        }
        if ($this->form->opr == "") {
            getMessages()->addError('Nie podano oprocentowania');
        }
        if (!getMessages()->isError()) {


            // Sprawdzenie, czy wartości są liczbami
            if (!is_numeric($this->form->kwota)) {
                getMessages()->addError('Kwota nie jest liczbą');
            }
            if (!is_numeric($this->form->lata)) {
                getMessages()->addError('Liczba lat nie jest liczbą');
            }
            if (!is_numeric($this->form->opr)) {
                getMessages()->addError('Oprocentowanie nie jest liczbą');
            }
        }

        return ! getMessages()->isError();
    }

    public function action_calcCompute() {

        $this->getparams();

        if ($this->validate()) {

            $this->form->kwota = floatval($this->form->kwota);
            $this->form->lata = floatval($this->form->lata);
            $this->form->opr = floatval($this->form->opr);

            $this->result->result = ($this->form->kwota + $this->form->kwota * ($this->form->opr / 100)) / ($this->form->lata * 12);
        }
        $this->generateView();
    }
    public function action_calcShow(){
		getMessages()->addInfo('Witaj w kalkulatorze');
		$this->generateView();
	}
    
 

    public function generateView() {
        
        getSmarty()->assign('user',unserialize($_SESSION['user']));
    

        getSmarty()->assign('page_title', 'Kalkulator kredytów');
        getSmarty()->assign('page_description', 'Profesjonalne szablonowanie oparte na bibliotece Smarty');
        getSmarty()->assign('page_header', 'Szablony Smarty');

        getSmarty()->assign('hide_intro', $this->hide_intro);

// Przypisanie zmiennych do wyświetlenia w widoku
        getSmarty()->assign('form',$this->form);
        
        getSmarty()->assign('res',$this->result);

// Wywołanie szablonu, by zawsze się wyświetlał
        getSmarty()->display('CalcView.tpl');
    }
}
