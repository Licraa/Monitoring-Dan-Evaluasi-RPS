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
      </a>

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
              <?php foreach ($mata_kuliah as $mk): ?>
                <option value="<?= $mk->kode_mk ?>"><?= $mk->nama_mk ?></option>
              <?php endforeach; ?>
            </select>
            <select class="form-select" aria-label="Select Prodi">
              <option selected disabled>Pilih Prodi</option>
              <?php foreach ($prodi as $p): ?>
                <option value="<?= $p->id ?>"><?= $p->nama_jurusan ?></option>
              <?php endforeach; ?>
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
                  <?php if (!empty($rps_list)): ?>
                    <?php foreach ($rps_list as $index => $rps): ?>
                      <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= esc($rps->nama_mk) ?></td>
                        <td><?= esc($rps->kode_mk) ?></td>
                        <td><?= esc($rps->nama_jurusan) ?></td>
                        <td><?= esc($rps->kelas) ?></td>
                        <td><?= date('d-m-Y', strtotime($rps->created_at)) ?></td>
                        <td>
                          <?php if (!empty($rps->link_rps)): ?>
                            <a href="<?= esc($rps->link_rps) ?>" target="_blank">
                              <i class="bi bi-eye-fill"></i>
                            </a>
                          <?php endif; ?>
                        </td>
                        <td>
                          <i class="bi bi-pencil-square edit-icon"
                            data-id="<?= $rps->id ?>"
                            data-bs-toggle="tooltip"
                            title="Edit"
                            style="cursor: pointer;"></i>
                          <i class="bi bi-trash3-fill delete-icon"
                            data-id="<?= $rps->id ?>"
                            style="cursor: pointer; margin-left: 10px;"
                            data-bs-toggle="tooltip"
                            title="Hapus"></i>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="8" class="text-center">Tidak ada data RPS</td>
                    </tr>
                  <?php endif; ?>
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

    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="uploadModalLabel">Unggah RPS Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('dosen/simpan_rps') ?>" method="post">
            <div class="modal-body">
              <div class="mb-3">
                <label for="kode_mk" class="form-label">Mata Kuliah</label>
                <select class="form-select" id="kode_mk" name="kode_mk" required>
                  <option value="">Pilih Mata Kuliah</option>
                  <?php foreach ($mata_kuliah as $mk): ?>
                    <option value="<?= $mk->kode_mk ?>"><?= $mk->nama_mk ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="jurusan_id" class="form-label">Program Studi</label>
                <select class="form-select" id="jurusan_id" name="jurusan_id" required>
                  <option value="">Pilih Program Studi</option>
                  <?php foreach ($prodi as $p): ?>
                    <option value="<?= $p->id ?>"><?= $p->nama_jurusan ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" required>
              </div>
              <div class="mb-3">
                <label for="link_rps" class="form-label">Link RPS</label>
                <input type="url" class="form-control" id="link_rps" name="link_rps" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
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