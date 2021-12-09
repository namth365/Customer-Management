<?php
include_once './Models/User.php';

class UserController
{
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_REQUEST['ten'];
            $nghe = $_REQUEST['nghe'];
            $objUser = new User();
            $objUser->create($ten, $nghe);
            header("Location: index.php?user1=list");
        }
        include_once 'View/User/add.php';
    }
    public function edit()
    {
        $id = $_REQUEST['id'];
        $objUser = new User();
        $user = $objUser->find($id);

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_REQUEST['ten'];
            $nghe = $_REQUEST['nghe'];
            if ($ten == '') {
                $errors['ten'] = "Vui lòng nhập tên";
            }
            if ($nghe == '') {
                $errors['nghe'] = "Vui lòng nhập nghề nghiệp";
            }

            if (count($errors) == 0) {
                $objUser = new User();
                $data = [
                    'ten' => $ten,
                    'nghe' => $nghe,
                ];
                $objUser->update($id, $ten, $nghe);
                $_SESSION['alert'] = "Cập nhật thành công";
                header("Location: index.php?user1=list");
            }
        }
        include_once 'View/User/edit.php';
    }
    public function list()
    {
        $s = (isset($_REQUEST['s']) && !empty($_REQUEST['s'])) ? $_REQUEST['s'] : 0;
        $objUser = new User();
        if ($s) {
            $users = $objUser->getAllSearch($s);
        } else {
            $users = $objUser->getAll();
        }
       
        include_once 'View/User/list.php';
    }

    public function delete()
    {
        $id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? $_REQUEST['id'] : 0;
        if (!$id) {
            header("Location: index.php?user1=list");
            die();
        }
        $objUser = new User();
        $objUser->delete($id);
        $_SESSION['alert'] = 'Xóa thành công !';

        header("Location: index.php?user1=list");
        die();
    }
}
