<?php
// FILE: pendaftaran_induk.php

// Membuat abstract class bernama Pendaftaran
abstract class Pendaftaran {
    // Properti/Atribut Terenkapsulasi (protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    // Constructor untuk memetakan nilai dari kolom tabel database
    public function __construct($id, $nama, $asal, $nilai, $biayaDasar) {
        $this->id_pendaftaran = $id;
        $this->nama_calon = $nama;
        $this->asal_sekolah = $asal;
        $this->nilai_ujian = $nilai;
        $this->biayaPendaftaranDasar = $biayaDasar;
    }

    // Metode Abstrak (Tanpa Isi/Body) yang wajib diturunkan ke kelas anak
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();
}