<?php
// Lấy URL hiện tại
$current_url = $_SERVER['REQUEST_URI'];
// Lấy phần cuối của URL (tên tệp)
$current_page = basename($current_url);

// Tạo một mảng chứa danh sách các mục trong thanh điều hướng
$nav_items = array(
    array("./index.php", "Trang chủ"),
    array("./external.php", "Trang ngoài"),
    array("./category.php", "Thể loại"),
    array("./author.php", "Tác giả"),
    array("./article.php", "Bài viết"),
);

// Định dạng lại URL hiện tại để loại bỏ thư mục gốc (nếu cần)
$base_url = str_replace('/your_base_directory', '', $current_url);
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Administration</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            foreach ($nav_items as $item) {
                $url = $item[0];
                $label = $item[1];

                // Kiểm tra xem URL hiện tại có trùng khớp với liên kết của mục đó không
                $class = (basename($url) === $current_page) ? 'active' : '';

                // Tạo mục thanh điều hướng với lớp "active" (nếu có)
            ?>
                <li class="nav-item <?= $class ?>"><a class="nav-link" href="<?=$url?>"><?= $label ?></a></li>
            <?php } ?>

        </ul>
    </div>
</nav>