<?php

require_once 'classes/Model.php';

class FormModel extends Model {
    public function save($data) {
        $stmt = $this->db->prepare("
            INSERT INTO registrations (full_name, email, phone, age, comments, room_preference, interests, file_upload, created_at)
            VALUES (:full_name, :email, :phone, :age, :comments, :room_preference, :interests, :file_upload, NOW())
        ");
        $stmt->execute($data);
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM registrations");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM registrations WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data) {
        $stmt = $this->db->prepare("
            UPDATE registrations
            SET full_name = :full_name, email = :email, phone = :phone, age = :age,
                comments = :comments, room_preference = :room_preference, interests = :interests
            WHERE id = :id
        ");
        $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM registrations WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}