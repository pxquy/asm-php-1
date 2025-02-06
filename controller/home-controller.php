<?php
class HomeController
{
    public function home()
    {
        //Khởi tạo class
        // $model = new Database();
        // $arr_products = $model->getListProduct(); 
        $arr_products = [
            ['id' => 1, 'name' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$', 'description' => 'description'],
            ['id' => 2, 'name' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$', 'description' => 'description'],
            ['id' => 3, 'name' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$', 'description' => 'description'],
            ['id' => 4, 'name' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$', 'description' => 'description'],
            ['id' => 5, 'name' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$', 'description' => 'description'],
        ]; // mock data
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = $arr_products;
        }
        // echo '<pre>';
        // print_r($arr_products);
        include('views/home/home.php');
    }
    public function cart()
    {
        $id = $_GET['id'] ?? 0;
        $id = (int) $id;
        //Khởi tạo 1 mảng $array_cart nếu nó tồn tại trong SESSION, còn nếu không thì gán bằng null
        $array_cart = isset($_SESSION['arr_cart']) ? $_SESSION['arr_cart'] : [];
        $model = new Database();
        $arr_current_product = $model->getProductById($id);
        //Xử lý giỏ hàng
        // echo '<pre>';
        // print_r($_POST);
        // die();
        if (isset($_POST['submit'])) {
            $soluong = $_POST['soluong'];
            if ($soluong > 0) {
                $flag_exist = false;//Khởi tạo 1 cờ để kiểm tra sản phẩm có tồn tại trong giỏ hàng hay không
                //Nếu sản phẩm đã có trong giỏ hàng
                foreach ($array_cart as &$item) {
                    if ($item['id'] == $id) {
                        $item['soluong'] += $soluong;
                        $flag_exist = true;
                    }
                }
                if (!$flag_exist) {
                    $row_cart = $arr_current_product;
                    $row_cart['soluong'] = $soluong;
                    $array_cart[] = $row_cart; //Thêm phần tử $item vào cuối mảng $array_cart
                }
                $_SESSION['arr_cart'] = $array_cart;
            }
            // print_r($row_cart);
            header("Location: index.php?route=list_cart");
        }
        // print_r($arr_product);
        include('views/cart/cart.php');
    }
    public function listCart()
    {
        echo '<pre>';
        // session_destroy();//Xóa toàn bộ session
        // print_r($_SESSION['arr_cart']);   
        $array_cart = isset($_SESSION['arr_cart']) ? $_SESSION['arr_cart'] : null;
        include('Views/vi_list_cart.php');
    }
}