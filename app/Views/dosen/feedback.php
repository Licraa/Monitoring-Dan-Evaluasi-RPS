<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback RPS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/feedback.css">
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
                <h1 class="h4">Home / Feedback RPS</h1>
            </header>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="input-group">
                    <select class="form-select" aria-label="Select Mata Kuliah">
                        <option selected>Kalkulus</option>
                        <option value="1">Matematika Diskrit</option>
                        <option value="2">Aljabar</option>
                        <option value="3">Sistem Basis Data</option>
                    </select>
                    <select class="form-select" aria-label="Select Semester">
                        <option selected>GENAP</option>
                        <option value="1">GANJIL</option>
                    </select>
                    <select class="form-select" aria-label="Select Academic Year">
                        <option selected>2022/2023</option>
                        <option value="1">2023/2024</option>
                        <option value="2">2024/2025</option>
                    </select>
                    <button class="btn btn-outline-secondary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <!-- Dashboard Cards -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- Feedback RPS -->
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Unsur RPS</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Nama program studi</td>
                                        <td><span class="status selesai">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Nama mata kuliah</td>
                                        <td><span class="status selesai">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kode mata kuliah</td>
                                        <td><span class="status selesai">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Semester</td>
                                        <td><span class="status selesai">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>SKS</td>
                                        <td><span class="status selesai">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Nama dosen pengampu</td>
                                        <td><span class="status selesai">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Kemampuan akhir yang direncanakan</td>
                                        <td><span class="status selesai">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Bahan kajian yang terkait</td>
                                        <td><span class="status selesai">Selesai</span></td>
                                    </tr>
                                <tbody id="unsurRpsTable1">
                                    <tr data-id="1">
                                        <td>9</td>
                                        <td>Metode pembelajaran</td>
                                        <td><span class="status revisi icon-revisi">Revisi</span></td>
                                    </tr>
                                </tbody>
                                <tr>
                                    <td>10</td>
                                    <td>Waktu yang disediakan</td>
                                    <td><span class="status selesai">Selesai</span></td>
                                </tr>
                                <tbody id="unsurRpsTable2">
                                    <tr data-id="2">
                                        <td>11</td>
                                        <td>Pengalaman belajar mahasiswa</td>
                                        <td><span class="status revisi icon-revisi">Revisi</span></td>
                                    </tr>
                                </tbody>
                                <tr>
                                    <td>12</td>
                                    <td>Kriteria</td>
                                    <td><span class="status selesai">Selesai</span></td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Indikator</td>
                                    <td><span class="status selesai">Selesai</span></td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Bobot penilaian</td>
                                    <td><span class="status selesai">Selesai</span></td>
                                </tr>
                                <tbody id="unsurRpsTable3">
                                    <tr data-id="3">
                                        <td>15</td>
                                        <td>Daftar referensi yang digunakan</td>
                                        <td><span class="status revisi icon-revisi">Revisi</span></td>
                                    </tr>
                                </tbody>
                                </tbody>
                            </table>

                            <div id="komentarContainer" style="display: none;">
                                <h5>
                                    Komentar Revisi
                                    <span id="unsurRpsName" style="background-color: rgb(255, 230, 0); color: black; padding: 0 5px; border-radius: 6px;"></span>
                                </h5>
                                <table class="table table-bordered" id="komentarTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Temuan</th>
                                            <th>Akar Masalah</th>
                                            <th>Tindak Lanjut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Konten diisi dinamis menggunakan JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
        document.addEventListener("DOMContentLoaded", () => {
            const unsurRpsTable = document.querySelector("table");
            const komentarContainer = document.getElementById("komentarContainer");
            const komentarTableBody = document.querySelector("#komentarTable tbody");
            const komentarTitle = document.querySelector("#komentarContainer h5");

            // Data Komentar
            const komentarData = {
                "1": [{
                    no: 1,
                    temuan: "Metode pembelajaran kurang variatif",
                    akarMasalah: "Belum ada pembaruan metode pembelajaran",
                    tindakLanjut: "Meningkatkan variasi metode pembelajaran",
                }, ],
                "2": [{
                    no: 1,
                    temuan: "Pengalaman belajar kurang interaktif",
                    akarMasalah: "Kurangnya aktivitas diskusi",
                    tindakLanjut: "Menambahkan kegiatan diskusi kelompok",
                }, ],
                "3": [{
                    no: 1,
                    temuan: "Referensi kurang relevan dengan standar terbaru",
                    akarMasalah: "Belum memperbarui daftar referensi",
                    tindakLanjut: "Menambahkan referensi baru",
                }, ],
            };

            // Event Listener for RPS Element Table Row
            unsurRpsTable.addEventListener("click", (event) => {
                const row = event.target.closest("tr");
                if (!row || !row.dataset.id) return;

                const revisiId = row.dataset.id;
                const unsurName = row.cells[1].textContent; // Get the RPS element name

                // Update the Unsur RPS name in the header
                unsurRpsName.textContent = unsurName;

                // Fill the komentar table with relevant data
                komentarTableBody.innerHTML = komentarData[revisiId]
                    .map(
                        (komentar) => `
                        <tr>
                            <td>${komentar.no}</td>
                            <td>${komentar.temuan}</td>
                            <td>${komentar.akarMasalah}</td>
                            <td>${komentar.tindakLanjut}</td>
                        </tr>
                    `
                    )
                    .join("");

                // Show the komentar container
                komentarContainer.style.display = "block";
            });
        });
    </script>

    <script src="/js/dosen.js"></script>

    <!-- Scripts for Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>