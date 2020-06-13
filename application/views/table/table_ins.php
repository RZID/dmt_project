  <?php
  switch ($this->session->userdata("access_num")) {
    case 1:
      $lv = "Super Admin";
      break;
    case 2:
      $lv = "PND";
      break;
    case 3:
      $lv = "Instruktur";
      break;
    case 4:
      $lv = "Operation";
      break;
    case 5:
      $lv = "Keuangan";
      break;
  }
  echo $this->session->flashdata("msg"); ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-12" id="cardTable">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Pelatihan</h6>
      </div>

      <div class="card-body" id="tableid">
        <div class="row">
          <div class="col-md col-xl">
            Menampilkan Max
            <select name='length_change' id='length_change'>
              <option value='10'>10</option>
              <option value='25'>25</option>
              <option value='50'>50</option>
              <option value='100'>100</option>
            </select>
            Entri
          </div>
          <div class="col-xl col-md">
            <div class="form-group">
              <input type="text" class="form-control" id="searchTab" aria-describedby="helpId" placeholder="Cari Data Pelatihan">
            </div>
          </div>
        </div>
        <div class="table-responsive" style="overflow-x: auto;">
          <table class="table tb_pelatihan table-bordered" style="white-space: nowrap" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="no-sort">No.</th>
                <th>Nama Pelatihan Dan Event</th>
                <th>Batch</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status Instruktur</th>
                <th class="no-sort">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $data_ontb = $dis->crud->select("plth_dmt");
              foreach ($data_ontb->result() as $row) { ?>
                <tr>
                  <td></td>
                  <td><?= $row->nama_plth ?></td>
                  <td><?= $row->batch_plth ?></td>
                  <td><?= date("d-m-Y", $row->tglmulai_plth) ?></td>
                  <td><?= date("d-m-Y", $row->tgldone_plth) ?></td>
                  <td><?php
                      $ins_get = $dis->crud->select_where("ins_dmt", array("id_plth" => $row->id_plth));
                      if ($ins_get->num_rows() < 1) {
                        echo "Pending";
                      } else {
                        echo $ins_get->row_array()["status_ins"];
                      } ?>
                  </td>
                  <td class="text-center">
                    <button type="button" class="btn btn-primary" onclick="see(<?= $row->id_plth ?>)"><i class="fas fa-eye"></i></button>
                    <!-- Modal -->

                    <a href="<?= base_url("user/ins_edit?id_pelatihan=") . $row->id_plth ?>"><button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button></a>
                  </td>
                  <!-- Modal -->
                  <div class="modal fade" id="modalSee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Detail Pelatihan (Instruktur)</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- Nama Pelatihan -->
                          <u>
                            <h5 class="font-weight-bold text-underlined">Detail Pelatihan</h5>
                          </u>
                          <div class="row">
                            <div class="col-xl col-lg">Nama Pelatihan</div>
                            :
                            <div class="col-xl col-lg" id="nmplth"></div>
                          </div>

                          <!-- Batch -->
                          <div class="row">
                            <div class="col-xl col-lg">Batch</div>
                            :
                            <div class="col-xl col-lg" id="bthplth"></div>
                          </div>

                          <!-- Tgl Mulai -->
                          <div class="row">
                            <div class="col-xl col-lg">Tanggal Mulai</div>
                            :
                            <div class="col-xl col-lg" id="tglmplth"></div>
                          </div>

                          <!-- Tgl Selesai -->
                          <div class="row">
                            <div class="col-xl col-lg">Tanggal Selesai</div>
                            :
                            <div class="col-xl col-lg" id="tglsplth"></div>
                          </div>

                          <!-- Sifat Pelatihan -->
                          <div class="row">
                            <div class="col-xl col-lg">Sifat Pelatihan</div>
                            :
                            <div class="col-xl col-lg" id="sifat"></div>
                          </div>

                          <!-- Vendor -->
                          <div class="row">
                            <div class="col-xl col-lg">Vendor atau Non Vendor</div>
                            :
                            <div class="col-xl col-lg" id="venonven"></div>
                          </div>
                          <hr>
                          <u>
                            <h5 class="font-weight-bold">Detail Instruktur</h5>
                          </u>
                          <!-- Instruktur 1 -->
                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">No. Vendor 1</div>
                            :
                            <div class="col-xl col-lg" id="noven1"></div>
                          </div>
                          <div class="row">
                            <div class="col-xl col-lg">Instruktur 1</div>
                            :
                            <div class="col-xl col-lg" id="ins1"></div>
                          </div>

                          <!-- Sesi Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">Sesi Instruktur 1</div>
                            :
                            <div class="col-xl col-lg" id="sesins1"></div>
                          </div>

                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">Biaya & Honor Transport Instruktur 1</div>
                            :
                            <div class="col-xl col-lg" id="beains1"></div>
                          </div>



                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">Surat Undangan Vendor 1</div>
                            :
                            <div class="col-xl col-lg" id="surund1"></div>
                          </div>
                          <br>
                          <!-- Instruktur 2 -->
                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">No. Vendor 2</div>
                            :
                            <div class="col-xl col-lg" id="noven2"></div>
                          </div>
                          <div class="row">
                            <div class="col-xl col-lg">Instruktur 2</div>
                            :
                            <div class="col-xl col-lg" id="ins2"></div>
                          </div>

                          <!-- Sesi Instruktur 2 -->
                          <div class="row">
                            <div class="col-xl col-lg">Sesi Instruktur 2</div>
                            :
                            <div class="col-xl col-lg" id="sesins2"></div>
                          </div>

                          <!-- Biaya & Honor Transport Instruktur 2 -->
                          <div class="row">
                            <div class="col-xl col-lg">Biaya & Honor Transport Instruktur 2</div>
                            :
                            <div class="col-xl col-lg" id="beains2"></div>
                          </div>


                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">Surat Undangan Vendor 2</div>
                            :
                            <div class="col-xl col-lg" id="surund2"></div>
                          </div>
                          <br>

                          <!-- Instruktur 3 -->
                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">No. Vendor 3</div>
                            :
                            <div class="col-xl col-lg" id="noven3"></div>
                          </div>
                          <div class="row">
                            <div class="col-xl col-lg">Instruktur 3</div>
                            :
                            <div class="col-xl col-lg" id="ins3"></div>
                          </div>

                          <!-- Sesi Instruktur 3 -->
                          <div class="row">
                            <div class="col-xl col-lg">Sesi Instruktur 3</div>
                            :
                            <div class="col-xl col-lg" id="sesins3"></div>
                          </div>

                          <!-- Biaya & Honor Transport Instruktur 3 -->
                          <div class="row">
                            <div class="col-xl col-lg">Biaya & Honor Transport Instruktur 3</div>
                            :
                            <div class="col-xl col-lg" id="beains3"></div>
                          </div>


                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">Surat Undangan Vendor 3</div>
                            :
                            <div class="col-xl col-lg" id="surund3"></div>
                          </div>
                          <br>

                          <!-- Instruktur 4 -->
                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">No. Vendor 4</div>
                            :
                            <div class="col-xl col-lg" id="noven4"></div>
                          </div>
                          <div class="row">
                            <div class="col-xl col-lg">Instruktur 4</div>
                            :
                            <div class="col-xl col-lg" id="ins4"></div>
                          </div>

                          <!-- Sesi Instruktur 4 -->
                          <div class="row">
                            <div class="col-xl col-lg">Sesi Instruktur 4</div>
                            :
                            <div class="col-xl col-lg" id="sesins4"></div>
                          </div>

                          <!-- Biaya & Honor Transport Instruktur 4 -->
                          <div class="row">
                            <div class="col-xl col-lg">Biaya & Honor Transport Instruktur 4</div>
                            :
                            <div class="col-xl col-lg" id="beains4"></div>
                          </div>



                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">Surat Undangan Vendor 4</div>
                            :
                            <div class="col-xl col-lg" id="surund4"></div>
                          </div>
                          <br>

                          <!-- Instruktur 5 -->
                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">No. Vendor 5</div>
                            :
                            <div class="col-xl col-lg" id="noven5"></div>
                          </div>
                          <div class="row">
                            <div class="col-xl col-lg">Instruktur 5</div>
                            :
                            <div class="col-xl col-lg" id="ins5"></div>
                          </div>

                          <!-- Sesi Instruktur 5 -->
                          <div class="row">
                            <div class="col-xl col-lg">Sesi Instruktur 5</div>
                            :
                            <div class="col-xl col-lg" id="sesins5"></div>
                          </div>

                          <!-- Biaya & Honor Transport Instruktur 5 -->
                          <div class="row">
                            <div class="col-xl col-lg">Biaya & Honor Transport Instruktur 5</div>
                            :
                            <div class="col-xl col-lg" id="beains5"></div>
                          </div>


                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">Surat Undangan Vendor 5</div>
                            :
                            <div class="col-xl col-lg" id="surund5"></div>
                          </div>
                          <br>

                          <!-- Instruktur 5 -->
                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">No. Vendor 6</div>
                            :
                            <div class="col-xl col-lg" id="noven6"></div>
                          </div>
                          <div class="row">
                            <div class="col-xl col-lg">Instruktur 6</div>
                            :
                            <div class="col-xl col-lg" id="ins6"></div>
                          </div>

                          <!-- Sesi Instruktur 5 -->
                          <div class="row">
                            <div class="col-xl col-lg">Sesi Instruktur 6</div>
                            :
                            <div class="col-xl col-lg" id="sesins6"></div>
                          </div>

                          <!-- Biaya & Honor Transport Instruktur 5 -->
                          <div class="row">
                            <div class="col-xl col-lg">Biaya & Honor Transport Instruktur 6</div>
                            :
                            <div class="col-xl col-lg" id="beains6"></div>
                          </div>


                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">Surat Undangan Vendor 6</div>
                            :
                            <div class="col-xl col-lg" id="surund6"></div>
                          </div>
                          <br>

                          <!-- Instruktur 5 -->
                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">No. Vendor 7</div>
                            :
                            <div class="col-xl col-lg" id="noven7"></div>
                          </div>
                          <div class="row">
                            <div class="col-xl col-lg">Instruktur 7</div>
                            :
                            <div class="col-xl col-lg" id="ins7"></div>
                          </div>

                          <!-- Sesi Instruktur 5 -->

                          <div class="row">
                            <div class="col-xl col-lg">Sesi Instruktur 7</div>
                            :
                            <div class="col-xl col-lg" id="sesins7"></div>
                          </div>

                          <!-- Biaya & Honor Transport Instruktur 5 -->
                          <div class="row">
                            <div class="col-xl col-lg">Biaya & Honor Transport Instruktur 7</div>
                            :
                            <div class="col-xl col-lg" id="beains7"></div>
                          </div>


                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">Surat Undangan Vendor 7</div>
                            :
                            <div class="col-xl col-lg" id="surund7"></div>
                          </div>
                          <br>

                          <!-- Instruktur 5 -->
                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">No. Vendor 8</div>
                            :
                            <div class="col-xl col-lg" id="noven8"></div>
                          </div>
                          <div class="row">
                            <div class="col-xl col-lg">Instruktur 8</div>
                            :
                            <div class="col-xl col-lg" id="ins8"></div>
                          </div>

                          <!-- Sesi Instruktur 5 -->
                          <div class="row">
                            <div class="col-xl col-lg">Sesi Instruktur 8</div>
                            :
                            <div class="col-xl col-lg" id="sesins8"></div>
                          </div>

                          <!-- Biaya & Honor Transport Instruktur 5 -->
                          <div class="row">
                            <div class="col-xl col-lg">Biaya & Honor Transport Instruktur 8</div>
                            :
                            <div class="col-xl col-lg" id="beains8"></div>
                          </div>


                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">Surat Undangan Vendor 8</div>
                            :
                            <div class="col-xl col-lg" id="surund8"></div>
                          </div>
                          <br>

                          <!-- Instruktur 5 -->
                          <div class="row">
                            <div class="col-xl col-lg">No. Vendor 9</div>
                            :
                            <div class="col-xl col-lg" id="noven9"></div>
                          </div>
                          <div class="row">
                            <div class="col-xl col-lg">Instruktur 9</div>
                            :
                            <div class="col-xl col-lg" id="ins9"></div>
                          </div>

                          <!-- Sesi Instruktur 5 -->
                          <div class="row">
                            <div class="col-xl col-lg">Sesi Instruktur 9</div>
                            :
                            <div class="col-xl col-lg" id="sesins9"></div>
                          </div>

                          <!-- Biaya & Honor Transport Instruktur 5 -->
                          <div class="row">
                            <div class="col-xl col-lg">Biaya & Honor Transport Instruktur 9</div>
                            :
                            <div class="col-xl col-lg" id="beains9"></div>
                          </div>
                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">No. Vendor 9</div>
                            :
                            <div class="col-xl col-lg" id="noven9"></div>
                          </div>

                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">Surat Undangan Vendor 9</div>
                            :
                            <div class="col-xl col-lg" id="surund9"></div>
                          </div>
                          <br>

                          <!-- Instruktur 5 -->
                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">No. Vendor 10</div>
                            :
                            <div class="col-xl col-lg" id="noven10"></div>
                          </div>
                          <div class="row">
                            <div class="col-xl col-lg">Instruktur 10</div>
                            :
                            <div class="col-xl col-lg" id="ins10"></div>
                          </div>

                          <!-- Sesi Instruktur 5 -->
                          <div class="row">
                            <div class="col-xl col-lg">Sesi Instruktur 10</div>
                            :
                            <div class="col-xl col-lg" id="sesins10"></div>
                          </div>

                          <!-- Biaya & Honor Transport Instruktur 5 -->
                          <div class="row">
                            <div class="col-xl col-lg">Biaya & Honor Transport Instruktur 10</div>
                            :
                            <div class="col-xl col-lg" id="beains10"></div>
                          </div>


                          <!-- Biaya & Honor Transport Instruktur 1 -->
                          <div class="row">
                            <div class="col-xl col-lg">Surat Undangan Vendor 10</div>
                            :
                            <div class="col-xl col-lg" id="surund10"></div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                        </div>

                      <?php

                    }
                      ?>
                </tr>


            </tbody>
          </table>

        </div>
        <div class="pt-3 row">
          <div class="col-md"><span id="show_data"></span></div>
          <div class="col-md d-flex justify-content-end">
            <div id="pagination"></div>
          </div>
        </div>


      </div>
    </div>
  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

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
        <div class="modal-body"></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?= base_url("home/logout") ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripting With JS -->
  <script>
    $("#keluarData").on("click", function() {
      $(".modal-body").html("Klik logout untuk mengakhiri sesi login anda.");

    });

    function rupiahisasi(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function see(id) {
      $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
          id_pelatihan: id
        },
        url: "<?= base_url("user/ajaxgetdata") ?>",
        success: function(data) {
          $(document).ready(function() {
            var tglmulai = $.format.date(new Date(data[0].tglmulai_plth * 1000), 'dd MMMM yyyy');
            var tglselesai = $.format.date(new Date(data[0].tgldone_plth * 1000), 'dd MMMM yyyy');
            $("#nmplth").html(data[0].nama_plth);
            $("#bthplth").html(data[0].batch_plth);
            $("#tglmplth").html(tglmulai);
            $("#tglsplth").html(tglselesai);
            $("#jmlpsrt").html(data[0].jmlpsrt_plth);
            $("#sifat").html(data[0].sifat_plth);
            $("#venonven").html(data[0].vendor_plth);

          });
        }
      });
      $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
          id_pelatihan: id
        },
        url: "<?= base_url("user/ajaxgetdata_ins") ?>",
        success: function(data2) {
          $(document).ready(function() {
            var len = data2.length;
            if (len >= 1) {
              $("#ins1").html(data2[0].ins1_ins);
              $("#ins2").html(data2[0].ins2_ins);
              $("#ins3").html(data2[0].ins3_ins);
              $("#ins4").html(data2[0].ins4_ins);
              $("#ins5").html(data2[0].ins5_ins);
              $("#ins6").html(data2[0].ins6_ins);
              $("#ins7").html(data2[0].ins7_ins);
              $("#ins8").html(data2[0].ins8_ins);
              $("#ins9").html(data2[0].ins9_ins);
              $("#ins10").html(data2[0].ins10_ins);

              $("#sesins1").html(data2[0].sesins1_ins);
              $("#sesins2").html(data2[0].sesins2_ins);
              $("#sesins3").html(data2[0].sesins3_ins);
              $("#sesins4").html(data2[0].sesins4_ins);
              $("#sesins5").html(data2[0].sesins5_ins);
              $("#sesins6").html(data2[0].sesins6_ins);
              $("#sesins7").html(data2[0].sesins7_ins);
              $("#sesins8").html(data2[0].sesins8_ins);
              $("#sesins9").html(data2[0].sesins9_ins);
              $("#sesins10").html(data2[0].sesins10_ins);

              $("#beains1").html(rupiahisasi(data2[0].beasesins1_ins, "Rp. ") + ",-");
              $("#beains2").html(rupiahisasi(data2[0].beasesins2_ins, "Rp. ") + ",-");
              $("#beains3").html(rupiahisasi(data2[0].beasesins3_ins, "Rp. ") + ",-");
              $("#beains4").html(rupiahisasi(data2[0].beasesins4_ins, "Rp. ") + ",-");
              $("#beains5").html(rupiahisasi(data2[0].beasesins5_ins, "Rp. ") + ",-");
              $("#beains6").html(rupiahisasi(data2[0].beasesins6_ins, "Rp. ") + ",-");
              $("#beains7").html(rupiahisasi(data2[0].beasesins7_ins, "Rp. ") + ",-");
              $("#beains8").html(rupiahisasi(data2[0].beasesins8_ins, "Rp. ") + ",-");
              $("#beains9").html(rupiahisasi(data2[0].beasesins9_ins, "Rp. ") + ",-");
              $("#beains10").html(rupiahisasi(data2[0].beasesins10_ins, "Rp. ") + ",-");

              $("#noven1").html(data2[0].noven1_ins);
              $("#noven2").html(data2[0].noven2_ins);
              $("#noven3").html(data2[0].noven3_ins);
              $("#noven4").html(data2[0].noven4_ins);
              $("#noven5").html(data2[0].noven5_ins);
              $("#noven6").html(data2[0].noven6_ins);
              $("#noven7").html(data2[0].noven7_ins);
              $("#noven8").html(data2[0].noven8_ins);
              $("#noven9").html(data2[0].noven9_ins);
              $("#noven10").html(data2[0].noven10_ins);

              if (data2[0].surund1_ins != "N/A") {
                $("#surund1").html("<a href='<?= base_url("assets/uploaded_file/") ?>" + data2[0].surund1_ins + "'>" + data2[0].surund1_ins + "</a>");
              } else {
                $("#surund1").html("<a>" + data2[0].surund1_ins + "</a>");
              }
              if (data2[0].surund2_ins != "N/A") {
                $("#surund2").html("<a href='<?= base_url("assets/uploaded_file/") ?>" + data2[0].surund2_ins + "'>" + data2[0].surund2_ins + "</a>");
              } else {
                $("#surund2").html("<a>" + data2[0].surund2_ins + "</a>");
              }
              if (data2[0].surund3_ins != "N/A") {
                $("#surund3").html("<a href='<?= base_url("assets/uploaded_file/") ?>" + data2[0].surund3_ins + "'>" + data2[0].surund3_ins + "</a>");
              } else {
                $("#surund3").html("<a>" + data2[0].surund3_ins + "</a>");
              }
              if (data2[0].surund4_ins != "N/A") {
                $("#surund4").html("<a href='<?= base_url("assets/uploaded_file/") ?>" + data2[0].surund4_ins + "'>" + data2[0].surund4_ins + "</a>");
              } else {
                $("#surund4").html("<a>" + data2[0].surund4_ins + "</a>");
              }
              if (data2[0].surund5_ins != "N/A") {
                $("#surund5").html("<a href='<?= base_url("assets/uploaded_file/") ?>" + data2[0].surund5_ins + "'>" + data2[0].surund5_ins + "</a>");
              } else {
                $("#surund5").html("<a>" + data2[0].surund5_ins + "</a>");
              }
              if (data2[0].surund6_ins != "N/A") {
                $("#surund6").html("<a href='<?= base_url("assets/uploaded_file/") ?>" + data2[0].surund6_ins + "'>" + data2[0].surund6_ins + "</a>");
              } else {
                $("#surund6").html("<a>" + data2[0].surund6_ins + "</a>");
              }
              if (data2[0].surund7_ins != "N/A") {
                $("#surund7").html("<a href='<?= base_url("assets/uploaded_file/") ?>" + data2[0].surund7_ins + "'>" + data2[0].surund7_ins + "</a>");
              } else {
                $("#surund7").html("<a>" + data2[0].surund7_ins + "</a>");
              }
              if (data2[0].surund8_ins != "N/A") {
                $("#surund8").html("<a href='<?= base_url("assets/uploaded_file/") ?>" + data2[0].surund8_ins + "'>" + data2[0].surund8_ins + "</a>");
              } else {
                $("#surund8").html("<a>" + data2[0].surund8_ins + "</a>");
              }
              if (data2[0].surund9_ins != "N/A") {
                $("#surund9").html("<a href='<?= base_url("assets/uploaded_file/") ?>" + data2[0].surund9_ins + "'>" + data2[0].surund9_ins + "</a>");
              } else {
                $("#surund9").html("<a>" + data2[0].surund9_ins + "</a>");
              }
              if (data2[0].surund10_ins != "N/A") {
                $("#surund10").html("<a href='<?= base_url("assets/uploaded_file/") ?>" + data2[0].surund10_ins + "'>" + data2[0].surund10_ins + "</a>");
              } else {
                $("#surund10").html("<a>" + data2[0].surund10_ins + "</a>");
              }
            } else {
              var nulled = "Belum Diatur";
              $("#ins1").html("<a class='text-danger'>" + nulled + "</a>");
              $("#ins2").html("<a class='text-danger'>" + nulled + "</a>");
              $("#ins3").html("<a class='text-danger'>" + nulled + "</a>");
              $("#ins4").html("<a class='text-danger'>" + nulled + "</a>");
              $("#ins5").html("<a class='text-danger'>" + nulled + "</a>");
              $("#ins6").html("<a class='text-danger'>" + nulled + "</a>");
              $("#ins7").html("<a class='text-danger'>" + nulled + "</a>");
              $("#ins8").html("<a class='text-danger'>" + nulled + "</a>");
              $("#ins9").html("<a class='text-danger'>" + nulled + "</a>");
              $("#ins10").html("<a class='text-danger'>" + nulled + "</a>");

              $("#sesins1").html("<a class='text-danger'>" + nulled + "</a>");
              $("#sesins2").html("<a class='text-danger'>" + nulled + "</a>");
              $("#sesins3").html("<a class='text-danger'>" + nulled + "</a>");
              $("#sesins4").html("<a class='text-danger'>" + nulled + "</a>");
              $("#sesins5").html("<a class='text-danger'>" + nulled + "</a>");
              $("#sesins6").html("<a class='text-danger'>" + nulled + "</a>");
              $("#sesins7").html("<a class='text-danger'>" + nulled + "</a>");
              $("#sesins8").html("<a class='text-danger'>" + nulled + "</a>");
              $("#sesins9").html("<a class='text-danger'>" + nulled + "</a>");
              $("#sesins10").html("<a class='text-danger'>" + nulled + "</a>");

              $("#beains1").html("<a class='text-danger'>" + nulled + "</a>");
              $("#beains2").html("<a class='text-danger'>" + nulled + "</a>");
              $("#beains3").html("<a class='text-danger'>" + nulled + "</a>");
              $("#beains4").html("<a class='text-danger'>" + nulled + "</a>");
              $("#beains5").html("<a class='text-danger'>" + nulled + "</a>");
              $("#beains6").html("<a class='text-danger'>" + nulled + "</a>");
              $("#beains7").html("<a class='text-danger'>" + nulled + "</a>");
              $("#beains8").html("<a class='text-danger'>" + nulled + "</a>");
              $("#beains9").html("<a class='text-danger'>" + nulled + "</a>");
              $("#beains10").html("<a class='text-danger'>" + nulled + "</a>");

              $("#noven1").html("<a class='text-danger'>" + nulled + "</a>");
              $("#noven2").html("<a class='text-danger'>" + nulled + "</a>");
              $("#noven3").html("<a class='text-danger'>" + nulled + "</a>");
              $("#noven4").html("<a class='text-danger'>" + nulled + "</a>");
              $("#noven5").html("<a class='text-danger'>" + nulled + "</a>");
              $("#noven6").html("<a class='text-danger'>" + nulled + "</a>");
              $("#noven7").html("<a class='text-danger'>" + nulled + "</a>");
              $("#noven8").html("<a class='text-danger'>" + nulled + "</a>");
              $("#noven9").html("<a class='text-danger'>" + nulled + "</a>");
              $("#noven10").html("<a class='text-danger'>" + nulled + "</a>");

              $("#surund1").html("<a class='text-danger'>" + nulled + "</a>");
              $("#surund2").html("<a class='text-danger'>" + nulled + "</a>");
              $("#surund3").html("<a class='text-danger'>" + nulled + "</a>");
              $("#surund4").html("<a class='text-danger'>" + nulled + "</a>");
              $("#surund5").html("<a class='text-danger'>" + nulled + "</a>");
              $("#surund6").html("<a class='text-danger'>" + nulled + "</a>");
              $("#surund7").html("<a class='text-danger'>" + nulled + "</a>");
              $("#surund8").html("<a class='text-danger'>" + nulled + "</a>");
              $("#surund9").html("<a class='text-danger'>" + nulled + "</a>");
              $("#surund10").html("<a class='text-danger'>" + nulled + "</a>");
            }
          });
        }
      });
      $('#modalSee').modal('show');
      return false;
    }

    $(document).ready(function() {
      var t = $('.tb_pelatihan').DataTable({
        "language": {
          "lengthMenu": "Menampilkan _MENU_ data per halaman",
          "zeroRecords": "<div class='alert alert-danger' role='alert'>Data Tidak Ditemukan!</div>",
          "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
          "infoEmpty": "Data tidak ditemukan",
          "infoFiltered": "(filter dari _MAX_ total data)",
          "paginate": {
            "previous": "Sebelumnya",
            "next": "Selanjutnya",
          }
        },

        "fnRowCallback": function(nRow, aData, iDisplayIndex) {
          var index = iDisplayIndex + 1;
          $('td:eq(0)', nRow).html(index);

          if (aData[5] == "Pending") {
            $(nRow).find('td:eq(5)').addClass('bg-warning text-white font-weight-bold');
          }
          if (aData[5] == 'Completed') {
            $(nRow).find('td:eq(5)').addClass('bg-success text-white font-weight-bold');
          }

        },
        initComplete: (settings, json) => {
          $("#dataTable_info").appendTo("#show_data");
          $("#dataTable_paginate").appendTo("#pagination");


        },
        "bLengthChange": false,
        sDom: 'lrtip',
        "columnDefs": [{
          "targets": "no-sort",
          "orderable": false
        }, {
          "searchable": false,
          "orderable": false,
          "targets": 0

        }],
        "order": [
          [1, 'asc']
        ],

        // dom: "<'pb-3'pi>"
      });

      // $('.table-responsive').css('display', 'block');
      t.columns.adjust().draw();

      $('#length_change').change(function() {
        t.page.len($(this).val()).draw();
      });

      $('#length_change').val(t.page.len());
      $('#searchTab').keyup(function() {
        t.search($(this).val()).draw();
      });

      t.on('order.dt search.dt', function() {
        t.column(0, {
          search: 'applied',
          order: 'applied'
        }).nodes().each(function(cell, i) {
          cell.innerHTML = i + 1;
        });
      });
    });
  </script>