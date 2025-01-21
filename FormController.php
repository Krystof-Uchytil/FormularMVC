<?php

require_once 'classes/FormModel.php';

class FormController {
    public function index() {
        $this->view('form');
    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new FormModel();
    
            $file = $_FILES['file_upload'];
            $filePath = 'uploads/' . basename($file['name']);
            move_uploaded_file($file['tmp_name'], $filePath);
    
            $data = [
                'full_name' => $_POST['full_name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'age' => $_POST['age'],
                'comments' => $_POST['comments'],
                'room_preference' => $_POST['room_preference'],
                'interests' => implode(',', $_POST['interests'] ?? []),
                'file_upload' => $filePath,
            ];
    
            $model->save($data);
    
            // Přesměrování na seznam
            header("Location: ?controller=form&action=success");
            exit;
        }
    }

    public function success() {
        $this->view('success');
    }

    public function list() {
        $model = new FormModel();
        $data = $model->getAll();
        $this->view('admin', ['data' => $data]);
    }

    public function edit() {
        $model = new FormModel();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $_POST['id'],
                'full_name' => $_POST['full_name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'age' => $_POST['age'],
                'comments' => $_POST['comments'],
                'room_preference' => $_POST['room_preference'],
                'interests' => implode(',', $_POST['interests'] ?? []),
            ];
    
            $model->update($data);
    
            // Přesměrování na seznam
            header("Location: ?controller=form&action=list");
            exit;
        } else {
            $id = $_GET['id'];
            $record = $model->getById($id);
            $this->view('edit', ['record' => $record]);
        }
    }
    
    public function delete() {
        $model = new FormModel();
        $id = $_GET['id'];
        $model->delete($id);
    
        // Přesměrování na seznam
        header("Location: ?controller=form&action=list");
        exit;
    }

    private function view($view, $data = []) {
        extract($data);
        require "views/$view.php";
    }
}