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
              <input type="text" class="form-control form-control-user" placeholder="Jenis Pelatihan" name="jenis">
            </div>
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
              <input type="text" class="form-control form-control-user" placeholder="Lokasi Pelatihan" name="lokasi">
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
              <h6 type="text">Nama Vendor Pelatihan</h6>
              <select class="custom-select" name="vend">
                <option selected disabled>--- Pilih Salah Satu ---</option>
                <?php foreach ($dis->crud->select("nmvendor_dmt")->result_array() as $ven) { ?>
                  <option value="<?= $ven["nama_nmvendor"] ?>"><?= $ven["nama_nmvendor"] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" placeholder="Harga Kesepakatan Vendor" name="harga">
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" placeholder="Keterangan Kesepakatan Vendor" name="ket">
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
                  <input type="file" class="dropify-event" id="filemem" name="berkasmemo">
                  <div id="errorBlock1"></div>
                </div>
              </div>
              <input type="hidden" name="berkasmemo_up" id="berkasmemo_up">
              <script>
                $("#filemem").fileinput({
                  'maxFileSize': 5120,
                  "dropZoneEnabled": false,
                  "showPreview": false,
                  'maxFileCount': 1,
                  'uploadUrl': '<?= base_url("upload/plth1") ?>',
                  'elErrorContainer': '#errorBlock1',
                  'uploadAsync': true,
                  uploadExtraData: function() {}
                });
                $('#filemem').on('fileuploaded', function(event, data, previewId, index) {
                  var response = data.response,
                    reader = data.reader;
                  $("#berkasmemo_up").val(response.files);
                });
              </script>
            </div>
            <div class="row">
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Tanggal Laporan Pelatihan</h6>
                <input type="date" class="form-control form-control-user" placeholder="Tanggal Laportan Pelatihan" name="tgllpr">
              </div>
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Upload Laporan Pelatihan</h6>
                <div class="example">
                  <input type="file" id="filelap" class="dropify-event" name="berkaslaporan">
                  <div id="errorBlock2"></div>
                </div>
              </div>
              <input type="hidden" name="berkaslap_up" id="berkaslap_up">
              <script>
                $("#filelap").fileinput({
                  'maxFileSize': 5120,
                  "dropZoneEnabled": false,
                  "showPreview": false,
                  'maxFileCount': 1,
                  'uploadUrl': '<?= base_url("upload/plth2") ?>',
                  'elErrorContainer': '#errorBlock2',
                  'uploadAsync': true,
                  uploadExtraData: function() {}
                });
                $('#filelap').on('fileuploaded', function(event, data, previewId, index) {
                  var response = data.response,
                    reader = data.reader;
                  $("#berkaslap_up").val(response.fileplth2);
                });
              </script>
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