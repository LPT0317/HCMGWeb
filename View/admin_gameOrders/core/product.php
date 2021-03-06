<?php

class Product{
    //db stuff
    private $conn;
    private $table = 'product';

    //post properties
    public $Product_id;
    public $Name;
    public $Description;
    public $Type;
    public $Produce_studio;
    public $Price;
    public $Background_image;
    public $Square_image;
    public $Small_image1;
    public $Small_image2;
    public $Small_image3;

    //constructor with db connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    public function count(){
        $query = 'SELECT COUNT(Product_id)
            FROM '.$this->table;
        
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();

        return $stmt;
    }

    //get all product in db
    public function read(){
        //create query
        $query = 'SELECT *
            FROM '.$this->table;
        
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();

        return $stmt;
    }

    public function getInfo(){
        //create query
        $query = 'SELECT * 
            FROM '. $this->table .
            ' WHERE Product_id=' . $this->Product_id;
        
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();

        return $stmt;
    }

    public function readPage($start, $row){
        $query = 'SELECT * 
            FROM '. $this->table .
            ' LIMIT ' . $start . ', ' . $row;
        
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();

        return $stmt;
    }

    //create a new product
    public function create(){
        //create query
        $query = 'INSERT INTO ' . $this->table . 
                    ' SET Name = :name, Description = :desp, Type = :type, Produce_studio = :studio, Price = :price,
                          Bacground_image = :bg_img, Square_image = :sqr_img, Small_image1 = :s_img1, Small_image2 = :s_img2, Small_image3 = :S_img3';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //binding of param
        $stmt->bindParam(':name', $this->Name);
        $stmt->bindParam(':desp', $this->Description);
        $stmt->bindParam(':type', $this->Type);
        $stmt->bindParam(':studio', $this->Produce_studio);
        $stmt->bindParam(':price', $this->Price);
        $stmt->bindParam(':bg_img', $this->Background_image);
        $stmt->bindParam(':sqr_img', $this->Square_image);
        $stmt->bindParam(':s_img1', $this->Small_image1);
        $stmt->bindParam(':s_img2', $this->Small_image2);
        $stmt->bindParam(':s_img3', $this->Small_image3);
        
        //execute the query
        if ($stmt->execute()) return true;

        //print error if sth goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }

    //update an existed product by id
    public function update(){
        //create query
        $query = 'UPDATE ' . $this->table . 
        ' SET Name = :name, Description = :desp, Type = :type, Produce_studio = :studio, Price = :price,
              Bacground_image = :bg_img, Square_image = :sqr_img, Small_image1 = :s_img1, Small_image2 = :s_img2, Small_image3 = :S_img3
                      WHERE id = :prod_id';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //binding of param
        $stmt->bindParam(':name', $this->Name);
        $stmt->bindParam(':desp', $this->Description);
        $stmt->bindParam(':type', $this->Type);
        $stmt->bindParam(':studio', $this->Produce_studio);
        $stmt->bindParam(':price', $this->Price);
        $stmt->bindParam(':bg_img', $this->Background_image);
        $stmt->bindParam(':sqr_img', $this->Square_image);
        $stmt->bindParam(':s_img1', $this->Small_image1);
        $stmt->bindParam(':s_img2', $this->Small_image2);
        $stmt->bindParam(':s_img3', $this->Small_image3);
        $stmt->bindParam(':prod_id', $this->Product_id);
        
        //execute the query
        if ($stmt->execute()) return true;

        //print error if sth goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }

    //delete a product by id
    public function delete(){
        //create query
        $query = 'DELETE 
                      FROM ' . $this->table . 
                    ' WHERE Product_id = :id';

        //prepare statement
        $stmt = $this->conn->prepare($query);
       
        //binding of param
        $stmt->bindParam(':id', $this->Product_id);
        
        //execute the query
        if ($stmt->execute()) return true;

        //print error if sth goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }
}

?>