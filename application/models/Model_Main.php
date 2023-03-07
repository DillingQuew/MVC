<?php
include ('application/DB/DataBase.php');
use core\model;
use DB\DataBase\DataBase;


class Model_Main extends Model
{

    public function get_data()
    {
        return DataBase::DB()->query('SELECT * FROM Persons')->fetch(PDO::FETCH_LAZY);
    }
    public function getAllPersons() {
        return DataBase::DB()->query('SELECT * FROM Persons');
    }

    public function getNDFLReport() {
        $stmt = DataBase::DB()->prepare('SELECT * FROM log WHERE (time BETWEEN "2023-01-01 00:00:00" AND "2023-12-31 11:59:59") AND row_id = :Id ORDER BY time');
        $stmt->execute(array('Id' => $_GET['Id']));
        $sum = DataBase::DB()->prepare('SELECT row_id, SUM(Salary)  AS person_sum FROM `log` WHERE row_id = :Id GROUP BY row_id');
        $sum->execute(array('Id' => $_GET['Id']));
        $data['list'] = $stmt;
        $data['sum'] = $sum;
        return $data;
    }
}