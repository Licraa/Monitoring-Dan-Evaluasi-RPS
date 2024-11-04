<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Dosen</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/dosen.css">
    </head>
<?php

use PhpCsFixer\Fixer\Whitespace\LineEndingFixer;

 if( in_groups('dosen'))?>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header-judul">
                <p>UMRAH</p>
            </div>
            <div class="sidebar-header">
                <p>Tahun Ajaran : 2024/2025 Ganjil</p>
            </div>
            <a href="#" class="menu-item active">Halaman Utama</a>
            <?php if (in_groups('dosen')){ ?>
            <div class="menu-item dropdown">
            <a href="#" class="dropdown-toggle">Statistik RPS</a>
            <div class="dropdown-menu">
                <a href="#">Unggah RPS</a>
                <a href="#">Feedback RPS</a>
                <a href="#">Status BAP</a>
            </div>
            </div>
            <?php } ?>
            <a href="/logout" class="menu-item">Keluar</a>
            <a href="#" class="menu-item">Notifikasi</a>
        </nav>

        <!-- Main content -->
        <div class="admin-info">
            <span class="toggle-sidebar">&#9776;</span>
            <span class="admin-name"><?= user()->username; ?></span>
            <img src="https://via.placeholder.com/40" alt="Profile Icon" class="profile-icon">
        </div>

        <div class="main-content">
            <!-- Administrator Info Container -->

            <header class="main-header">
                <h1 class="h4">Home / Dashboard Dosen</h1>
            </header>

            <!-- Dashboard Cards -->
            <div class="container-fluid">
                <div class="row">
                    <!-- Statistik RPS -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Statistik RPS</div>
                            <div class="card-body">
                                <p>Jumlah RPS yang telah diunggah: <strong>0</strong></p>
                                <p>Sedang direview: <strong>0</strong></p>
                                <p>Perlu perbaikan: <strong>0</strong></p>
                            </div>
                        </div>
                    </div>

                    <!-- Unggah RPS -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Unggah RPS</div>
                            <div class="card-body text-center">
                                <button class="btn btn-primary">Unggah RPS Baru</button>
                            </div>
                        </div>
                    </div>

                    <!-- Feedback RPS -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Feedback RPS</div>
                            <div class="card-body">
                                <p>RPS A: Revisi minor diperlukan</p>
                                <p>RPS B: Disetujui</p>
                                <p>RPS C: Perbaikan konten</p>
                                <a href="#">Lihat semua feedback...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Status BAP -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Status BAP</div>
                            <div class="card-body">
                                <p>Status pengisian BAP:</p>
                                <ul>
                                    <li>BAP 1: Sudah diisi</li>
                                    <li>BAP 2: Belum diisi</li>
                                    <li>BAP 3: Sudah diisi</li>
                                </ul>
                                <a href="#">Lihat status lengkap...</a>
                            </div>
                        </div>
                    </div>

                    <!-- Notifikasi -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Notifikasi</div>
                            <div class="card-body">
                                <p>RPS A membutuhkan revisi</p>
                                <p>RPS B telah diverifikasi</p>
                                <p>RPS C membutuhkan tindakan</p>
                                <a href="#">Lihat semua notifikasi...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.toggle-sidebar').addEventListener('click', function() {
            document.querySelector('.dashboard-container').classList.toggle('sidebar-collapsed');
        });
    </script>


    <!-- Scripts for Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body> 

</html>