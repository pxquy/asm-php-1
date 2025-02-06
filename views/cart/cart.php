<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./views/cart/cart.css">
    <link rel="stylesheet" href="./views/layout/header/header.css">
    <link rel="stylesheet" href="./views/layout/footer/footer.css">
</head>

<body>
    <?php include_once("./views/layout/header/header.php") ?>
    <form action="" method="post" class="cart-form">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $tong = 0;
                if($array_cart != null){
                    foreach($array_cart as $row){
                        $amount = $row['soluong'] * $row['price'];
                        $tong += $amount;
                ?>
                <tr class="cart-item">
                    <td class="cart-item-name"><?= $row['name'] ?></td>
                    <td class="cart-item-image"><img src="uploads/<?= $row['image'] ?>" height="100" alt="Product Image"></td>
                    <td class="cart-item-price"><?= number_format($row['price']) ?></td>
                    <td class="cart-item-quantity"><?= $row['soluong'] ?></td>
                    <td class="cart-item-total"><?= number_format($amount) ?></td>
                </tr>
                <?php
                    }
                }
                ?>
                <tr class="cart-total">
                    <td colspan="4">Tổng tiền phải thanh toán</td>
                    <td class="total-amount"><?= number_format($tong) ?></td>
                </tr>
            </tbody>
        </table>

        <div class="customer-info">
            <table>
                <tr>
                    <td class="label">Tên khách hàng:</td>
                    <td><input type="text" name="cus_name" class="input-field"></td>
                </tr>
                <tr>
                    <td class="label">SĐT:</td>
                    <td><input type="text" name="cus_phone" class="input-field"></td>
                </tr>
                <tr>
                    <td class="label">Địa chỉ:</td>
                    <td><input type="text" name="cus_address" class="input-field"></td>
                </tr>
            </table>
            <button type="submit" class="btn-submit">Đặt mua</button>
        </div>
    </form>

    <?php include_once("./views/layout/footer/footer.php") ?>
</body>
</html>