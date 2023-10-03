<?php
require_once '../app/config/config.php';
require_once APP_ROOT . '/app/controllers/HomeController.php';
$homeController = new HomeController();
$homeController->index();
if ($_REQUEST['controller'] == 'addstudent') {
    $homeController->addStudent();
}

