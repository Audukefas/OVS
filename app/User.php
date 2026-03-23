<?php

class User {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    // Register a new user
    public function register($username, $password) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        return $stmt->execute([$username, $hash]);
    }

    // Authenticate a user
    public function authenticate($username, $password) {
        $stmt = $this->db->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $hash = $stmt->fetchColumn();
        return password_verify($password, $hash);
    }
}