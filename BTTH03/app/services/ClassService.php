<?php
// require_once APP_ROOT . '/app/models/Student.php';
class ClassService
{
    public function getAllClass()
    {
        // Bước 1: kết nối Database
        try {
            $conn = new PDO('mysql:host=localhost;dbname=Quanlysinhvien', 'root', 'HaDung18092003');
            // Bước 2: Truy vấn dữ liệu
            $sql = "SELECT * FROM Lop";
            $stmt = $conn->query($sql);
            // Bước 3: Xử lý kết quả trả về
            $class_s = [];
            while ($row = $stmt->fetch()) {
                $class = new ClassName($row['id'], $row['tenLop']);
                $class_s[] = $class;
            }
            return $class_s;
        } catch (PDOException $e) {
            return $classs = [];
        }
    }

    
}
