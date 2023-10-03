<?php
require_once APP_ROOT . '/app/services/StudentService.php';
class HomeController
{
    public function index()
    {
        // Gói dữ liệu từ StudentService
        $studentService = new StudentService();
        $students = $studentService->getAllStudents();
        // Render dữ liệu được lấy ra từ HomePage
        include APP_ROOT . '/app/views/home/index.php';
    }
    public function addStudent()
    {
        // Gói dữ liệu từ StudentService
        
        
        // Render dữ liệu được lấy ra từ HomePage
        header("Location: /app/views/Student/index.php");
    }

}
