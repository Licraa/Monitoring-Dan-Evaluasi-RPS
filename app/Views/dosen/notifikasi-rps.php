<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="dosen.css">
    <link rel="stylesheet" href="notifikasi.css">
</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
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
                    </a>\

                    <a href="/dosen/menurps" class="menu-item" id="menuRPS">
                        <i class="bi bi-file-earmark-arrow-up-fill"></i><span>RPS</span>
                        <i class="bi bi-chevron-left chevron-icon float-end"></i>
                    </a>

                    <a href="/dosen/unggah-rps" class="menu-item submenu-item" id="unggahRpsMenu" style="display: none;"><span>Unggah RPS</span></a>
                    <a href="dosen/daftar_upload" class="menu-item submenu-item" id="daftarUploadRpsMenu" style="display: none;"><span>Daftar Upload RPS</span></a>
                    <a href="#" class="menu-item" id="menuBAP">
                        <i class="bi bi-file-earmark-pdf-fill"></i><span>BAP</span>
                        <i class="bi bi-chevron-left chevron-icon float-end"></i>
                    </a>

                    <a href="/dosen/isi-bap" class="menu-item submenu-item" id="isiBapMenu" style="display: none;"><span>Isi BAP</span></a>
                    <a href="#" class="menu-item submenu-item" id="daftarBapMenu" style="display: none;"><span>Daftar BAP</span></a>
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
                        <a href="profile.html" class="profile-link">
                            <span class="admin-name">Nama Dosen</span>
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <a href="notifikasi-rps.html" class="notif">
                            <i class="bi bi-bell-fill"></i>
                        </a>
                    </div>
                </div>

                <div class="main-content">
                    <!-- Administrator Info Container -->

                    <header class="main-header">
                        <h1 class="h4">Home / Notifikasi</h1>
                    </header>

                    <!-- Notification List -->
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Notifikasi</h2>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item notification unread">
                                        <input type="checkbox" class="form-check-input select-notif">
                                        <a href="feedback.html" class="notification-link">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold sender-name">GPM</div>
                                                <div>Kalkulus - RPS belum mengandung capaian pembelajaran yang sesuai dengan standar KKNI</div>
                                                <span class="badge bg-danger">Belum Ditindaklanjuti</span>
                                            </div>
                                            <small class="time" data-time="2024-11-11T08:05:00Z"></small>
                                        </a>
                                    </li>
                                    <li class="list-group-item notification unread">
                                        <input type="checkbox" class="form-check-input select-notif">
                                        <a href="feedback.html" class="notification-link">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold sender-name">Kajur</div>
                                                <div>Kalkulus - Bahan ajar belum lengkap dan tidak mencakup referensi terbaru</div>
                                                <span class="badge bg-warning text-dark">Sedang Revisi</span>
                                            </div>
                                            <small class="time" data-time="2024-11-10T08:00:00Z"></small>
                                        </a>
                                    </li>
                                    <li class="list-group-item notification unread">
                                        <input type="checkbox" class="form-check-input select-notif">
                                        <a href="feedback.html" class="notification-link">
                                            <div class="ms-2 me-auto">
                                                <div class="sender-name">GPM</div>
                                                <div>Kalkulus - Evaluasi pembelajaran kurang mencakup aspek keterampilan praktis</div>
                                                <span class="badge bg-success">Selesai</span>
                                            </div>
                                            <small class="time" data-time="2024-11-09T08:00:00Z"></small>
                                        </a>
                                    </li>
                                </ul>
                                <button id="deleteSelected" class="bi bi-trash3-fill btn-red">Hapus yang Dipilih</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer">
                <p>&copy; 2024 Fakultas Teknik. All rights reserved.</p>
            </footer>

            <script>
                // Convert timestamps to "time ago" format
                function updateTimeAgo() {
                    document.querySelectorAll('.time').forEach(element => {
                        const timeString = element.getAttribute('data-time');
                        const time = new Date(timeString);
                        const now = new Date();
                        const diffInSeconds = Math.floor((now - time) / 1000);
                        let timeAgo = "";

                        if (diffInSeconds < 60) {
                            timeAgo = "Just now";
                        } else if (diffInSeconds < 3600) {
                            const minutes = Math.floor(diffInSeconds / 60);
                            timeAgo = `${minutes} minutes ago`;
                        } else if (diffInSeconds < 86400) {
                            const hours = Math.floor(diffInSeconds / 3600);
                            timeAgo = `${hours} hours ago`;
                        } else {
                            const days = Math.floor(diffInSeconds / 86400);
                            timeAgo = `${days} days ago`;
                        }

                        element.textContent = timeAgo;
                    });
                }

                updateTimeAgo();
                setInterval(updateTimeAgo, 60000); // Update every minute

                // Handle marking notifications as read when link is clicked
                document.querySelectorAll('.notification-link').forEach(link => {
                    link.addEventListener('click', function() {
                        const notificationItem = this.closest('.notification');
                        notificationItem.classList.remove('unread');
                        notificationItem.classList.add('read');
                        // Optionally, you can remove the bold styling immediately
                        // or handle it with CSS based on classes
                    });
                });

                // Handle selecting notifications for deletion
                document.querySelectorAll('.select-notif').forEach(checkbox => {
                    checkbox.addEventListener('change', function(event) {
                        const notificationItem = this.closest('.notification');
                        if (this.checked) {
                            notificationItem.classList.add('selected');
                        } else {
                            notificationItem.classList.remove('selected');
                        }
                    });
                });

                // Optional: Handle delete button click
                document.getElementById('deleteSelected').addEventListener('click', function() {
                    const selectedNotifications = document.querySelectorAll('.notification.selected');
                    selectedNotifications.forEach(notif => notif.remove());
                });
            </script>

            <script src="dosen.js"></script>

            <!-- Scripts for Bootstrap -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>