  <?= $this->session->flashdata("msg") ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Update Kelengkapan Finance BC</h1>
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
            <form class="namapelatihan" enctype="multipart/form-data" action="<?= base_url("user/edit_keu_bc_core") ?>" method="post">
              <input type="hidden" class="form-control form-control-user" name="id" value="<?= $whdb['id_plth'] ?>" />
              <div class="form-group">
                <h6 class="m-0 font-weight-bold text-secondary">Nama Pelatihan</h6>
                <input type="text" class="form-control form-control-user" placeholder="Nama User" name="nama" value="<?= $whdb['nama_plth'] ?>" disabled>
              </div>

              <!-- Awal Data Finance BC -->
              <div class="row">
                <div class="col-lg col-xl">
                  <h6 class="m-0 font-weight-bold text-secondary">Upload Absensi Kehadiran</h6>
                  <div class="example">
                    <input type="file" id="absenkehadiran" class="dropify-event" name="absenkehadiran">
                  </div>
                  <input type="hidden" name="absenkehadiran_up" id="absenkehadiran_up">
                  <script>
                    $("#absenkehadiran").fileinput({
                      'maxFileSize': 25000,
                      "dropZoneEnabled": false,
                      "showPreview": false,
                      'maxFileCount': 1,
                      'uploadUrl': '<?= base_url("upload/keubc") ?>',
                      'elErrorContainer': '#errorBlock1',
                      'initialCaption': "<?= $whdb2["file1_keubc"] ?>",
                      'uploadAsync': true,
                      uploadExtraData: function() {}
                    });
                    $('#absenkehadiran').on('fileuploaded', function(event, data, previewId, index) {
                      var response = data.response,
                        reader = data.reader;
                      $("#absenkehadiran_up").val(response.keubc);
                    });
                  </script>
                </div>
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">Memo / Surat Pemanggilan / Kontrak / Agre</h6>
                    <?php if ($dis->crud->select_where("plth_dmt", array("id_plth" => $this->input->get("id_pelatihan")))->row_array()["filememo_plth"] != "") { ?>
                      <a href="<?= base_url("assets/uploaded_file/") . $dis->crud->select_where("plth_dmt", array("id_plth" => $this->input->get("id_pelatihan")))->row_array()["filememo_plth"] ?>">
                      <?php } ?>
                      <input type="text" class="form-control form-control-user" value="<?= $dis->crud->select_where("plth_dmt", array("id_plth" => $this->input->get("id_pelatihan")))->row_array()["filememo_plth"] ?>" disabled>
                      </a>
                  </div>
                </div>

                <div class="col-lg col-xl">
                  <h6 class="m-0 font-weight-bold text-secondary">Laporan Kegiatan</h6>
                  <?php if ($dis->crud->select_where("plth_dmt", array("id_plth" => $this->input->get("id_pelatihan")))->row_array()["filelapor_plth"] != "") { ?>
                    <a href="<?= base_url("assets/uploaded_file/") . $dis->crud->select_where("plth_dmt", array("id_plth" => $this->input->get("id_pelatihan")))->row_array()["filelapor_plth"] ?>">
                    <?php } ?>
                    <input type="text" class="form-control form-control-user" value="<?= $dis->crud->select_where("plth_dmt", array("id_plth" => $this->input->get("id_pelatihan")))->row_array()["filelapor_plth"] ?>" disabled>
                    </a>
                </div>

              </div>

              <!-- Internal PTMN -->

              <br>
              <h5>Internal PTMN</h5>
              <hr>

              <div class="row">
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">No. Customer</h6>
                    <input type="number" class="form-control form-control-user" name="nocustom1" value="<?= $whdb2["nocs_ptmn"] ?>">
                  </div>
                </div>
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">Nama Customer</h6>
                    <input type="text" class="form-control form-control-user" name="namacustom1" value="<?= $whdb2["namacs_ptmn"] ?>">
                  </div>
                </div>
              </div>
              <!-- AP / Third Party -->

              <br>
              <h5>AP / Third Party</h5>
              <hr>

              <div class="row">
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">No. Customer</h6>
                    <input type="number" class="form-control form-control-user" name="nocustom2" value="<?= $whdb2["nocs_tp"] ?>">
                  </div>
                </div>
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">Nama Customer</h6>
                    <input type="text" class="form-control form-control-user" name="namacustom2" value="<?= $whdb2["namacs_tp"] ?>">
                  </div>
                </div>
              </div>
              <!-- Tarif -->
              <br>
              <h5>Tarif</h5>
              <hr>

              <div class="form-group">
                <h6 class="m-0 font-weight-bold text-secondary">Tarif (Rp.)</h6>
                <input type="number" class="form-control form-control-user" name="trf" value="<?= $whdb2["trf_trf"] ?>">
              </div>

              <!-- Profit -->
              <br>
              <h5>Profit</h5>
              <hr>

              <div class="row">
                <div class="col-md-4 col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">Cash</h6>
                    <input type="number" class="form-control form-control-user" name="cash" value="<?= $whdb2["cash_pro"] ?>">
                  </div>
                </div>
                <div class="col-md-4 col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">Internal</h6>
                    <input type="number" class="form-control form-control-user" name="internal" value="<?= $whdb2["internal_pro"] ?>">
                  </div>
                </div>
                <div class="col-md-4 col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">AP / Third Party</h6>
                    <input type="number" class="form-control form-control-user" name="aptp" value="<?= $whdb2["aptp_pro"] ?>">
                  </div>
                </div>
              </div>

              <!-- Akhir Form -->

              <div class="row">
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">Total Revenue</h6>
                    <input type="number" class="form-control form-control-user" name="tr" value="<?= $whdb2["ttlrev_pro"] ?>">
                  </div>
                </div>
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">No. SO</h6>
                    <input type="number" class="form-control form-control-user" name="noso" value="<?= $whdb2["noso_pro"] ?>">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">ID SSC</h6>
                    <input type="number" class="form-control form-control-user" name="idssc" value="<?= $whdb2["idssc_pro"] ?>">
                  </div>
                </div>
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">Invoice No.</h6>
                    <input type="number" class="form-control form-control-user" name="invno" value="<?= $whdb2["noinv_pro"] ?>">
                  </div>
                </div>
              </div>


              <div class="form-group">
                <h6 class="m-0 font-weight-bold text-secondary">Status</h6>
                <div class="form-group">
                  <select class="form-control" name="status">
                    <?php if ($whdb2["stat_pro"] == "Sudah Dibayar") { ?>
                      <option value="Sudah Dibayar" selected>Sudah dibayar</option>
                      <option value="Belum Dibayar">Belum dibayar</option>
                    <?php } elseif ($whdb2["stat_pro"] == "Belum Dibayar") { ?>
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


              <div class="form-group">
                <label class="form-check-label">
                  <input type="checkbox" name="stat" id="done" value="Completed">
                  Selesaikan Status Pelatihan
                </label>
              </div>
              <!-- End Example events -->
              <button type="submit" class="btn btn-primary btn-user btn-block col-xl-3 col-lg-7">
                Update Kelengkapan Data
              </button>
              <p></p>

            </form>
          </div>
        </div>
      </div>
    </div>
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
  <?php if ($whdb2["status_keu_bc"] == "Completed") { ?>
    <script>
      $(document).ready(function() {
        $("#done").prop("checked", true);
      });
    </script>
  <?php } ?>