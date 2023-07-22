<?php

namespace DB\DataBase;

class Product  {
    protected $db;
    public function __construct(MyPDO $db) {
        $this->db = $db;
    }
    public function getAll($withDeleted = false) {
        $query = "SELECT * FROM products";
        if (!$withDeleted)
            $query.=" WHERE deleted_at IS NULL";

        return $this->db->run($query)->fetchAll();
    }
    public function findById($id) {
        return $this->db->run("SELECT * FROM products WHERE id = ?", [$id])->fetch();
    }
    public function create($data) {
        $this->db->run("
        INSERT INTO products 
        (
          category_id,
          title,
          price,
          description,
          sort
        )
        VALUES (?, ?, ?, ?, ?)",
            [
                $data['category_id'],
                $data['title'],
                $data['price'],
                $data['description'],
                $data['sort'],
            ]);
        return true;
    }

    public function update($id, $data) {
        $this->db->run("
        UPDATE products SET
          category_id = :category_id,
          title = :title,
          price = :price ,
          description = :description ,
          sort = :sort,
          updated_at = :updated_at
          WHERE id = :id",
            [
                "id" => $id,
                "category_id" => $data['category_id'] ?? "1",
                "title" => $data['title'],
                "price" => isset($data['price']) ? $data['price'] : 10,
                "description" => isset($data['description']) ? $data['description'] : "",
                "sort" => isset($data['sort']) ? $data['sort'] : 1,
                "updated_at" => date('Y-m-d h:i:s'),
            ]);
        return true;
    }
    public function softDelete($id) {
        $this->db->run("
        UPDATE products SET
        deleted_at = :deleted_at
        WHERE id = :id",
            [
                "id" => $id,
                "deleted_at" => date('Y-m-d h:i:s'),
            ]);
        return true;
    }
    public function hardDelete($id) {
        $this->db->run("DELETE FROM products WHERE id = ?", [$id]);
    }
}