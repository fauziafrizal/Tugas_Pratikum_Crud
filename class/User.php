<?php
class User {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'nama_database');
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function login($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password); // Gunakan hash jika diimplementasi nyata
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // return false jika tidak ada
    }
}
?>
