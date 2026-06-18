<?php
// FILE: PendaftaranKedinasan.php
require_once 'pendaftaran_induk.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik Kedinasan
    private $skIkatanDinas;
    private $instansiSponsor;

    // Constructor
    public function __construct($id, $nama, $asal, $nilai, $biayaDasar, $sk, $sponsor) {
        parent::__construct($id, $nama, $asal, $nilai, $biayaDasar);
        $this->skIkatanDinas = $sk;
        $this->instansiSponsor = $sponsor;
    }

    // Getter untuk digunakan di halaman View nanti
    public function getSkIkatanDinas() { return $this->skIkatanDinas; }
    public function getInstansiSponsor() { return $this->instansiSponsor; }

    // Wajib di-override karena turunan abstract class (Isinya dikosongkan dulu untuk Tahap 4)
    public function hitungTotalBiaya() {
        return 0;
    }

    public function tampilkanInfoJalur() {
        return "";
    }

    // Metode Query Spesifik: SELECT WHERE Jalur Kedinasan
    public static function getDaftarKedinasan($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
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
                    $row['sk_ikatan_dinas'], 
                    $row['instansi_sponsor']
                );
            }
        }
        return $daftar;
    }
}