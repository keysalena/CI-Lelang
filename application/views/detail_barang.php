<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Produk</h6>
        </div>
        <?php foreach ($barang as $brg) : ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img class="card-img-top" src="<?php echo base_url() . '/uploads/' . $brg->gambar ?>">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Nama Barang</td>
                                <td><strong><?php echo $brg->nama_barang ?></strong></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td><strong><?php echo $brg->deskripsi_barang ?></strong></td>
                            </tr>
                            <tr>
                                <?php if ($brg->status == 'dibuka') { ?>
                                    <td>Harga Awal</td>
                                    <td>
                                        <div class="btn btn-success">
                                            <?php echo "Rp " . number_format($brg->harga_awal, 0, ",", "."); ?>
                                        </div>
                                    </td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td>Harga Akhir</td>
                                <td>
                                    <div class="btn btn-danger">
                                        <?php echo "Rp " . number_format($brg->harga_awal, 0, ",", "."); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pemenang</td>
                                <td><strong>
                                        <?php echo $brg->nama_lengkap; ?>
                                    </strong></td>
                            </tr>
                            <tr>
                                <td>status</td>
                                <td><strong>
                                        <?php
                                        echo $brg->status;
                                        ?>
                                    </strong></td>
                            </tr>
                        <?php } ?>
                        </table>

                        <?php if ($this->session->userdata('id_user') && ($brg->status == 'dibuka')) { ?>
                            <form action="<?php echo base_url() ?>dashboard/tawar" method="post">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="penawaran" min="<?php echo $brg->harga_awal ?>" required>
                                    <input type="hidden" name="id_barang" value="<?php echo $brg->id_barang ?>">
                                    <input type="hidden" name="id_lelang" value="<?php echo $brg->id_lelang ?>">
                                    <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>"><br>
                                </div>
                                <button type="submit" class="btn btn-primary">Tawar</button>
                            </form>
                        <?php } ?>

                        <div style="display: flex; justify-content: flex-end; align-items: flex-end; height: 19vh;">
                            <div class="mb-3">
                                <button class="btn btn-danger" type="button" onclick="window.location.href='<?php echo site_url('dashboard/index'); ?>'">
                                    <i class="fas fa-backward fa-sm"></i> Kembali
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<?php endforeach; ?>