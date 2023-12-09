<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Lelang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="history" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID LELANG</th>
                            <th>NAMA BARANG</th>
                            <th>NAMA LENGKAP</th>
                            <th>PENAWARAN HARGA</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($history as $brg) :
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $brg->id_lelang; ?></td>
                                <td><?php echo $brg->nama_barang; ?></td>
                                <td><?php echo $brg->nama_lengkap; ?></td>
                                <td><?php echo "Rp " . number_format($brg->penawaran_harga, 0, ",", "."); ?></td>
                                <td align="center">
                                    <?php if ($brg->status_lelang == 0) { ?>
                                        <form action="<?php echo base_url() ?>admin/history/update" method="post">
                                            <input type="hidden" name="id_history" value="<?php echo $brg->id_history ?>">
                                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-fw fa-trophy"></i></button>
                                        </form>
                                    <?php } else {
                                        echo $brg->status_lelang;
                                    } ?>
                                </td>
                            </tr>
                    </tbody>
                <?php endforeach; ?>
                </table>
                <a class="btn btn-primary" href="<?php echo base_url() ?>admin/history">Kembali</a>
            </div>
        </div>
    </div>
</div>
<script>
    var $j = jQuery.noConflict();
    $j(document).ready(function() {
        $j('#history').DataTable();
    });
</script>