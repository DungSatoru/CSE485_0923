<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>
    <?php require './connect.php';

    ?>
    <?= require './layout/header.php' ?>
    <main>
        <div class="container">
            <div class="row">
                <?php

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = "SELECT * FROM baiviet INNER JOIN tacgia ON tacgia.ma_tgia = baiviet.ma_tgia INNER JOIN theloai ON theloai.ma_tloai = baiviet.ma_tloai WHERE ma_bviet = '$id'";
                    $posts = mysqli_query($strConnection, $query);
                    $post = mysqli_fetch_array($posts);
                ?>
                    <div class="col-md-4">
                        <img class="w-100" style="" src="<?= $post['hinhanh'] ?>" alt="Ảnh không tồn tại">
                    </div>
                    <div class="col-md-8">

                        <h3 class="title text-primary"><?= $post['tieude'] ?></h3>
                        <p class="songName"><span class="font-weight-bold">Bài hát: </span><?= $post['ten_bhat'] ?></p>
                        <p class="type"><span class="font-weight-bold">Thể loại: </span><?= $post['ten_tloai'] ?></p>
                        <p class="summary"><span class="font-weight-bold">Tóm tắt: </span><?= $post['tomtat'] ?></p>
                        <p class="content"><span class="font-weight-bold">Nội dung: </span><?= $post['noidung'] ?></p>
                        <p class="author"><span class="font-weight-bold">Tác giả: </span><?= $post['ten_tgia'] ?></p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </main>
    <?= require './layout/footer.php' ?>
</body>
<?php mysqli_close($strConnection) ?>

</html>