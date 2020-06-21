<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Pelatihan</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Update Kelengkapan Pelatihan</h6>
        </div>
        <!-- Form -->
        <br>
        <div class="col-xl-12 col-lg-7">
          <form class="namapelatihan" enctype="multipart/form-data" action="<?= base_url("user/edit_pelatihan_core") ?>" method="post">
            <input type="hidden" class="form-control form-control-user" placeholder="Nama Pelatihan" name="id" value="<?= $whdb['id_plth'] ?>" />
            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Jenis Pelatihan</h6>
              <input type="text" class="form-control form-control-user" placeholder="Jenis Pelatihan" name="jenis" value="<?= $whdb['jenis_plth'] ?>">
            </div>
            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Nama Pelatihan</h6>
              <input type="text" class="form-control form-control-user" placeholder="Nama Pelatihan" name="nama" value="<?= $whdb['nama_plth'] ?>">
            </div>
            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Batch</h6>
              <input type="number" class="form-control form-control-user" placeholder="Batch" name="batch" value="<?= $whdb['batch_plth'] ?>">
            </div>
            <div class="row">
              <div class="form-group col-lg">
                <h7 class="m-0 font-weight-bold text-secondary">Tanggal Mulai</h6>
                  <input type="date" class="form-control form-control-user" placeholder="Tanggal Mulai" name="tglmulai" value="<?= date("Y-m-d", $whdb['tglmulai_plth']) ?>">
              </div>
              <div class="form-group col-lg">
                <h7 class="m-0 font-weight-bold text-secondary">Tanggal Selesai</h6>
                  <input type="date" class="form-control form-control-user" placeholder="Tanggal Selesai" name="tglsls" value="<?= date("Y-m-d", $whdb['tgldone_plth']) ?>">
              </div>
            </div>
            <div class="form-group">
              <h7 class="m-0 font-weight-bold text-secondary">Lokasi Pelatihan</h6>
                <input type="text" class="form-control form-control-user" placeholder="Lokasi Pelatihan" name="lokasi" value="<?= $whdb["lokasi_plth"] ?>">
            </div>
            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Sifat Pelatihan</h6>
              <select class="form-control" name="sifat" id="">
                <option value="<?= $whdb["sifat_plth"] ?>" selected><?= $whdb["sifat_plth"] ?></option>
                <?php $sifat = $dis->crud->select_where("sifat_dmt", array("nama_sifat !=" => $whdb["sifat_plth"]));
                foreach ($sifat->result() as $rowsifat) { ?>
                  <option value="<?= $rowsifat->nama_sifat ?>"><?= $rowsifat->nama_sifat ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Vendor atau Non Vendor</h6>
              <select class="form-control" name="vonv" id="">
                <option value="<?= $whdb['vendor_plth'] ?>" selected><?= $whdb['vendor_plth'] ?></option>
                <?php $vendor = $dis->crud->select_where("vendor_dmt", array("nama_vendor !=" => $whdb["vendor_plth"]));
                foreach ($vendor->result() as $rowvendor) { ?>
                  <option value="<?= $rowvendor->nama_vendor ?>"><?= $rowvendor->nama_vendor ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Sertifikasi</h6>
              <input type="text" class="form-control form-control-user" placeholder="Sertifikasi" name="cert" value="<?= $whdb['sertifikasi_plth'] ?>">
            </div>
            <div class="form-group">
              <h6 type="text">Nama Vendor Pelatihan</h6>
              <select class="custom-select" name="vend">
                <?php $vendor_ini = $dis->crud->select_where("plth_dmt", array("id_plth" => $this->input->get("id_pelatihan")))->row_array() ?>
                <option value="<?= $vendor_ini["nmvendor_plth"] ?>" selected><?= $vendor_ini["nmvendor_plth"] ?></option>
                <?php foreach ($this->db->get_where("nmvendor_dmt", array("nama_nmvendor !=" => $vendor_ini["nmvendor_plth"]))->result_array() as $ven) { ?>
                  <option value="<?= $ven["nama_nmvendor"] ?>"><?= $ven["nama_nmvendor"] ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Harga Kesepakatan Vendor</h6>
              <input type="text" class="form-control form-control-user" placeholder="Harga Kesepakatan Vendor" name="harga" value="<?= $whdb['hrgkspvend_plth'] ?>">
            </div>
            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Keterangan Kesepakatan Vendor</h6>
              <input type="text" class="form-control form-control-user" placeholder="Keterangan Kesepakatan Vendor" name="ket" value="<?= $whdb['ketkspvend_plth'] ?>">
            </div>

            <div class="row">
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Pelaksanaan Pre Test</h6>
                <input type="date" class="form-control form-control-user" placeholder="Tanggal Selesai" name="pretest" value="<?= date("Y-m-d", $whdb["pretest_plth"]) ?>">
              </div>
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Pelaksanaan Post Test</h6>
                <input type="date" class="form-control form-control-user" placeholder="Tanggal Selesai" name="postest" value="<?= date("Y-m-d", $whdb["postest_plth"]) ?>">
              </div>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" id="feedback" name="feedback" value="1" dbval="<?= $whdb["feedback_plth"] ?>">
                Feedback
                <script>
                  if ($("#feedback").attr("dbval") == "1") {
                    $("#feedback").prop("checked", true);
                  }
                </script>
              </label>
            </div>
            <br>
            <div class="row">
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Tanggal Memo</h6>
                <input type="date" class="form-control form-control-user" placeholder="Tanggal Selesai" name="tglmemo" value="<?= date("Y-m-d", $whdb["tglmemo_plth"]) ?>">
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
                  'maxFileSize': 25000,
                  "dropZoneEnabled": false,
                  "showPreview": false,
                  'maxFileCount': 1,
                  'uploadUrl': '<?= base_url("upload/plth1") ?>',
                  'elErrorContainer': '#errorBlock1',
                  'uploadAsync': true,
                  'initialCaption': "<?= $whdb["filememo_plth"] ?>",
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
                <input type="date" class="form-control form-control-user" placeholder="Tanggal Laportan Pelatihan" name="tgllpr" value="<?= date("Y-m-d", $whdb["tgllpr_plth"]) ?>">
              </div>
              <div class="form-group col-lg">
                <h6 class="m-0 font-weight-bold text-secondary">Upload Laporan Pelatihan</h6>
                <div class="example">
                  <input type="file" id="filelap" class="dropify-event" name="berkaslaporan">
                </div>
              </div>
              <input type="hidden" name="berkaslap_up" id="berkaslap_up">
              <script>
                $("#filelap").fileinput({
                  'maxFileSize': 25000,
                  "dropZoneEnabled": false,
                  "showPreview": false,
                  'maxFileCount': 1,
                  'uploadUrl': '<?= base_url("upload/plth2") ?>',
                  'elErrorContainer': '#errorBlock1',
                  'initialCaption': "<?= $whdb["filelapor_plth"] ?>",
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
              <input type="checkbox" name="status" id="status" value="Completed" dbval="<?= $whdb["ketpros_plth"] ?>">
              <label for="status">Selesaikan Status PND</label>
            </div>
            <!-- End Example events -->

            <p></p>

            <button type="submit" class="btn btn-primary btn-user btn-block col-xl-2 col-lg-7">
              Update Data
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
    <script>
      if ($("#status").attr("dbval") == "Completed") {
        $("#status").prop("checked", true);
      }
    </script>