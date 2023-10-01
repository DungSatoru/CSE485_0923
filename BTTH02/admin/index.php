<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .nav-item.active {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php require '../connect.php' ?>
    <?= require '../layout/navigation.php' ?>

    <main>
        <div class="container">
            <div class="row mt-3">
                <?php 
                    $query = "SELECT count(*) FROM users";
                    $users = mysqli_query($strConnection, $query);
                    $user = mysqli_fetch_array($users);
                ?>
                <div class="col-md-3">
                    <div style="border: 2px solid #ccc;" class="text-center p-3 rounded-lg border-1">
                        <h6>Người dùng</h6>
                        <h3 class="text-primary"><?= $user['count(*)'] ?></h3>
                    </div>
                </div>
                <?php 
                    $query = "SELECT count(*) FROM theloai";
                    $types = mysqli_query($strConnection, $query);
                    $type = mysqli_fetch_array($types);
                ?>
                <div class="col-md-3">
                    <div style="border: 2px solid #ccc;" class="text-center p-3 rounded-lg border-1">
                        <h6>Thể loại</h6>
                        <h3 class="text-primary"><?= $type['count(*)'] ?></h3>
                    </div>
                </div>
                <?php 
                    $query = "SELECT count(*) FROM tacgia";
                    $authors = mysqli_query($strConnection, $query);
                    $author = mysqli_fetch_array($authors);
                ?>
                <div class="col-md-3">
                    <div style="border: 2px solid #ccc;" class="text-center p-3 rounded-lg border-1">
                        <h6>Tác giả</h6>
                        <h3 class="text-primary"><?= $author['count(*)'] ?></h3>
                    </div>
                </div>
                <?php 
                    $query = "SELECT count(*) FROM baiviet";
                    $posts = mysqli_query($strConnection, $query);
                    $post = mysqli_fetch_array($posts);
                ?>
                <div class="col-md-3">
                    <div style="border: 2px solid #ccc;" class="text-center p-3 rounded-lg border-1">
                        <h6>Bài viết</h6>
                        <h3 class="text-primary"><?= $post['count(*)'] ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?= require '../layout/footer.php' ?>

</body>

<?php $pdo = null ?>


</html>