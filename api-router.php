<?php
require_once './libs/Router.php';
require_once './app/controllers/weapon-api-controller.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('weapons', 'GET', 'WeaponApiController', 'getWeapons');
$router->addRoute('weapons/:ID', 'GET', 'WeaponApiController', 'getWeapon');
$router->addRoute('weapons/:ID', 'DELETE', 'WeaponApiController', 'deleteWeapon');
$router->addRoute('weapons/:ID', 'PUT', 'WeaponApiController', 'editWeapon');
$router->addRoute('weapons', 'POST', 'WeaponApiController', 'insertWeapon'); 

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);