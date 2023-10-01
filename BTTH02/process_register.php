<?php
if (isset($_POST['btnSubmit'])) {
    $useremail = $_POST['email'];
    $password = $_POST['password'];
    $isConfirmed = 0;

    try {
        require './connect.php';
        $query = "select * from users where username = '$useremail'";
        $stmt = $pdo->query($query);
        if ($stmt->rowCount() > 0) {
            header("Location: register.php?type=register&message=existed");
        } else {
            $passHash = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO USERS (username, password, isconfirmed) VALUES ('$useremail', '$password', '$isConfirmed')";
            $stmt = $pdo->query($query);
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
