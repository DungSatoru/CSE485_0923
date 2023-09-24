<?php
    if (isset($_POST['sbmLogin'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
    }

    // Truy vaasn thoong tin
    try {
        // Keets nooi
        $conn = new POD("mariadb:host=localhost;dbname=CMS", username:"root", password:"HaDung18092003");
        // Buoc 2: Thực hiện truy vấn
        $sql_check = "SELECT * FROM users WHERE username='$user' OR email='$email'";
        $stmt = $conn->prepare($sql_check);
        $stmt->excute();
        // Bước 3: lấy ra thông tin bao gồm mk
        if($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            // Lấy ra mật khẩu
            $pass_hass = $user[3];
            if (password_verify($pass, $pass_hass)) {
                // Cấp thẻ
                session_start();
                $_SESSION['isLogin'] = $user;
                header("Location: user_management.php");
            } else {
                header("Location: login.php?error=not-matched-password");
                
            }
        }
    }catch expe {
        echo "";
    }
?>



<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form action="process_login.php" method="post">
        <label for="username">Tên người dùng:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Đăng nhập">
    </form>
</body>
</html>
