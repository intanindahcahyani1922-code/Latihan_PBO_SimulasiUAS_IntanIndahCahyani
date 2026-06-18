<?php
// FILE: PendaftaranReguler.php
require_once 'pendaftaran_induk.php';

class PendaftaranReguler extends Pendaftaran {
    private $pilihanProdi;
    private $lokasiKampus;

    public function __construct($id, $nama, $asal, $nilai, $biayaDasar, $prodi, $kampus) {
        parent::__construct($id, $nama, $asal, $nilai, $biayaDasar);
        $this->pilihanProdi = $prodi;
        $this->lokasiKampus = $kampus;
    }

    public function getPilihanProdi() { return $this->pilihanProdi; }
    public function getLokasiKampus() { return $this->lokasiKampus; }

    // TAHAP 5 OVERRIDING: Tarif standar murni
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    // Mengisi informasi unik jalur Reguler
    public function tampilkanInfoJalur() {
        return "🎓 Prodi: " . ($this->pilihanProdi ?? '-') . " | 📍 Kampus: " . ($this->lokasiKampus ?? '-');
    }

    public static function getDaftarReguler($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $result = $db->conn->query($query);
        $daftar = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
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