<?php

namespace App\Models;
// tự hiểu auto_load sẽ add vào
class ProductModel extends BaseModel
{
    public function getAllProducts()
    {
        $this->db->query("SELECT * FROM articles");
        return $this->db->resultSet();
    }

    public function getProductById($id)
    {
        $this->db->query("SELECT * FROM sanpham WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }


    public function createProduct($productData)
    {
        $this->db->query("INSERT INTO sanpham (name, description, price) VALUES (:name, :description, :price)");
        // Bind values
        $this->db->bind(':name', $productData['name']);
        $this->db->bind(':description', $productData['description']);
        $this->db->bind(':price', $productData['price']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct($id)
    {
        $this->db->query("DELETE FROM sanpham WHERE id = :id");
        // Bind values
        $this->db->bind(':id', $id);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
