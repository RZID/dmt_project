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
              <th>Jumlah Peserta</th>
              <th>Sifat Pelatihan</th>
              <th>Vendor atau Non Vendor</th>
              <th>Nama Vendor Pelatihan</th>
              <th>Nama Vendor Akomodasi</th>
              <th>File SPK/BA</th>
              <th>Status Finance IP</th>
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
                <td><?= $dis->crud->select_where("opr_dmt", array("id_plth" => $row->id_plth))->row_array()["jmlpsrt_plth"]; ?></td>
                <td><?= $row->sifat_plth ?></td>
                <td><?= $row->vendor_plth ?></td>
                <td><?= $row->nmvendor_plth ?></td>
                <td><?= $dis->crud->select_where("opr_dmt", array("id_plth" => $row->id_plth))->row_array()["nmvenakom_plth"]; ?></td>
                <td><?php if ($dis->crud->select_where("opr_dmt", array("id_plth" => $row->id_plth))->row_array()["pkba_opr"] != "N/A" && $dis->crud->select_where("opr_dmt", array("id_plth" => $row->id_plth))->row_array()["pkba_opr"] != NULL) {
                    ?>
                    <a href="<?= base_url("assets/uploaded_file/operation/") . $dis->crud->select_where("opr_dmt", array("id_plth" => $row->id_plth))->row_array()["filepkbaunique_opr"] ?>"><?= $dis->crud->select_where("opr_dmt", array("id_plth" => $row->id_plth))->row_array()["pkba_opr"] ?></a>
                  <?php } else {
                    }  ?></td>

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

                  <a href="<?= base_url("user/edit_keu?id_pelatihan=") . $row->id_plth; ?>"><button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button></a>
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
                          <h5 class="font-weight-bold">Detail Finance IP</h5>
                        </u>
                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">No. Vendor (Akomodasi)</div>
                          :
                          <div class="col-xl col-lg" id="ako1"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Nama Vendor (Akomodasi)</div>
                          :
                          <div class="col-xl col-lg" id="ako2"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">No. Invoice (Akomodasi)</div>
                          :
                          <div class="col-xl col-lg" id="ako3"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Nilai (Akomodasi)</div>
                          :
                          <div class="col-xl col-lg" id="ako4"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">PD (Akomodasi)</div>
                          :
                          <div class="col-xl col-lg" id="ako5"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">SSC ID / SP 3 ID (Akomodasi)</div>
                          :
                          <div class="col-xl col-lg" id="ako6"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Status (Akomodasi)</div>
                          :
                          <div class="col-xl col-lg" id="ako7"></div>
                        </div>
                        <br>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">No. Vendor (Provider)</div>
                          :
                          <div class="col-xl col-lg" id="pro1"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Nama Vendor (Provider)</div>
                          :
                          <div class="col-xl col-lg" id="pro2"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">No. Invoice (Provider)</div>
                          :
                          <div class="col-xl col-lg" id="pro3"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Nilai (Provider)</div>
                          :
                          <div class="col-xl col-lg" id="pro4"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">PD (Provider)</div>
                          :
                          <div class="col-xl col-lg" id="pro5"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">SSC ID / SP 3 ID (Provider)</div>
                          :
                          <div class="col-xl col-lg" id="pro6"></div>
                        </div>

                        <!-- Vendor -->
                        <div class="row">
                          <div class="col-xl col-lg">Status (Provider)</div>
                          :
                          <div class="col-xl col-lg" id="pro7"></div>
                        </div>
                        <br>
                        <div class="stat1"></div>
                        <div class="stat2"></div>
                        <div class="stat3"></div>
                        <div class="stat4"></div>
                        <div class="stat5"></div>
                        <div class="stat6"></div>
                        <div class="stat7"></div>
                        <div class="stat8"></div>
                        <div class="stat9"></div>
                        <div class="stat10"></div>

                        <!-- Vendor -->
                        <br>
                        <div class="row">
                          <div class="col-xl col-lg">Status Keuangan (IP)</div>
                          :
                          <div class="col-xl col-lg" id="status_keu123"></div>
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
      url: "<?= base_url("user/ajaxgetdata_keu") ?>",
      success: function(data2) {
        $(document).ready(function() {
          var len = data2.length;
          if (len >= 1) {

            if (data2[0].ako1 == "" || data2[0].ako1 == "0") {
              $("#ako1").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#ako1").html(data2[0].ako1);
            }
            if (data2[0].ako2 == "" || data2[0].ako2 == "N/A") {
              $("#ako2").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#ako2").html(data2[0].ako2);
            }
            if (data2[0].ako3 == "" || data2[0].ako3 == "0") {
              $("#ako3").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#ako3").html(data2[0].ako3);
            }
            if (data2[0].ako4 == "" || data2[0].ako4 == "0") {
              $("#ako4").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#ako4").html(data2[0].ako4);
            }
            if (data2[0].ako5 == "" || data2[0].ako5 == "0") {
              $("#ako5").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#ako5").html(data2[0].ako5);
            }
            if (data2[0].ako6 == "" || data2[0].ako6 == "0") {
              $("#ako6").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#ako6").html(data2[0].ako6);
            }
            if (data2[0].ako7 == "" || data2[0].ako7 == "N/A") {
              $("#ako7").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#ako7").html(data2[0].ako7);
            }
            if (data2[0].pro1 == "" || data2[0].pro1 == "0") {
              $("#pro1").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#pro1").html(data2[0].pro1);
            }
            if (data2[0].pro2 == "" || data2[0].pro2 == "N/A") {
              $("#pro2").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#pro2").html(data2[0].pro2);
            }
            if (data2[0].pro3 == "" || data2[0].pro3 == "0") {
              $("#pro3").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#pro3").html(data2[0].pro3);
            }
            if (data2[0].pro4 == "" || data2[0].pro4 == "0") {
              $("#pro4").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#pro4").html(data2[0].pro4);
            }
            if (data2[0].pro5 == "" || data2[0].pro5 == "0") {
              $("#pro5").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#pro5").html(data2[0].pro5);
            }
            if (data2[0].pro6 == "" || data2[0].pro6 == "0") {
              $("#pro6").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#pro6").html(data2[0].pro6);
            }
            if (data2[0].pro7 == "" || data2[0].pro7 == "N/A") {
              $("#pro7").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#pro7").html(data2[0].pro7);
            }

            <?php
            $nomer = range(0, 9);
            $nomer2 = 1;
            foreach ($nomer as $no) {
            ?>
              str = data2[0].status<?= $nomer2 ?>;
              if (str.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '') == "NA") {
                $(".stat<?= $nomer2 ?>").html("");
              } else {
                $.ajax({
                  type: "POST",
                  dataType: 'json',
                  data: {
                    id_pelatihan: id
                  },
                  url: "<?= base_url("user/ajaxgetdata_ins") ?>",
                  success: function(data3) {
                    $(document).ready(function() {
                      $(".stat<?= $nomer2 ?>").html("<div class='row'><div class='col-xl col-lg'>No. Vendor Instruktur </div>:<div class='col-xl col-lg'>" + data3[<?= $no ?>].novend_ins + "</div></div><div class='row'><div class='col-xl col-lg'>Nama Instruktur </div>:<div class='col-xl col-lg'>" + data3[<?= $no ?>].ins_ins + "</div></div><div class='row'><div class='col-xl col-lg'>Tanggal Mulai Ajar Instruktur </div>:<div class='col-xl col-lg'>" + $.format.date(new Date(data3[<?= $no ?>].tglmulaiajar_ins * 1000), 'dd MMMM yyyy') + "</div></div><div class='row'><div class='col-xl col-lg'>Tanggal Selesai Ajar Instruktur </div>:<div class='col-xl col-lg'>" + $.format.date(new Date(data3[<?= $no ?>].tgldoneajar_ins * 1000), 'dd MMMM yyyy') + "</div></div><div class='row'><div class='col-xl col-lg'>Sesi Instruktur </div>:<div class='col-xl col-lg'>" + data3[<?= $no ?>].sesins_ins + "</div></div><div class='row'><div class='col-xl col-lg'>Biaya Transport Instruktur </div>:<div class='col-xl col-lg'>" + data3[<?= $no ?>].beasesins_ins + "</div></div><div class='row'><div class='col-xl col-lg'>Surat Undangan Instruktur </div>:<div class='col-xl col-lg'><a href='<?= base_url("assets/uploaded_file/") ?>" + data3[<?= $no ?>].surund_ins + "'>" + data3[<?= $no ?>].surund_ins + "</a></div></div><div class='row'><div class='col-xl col-lg'>Status Instruktur <?= $nomer2 ?></div>:<div class='col-xl col-lg' id='status<?= $nomer2 ?>'>" + data2[0].status<?= $nomer2 ?> + "</div></div>");
                    });
                  }
                });
              }
            <?php $nomer2++;
            }
            ?>

            if (data2[0].status_keu == "") {
              $("#status_keu123").html("<a class='text-danger'>Belum Diatur</a>");
            } else {
              $("#status_keu123").html(data2[0].status_keu);
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
            $("#dinamis").html('<div class="row"><div class="col-xl col-lg">Status</div> <div class="col-xl col-lg">Belum Diatur</div></div>');
            $("#status_keu123").html("<a class='text-danger'>Belum Diatur</a>");
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

        if (aData[11] == "Pending") {
          $(nRow).find('td:eq(11)').addClass('bg-warning text-white font-weight-bold');
        }
        if (aData[11] == 'Completed') {
          $(nRow).find('td:eq(11)').addClass('bg-success text-white font-weight-bold');
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