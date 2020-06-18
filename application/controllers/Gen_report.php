<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gen_report extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("crud");
        $this->load->model("miscellaneous");
        $this->load->model("export_excel");
        $this->load->library('form_validation');
    }
    function pnd_report()
    {
        $data = array("dis" => $this);
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
        } else {
            $this->load->view("templating/head", $data);
            if ($this->session->userdata("access_num") == 1) {
                $this->load->view("navbar/sa", $data);
            } else {
                $this->load->view("navbar/pnd", $data);
            }
            $this->load->view("gen_report/pnd", $data);
            $this->load->view("templating/foot", $data);
        }
    }
}
