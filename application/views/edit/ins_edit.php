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
      <!-- Divider -->
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
        <a class="nav-link collapsed" href="<?= base_url("table/instruktur") ?>">
          <i class="fas fa-fw fa-cog"></i>
          <span>Input Kelengkapan </span>
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
                    <br>
                    <h5>Data Instruktur 1</h5>
                    <hr>
                    <div class="form-group">
                      <h6 class="m-0 font-weight-bold text-secondary">Instruktur</h6>
                      <input type="text" class="form-control form-control-user" id="checker" name="ins1" value="<?= $whdb2['ins1_ins'] ?>" indexing="<?= $whdb2['ins1_ins'] ?>">
                    </div>
                    <div class="row">
                      <div class="col-lg col-xl">
                        <div class="form-group">
                          <h6 class="m-0 font-weight-bold text-secondary">Sesi</h6>
                          <input type="number" class="form-control form-control-user" name="sesins1" value="<?= $whdb2['sesins1_ins'] ?>">
                        </div>
                      </div>
                      <div class="col-lg col-xl">
                        <div class="form-group">
                          <h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6>
                          <input type="number" class="form-control form-control-user" name="beains1" value="<?= $whdb2['beasesins1_ins'] ?>">
                        </div>
                      </div>
                    </div>
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
              $(document).ready(function() {
                if ($("#dynamic_field").attr("data-valdb") != "N/A") {
                  var i = 10;
                  $('#dynamic_field').append('<div class="elemented2"><br><h5>Data Instruktur 2</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Instruktur</h6><input type="text" class="form-control form-control-user" name="ins2" value="<?= $whdb2["ins2_ins"] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins2" value="<?= $whdb2["sesins2_ins"] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains2" value="<?= $whdb2["beasesins2_ins"] ?>"></div></div></div></div>');
                  $('#dynamic_field').append('<div class="elemented3"><br><h5>Data Instruktur 3</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Instruktur</h6><input type="text" class="form-control form-control-user" name="ins3" value="<?= $whdb2["ins3_ins"] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins3" value="<?= $whdb2["sesins3_ins"] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains3" value="<?= $whdb2["beasesins3_ins"] ?>"></div></div></div></div>');
                  $('#dynamic_field').append('<div class="elemented4"><br><h5>Data Instruktur 4</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Instruktur</h6><input type="text" class="form-control form-control-user" name="ins4" value="<?= $whdb2["ins4_ins"] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins4" value="<?= $whdb2["sesins4_ins"] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains4" value="<?= $whdb2["beasesins4_ins"] ?>"></div></div></div></div>');
                  $('#dynamic_field').append('<div class="elemented5"><br><h5>Data Instruktur 5</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Instruktur</h6><input type="text" class="form-control form-control-user" name="ins5" value="<?= $whdb2["ins5_ins"] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins5" value="<?= $whdb2["sesins5_ins"] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains5" value="<?= $whdb2["beasesins5_ins"] ?>"></div></div></div></div>');
                  $('#dynamic_field').append('<div class="elemented6"><br><h5>Data Instruktur 6</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Instruktur</h6><input type="text" class="form-control form-control-user" name="ins6" value="<?= $whdb2["ins6_ins"] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins6" value="<?= $whdb2["sesins6_ins"] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains6" value="<?= $whdb2["beasesins6_ins"] ?>"></div></div></div></div>');
                  $('#dynamic_field').append('<div class="elemented7"><br><h5>Data Instruktur 7</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Instruktur</h6><input type="text" class="form-control form-control-user" name="ins7" value="<?= $whdb2["ins7_ins"] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins7" value="<?= $whdb2["sesins7_ins"] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains7" value="<?= $whdb2["beasesins7_ins"] ?>"></div></div></div></div>');
                  $('#dynamic_field').append('<div class="elemented8"><br><h5>Data Instruktur 8</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Instruktur</h6><input type="text" class="form-control form-control-user" name="ins8" value="<?= $whdb2["ins8_ins"] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins8" value="<?= $whdb2["sesins8_ins"] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains8" value="<?= $whdb2["beasesins8_ins"] ?>"></div></div></div></div>');
                  $('#dynamic_field').append('<div class="elemented9"><br><h5>Data Instruktur 9</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Instruktur</h6><input type="text" class="form-control form-control-user" name="ins9" value="<?= $whdb2["ins9_ins"] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins9" value="<?= $whdb2["sesins9_ins"] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains9" value="<?= $whdb2["beasesins9_ins"] ?>"></div></div></div></div>');
                  $('#dynamic_field').append('<div class="elemented10"><br><h5>Data Instruktur 10</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Instruktur</h6><input type="text" class="form-control form-control-user" name="ins10" value="<?= $whdb2["ins10_ins"] ?>"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins10" value="<?= $whdb2["sesins10_ins"] ?>"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains10" value="<?= $whdb2["beasesins10_ins"] ?>"></div></div></div></div>');
                  $("#add").hide();
                } else {
                  var i = 1;
                }

                $('#add').click(function() {
                  i++;
                  if (i < 10) {
                    $('#dynamic_field').append('<div class="elemented' + i + '"><br><h5>Data Instruktur ' + i + '</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Instruktur</h6><input type="text" class="form-control form-control-user" name="ins' + i + '"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins' + i + '"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains' + i + '"></div></div></div></div>');
                  } else {
                    if (i = 10) {
                      $('#dynamic_field').append('<div class="elemented' + i + '"><br><h5>Data Instruktur ' + i + '</h5><hr><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Instruktur</h6><input type="text" class="form-control form-control-user" name="ins' + i + '"></div><div class="row"><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Sesi</h6><input type="number" class="form-control form-control-user" name="sesins' + i + '"></div></div><div class="col-lg col-xl"><div class="form-group"><h6 class="m-0 font-weight-bold text-secondary">Biaya Honor & Transport</h6><input type="number" class="form-control form-control-user" name="beains' + i + '"></div></div></div></div>');
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
            </script>