<?php
class ProductController
{
    public function add()
    {
        // Kiểm tra xem thư mục uploads đã tồn tại chưa, nếu chưa thì tạo
        $upload_dir = 'uploads/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);  // Tạo thư mục với quyền 0777 (tạo thư mục cha nếu chưa có)
        }
    
        // Xử lý thêm sản phẩm
        if (isset($_POST['submit'])) {
            $pro_name = $_POST['pro_name'] ?? '';
            $pro_price = $_POST['pro_price'] ?? '';
            $pro_description = $_POST['pro_description'] ?? '';
            $file = $_FILES['pro_image'];
            $image_up = $file['name'];  // Lấy tên của file upload lên
            $pro_image = '';
    
            // Kiểm tra file upload có phải là hình ảnh không
            if (getimagesize($file['tmp_name'])) {
                $pro_image = time() . $image_up; // Gắn tên ảnh với thời gian hiện tại để không trùng tên với ảnh cũ
                move_uploaded_file($file['tmp_name'], $upload_dir . $pro_image);  // Di chuyển ảnh vào thư mục uploads
            }
    
            // Lưu sản phẩm vào session
            $new_product = [
                'id' => count($_SESSION['products']) + 1,  // Tạo id mới tự động
                'name' => $pro_name,
                'image' => $pro_image,
                'price' => $pro_price,
                'description' => $pro_description,
            ];
    
            $_SESSION['products'][] = $new_product;  // Thêm sản phẩm vào mảng session
    
            // Chuyển hướng sau khi thêm
            header("Location: index.php");
            exit();
        }
    
        // Hiển thị ra form thêm sản phẩm
        include('views/products/create/create-product.php');
    }
    

    public function list()
    {
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
        include('views/products/products.php');
    }

    // public function edit(){
    //     $id = $_GET['id'];
    //     $model = new Database();
    //     $pro_edit = $model->getProductById($id);


    //     //Xử lý thêm sản phẩm
    //     if(isset($_POST['submit'])){
    //         // print_r($_POST);
    //         // die();
    //         $pro_name = $_POST['pro_name'] ?? '';
    //         $pro_price = $_POST['pro_price'] ?? '';
    //         $pro_description = $_POST['pro_description'] ?? '';
    //         $pro_article = $_POST['pro_article'] ?? '';
    //         $file = $_FILES['image'];
    //         // print_r($file);die();
    //         $image_up = $file['name'];//Lấy tên của file upload lên
    //         $pro_image = $pro_edit['image'];
    //         //Kiểm tra file up lên có phải là hình ảnh không
    //         if($image_up != ""){
    //             if(getimagesize($file['tmp_name'])  !== false ){
    //                 $pro_image = time().$image_up;//Găn tên ảnh với thời gian hiện tại để không trùng tên với ảnh cũ
    //                 move_uploaded_file($file['tmp_name'], 'uploads/'.$pro_image);
    //             }
    //         }
    //         $model->update($id, $pro_name, $pro_price, $pro_description, $pro_article, $pro_image);
    //         header("Location: index.php");
    //     }
    //     //Hiển thị ra form thêm sản phẩm
    //     include('Views/vi_pro_edit.php');        
    // }

    // public function delete(){
    //     $id = $_GET['id'];
    //     $model = new Database();
    //     $model->remove($id);
    //     header("Location: index.php");
    // }
}