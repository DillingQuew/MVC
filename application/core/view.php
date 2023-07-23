<?php
class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.

    function generate($content_view, $template_view, $data = null)
    {
        include 'views/layouts/'.$template_view;
    }

    function getAjaxRequest($template, $data = null) {
        if (file_exists("views/".$template.".php")) {
        include "views/$template".".php";
        }
    }
}