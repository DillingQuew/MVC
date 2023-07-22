<?php
include ('application/DB/DataBase.php');
include ('application/DB/Product.php');

use core\model;
use DB\DataBase\Product;
use DB\DataBase\MyPDO;


class Model_Main extends Model
{
    protected $db;
    public function __construct(MyPDO $db)
    {
        $this->db = $db;
    }

    public function getAll($withDeleted = false) {

        $product = new Product($this->db);
        return $product->getAll($withDeleted);
    }
    public function create($data) {
        $product = new Product($this->db);
        return $product->create($data);
    }
    public function update($id, $data) {
        $product = new Product($this->db);
        return $product->update($id, $data);
    }
    public function findById($id) {
        $product = new Product($this->db);
        return $product->findById($id);
    }
    public function delete($id) {
        $product = new Product($this->db);
        return $product->softDelete($id);
    }
}