<?php
// FILE: PendaftaranPrestasi.php
require_once 'pendaftaran_induk.php';

class PendaftaranPrestasi extends Pendaftaran {
    private $jenisPrestasi;
    private $tingkatPrestasi;

    public function __construct($id, $nama, $asal, $nilai, $biayaDasar, $jenis, $tingkat) {
        parent::__construct($id, $nama, $asal, $nilai, $biayaDasar);
        $this->jenisPrestasi = $jenis;
        $this->tingkatPrestasi = $tingkat;
    }

    public function getJenisPrestasi() { return $this->jenisPrestasi; }
    public function getTingkatPrestasi() { return $this->tingkatPrestasi; }

    // TAHAP 5 OVERRIDING: Mendapat potongan Rp50.000
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar - 50000;
    }

    // Mengisi informasi unik jalur Prestasi
    public function tampilkanInfoJalur() {
        return "🏆 Prestasi: " . ($this->jenisPrestasi ?? '-') . " (" . ($this->tingkatPrestasi ?? '-') . ")";
    }

    public static function getDaftarPrestasi($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
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
                    $row['jenis_prestasi'], 
                    $row['tingkat_prestasi']
                );
            }
        }
        return $daftar;
    }
}