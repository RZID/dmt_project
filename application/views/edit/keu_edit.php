<body id="page-top">
  <?= $this->session->flashdata("msg") ?>
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
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url("user/index") ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pelatihan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url("table/keuangan") ?>">
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata("nama") ?></span>
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
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Kelengkapan Data Keuangan</h1>
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
                  <form class="namapelatihan" enctype="multipart/form-data" action="<?= base_url("user/edit_keu_core") ?>" method="post">
                    <input type="hidden" class="form-control form-control-user" name="id" value="<?= $whdb['id_plth'] ?>" />
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Nama Pelatihan</h6>
                      <input type="text" class="form-control form-control-user" placeholder="Nama User" name="nama" value="<?= $whdb['nama_plth'] ?>" disabled>
                    </div>

                    <br>
                    <h5>Data Pelatihan</h5>
                    <hr>

                    <div class="row">
                      <div class="col-lg col-xl">
                        <div class="form-group">
                          <h6 class="m-0 font-weight-bold text-secondary">Tanggal Penerimaan Invoice Pelatihan</h6>
                          <input type="date" class="form-control form-control-user" name="keu3" value="<?php if ($whdb2['tgldelinv_keu'] != 0) {
                                                                                                          echo date('Y-m-d', $whdb2['tgldelinv_keu']);
                                                                                                        }  ?>">
                        </div>
                      </div>
                      <div class="col-lg col-xl">
                        <div class="form-group">
                          <h6 class="m-0 font-weight-bold text-secondary">Tanggal Koreksi Invoice Pelatihan</h6>
                          <input type="date" class="form-control form-control-user" name="keu4" value="<?php if ($whdb2['tglkorekinv_keu'] != 0) {
                                                                                                          echo date('Y-m-d', $whdb2['tglkorekinv_keu']);
                                                                                                        }  ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg col-xl">
                        <div class="form-group">
                          <h6 class="m-0 font-weight-bold text-secondary">Tanggal Proses Invoice Pelatihan</h6>
                          <input type="date" class="form-control form-control-user" name="keu5" value="<?php if ($whdb2['tglprocessinv_keu'] != 0) {
                                                                                                          echo date("Y-m-d", $whdb2['tglprocessinv_keu']);
                                                                                                        } ?>">
                        </div>
                      </div>
                      <div class="col-lg col-xl">
                        <div class="form-group">
                          <h6 class="m-0 font-weight-bold text-secondary">Tanggal Pembayaran Ke Vendor Pelatihan</h6>
                          <input type="date" class="form-control form-control-user" name="keu6" value="<?php if ($whdb2['tglpayven_keu'] != 0) {
                                                                                                          echo date("Y-m-d", $whdb2['tglpayven_keu']);
                                                                                                        } ?>">
                        </div>
                      </div>
                    </div>

                    <br>
                    <h5>Data Akomodasi</h5>
                    <hr>

                    <div class=" row">
                      <div class="col-lg col-xl">
                        <div class="form-group">
                          <h6 class="m-0 font-weight-bold text-secondary">Tanggal Penerimaan Invoice Akomodasi</h6>
                          <input type="date" class="form-control form-control-user" name="keu7" value="<?php if ($whdb2['tgldelinvako_keu'] != 0) {
                                                                                                          echo date("Y-m-d", $whdb2['tgldelinvako_keu']);
                                                                                                        } ?>">
                        </div>
                      </div>
                      <div class="col-lg col-xl">
                        <div class="form-group">
                          <h6 class="m-0 font-weight-bold text-secondary">Tanggal Koreksi Invoice Akomodasi</h6>
                          <input type="date" class="form-control form-control-user" name="keu8" value="<?php if ($whdb2['tglkorekinvako_keu'] != 0) {
                                                                                                          echo date("Y-m-d", $whdb2['tglkorekinvako_keu']);
                                                                                                        } ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg col-xl">
                        <div class="form-group">
                          <h6 class="m-0 font-weight-bold text-secondary">Tanggal Proses Invoice Akomodasi</h6>
                          <input type="date" class="form-control form-control-user" name="keu9" value="<?php if ($whdb2['tglprocessinvako_keu'] != 0) {
                                                                                                          echo date("Y-m-d", $whdb2['tglprocessinvako_keu']);
                                                                                                        } ?>">
                        </div>
                      </div>
                      <div class="col-lg col-xl">
                        <div class="form-group">
                          <h6 class="m-0 font-weight-bold text-secondary">Tanggal Pembayaran Ke Vendor Akomodasi</h6>
                          <input type="date" class="form-control form-control-user" name="keu10" value="<?php if ($whdb2['tglpayvenako_keu'] != 0) {
                                                                                                          echo date("Y-m-d", $whdb2['tglpayvenako_keu']);
                                                                                                        } ?>">
                        </div>
                      </div>
                    </div>

                    <br>
                    <h5>Data Instruktur</h5>
                    <hr>

                    <div class="row">
                      <div class="col-lg col-xl">
                        <div class="form-group">
                          <h6 class="m-0 font-weight-bold text-secondary">Tanggal Penerimaan Dokumen Instruktur</h6>
                          <input type="date" class="form-control form-control-user" name="keu11" value="<?php if ($whdb2['tgldeldokins_keu'] != 0) {
                                                                                                          echo date("Y-m-d", $whdb2['tgldeldokins_keu']);
                                                                                                        } ?>">
                        </div>
                      </div>
                      <div class="col-lg col-xl">
                        <div class="form-group">
                          <h6 class="m-0 font-weight-bold text-secondary">Tanggal Pembayaran Honor Instruktur</h6>
                          <input type="date" class="form-control form-control-user" name="keu12" value="<?php if ($whdb2['tglpayhon_keu'] != 0) {
                                                                                                          echo date("Y-m-d", $whdb2['tglpayhon_keu']);
                                                                                                        } ?>">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <label class="form-check-label">
                        <input type="checkbox" name="keu13" id="done" value="Completed">
                        Selesaikan Status Pelatihan
                      </label>
                    </div>
                    <p></p>
                    <!-- End Example events -->
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
            <?php if ($whdb2["status_keu"] == "Completed") { ?>
              <script>
                $(document).ready(function() {
                  $("#done").prop("checked", true);
                });
              </script>
            <?php } ?>