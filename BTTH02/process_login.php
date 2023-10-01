<?php
if (isset($_POST['btnLogin'])) {
    $user = $_POST['username'];
    $passwd = $_POST['password'];

    try {
        require './connect.php';
        $query = "SELECT * FROM users WHERE username = '$user";
        $stmt = $pdo->query($query);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
        } else {
            header("Location: ./login.php?message=not-existed");
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}


if (isset($_POST['sbmLogin'])) {
    $user = $_POST['username'];
    $password = $_POST['password'];

    try {
        require './php/connect.php';
        $query = "select * from users where username='$user';";
        $stmt = $strConnection->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();

            if ($user['isConfirmed']) {
                $pash_hash = $user['password'];
                if (password_verify($password, $pash_hash)) {
                    session_start();
                    $_SESSION['isLogin'] = $user;
                    header("location: ./admin/index.php");
                } else {
                    header("Location: ./login.php?message=not-matched-password");
                }
            } else {
                header("Location: ./login.php?message=Tài khoản chưa được xác thực");
            }
        } else {
            header("Location:./login.php?message=not-existed");
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
