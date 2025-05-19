<?php
require_once 'Koneksi.php';

class Pasien {
    private $conn;

    public function __construct() {
        $koneksi = new Koneksi();
        $this->conn = $koneksi->getConnection();
    }

    public function ambilData() {
        $sql = "SELECT * FROM pasien";
        return $this->conn->query($sql);
    }

    
    public function tambahData($nama, $umur, $keluhan) {
        $stmt = $this->conn->prepare("INSERT INTO pasien (nama, umur, keluhan) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $nama, $umur, $keluhan);
        return $stmt->execute();
    }

    
    public function ubahData($id_pasien, $nama, $umur, $keluhan) {
        $stmt = $this->conn->prepare("UPDATE pasien SET nama = ?, umur = ?, keluhan = ? WHERE id_pasien = ?");
        $stmt->bind_param("sisi", $nama, $umur, $keluhan, $id_pasien);
        return $stmt->execute();
    }

    public function ambilDataById($id_pasien) {
        $stmt = $this->conn->prepare("SELECT * FROM pasien WHERE id_pasien = ?");
        $stmt->bind_param("i", $id_pasien);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
   
public function hapusData($id_pasien) {
    $stmt = $this->conn->prepare("DELETE FROM pasien WHERE id_pasien = ?");
    $stmt->bind_param("i", $id_pasien);
    return $stmt->execute();
}


}
?>
