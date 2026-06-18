<?php
// FILE: PendaftaranPrestasi.php
require_once 'pendaftaran_induk.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik Prestasi
    private $jenisPrestasi;
    private $tingkatPrestasi;

    // Constructor
    public function __construct($id, $nama, $asal, $nilai, $biayaDasar, $jenis, $tingkat) {
        parent::__construct($id, $nama, $asal, $nilai, $biayaDasar);
        $this->jenisPrestasi = $jenis;
        $this->tingkatPrestasi = $tingkat;
    }

    // Getter untuk digunakan di halaman View nanti
    public function getJenisPrestasi() { return $this->jenisPrestasi; }
    public function getTingkatPrestasi() { return $this->tingkatPrestasi; }

    // Wajib di-override karena turunan abstract class (Isinya dikosongkan dulu untuk Tahap 4)
    public function hitungTotalBiaya() {
        return 0;
    }

    public function tampilkanInfoJalur() {
        return "";
    }

    // Metode Query Spesifik: SELECT WHERE Jalur Prestasi
    public static function getDaftarPrestasi($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $result = $db->conn->query($query);
        $daftar = [];
        
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Membungkus data database menjadi objek class ini
                $daftar[] = new self(
                    $row['id_pendaftaran'], 
                    $row['nama_calon'], 
                    $row['asal_sekolah'], 
                    $row['nilai_ujian'], 
                    $row['biaya_pendaftaran_dasar'], 
                    $row['jenis_prestasi'], 
                    $row['tingkat_prestasi']
                );
            }
        }
        return $daftar;
    }
}