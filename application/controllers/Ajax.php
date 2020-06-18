<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("crud");
        $this->load->library('form_validation');
    }

    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }

    function get_status_pnd()
    {
        $id = $this->input->post("id");

        $pnd = $this->crud->select_where("plth_dmt", array("id_plth" =>  $id))->row_array();

        $out_pnd['nama'] = "<div class='row'> <div class='col-lg-4'> Nama Pelatihan </div>" . ":<div class='col-lg'> " . $pnd["nama_plth"] . "</div></div>";

        if ($pnd['batch_plth'] < 1) {
            $out_pnd["batch"] = "<li>Batch Belum diisi</li>";
        } else {
            $out_pnd["batch"] = "";
        }
        if ($pnd['tglmulai_plth'] < 1) {
            $out_pnd["tglmulai"] = "<li>Tanggal Mulai Belum diisi</li>";
        } else {
            $out_pnd["tglmulai"] = "";
        }
        if ($pnd['tgldone_plth'] < 1) {
            $out_pnd["tglselesai"] = "<li>Tanggal Selesai Belum diisi</li>";
        } else {
            $out_pnd["tglselesai"] = "";
        }
        if ($pnd['sifat_plth'] == "N/A") {
            $out_pnd["sifat"] = "<li>Sifat Belum diisi</li>";
        } else {
            $out_pnd["sifat"] = "";
        }
        if ($pnd['vendor_plth'] == "N/A") {
            $out_pnd["vendor"] = "<li>Vendor Belum diisi</li>";
        } else {
            $out_pnd["vendor"] = "";
        }
        if ($pnd['nmvendor_plth'] == "N/A") {
            $out_pnd["namavendor"] = "<li>Nama Vendor Belum diisi</li>";
        } else {
            $out_pnd["namavendor"] = "";
        }
        if ($pnd['hrgkspvend_plth'] < 1) {
            $out_pnd["hargakesepakatanvendor"] = "<li>Harga Kesepakatan Vendor Belum diisi</li>";
        } else {
            $out_pnd["hargakesepakatanvendor"] = "";
        }
        if ($pnd['ketkspvend_plth'] == "N/A") {
            $out_pnd["keteranganvendor"] = "<li>Keterangan Kesepakatan Vendor Belum diisi</li>";
        } else {
            $out_pnd["keteranganvendor"] = "";
        }
        if ($pnd['memopem_plth'] == "N/A") {
            $out_pnd["memo"] = "<li>Memo Belum diisi</li>";
        } else {
            $out_pnd["memo"] = "";
        }
        if ($pnd['ketpros_plth'] == "Pending") {
            $out_pnd["status"] = "<li>Status Belum diselesaikan</li>";
        } else {
            $out_pnd["status"] = "";
        }
        echo json_encode($out_pnd);
    }

    function get_status_opr()
    {
        $id = $this->input->post("id");
        $opr = $this->crud->select_where("opr_dmt", array("id_plth" =>  $id));
        $opr_ra = $this->crud->select_where("opr_dmt", array("id_plth" =>  $id))->row_array();
        $pnd = $this->crud->select_where("plth_dmt", array("id_plth" =>  $id))->row_array();
        $out_opr['nama'] = "<div class='row'> <div class='col-lg-4'> Nama Pelatihan </div>" . ":<div class='col-lg'> " . $pnd["nama_plth"] . "</div></div>";

        if ($opr->num_rows() < 1) {
            $out_opr["jumlah_peserta"] = "";
            $out_opr["glsarfas"] = "";
            $out_opr["namavendorakomodasi"] = "";
            $out_opr["dokumen"] = "";
            $out_opr["addcost"] = "";
            $out_opr["pkba"] = "";
            $out_opr["status"] = "<li>Semua data belum diisi</li>";
        } else {
            if ($opr_ra['jmlpsrt_plth'] < 1) {
                $out_opr["jumlah_peserta"] = "<li>Jumlah Peserta Belum diisi</li>";
            } else {
                $out_opr["jumlah_peserta"] = "";
            }
            if ($opr_ra['nmvenakom_plth'] == "N/A") {
                $out_opr["namavendorakomodasi"] = "<li>Nama Vendor Akomodasi Belum diisi</li>";
            } else {
                $out_opr["namavendorakomodasi"] = "";
            }

            if ($opr_ra['glsarfas_opr'] == "N/A" or $opr_ra['glsarfas_opr'] == "") {
                $out_opr["glsarfas"] = "<li>GL Sarfas Belum diisi</li>";
            } else {
                $out_opr["glsarfas"] = "";
            }

            if ($opr_ra['dokumen_opr'] == "N/A" or $opr_ra['dokumen_opr'] == "") {
                $out_opr["dokumen"] = "<li>Dokumen Belum diisi</li>";
            } else {
                $out_opr["dokumen"] = "";
            }

            if ($opr_ra['addcost_opr'] < 1) {
                $out_opr["addcost"] = "<li>Additional Cost Belum diisi</li>";
            } else {
                $out_opr["addcost"] = "";
            }

            if ($opr_ra['pkba_opr'] == "N/A" or $opr_ra['pkba_opr'] == "") {
                $out_opr["pkba"] = "<li>PK/BA Belum diisi</li>";
            } else {
                $out_opr["pkba"] = "";
            }

            if ($opr_ra['status_opr'] == "Pending" or $opr_ra['status_opr'] == "") {
                $out_opr["status"] = "<li>Status Belum diselesaikan</li>";
            } else {
                $out_opr["status"] = "";
            }
        }
        echo json_encode($out_opr);
    }

    function get_status_ins()
    {
        $id = $this->input->post("id");
        $ins = $this->crud->select_where("ins_dmt", array("id_plth" =>  $id));
        $ins_ra = $this->crud->select_where("ins_dmt", array("id_plth" =>  $id))->row_array();
        $pnd = $this->crud->select_where("plth_dmt", array("id_plth" =>  $id))->row_array();
        $out_ins['nama'] = "<div class='row'> <div class='col-lg-4'> Nama Pelatihan </div>" . ":<div class='col-lg'> " . $pnd["nama_plth"] . "</div></div>";

        if ($ins->num_rows() < 1) {
            $out_ins["ins1"] = "";
            $out_ins["sesins1"] = "";
            $out_ins["beasesins1"] = "";

            $out_ins["status"] = "<li>Semua data belum diisi</li>";
        } else {
            if ($ins_ra['ins1_ins'] == "" or $ins_ra['ins1_ins'] == "N/A") {
                $out_ins["ins1"] = "<li>Instruktur 1 Belum diisi</li>";
            } else {
                $out_ins["ins1"] = "";
            }

            if ($ins_ra['sesins1_ins'] < 1) {
                $out_ins["sesins1"] = "<li>Sesi Instruktur 1 Belum diisi</li>";
            } else {
                $out_ins["sesins1"] = "";
            }

            if ($ins_ra['beasesins1_ins'] < 1) {
                $out_ins["beasesins1"] = "<li>Biaya Instruktur 1 Belum diisi</li>";
            } else {
                $out_ins["beasesins1"] = "";
            }

            if ($ins_ra['status_ins'] == "" or $ins_ra['status_ins'] == "Pending") {
                $out_ins["status"] = "<li>Status Belum diselesaikan</li>";
            } else {
                $out_ins["status"] = "";
            }
        }
        echo json_encode($out_ins);
    }

    function get_status_keu()
    {
        $id = $this->input->post("id");
        $keu = $this->crud->select_where("keu_dmt", array("id_plth" =>  $id));
        $keu_ra = $this->crud->select_where("keu_dmt", array("id_plth" =>  $id))->row_array();
        $keubc = $this->crud->select_where("keu_bc_dmt", array("id_plth" =>  $id));
        $keubc_ra = $this->crud->select_where("keu_bc_dmt", array("id_plth" =>  $id))->row_array();
        $pnd = $this->crud->select_where("plth_dmt", array("id_plth" =>  $id))->row_array();
        $out_keu['nama'] = "<div class='row'> <div class='col-lg-4'> Nama Pelatihan </div>" . ":<div class='col-lg'> " . $pnd["nama_plth"] . "</div></div>";

        if ($keu->num_rows() < 1) {
            $out_keu["pro1"] = "";
            $out_keu["pro2"] = "";
            $out_keu["pro3"] = "";
            $out_keu["pro4"] = "";
            $out_keu["pro5"] = "";
            $out_keu["pro6"] = "";
            $out_keu["pro7"] = "";

            $out_keu["ako1"] = "";
            $out_keu["ako2"] = "";
            $out_keu["ako3"] = "";
            $out_keu["ako4"] = "";
            $out_keu["ako5"] = "";
            $out_keu["ako6"] = "";
            $out_keu["ako7"] = "";

            $out_keu["status1"] = "";
            $out_keu["status2"] = "";
            $out_keu["status3"] = "";
            $out_keu["status4"] = "";
            $out_keu["status5"] = "";
            $out_keu["status6"] = "";
            $out_keu["status7"] = "";
            $out_keu["status8"] = "";
            $out_keu["status9"] = "";
            $out_keu["status10"] = "";

            $out_keu["status"] = "<li>Semua data belum diisi</li>";
        } else {
            if ($keu_ra["pro1"] < 1) {
                $out_keu["pro1"] = "<li>No. Vendor Provider Belum Diisi</li>";
            } else {
                $out_keu["pro1"] = "";
            }
            if ($keu_ra["pro2"] == "N/A" or $keu_ra["pro2"] == "") {
                $out_keu["pro2"] = "<li>Nama Vendor Provider Belum Diisi</li>";
            } else {
                $out_keu["pro2"] = "";
            }
            if ($keu_ra["pro3"] == 0) {
                $out_keu["pro3"] = "<li>No. Invoice Provider Belum Diisi</li>";
            } else {
                $out_keu["pro3"] = "";
            }
            if ($keu_ra["pro4"] == 0) {
                $out_keu["pro4"] = "<li>Nilai Provider Belum Diisi</li>";
            } else {
                $out_keu["pro4"] = "";
            }
            if ($keu_ra["pro5"] == 0) {
                $out_keu["pro5"] = "<li>PO Provider Belum Diisi</li>";
            } else {
                $out_keu["pro5"] = "";
            }
            if ($keu_ra["pro6"] == 0) {
                $out_keu["pro6"] = "<li>SSC ID Provider Belum Diisi</li>";
            } else {
                $out_keu["pro6"] = "";
            }
            if ($keu_ra["pro7"] == "N/A" or $keu_ra["pro7"] == "") {
                $out_keu["pro7"] = "<li>Status Provider Belum Diisi</li>";
            } else {
                $out_keu["pro7"] = "";
            }

            if ($keu_ra["ako1"] < 1) {
                $out_keu["ako1"] = "<li>No. Vendor Akomodasi Belum Diisi</li>";
            } else {
                $out_keu["ako1"] = "";
            }
            if ($keu_ra["ako2"] == "N/A" or $keu_ra["ako2"] == "") {
                $out_keu["ako2"] = "<li>Nama Vendor Akomodasi Belum Diisi</li>";
            } else {
                $out_keu["ako2"] = "";
            }
            if ($keu_ra["ako3"] == 0) {
                $out_keu["ako3"] = "<li>No. Invoice Akomodasi Belum Diisi</li>";
            } else {
                $out_keu["ako3"] = "";
            }
            if ($keu_ra["ako4"] == 0) {
                $out_keu["ako4"] = "<li>Nilai Akomodasi Belum Diisi</li>";
            } else {
                $out_keu["ako4"] = "";
            }
            if ($keu_ra["ako5"] == 0) {
                $out_keu["ako5"] = "<li>PO Akomodasi Belum Diisi</li>";
            } else {
                $out_keu["ako5"] = "";
            }
            if ($keu_ra["ako6"] == 0) {
                $out_keu["ako6"] = "<li>SSC ID Akomodasi Belum Diisi</li>";
            } else {
                $out_keu["ako6"] = "";
            }
            if ($keu_ra["ako7"] == "N/A" or $keu_ra["ako7"] == "") {
                $out_keu["ako7"] = "<li>Status Akomodasi Belum Diisi</li>";
            } else {
                $out_keu["ako7"] = "";
            }

            if ($keu_ra["status1"] == "N/A" or $keu_ra["status1"] == "") {
                $out_keu["status1"] = "";
            } else {
                if ($keu_ra["status1"] == "Belum Dibayar") {
                    $out_keu["status1"] = "<li>Status Instruktur 1 Belum Dibayar</li>";
                } else {
                    $out_keu["status1"] = "";
                }
            }
            if ($keu_ra["status2"] == "N/A" or $keu_ra["status2"] == "") {
                $out_keu["status2"] = "";
            } else {
                if ($keu_ra["status2"] == "Belum Dibayar") {
                    $out_keu["status2"] = "<li>Status Instruktur 2 Belum Dibayar</li>";
                } else {
                    $out_keu["status2"] = "";
                }
            }
            if ($keu_ra["status3"] == "N/A" or $keu_ra["status3"] == "") {
                $out_keu["status3"] = "";
            } else {
                if ($keu_ra["status3"] == "Belum Dibayar") {
                    $out_keu["status3"] = "<li>Status Instruktur 3 Belum Dibayar</li>";
                } else {
                    $out_keu["status3"] = "";
                }
            }
            if ($keu_ra["status4"] == "N/A" or $keu_ra["status4"] == "") {
                $out_keu["status4"] = "";
            } else {
                if ($keu_ra["status4"] == "Belum Dibayar") {
                    $out_keu["status4"] = "<li>Status Instruktur 4 Belum Dibayar</li>";
                } else {
                    $out_keu["status4"] = "";
                }
            }
            if ($keu_ra["status5"] == "N/A" or $keu_ra["status5"] == "") {
                $out_keu["status5"] = "";
            } else {
                if ($keu_ra["status5"] == "Belum Dibayar") {
                    $out_keu["status5"] = "<li>Status Instruktur 5 Belum Dibayar</li>";
                } else {
                    $out_keu["status5"] = "";
                }
            }
            if ($keu_ra["status6"] == "N/A" or $keu_ra["status6"] == "") {
                $out_keu["status6"] = "";
            } else {
                if ($keu_ra["status6"] == "Belum Dibayar") {
                    $out_keu["status6"] = "<li>Status Instruktur 6 Belum Dibayar</li>";
                } else {
                    $out_keu["status6"] = "";
                }
            }
            if ($keu_ra["status7"] == "N/A" or $keu_ra["status7"] == "") {
                $out_keu["status7"] = "";
            } else {
                if ($keu_ra["status7"] == "Belum Dibayar") {
                    $out_keu["status7"] = "<li>Status Instruktur 7 Belum Dibayar</li>";
                } else {
                    $out_keu["status7"] = "";
                }
            }
            if ($keu_ra["status8"] == "N/A" or $keu_ra["status8"] == "") {
                $out_keu["status8"] = "";
            } else {
                if ($keu_ra["status8"] == "Belum Dibayar") {
                    $out_keu["status8"] = "<li>Status Instruktur 8 Belum Dibayar</li>";
                } else {
                    $out_keu["status8"] = "";
                }
            }
            if ($keu_ra["status9"] == "N/A" or $keu_ra["status9"] == "") {
                $out_keu["status9"] = "";
            } else {
                if ($keu_ra["status9"] == "Belum Dibayar") {
                    $out_keu["status9"] = "<li>Status Instruktur 9 Belum Dibayar</li>";
                } else {
                    $out_keu["status9"] = "";
                }
            }
            if ($keu_ra["status10"] == "N/A" or $keu_ra["status10"] == "") {
                $out_keu["status10"] = "";
            } else {
                if ($keu_ra["status10"] == "Belum Dibayar") {
                    $out_keu["status10"] = "<li>Status Instruktur 10 Belum Dibayar</li>";
                } else {
                    $out_keu["status10"] = "";
                }
            }
            if ($keu_ra['status_keu'] == "" or $keu_ra['status_keu'] == "Pending") {
                $out_keu["status"] = "<li>Status Finance IP Belum diselesaikan</li>";
            } else {
                $out_keu["status"] = "";
            }
        }
        if ($keubc->num_rows() < 1) {
            $out_keu["nocs_ptmn"] = "";
            $out_keu["namacs_ptmn"] = "";
            $out_keu["nocs_tp"] = "";
            $out_keu["namacs_tp"] = "";
            $out_keu["trf"] = "";
            $out_keu["cash"] = "";
            $out_keu["internal"] = "";
            $out_keu["aptp"] = "";
            $out_keu["ttlrev"] = "";
            $out_keu["noso"] = "";
            $out_keu["idssc"] = "";
            $out_keu["noinv"] = "";
            $out_keu["stat"] = "";

            $out_keu["status_bc"] = "<li>Semua data belum diisi</li>";
        } else {
            if ($keubc_ra["nocs_ptmn"] < 1) {
                $out_keu["nocs_ptmn"] = "<li>No. Customer PTMN Belum Diisi</li>";
            } else {
                $out_keu["nocs_ptmn"] = "";
            }
            if ($keubc_ra["namacs_ptmn"] = "" or $keubc_ra["namacs_ptmn"] = "N/A") {
                $out_keu["namacs_ptmn"] = "<li>Nama Customer PTMN Belum Diisi</li>";
            } else {
                $out_keu["namacs_ptmn"] = "";
            }
            if ($keubc_ra["nocs_tp"] < 1) {
                $out_keu["nocs_tp"] = "<li>No. Customer AP / Third Party Belum Diisi</li>";
            } else {
                $out_keu["nocs_tp"] = "";
            }
            if ($keubc_ra["namacs_tp"] = "" or $keubc_ra["namacs_tp"] = "N/A") {
                $out_keu["namacs_tp"] = "<li>Nama Customer AP / Third Party Belum Diisi</li>";
            } else {
                $out_keu["namacs_tp"] = "";
            }
            if ($keubc_ra["trf_trf"] < 1) {
                $out_keu["trf"] = "<li>Tarif Belum Diisi</li>";
            } else {
                $out_keu["trf"] = "";
            }
            if ($keubc_ra["cash_pro"] < 1) {
                $out_keu["cash"] = "<li>Cash Profit Belum Diisi</li>";
            } else {
                $out_keu["cash"] = "";
            }
            if ($keubc_ra["internal_pro"] < 1) {
                $out_keu["internal"] = "<li>Internal Profit Belum Diisi</li>";
            } else {
                $out_keu["internal"] = "";
            }
            if ($keubc_ra["aptp_pro"] < 1) {
                $out_keu["aptp"] = "<li>AP / Third Party Profit Belum Diisi</li>";
            } else {
                $out_keu["aptp"] = "";
            }
            if ($keubc_ra["ttlrev_pro"] < 1) {
                $out_keu["ttlrev"] = "<li>Total Revenue Profit Belum Diisi</li>";
            } else {
                $out_keu["ttlrev"] = "";
            }
            if ($keubc_ra["noso_pro"] < 1) {
                $out_keu["noso"] = "<li>No. SO Profit Belum Diisi</li>";
            } else {
                $out_keu["noso"] = "";
            }
            if ($keubc_ra["idssc_pro"] < 1) {
                $out_keu["idssc"] = "<li>ID SSC Profit Belum Diisi</li>";
            } else {
                $out_keu["idssc"] = "";
            }
            if ($keubc_ra["noinv_pro"] < 1) {
                $out_keu["noinv"] = "<li>Invoice No. Profit Belum Diisi</li>";
            } else {
                $out_keu["noinv"] = "";
            }
            if ($keubc_ra["stat_pro"] == "Belum Dibayar") {
                $out_keu["stat"] = "<li>Status Profit Belum Dibayar</li>";
            } else {
                $out_keu["stat"] = "";
            }

            $out_keu["status_bc"] = $keubc_ra["status_keu_bc"];
        }
        echo json_encode($out_keu);
    }

    function viewasfiltereddata()
    {
        $from = strtotime($this->input->post("from"));
        $to = strtotime($this->input->post("to"));

        redirect("user/index?from=$from&to=$to");
    }

    function get_status_peserta()
    {
        $id = $this->input->post("id");
        $pnd = $this->crud->select_where("plth_dmt", array("id_plth" =>  $id))->row_array();
        $out_keu['nama_ok'] = "<div class='row'> <div class='col-lg-4'> Nama Pelatihan </div>" . ":<div class='col-lg'> " . $pnd["nama_plth"] . "</div></div>";
        $keu = $this->crud->select_where("pesertapnd_dmt", array("id_plth" =>  $id));
        $keu1 = $this->crud->select_where("pesertakeu_dmt", array("id_plth" =>  $id));
        $keu_ra = $this->crud->select_where("pesertapnd_dmt", array("id_plth" =>  $id))->row_array();
        $keu2_ra = $this->crud->select_where("pesertakeu_dmt", array("id_plth" =>  $id))->row_array();

        if ($keu->num_rows() < 1) {
            $out_keu["trfplth_pnd"] = "";
            $out_keu["jmldtgh_pnd"] = "";
            $out_keu["nmptmeng_pnd"] = "";
            $out_keu["surund_pnd"] = "";

            $out_keu["status_pnd"] = "<li>Semua data belum diisi</li>";
        } else {
            $out_keu["pnd"] = "<li> <h5><u>Data PND</u></h5> </li>";
            if ($keu_ra['trfplth_pesertapnd'] < 1) {
                $out_keu["trfplth_pnd"] = "<li>Tarif Pelatihan Belum Diisi</li>";
            } else {
                $out_keu["trfplth_pnd"] = "";
            }

            if ($keu_ra['jmldtgh_pesertapnd'] < 1) {
                $out_keu["jmldtgh_pnd"] = "<li>Jumlah Peserta Ditagih Belum Diisi</li>";
            } else {
                $out_keu["jmldtgh_pnd"] = "";
            }
            if ($keu_ra['nmptmeng_pesertapnd'] == "" or $keu_ra['nmptmeng_pesertapnd'] == "N/A") {
                $out_keu["nmptmeng_pnd"] = "<li>Nama PT Yang Mengikuti Belum Diisi</li>";
            } else {
                $out_keu["nmptmeng_pnd"] = "";
            }
            if ($keu_ra['surund_pesertapnd'] == "" or $keu_ra['surund_pesertapnd'] == "N/A") {
                $out_keu["surund_pnd"] = "<li>Surat Undangan Belum Diupload</li>";
            } else {
                $out_keu["surund_pnd"] = "";
            }

            if ($keu_ra['status_pesertapnd'] == "" or $keu_ra['status_pesertapnd'] == "Pending") {
                $out_keu["status_pnd"] = "<li>Status Belum diselesaikan</li>";
            } else {
                $out_keu["status_pnd"] = "";
            }
        }

        if ($keu1->num_rows() < 1) {
            $out_keu["tglbuatinv_keu"] = "";
            $out_keu["tglkiriminv_keu"] = "";
            $out_keu["tglterimainv_keu"] = "";
            $out_keu["tglpayinv_keu"] = "";
            $out_keu["ket_keu"] = "";

            $out_keu["status_keu"] = "<li>Semua data belum diisi</li>";
        } else {
            if ($keu2_ra["tglbuatinv_pesertakeu"] == "" or $keu2_ra["tglbuatinv_pesertakeu"] == 0) {
                $out_keu["tglbuatinv_keu"] = "<li>Tanggal Pembuatan Invoice Belum Diisi</li>";
            } else {
                $out_keu["tglbuatinv_keu"] = "";
            }

            if ($keu2_ra["tglkiriminv_pesertakeu"] == "" or $keu2_ra["tglbuatinv_pesertakeu"] == 0) {
                $out_keu["tglkiriminv_keu"] = "<li>Tanggal Pengiriman Invoice Belum Diisi</li>";
            } else {
                $out_keu["tglkiriminv_keu"] = "";
            }

            if ($keu2_ra["tglterimainv_pesertakeu"] == "" or $keu2_ra["tglbuatinv_pesertakeu"] == 0) {
                $out_keu["tglterimainv_keu"] = "<li>Tanggal Penerimaan Invoice (Oleh Pihak Ke-3) Belum Diisi</li>";
            } else {
                $out_keu["tglterimainv_keu"] = "";
            }

            if ($keu2_ra["tglpayinv_pesertakeu"] == "" or $keu2_ra["tglbuatinv_pesertakeu"] == 0) {
                $out_keu["tglpayinv_keu"] = "<li>Tanggal Invoice Dibayarkan (Oleh Pihak Ke-3) Belum Diisi</li>";
            } else {
                $out_keu["tglpayinv_keu"] = "";
            }

            if ($keu2_ra["ket_pesertakeu"] == "" or $keu2_ra["tglbuatinv_pesertakeu"] == 0) {
                $out_keu["ket_keu"] = "<li>Keterangan Belum Diisi</li>";
            } else {
                $out_keu["ket_keu"] = "";
            }

            if ($keu2_ra["status_pesertakeu"] == "Pending") {
                $out_keu["status_keu"] = "<li>Status Belum Diselesaikan</li>";
            } else {
                $out_keu["status_keu"] = "";
            }
        }


        echo json_encode($out_keu);
    }

    function getpnd_export()
    {
        $data_down = $this->input->post("data");
        $gave_data = $this->db->query("select * from plth_dmt where id_plth in (" . $data_down . ")")->result_array();
        echo json_encode($gave_data);
        json_encode($gave_data);
    }
}
