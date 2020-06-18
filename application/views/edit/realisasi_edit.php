<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Realisasi Pelatihan</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Update Realisasi Pelatihan</h6>
        </div>
        <!-- Form -->
        <br>
        <?php
        $row_alldata = $dis->crud->select_where("plth_dmt", array("id_plth" => $this->input->get("id_pelatihan")))->row_array();
        ?>
        <div class="col-xl-12 col-lg-7">
          <form class="namapelatihan" method="POST" action="<?= base_url("user/core_realisasi_core"); ?>">
            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Jenis Pelatihan</h6>
              <input type="text" class="form-control form-control-user" name="real1" value="<?= $row_alldata["jenis_plth"] ?>" disabled>
            </div>

            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Nama Pelatihan</h6>
              <input type="text" class="form-control form-control-user" name="real2" value="<?= $row_alldata["nama_plth"] ?>" disabled>
            </div>

            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Batch</h6>
              <input type="number" class="form-control form-control-user" name="real3" value="<?= $row_alldata["batch_plth"] ?>" disabled>
            </div>

            <div class="row">
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Tanggal Mulai</h6>
                <input type="date" class="form-control form-control-user" name="real4" value="<?= date("Y-m-d", $row_alldata["tglmulai_plth"]) ?>" disabled>
              </div>
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Tanggal Selesai</h6>
                <input type="date" class="form-control form-control-user" name="real5" value="<?= date("Y-m-d", $row_alldata["tgldone_plth"]) ?>" disabled>
              </div>
            </div>

            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Lokasi Pelatihan</h6>
              <input type="text" class="form-control form-control-user" name="real6" value="<?= $row_alldata["lokasi_plth"] ?>" disabled>
            </div>
            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Durasi Pelatihan (HK)</h6>
              <input type="number" class="form-control form-control-user" name="real7" value="<?= $row["durasi_realisasi"] ?>">
            </div>

            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Jumlah Sesi</h6>
              <input type="number" class="form-control form-control-user" name="real8" value="<?= $row["jmlsesi_realisasi"] ?>">
            </div>

            <div class="row">
              <div class="col-lg">
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Undang Persero</h6>
                  <input type="number" class="form-control form-control-user" name="real9" value="<?= $row["undpersero_realisasi"] ?>">
                </div>
              </div>
              <div class="col-lg">
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Undang Non Persero</h6>
                  <input type="number" class="form-control form-control-user" name="real10" value="<?= $row["undnonpersero_realisasi"] ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg">
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Datang Persero</h6>
                  <input type="number" class="form-control form-control-user" name="real11" value="<?= $row["dtgpersero_realisasi"] ?>">
                </div>
              </div>
              <div class="col-lg">
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Datang Non Persero</h6>
                  <input type="number" class="form-control form-control-user" name="real12" value="<?= $row["dtgnonpersero_realisasi"] ?>">
                </div>
              </div>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" dbval="<?= $row["status_realisasi"] ?>" class="form-check-input" name="stat" id="stat" value="Completed">
                Selesaikan Status Realisasi Pelatihan
              </label>
            </div>
            <script>
              if ($("#stat").attr("dbval") == "Completed") {
                $("#stat").prop("checked", true);
              } else {}
            </script>
            <input type="hidden" name="id" value="<?= $row["id_realisasi"] ?>">
            <!-- End Example events -->
            <p></p>

            <button type="submit" class="btn btn-primary btn-user btn-block col-xl-2 col-lg-7">
              Update
            </button>
          </form>
        </div>




        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2019</span>
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