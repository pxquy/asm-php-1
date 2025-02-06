<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link các file CSS -->
    <link rel="stylesheet" href="./views/home.css">
    <link rel="stylesheet" href="./views/layout/header/header.css">
    <link rel="stylesheet" href="./views/layout/footer/footer.css">
</head>

<body>
    <div class="main">
        <div class="heder">
            <?php include_once("./views/layout/header/header.php") ?>
        </div>

        <?php foreach ($arr_products as $row): ?>
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

        <div class="footer">
            <?php include_once("./views/layout/footer/footer.php") ?>
        </div>
    </div>
</body>

</html>