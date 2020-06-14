<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Realisasi Pelatihan</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Input Realisasi Pelatihan</h6>
        </div>
        <!-- Form -->
        <br>
        <div class="col-xl-12 col-lg-7">
          <form class="namapelatihan" method="POST" action="<?= base_url("user/insert_realisasi_core"); ?>">

            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Jenis Pelatihan</h6>
              <input type="text" class="form-control form-control-user" name="real1">
            </div>

            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Nama Pelatihan</h6>
              <input type="text" class="form-control form-control-user" name="real2">
            </div>

            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Batch</h6>
              <input type="number" class="form-control form-control-user" name="real3">
            </div>

            <div class="row">
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Tanggal Mulai</h6>
                <input type="date" class="form-control form-control-user" name="real4">
              </div>
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Tanggal Selesai</h6>
                <input type="date" class="form-control form-control-user" name="real5">
              </div>
            </div>

            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Lokasi Pelatihan</h6>
              <input type="text" class="form-control form-control-user" name="real6">
            </div>
            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Durasi Pelatihan (HK)</h6>
              <input type="number" class="form-control form-control-user" name="real7">
            </div>

            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Jumlah Sesi</h6>
              <input type="number" class="form-control form-control-user" name="real8">
            </div>

            <div class="row">
              <div class="col-lg">
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Undang Persero</h6>
                  <input type="number" class="form-control form-control-user" name="real9">
                </div>
              </div>
              <div class="col-lg">
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Undang Non Persero</h6>
                  <input type="number" class="form-control form-control-user" name="real10">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg">
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Datang Persero</h6>
                  <input type="number" class="form-control form-control-user" name="real11">
                </div>
              </div>
              <div class="col-lg">
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Datang Non Persero</h6>
                  <input type="number" class="form-control form-control-user" name="real12">
                </div>
              </div>
            </div>

            <!-- End Example events -->
            <p></p>

            <button type="submit" class="btn btn-primary btn-user btn-block col-xl-2 col-lg-7">
              Submit
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