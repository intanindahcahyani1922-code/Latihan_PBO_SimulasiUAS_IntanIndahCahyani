<?php
// FILE: index.php

// 1. Import semua berkas subclass dan database yang dibutuhkan
require_once 'database.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 2. Instansiasi objek koneksi database
$db = new Database();

// 3. Mengambil data terpisah memanfaatkan metode query spesifik dari Tahap 4
$dataReguler = PendaftaranReguler::getDaftarReguler($db);
$dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($db);
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi PMB Jalur Spesifik</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; margin: 0; padding: 30px; color: #333; }
        .container { max-width: 1200px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        h1 { text-align: center; color: #1e293b; margin-bottom: 5px; }
        .subtitle { text-align: center; color: #64748b; margin-bottom: 40px; font-size: 14px; }
        h2 { color: #0f172a; margin-top: 30px; border-bottom: 2px solid #e2e8f0; padding-bottom: 8px; font-size: 18px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; margin-bottom: 30px; background: #fff; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e2e8f0; font-size: 14px; }
        th { background-color: #1e293b; color: white; font-weight: 600; }
        tr:hover { background-color: #f8fafc; }
        .badge { padding: 5px 10px; border-radius: 4px; font-size: 11px; font-weight: bold; color: white; text-transform: uppercase; }
        .bg-reg { background-color: #0284c7; }
        .bg-pres { background-color: #d97706; }
        .bg-din { background-color: #7c3aed; }
        .total-biaya { font-weight: bold; color: #16a34a; }
        .text-center { text-align: center; color: #94a3b8; }
    </style>
</head>
<body>

<div class="container">
    <h1>📝 Sistem Manajemen Pendaftaran Mahasiswa Baru</h1>
    <div class="subtitle">Dashboard Hasil Seleksi Jalur Spesifik — Berbasis PHP OOP (Tahap 6)</div>

    <h2><span class="badge bg-reg">Reguler</span> Daftar Calon Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Atribut Unik Jalur (Polimorfik)</th>
                <th>Total Biaya (Polimorfik)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dataReguler)): ?>
                <?php foreach ($dataReguler as $mhs): ?>
                    <tr>
                        <td><?= $mhs->getId(); ?></td>
                        <td><strong><?= htmlspecialchars($mhs->getNama()); ?></strong></td>
                        <td><?= htmlspecialchars($mhs->getAsal()); ?></td>
                        <td><?= number_format($mhs->getNilai(), 2, ',', '.'); ?></td>
                        <td>Rp <?= number_format($mhs->getBiayaDasar(), 0, ',', '.'); ?></td>
                        <td><small><?= $mhs->tampilkanInfoJalur(); ?></small></td>
                        <td class="total-biaya">Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7" class="text-center">Tidak ada data pendaftar jalur reguler.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h2><span class="badge bg-pres">Prestasi</span> Daftar Calon Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Atribut Unik Jalur (Polimorfik)</th>
                <th>Total Biaya (Polimorfik)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dataPrestasi)): ?>
                <?php foreach ($dataPrestasi as $mhs): ?>
                    <tr>
                        <td><?= $mhs->getId(); ?></td>
                        <td><strong><?= htmlspecialchars($mhs->getNama()); ?></strong></td>
                        <td><?= htmlspecialchars($mhs->getAsal()); ?></td>
                        <td><?= number_format($mhs->getNilai(), 2, ',', '.'); ?></td>
                        <td>Rp <?= number_format($mhs->getBiayaDasar(), 0, ',', '.'); ?></td>
                        <td><small><?= $mhs->tampilkanInfoJalur(); ?></small></td>
                        <td class="total-biaya">Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7" class="text-center">Tidak ada data pendaftar jalur prestasi.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h2><span class="badge bg-din">Kedinasan</span> Daftar Calon Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Atribut Unik Jalur (Polimorfik)</th>
                <th>Total Biaya (Polimorfik)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dataKedinasan)): ?>
                <?php foreach ($dataKedinasan as $mhs): ?>
                    <tr>
                        <td><?= $mhs->getId(); ?></td>
                        <td><strong><?= htmlspecialchars($mhs->getNama()); ?></strong></td>
                        <td><?= htmlspecialchars($mhs->getAsal()); ?></td>
                        <td><?= number_format($mhs->getNilai(), 2, ',', '.'); ?></td>
                        <td>Rp <?= number_format($mhs->getBiayaDasar(), 0, ',', '.'); ?></td>
                        <td><small><?= $mhs->tampilkanInfoJalur(); ?></small></td>
                        <td class="total-biaya">Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7" class="text-center">Tidak ada data pendaftar jalur kedinasan.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>