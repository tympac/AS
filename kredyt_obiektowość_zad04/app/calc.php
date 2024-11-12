<?php

// KONTROLER strony kalkulatora
require_once dirname(__FILE__) . '/../config.php';

require_once $conf->root_path.'/app/CalcCtrl.class.php';

//utwórz obiekt i użyj
$ctrl = new CalcCtrl();
$ctrl->process();