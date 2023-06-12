<?php

namespace Amasty\core\View;

class View
{
    private string $layout;
    private string $view;
    private array $data;


    public function __construct(string $layout = 'default', string $view = "", $data = [])
    {
        $this->layout = (!empty($layout)) ? $layout : 'default';
        $this->view = (!empty($view)) ? $view : '';
        $this->data = $data;
    }

    public function render()
    {
        return $this->renderLayout($this->renderView());
    }

    private function renderLayout(string $view_content = "")
    {
        $file_path = $_SERVER['DOCUMENT_ROOT'] . "/src/layouts/" . $this->layout . '.php';

        if (file_exists($file_path)) {
            ob_start();
            include $file_path;
            return ob_get_clean();
        } else {
            echo "Не найден файл шаблона по пути $file_path";
            die();
        }
    }

    private function renderView()
    {
        $view_path = $_SERVER['DOCUMENT_ROOT'] . "/src/views/$this->view.php";

        if (file_exists($view_path)) {
            ob_start();
            extract($this->data);
            include $view_path;
            return ob_get_clean();
        } else {
            echo "Не найден файл представления по пути $view_path";
            die();
        }
    }


}