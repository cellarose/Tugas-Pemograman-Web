<div class="border-bottom d-flex justify-content-between py-3">
    <h4>Kategori</h4>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus"></i> Tambah Kategori
    </button>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="modul/kategori/proses.php?aksi=tambah" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="namakategori">Nama Kategori</label>
                        <input class="form-control" type="text" name="namakategori" placeholder="Masukkan nama kategori" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="" selected disabled>Pilih Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<table id="myTable" class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql_kategori = "SELECT * FROM kategori ORDER BY id_kategori ASC";
        $result_kategori = $mysqli->query($sql_kategori);
        $no = 0;

        while ($kategori = $result_kategori->fetch_assoc()) {
            $no++;
        ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $kategori['nama_kategori']; ?></td>
                <td>
                    <span class="badge <?= $kategori['status'] == 1 ? 'text-bg-success' : 'text-bg-danger'; ?>">
                        <?= $kategori['status'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?>
                    </span>
                </td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $kategori['id_kategori']; ?>" class="text-info">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <div class="modal fade" id="modalEdit<?= $kategori['id_kategori']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Kategori</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="modul/kategori/proses.php?aksi=edit&id=<?= $kategori['id_kategori']; ?>" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="namakategori">Nama Kategori</label>
                                            <input 
                                                class="form-control" 
                                                type="text" 
                                                name="namakategori" 
                                                placeholder="Masukkan nama kategori" 
                                                required
                                                value="<?= $kategori['nama_kategori']; ?>"
                                            >
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="status">Status</label>
                                            <select class="form-select" name="status" required>
                                                <option value="" selected disabled>Pilih Status</option>
                                                <option value="1">Aktif</option>
                                                <option value="0">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $kategori['id_kategori']; ?>" class="text-danger">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                    <div class="modal fade" id="modalHapus<?= $kategori['id_kategori']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Kategori</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus data kategori <strong><?= $kategori['nama_kategori']; ?></strong>?
                                </div>
                                <div class="modal-footer">
                                    <form action="modul/kategori/proses.php?aksi=hapus&id=<?= $kategori['id_kategori']; ?>" method="POST">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>