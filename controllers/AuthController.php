<?php
    session_start();

    // Require các file cần sử dụng.
    require_once('core/Connection.php');
    require_once('core/Function.php');

    // Các Model cần thiết.
    require_once('models/UserModel.php');

    // GET action.
    $action = "login";
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    switch ($action) {
        case 'login':
            require_once('views/user/login.php');
            break;
        case 'register':
            require_once('views/user/register.php');
            break;
        case 'signout':
            if($_SESSION['user']['id']){
                unset($_SESSION['user']);
                header('location: index.php');
            }
            break;

        case 'toLogin':
            $user = $_POST['username'];
            $pass = $_POST['password'];

            if(checkUsername($user)){
                if(checkPassword($user, $pass)){
                    $_SESSION['user']['id'] = checkPassword($user, $pass)['id'];
                    header('location: user.php');
                }
                else{
                    echo 'Sai mật khẩu';
                    die();
                }
            }else{
                echo 'Sai tài khoản';
                die();
            }
            break;
        case 'toRegister':
            $user = $_POST['username'];
            $email = $_POST['email'];
            $pass = $_POST['password'];

            if(checkUsername($user, $pass)){
                echo 'Username đã tồn tại';
            }else{
                if(checkEmail($email)){
                    echo 'Email đã tồn tại';
                }else{
                    if(addUser($user, $pass, $email)){
                        $_SESSION['user']['id'] = checkPassword($user, $pass)['id'];
                        header('location: user.php');
                    }else{
                        echo 'Lỗi khi đăng ký tài khoản, Vui lòng thử lại';
                    }
                    
                }
            }
            break;
        default: 
            require_once('views/user/login.php');
            break;
        break;
    }
