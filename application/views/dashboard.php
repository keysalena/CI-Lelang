<div class="container-fluid">
    <div class="row text-center mt-4">
        <?php foreach ($barang as $brg) : ?>

            <div class="card ml-4 mb-3" style="width: 14rem;">
                <img src="<?php echo base_url() . '/uploads/' . $brg->gambar ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?php echo $brg->nama_barang ?></h5>
                    <small><?php echo $brg->deskripsi_barang ?></small><br>
                    <?php if ($brg->status == 'dibuka') { ?>
                        <span class="custom-badge badge-pill badge-success mb-3">
                        <?php echo "Rp " . number_format($brg->harga_awal, 0, ",", ".");
                    } else { ?>
                            <span class="custom-badge badge-pill badge-danger mb-3">
                            <?php echo $brg->status;
                        } ?>
                            </span><br>
                            <?php echo anchor('dashboard/detail/' . $brg->id_barang, '<div class="btn btn-sm btn-success">Detail</div>'); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>