<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="./views/products/products.css">
    <link rel="stylesheet" href="./views/layout/header/header.css">
    <link rel="stylesheet" href="./views/layout/footer/footer.css">
</head>

<body>
    <?php include_once("./views/layout/header/header.php") ?>
    <button class="btn btn-ml">
        <a href="?router=add-product">Thêm sản phẩm</a>
    </button>
    <div class="products-container">
        <?php foreach ($_SESSION['products'] as $row): ?>
            <div class="products-item">
                <div class="ID"><span>Mã sản phẩm: </span><?= $row['id'] ?></div>
                <div class="name"><span>Tên sản phẩm: </span><?= $row['name'] ?></div>
                <div class="image">
                    <span>Hình ảnh</span><img src="./uploads/<?= !empty($row['image']) ? $row['image'] : 'IPhone16.jpg' ?>" alt="Image Product">
                </div>
                <div class="price"><span>Giá sản phẩm: </span><?= $row['price'] ?></div>
                <div class="cart">
                    <a href="cart.php">Thêm sản phẩm vào giỏ hàng</a>
                </div>
                <div class="show">
                    <a href="showSlide">Xem chi tiết sản phẩm</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <?php include_once("./views/layout/footer/footer.php") ?>
</body>

</html>