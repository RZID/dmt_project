<body id="page-top">

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
      <li class="nav-item active">
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
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url("table/operation") ?>">
          <i class="fas fa-fw fa-cog"></i>
          <span>Input Kelengkapan </span>
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
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard
              <?=
                $lv ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
          <div class="container-fluid">
            <div class="alert alert-info" role="alert">
              <h4 class="mx-auto">Filter Tanggal Pelatihan</h4>
              <form action="<?= base_url("ajax/viewasfiltereddata") ?>" method="post">
                <div class="row">
                  <div class="col-lg">
                    <small class="font-weight-bold">
                      Dari Tanggal
                    </small>
                    <input type="date" name="from" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php if ($this->input->get("from")) {
                                                                                                                                                                echo date("Y-m-d", $this->input->get("from"));
                                                                                                                                                              } ?>">
                  </div>
                  <div class="col-lg">
                    <small class="font-weight-bold">
                      Sampai Tanggal
                    </small>
                    <input type="date" name="to" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php if ($this->input->get("to")) {
                                                                                                                                                              echo date("Y-m-d", $this->input->get("to"));
                                                                                                                                                            } ?>">
                  </div>
                  <?php if ($this->input->get("from") && $this->input->get("to")) { ?>
                    <div class="col-lg-2 text-center">
                      <br>

                      <button type="submit" class="mx-auto btn btn-primary"><i class="fas fa-search"></i></button>
                      <a href="<?= base_url("user/index") ?>"><button type="button" class="btn btn-info"><i class="fas fa-undo"></i></button></a>
                    </div>

                  <?php } else { ?>
                    <div class="col-lg-1">
                      <br>

                      <button type="submit" class="mx-auto btn btn-block btn-primary"><i class="fas fa-search"></i></button>
                    </div>

                  <?php } ?>
                </div>
              </form>
            </div>
          </div>
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pelatihan Selesai</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="statselesai">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Status Pending</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="statpending">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-pause-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Peserta</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 font-weight-bold text-gray-800" id="jmlhpesertacard">0</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Learning Hours</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="lndupdating"> 0
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- DataTales Example -->
          <div class="card shadow mb-12" id="cardTable">
            <div class="card-header py-3">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                    <h6 class="m-0 font-weight-bold text-primary">Progress Pelatihan</h6>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                    <h6 class="m-0 font-weight-bold text-primary">Realisasi Pelatihan</h6>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#psrtplus" role="tab" aria-controls="profile" aria-selected="false">
                    <h6 class="m-0 font-weight-bold text-primary">Peserta Tambahan</h6>
                  </a>
                </li>
              </ul>
            </div>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                          <th>PND</th>
                          <th>Operation</th>
                          <th>Instruktur</th>
                          <th>Keuangan</th>
                          <th>Peserta</th>
                          <th>Status</th>
                          <th>LND Hours</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if ($this->input->get("from") && $this->input->get("to")) {
                          $data_ontb = $dis->crud->select_where("plth_dmt", array(
                            "tglmulai_plth >=" => $this->input->get("from"),
                            "tgldone_plth <=" => $this->input->get("to")
                          ));
                        } else {
                          $data_ontb = $dis->crud->select("plth_dmt");
                        }
                        foreach ($data_ontb->result() as $row) { ?>
                          <tr>
                            <td></td>
                            <td><?= $row->nama_plth ?></td>
                            <td><?= $row->batch_plth ?></td>
                            <td data-order="<?= $row->tglmulai_plth * 1000 ?>"><?= date("d-m-Y", $row->tglmulai_plth) ?></td>
                            <td data-order="<?= $row->tgldone_plth * 1000 ?>"><?= date("d-m-Y", $row->tgldone_plth) ?></td>
                            <td><?= $this->crud->select_where("opr_dmt", array("id_plth" => $row->id_plth))->row_array()["jmlpsrt_plth"] ?></td>
                            <td><?= $row->sifat_plth ?></td>
                            <td><?= $row->vendor_plth ?></td>
                            <td><?= $row->nmvendor_plth ?></td>
                            <td data-valuefrm="<?= $row->id_plth ?>"><?= $row->ketpros_plth ?></td>
                            <td data-valuefrm="<?= $row->id_plth ?>">
                              <?php $opr = $dis->crud->select_where("opr_dmt", array("id_plth" => $row->id_plth));
                              if ($opr->num_rows() < 1) {
                                $opr_stat = "Pending";
                              } else {
                                $opr_stat = $opr->row_array()["status_opr"];
                              }
                              echo $opr_stat; ?>
                            </td>

                            <td data-valuefrm="<?= $row->id_plth ?>">
                              <?php $ins = $dis->crud->select_where("ins_dmt", array("id_plth" => $row->id_plth));
                              if ($ins->num_rows() < 1) {
                                $ins_stat = "Pending";
                              } else {
                                $ins_stat = $ins->row_array()["status_ins"];
                              }
                              echo $ins_stat;
                              ?>
                            </td>

                            <td data-valuefrm="<?= $row->id_plth ?>">
                              <?php $keu = $dis->crud->select_where("keu_dmt", array("id_plth" => $row->id_plth));
                              $keu_bc = $dis->crud->select_where("keu_bc_dmt", array("id_plth" => $row->id_plth));
                              if ($keu->num_rows() < 1 and $keu_bc->num_rows() < 1) {
                                $keu_stat = "Pending";
                              } else {
                                if ($keu->row_array()["status_keu"] == "Completed" or $keu_bc->row_array()["status_keu_bc"] == "Completed") {
                                  $keu_stat = "Completed";
                                } else {
                                  $keu_stat = "Pending";
                                }
                              }
                              // echo $keu->row_array()["status_keu"];
                              // echo $keu_bc->row_array()["status_keu_bc"];
                              echo $keu_stat;
                              ?>
                            </td>
                            <td data-valuefrm="<?= $row->id_plth ?>"><?php if ($dis->crud->select_where("pesertakeu_dmt", array("id_plth" => $row->id_plth))->row_array()["status_pesertakeu"] == "Completed" && $dis->crud->select_where("pesertapnd_dmt", array("id_plth" => $row->id_plth))->row_array()["status_pesertapnd"] == "Completed") {
                                                                        echo "Completed";
                                                                      } else {
                                                                        echo "Pending";
                                                                      }  ?></td>
                            <td><?php
                                if ($row->ketpros_plth == "Completed" and $opr_stat == "Completed" and $ins_stat == "Completed" and $keu_stat == "Completed") {
                                  echo "Completed";
                                } else {
                                  echo "Pending";
                                  // echo 'PND = ' . $row->ketpros_plth . ' - Operation = ' . $opr_stat . ' - Instruktur = ' . $ins_stat . '- Status Keuangan IP = ' . $keu_stat . ' - Status Keuangan BC = ' . $keu_bc->row_array()["status_keu_bc"];
                                } ?></td>
                            <td><?php $real = $dis->db->get_where("realisasi_dmt", ["id_plth" => $row->id_plth])->row_array();
                                echo $real["lndhours_realisasi"]; ?></td>
                          </tr>

                        <?php
                        }
                        ?>

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

              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card-body" id="">
                  <div class="row">
                    <div class="col-md col-xl">
                      Menampilkan Max
                      <select name='length_change' id='length_change2'>
                        <option value='10'>10</option>
                        <option value='25'>25</option>
                        <option value='50'>50</option>
                        <option value='100'>100</option>
                      </select>
                      Entri
                    </div>
                    <div class="col-xl col-md">
                      <div class="form-group">
                        <input type="text" class="form-control" id="searchTab2" aria-describedby="helpId" placeholder="Cari Data Pelatihan">
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table tb_realisasi table-bordered" style="white-space: nowrap" id="dataTable_realisasi" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="no-sort">No.</th>
                          <th>Jenis Pelatihan</th>
                          <th>Nama Pelatihan dan Event</th>
                          <th>Batch</th>
                          <th>Lokasi</th>
                          <th>Tanggal Mulai</th>
                          <th>Tanggal Selesai</th>
                          <th>Durasi (HK)</th>
                          <th>Jumlah Sesi</th>
                          <th>Undang Persero</th>
                          <th>Undang Non Persero</th>
                          <th>Datang Persero</th>
                          <th>Datang Non Persero</th>
                          <th>Total Peserta Diundang</th>
                          <th>Total Kehadiran</th>
                          <th>Persentase Kehadiran Peserta</th>
                          <th>Total L & D Hours (Persero Only)</th>
                          <th class="no-sort">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if ($this->input->get("from") && $this->input->get("to")) {
                          $from = $this->input->get("from");
                          $to = $this->input->get("to");
                          $realisasikan = $this->db->query("SELECT * FROM realisasi_dmt JOIN plth_dmt WHERE (plth_dmt.tglmulai_plth >=$from AND plth_dmt.tgldone_plth <= $to AND realisasi_dmt.id_plth = plth_dmt.id_plth)")->result();
                        } else {
                          $realisasikan = $dis->crud->select("realisasi_dmt")->result();
                        }
                        foreach ($realisasikan as $row_rea) { ?>
                          <tr>
                            <td></td>
                            <td><?= $dis->crud->select_where("plth_dmt", array("id_plth" => $row_rea->id_plth))->row_array()["jenis_plth"] ?></td>
                            <td><?= $dis->crud->select_where("plth_dmt", array("id_plth" => $row_rea->id_plth))->row_array()["nama_plth"] ?></td>
                            <td><?= $dis->crud->select_where("plth_dmt", array("id_plth" => $row_rea->id_plth))->row_array()["batch_plth"] ?></td>
                            <td><?= $dis->crud->select_where("plth_dmt", array("id_plth" => $row_rea->id_plth))->row_array()["lokasi_plth"] ?></td>
                            <td data-order="<?= $dis->crud->select_where("plth_dmt", array("id_plth" => $row_rea->id_plth))->row_array()["tglmulai_plth"] * 1000 ?>"><?= date("d-m-Y", $dis->crud->select_where("plth_dmt", array("id_plth" => $row_rea->id_plth))->row_array()["tglmulai_plth"]) ?></td>
                            <td data-order="<?= $dis->crud->select_where("plth_dmt", array("id_plth" => $row_rea->id_plth))->row_array()["tgldone_plth"] * 1000 ?>"><?= date("d-m-Y", $dis->crud->select_where("plth_dmt", array("id_plth" => $row_rea->id_plth))->row_array()["tgldone_plth"]) ?></td>
                            <td><?= $row_rea->durasi_realisasi ?></td>
                            <td><?= $row_rea->jmlsesi_realisasi ?></td>
                            <td><?= $row_rea->undpersero_realisasi ?></td>
                            <td><?= $row_rea->undnonpersero_realisasi ?></td>
                            <td><?= $row_rea->dtgpersero_realisasi ?></td>
                            <td><?= $row_rea->dtgnonpersero_realisasi ?></td>
                            <td><?= ($row_rea->undpersero_realisasi + $row_rea->undnonpersero_realisasi); ?></td>
                            <td><?= ($row_rea->dtgpersero_realisasi + $row_rea->dtgnonpersero_realisasi); ?></td>
                            <td><?php if ($row_rea->undpersero_realisasi + $row_rea->undnonpersero_realisasi != 0 && $row_rea->dtgpersero_realisasi + $row_rea->dtgnonpersero_realisasi != 0) {
                                  echo number_format((($row_rea->dtgpersero_realisasi + $row_rea->dtgnonpersero_realisasi) / ($row_rea->undpersero_realisasi + $row_rea->undnonpersero_realisasi) * 100), 2);
                                } else {
                                  echo "0";
                                } ?> % </td>
                            <td><?= $row_rea->lndhours_realisasi ?></td>
                            <td class="text-center"><a href="<?= base_url("user/edit_realisasi?id_pelatihan=") . $row_rea->id_realisasi ?>"><button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></a>
                              <button type="button" class="btn btn-danger" onclick="delete_rea(<?= $row_rea->id_realisasi ?>)"><i class="fas fa-trash"></i></button></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>

                  </div>
                  <div class="pt-3 row">
                    <div class="col-md"><span id="show_dataRea"></span></div>
                    <div class="col-md d-flex justify-content-end">
                      <div id="paginationRea"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="psrtplus" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card-body" id="">
                  <div class="row">
                    <div class="col-md col-xl">
                      Menampilkan Max
                      <select name='length_change' id='length_change2'>
                        <option value='10'>10</option>
                        <option value='25'>25</option>
                        <option value='50'>50</option>
                        <option value='100'>100</option>
                      </select>
                      Entri
                    </div>
                    <div class="col-xl col-md">
                      <div class="form-group">
                        <input type="text" class="form-control" id="searchTab2" aria-describedby="helpId" placeholder="Cari Data Pelatihan">
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table tb_realisasi table-bordered" style="white-space: nowrap" id="dataTable_peserta" width="100%" cellspacing="0">
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
                          <th>Tarif Pelatihan</th>
                          <th>Jumlah Yang Ditagih</th>
                          <th>Nama PT Yang Mengikuti</th>
                          <th>Surat Undangan</th>
                          <th>Dokumen Daftar Hadir</th>
                          <th>Tanggal Pembuatan Invoice</th>
                          <th>Tanggal Pengiriman Invoice</th>
                          <th>Tanggal Penerimaan Invoice</th>
                          <th>Tanggal Invoice Dibayarkan</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if ($this->input->get("from") && $this->input->get("to")) {
                          $from = $this->input->get('from');
                          $to = $this->input->get('to');
                          $peserta = $this->db->query("SELECT * FROM plth_dmt INNER JOIN pesertapnd_dmt ON pesertapnd_dmt.id_plth = plth_dmt.id_plth where plth_dmt.tglmulai_plth >= $from AND plth_dmt.tgldone_plth <= $to")->result();
                        } else {
                          // $peserta = $dis->crud->select("plth_dmt")->result();
                          $peserta = $this->db->query("SELECT * FROM plth_dmt INNER JOIN pesertapnd_dmt ON pesertapnd_dmt.id_plth = plth_dmt.id_plth")->result();
                        }
                        foreach ($peserta as $p) { ?>
                          <tr>
                            <td></td>
                            <!-- Dari DB Pelatihan -->
                            <td><?= $p->nama_plth ?></td>
                            <td><?= $p->batch_plth ?></td>
                            <td><?= $dis->miscellaneous->tanggalin($p->tglmulai_plth) ?></td>
                            <td><?= $dis->miscellaneous->tanggalin($p->tgldone_plth) ?></td>
                            <td><?php if ($dis->crud->select_where("opr_dmt", array("id_plth" => $p->id_plth))->num_rows() < 1) {
                                  echo "Belum Diinput Operation";
                                } else {
                                  echo $dis->crud->select_where("opr_dmt", array("id_plth" => $p->id_plth))->row_array()["jmlpsrt_plth"];
                                } ?></td>
                            <td><?= $p->sifat_plth ?></td>
                            <td><?= $p->vendor_plth ?></td>
                            <td><?= $p->nmvendor_plth ?></td>

                            <!-- Dari DB Peserta Input PND -->
                            <td><?= $dis->miscellaneous->rupiahisasi($this->crud->select_where("pesertapnd_dmt", array('id_plth' => $p->id_plth))->row_array()["trfplth_pesertapnd"]) ?>,-</td>
                            <td><?= $this->crud->select_where("pesertapnd_dmt", array('id_plth' => $p->id_plth))->row_array()["jmldtgh_pesertapnd"] ?></td>
                            <td><?= $this->crud->select_where("pesertapnd_dmt", array('id_plth' => $p->id_plth))->row_array()["nmptmeng_pesertapnd"] ?></td>
                            <td><?php if ($this->crud->select_where("pesertapnd_dmt", array('id_plth' => $p->id_plth))->row_array()["surund_pesertapnd"] != "N/A") { ?><a href="<?= base_url("assets/uploaded_file/") . $this->crud->select_where("pesertapnd_dmt", array('id_plth' => $p->id_plth))->row_array()["rawsurund_pesertapnd"] ?>"><?= $this->crud->select_where("pesertapnd_dmt", array('id_plth' => $p->id_plth))->row_array()["surund_pesertapnd"] ?></a>
                              <?php } else {
                                  echo "N/A";
                                } ?></td>

                            <!-- Dari DB Operation -->
                            <td>
                              <?php if ($dis->crud->select_where("opr_dmt", array("id_plth" => $p->id_plth))->row_array()["file_opr"] != "N/A") { ?>
                                <a href="<?= base_url("assets/uploaded_file/operation/") . $dis->crud->select_where("opr_dmt", array("id_plth" => $p->id_plth))->row_array()["file_opr"] ?>"><?= $dis->crud->select_where("opr_dmt", array("id_plth" => $p->id_plth))->row_array()["dokumen_opr"] ?></a>
                              <?php } else {
                                echo "N/A";
                              } ?>
                            </td>

                            <!-- Dari DB Peserta Input KEU -->
                            <td><?php if ($dis->crud->select_where("pesertakeu_dmt", array("id_plth" => $p->id_plth))->row_array()["tglbuatinv_pesertakeu"] > 0) {
                                  echo $dis->miscellaneous->tanggalin($dis->crud->select_where("pesertakeu_dmt", array("id_plth" => $p->id_plth))->row_array()["tglbuatinv_pesertakeu"]);
                                } else {
                                  echo "Belum Diinput Keuangan";
                                } ?></td>

                            <td><?php if ($dis->crud->select_where("pesertakeu_dmt", array("id_plth" => $p->id_plth))->row_array()["tglkiriminv_pesertakeu"] > 0) {
                                  echo $dis->miscellaneous->tanggalin($dis->crud->select_where("pesertakeu_dmt", array("id_plth" => $p->id_plth))->row_array()["tglkiriminv_pesertakeu"]);
                                } else {
                                  echo "Belum Diinput Keuangan";
                                } ?></td>
                            <td><?php if ($dis->crud->select_where("pesertakeu_dmt", array("id_plth" => $p->id_plth))->row_array()["tglterimainv_pesertakeu"] > 0) {
                                  echo $dis->miscellaneous->tanggalin($dis->crud->select_where("pesertakeu_dmt", array("id_plth" => $p->id_plth))->row_array()["tglterimainv_pesertakeu"]);
                                } else {
                                  echo "Belum Diinput Keuangan";
                                } ?></td>
                            <td><?php if ($dis->crud->select_where("pesertakeu_dmt", array("id_plth" => $p->id_plth))->row_array()["tglpayinv_pesertakeu"] > 0) {
                                  echo $dis->miscellaneous->tanggalin($dis->crud->select_where("pesertakeu_dmt", array("id_plth" => $p->id_plth))->row_array()["tglpayinv_pesertakeu"]);
                                } else {
                                  echo "Belum Diinput Keuangan";
                                } ?></td>
                            <td><?php if ($dis->crud->select_where("pesertakeu_dmt", array("id_plth" => $p->id_plth))->row_array()["ket_pesertakeu"]) {
                                  echo $dis->crud->select_where("pesertakeu_dmt", array("id_plth" => $p->id_plth))->row_array()["ket_pesertakeu"];
                                } else {
                                  echo "Belum Diinput Keuangan";
                                }  ?></td>


                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>

                  </div>
                  <div class="pt-3 row">
                    <div class="col-md"><span id="show_dataRea2"></span></div>
                    <div class="col-md d-flex justify-content-end">
                      <div id="paginationRea2"></div>
                    </div>
                  </div>
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

    function see_pnd(dataval) {
      $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
          id: dataval
        },
        url: "<?= base_url("ajax/get_status_pnd") ?>",
        success: function(data) {
          $(".modal-body").html(
            data.nama +
            "<hr>" +
            "<ul>" +
            data.batch +
            data.tglmulai +
            data.tglselesai +
            data.sifat +
            data.vendor +
            data.namavendor +
            data.hargakesepakatanvendor +
            data.keteranganvendor +
            data.memo +
            data.status +
            "</ul>");
        }
      });
    }

    function see_peserta(dataval) {
      $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
          id: dataval
        },
        url: "<?= base_url("ajax/get_status_peserta") ?>",
        success: function(data) {
          $(".modal-body").html(
            data.nama_ok +
            "<hr>" +
            "<h6><u>Data Peserta Tambahan (PND)</u></h6>" +
            "<ul>" +
            data.trfplth_pnd +
            data.jmldtgh_pnd +
            data.nmptmeng_pnd +
            data.surund_pnd +
            data.status_pnd +
            "</ul>" +

            "<h6><u>Data Peserta Tambahan (Keuangan)</u></h6>" +
            "<ul>" +
            data.tglbuatinv_keu +
            data.tglkiriminv_keu +
            data.tglterimainv_keu +
            data.tglpayinv_keu +
            data.ket_keu +
            data.status_keu +
            "</ul>");
        }
      });
    }

    function see_opr(dataval) {
      $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
          id: dataval
        },
        url: "<?= base_url("ajax/get_status_opr") ?>",
        success: function(data2) {
          $(".modal-body").html(
            data2.nama +
            "<hr>" +
            "<ul>" +
            data2.jumlah_peserta +
            data2.namavendorakomodasi +
            data2.glsarfas +
            data2.dokumen +
            data2.addcost +
            data2.pkba +
            data2.status +
            "</ul>");
        }
      });
    }

    function see_ins(dataval) {
      $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
          id: dataval
        },
        url: "<?= base_url("ajax/get_status_ins") ?>",
        success: function(data3) {
          $(".modal-body").html(
            data3.nama +
            "<hr>" +
            "<ul>" +
            data3.ins1 +
            data3.sesins1 +
            data3.beasesins1 +
            data3.status +
            "</ul>");
        }
      });
      return false;
    }

    function see_keu(dataval) {
      $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
          id: dataval
        },
        url: "<?= base_url("ajax/get_status_keu") ?>",
        success: function(data4) {
          $(".modal-body").html(
            data4.nama +
            "<hr>" +
            "<h5><u>Data Finance IP</u></h5>" +
            "<ul>" +
            data4.ako1 +
            data4.ako2 +
            data4.ako3 +
            data4.ako4 +
            data4.ako5 +
            data4.ako6 +
            data4.ako7 +

            data4.pro1 +
            data4.pro2 +
            data4.pro3 +
            data4.pro4 +
            data4.pro5 +
            data4.pro6 +
            data4.pro7 +

            data4.status1 +
            data4.status2 +
            data4.status3 +
            data4.status4 +
            data4.status5 +
            data4.status6 +
            data4.status7 +
            data4.status8 +
            data4.status9 +
            data4.status10 +

            data4.status +
            "</ul>" +
            "<h5><u>Data Finance BC</u></h5>" +
            "<ul>" +
            data4.nocs_ptmn +
            data4.namacs_ptmn +
            data4.nocs_tp +
            data4.namacs_tp +
            data4.trf +
            data4.cash +
            data4.internal +
            data4.aptp +
            data4.ttlrev +
            data4.noso +
            data4.idssc +
            data4.noinv +
            data4.stat +
            data4.status_bc +
            "</ul>");
        }
      });
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

          if (aData[9] == "Pending") {
            $(nRow).find('td:eq(9)').addClass('bg-warning text-white font-weight-bold');
            $(nRow).find('td:eq(9)').attr("onclick", "see_pnd(" + $(nRow).find('td:eq(9)').attr("data-valuefrm") + ")");
            $(nRow).find('td:eq(9)').attr("data-target", "#modalPnd");
            $(nRow).find('td:eq(9)').attr("data-toggle", "modal");

            $(nRow).find('td:eq(9)').attr("data-content", "Memuat...");
          }
          if (aData[9] == 'Completed') {
            $(nRow).find('td:eq(9)').addClass('bg-success text-white font-weight-bold');
          }

          if (aData[10] == "Pending") {
            $(nRow).find('td:eq(10)').addClass('bg-warning text-white font-weight-bold');
            $(nRow).find('td:eq(10)').attr("onclick", "see_opr(" + $(nRow).find('td:eq(10)').attr("data-valuefrm") + ")");
            $(nRow).find('td:eq(10)').attr("data-target", "#modalOpr");
            $(nRow).find('td:eq(10)').attr("data-toggle", "modal");

            $(nRow).find('td:eq(10)').attr("data-content", "Memuat...");
          }
          if (aData[10] == 'Completed') {
            $(nRow).find('td:eq(10)').addClass('bg-success text-white font-weight-bold');
          }

          if (aData[11] == "Pending") {
            $(nRow).find('td:eq(11)').addClass('bg-warning text-white font-weight-bold');
            $(nRow).find('td:eq(11)').attr("onclick", "see_ins(" + $(nRow).find('td:eq(10)').attr("data-valuefrm") + ")");
            $(nRow).find('td:eq(11)').attr("data-target", "#modalIns");
            $(nRow).find('td:eq(11)').attr("data-toggle", "modal");

            $(nRow).find('td:eq(11)').attr("data-content", "Memuat...");
          }
          if (aData[11] == 'Completed') {
            $(nRow).find('td:eq(11)').addClass('bg-success text-white font-weight-bold');
          }

          if (aData[12] == "Pending") {
            $(nRow).find('td:eq(12)').addClass('bg-warning text-white font-weight-bold');
            $(nRow).find('td:eq(12)').attr("onclick", "see_keu(" + $(nRow).find('td:eq(12)').attr("data-valuefrm") + ")");
            $(nRow).find('td:eq(12)').attr("data-target", "#modalKeu");
            $(nRow).find('td:eq(12)').attr("data-toggle", "modal");
            $(nRow).find('td:eq(12)').attr("data-content", "Memuat...");
          }
          if (aData[12] == 'Completed') {
            $(nRow).find('td:eq(12)').addClass('bg-success text-white font-weight-bold');
          }

          if (aData[13] == "Pending") {
            $(nRow).find('td:eq(13)').addClass('bg-warning text-white font-weight-bold');
            $(nRow).find('td:eq(13)').attr("onclick", "see_peserta(" + $(nRow).find('td:eq(13)').attr("data-valuefrm") + ")");
            $(nRow).find('td:eq(13)').attr("data-target", "#modalPsrt");
            $(nRow).find('td:eq(13)').attr("data-toggle", "modal");
            $(nRow).find('td:eq(13)').attr("data-content", "Memuat...");
          }
          if (aData[13] == 'Completed') {
            $(nRow).find('td:eq(13)').addClass('bg-success text-white font-weight-bold');
          }

          if (aData[14] == "Pending") {
            $(nRow).find('td:eq(14)').addClass('bg-warning text-white font-weight-bold');
            $(nRow).find('td:eq(14)').attr("data-toggle", "popover");
            $(nRow).find('td:eq(14)').attr("data-placement", "bottom");
            $(nRow).find('td:eq(14)').attr("title", "Status : Pending");
            $(nRow).find('td:eq(14)').attr("data-content", "And here's some amazing content. It's very engaging. Right?");
          }
          if (aData[14] == 'Completed') {
            $(nRow).find('td:eq(14)').addClass('bg-success text-white font-weight-bold');
          }
          return nRow;
        },

        initComplete: (settings, json) => {
          jQuery.fn.dataTable.Api.register('sum()', function() {
            return this.flatten().reduce(function(a, b) {
              if (typeof a === 'string') {
                a = a.replace(/[^\d.-]/g, '') * 1;
              }
              if (typeof b === 'string') {
                b = b.replace(/[^\d.-]/g, '') * 1;
              }
              return a + b;
            }, 0);
          });
          // $("#jmlhpesertacard").html($('.tb_pelatihan').DataTable().column(5).data());
          $("#dataTable_info").appendTo("#show_data");
          $("#dataTable_paginate").appendTo("#pagination");
          var datapeserta = $('.tb_pelatihan').DataTable().column(5).data().sum();
          $("#jmlhpesertacard").html(datapeserta);


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

          },
          {
            "targets": [15],
            "visible": false,
            "searchable": false
          }
        ],
        "order": [
          [1, 'asc']
        ],
        "footerCallback": function(row, data, start, end, display) {
          var api = this.api(),
            data;

          // converting to interger to find total
          var intVal = function(i) {
            return typeof i === 'string' ?
              i.replace(/[\$,]/g, '') * 1 :
              typeof i === 'number' ?
              i : 0;
          };

          // computing column Total of the complete result 
          var totalpsr = api
            .column(5, {
              search: 'applied'
            })
            .data()
            .reduce(function(a, b) {
              return intVal(a) + intVal(b);
            }, 0);

          var lndup = api
            .column(15, {
              search: 'applied'
            })
            .data()
            .reduce(function(a, b) {
              return intVal(a) + intVal(b);
            }, 0);
          // Update footer by showing the total with the reference of the column index 
          $("#lndupdating").html(lndup);
          $("#jmlhpesertacard").html(totalpsr);
        },
        "drawCallback": function(settings) {

          var api = this.api();

          var valueToFind = "Completed";
          var valueToFind2 = "Pending";

          var filteredData = api
            .column(14, {
              search: 'applied'
            })
            .data()
            .filter(function(value, index) {
              return value === valueToFind ? true : false;
            }).length;

          var filteredData2 = api
            .column(14, {
              search: 'applied'
            })
            .data()
            .filter(function(value, index) {
              return value === valueToFind2 ? true : false;
            }).length;

          $("#statselesai").html(filteredData);
          $("#statpending").html(filteredData2);

        }
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
      $('#mindate, #maxdate').keyup(function() {

        t.draw();
      });

    });

    function delete_rea(id) {
      sweetAlert({
        title: "Apakah anda yakin?",
        text: "Ingin menghapus data?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batalkan',
        confirmButtonText: 'Hapus'
      }).then(function(isConfirm) {
        if (isConfirm) {
          sweetAlert({
            title: 'Data berhasil dihapus!',
            text: 'Memuat ulang halaman',
            type: 'success'
          });
          window.location.href = "<?= base_url("user/delete_realisasi?id_pelatihan=") ?>" + id;

        } else {}
      })
    }

    function delete_rea(id) {
      sweetAlert({
        title: "Apakah anda yakin?",
        text: "Ingin menghapus data?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batalkan',
        confirmButtonText: 'Hapus'
      }).then(function(isConfirm) {
        if (isConfirm) {
          sweetAlert({
            title: 'Data berhasil dihapus!',
            text: 'Memuat ulang halaman',
            type: 'success'
          });
          window.location.href = "<?= base_url("user/delete_realisasi?id_pelatihan=") ?>" + id;

        } else {}
      })
    }
    $(document).ready(function() {
      var xtab = $('#dataTable_realisasi').DataTable({
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
        },
        initComplete: (settings, json) => {
          var lnd = $('#dataTable_realisasi').DataTable().column(16).data().sum();
          $("#lndhouring").html(lnd);
          $("#dataTable_realisasi_info").appendTo("#show_dataRea");
          $("#dataTable_realisasi_paginate").appendTo("#paginationRea");
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
      });
      // $('.table-responsive').css('display', 'block');
      xtab.columns.adjust().draw();



      $('#length_change2').change(function() {
        xtab.page.len($(this).val()).draw();
      });

      $('#length_change2').val(xtab.page.len());
      $('#searchTab2').keyup(function() {
        xtab.search($(this).val()).draw();
      });

      xtab.on('order.dt search.dt', function() {
        xtab.column(0, {
          search: 'applied',
          order: 'applied'
        }).nodes().each(function(cell, i) {
          cell.innerHTML = i + 1;
        });
      });
    });

    $(document).ready(function() {
      var peserta = $('#dataTable_peserta').DataTable({
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
        },
        initComplete: (settings, json) => {
          $("#dataTable_peserta_info").appendTo("#show_dataRea2");
          $("#dataTable_peserta_paginate").appendTo("#paginationRea2");
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
      });
      // $('.table-responsive').css('display', 'block');
      peserta.columns.adjust().draw();



      $('#length_change2').change(function() {
        peserta.page.len($(this).val()).draw();
      });

      $('#length_change2').val(peserta.page.len());
      $('#searchTab2').keyup(function() {
        peserta.search($(this).val()).draw();
      });

      peserta.on('order.dt search.dt', function() {
        peserta.column(0, {
          search: 'applied',
          order: 'applied'
        }).nodes().each(function(cell, i) {
          cell.innerHTML = i + 1;
        });
      });
    });
    $(".nav-link").click(function() {

      //Pelatihan
      var table = $('.tb_pelatihan').DataTable();
      table
        .search('')
        .columns().search('')
        .draw();
      $("#searchTab").val("");
      //End Of Pelatihan

      //Realisasi Pelatihan
      var table2 = $('.tb_realisasi').DataTable();
      table2
        .search('')
        .columns().search('')
        .draw();
      $("#searchTab2").val("");
      //End Of Realisasi Pelatihan

      //Peserta Tambahan
      $("#searchTab3").val("");
      //End Of Peserta Tambahan
    });
  </script>