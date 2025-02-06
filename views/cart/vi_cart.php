<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="vi_cart.css">
</head>

<body>
    <h1>Đây là trang thêm sản phẩm vào giỏ hàng</h1>
    <form action="" method="post">
        <table border="1">
            <tr>
                <td><?=$arr_current_product['name']?></td>
                <td><img src="uploads/<?=$arr_current_product['image']?>" height="100" /></td>
                <td><?=number_format($arr_current_product['price']) ?></td>
                <td>Số lượng:
                    <input type="number" name="soluong" width="50" />
                </td>
                <td><button type="submit" name="submit" value="add">Thêm vào giỏ hàng</button></td>
            </tr>

        </table>
    </form>
</body>

</html>