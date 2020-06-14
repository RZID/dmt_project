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
        <h6 class="m-0 font-weight-bold text-primary">Tabel Kelengkapan Peserta</h6>
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
                <th>Jumlah Peserta</th>
                <th>Sifat</th>
                <th>Vendor atau Non Vendor</th>
                <th>Sertifikasi</th>
                <th>Nama Vendor</th>
                <th>Harga Kesepakatan Vendor</th>
                <th>Keterangan Kesepakatan Vendor</th>
                <th>Memo Pemanggilan</th>
                <th>Status Kelengkapan Peserta (PND)</th>
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
                  <td><?php $jmlplth = $dis->crud->select_where("opr_dmt", array("id_plth", $row->id_plth))->row_array();
                      if ($jmlplth["jmlpsrt_plth"] == NULL) {
                        echo "Belum Diinput Operation";
                      } else {
                        echo $jmlplth["jmlpsrt_plth"];
                      } ?></td>
                  <td><?= $row->sifat_plth ?></td>
                  <td><?= $row->vendor_plth ?></td>
                  <td><?= $row->sertifikasi_plth ?></td>
                  <td><?= $row->nmvendor_plth ?></td>
                  <td><?= $dis->Miscellaneous->rupiahisasi($row->hrgkspvend_plth) ?>,-</td>
                  <td><?= $row->ketkspvend_plth ?></td>
                  <td><?php if ($row->uniquefile_plth != "N/A") { ?>
                      <a href="<?= base_url("assets/uploaded_file/") . $row->uniquefile_plth ?>"><?= $row->memopem_plth ?></a>
                    <?php } else { ?>
                      <a><?= $row->memopem_plth ?></a>
                    <?php } ?></td>
                  <td><?php
                      $opr_get = $dis->crud->select_where("pesertapnd_dmt", array("id_plth" => $row->id_plth));
                      if ($opr_get->num_rows() < 1) {
                        echo "Pending";
                      } else {
                        echo $opr_get->row_array()["status_pesertapnd"];
                      } ?>
                  </td>
                  <td class="text-center">
                    <!-- Modal -->
                    <button onclick="see(<?= $row->id_plth ?>)" type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                    <a href="<?= base_url("user/edit_peserta_pnd?id_pelatihan=") . $row->id_plth ?>"><button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button></a>
                  </td>
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
  <div class="modal fade" id="seeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Kelengkapan Peserta (PND)</h5>
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
            <h5 class="font-weight-bold">Detail Kelengkapan Peserta (PND)</h5>
          </u>
          <!-- Vendor -->
          <div class="row">
            <div class="col-xl col-lg">Tarif Pelatihan</div>
            :
            <div class="col-xl col-lg" id="pesertapnd1"></div>
          </div>
          <!-- Vendor -->
          <div class="row">
            <div class="col-xl col-lg">Jumlah Yang Ditagih</div>
            :
            <div class="col-xl col-lg" id="pesertapnd2"></div>
          </div>
          <!-- Vendor -->
          <div class="row">
            <div class="col-xl col-lg">Nama PT Yang Mengikuti</div>
            :
            <div class="col-xl col-lg" id="pesertapnd3"></div>
          </div>
          <!-- Vendor -->
          <div class="row">
            <div class="col-xl col-lg">Surat Undangan</div>
            :
            <div class="col-xl col-lg" id="pesertapnd4"></div>
          </div>
          <!-- Vendor -->
          <div class="row">
            <div class="col-xl col-lg">Status</div>
            :
            <div class="col-xl col-lg" id="pesertapnd5"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
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
        url: "<?= base_url("user/ajaxgetdata_pstpnd") ?>",
        success: function(data2) {
          $(document).ready(function() {
            var len = data2.length;
            if (len >= 1) {
              $("#pesertapnd1").html(rupiahisasi(data2[0].trfplth_pesertapnd, "Rp.") + ",-");
              $("#pesertapnd2").html(data2[0].jmldtgh_pesertapnd);
              $("#pesertapnd3").html(data2[0].nmptmeng_pesertapnd);
              $("#pesertapnd4").html("<a href='<?= base_url("assets/uploaded_file/") ?>" + data2[0].rawsurund_pesertapnd + "'>" + data2[0].surund_pesertapnd + "</a>");
              $("#pesertapnd5").html(data2[0].status_pesertapnd);
            } else {
              var nulled = "Belum Diatur";
              $("#pesertapnd1").html("<a class='text-danger'>" + nulled + "</a>");
              $("#pesertapnd2").html("<a class='text-danger'>" + nulled + "</a>");
              $("#pesertapnd3").html("<a class='text-danger'>" + nulled + "</a>");
              $("#pesertapnd4").html("<a class='text-danger'>" + nulled + "</a>");
              $("#pesertapnd5").html("<a class='text-danger'>" + nulled + "</a>");
            }
          });
        }
      });
      $('#seeModal').modal('show');
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

          if (aData[13] == "Pending") {
            $(nRow).find('td:eq(13)').addClass('bg-warning text-white font-weight-bold');
          }
          if (aData[13] == 'Completed') {
            $(nRow).find('td:eq(13)').addClass('bg-success text-white font-weight-bold');
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