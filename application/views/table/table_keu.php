<body id="page-top">

  <!-- <style>
    .dataTables_wrapper {
      position: relative;
      min-height: 302px;
      _height: 302px;
      clear: both;
    }
  </style> -->
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

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("user/index") ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DMT HSE TC </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url("user/index") ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard <?= $lv ?></span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pelatihan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed">
          <i class="fas fa-fw fa-cog"></i>
          <span>Input Kelengkapan </span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url("table/peserta_keu") ?>">
          <i class="fas fa-table"></i>
          <span>Kelengkapan Peserta</span>
        </a>
      </li>

      <!-- Heading -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata("nama"); ?></span>
                <i class="fas fa-user"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" id="keluarData" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

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
                      <th>Status Keuangan</th>
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

                          <a href="<?= base_url("user/edit_keu?id_pelatihan=") . $row->id_plth ?>"><button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button></a>
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