<?php

    class User
    {
        private $conn;
        private $table = 'user';

        public $id;
        public $name;
        public $pass;
        public $isAdmin;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function read()
        {
            $query = 'SELECT
                User_id,
                User_name,
                User_password
                FROM
                ' . $this->table .
                ' WHERE is_Admin=0';

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function readAll()
        {
            $query = 'SELECT
                User_id
                FROM
                ' . $this->table;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function getInfo()
        {
            $query = 'SELECT 
                User_name,
                User_password
                FROM
                ' . $this->table .
                ' WHERE User_id='
                . $this->id;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function getName()
        {
            $query = 'SELECT 
                User_name 
                FROM
                ' . $this->table .
                ' WHERE User_id='
                . $this->id;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function create()
        {
            $query = 'INSERT INTO ' . $this->table . ' SET User_id=:id,User_name=:name,User_password=:pass,is_Admin=:isAdmin';
            $stmt = $this->conn->prepare($query);
            $this->name = htmlspecialchars(strip_tags($this->name));
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':pass', $this->pass);
            $stmt->bindParam(':isAdmin', $this->isAdmin);
            if($stmt->execute()){
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;
        }

        public function update()
        {
            $query = 'UPDATE ' . $this->table . ' SET User_name=:name,User_password=:pass,is_Admin=:isAdmin
            WHERE User_id=:id';
            $stmt = $this->conn->prepare($query);
            $this->name = htmlspecialchars(strip_tags($this->name));
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':pass', $this->pass);
            $stmt->bindParam(':isAdmin', $this->isAdmin);
            if($stmt->execute()){
                return true;
            }
            return false;
        }

        public function delete()
        {
            $query = 'DELETE FROM ' . $this->table . ' WHERE User_id=:id';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $this->id);
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>