<?php
include_once 'Database.php'; ?>

 <?php
    class User extends Model
    {
        public $id = 0;
        public $ten = "";
        public $nghe = "";
        public function find($id)
        {
            $sql = "SELECT * FROM user WHERE id = $id ";
            $stmt = $this->_db->query($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $item = $stmt->fetch();
            return $item;
        }
        public function getAll()
        {
            $sql = "SELECT * FROM user";
            $stmt = $this->_db->query($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $items = $stmt->fetchAll();
            return $items;
        }

        public function store($ten, $nghe)
        {
            $sql = "SELECT * FROM user (ten,nghe) VALUES ('$ten','$nghe')";
            $this->_db->query($sql);
        }
        public function create($ten, $nghe)
        {
            $sql = "INSERT INTO user (id,ten,nghe) VALUES (NULL,'$ten','$nghe') ";
            $this->_db->query($sql);
        }
        public function getAllSearch($ten)
        {
            $sql = "SELECT * FROM user WHERE ten LIKE '%$ten%' OR nghe LIKE '%$ten%' ";

            $stmt = $this->_db->query($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $items = $stmt->fetchAll();
            return $items;
        }
        public function update($id, $ten, $nghe)
        {
            $sql = " UPDATE user SET ten='$ten', nghe='$nghe' WHERE id='$id'  ";
            $this->_db->query($sql);
        }
        public function delete($id)
        {
            $sql = "DELETE FROM user WHERE id='$id'";
            $this->_db->query($sql);
        }
    }
