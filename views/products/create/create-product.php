<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="./views/products/create/create-product.css">
    <link rel="stylesheet" href="./views/layout/header/header.css">
    <link rel="stylesheet" href="./views/layout/footer/footer.css">
</head>

<body>
    <?php include_once("./views/layout/header/header.php") ?>
    <div class="create-product-container">
        <h1 class="form-title">Thêm sản phẩm</h1>
        <div class="card">
            <form class="product-form" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="pro_name">Tên sản phẩm</label>
                    <input type="text" id="pro_name" name="pro_name" class="input-field" required>
                </div>
                <div class="form-group">
                    <label for="pro_price">Giá sản phẩm</label>
                    <input type="text" id="pro_price" name="pro_price" class="input-field" required>
                </div>
                <div class="form-group">
                    <label for="pro_description">Mô tả</label>
                    <textarea id="pro_description" name="pro_description" class="textarea-field"></textarea>
                </div>
                <div class="form-group">
                    <label for="pro_image">Ảnh</label>
                    <input type="file" id="pro_image" name="pro_image" class="file-input">
                </div>
                <button type="submit" name="submit" value="add" class="submit-btn">Lưu</button>
            </form>
        </div>
    </div>
    <?php include_once("./views/layout/footer/footer.php") ?>
</body>
</html>