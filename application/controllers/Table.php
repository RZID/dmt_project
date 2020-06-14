<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("crud");
        $this->load->model("Miscellaneous");
        $this->load->library('form_validation');
    }

    public function operation()
    {
        if ($this->session->userdata("access_num") != 4) {
            $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Galat Akses!',
                        'Anda tidak berhak mengakses fitur tersebut',
                        'error'
                    )});
                </script>");
            redirect("user/index");
            die;
        }
        $data = array(
            "title" => "Tabel Operation - Dashboard Monitoring Training",
            "dis" => $this
        );
        $this->load->view("templating/head", $data);
        $this->load->view("table/table_opr", $data);
        $this->load->view("templating/foot", $data);
    }

    public function instruktur()
    {
        if ($this->session->userdata("access_num") != 3) {
            $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Galat Akses!',
                        'Anda tidak berhak mengakses fitur tersebut',
                        'error'
                    )});
                </script>");
            redirect("user/index");
            die;
        }
        $data = array(
            "title" => "Tabel Instruktur - Dashboard Monitoring Training",
            "input_kel" => "active",
            "dis" => $this
        );
        $this->load->view("templating/head", $data);
        $this->load->view("navbar/ins", $data);
        $this->load->view("table/table_ins", $data);
        $this->load->view("templating/foot", $data);
    }

    public function pelatihan()
    {
        if ($this->session->userdata("access_num") > 2) {
            $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Galat Akses!',
                        'Anda tidak berhak mengakses fitur tersebut',
                        'error'
                    )});
                </script>");
            redirect("user/index");
            die;
        }
        $data = array(
            "title" => "Tabel PND - Dashboard Monitoring Training",
            "dis" => $this
        );
        $this->load->view("templating/head", $data);
        $this->load->view("table/table_pnd", $data);
        $this->load->view("templating/foot", $data);
    }

    public function keuangan()
    {
        if ($this->session->userdata("access_num") != 5) {
            $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Galat Akses!',
                        'Anda tidak berhak mengakses fitur tersebut',
                        'error'
                    )});
                </script>");
            redirect("user/index");
            die;
        }
        $data = array(
            "title" => "Tabel Keuangan - Dashboard Monitoring Training",
            "dis" => $this,
            "keu_ip" => "active"
        );
        $this->load->view("templating/head", $data);
        $this->load->view("navbar/keu", $data);
        $this->load->view("table/table_keu", $data);
        $this->load->view("templating/foot", $data);
    }

    public function keuangan_bc()
    {
        if ($this->session->userdata("access_num") != 5) {
            $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Galat Akses!',
                        'Anda tidak berhak mengakses fitur tersebut',
                        'error'
                    )});
                </script>");
            redirect("user/index");
            die;
        }
        $data = array(
            "title" => "Tabel Keuangan - Dashboard Monitoring Training",
            "dis" => $this,
            "keu_bc" => "active"
        );
        $this->load->view("templating/head", $data);
        $this->load->view("navbar/keu", $data);
        $this->load->view("table/table_keu_bc", $data);
        $this->load->view("templating/foot", $data);
    }

    public function peserta_pnd()
    {
        if ($this->session->userdata("access_num") > 2) {
            $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Galat Akses!',
                        'Anda tidak berhak mengakses fitur tersebut',
                        'error'
                    )});
                </script>");
            redirect("user/index");
            die;
        }
        $data = array(
            "title" => "Tabel Kelengkapan Peserta - Dashboard Monitoring Training",
            "peserta" => "active",
            "dis" => $this
        );
        $this->load->view("templating/head", $data);
        if ($this->session->userdata("access_num") == 2) {
            $this->load->view("navbar/pnd", $data);
        } else {
            $this->load->view("navbar/sa", $data);
        }
        $this->load->view("table/table_peserta_pnd", $data);
        $this->load->view("templating/foot", $data);
    }

    public function peserta_keu()
    {
        if ($this->session->userdata("access_num") != 5) {
            $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Galat Akses!',
                        'Anda tidak berhak mengakses fitur tersebut',
                        'error'
                    )});
                </script>");
            redirect("user/index");
            die;
        }
        $data = array(
            "title" => "Tabel Kelengkapan Peserta - Dashboard Monitoring Training",
            "psrt_keu" => "active",
            "dis" => $this
        );
        $this->load->view("templating/head", $data);
        $this->load->view("navbar/keu", $data);
        $this->load->view("table/table_peserta_keu", $data);
        $this->load->view("templating/foot", $data);
    }
}
