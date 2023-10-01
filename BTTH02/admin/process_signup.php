<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Kiểm tra tính hợp lệ của dữ liệu
    $errors = [];

    // Kiểm tra tên
    if (empty($name)) {
        $errors[] = "Tên không được để trống.";
    }

    // Kiểm tra email
    if (empty($email)) {
        $errors[] = "Email không được để trống.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email không hợp lệ.";
    }

    // Kiểm tra mật khẩu
    if (empty($password)) {
        $errors[] = "Mật khẩu không được để trống.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Mật khẩu phải có ít nhất 6 ký tự.";
    }

    // Kiểm tra xác nhận mật khẩu
    if (empty($confirm_password)) {
        $errors[] = "Xác nhận mật khẩu không được để trống.";
    } elseif ($password !== $confirm_password) {
        $errors[] = "Mật khẩu và xác nhận mật khẩu không trùng khớp.";
    }

    // Nếu không có lỗi, thực hiện đăng ký
    if (empty($errors)) {
        // Thực hiện đăng ký người dùng, ví dụ: lưu thông tin vào cơ sở dữ liệu

        // Sau khi đăng ký thành công, bạn có thể chuyển hướng người dùng đến trang khác
        header("Location: welcome.php");
        exit();
    } else {
        // Nếu có lỗi, hiển thị thông báo lỗi
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
