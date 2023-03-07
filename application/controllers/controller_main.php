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


}