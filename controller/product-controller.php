<?php
class ProductController
{
    public function add()
    {
        //Xử lý thêm sản phẩm
        if (isset($_POST['submit'])) {
            // print_r($_POST);
            // die();
            $pro_name = $_POST['pro_name'] ?? '';
            $pro_price = $_POST['pro_price'] ?? '';
            $pro_description = $_POST['pro_description'] ?? '';
            $pro_article = $_POST['pro_article'] ?? '';
            $file = $_FILES['image'];
            // print_r($file);die();
            $image_up = $file['name'];//Lấy tên của file upload lên
            $pro_image = '';
            //Kiểm tra file up lên có phải là hình ảnh không
            if (getimagesize($file['tmp_name'])) {
                $pro_image = time() . $image_up;//Găn tên ảnh với thời gian hiện tại để không trùng tên với ảnh cũ
                move_uploaded_file($file['tmp_name'], 'uploads/' . $pro_image);
            }
            $model = new Database();
            $model->store($pro_name, $pro_price, $pro_description, $pro_article, $pro_image);
            header("Location: index.php");
        }
        //Hiển thị ra form thêm sản phẩm
        include('views/products/create/create-product.php');
    }

    public function list()
    {
        $arr_products = [
            ['ID' => 1, 'nameProduct' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$'],
            ['ID' => 2, 'nameProduct' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$'],
            ['ID' => 3, 'nameProduct' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$'],
            ['ID' => 4, 'nameProduct' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$'],
            ['ID' => 5, 'nameProduct' => 'IPhone 16', 'image' => 'IPhone16.jpg', 'price' => '1000$'],
        ]; // mock data
        isset($_SESSION['products']) ? $_SESSION['products'] = $arr_products : [];
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