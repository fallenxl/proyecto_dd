<?php
include_once './config/database.php';


class Category{
    private $connection;
    public function __construct($db){
        $this->connection = $db;
    }
    public function getAllCategories(){
        try{
            $query = "SELECT * FROM categories";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $categories;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

   public function getCategoryIdByName($name){
        try{
            $query = "SELECT id FROM categories WHERE name = :name";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            $category = $stmt->fetch(PDO::FETCH_ASSOC);

            return $category['id'];
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
   }
    public function getCategoryNameById($id){
        try{
            $query = "SELECT name FROM categories WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $category = $stmt->fetch(PDO::FETCH_ASSOC);

            return $category['name'];
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
}