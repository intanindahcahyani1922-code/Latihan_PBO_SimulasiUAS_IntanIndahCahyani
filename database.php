<?php
// FILE: database.php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    // Sesuaikan dengan format nama database kamu di Tahap 1
    private $db_name = "DB_SIMULASI_PBO_TI1D_IntanIndahCahyani"; 
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        
        // Memeriksa apakah koneksi berhasil atau gagal
        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }
}