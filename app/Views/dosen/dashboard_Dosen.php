<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/dosen copy.css">
</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header-judul">
                <p>MONEV RPS</p>
            </div>
            <div class="sidebar-header">
                <p>Tahun Ajaran : 2024/2025 Ganjil</p>
            </div>
            <a href="/dosen" class="menu-item active">
                <i class="bi bi-speedometer2"></i><span>Halaman Utama</span>
            </a>
            <a href="/dosen/menurps" class="menu-item" id="menuRPS">
                <i class="bi bi-file-earmark-arrow-up-fill"></i><span>RPS</span>
                <i class="bi bi-chevron-left chevron-icon float-end"></i>
            </a>
            <a href="/dosen/unggah-rps" class="menu-item submenu-item" id="unggahRpsMenu" style="display: none;"><span>Unggah RPS</span></a>
            <a href="/dosen/isi-bap" class="menu-item">
                <i class="bi bi-file-earmark-pdf-fill"></i><span>BAP</span>
            </a>
            <a href="/dosen/feedback" class="menu-item">
                <img src="/img/feedback.png" alt="Feedback Icon" class="feedback-icon"><span>Feedback RPS</span>
            </a>
            <a href="dosen/notifikasi-rps" class="menu-item">
                <i class="bi bi-bell-fill"></i><span>Notifikasi</span>
            </a>
            <a href="/logout" class="menu-item">
                <i class="bi bi-box-arrow-left"></i><span>Keluar</span>
            </a>
        </nav>

        <!-- Main content -->
        <div class="admin-info">
            <span class="toggle-sidebar">&#9776;</span>

            <!-- Right-aligned container for profile and notification icons -->
            <div class="right-icons">
                <a href="dosen/profile" class="profile-link">
                    <span class="admin-name">Nama Dosen</span>
                    <i class="bi bi-person-fill"></i>
                </a>
                <a href="dosen/notifikasi-rps" class="notif">
                    <i class="bi bi-bell-fill"></i>
                </a>
            </div>
        </div>

        <div class="main-content">
            <!-- Administrator Info Container -->

            <header class="main-header">
                <h1 class="h4">Home / Dashboard Dosen</h1>
            </header>

            <!-- Dashboard Cards -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- Unggah RPS -->
                    <div class="col-md-3">
                        <a href="dosen/unggah-rps" class="custom-card-link">
                            <div class="custom-card">
                                <i class="bi bi-file-earmark-arrow-up-fill card-icon"></i>
                                <div class="card-header">
                                    <span class="card-name">RPS</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Status BAP -->
                    <div class="col-md-3">
                        <a href="dosen/isi-bap" class="custom-card-link">
                            <div class="custom-card">
                                <i class="bi bi-file-earmark-pdf-fill card-icon"></i>
                                <div class="card-header">
                                    <span class="card-name">BAP</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Feedback RPS -->
                    <div class="col-md-3">
                        <a href="dosen/feedback" class="custom-card-link">
                            <div class="custom-card bg-icon-feedback-box">
                                <div class="card-header">
                                    <span class="card-name">Feedback RPS</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Notifikasi -->
                    <div class="col-md-3">
                        <a href="dosen/notifikasi-rps" class="custom-card-link">
                            <div class="custom-card">
                                <i class="bi bi-bell-fill card-icon"></i>
                                <div class="card-header">
                                    <span class="card-name">Notifikasi</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Fakultas Teknik. All rights reserved.</p>
    </footer>

    <script src="/js/dosen.js"></script>

    <!-- Scripts for Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>