<?php

include_once 'Database.php'; ?>

<?php



class Category extends Model
{
    public $id = 0;
    public $ten = "";
    public $mo_ta = "";
    public function find($id)
    {
        $sql = "SELECT * FROM category WHERE id = $id ";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $item = $stmt->fetch();
        return $item;
    }


    public function getAll()
    {
        $sql = "SELECT * FROM category";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $items = $stmt->fetchAll();
        return $items;
    }
    public function store($ten, $mo_ta)
    {
        $sql = "INSERT INTO category (ten,mo_ta) VALUES ('$ten','$mo_ta')";
        $this->_db->query($sql);
    }

    public function create($ten, $mo_ta)
    {
        $sql = "INSERT INTO category (id,ten,mo_ta) VALUES (null,'$ten','$mo_ta')";
        $this->_db->query($sql);
    }
    public function update($id, $ten, $mo_ta)
    {
        $sql = "UPDATE category SET ten ='$ten',mo_ta ='$mo_ta' WHERE id ='$id'";
        $this->_db->query($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM category WHERE id = '$id'";
        $this->_db->query($sql);
    }
}
?>