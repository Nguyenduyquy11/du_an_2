<?php 
namespace App\model\Client;
use PDO;
    class ClientBaseModel{
        function getConnect(){
            $pdo = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME.
            ";charset=".DBCHARSET,DBUSER,DBPASS);
            return $pdo;
        }

        // Hàm lấy nhiều dòng dữ liệu
        function getAllData($query){   
            // $pdo = getConnect();         
            try {
                $pdo = $this->getConnect();
                if($pdo !== null) {
                $stmt = $pdo->prepare($query);               
                $stmt->execute();
                return $stmt->fetchAll();
                } else {
                    return null; 
                }
            } catch(PDOException $e) {
                echo "Lỗi truy vấn: " . $e->getMessage();
                return null;
            }
        }

        // Hàm lấy một dòng dữ liệu
        function getRowData($query){
            try {
                $pdo = $this->getConnect();
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                return $stmt->fetch();
            } catch(PDOException $e) {
                echo "Lỗi truy vấn: " . $e->getMessage();
                return null;
            }
        }
        public function insertAndGetLastInsertId($sql) {
            try {
                $pdo = $this->getConnect(); // Lấy kết nối PDO từ phương thức getConnect
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                // Trả về ID của bản ghi vừa chèn
                return $pdo->lastInsertId();
            } catch(PDOException $e) {
                echo "Lỗi truy vấn: " . $e->getMessage();
                return null;
            }
        }
        
    }
        
    
?>