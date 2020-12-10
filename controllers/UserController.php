<?php
session_start();

// Require các file cần sử dụng.
require_once 'core/function.php';

// Các Model cần thiết.
require_once 'models/UserModel.php';
require_once 'models/OrderModel.php';
require_once 'models/OrderDetailModel.php';

// GET action.
$action = "home";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

switch ($action) {
    case 'home':
        if ($_SESSION['user']['id']) {
            $userId = $_SESSION['user']['id'];
            $user = getUserById($userId);
            $orders = getOrderByUser($userId);
            require_once 'views/user/index.php';
        } else {
            header('location: index.php');
        }

        break;
    case 'updateStatus':
        $id = $_GET['id'];
        $status = $_GET['status'];
        updateStatus($id, $status);
        header("location:user.php");
        break;
    default:
        if ($_SESSION['user']['id']) {
            $allUser = getAllUser();
            require_once 'views/user/index.php';
        } else {
            header('location: index.php');
        }
        break;
        break;
}
