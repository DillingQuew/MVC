<?php
use core\model;
class Model_Main extends Model
{
    public function getAll($withDeleted = false) {
        $query = "SELECT * FROM products";
        if (!$withDeleted)
            $query.=" WHERE deleted_at IS NULL";

        return $this->run($query)->fetchAll();
    }
    public function findById($id) {
        return $this->run("SELECT * FROM products WHERE id = ?", [$id])->fetch();
    }
    public function create($data) {
        $this->run("
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
        $this->run("
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
        $this->run("
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
        $this->run("DELETE FROM products WHERE id = ?", [$id]);
    }

    public function getSortedProducts($field, $sort) {
        $query = "SELECT * FROM products ORDER BY $field $sort";
        return $this->run($query)->fetchAll();
    }
    public function getCurrentProduct($field) {
        $query = "SELECT * FROM products WHERE (title LIKE :title OR description LIKE :description OR price LIKE :price)";
        return $this->run($query, [
            'title' => "%" .$field . "%",
            'description' => "%" .$field . "%",
            'price' => "%" .$field . "%",
        ])->fetchAll();
    }

    public function getOnlyDeleted($onlyDeleted) {
        $query = "SELECT * FROM products";
        if ($onlyDeleted == "true") {
            $query.=" WHERE deleted_at IS NOT NULL";
        } else {
            $query.=" WHERE deleted_at IS NULL";
        }
        return $this->run($query)->fetchAll();
    }
}