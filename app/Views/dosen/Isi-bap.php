<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/dosen.css">
    <link rel="stylesheet" href="/css/BAP.css">
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
            <a href="Isi-bap.html" class="menu-item active">
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
            <!-- Administrator Info Container -->

            <header class="main-header">
                <h1 class="h4">Home / BAP</h1>
            </header>

            <!-- Dashboard Cards -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- Unggah RPS -->
                    <div class="bap-form-container">
                        <h2>Isi BAP (Berita Acara Perkuliahan)</h2>
                        <form>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" id="tanggal" name="tanggal" required>
                            </div>

                            <div class="form-group">
                                <label for="mata-kuliah">Mata Kuliah</label>
                                <select id="mata-kuliah" name="mata-kuliah" required>
                                    <option value="">Pilih Mata Kuliah</option>
                                    <option value="kalkulus">Kalkulus</option>
                                    <option value="fisika">Fisika</option>
                                    <!-- Tambahkan mata kuliah lainnya di sini -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="topik">Kode Mata Kuliah</label>
                                <input type="text" id="kodeMK" name="kodeMK" placeholder="Masukkan kode mata kuliah" required>
                            </div>

                            <div class="form-group">
                                <label for="topik">Tempat</label>
                                <input type="text" id="tempat" name="tempat" placeholder="Masukkan nama tempat" required>
                            </div>

                            <div class="form-group">
                                <label for="materi">Catatan Review</label>
                                <div id="catatanReviewContainer">
                                    <div class="line-item">
                                        <span class="line-number">1.</span>
                                        <input type="text" class="line-input" placeholder="Masukkan catatan..." />
                                    </div>
                                    <div class="line-item">
                                        <span class="line-number">2.</span>
                                        <input type="text" class="line-input" placeholder="Masukkan catatan..." />
                                    </div>
                                    <div class="line-item">
                                        <span class="line-number">3.</span>
                                        <input type="text" class="line-input" placeholder="Masukkan catatan..." />
                                    </div>
                                </div>
                            </div>

                            <div class="button-group">
                                <button type="submit" class="save-btn">Simpan BAP</button>
                                <button type="button" id="downloadPdf" class="submit-btn">Download PDF</button>
                            </div>
                        </form>
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

    <!-- jsPDF library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

    <script>
        document.getElementById('downloadPdf').addEventListener('click', function() {
            // Ambil nilai dari form
            const tanggal = document.getElementById('tanggal').value;
            const mataKuliah = document.getElementById('mata-kuliah').value;
            const kodeMK = document.getElementById('kodeMK').value;
            const tempat = document.getElementById('tempat').value;

            // Fungsi untuk mengonversi tanggal menjadi hari
            function getDayName(dateString) {
                const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                const date = new Date(dateString);
                return days[date.getDay()];
            }

            // Mendapatkan hari dari tanggal
            const hari = getDayName(tanggal);

            // Ambil semua catatan review dari input dalam catatanReviewContainer
            const catatanReviewElements = document.querySelectorAll('#catatanReviewContainer .line-input');
            const catatanReview = Array.from(catatanReviewElements).map((input, index) => [
                index + 1,
                input.value
            ]);

            // Buat PDF
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Tambahkan gambar logo di sudut kiri atas
            const logoImg = new Image();
            logoImg.src = 'LOGO_UMRAH_PNG.png'; // Pastikan path sesuai
            logoImg.onload = function() {
                doc.addImage(logoImg, 'PNG', 12, 11, 35, 35);

                // Tambahkan judul dan informasi lainnya
                doc.setFontSize(14);
                doc.setFont("Times New Roman");
                doc.text("KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,", 65, 16);
                doc.text("RISET, DAN TEKNOLOGI", 88, 23);
                doc.text("UNIVERSITAS MARITIM RAJA ALI HAJI", 77, 31);

                doc.setFontSize(14);
                doc.setFont("Times New Roman", "bold");
                doc.text("FAKULTAS TEKNIK DAN TEKNOLOGI KEMARITIMAN", 60, 39);

                doc.setFontSize(10);
                doc.setFont("Times New Roman", "normal");
                doc.text("Jalan Politeknik Senggarang Telp. (0771) 4500097; Fax. (0771) 4500097", 69, 42);
                doc.text("PO.BOX 155 – Tanjungpinang 29100", 92, 46);
                doc.text("Website :http://fttk.umrah.ac.id/ e-mail : teknik@umrah.ac.id", 72, 50);

                // Tambahkan garis hitam
                doc.setDrawColor(0);
                doc.setLineWidth(0.8);
                doc.line(12, 52, 200, 52);

                doc.setFont("Times New Roman", "bold");
                doc.setFontSize(12);
                doc.text("BERITA ACARA", 92, 65);
                doc.text("REVIEW RENCANA PEMBELAJARAN SEMESTER (RPS)", 50, 71);

                // Informasi form
                doc.setFont("Times New Roman", "normal");
                doc.setFontSize(10);
                doc.text(`Hari/tanggal  : ${hari} / ${tanggal}`, 20, 85);
                doc.text(`Tempat        : ${tempat}`, 20, 90);
                doc.text(`Nama MK / Kode MK : ${mataKuliah} / ${kodeMK}`, 20, 95);
                doc.text("Catatan review", 20, 103);

                // Membuat tabel catatan review menggunakan autoTable
                doc.autoTable({
                    startY: 110, // Posisi awal tabel
                    head: [
                        ['No', 'Catatan Review']
                    ],
                    body: catatanReview,
                    styles: {
                        halign: 'left',
                        valign: 'middle',
                        fontSize: 10,
                        lineWidth: 0.5,
                        lineColor: [0, 0, 0]
                    },
                    headStyles: {
                        fillColor: [255, 255, 255],
                        textColor: [0, 0, 0]
                    },
                    columnStyles: {
                        0: {
                            cellWidth: 10
                        },
                        1: {
                            cellWidth: 170
                        }
                    }
                });

                // Unduh PDF
                doc.save("BAP_Review_RPS.pdf");
            };
        });


        const catatanReviewContainer = document.getElementById('catatanReviewContainer');

        function addNewLine() {
            const lineItems = catatanReviewContainer.getElementsByClassName('line-item');
            const newIndex = lineItems.length + 1; // Get the next line number

            // Create new line item
            const newLineItem = document.createElement('div');
            newLineItem.classList.add('line-item');
            newLineItem.innerHTML = `
                <span class="line-number">${newIndex}.</span>
                <input type="text" class="line-input" placeholder="Masukkan catatan..." />
            `;

            // Append new line item to container
            catatanReviewContainer.appendChild(newLineItem);

            // Focus on the new input
            const newInput = newLineItem.querySelector('.line-input');
            newInput.focus();

            // Add event listener to the new input
            newInput.addEventListener('keypress', handleEnterKey);
        }

        // Event listener for Enter key
        function handleEnterKey(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                addNewLine();
            }
        }

        // Add the initial event listeners
        document.querySelectorAll('.line-input').forEach(input => {
            input.addEventListener('keypress', handleEnterKey);
        });
    </script>

</body>

</html>