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

      <a href="#" class="menu-item" id="menuRPS">
        <i class="bi bi-file-earmark-arrow-up-fill"></i><span>RPS</span>
        <i class="bi bi-chevron-left chevron-icon float-end"></i>
      </a>

      <a href="/dosen/unggah-rps" class="menu-item submenu-item" id="unggahRpsMenu" style="display: none;"><span>Unggah RPS</span></a>
      <a href="/dosen/daftar_upload" class="menu-item submenu-item" id="daftarUploadRpsMenu" style="display: none;"><span>Daftar Upload RPS</span></a>
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
        <h1 class="h4">Home / Daftar Upload RPS</h1>
      </header>
      <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="input-group input-group-container">
            <select class="form-select" aria-label="Select Mata Kuliah">
              <option selected disabled>Pilih Mata Kuliah</option>
              <option value="MK001">Kalkulus</option>
              <option value="MK002">Struktur Data</option>
              <option value="MK003">Basis Data</option>
              <option value="MK004">Pemrograman Web</option>
              <option value="MK004">PAA</option>
            </select>
            <select class="form-select" aria-label="Select Prodi">
              <option selected disabled>Pilih Prodi</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Teknik Elektro">Teknik Elektro</option>
              <option value="Teknik Perkapalan">Teknik Perkapalan</option>
              <option value="Kimia">Kimia</option>
              <option value="Teknik Industri">Teknik Industri</option>
            </select>
            <button class="btn btn-outline-secondary custom-btn" id="searchButton">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </div>

        <div class="container mt-5">
          <div class="table-container">
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
            <a href="unggah-rps.html" class="btn btn-primary mt-3">Unggah RPS Baru</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit RPS</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editForm">
              <div class="mb-3">
                <label for="editMataKuliah" class="form-label">Mata Kuliah</label>
                <input type="text" class="form-control" id="editMataKuliah" required>
              </div>
              <div class="mb-3">
                <label for="editKode" class="form-label">Kode Mata Kuliah</label>
                <input type="text" class="form-control" id="editKode" required>
              </div>
              <div class="mb-3">
                <label for="editProdi" class="form-label">Prodi</label>
                <select class="form-control" id="editProdi" required>
                  <option value="Teknik Informatika">Teknik Informatika</option>
                  <option value="Teknik Elektro">Teknik Elektro</option>
                  <option value="Teknik Perkapalan">Teknik Perkapalan</option>
                  <option value="Kimia">Kimia</option>
                  <option value="Teknik Industri">Teknik Industri</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="editTahunAjaran" class="form-label">Tahun Ajaran</label>
                <select class="form-control" id="editTahunAjaran" required>
                  <option value="2020/2021">2020/2021</option>
                  <option value="2021/2022">2021/2022</option>
                  <option value="2022/2023">2022/2023</option>
                  <option value="2023/2024">2023/2024</option>
                  <option value="2024/2025">2024/2025</option>
                  <option value="2025/2026">2025/2026</option>
                  <option value="2026/2027">2026/2027</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="editSemester" class="form-label">Semester</label>
                <select class="form-control" id="editSemester" required>
                  <option value="Ganjil">Ganjil</option>
                  <option value="Genap">Genap</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="editKelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="editKelas" required>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" id="saveEditBtn">Simpan Perubahan</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const rpsData = JSON.parse(localStorage.getItem('rpsData')) || [];
      const tableBody = document.getElementById('rpsListBody');
      let editingIndex;

      // Function to render table rows
      function renderTable(data) {
        tableBody.innerHTML = ''; // Clear existing rows
        data.forEach((data, index) => {
          const newRow = document.createElement('tr');
          newRow.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${data.mataKuliah}</td>
                        <td>${data.kode}</td>
                        <td>${data.prodi}</td>
                        <td>${data.kelas}</td>
                        <td>${data.tanggalUpload}</td>
                        <td><a href="${data.rpsLink}" target="_blank"><i class="bi bi-eye-fill"></i></a></td>
                        <td>
                            <i class="bi bi-pencil-square edit-icon" data-index="${index}" data-bs-toggle="tooltip" title="Edit" style="cursor: pointer;"></i>
                            <i class="bi bi-search review-icon" data-index="${index}" style="cursor: pointer; margin-left: 10px;" data-bs-toggle="tooltip" title="Feedback"></i>
                            <i class="bi bi-trash3-fill trash-icon" onclick="hapusBaris(this, ${index})" style="cursor: pointer; margin-left: 10px;" data-bs-toggle="tooltip" title="Hapus"></i>
                        </td>
                    `;
          tableBody.appendChild(newRow);
        });
      }

      // Initial render
      renderTable(rpsData);

      // Search button functionality
      document.getElementById('searchButton').addEventListener('click', function() {
        const selectedMataKuliah = document.querySelector('select[aria-label="Select Mata Kuliah"]').value;
        const selectedProdi = document.querySelector('select[aria-label="Select Prodi"]').value;

        const filteredData = rpsData.filter(data => {
          return (selectedMataKuliah === "Pilih Mata Kuliah" || data.mataKuliah === selectedMataKuliah) &&
            (selectedProdi === "Pilih Prodi" || data.prodi === selectedProdi);
        });

        if (filteredData.length === 0) {
          alert("Data tidak ditemukan");
        } else {
          renderTable(filteredData);
        }
      });

      document.querySelectorAll('.edit-icon').forEach(icon => {
        icon.addEventListener('click', function() {
          const index = this.getAttribute('data-index');
          const data = rpsData[index];
          document.getElementById('editMataKuliah').value = data.mataKuliah;
          document.getElementById('editKode').value = data.kode;
          document.getElementById('editProdi').value = data.prodi;
          document.getElementById('editTahunAjaran').value = data.tahun;
          document.getElementById('editSemester').value = data.semester;
          document.getElementById('editKelas').value = data.kelas;
          editingIndex = index; // Set the index for saving changes
          new bootstrap.Modal(document.getElementById('editModal')).show();
        });
      });

      document.getElementById('saveEditBtn').addEventListener('click', function() {
        const updatedData = {
          mataKuliah: document.getElementById('editMataKuliah').value,
          kode: document.getElementById('editKode').value,
          prodi: document.getElementById('editProdi').value,
          kelas: document.getElementById('editKelas').value,
          tahun: document.getElementById('editTahunAjaran').value,
          semester: document.getElementById('editSemester').value,
          tanggalUpload: rpsData[editingIndex].tanggalUpload, // Maintain old date
          rpsLink: rpsData[editingIndex].rpsLink, // Maintain old link
        };

        // Update data in array
        rpsData[editingIndex] = updatedData;

        // Save to Local Storage
        localStorage.setItem('rpsData', JSON.stringify(rpsData));

        // Update table row directly without reloading the page
        const row = document.querySelectorAll('#rpsListBody tr')[editingIndex];
        row.cells[1].textContent = updatedData.mataKuliah;
        row.cells[2].textContent = updatedData.kode;
        row.cells[3].textContent = updatedData.prodi;
        row.cells[4].textContent = updatedData.kelas;

        // Close modal
        const editModalElement = document.getElementById('editModal');
        const modalInstance = bootstrap.Modal.getInstance(editModalElement);
        modalInstance.hide();

        // Show success message
        alert("Perubahan berhasil tersimpan.");
      });

      window.hapusBaris = function(element, index) {
        if (confirm("Apakah Anda yakin ingin menghapus baris ini?")) {
          // Remove data from array
          rpsData.splice(index, 1);

          // Update Local Storage
          localStorage.setItem('rpsData', JSON.stringify(rpsData));

          // Remove row from DOM
          element.closest('tr').remove();
        }
      }

      document.querySelectorAll('.review-icon').forEach(icon => {
        icon.addEventListener('click', function() {
          const index = this.getAttribute('data-index');
          const data = rpsData[index];
          const queryParams = new URLSearchParams({
            mataKuliah: data.mataKuliah,
            tahun: data.tahun,
            semester: data.semester
          }).toString();
          window.location.href = `feedback.html?${queryParams}`;
        });
      });

      // Get menu elements
      const menuRPS = document.getElementById('menuRPS');
      const unggahRpsMenu = document.getElementById('unggahRpsMenu');
      const daftarUploadRpsMenu = document.getElementById('daftarUploadRpsMenu');

      // Function to toggle submenu visibility
      function toggleSubmenu() {
        const isVisible = unggahRpsMenu.style.display === 'block';
        unggahRpsMenu.style.display = isVisible ? 'none' : 'block';
        daftarUploadRpsMenu.style.display = isVisible ? 'none' : 'block';

        // Toggle chevron icon
        const chevron = menuRPS.querySelector('.chevron-icon');
        chevron.style.transform = isVisible ? 'rotate(0deg)' : 'rotate(-90deg)';
      }

      // Add click event listener to RPS menu
      menuRPS.addEventListener('click', function(e) {
        e.preventDefault();
        toggleSubmenu();
      });

      // Show submenu if current page is related to RPS
      const currentUrl = window.location.pathname;
      if (currentUrl.includes('/dosen/unggah-rps') ||
        currentUrl.includes('/dosen/daftar_upload')) {
        unggahRpsMenu.style.display = 'block';
        daftarUploadRpsMenu.style.display = 'block';
        menuRPS.querySelector('.chevron-icon').style.transform = 'rotate(-90deg)';
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