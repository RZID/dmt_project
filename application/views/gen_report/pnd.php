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
                                <th class="no-sort"></th>
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
                                <th>Tanggal Pre Test</th>
                                <th>Tanggal Post Test</th>
                                <th>Feedback</th>
                                <th>Tanggal Memo</th>
                                <th>Dokumen Upload Memo</th>
                                <th>Status PND</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data_ontb = $dis->crud->select("plth_dmt");
                            foreach ($data_ontb->result() as $row) { ?>
                                <tr>
                                    <td><input type="checkbox" class="my_data_checker" dbval="<?= $row->id_plth ?>" id=""></td>
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
                                    <td><?= $dis->miscellaneous->rupiahisasi($row->hrgkspvend_plth) ?>,-</td>
                                    <td><?= $row->ketkspvend_plth ?></td>
                                    <td><?php if ($row->uniquefile_plth != "N/A") { ?>
                                            <a href="<?= base_url("assets/uploaded_file/") . $row->uniquefile_plth ?>"><?= $row->memopem_plth ?></a>
                                        <?php } else { ?>
                                            <a><?= $row->memopem_plth ?></a>
                                        <?php } ?></td>

                                    <td><?php if ($row->pretest_plth < 1) {
                                            echo "N/A";
                                        } else {
                                            echo date("d-m-Y", $row->pretest_plth);
                                        }  ?></td>
                                    <td><?php if ($row->postest_plth < 1) {
                                            echo "N/A";
                                        } else {
                                            echo date("d-m-Y", $row->postest_plth);
                                        }  ?></td>
                                    <td><?php if ($row->feedback_plth) {
                                            echo "Sudah";
                                        } else {
                                            echo "Belum";
                                        } ?></td>
                                    <td><?php if ($row->tglmemo_plth < 1) {
                                            echo "N/A";
                                        } else {
                                            echo date("d-m-Y", $row->tglmemo_plth);
                                        }  ?></td>
                                    <td><?php if ($row->filememo_plth == "" or $row->filememo_plth == "N/A") {
                                            echo "N/A";
                                        } else {
                                            echo "<a href='" . base_url("assets/uploaded_file/") . $row->uniquememo_plth . "'>" . $row->filememo_plth . "</a>";
                                        }  ?></td>
                                    <td><?php
                                        $opr_get = $dis->crud->select_where("plth_dmt", array("id_plth" => $row->id_plth));
                                        if ($opr_get->num_rows() < 1) {
                                            echo "Pending";
                                        } else {
                                            echo $opr_get->row_array()["ketpros_plth"];
                                        } ?>
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
                <h6>(<a id="counter">0</a> Data Dipilih)</h6>
            </div>
        </div>
        <button type="button" class="btn btn-primary" onclick="kirimData()">Ekspor Data Dipilih</button>
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

        function delpel(id) {
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
                    window.location.href = "<?= base_url("user/delete_pelatihan?id_pelatihan=") ?>" + id;

                } else {}
            })
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
                    $('td:eq(1)', nRow).html(index);

                    if (aData[19] == "Pending") {
                        $(nRow).find('td:eq(19)').addClass('bg-warning text-white font-weight-bold');
                    }
                    if (aData[19] == 'Completed') {
                        $(nRow).find('td:eq(19)').addClass('bg-success text-white font-weight-bold');
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
                }],
                "order": [
                    [2, 'asc']
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
                t.column(1, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            });
            var checkboxes = $('.my_data_checker');
            checkboxes.change(function() {
                var countCheckedCheckboxes = checkboxes.filter(':checked').length;
                $('#counter').html(countCheckedCheckboxes);
            });


        });

        function kirimData() {
            var favorite = [];
            $.each($(".my_data_checker:checked"), function() {
                favorite.push($(this).attr("dbval"));
            });
            var okajax = favorite.join(", ");
            $.ajax({
                url: "<?= base_url("ajax/getpnd_export") ?>",
                type: "post",
                dataType: "json",
                data: {
                    'data': okajax
                },
                success: function(dataajax) {
                    $("#modal-report").modal('show');
                    $(function() {
                        const thead = $("#t12 thead");
                        const tbody = $("#t12 tbody");
                        let tr = $("<tr />");

                        $.each(Object.keys(dataajax[0]), function(_, key) {
                            tr.append("<th>" + key + "</th>")
                        });
                        tr.appendTo(thead);

                        $.each(dataajax, function(_, obj) {
                            tr = $("<tr />");
                            $.each(obj, function(_, text) {
                                tr.append("<td>" + text + "</td>")
                            });
                            tr.appendTo(tbody);
                        });
                    })
                },
            });
        }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ekspor Data PND</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table" id="t12">
                        <thead>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>