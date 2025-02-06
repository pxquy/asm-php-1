<?php
class HomeController
{
    public function home()
    {
        //Khởi tạo class
        // $model = new Database();
        // $arr_products = $model->getListProduct(); 
        $arr_products = [
            ['id' => 1, 'name' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => 1000, 'description' => 'description'],
            ['id' => 2, 'name' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => 1000, 'description' => 'description'],
            ['id' => 3, 'name' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => 1000, 'description' => 'description'],
            ['id' => 4, 'name' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => 1000, 'description' => 'description'],
            ['id' => 5, 'name' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => 1000, 'description' => 'description'],
        ]; // mock data
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = $arr_products;
        }
        // echo '<pre>';
        // print_r($arr_products);
        include('views/home/home.php');
    }
    public function addToCart()
    {
        $id = $_GET['id'] ?? 0;
        $id = (int) $id;
    
        // Khởi tạo mảng giỏ hàng từ SESSION nếu có, nếu không thì gán là mảng rỗng
        $array_cart = isset($_SESSION['arr_cart']) ? $_SESSION['arr_cart'] : [];
    
        // Tìm sản phẩm từ $_SESSION['products'] dựa trên id
        $arr_current_product = null;  // Khởi tạo biến chứa sản phẩm hiện tại
        foreach ($_SESSION['products'] as $product) {
            if ($product['id'] == $id) {
                $arr_current_product = $product; // Nếu tìm thấy sản phẩm có id trùng, gán vào $arr_current_product
                break; // Dừng vòng lặp khi tìm thấy sản phẩm
            }
        }
    
        // Nếu tìm thấy sản phẩm trong $_SESSION['products']
        if ($arr_current_product) {
            // Kiểm tra xem có sản phẩm nào trong giỏ hàng chưa
                $soluong = $_POST['soluong'] ? $_POST['soluong'] : 1;
                if ($soluong > 0) {
                    $flag_exist = false; // Khởi tạo cờ để kiểm tra sản phẩm có tồn tại trong giỏ hàng hay không
    
                    // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
                    foreach ($array_cart as &$item) {
                        if ($item['id'] == $id) {
                            $item['soluong'] += $soluong; // Cập nhật số lượng của sản phẩm nếu đã tồn tại trong giỏ hàng
                            $flag_exist = true;
                        }
                    }
    
                    // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới sản phẩm vào giỏ hàng
                    if (!$flag_exist) {
                        $row_cart = $arr_current_product;
                        $row_cart['soluong'] = 1; // Mặc định số lượng là 1 khi thêm vào giỏ hàng
                        $array_cart[] = $row_cart; // Thêm sản phẩm vào giỏ hàng
                    }
    
                    // Lưu lại giỏ hàng vào SESSION
                    $_SESSION['arr_cart'] = $array_cart;
                }
    
                // Chuyển hướng sau khi thêm sản phẩm vào giỏ hàng
                header("Location: index.php?router=cart");
                exit();
        } else {
            // Sản phẩm không tồn tại trong danh sách sản phẩm
            echo "Sản phẩm không tồn tại.";
        }
    }
    
    public function cart()
    {  
        $array_cart = isset($_SESSION['arr_cart']) ? $_SESSION['arr_cart'] : null;
        include('views/cart/cart.php');
    }
}