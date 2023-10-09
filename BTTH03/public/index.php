<?php
require_once '../app/config/config.php';
if (isset($_GET["action"]) && isset($_GET["controller"])) {
    $controller = $_GET["controller"];
    $controllerClass = ucfirst($controller) . "Controller";
    $controllerName = $controller . "Controller.php";
    $controllerFile = APP_ROOT . "/app/controller/" . $controllerName;
    $action = $_GET["action"];
    if (file_exists($controllerFile)) {
        require_once($controllerFile);
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $action)) {
                $controller->$action();
            }
            else{
                $controller->index();
            }
        } else {
            $controller = new ErrorController();
            $controller->index();
        }
    } else {
        require_once(APP_ROOT . "/app/controller/studentController.php");
        $studentController = new StudentController();
        $studentController->index();
    }
} else {
    require_once(APP_ROOT . "/app/controller/studentController.php");
    $studentController = new StudentController();
    $studentController->index();
}
