<?php

namespace Core;

class Controller {
    protected function view($viewName, $data = []) {
        extract($data);
        include_once '../app/views/header.php';
        require_once '../app/views/' . $viewName . '.php';
    }

    protected function redirect($url) {
        header('Location: ' . $url);
        exit();
    }

    protected function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    protected function notFound() {
        header("HTTP 404 Not Found");
        $this->view('errors/404');
        exit();
    }

    protected function error($message) {
        $data = ['errorMessage' => $message];
        $this->view('errors/error', $data);
        exit();
    }

    protected function input($key) {
        return $_REQUEST[$key] ?? null;
    }
}
