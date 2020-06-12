<style>
  .custom-file-input~.custom-file-label::after {
    content: "Browse...";
  }
</style>
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
            <input type="hidden" class="form-control form-control-user" name="id" value="<?= $whdb['id_plth'] ?>" />
            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary">Nama Pelatihan</h6>
              <input type="text" class="form-control form-control-user" placeholder="Nama User" name="nama" value="<?= $whdb['nama_plth'] ?>" disabled>
            </div>

            <!-- Awal Instruktur -->
            <br>
            <h5>Data Instruktur 1</h5>
            <hr>
            <div class="form-group">
              <h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6>
              <input type="number" class="form-control form-control-user" id="checker" name="ins1" value="<?= $whdb2['ins1_ins'] ?>" indexing="<?= $whdb2['ins1_ins'] ?>">
            </div>
            <div class="row">
              <div class="col-lg col-xl">
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6>
                  <input type="text" class="form-control form-control-user" id="checker" name="ins1" value="<?= $whdb2['ins1_ins'] ?>" indexing="<?= $whdb2['ins1_ins'] ?>">
                </div>
              </div>
              <div class="col-lg col-xl">
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                  <input type="number" class="form-control form-control-user" name="sesins1" value="<?= $whdb2['sesins1_ins'] ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg col-xl">
                <div class="form-group">
                  <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                  <input type="number" class="form-control form-control-user" name="beains1" value="<?= $whdb2['beasesins1_ins'] ?>">
                </div>
              </div>
              <div class="col-lg col-xl">
                <h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6>
                <div class="custom-file" id="customFile" lang="es">
                  <input type="file" id="file1" class="file1 custom-file-input" name="file1" aria-describedby="fileHelp">
                  <label class="custom-file-label" for="#">
                    Dokumen Sebelumnya : <?= $whdb2["surund1_ins"] ?>
                  </label>
                </div>
              </div>
            </div>

            <!-- Akhir Instruktur -->
            <div id="dynamic_field" data-valdb="<?php if ($whdb2["ins1_ins"] == "") {
                                                  echo "N/A";
                                                } else {
                                                  echo $whdb2["ins1_ins"];
                                                }  ?>"></div>


            <!-- End Example events -->
            <p></p>
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
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Scripting With JS -->
    <script>
      $(document).ready(function() {
        if ($("#dynamic_field").attr("data-valdb") != "N/A") {
          var i = 10;
          $('#dynamic_field').append('<div class="elemented2"><br><h5>Data Instruktur 2</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6><input type="number" class="form-control form-control-user" id="checker" name="ins2" value="<?= $whdb2['ins2_ins'] ?>" indexing="<?= $whdb2['ins2_ins'] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6><input type="text" class="form-control form-control-user" id="checker" name="ins2" value="<?= $whdb2['ins2_ins'] ?>" indexing="<?= $whdb2['ins2_ins'] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins2" value="<?= $whdb2['sesins2_ins'] ?>"></div></div></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains2" value="<?= $whdb2['beasesins2_ins'] ?>"></div></div><div class="col-lg col-xl"><h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6><div class="custom-file" id="customFile" lang="es"><input type="file" id="file2" class="file2 custom-file-input" name="file2" aria-describedby="fileHelp"><label class="custom-file-label" for="file2">Dokumen Sebelumnya : <?= $whdb2["surund2_ins"] ?></label></div></div></div></div>');
          $('#dynamic_field').append('<div class="elemented3"><br><h5>Data Instruktur 3</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6><input type="number" class="form-control form-control-user" id="checker" name="ins3" value="<?= $whdb2['ins3_ins'] ?>" indexing="<?= $whdb2['ins3_ins'] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6><input type="text" class="form-control form-control-user" id="checker" name="ins3" value="<?= $whdb2['ins3_ins'] ?>" indexing="<?= $whdb2['ins3_ins'] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins3" value="<?= $whdb2['sesins3_ins'] ?>"></div></div></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains3" value="<?= $whdb2['beasesins3_ins'] ?>"></div></div><div class="col-lg col-xl"><h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6><div class="custom-file" id="customFile" lang="es"><input type="file" id="file3" class="file3 custom-file-input" name="file3" aria-describedby="fileHelp"><label class="custom-file-label" for="file3">Dokumen Sebelumnya : <?= $whdb2["surund3_ins"] ?></label></div></div></div></div>');
          $('#dynamic_field').append('<div class="elemented4"><br><h5>Data Instruktur 4</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6><input type="number" class="form-control form-control-user" id="checker" name="ins4" value="<?= $whdb2['ins4_ins'] ?>" indexing="<?= $whdb2['ins4_ins'] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6><input type="text" class="form-control form-control-user" id="checker" name="ins4" value="<?= $whdb2['ins4_ins'] ?>" indexing="<?= $whdb2['ins4_ins'] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins4" value="<?= $whdb2['sesins4_ins'] ?>"></div></div></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains4" value="<?= $whdb2['beasesins4_ins'] ?>"></div></div><div class="col-lg col-xl"><h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6><div class="custom-file" id="customFile" lang="es"><input type="file" id="file4" class="file4 custom-file-input" name="file4" aria-describedby="fileHelp"><label class="custom-file-label" for="file4">Dokumen Sebelumnya : <?= $whdb2["surund4_ins"] ?></label></div></div></div></div>');
          $('#dynamic_field').append('<div class="elemented5"><br><h5>Data Instruktur 5</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6><input type="number" class="form-control form-control-user" id="checker" name="ins5" value="<?= $whdb2['ins5_ins'] ?>" indexing="<?= $whdb2['ins5_ins'] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6><input type="text" class="form-control form-control-user" id="checker" name="ins5" value="<?= $whdb2['ins5_ins'] ?>" indexing="<?= $whdb2['ins5_ins'] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins5" value="<?= $whdb2['sesins5_ins'] ?>"></div></div></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains5" value="<?= $whdb2['beasesins5_ins'] ?>"></div></div><div class="col-lg col-xl"><h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6><div class="custom-file" id="customFile" lang="es"><input type="file" id="file5" class="file5 custom-file-input" name="file5" aria-describedby="fileHelp"><label class="custom-file-label" for="file5">Dokumen Sebelumnya : <?= $whdb2["surund5_ins"] ?></label></div></div></div></div>');
          $('#dynamic_field').append('<div class="elemented6"><br><h5>Data Instruktur 6</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6><input type="number" class="form-control form-control-user" id="checker" name="ins6" value="<?= $whdb2['ins6_ins'] ?>" indexing="<?= $whdb2['ins6_ins'] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6><input type="text" class="form-control form-control-user" id="checker" name="ins6" value="<?= $whdb2['ins6_ins'] ?>" indexing="<?= $whdb2['ins6_ins'] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins6" value="<?= $whdb2['sesins6_ins'] ?>"></div></div></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains6" value="<?= $whdb2['beasesins6_ins'] ?>"></div></div><div class="col-lg col-xl"><h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6><div class="custom-file" id="customFile" lang="es"><input type="file" id="file6" class="file6 custom-file-input" name="file6" aria-describedby="fileHelp"><label class="custom-file-label" for="file6">Dokumen Sebelumnya : <?= $whdb2["surund6_ins"] ?></label></div></div></div></div>');
          $('#dynamic_field').append('<div class="elemented7"><br><h5>Data Instruktur 7</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6><input type="number" class="form-control form-control-user" id="checker" name="ins7" value="<?= $whdb2['ins7_ins'] ?>" indexing="<?= $whdb2['ins7_ins'] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6><input type="text" class="form-control form-control-user" id="checker" name="ins7" value="<?= $whdb2['ins7_ins'] ?>" indexing="<?= $whdb2['ins7_ins'] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins7" value="<?= $whdb2['sesins7_ins'] ?>"></div></div></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains7" value="<?= $whdb2['beasesins7_ins'] ?>"></div></div><div class="col-lg col-xl"><h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6><div class="custom-file" id="customFile" lang="es"><input type="file" id="file7" class="file7 custom-file-input" name="file7" aria-describedby="fileHelp"><label class="custom-file-label" for="file7">Dokumen Sebelumnya : <?= $whdb2["surund7_ins"] ?></label></div></div></div></div>');
          $('#dynamic_field').append('<div class="elemented8"><br><h5>Data Instruktur 8</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6><input type="number" class="form-control form-control-user" id="checker" name="ins8" value="<?= $whdb2['ins8_ins'] ?>" indexing="<?= $whdb2['ins8_ins'] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6><input type="text" class="form-control form-control-user" id="checker" name="ins8" value="<?= $whdb2['ins8_ins'] ?>" indexing="<?= $whdb2['ins8_ins'] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins8" value="<?= $whdb2['sesins8_ins'] ?>"></div></div></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains8" value="<?= $whdb2['beasesins8_ins'] ?>"></div></div><div class="col-lg col-xl"><h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6><div class="custom-file" id="customFile" lang="es"><input type="file" id="file8" class="file8 custom-file-input" name="file8" aria-describedby="fileHelp"><label class="custom-file-label" for="file8">Dokumen Sebelumnya : <?= $whdb2["surund8_ins"] ?></label></div></div></div></div>');
          $('#dynamic_field').append('<div class="elemented9"><br><h5>Data Instruktur 9</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6><input type="number" class="form-control form-control-user" id="checker" name="ins9" value="<?= $whdb2['ins9_ins'] ?>" indexing="<?= $whdb2['ins9_ins'] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6><input type="text" class="form-control form-control-user" id="checker" name="ins9" value="<?= $whdb2['ins9_ins'] ?>" indexing="<?= $whdb2['ins9_ins'] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins9" value="<?= $whdb2['sesins9_ins'] ?>"></div></div></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains9" value="<?= $whdb2['beasesins9_ins'] ?>"></div></div><div class="col-lg col-xl"><h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6><div class="custom-file" id="customFile" lang="es"><input type="file" id="file9" class="file9 custom-file-input" name="file9" aria-describedby="fileHelp"><label class="custom-file-label" for="file9">Dokumen Sebelumnya : <?= $whdb2["surund9_ins"] ?></label></div></div></div></div>');
          $('#dynamic_field').append('<div class="elemented10"><br><h5>Data Instruktur 10</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6><input type="number" class="form-control form-control-user" id="checker" name="ins10" value="<?= $whdb2['ins10_ins'] ?>" indexing="<?= $whdb2['ins10_ins'] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6><input type="text" class="form-control form-control-user" id="checker" name="ins10" value="<?= $whdb2['ins10_ins'] ?>" indexing="<?= $whdb2['ins10_ins'] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins10" value="<?= $whdb2['sesins10_ins'] ?>"></div></div></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains10" value="<?= $whdb2['beasesins10_ins'] ?>"></div></div><div class="col-lg col-xl"><h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6><div class="custom-file" id="customFile" lang="es"><input type="file" id="file10" class="file10 custom-file-input" name="file10" aria-describedby="fileHelp"><label class="custom-file-label" for="file10">Dokumen Sebelumnya : <?= $whdb2["surund10_ins"] ?></label></div></div></div></div>');

          $("#add").hide();
        } else {
          var i = 1;
        }

        $('#add').click(function() {
          i++;
          if (i < 10) {
            $('#dynamic_field').append('<div class="elemented' + i + '"><br><h5>Data Instruktur ' + i + '</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6><input type="number" class="form-control form-control-user" id="checker" name="ins' + i + '"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6><input type="text" class="form-control form-control-user" id="checker" name="ins' + i + '"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins' + i + '"></div></div></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains' + i + '"></div></div><div class="col-lg col-xl"><h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6><div class="custom-file" id="customFile" lang="es"><input type="file" id="#" class="custom-file-input" name="#" aria-describedby="fileHelp"><label class="custom-file-label" for="#">Dokumen Sebelumnya :</label></div></div></div></div>');
          } else {
            if (i = 10) {
              $('#dynamic_field').append('<div class="elemented' + i + '"><br><h5>Data Instruktur ' + i + '</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> No. Vendor</h6><input type="number" class="form-control form-control-user" id="checker" name="ins' + i + '"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary"> Nama Instruktur</h6><input type="text" class="form-control form-control-user" id="checker" name="ins' + i + '"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins' + i + '"></div></div></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains' + i + '"></div></div><div class="col-lg col-xl"><h6 class="m-0 font-weight-bold text-secondary">Surat Undangan</h6><div class="custom-file" id="customFile" lang="es"><input type="file" id="#" class="custom-file-input" name="#" aria-describedby="fileHelp"><label class="custom-file-label" for="#">Dokumen Sebelumnya :</label></div></div></div></div>');
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
          if (i == 10) {
            $("#add").show();
          }
          i--;
        });
      });

      if ($("#status").attr("dbval") == "Completed") {
        $("#status").prop("checked", true);
      }

      document.querySelector('#file1').addEventListener('change', function(e) {
        var fileName = document.getElementById("file1").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
      });
      document.querySelector('#file2').addEventListener('change', function(e) {
        var fileName = document.getElementById("file2").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
      });
      document.querySelector('#file3').addEventListener('change', function(e) {
        var fileName = document.getElementById("file3").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
      });
      document.querySelector('#file4').addEventListener('change', function(e) {
        var fileName = document.getElementById("file4").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
      });
      document.querySelector('#file5').addEventListener('change', function(e) {
        var fileName = document.getElementById("file5").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
      });
      document.querySelector('#file6').addEventListener('change', function(e) {
        var fileName = document.getElementById("file6").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
      });
      document.querySelector('#file7').addEventListener('change', function(e) {
        var fileName = document.getElementById("file7").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
      });
      document.querySelector('#file8').addEventListener('change', function(e) {
        var fileName = document.getElementById("file8").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
      });
      document.querySelector('#file9').addEventListener('change', function(e) {
        var fileName = document.getElementById("file9").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
      });
      document.querySelector('#file10').addEventListener('change', function(e) {
        var fileName = document.getElementById("file10").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
      });
    </script>