  <?= $this->session->flashdata("msg") ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Update Kelengkapan Data Keuangan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Update Kelengkapan Data</h6>
          </div>
          <!-- Form -->
          <br>
          <div class="col-xl-12 col-lg-7">
            <form class="namapelatihan" enctype="multipart/form-data" action="<?= base_url("user/edit_keu_core") ?>" method="post">
              <input type="hidden" class="form-control form-control-user" name="id" value="<?= $whdb['id_plth'] ?>" />
              <div class="form-group">
                <h6 class="m-0 font-weight-bold text-secondary">Nama Pelatihan</h6>
                <input type="text" class="form-control form-control-user" placeholder="Nama User" name="nama" value="<?= $whdb['nama_plth'] ?>" disabled>
              </div>
              <?php $keu = $dis->crud->select_where("keu_dmt", array("id_plth" => $this->input->get("id_pelatihan")))->row_array(); ?>
              <!-- Awal Data Akomodasi -->
              <br>
              <h5>Data Akomodasi</h5>
              <hr>

              <div class="row">
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">No. Vendor</h6>
                    <input type="number" class="form-control form-control-user" name="ako1" value="<?= $keu["ako1"] ?>">
                  </div>
                </div>
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">Nama Vendor</h6>
                    <input type="text" class="form-control form-control-user" name="ako2" value="<?= $keu["ako2"] ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">No. Invoice</h6>
                    <input type="number" class="form-control form-control-user" name="ako3" value="<?= $keu["ako3"] ?>">
                  </div>
                </div>
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">Nilai</h6>
                    <input type="number" class="form-control form-control-user" name="ako4" value="<?= $keu["ako4"] ?>">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">PO</h6>
                    <input type="number" class="form-control form-control-user" name="ako5" value="<?= $keu["ako5"] ?>">
                  </div>
                </div>
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">SSC ID / SP 3 ID</h6>
                    <input type="number" class="form-control form-control-user" name="ako6" value="<?= $keu["ako6"] ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <h6 class="m-0 font-weight-bold text-secondary">Status</h6>
                <div class="form-group">
                  <select class="form-control" name="ako7">
                    <?php if ($keu["ako7"] == "Sudah Dibayar") { ?>
                      <option value="Sudah Dibayar" selected>Sudah dibayar</option>
                      <option value="Belum Dibayar">Belum dibayar</option>
                    <?php } elseif ($keu["ako7"] == "Belum Dibayar") { ?>
                      <option value="Sudah Dibayar">Sudah dibayar</option>
                      <option value="Belum Dibayar" selected>Belum dibayar</option>
                    <?php } else { ?>
                      <option disabled selected>--- Pilih Salah Satu ---</option>
                      <option value="Sudah Dibayar">Sudah dibayar</option>
                      <option value="Belum Dibayar">Belum dibayar</option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <!-- Akhir data Akomodasi -->


              <!-- Awal Data Provider -->
              <br>
              <h5>Data Provider</h5>
              <hr>

              <div class="row">
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">No. Vendor</h6>
                    <input type="number" class="form-control form-control-user" name="pro1" value="<?= $keu["pro1"] ?>">
                  </div>
                </div>
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">Nama Vendor</h6>
                    <input type="text" class="form-control form-control-user" name="pro2" value="<?= $keu["pro2"] ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">No. Invoice</h6>
                    <input type="number" class="form-control form-control-user" name="pro3" value="<?= $keu["pro3"] ?>">
                  </div>
                </div>
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">Nilai</h6>
                    <input type="number" class="form-control form-control-user" name="pro4" value="<?= $keu["pro4"] ?>">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">PO</h6>
                    <input type="number" class="form-control form-control-user" name="pro5" value="<?= $keu["pro5"] ?>">
                  </div>
                </div>
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">SSC ID / SP 3 ID</h6>
                    <input type="number" class="form-control form-control-user" name="pro6" value="<?= $keu["pro6"] ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <h6 class="m-0 font-weight-bold text-secondary">Status</h6>
                <div class="form-group">
                  <select class="form-control" name="pro7">
                    <?php if ($keu["pro7"] == "Sudah Dibayar") { ?>
                      <option value="Sudah Dibayar" selected>Sudah dibayar</option>
                      <option value="Belum Dibayar">Belum dibayar</option>
                    <?php } elseif ($keu["pro7"] == "Belum Dibayar") { ?>
                      <option value="Sudah Dibayar">Sudah dibayar</option>
                      <option value="Belum Dibayar" selected>Belum dibayar</option>
                    <?php } else { ?>
                      <option disabled selected>--- Pilih Salah Satu ---</option>
                      <option value="Sudah Dibayar">Sudah dibayar</option>
                      <option value="Belum Dibayar">Belum dibayar</option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <!-- Akhir data Provider -->
              <?php
              $datanya = $dis->crud->select_where("ins_dmt", array("id_plth" => $this->input->get("id_pelatihan")))->row_array();
              if ($datanya["novend1_ins"] > 0) {
              ?>
                <br>
                <h5>Data Instruktur 1</h5>
                <hr>
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6>
                  <input type="number" value="<?= $datanya["novend1_ins"] ?>" class="form-control form-control-user" disabled>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6>
                      <input type="text" value="<?= $datanya["ins1_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                      <input type="number" value="<?= $datanya["sesins1_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                      <input type="number" value="<?= $datanya["beasesins1_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6>
                    <div class="custom-file" id="customFile" lang="es">
                      <input type="file" id="#" placeholder="" class="custom-file-input" name="#" aria-describedby="fileHelp" disabled>
                      <label class="custom-file-label" for="#">
                        : <?= $datanya["surund1_ins"] ?>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Status</h6>
                  <div class="form-group">
                    <select class="form-control" name="status1" id="">
                      <?php if ($keu["status1"] == "Sudah Dibayar") { ?>
                        <option value="Sudah Dibayar" selected>Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } elseif ($keu["status1"] == "Belum Dibayar") { ?>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar" selected>Belum dibayar</option>
                      <?php } else { ?>
                        <option disabled selected>--- Pilih Salah Satu ---</option>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- Akhir Instruktur -->
              <?php } ?>
              <?php if ($datanya["novend2_ins"] > 0) {
              ?>
                <br>
                <h5>Data Instruktur 2</h5>
                <hr>
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6>
                  <input type="number" value="<?= $datanya["novend2_ins"] ?>" class="form-control form-control-user" disabled>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6>
                      <input type="text" value="<?= $datanya["ins2_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                      <input type="number" value="<?= $datanya["sesins2_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                      <input type="number" value="<?= $datanya["beasesins2_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6>
                    <div class="custom-file" id="customFile" lang="es">
                      <input type="file" id="#" placeholder="" class="custom-file-input" name="#" aria-describedby="fileHelp" disabled>
                      <label class="custom-file-label" for="#">
                        : <?= $datanya["surund2_ins"] ?>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Status</h6>
                  <div class="form-group">
                    <select class="form-control" name="status2" id="">
                      <?php if ($keu["status2"] == "Sudah Dibayar") { ?>
                        <option value="Sudah Dibayar" selected>Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } elseif ($keu["status2"] == "Belum Dibayar") { ?>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar" selected>Belum dibayar</option>
                      <?php } else { ?>
                        <option disabled selected>--- Pilih Salah Satu ---</option>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- Akhir Instruktur -->
              <?php } ?>
              <?php if ($datanya["novend3_ins"] > 0) {
              ?>
                <br>
                <h5>Data Instruktur 3</h5>
                <hr>
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6>
                  <input type="number" value="<?= $datanya["novend3_ins"] ?>" class="form-control form-control-user" disabled>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6>
                      <input type="text" value="<?= $datanya["ins3_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                      <input type="number" value="<?= $datanya["sesins3_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                      <input type="number" value="<?= $datanya["beasesins3_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6>
                    <div class="custom-file" id="customFile" lang="es">
                      <input type="file" id="#" placeholder="" class="custom-file-input" name="#" aria-describedby="fileHelp" disabled>
                      <label class="custom-file-label" for="#">
                        : <?= $datanya["surund3_ins"] ?>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Status</h6>
                  <div class="form-group">
                    <select class="form-control" name="status3" id="">
                      <?php if ($keu["status3"] == "Sudah Dibayar") { ?>
                        <option value="Sudah Dibayar" selected>Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } elseif ($keu["status3"] == "Belum Dibayar") { ?>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar" selected>Belum dibayar</option>
                      <?php } else { ?>
                        <option disabled selected>--- Pilih Salah Satu ---</option>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- Akhir Instruktur -->
              <?php } ?>
              <?php if ($datanya["novend4_ins"] > 0) {
              ?>
                <br>
                <h5>Data Instruktur 4</h5>
                <hr>
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6>
                  <input type="number" value="<?= $datanya["novend4_ins"] ?>" class="form-control form-control-user" disabled>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6>
                      <input type="text" value="<?= $datanya["ins4_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                      <input type="number" value="<?= $datanya["sesins4_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                      <input type="number" value="<?= $datanya["beasesins4_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6>
                    <div class="custom-file" id="customFile" lang="es">
                      <input type="file" id="#" placeholder="" class="custom-file-input" name="#" aria-describedby="fileHelp" disabled>
                      <label class="custom-file-label" for="#">
                        : <?= $datanya["surund4_ins"] ?>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Status</h6>
                  <div class="form-group">
                    <select class="form-control" name="status4" id="">
                      <?php if ($keu["status4"] == "Sudah Dibayar") { ?>
                        <option value="Sudah Dibayar" selected>Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } elseif ($keu["status4"] == "Belum Dibayar") { ?>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar" selected>Belum dibayar</option>
                      <?php } else { ?>
                        <option disabled selected>--- Pilih Salah Satu ---</option>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- Akhir Instruktur -->
              <?php } ?>
              <?php if ($datanya["novend5_ins"] > 0) {
              ?>
                <br>
                <h5>Data Instruktur 5</h5>
                <hr>
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6>
                  <input type="number" value="<?= $datanya["novend5_ins"] ?>" class="form-control form-control-user" disabled>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6>
                      <input type="text" value="<?= $datanya["ins5_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                      <input type="number" value="<?= $datanya["sesins5_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                      <input type="number" value="<?= $datanya["beasesins5_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6>
                    <div class="custom-file" id="customFile" lang="es">
                      <input type="file" id="#" placeholder="" class="custom-file-input" name="#" aria-describedby="fileHelp" disabled>
                      <label class="custom-file-label" for="#">
                        : <?= $datanya["surund5_ins"] ?>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Status</h6>
                  <div class="form-group">
                    <select class="form-control" name="status5" id="">
                      <?php if ($keu["status5"] == "Sudah Dibayar") { ?>
                        <option value="Sudah Dibayar" selected>Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } elseif ($keu["status5"] == "Belum Dibayar") { ?>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar" selected>Belum dibayar</option>
                      <?php } else { ?>
                        <option disabled selected>--- Pilih Salah Satu ---</option>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- Akhir Instruktur -->
              <?php } ?>
              <?php if ($datanya["novend6_ins"] > 0) {
              ?>
                <br>
                <h5>Data Instruktur 6</h5>
                <hr>
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6>
                  <input type="number" value="<?= $datanya["novend6_ins"] ?>" class="form-control form-control-user" disabled>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6>
                      <input type="text" value="<?= $datanya["ins6_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                      <input type="number" value="<?= $datanya["sesins6_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                      <input type="number" value="<?= $datanya["beasesins6_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6>
                    <div class="custom-file" id="customFile" lang="es">
                      <input type="file" id="#" placeholder="" class="custom-file-input" name="#" aria-describedby="fileHelp" disabled>
                      <label class="custom-file-label" for="#">
                        : <?= $datanya["surund6_ins"] ?>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Status</h6>
                  <div class="form-group">
                    <select class="form-control" name="status6" id="">
                      <?php if ($keu["status6"] == "Sudah Dibayar") { ?>
                        <option value="Sudah Dibayar" selected>Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } elseif ($keu["status6"] == "Belum Dibayar") { ?>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar" selected>Belum dibayar</option>
                      <?php } else { ?>
                        <option disabled selected>--- Pilih Salah Satu ---</option>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- Akhir Instruktur -->
              <?php } ?>
              <?php if ($datanya["novend7_ins"] > 0) {
              ?>
                <br>
                <h5>Data Instruktur 7</h5>
                <hr>
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6>
                  <input type="number" value="<?= $datanya["novend7_ins"] ?>" class="form-control form-control-user" disabled>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6>
                      <input type="text" value="<?= $datanya["ins7_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                      <input type="number" value="<?= $datanya["sesins7_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                      <input type="number" value="<?= $datanya["beasesins7_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6>
                    <div class="custom-file" id="customFile" lang="es">
                      <input type="file" id="#" placeholder="" class="custom-file-input" name="#" aria-describedby="fileHelp" disabled>
                      <label class="custom-file-label" for="#">
                        : <?= $datanya["surund7_ins"] ?>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Status</h6>
                  <div class="form-group">
                    <select class="form-control" name="status7" id="">
                      <?php if ($keu["status7"] == "Sudah Dibayar") { ?>
                        <option value="Sudah Dibayar" selected>Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } elseif ($keu["status7"] == "Belum Dibayar") { ?>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar" selected>Belum dibayar</option>
                      <?php } else { ?>
                        <option disabled selected>--- Pilih Salah Satu ---</option>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- Akhir Instruktur -->
              <?php } ?>
              <?php if ($datanya["novend8_ins"] > 0) {
              ?>
                <br>
                <h5>Data Instruktur 8</h5>
                <hr>
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6>
                  <input type="number" value="<?= $datanya["novend8_ins"] ?>" class="form-control form-control-user" disabled>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6>
                      <input type="text" value="<?= $datanya["ins8_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                      <input type="number" value="<?= $datanya["sesins8_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                      <input type="number" value="<?= $datanya["beasesins8_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6>
                    <div class="custom-file" id="customFile" lang="es">
                      <input type="file" id="#" placeholder="" class="custom-file-input" name="#" aria-describedby="fileHelp" disabled>
                      <label class="custom-file-label" for="#">
                        : <?= $datanya["surund8_ins"] ?>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Status</h6>
                  <div class="form-group">
                    <select class="form-control" name="status8" id="">
                      <?php if ($keu["status8"] == "Sudah Dibayar") { ?>
                        <option value="Sudah Dibayar" selected>Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } elseif ($keu["status8"] == "Belum Dibayar") { ?>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar" selected>Belum dibayar</option>
                      <?php } else { ?>
                        <option disabled selected>--- Pilih Salah Satu ---</option>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- Akhir Instruktur -->
              <?php } ?>
              <?php if ($datanya["novend9_ins"] > 0) {
              ?>
                <br>
                <h5>Data Instruktur 9</h5>
                <hr>
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6>
                  <input type="number" value="<?= $datanya["novend9_ins"] ?>" class="form-control form-control-user" disabled>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6>
                      <input type="text" value="<?= $datanya["ins9_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                      <input type="number" value="<?= $datanya["sesins9_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                      <input type="number" value="<?= $datanya["beasesins9_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6>
                    <div class="custom-file" id="customFile" lang="es">
                      <input type="file" id="#" placeholder="" class="custom-file-input" name="#" aria-describedby="fileHelp" disabled>
                      <label class="custom-file-label" for="#">
                        : <?= $datanya["surund9_ins"] ?>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Status</h6>
                  <div class="form-group">
                    <select class="form-control" name="status9" id="">
                      <?php if ($keu["status9"] == "Sudah Dibayar") { ?>
                        <option value="Sudah Dibayar" selected>Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } elseif ($keu["status9"] == "Belum Dibayar") { ?>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar" selected>Belum dibayar</option>
                      <?php } else { ?>
                        <option disabled selected>--- Pilih Salah Satu ---</option>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- Akhir Instruktur -->
              <?php } ?>
              <?php if ($datanya["novend10_ins"] > 0) {
              ?>
                <br>
                <h5>Data Instruktur 10</h5>
                <hr>
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6>
                  <input type="number" value="<?= $datanya["novend10_ins"] ?>" class="form-control form-control-user" disabled>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6>
                      <input type="text" value="<?= $datanya["ins10_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                      <input type="number" value="<?= $datanya["sesins10_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                      <input type="number" value="<?= $datanya["beasesins10_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6>
                    <div class="custom-file" id="customFile" lang="es">
                      <input type="file" id="#" class="custom-file-input" name="#" aria-describedby="fileHelp" disabled>
                      <label class="custom-file-label" for="#">
                        <?= $datanya["surund10_ins"] ?>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Status</h6>
                  <div class="form-group">
                    <select class="form-control" name="status10" id="">
                      <?php if ($keu["status10"] == "Sudah Dibayar") { ?>
                        <option value="Sudah Dibayar" selected>Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } elseif ($keu["status10"] == "Belum Dibayar") { ?>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar" selected>Belum dibayar</option>
                      <?php } else { ?>
                        <option disabled selected>--- Pilih Salah Satu ---</option>
                        <option value="Sudah Dibayar">Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- Akhir Instruktur -->
              <?php } ?>

              <br>
              <br>
              <div class="form-group">
                <label class="form-check-label">
                  <input type="checkbox" name="stat" id="done" value="Completed">
                  Selesaikan Status Pelatihan
                </label>
              </div>
              <p></p>
              <input type="hidden" name="id" value="<?= $this->input->get("id_pelatihan") ?>">
              <!-- End Example events -->
              <button type="submit" class="btn btn-primary btn-user btn-block col-xl-3 col-lg-7">
                Update Kelengkapan Data
              </button>
            </form>
          </div>

          <!-- Footer -->
          <footer class="sticky-footer bg-white">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Copyright &copy; IT Team HSE Training Center</span>
              </div>
            </div>
          </footer>
          <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

      </div>
      <!-- End of Page Wrapper -->

      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin logout?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Klik logout untuk mengakhiri sesi login anda.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
              <a class="btn btn-primary" href="<?= base_url("home/logout") ?>">Logout</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Scripting With JS -->
      <?php if ($whdb2["status_keu"] == "Completed") { ?>
        <script>
          $(document).ready(function() {
            $("#done").prop("checked", true);
          });
        </script>
      <?php } ?>