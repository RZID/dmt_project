<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Kelengkapan Data Instruktur</h1>
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
          <form class="namapelatihan" enctype="multipart/form-data" action="<?= base_url("user/edit_ins_core") ?>" method="post">
            <input type="hidden" class="form-control form-control-user" name="id" value="<?= $this->input->get("id_pelatihan") ?>" />
            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Nama Pelatihan</h6>
              <input type="text" class="form-control form-control-user" placeholder="Nama User" name="nama" value="<?= $whdb['nama_plth'] ?>" disabled>
            </div>
            <!-- End Example events -->
            <p></p>

            <br>
            <?php
            $feching = $dis->crud->select_where("addins_dmt", array("id_plth" => $this->input->get("id_pelatihan")));
            if ($feching->num_rows() >= 1) {
              $i = $this->db->order_by("no_ins", "ASC")->get_where("addins_dmt", array("id_plth" => $this->input->get("id_pelatihan")))->row_array();
              $no = 1;
              foreach ($feching->result_array() as $f) {
            ?>
                <br>
                <h5>Data Instruktur <?= $f["no_ins"] ?></h5>
                <hr>
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6>
                  <input type="number" class="form-control form-control-user" name="noven[]" value="<?= $f["novend_ins"] ?>">
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6>
                      <input type="text" class="form-control form-control-user" id="checker" name="ins[]" value="<?= $f["ins_ins"] ?>">
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                      <input type="number" class="form-control form-control-user" name="sesins[]" value="<?= $f["sesins_ins"] ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary"> Tanggal Mulai Mengajar</h6>
                      <input type="date" class="form-control form-control-user" name="tglmulai[]" value="<?= date("Y-m-d", $f["tglmulaiajar_ins"]) ?>">
                    </div>
                  </div>
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Tanggal Selesai Mengajar</h6>
                      <input type="date" class="form-control form-control-user" name="tglselesai[]" value="<?= date("Y-m-d", $f["tgldoneajar_ins"]) ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg col-xl">
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                      <input type="number" class="form-control form-control-user" name="beains[]" value="<?= $f["beasesins_ins"] ?>">
                    </div>
                  </div>
                  <div class="col-lg">
                    <div class="form-group col-lg">
                      <h6 class="m-0 font-weight-bold text-secondary">Upload Laporan Pelatihan</h6>
                      <div class="example">
                        <input type="file" id="file<?= $no ?>" class="dropify-event fileget" name="berkas<?= $no ?>">
                      </div>
                    </div>
                    <input type="hidden" name="pemberkasan[]" id="berkas<?= $no ?>" value="<?= $f["surund_ins"] ?>">
                    <script>
                      $("#file<?= $no ?>").fileinput({
                        'maxFileSize': 25000,
                        "dropZoneEnabled": false,
                        "showPreview": false,
                        "initialCaption": "<?= $f["surund_ins"] ?>",
                        'maxFileCount': 1,
                        'uploadUrl': '<?= base_url("upload/ins") . $no ?>',
                        'elErrorContainer': '#errorBlock1',
                        'uploadAsync': true,
                        uploadExtraData: function() {}
                      });
                      $("#file<?= $no ?>").on('fileuploaded', function(event, data, previewId, index) {
                        var response = data.response,
                          reader = data.reader;
                        $("#berkas<?= $no ?>").val(response.insfile<?= $no ?>);
                      });
                    </script>
                  </div>
                </div>

              <?php
                $no++;
              }
            } else {
              $i = 1;
              ?>
              <br>
              <h5>Data Instruktur 1</h5>
              <hr>
              <div class="form-group">
                <h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6>
                <input type="number" class="form-control form-control-user" name="noven[]">
              </div>
              <div class="row">
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6>
                    <input type="text" class="form-control form-control-user" id="checker" name="ins[]">
                  </div>
                </div>
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                    <input type="number" class="form-control form-control-user" name="sesins[]">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary"> Tanggal Mulai Mengajar</h6>
                    <input type="date" class="form-control form-control-user" name="tglmulai[]">
                  </div>
                </div>
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">Tanggal Selesai Mengajar</h6>
                    <input type="date" class="form-control form-control-user" name="tglselesai[]">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg col-xl">
                  <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                    <input type="number" class="form-control form-control-user" name="beains[]">
                  </div>
                </div>
                <div class="col-lg">
                  <div class="form-group col-lg">
                    <h6 class="m-0 font-weight-bold text-secondary">Upload Laporan Pelatihan</h6>
                    <div class="example">
                      <input type="file" id="file1" class="dropify-event fileget" name="berkas1">
                    </div>
                  </div>
                  <input type="hidden" name="pemberkasan[]" id="berkas1">
                  <script>
                    $(".fileget").fileinput({
                      'maxFileSize': 25000,
                      "dropZoneEnabled": false,
                      "showPreview": false,
                      'maxFileCount': 1,
                      'uploadUrl': '<?= base_url("upload/ins1") ?>',
                      'elErrorContainer': '#errorBlock1',
                      'uploadAsync': true,
                      uploadExtraData: function() {}
                    });
                    $("#file1").on('fileuploaded', function(event, data, previewId, index) {
                      var response = data.response,
                        reader = data.reader;
                      $("#berkas1").val(response.insfile1);
                    });
                  </script>
                </div>
              </div>
            <?php } ?>
            <div id="isi"></div>
            <div id="buttonrz">
              <button type="button" class="btn btn-primary" id="add"><i class="fas fa-plus-square"></i> Instruktur</button>
            </div>

            <br>
            <div class="form-group">
              <input dbval="<?= $whdb2['status_ins'] ?>" type="checkbox" name="status" id="status" value="Completed" placeholder="" aria-describedby="helpId">
              <label for="status">Selesaikan Status Instruktur</label>
            </div>
            <br>
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
    <input type="hidden" id="ok11" value="<?= $feching->num_rows() ?>">
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Scripting With JS -->
    <script>
      $(document).ready(function() {
        if ($("#ok11").val() >= 1) {
          var i = $("#ok11").val();
        } else {
          var i = 1;
        }
        if (i > 9) {
          $("#add").remove();
        }

        $('#add').click(function() {
          i++;
          if (i < 10) {

            $("#isi").append("<div class='elemented" + i + "'><br><h5>Data Instruktur " + i + "</h5><hr><div class='form-group'><h6 class='m-0 font-weight-bold text-secondary'> No. Vendor</h6><input type='number' class='form-control form-control-user' name='noven[]'></div><div class='row'><div class='col-lg col-xl'><div class='form-group'><h6 class='m-0 font-weight-bold text-secondary'> Nama Instruktur</h6><input type='text' class='form-control form-control-user' id='checker' name='ins[]'></div></div><div class='col-lg col-xl'><div class='form-group'><h6 class='m-0 font-weight-bold text-secondary'>Sesi</h6><input type='number' class='form-control form-control-user' name='sesins[]'></div></div></div><div class='row'> <div class='col-lg col-xl'> <div class='form-group'> <h6 class='m-0 font-weight-bold text-secondary'> Tanggal Mulai Mengajar</h6> <input type='date' class='form-control form-control-user' name='tglmulai[]' > </div> </div> <div class='col-lg col-xl'> <div class='form-group'> <h6 class='m-0 font-weight-bold text-secondary'>Tanggal Selesai Mengajar</h6> <input type='date' class='form-control form-control-user' name='tglselesai[]'> </div> </div></div><div class='row'><div class='col-lg col-xl'><div class='form-group'><h6 class='m-0 font-weight-bold text-secondary'>Biaya Honor & Transport</h6><input type='number' class='form-control form-control-user' name='beains[]'></div></div><div class='col-lg'><div class='form-group col-lg'><h6 class='m-0 font-weight-bold text-secondary'>Upload Laporan Pelatihan</h6><div class='example'><input type='file' id='file" + i + "' class='dropify-event fileget' name='berkas" + i + "'></div></div><input type='hidden' name='berkas" + i + "' id='file" + i + "'></div></div></div><input type='hidden' name='pemberkasan[]' id='berkas" + i + "'>");
            $(".fileget").fileinput({
              'maxFileSize': 25000,
              "dropZoneEnabled": false,
              "showPreview": false,
              'maxFileCount': 1,
              'uploadUrl': '<?= base_url("upload/ins") ?>' + i,
              'elErrorContainer': '#errorBlock1',
              'uploadAsync': true,
              uploadExtraData: function() {}
            });
            $("#file" + i).on('fileuploaded', function(event, data, previewId, index) {
              var response = data.response,
                reader = data.reader;
              $("#berkas" + i).val(response.insfile + i);
            });
          } else {
            if (i >= 10) {
              $("#isi").append("<div class='elemented" + i + "'><br><h5>Data Instruktur " + i + "</h5><hr><div class='form-group'><h6 class='m-0 font-weight-bold text-secondary'> No. Vendor</h6><input type='number' class='form-control form-control-user' name='noven[]'></div><div class='row'><div class='col-lg col-xl'><div class='form-group'><h6 class='m-0 font-weight-bold text-secondary'> Nama Instruktur</h6><input type='text' class='form-control form-control-user' id='checker' name='ins[]'></div></div><div class='col-lg col-xl'><div class='form-group'><h6 class='m-0 font-weight-bold text-secondary'>Sesi</h6><input type='number' class='form-control form-control-user' name='sesins[]'></div></div></div><div class='row'> <div class='col-lg col-xl'> <div class='form-group'> <h6 class='m-0 font-weight-bold text-secondary'> Tanggal Mulai Mengajar</h6> <input type='date' class='form-control form-control-user' name='tglmulai[]' > </div> </div> <div class='col-lg col-xl'> <div class='form-group'> <h6 class='m-0 font-weight-bold text-secondary'>Tanggal Selesai Mengajar</h6> <input type='date' class='form-control form-control-user' name='tglselesai[]'> </div> </div></div><div class='row'><div class='col-lg col-xl'><div class='form-group'><h6 class='m-0 font-weight-bold text-secondary'>Biaya Honor & Transport</h6><input type='number' class='form-control form-control-user' name='beains[]'></div></div><div class='col-lg'><div class='form-group col-lg'><h6 class='m-0 font-weight-bold text-secondary'>Upload Laporan Pelatihan</h6><div class='example'><input type='file' id='file" + i + "' class='dropify-event fileget' name='berkas" + i + "'></div></div><input type='hidden' name='berkas" + i + "' id='file" + i + "'></div></div></div><input type='hidden' name='pemberkasan[]' id='berkas" + i + "'>");
              $(".fileget").fileinput({
                'maxFileSize': 25000,
                "dropZoneEnabled": false,
                "showPreview": false,
                'maxFileCount': 1,
                'uploadUrl': '<?= base_url("upload/ins") ?>' + i,
                'elErrorContainer': '#errorBlock1',
                'uploadAsync': true,
                uploadExtraData: function() {}
              });
              $("#file" + i).on('fileuploaded', function(event, data, previewId, index) {
                var response = data.response,
                  reader = data.reader;
                $("#berkas" + i).val(response.insfile + i);
              });
              $("#add").hide();
            }
          }
          if (i == 2) {
            $("#buttonrz").append('<button type="button" id="' + i + '" class="btn_remove btn btn-danger"><i class="fas fa-minus-square"></i> Instruktur</button>');
          }
        });


        $(document).on('click', '.btn_remove', function() {
          var button_id = i;
          if (button_id == 2) {
            $(this).hide();
          }
          $(".elemented" + button_id).remove();
          if (i < 10) {
            $("#add").show();
          }
          i--;
        });
      });


      if ($("#status").attr("dbval") == "Completed") {
        $("#status").prop("checked", true);
      }
    </script>