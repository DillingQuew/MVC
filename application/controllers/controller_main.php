<?php
class Controller_main extends Controller {

    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->getAllPersons();
        $this->view->generate('main.php', 'template.php', $data);
    }

    function action_NDFL() {
        $data = $this->model->getNDFLReport();
        $this->view->generate('NDFL.php', 'template.php', $data);
    }

    function action_person() {
        $data = $this->model->getCurrentPerson();
        $this->view->generate('person.php', 'template.php', $data);
    }

    function action_delete() {
        $this->model->deleteCurrentPerson();
    }

    function action_create() {
        $this->model->createPerson();
    }

    function action_addPerson() {
        $this->view->generate('addPerson.php', 'template.php');
    }

    function action_paySalary() {
        $data = $this->model->paySalary();
    }
}