<?php
// FILE: PendaftaranKedinasan.php
require_once 'pendaftaran_induk.php';

class PendaftaranKedinasan extends Pendaftaran {
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($id, $nama, $asal, $nilai, $biayaDasar, $sk, $sponsor) {
        parent::__construct($id, $nama, $asal, $nilai, $biayaDasar);
        $this->skIkatanDinas = $sk;
        $this->instansiSponsor = $sponsor;
    }

    public function getSkIkatanDinas() { return $this->skIkatanDinas; }
    public function getInstansiSponsor() { return $this->instansiSponsor; }

    // TAHAP 5 OVERRIDING: Tambahan surcharge 25% dari biaya dasar
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 1.25;
    }

    // Mengisi informasi unik jalur Kedinasan
    public function tampilkanInfoJalur() {
        return "📜 SK: " . ($this->skIkatanDinas ?? '-') . " | 🏢 Sponsor: " . ($this->instansiSponsor ?? '-');
    }

    public static function getDaftarKedinasan($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
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
                    $row['sk_ikatan_dinas'], 
                    $row['instansi_sponsor']
                );
            }
        }
        return $daftar;
    }
}