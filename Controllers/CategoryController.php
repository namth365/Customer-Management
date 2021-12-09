<?php
include_once './Models/Category.php';


class CategoryController
{


    public function add()
    {
        $alert = (isset($_REQUEST['alert'])) ? $_REQUEST['alert'] : 0;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_REQUEST['ten'];
            $mo_ta = $_REQUEST['mo_ta'];
            if ($ten == '' ||  $mo_ta == '') {
                $alert = 'Vui lòng nhập đầy đủ thông tin';
            } else {
                $objCategory = new Category();
                $objCategory->create($ten, $mo_ta);
                $alert = 'Lưu thành công';
            }
            header("Location: index.php?cate=list");
        }

        include "View/Category/add.php";
    }
    public function list()
    {
        $objCategory = new Category();
        $categorys = $objCategory->getAll();

        include 'View/Category/list.php';
    }
    public function edit()
    {
        $id = $_REQUEST['id'];
        $objCategory = new Category();
        $category = $objCategory->find($id);

        $errors = [];
        if ($_SERVER['REQUEST_METHOD']  == 'POST') {
            $ten = $_REQUEST['ten'];
            $mo_ta = $_REQUEST['mo_ta'];

            if ($ten == '') {
                $errors['ten'] = 'Vui lòng nhập tên';
            }
            if ($mo_ta == '') {
                $errors['mo_ta'] = 'Vui lòng nhập mô tả';
            }

            if (count($errors) == 0) {
                $objCategory = new Category();
                $data = [
                    'ten' => $ten,
                    'mo_ta' => $mo_ta,
                ];
                $objCategory->update($id, $ten, $mo_ta);
                $_SESSION['alert'] = 'Cập nhật thành công';
            }
        }

        include 'View/Category/edit.php';
    }
    public function delete()
    {
        $id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? $_REQUEST['id'] : 0;
        if (!$id) {
            header("Location: index.php?cate=list");
            die();
        }
        $objCategory = new Category();
        $objCategory->delete($id);

        $_SESSION['alert'] = 'Xóa thành công !';

        header("Location: index.php?cate=list");
        die();
    }
}
