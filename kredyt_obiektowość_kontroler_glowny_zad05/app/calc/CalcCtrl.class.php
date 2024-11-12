<?php

require_once $conf->root_path . '/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path . '/app/calc/CalcForm.class.php';
require_once $conf->root_path . '/app/calc/CalcResult.class.php';

class CalcCtrl {

    private $msgs;   //wiadomości dla widoku
    private $form;   //dane formularza (do obliczeń i dla widoku)
    private $result; //inne dane dla widoku
    private $hide_intro;

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->msgs = new Messages();
        $this->form = new CalcForm();
        $this->result = new CalcResult();
        
    }

    public function getParams() {
        $this->form->kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
        $this->form->lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
        $this->form->opr = isset($_REQUEST['opr']) ? $_REQUEST['opr'] : null;
    }

    public function validate() {
        if (!( isset($this->form->kwota) && isset($this->form->lata) && isset($this->form->opr))) {
            return false;
        }

        $this->hide_intro = true;

        if ($this->form->kwota == "") {
            $this->msgs->addError('Nie podano liczby kwoty');
        }
        if ($this->form->lata == "") {
            $this->msgs->addError('Nie podano liczby lat');
        }
        if ($this->form->opr == "") {
            $this->msgs->addError('Nie podano oprocentowania');
        }
        if (!$this->msgs->isError()) {


            // Sprawdzenie, czy wartości są liczbami
            if (!is_numeric($this->form->kwota)) {
                $this->msgs->addError('Kwota nie jest liczbą');
            }
            if (!is_numeric($this->form->lata)) {
                $this->msgs->addError('Liczba lat nie jest liczbą');
            }
            if (!is_numeric($this->form->opr)) {
                $this->msgs->addError('Oprocentowanie nie jest liczbą');
            }
        }

        return !$this->msgs->isError();
    }

    public function process() {

        $this->getparams();

        if ($this->validate()) {

            $this->form->kwota = floatval($this->form->kwota);
            $this->form->lata = floatval($this->form->lata);
            $this->form->opr = floatval($this->form->opr);

            $this->result->result = ($this->form->kwota + $this->form->kwota * ($this->form->opr / 100)) / ($this->form->lata * 12);
        }
        $this->generateView();
    }

    public function generateView() {
        global $conf;

        $smarty = new Smarty();
        $smarty->assign('conf', $conf);

        $smarty->assign('page_title', 'Kalkulator kredytów');
        $smarty->assign('page_description', 'Profesjonalne szablonowanie oparte na bibliotece Smarty');
        $smarty->assign('page_header', 'Szablony Smarty');

        $smarty->assign('hide_intro', $this->hide_intro);

// Przypisanie zmiennych do wyświetlenia w widoku
        $smarty->assign('form',$this->form);
        $smarty->assign('res',$this->result);
        $smarty->assign('msgs',$this->msgs);

// Wywołanie szablonu, by zawsze się wyświetlał
        $smarty->display($conf->root_path. '/app/calc/calc_view.tpl');
    }
}
