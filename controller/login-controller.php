<?php
class LoginController
{
    function login()
    {
        //Kiểm tra người dùng click vào nút đăng nhập hay không bằng isset($_POST['login'])
        if (isset($_POST['login'])) {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            // echo 'username là: ' . $username;
            // echo '----- pass là: ' . $password;
            $model = new Database();
            $checkuser = $model->checkUser($username, $password);
            // var_dump($checkuser);

            if ($checkuser == false) {
                echo 'Username hoặc password không đúng';
            } else {
                //Đăng nhập thành công sẽ lưu thông tin vào session
                $_SESSION['array_user_login'] = $checkuser;
                $_SESSION['logged'] = 1;

                header("Location: index.php");//Chuyển sang trang index khi đăng nhập thành công
            }
        }
        // include('Views/login.php');
    }
}