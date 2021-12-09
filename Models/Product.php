<?php
include_once 'Database.php';
?>
<?php
class Product extends Model
{
    public $id = 0;
    public $ten = "";
    public $loai = "";
    public $mo_ta = "";
    public $category_id = "";

    public function find($id)
    {
        $sql = "SELECT * FROM product WHERE id = $id";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $item = $stmt->fetch();
        return $item;
    }



    public function getAll()
    {
        $sql = "SELECT * FROM product";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $items = $stmt->fetchAll();
        return $items;
    }
    public function update($id, $ten, $loai, $mo_ta, $category_id)
    {
        $sql = "UPDATE product SET ten ='$ten',loai='$loai',mo_ta ='$mo_ta', category_id='$category_id' WHERE id ='$id'";
        $this->_db->query($sql);
    }
    public function create($ten, $loai, $mo_ta, $category_id)
    {
        $sql = "INSERT INTO product (id,ten,loai,mo_ta,category_id) VALUES (null,'$ten','$loai','$mo_ta','$category_id')";
        $this->_db->query($sql);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM product WHERE id = '$id'";
        $this->_db->query($sql);
    }
    public function store($ten, $loai, $mo_ta, $category_id)
    {
        $sql = "INSERT INTO product (ten,loai,mo_ta,category_id) VALUES ('$ten','$loai','$mo_ta','$category_id')";
        $this->_db->query($sql);
    }
}
