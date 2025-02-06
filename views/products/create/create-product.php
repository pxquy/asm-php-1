<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>

<body>
    <h1>Thêm sản phẩm</h1>
    <form method="post" action="" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Tên</td>
                <td><input type="text" name="pro_name" required></td>
            </tr>
            <tr>
                <td>Giá</td>
                <td><input type="text" name="pro_price" required></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td>
                    <textarea name="pro_description" id="pro_description"></textarea>
                </td>
            </tr>
            <tr>
                <td>Bài viết</td>
                <td>
                    <textarea name="pro_article" id="pro_article"></textarea>
                </td>
            </tr>
            <tr>
                <td>Ảnh</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
        </table>
        <button type="submit" name="submit" value="add">Lưu</button>
    </form>
</body>

</html>