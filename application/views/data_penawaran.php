<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Lelang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="penawaran" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA BARANG</th>
                            <th>PENAWARAN HARGA</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if ($history !== false) :
                            foreach ($history as $brg) :
                        ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $brg->nama_barang; ?></td>
                                    <td><?php echo "Rp " . number_format($brg->penawaran_harga, 0, ",", "."); ?></td>
                                    <td>
                                        <?php if ($brg->status_lelang == 0) {
                                            echo 'belum diputuskan';
                                        } else {
                                            echo $brg->status_lelang;
                                        } ?>
                                    </td>
                                </tr>
                        <?php endforeach;
                        endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var $j = jQuery.noConflict();
    $j(document).ready(function() {
        $j('#penawaran').DataTable();
    });
</script>
