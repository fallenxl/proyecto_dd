<?php
include_once 'components/alerts.php';
class User
{
    private $connection;
    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function getUsers()
    {
        try {
            $query = "SELECT * FROM users";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function login($email, $password)
    {
        try {
            $query = "SELECT * FROM users WHERE email = :email AND password = :password";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                header('Location: index.php');
            } else {
                alertError('Usuario o contraseña incorrectos');
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    public function createUser($email, $username, $password)
    {
        try {
            $query = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $validateUser = $this->validateNewUser($email, $username);
            if ($validateUser) {
                $stmt->execute();
                $user = $this->getUserByEmail($email);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: index.php');
            }
            return;
        } catch (PDOException $e) {
            alertError('Hubo un error al crear el usuario');
        }
    }

    public function getUserByEmail($email)
    {
        try {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function validateNewUser($email, $username)
    {
        try {
            $query = "SELECT * FROM users WHERE email = :email OR username = :username";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                alertError('El usuario o email ya existe');
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateUser($data)
    {
        $query = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':id', $data['id']);
        $stmt->execute();
        return $stmt;
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }
}
