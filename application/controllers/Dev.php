<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dev extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("crud");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = [
            "title" => "Developing Only" . date("D d m M Y"), time(),
            "lv" => "Developer"
        ];
        $this->load->view("templating/head", $data);
        $this->load->view("navbar/sa", $data);
        $this->load->view("dev_only/dev1-180620", $data);
        $this->load->view("templating/foot", $data);
    }
    function upload()
    {
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = time() . "-file1-" . $_FILES["file"];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            echo json_encode($data);
        }
    }
}
