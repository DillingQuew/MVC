<?php

class controller_main extends Controller {
    function action_index()
    {
        $this->view->generate('main.php', 'template.php');
    }



}