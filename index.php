<?php
session_start();
include_once './Controllers/CategoryController.php';
include_once './Controllers/ProductController.php';
include_once './Controllers/UserController.php';
?>


<?php


$objCategory = new CategoryController();
$cate = (isset($_REQUEST['cate'])) ? $_REQUEST['cate'] : '';
switch ($cate) {
    case "add":
        $objCategory->add();
        break;
    case "edit":
        $objCategory->edit();
        break;
    case "delete":
        $objCategory->delete();
        break;
    case "list":
        $objCategory->list();
        break;
    default:
        // $objCategory->list();
        break;
}

$objProduct = new ProductController();
$prod = (isset($_REQUEST['prod'])) ? $_REQUEST['prod'] : '';
switch ($prod) {
    case "add":
        $objProduct->add();
        break;
    case "edit":
        $objProduct->edit();
        break;
    case "delete":
        $objProduct->delete();
        break;
    case "list":
        $objProduct->list();
        break;
    default:
        $objProduct->list();
        break;
}
$objUser = new UserController();
$user1 = (isset($_REQUEST['user1'])) ? $_REQUEST['user1'] : '';
switch ($user1) {
    case "add":
        $objUser->add();
        break;
    case "edit":
        $objUser->edit();
        break;
    case "delete":
        $objUser->delete();
        break;
    case "list":
        $objUser->list();
        break;
    default:
        // $objUser->list();
        break;
}

?>