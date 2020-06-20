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
              $data_dari_keu = $this->db->order_by("no_ins", "ASC")->get_where("addins_dmt", array("id_plth" => $this->input->get("id_pelatihan")));

              foreach ($data_dari_keu->result_array() as $ddk) { ?>
                <br>
                <h5>Data Instruktur <?= $ddk["no_ins"] ?></h5>
                <hr>
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6>
                  <input type="number" value="<?= $ddk["novend_ins"] ?>" class="form-control form-control-user" disabled>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6>
                      <input type="text" value="<?= $ddk["ins_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                      <input type="number" value="<?= $ddk["sesins_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                      <input type="number" value="<?= $ddk["beasesins_ins"] ?>" class="form-control form-control-user" disabled>
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6>
                      <a href="<?= base_url("assets/uploaded_file/") . $ddk["surund_ins"] ?>">
                        <input type="text" value="<?= $ddk["surund_ins"] ?>" class="form-control form-control-user" disabled>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Status</h6>
                  <div class="form-group">
                    <select class="form-control" name="status<?= $ddk["no_ins"] ?>" id="">
                      <?php if ($keu["status" . $ddk['no_ins'] . ""] == "Sudah Dibayar") { ?>
                        <option value="Sudah Dibayar" selected>Sudah dibayar</option>
                        <option value="Belum Dibayar">Belum dibayar</option>
                      <?php } elseif ($keu["status" . $ddk['no_ins'] . ""] == "Belum Dibayar") { ?>
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
              <?php
              }
              ?>

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