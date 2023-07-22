<?php
class Controller_main extends Controller {

    function __construct()
    {
        $this->model = new Model_Main(new \DB\DataBase\MyPDO());
        $this->view = new View();
    }

    function action_index()
    {
        $data = "";
        $withDeleted = isset($_GET['withDeleted']) ?? false;
        if ($withDeleted == "on") {
            $withDeleted = true;
        } else {
            $withDeleted = false;
        }
        if ($withDeleted) {
            $data = $this->model->getAll(true);
        }
        else {
            $data = $this->model->getAll();
        }

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
        $this->model->delete($id);
        header("Location: /");
        die();
    }

}