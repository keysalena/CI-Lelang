<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm"></i> Tambah Lelang</button>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Lelang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="lelang" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA BARANG</th>
                            <th>TANGGAL LELANG</th>
                            <th>HARGA AKHIR</th>
                            <th>PEMENANG</th>
                            <th>PETUGAS</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($lelang as $item) :
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo isset($item->nama_barang) ? $item->nama_barang : ''; ?></td>
                                <td><?php echo isset($item->tgl_lelang) ? $item->tgl_lelang : ''; ?></td>
                                <td><?php echo isset($item->harga_akhir) ? "Rp " . number_format($item->harga_akhir, 0, ",", ".") : ''; ?></td>
                                <td><?php echo isset($item->nama_lengkap) ? $item->nama_lengkap : ''; ?></td>
                                <td><?php echo isset($item->nama_petugas) ? $item->nama_petugas : ''; ?></td>
                                <td><?php echo isset($item->status) ? $item->status : ''; ?></td>
                            </tr>
                    </tbody>
                <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var $j = jQuery.noConflict();
    $j(document).ready(function() {
        $j('#lelang').DataTable();
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
                <form action="<?php echo base_url('admin/data_lelang/tambah'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-grop mb-3">
                        <select name="id_barang" class="form-control">
                            <option disabled selected>-Pilih Barang-</option>
                            <?php foreach ($barang as $item) : ?>
                                <option value="<?php echo $item->id_barang ?>"><?php echo $item->nama_barang ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Masukkan Tanggal" required>
                    </div>
                    <input type="hidden" class="form-control" name="id_petugas" id="name" value="<?php echo $this->session->userdata('id_petugas') ?>" required>
                    <input type="hidden" class="form-control" name="status" id="name" value="dibuka" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>