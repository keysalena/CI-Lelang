<div class="container">

    <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <?php if (empty($this->session->userdata('level'))) { ?>
                            <form class="user" action="<?php echo base_url('Registrasi/index') ?>" method="post">
                            <?php } else { ?>
                                <form class="user" action="<?php echo base_url('Registrasi/petugas') ?>" method="post">
                                <?php }
                                ?>
                                <form class="user" action="<?php echo base_url('Registrasi/index') ?>" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="nama" placeholder="Masukkan Nama">
                                            <?php echo form_error('nama', '<div class="text-danger small ml-2">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" placeholder="Masukkan Username">
                                        <?php echo form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>
                                    </div>
                                    <?php if (empty($this->session->userdata('level'))) { ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="telp" placeholder="Masukkan Telepon">
                                            <?php echo form_error('telp', '<div class="text-danger small ml-2">', '</div>'); ?>
                                        </div>
                                    <?php } else { ?>
                                        <div class="form-group">
                                            <select name="level" class="form-control">
                                                <option selected disabled>-Level-</option>
                                                <option value="petugas">Petugas</option>
                                                <option value="admin">Administrator</option>
                                            </select>
                                        </div>
                                    <?php  } ?>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                            <?php echo form_error('password', '<div class="text-danger small ml-2">', '</div>'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Ulang Password" name="password_2">
                                            <?php echo form_error('password_2', '<div class="text-danger small ml-2">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register
                                    </button>
                                </form> <!-- Corrected closing tag -->
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?php echo base_url('auth/login') ?>">Sudah Punya Akun? Login 123!</a>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>