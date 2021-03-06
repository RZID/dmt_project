<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("crud");
        $this->load->model("miscellaneous");
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }
    function plth1()
    {
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = str_replace(" ", "", strtolower(time() . "-Memo-" . $_FILES["berkasmemo"]["name"]));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkasmemo')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            if ($upload_data) {
                $data = array("files" => $upload_data["file_name"]);
            }
            echo json_encode($data);
        }
    }
    function plth2()
    {
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = str_replace(" ", "", strtolower(time() . "-laporan-" . $_FILES["berkaslaporan"]["name"]));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkaslaporan')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            if ($upload_data) {
                $data = array("fileplth2" => $upload_data["file_name"]);
            }
            echo json_encode($data);
        }
    }

    function ins()
    {
        $id = $this->input->get("id_upload");
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = str_replace(" ", "", strtolower(time() . "-ins" . $id . "-" . $_FILES["berkas" . $id]["name"]));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas' . $id)) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            if ($upload_data) {
                $data = array("insfile" . $id => $upload_data["file_name"]);
            }
            echo json_encode($data);
        }
    }

    function keubc()
    {
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = str_replace(" ", "", strtolower(time() . "-absensi_bc-" . $_FILES["absenkehadiran"]["name"]));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('absenkehadiran')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            if ($upload_data) {
                $data = array("keubc" => $upload_data["file_name"]);
            }
            echo json_encode($data);
        }
    }
}
