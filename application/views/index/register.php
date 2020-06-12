<body class="bg-gradient-primary">
    <?= $this->session->flashdata("msg") ?>
    <?= validation_errors(); ?>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tambahkan Akun!</h1>
                            </div>
                            <form action="<?= base_url("user/register") ?>" method="post">
                                <div class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" value="<?php echo set_value('nama'); ?>" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" placeholder="Alamat E-Mail" value="<?php echo set_value('email'); ?>" name="email">
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select" id="inputGroupSelect01" name="lv">
                                            <option selected disabled>Pilih Hak Akses</option>
                                            <option value="1">Super Admin</option>
                                            <option value="2">PND</option>
                                            <option value="3">Instruktur</option>
                                            <option value="4">Operation</option>
                                            <option value="5">Keuangan</option>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" placeholder="Password" name="pass">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" placeholder="Repeat Password" name="pass2">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Daftarkan
                                    </button>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#back" onclick="window.history.go(-1)">
                                    Batal Daftar Akun</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>