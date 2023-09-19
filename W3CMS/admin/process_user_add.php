<?php
include './connect.php';
// Xử lý dữ liệu từ biểu mẫu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["username"];
    $email = $_POST["email"];
    $mobile = $_POST["phone"];
    $gender = $_POST["genders"];
    $dob = $_POST["dob"];
    $job = $_POST["roles"];
    // Sử dụng Prepared Statements để thực hiện truy vấn SQL
    $query = "INSERT INTO users (fullname, email, gender, job, dob, mobile) VALUES ('$fullname', '$email', '$gender', '$job', '$dob', '$mobile')";
    mysqli_query($strConnection, $query);
}
mysqli_close($strConnection);
header("Location: index.php");