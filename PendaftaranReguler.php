<?php
// FILE: PendaftaranReguler.php
require_once 'pendaftaran_induk.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik Reguler
    private $pilihanProdi;
    private $lokasiKampus;

    // Constructor untuk mengisi properti induk dan properti anak
    public function __construct($id, $nama, $asal, $nilai, $biayaDasar, $prodi, $kampus) {
        parent::__construct($id, $nama, $asal, $nilai, $biayaDasar);
        $this->pilihanProdi = $prodi;
        $this->lokasiKampus = $kampus;
    }

    // Getter untuk digunakan di halaman View nanti
    public function getPilihanProdi() { return $this->pilihanProdi; }
    public function getLokasiKampus() { return $this->lokasiKampus; }

    // Wajib di-override karena turunan abstract class (Isinya dikosongkan dulu untuk Tahap 4)
    public function hitungTotalBiaya() {
        return 0;
    }

    public function tampilkanInfoJalur() {
        return "";
    }

    // Metode Query Spesifik: SELECT WHERE Jalur Reguler
    public static function getDaftarReguler($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
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
                    $row['pilihan_prodi'], 
                    $row['lokasi_kampus']
                );
            }
        }
        return $daftar;
    }
}