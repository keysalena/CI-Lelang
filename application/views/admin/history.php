<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Belum Dipilih</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="history" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID LELANG</th>
                            <th>NAMA BARANG</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        if (is_array($history) || is_object($history)) {
                        foreach ($history as $brg) :
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $brg->id_lelang; ?></td>
                                <td><?php echo $brg->nama_barang; ?></td>
                                <td align="center">
                                    <?php echo anchor('admin/history/detail/' . $brg->id_lelang, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>'); ?>
                                </td>
                            </tr>
                            </tbody>
                <?php endforeach;}?>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var $j = jQuery.noConflict();
    $j(document).ready(function() {
        $j('#history').DataTable({
            "lengthMenu": [5, 10, 25, 50, 75, 100],  
        });
    });
</script>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sudah Dipilih</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="history1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID LELANG</th>
                            <th>NAMA BARANG</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($history1 as $brg) :
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $brg->id_lelang; ?></td>
                                <td><?php echo $brg->nama_barang; ?></td>
                                <td align="center">
                                    <?php echo anchor('admin/history/detail/' . $brg->id_lelang, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>'); ?>
                                </td>
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
        $j('#history1').DataTable({
            "lengthMenu": [5, 10, 25, 50, 75, 100],  
        });
    });
</script>