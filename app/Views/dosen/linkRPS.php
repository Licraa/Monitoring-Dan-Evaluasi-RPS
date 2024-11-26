<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload RPS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/unggah.css">
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
            <a href="dashboard-dosen.html" class="menu-item">
                <i class="bi bi-speedometer2"></i><span>Halaman Utama</span>
            </a>
            <a href="#" class="menu-item" id="menuRPS">
                <i class="bi bi-file-earmark-arrow-up-fill"></i><span>RPS</span>
                <i class="bi bi-chevron-left chevron-icon float-end"></i>
            </a>
            <a href="unggah-rps.html" class="menu-item submenu-item" id="unggahRpsMenu" style="display: none;"><span>Unggah RPS</span></a>
            <a href="Isi-bap.html" class="menu-item">
                <i class="bi bi-file-earmark-pdf-fill"></i><span>BAP</span>
            </a>
            <a href="feedback.html" class="menu-item">
                <img src="feedback.png" alt="Feedback Icon" class="feedback-icon"><span>Feedback RPS</span>
            </a>
            <a href="notifikasi-rps.html" class="menu-item">
                <i class="bi bi-bell-fill"></i><span>Notifikasi</span>
            </a>
            <a href="#" class="menu-item">
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
            <header class="main-header">
                <h1 class="h4">Home / Upload RPS</h1>
            </header>

            <div class="container mt-5">
                <div class="card mx-auto" style="max-width: 600px;">
                    <div class="card-body">
                        <h2 class="text-start">Upload Rencana Pembelajaran Semester</h2>
                        <!-- Single form -->
                        <form id="uploadForm" action="#" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="mataKuliah" class="form-label">Mata Kuliah</label>
                                <input type="text" class="form-control" id="mataKuliah" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode Mata Kuliah</label>
                                <input type="text" class="form-control" id="kode" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="prodi" class="form-label">Prodi</label>
                                <input type="text" class="form-control" id="prodi" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" class="form-control" id="kelas" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="rpsLink" class="form-label">Masukkan Link RPS</label>
                                <input type="url" class="form-control" id="rpsLink" placeholder="https://drive.google.com/">
                                <div class="form-text text-muted">Masukkan link yang mengarah ke file RPS dalam format PDF.</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="unggah-rps.html" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Daftar Upload RPS -->
            <div class="mt-5" id="rpsList" style="display: none;">
                <h2 class="text-center">Daftar Upload RPS</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata Kuliah</th>
                                <th>Kode Mata Kuliah</th>
                                <th>Prodi</th>
                                <th>Kelas</th>
                                <th>Tanggal Upload</th>
                                <th>Link RPS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="rpsListBody">
                            <!-- Rows will be added dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to get query parameters
        function getQueryParams() {
            const params = new URLSearchParams(window.location.search);
            return {
                mataKuliah: params.get('mataKuliah') || '',
                kode: params.get('kode') || '',
                prodi: params.get('prodi') || '',
                kelas: params.get('kelas') || ''
            };
        }

        // Populate form fields with values from query parameters
        document.addEventListener('DOMContentLoaded', function() {
            const {
                mataKuliah,
                kode,
                prodi,
                kelas
            } = getQueryParams();
            document.getElementById('mataKuliah').value = mataKuliah;
            document.getElementById('kode').value = kode;
            document.getElementById('prodi').value = prodi;
            document.getElementById('kelas').value = kelas;
        });

        // Handle form submission to add new row in Daftar Upload RPS
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Show the RPS list section
            document.getElementById('rpsList').style.display = 'block';

            // Get current date
            const today = new Date();
            const formattedDate = today.toLocaleDateString('id-ID', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            // Get values from form
            const mataKuliah = document.getElementById('mataKuliah').value;
            const kode = document.getElementById('kode').value;
            const prodi = document.getElementById('prodi').value;
            const kelas = document.getElementById('kelas').value;
            const rpsLink = document.getElementById('rpsLink').value;

            // Add a new row to the RPS table
            const tableBody = document.getElementById('rpsListBody');
            const rowCount = tableBody.rows.length + 1;
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${rowCount}</td>
                <td>${mataKuliah}</td>
                <td>${kode}</td>
                <td>${prodi}</td>
                <td>${kelas}</td>
                <td>${formattedDate}</td>
                <td><a href="${rpsLink}" target="_blank"><i class="bi bi-eye-fill"></i></a></td>
                <!-- linkRPS.html -->
                <td>
                    <a href="ReviewRPS.html?mataKuliah=${mataKuliah}&kode=${encodeURIComponent(kode)}&prodi=${encodeURIComponent(prodi)}&kelas=${encodeURIComponent(kelas)}&tanggalUpload=${encodeURIComponent(formattedDate)}&rpsLink=${encodeURIComponent(rpsLink)}" data-bs-toggle="tooltip" title="Review">
                        <span class="badge bg-success text-white">
                            <i class="bi bi-search"></i>
                        </span>
                    </a>
                </td>

            `;
            tableBody.appendChild(newRow);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const currentUrl = window.location.href;

            // Check if URL matches unggah-rps.html or related pages
            if (currentUrl.includes('unggah-rps.html') || currentUrl.includes('linkRPS.html')) {
                const unggahRpsMenu = document.getElementById('unggahRpsMenu');
                const menuRPS = document.getElementById('menuRPS');

                // Add 'active' class to highlight menu
                unggahRpsMenu.classList.add('active');
                menuRPS.classList.remove('active');

                // Ensure submenu is visible
                unggahRpsMenu.style.display = 'block';
            }
        });
    </script>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Fakultas Teknik. All rights reserved.</p>
    </footer>

    <script src="/js/dosen.js"></script>
    <!-- Scripts for Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>