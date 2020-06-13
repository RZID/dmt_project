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
              <th>Status Finance BC</th>
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
                    $ins_get = $dis->crud->select_where("keu_dmt", array("id_plth" => $row->id_plth));
                    if ($ins_get->num_rows() < 1) {
                      echo "Pending";
                    } else {
                      echo $ins_get->row_array()["status_keu"];
                    } ?>
                </td>
                <td class="text-center">
                  <button type="button" class="btn btn-primary" onclick="see(<?= $row->id_plth ?>)"><i class="fas fa-eye"></i></button>
                  <!-- Modal -->

                  <a href="<?= base_url("user/edit_bc?id_pelatihan=") . $row->id_plth ?>"><button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button></a>
                </td>
                <!-- Modal -->
                <div class="modal fade" id="modalSee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Detail Pelatihan (Keuangan)</h5>
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
                          <h5 class="font-weight-bold">Detail Keuangan</h5>
                        </u>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Tanggal Penerimaan Invoice Pelatihan</div>
                          :
                          <div class="col-xl col-lg" id="keu1"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Tanggal Penerimaan Invoice Akomodasi</div>
                          :
                          <div class="col-xl col-lg" id="keu2"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Tanggal Koreksi Invoice Pelatihan</div>
                          :
                          <div class="col-xl col-lg" id="keu3"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Tanggal Koreksi Invoice Akomodasi</div>
                          :
                          <div class="col-xl col-lg" id="keu4"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Tanggal Proses Invoice Pelatihan</div>
                          :
                          <div class="col-xl col-lg" id="keu5"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Tanggal Proses Invoice Akomodasi</div>
                          :
                          <div class="col-xl col-lg" id="keu6"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Tanggal Pembayaran Ke Vendor Pelatihan</div>
                          :
                          <div class="col-xl col-lg" id="keu7"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Tanggal Pembayaran Ke Vendor Akomodasi</div>
                          :
                          <div class="col-xl col-lg" id="keu8"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Tanggal Penerimaan Dokumen Instruktur</div>
                          :
                          <div class="col-xl col-lg" id="keu9"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Tanggal Pembayaran Honor Instruktur</div>
                          :
                          <div class="col-xl col-lg" id="keu10"></div>
                        </div>

                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                        </div>
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
      url: "<?= base_url("user/ajaxgetdata_keu") ?>",
      success: function(data2) {
        $(document).ready(function() {
          var len = data2.length;
          if (len >= 1) {
            if (data2[0].tgldelinv_keu == 0) {
              $("#keu1").html("N/A");
            } else {
              $("#keu1").html($.format.date(new Date(data2[0].tgldelinv_keu * 1000), 'dd MMMM yyyy'));
            }

            if (data2[0].tgldelinvako_keu == 0) {
              $("#keu2").html("N/A");
            } else {
              $("#keu2").html($.format.date(new Date(data2[0].tgldelinvako_keu * 1000), 'dd MMMM yyyy'));
            }
            if (data2[0].tglkorekinv_keu == 0) {
              $("#keu3").html("N/A");
            } else {
              $("#keu3").html($.format.date(new Date(data2[0].tglkorekinv_keu * 1000), 'dd MMMM yyyy'));
            }
            if (data2[0].tglkorekinvako_keu == 0) {
              $("#keu4").html("N/A");
            } else {
              $("#keu4").html($.format.date(new Date(data2[0].tglkorekinvako_keu * 1000), 'dd MMMM yyyy'));
            }
            if (data2[0].tglprocessinv_keu == 0) {
              $("#keu5").html("N/A");
            } else {
              $("#keu5").html($.format.date(new Date(data2[0].tglprocessinv_keu * 1000), 'dd MMMM yyyy'));
            }
            if (data2[0].tglprocessinvako_keu == 0) {
              $("#keu6").html("N/A");
            } else {
              $("#keu6").html($.format.date(new Date(data2[0].tglprocessinvako_keu * 1000), 'dd MMMM yyyy'));
            }
            if (data2[0].tglpayven_keu == 0) {
              $("#keu7").html("N/A");
            } else {
              $("#keu7").html($.format.date(new Date(data2[0].tglpayven_keu * 1000), 'dd MMMM yyyy'));
            }
            if (data2[0].tglpayvenako_keu == 0) {
              $("#keu8").html("N/A");
            } else {
              $("#keu8").html($.format.date(new Date(data2[0].tglpayvenako_keu * 1000), 'dd MMMM yyyy'));
            }
            if (data2[0].tgldeldokins_keu == 0) {
              $("#keu9").html("N/A");
            } else {
              $("#keu9").html($.format.date(new Date(data2[0].tgldeldokins_keu * 1000), 'dd MMMM yyyy'));
            }
            if (data2[0].tglpayhon_keu == 0) {
              $("#keu10").html("N/A");
            } else {
              $("#keu10").html($.format.date(new Date(data2[0].tglpayhon_keu * 1000), 'dd MMMM yyyy'));
            }
          } else {
            var nulled = "Belum Diatur";
            $("#keu1").html("<a class='text-danger'>" + nulled + "</a>");
            $("#keu2").html("<a class='text-danger'>" + nulled + "</a>");
            $("#keu3").html("<a class='text-danger'>" + nulled + "</a>");
            $("#keu4").html("<a class='text-danger'>" + nulled + "</a>");
            $("#keu5").html("<a class='text-danger'>" + nulled + "</a>");
            $("#keu6").html("<a class='text-danger'>" + nulled + "</a>");
            $("#keu7").html("<a class='text-danger'>" + nulled + "</a>");
            $("#keu8").html("<a class='text-danger'>" + nulled + "</a>");
            $("#keu9").html("<a class='text-danger'>" + nulled + "</a>");
            $("#keu10").html("<a class='text-danger'>" + nulled + "</a>");
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