 <?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('hello'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('hello',         'HelloCtrl');
Utils::addRoute('properties',    'PropertiesCtrl');
Utils::addRoute('login',         'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl');
Utils::addRoute('loginShow',     'LoginCtrl');
Utils::addRoute('addShow',       'AddHouseCtrl',	['user']);
Utils::addRoute('houseSave',     'AddHouseCtrl',	['user']);
Utils::addRoute('houseEdit',     'AddHouseCtrl',	['user']);
Utils::addRoute('houseDelete',   'AddHouseCtrl',  	);
Utils::addRoute('houseList',     'HouseListCtrl');
Utils::addRoute('registerUser',  'RegisterUserCtrl');
Utils::addRoute('userSave',  'RegisterUserCtrl');








//Utils::addRoute('action_name', 'controller_class_name');