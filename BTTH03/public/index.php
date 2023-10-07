<?php
require_once '../app/config/config.php';
require_once APP_ROOT . '/app/controllers/HomeController.php';
$homeController = new HomeController();
$homeController->index();


if (isset($_REQUEST['controller'])) {
    if ($_REQUEST['controller'] == 'getListStudent') {
        $homeController->GetListStudent();
    } else if ($_REQUEST['controller'] == 'addstudent') {
        $homeController->addStudent();
    }
}