<?php
class Controller_main extends Controller {

    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->getAll();
        $this->view->generate('main.php', 'template.php', $data);
    }

    function action_create() {
       if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $data = [
            'category_id' => $_POST['category_id'],
            'title' => $_POST['title'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'sort' => $_POST['sort']
            ];
            $this->model->create($data);
            header("Location: /");
            die();
       }
        $this->view->generate('create.php', 'template.php');
    }

    function action_update() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'];
            $data = [
                'category_id' => $_POST['category_id'],
                'title' => $_POST['title'],
                'price' => $_POST['price'],
                'description' => $_POST['description'],
                'sort' => $_POST['sort']
            ];
            $this->model->update($id, $data);
            header("Location: /");
            die();
        }
        $data = $this->model->findById($_GET['id']);

        $this->view->generate('update.php', 'template.php', $data);
    }

    function action_delete() {
        $id = $_GET['id'];
        $this->model->softDelete($id);
        header("Location: /");
        die();
    }

    function action_getWithDeleted() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($_POST['withDeleted'] == "true") {
                $data = $this->model->getAll(true);
                $this->view->getAjaxRequest("AjaxProduct", $data);
                return false;
            }
            else {
                $data = $this->model->getAll(false);
                $this->view->getAjaxRequest("AjaxProduct", $data);
                return false;
            }
        }
    }
    function action_getSortedProducts() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $this->model->getSortedProducts($_POST['field'], $_POST['sort']);
            $this->view->getAjaxRequest("AjaxProduct", $data);
//            return false;
        }
    }
    function action_search() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $this->model->getCurrentProduct($_POST['word']);
            $this->view->getAjaxRequest("AjaxProduct", $data);
        }
    }
    function action_getOnlyDeleted() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $this->model->getOnlyDeleted($_POST['onlyDeleted']);
            $this->view->getAjaxRequest("AjaxProduct", $data);
        }
    }
}