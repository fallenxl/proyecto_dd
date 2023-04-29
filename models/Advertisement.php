<?php
class Advertisement {
    private $connection;
    public function __construct($db) {
        $this->connection = $db;
    }

    public function getLastAdvertisements() {
        try {
            $query = "SELECT * FROM advertisement ORDER BY id DESC LIMIT 4";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $advertisements = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $advertisements;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getAllAdvertisements() {
        try {
            $query = "SELECT * FROM advertisement";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $advertisements = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $advertisements;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getAdvertisementsById($id){
        try{
            $query = "SELECT a.title, a.description, a.price, u.email, u.username, a.category_id FROM advertisement as a INNER JOIN users as u ON a.user_id = u.id WHERE a.id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $advertisement = $stmt->fetch(PDO::FETCH_ASSOC);

            return $advertisement;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function createNewAdvertisement($userId, $title, $description, $price, $categoryId){
        
        try{
            $query = "INSERT INTO advertisement (user_id, title, description, price, category_id) VALUES (:user_id, :title, :description, :price, :category_id)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':category_id', $categoryId);
            $stmt->execute();
           header('Location: index.php?category=all');


        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
    public function getAdvertisementsByCategory($categoryId){
        try{
            $query = "SELECT * FROM advertisement WHERE category_id = :category_id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':category_id', $categoryId);
            $stmt->execute();
            $advertisements = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $advertisements;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
}