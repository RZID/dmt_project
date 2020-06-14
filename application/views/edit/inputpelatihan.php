<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input Pelatihan</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Input Kelengkapan Pelatihan</h6>
        </div>
        <!-- Form -->
        <br>
        <div class="col-xl-12 col-lg-7">
          <form class="namapelatihan" enctype="multipart/form-data" action="<?= base_url("user/input_pelatihan_core") ?>" method="post">
            <div class="form-group">
              <input type="text" class="form-control form-control-user" placeholder="Nama Pelatihan" name="nama">
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" placeholder="Batch" name="batch">
            </div>
            <div class="row">
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Tanggal Mulai</h6>
                <input type="date" class="form-control form-control-user" placeholder="Tanggal Mulai" name="tglmulai">
              </div>
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Tanggal Selesai</h6>
                <input type="date" class="form-control form-control-user" placeholder="Tanggal Selesai" name="tglsls">
              </div>
            </div>
            <div class="form-group">
              <label for="#sifatPlth">Sifat Pelatihan</label>
              <div class="form-group">
                <select class="form-control" name="sifat" id="sifatPlth">
                  <option disabled selected>--- Pilih Salah Satu ---</option>
                  <option value="Residensial">Residensial</option>
                  <option value="Non Residensial">Non Residensial</option>
                  <option value="Inhouse">Inhouse</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="#vonv">Vendor atau Non Vendor</label>
              <div class="form-group">
                <select class="form-control" name="vonv" id="vonv">
                  <option disabled selected>--- Pilih Salah Satu ---</option>
                  <option value="Vendor">Vendor</option>
                  <option value="Non Vendor">Non Vendor</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" placeholder="Sertifikasi" name="cert">
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" placeholder="Nama Vendor Pelatihan" name="vend">
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" placeholder="Harga Kesepakatan Vendor" name="harga">
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" placeholder="Keterangan Kesepakatan Vendor" name="ket">
            </div>

            <div class="example-wrap">
              <h6 class="m-0 font-weight-bold text-secondary">Upload Memo Pemanggilan</h6>
              <div class="example">
                <input type="file" id="input-file-events" class="dropify-event" name="berkas">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Pelaksanaan Pre Test</h6>
                <input type="date" class="form-control form-control-user" placeholder="Tanggal Selesai" name="pretest">
              </div>
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Pelaksanaan Post Test</h6>
                <input type="date" class="form-control form-control-user" placeholder="Tanggal Selesai" name="postest">
              </div>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="feedback" value="1">
                Feedback
              </label>
            </div>
            <br>
            <div class="row">
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Tanggal Memo</h6>
                <input type="date" class="form-control form-control-user" placeholder="Tanggal Selesai" name="tglmemo">
              </div>
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Upload Memo</h6>
                <div class="example">
                  <input type="file" id="input-file-events" class="dropify-event" name="berkas_memo">
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="checkbox" name="status" id="status" value="Completed">
              <label for="status">Selesaikan Status PND</label>
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