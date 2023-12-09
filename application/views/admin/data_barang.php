<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="barang" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA BARANG</th>
                            <th>TANGGAL</th>
                            <th>HARGA AWAL</th>
                            <th>DESKRIPSI</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barang as $brg) :
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $brg->nama_barang; ?></td>
                                <td><?php echo $brg->tgl; ?></td>
                                <td><?php echo "Rp " . number_format($brg->harga_awal, 0, ",", "."); ?></td>
                                <td><?php echo $brg->deskripsi_barang; ?></td>
                                <td><?php echo $brg->status_barang; ?></td>
                                <td>
                                    <?php echo anchor('admin/dashboard_admin/detail/' . $brg->id_barang, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>'); ?>
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $brg->id_barang; ?>"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?php echo $brg->id_barang; ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        var $j = jQuery.noConflict();
        $j(document).ready(function() {
            $j('#barang').DataTable();
        });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/data_barang/tambah_aksi'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Harga Awal</label>
                            <input type="number" class="form-control" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Gambar</label>
                            <input type="file" class="form-control" name="gambar" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Edit Modal -->
    <?php foreach ($barang as $brg) : ?>
        <div class="modal fade" id="editModal<?php echo $brg->id_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('admin/data_barang/edit_aksi/' . $brg->id_barang); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama Barang</label>
                                <input type="hidden" class="form-control" name="id_barang" value="<?php echo $brg->id_barang; ?>">
                                <input type="text" class="form-control" name="nama_barang" value="<?php echo $brg->nama_barang; ?>">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Tanggal</label>
                                <input type="text" class="form-control" name="tanggal" value="<?php echo $brg->tgl; ?>">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Awal</label>
                                <input type="number" class="form-control" name="harga" value="<?php echo $brg->harga_awal; ?>">
                            </div>
                            <div class="form-group">
                                <label for="stok">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" value="<?php echo $brg->deskripsi_barang; ?>">
                            </div>
                            <div class="form-group">
                                <label for="stok">Status</label>
                                <input type="text" class="form-control" name="status" value="<?php echo $brg->status_barang; ?>">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hapus Modal -->
        <div class="modal fade" id="hapusModal<?php echo $brg->id_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus <?php echo $brg->nama_barang ?>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="<?php echo base_url('admin/data_barang/hapus_aksi/' . $brg->id_barang); ?>" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>