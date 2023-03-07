<?php
include ('application/DB/DataBase.php');
use core\model;
use DB\DataBase\DataBase;


class Model_Main extends Model
{

    public function getAllPersons() {
        return DataBase::DB()->query('SELECT * FROM Persons');
    }

    public function getNDFLReport() {
        $dateStart = $_GET['year'] . "-01-01 00:00:00";
        $dateEnd = $_GET['year'] . "-12-31 11:59:59";
        $id = $_GET['Id'];
        $stmt = DataBase::DB()->prepare('SELECT * FROM log WHERE (time BETWEEN :dateStart AND :dateEnd) AND row_id = :Id ORDER BY time');
        $stmt->bindParam(':dateStart', $dateStart);
        $stmt->bindParam(':dateEnd', $dateEnd);
        $stmt->bindParam(':Id', $id);
        $stmt->execute();
        $sum = DataBase::DB()->prepare('SELECT row_id, SUM(Salary)  AS person_sum FROM `log` WHERE (time BETWEEN :dateStart AND :dateEnd) AND row_id = :Id GROUP BY row_id');
        $sum->bindParam(':dateStart', $dateStart);
        $sum->bindParam(':dateEnd', $dateEnd);
        $sum->bindParam(':Id', $id);
        $sum->execute();
        $data['list'] = $stmt;
        $data['sum'] = $sum;
        return $data;
    }

    public function getCurrentPerson() {

        $stmt = DataBase::DB()->prepare('SELECT * FROM log WHERE row_id = :Id ORDER BY time');
        $stmt->execute(array('Id' => $_GET['Id']));
        $person = DataBase::DB()->prepare('SELECT * FROM Persons WHERE id = :Id ');
        $person->execute(array('Id' => $_GET['Id']));

        $data['list'] = $stmt;
        $data['person'] = $person;
        return $data;
    }

    public function deleteCurrentPerson() {
        $person = DataBase::DB()->prepare('DELETE FROM Persons WHERE Id = :Id');
        $person->execute(array(
            'Id' => $_POST['Id']
        ));
        header("Location: /");
        die();
    }

    public function createPerson() {
        $person = DataBase::DB()->prepare('INSERT INTO Persons (FirstName, LastName, Job, Salary) 
                               VALUES (:FirstName, :LastName, :Job, :Salary)');
        $person->execute(array(
            'FirstName' => $_POST['FirstName'],
            'LastName'=>$_POST['LastName'],
            'Job'=>$_POST['Job'],
            'Salary'=>$_POST['Salary'],
        ));
        header("Location: /");
        die();
    }
}