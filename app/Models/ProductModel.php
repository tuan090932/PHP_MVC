<?php

namespace App\Models;

use App\Traits\Loggable;

use Exception;
// tự hiểu auto_load sẽ add vào
class ProductModel extends BaseModel implements IProductModel
{
    use Loggable;

    public function getAllProducts()
    {
        try {
            $this->db->query("SELECT * FROM articles");
            $this->log("Getting all products from " . __FILE__);
            //-> output là  file này "C:\xampp\htdocs\PHP_MVC\app\Models\ProductModel.php"

            return $this->db->resultSet();
        } catch (Exception $e) {
            // Xử lý lỗi ở đây
            $this->log("Caught exception: " . $e->getMessage());
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    public function getProductById($id)
    {
        $this->db->query("SELECT * FROM articles WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }


    public function createProduct($productData)
    {
        $this->db->query("INSERT INTO articles (title, body, created_at, updated_at) VALUES(:title, :body, :created_at, :updated_at)");
        // Bind values
        $this->db->bind(':title', $productData['title']);
        $this->db->bind(':body', $productData['body']);
        // Get current date and time
        $now = new \DateTime();
        $this->db->bind(':created_at', $now->format('Y-m-d H:i:s'));
        $this->db->bind(':updated_at', $now->format('Y-m-d H:i:s'));
        // Execute
        if ($this->db->execute()) {
            echo "<script>alert('create thành công');</script>";

            return true;
        } else {
            return false;
        }
    }
    public function deleteProduct($id)
    {
        $this->db->query("DELETE FROM articles WHERE id = :id");
        // Bind values
        $this->db->bind(':id', $id);
        // Execute  
        if ($this->db->execute()) {
            echo "<script>alert('delete thành công');</script>";

            return true;
        } else {
            return false;
        }
    }




    public function editProduct($id, $productData)
    {
        $this->db->query("UPDATE articles SET title = :title, body = :body, updated_at = :updated_at WHERE id = :id");
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':title', $productData['title']);
        $this->db->bind(':body', $productData['body']);
        // Get current date and time
        $now = new \DateTime();
        $this->db->bind(':updated_at', $now->format('Y-m-d H:i:s'));
        // Execute
        if ($this->db->execute()) {
            echo "<script>alert('update thành công');</script>";

            return true;
        } else {
            return false;
        }
    }
}
