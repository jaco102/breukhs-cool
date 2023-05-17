<?php

namespace Common;

class Controller
{
    public function json(array $data)
    {
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function render(string $view, array $params = null, string $layout = null)
    {
        $content = $this->getContent(__DIR__ . '/../views/' . $view . '.php', $params);
        $body = $this->getContent(__DIR__ . '/../views/' . $layout . '.php', $params, $content);
        require_once __DIR__ . '/../views/document.php';
    }

    public function redirect($url, $status = 302){
        header('Location: '.$url);
        die();
    }

    private function getContent(string $path, $params = null, string $content = null)
    {
        if (file_exists($path) && is_readable($path)) {
            extract($params ?? []);
            ob_start();
            require_once $path;
            return ob_get_clean();
        } else {
            return  $content ?? "";
        }
    }
}
