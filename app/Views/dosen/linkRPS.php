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
            <a href="/dosen" class="menu-item active">
                <i class="bi bi-speedometer2"></i><span>Halaman Utama</span>
            </a>\

            <a href="/dosen" class="menu-item" id="menuRPS">
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
            <header class="main-header">
                <h1 class="h4">Home / Upload RPS</h1>
            </header>

            <div class="container mt-5">
                <div class="card mx-auto" style="max-width: 600px;">
                    <div class="card-body">
                        <h2 class="text-start">Upload Rencana Pembelajaran Semester</h2>
                        <!-- Single form -->
                        <form id="uploadForm" action="dosen/simpan_rps" method="post" enctype="multipart/form-data">
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
                                <label for="tahun" class="form-label">Tahun Ajaran</label>
                                <input type="text" class="form-control" id="tahun" required>
                            </div>
                            <div class="mb-3">
                                <label for="semester" class="form-label">Semester</label>
                                <input type="text" class="form-control" id="semester" required>
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
                                <a href="dosen" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk mendapatkan parameter query dari URL
        function dapatkanParameterQuery() {
            const params = new URLSearchParams(window.location.search);
            return {
                mataKuliah: params.get('mata_kuliah') || '',
                kode: params.get('kode') || '',
                prodi: params.get('prodi') || '',
                tahunAjaran: params.get('tahun_ajaran') || '',
                semester: params.get('semester') || '',
                kelas: params.get('kelas') || ''
            };
        }

        // Fungsi untuk memvalidasi input RPS
        function validasiInputRPS() {
            // Ambil nilai input
            const tahun = document.getElementById('tahun').value.trim();
            const semester = document.getElementById('semester').value.trim();
            const rpsLink = document.getElementById('rpsLink').value.trim();

            // Array untuk menyimpan pesan kesalahan
            const errors = [];

            // Validasi tahun ajaran
            if (!tahun) {
                errors.push('Tahun ajaran harus diisi');
            } else if (!/^\d{4}\/\d{4}$/.test(tahun)) {
                errors.push('Format tahun ajaran harus dalam format YYYY/YYYY');
            }

            // Validasi semester
            if (!semester) {
                errors.push('Semester harus diisi');
            } else if (!['Ganjil', 'Genap'].includes(semester)) {
                errors.push('Semester harus Ganjil atau Genap');
            }

            // Validasi link RPS
            if (!rpsLink) {
                errors.push('Link RPS harus diisi');
            } else {
                // Validasi URL dengan regex sederhana
                const urlPattern = new RegExp('^(https?:\\/\\/)?' + // protokol
                    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
                    '((\\d{1,3}\\.){3}\\d{1,3}))' + // atau ip (v4) address
                    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
                    '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
                    '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator

                if (!urlPattern.test(rpsLink)) {
                    errors.push('Format URL tidak valid');
                }
            }

            return errors;
        }

        // Event listener saat DOM sudah dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Dapatkan parameter dari URL
            const {
                mataKuliah,
                kode,
                prodi,
                tahunAjaran,
                semester,
                kelas
            } = dapatkanParameterQuery();

            // Isi input form secara otomatis
            document.getElementById('mataKuliah').value = mataKuliah;
            document.getElementById('kode').value = kode;
            document.getElementById('prodi').value = prodi;
            document.getElementById('tahun').value = tahunAjaran;
            document.getElementById('semester').value = semester;
            document.getElementById('kelas').value = kelas;

            // Tambahkan event listener untuk form submission
            document.getElementById('uploadForm').addEventListener('submit', function(event) {
                // Cegah form submit otomatis
                event.preventDefault();

                // Jalankan validasi
                const errors = validasiInputRPS();

                // Periksa apakah ada kesalahan
                if (errors.length > 0) {
                    // Tampilkan pesan kesalahan
                    const errorContainer = document.createElement('div');
                    errorContainer.classList.add('alert', 'alert-danger');
                    errorContainer.innerHTML = '<ul>' +
                        errors.map(error => `<li>${error}</li>`).join('') +
                        '</ul>';

                    // Sisipkan pesan kesalahan sebelum form
                    const form = document.getElementById('uploadForm');
                    form.insertBefore(errorContainer, form.firstChild);

                    return;
                }

                // Siapkan data untuk dikirim
                const formData = {
                    mata_kuliah: document.getElementById('mataKuliah').value,
                    kode: document.getElementById('kode').value,
                    prodi: document.getElementById('prodi').value,
                    kelas: document.getElementById('kelas').value,
                    tahun_ajaran: document.getElementById('tahun').value,
                    semester: document.getElementById('semester').value,
                    rps_link: document.getElementById('rpsLink').value,
                    tanggal_upload: new Date().toISOString().split('T')[0] // Format YYYY-MM-DD
                };

                // Kirim data menggunakan fetch API
                fetch('/dosen/simpan_rps', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            // Tambahkan CSRF token jika digunakan
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                        },
                        body: JSON.stringify(formData)
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Gagal mengunggah RPS');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Tampilkan pesan sukses
                        alert('RPS berhasil diunggah');
                        // Redirect ke halaman daftar upload
                        window.location.href = '/dosen/daftar_upload';
                    })
                    .catch(error => {
                        // Tampilkan pesan kesalahan
                        const errorContainer = document.createElement('div');
                        errorContainer.classList.add('alert', 'alert-danger');
                        errorContainer.textContent = error.message;

                        const form = document.getElementById('uploadForm');
                        form.insertBefore(errorContainer, form.firstChild);
                    });
            });

            // Tambahkan event listener untuk sidebar
            const menuRPS = document.getElementById('menuRPS');
            const unggahRpsMenu = document.getElementById('unggahRpsMenu');
            const daftarUploadRpsMenu = document.getElementById('daftarUploadRpsMenu');

            menuRPS.addEventListener('click', function() {
                // Toggle submenu RPS
                const submenuRPS = document.querySelectorAll('.submenu-item');
                submenuRPS.forEach(submenu => {
                    submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
                });
            });
        });
    </script>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Fakultas Teknik. All rights reserved.</p>
    </footer>

    <script src="dosen.js"></script>
    <!-- Scripts for Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>