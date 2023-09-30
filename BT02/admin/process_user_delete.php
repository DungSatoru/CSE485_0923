<?php
require './connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$query = "DELETE FROM USERS WHERE id = $id";
mysqli_query($strConnection, $query);
mysqli_close($strConnection);
header("Location: index.php");
?>
