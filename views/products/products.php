<?php
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['ID' => 1, 'nameProduct' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$'],
        ['ID' => 2, 'nameProduct' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$'],
        ['ID' => 3, 'nameProduct' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$'],
        ['ID' => 4, 'nameProduct' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$'],
        ['ID' => 5, 'nameProduct' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$'],
    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>

<body>
    <div class="products">
        <div class="box_product">
            <?php foreach ($_SESSION['products'] as $row): ?>
            <div class="ID"><span>Mã sản phẩm: </span><?= $row['ID'] ?></div>
            <div class="name"><span>Tên sản phẩm: </span><?= $row['nameProduct'] ?></div>
            <div class="image">
                <span>Hình ảnh</span><img src="./images/<?= $row['image'] ?>" alt="Image Product">
            </div>
            <div class="price"><span>Giá sản phẩm: </span><?= $row['price'] ?></div>
            <div class="cart">
                <a href="cart.php">Thêm sản phẩm vào giỏ hàng</a>
            </div>
            <div class="show">
                <a href="showSlide">Xem chi tiết sản phẩm</a>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</body>

</html>