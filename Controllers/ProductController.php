<?php
include_once './Models/Product.php';
include_once './Models/Category.php';

class ProductController
{
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ten = $_REQUEST['ten'];
            $loai = $_REQUEST['loai'];
            $mo_ta = $_REQUEST['mo_ta'];
            $category_id = $_REQUEST['category_id'];
            $objProduct = new Product();
            $objProduct->create($ten, $loai, $mo_ta, $category_id);

            header("Location: index.php?prod=list");
        }

        $objCategory = new Category();
        $categorys = $objCategory->getAll();

        include_once "View/Product/add.php";
    }
    public function edit()
    {
        $id = $_REQUEST['id'];
        $objProduct = new Product();
        $product = $objProduct->find($id);

        $errors = [];
        if ($_SERVER['REQUEST_METHOD']  == 'POST') {
            $ten = $_REQUEST['ten'];
            $loai = $_REQUEST['loai'];
            $mo_ta = $_REQUEST['mo_ta'];
            $category_id = $_REQUEST['category_id'];

            if ($ten == '') {
                $errors['ten'] = 'Vui lòng nhập tên';
            }
            if ($loai == '') {
                $errors['loai'] = 'Vui lòng nhập loại';
            }
            if ($mo_ta == '') {
                $errors['mo_ta'] = 'Vui lòng nhập mô tả';
            }
            if ($category_id == '') {
                $errors['category_id'] = 'Vui lòng nhập thể loại';
            }

            if (count($errors) == 0) {
                $objProduct = new Product();
                $data = [
                    'ten' => $ten,
                    'loai' => $loai,
                    'mo_ta' => $mo_ta,
                    'category_id' => $category_id
                ];
                $objProduct->update($id, $ten, $loai, $mo_ta, $category_id);
                $_SESSION['alert'] = 'Cập nhật thành công';
            }
        }
        include 'View/Product/edit.php';
    }
    public function delete()
    {
        $id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? $_REQUEST['id'] : 0;
        if (!$id) {
            header("Location: index.php?prod=list");
            die();
        }
        $objProduct = new Product();
        $objProduct->delete($id);

        $_SESSION['alert'] = 'Xóa thành công !';

        header("Location: index.php?prod=list");
        die();
        include 'View/Product/delete.php';
    }
    public function list()
    {
        $objProduct = new Product();
        $products = $objProduct->getAll();
        include 'View/Product/list.php';
    }
}
