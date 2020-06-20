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

    function ins1()
    {
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = str_replace(" ", "", strtolower(time() . "-ins1-" . $_FILES["berkas1"]["name"]));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas1')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            if ($upload_data) {
                $data = array("insfile1" => $upload_data["file_name"]);
            }
            echo json_encode($data);
        }
    }
    function ins2()
    {
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = str_replace(" ", "", strtolower(time() . "-ins2-" . $_FILES["berkas2"]["name"]));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas2')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            if ($upload_data) {
                $data = array("insfile2" => $upload_data["file_name"]);
            }
            echo json_encode($data);
        }
    }
    function ins3()
    {
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = str_replace(" ", "", strtolower(time() . "-ins3-" . $_FILES["berkas3"]["name"]));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas3')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            if ($upload_data) {
                $data = array("insfile3" => $upload_data["file_name"]);
            }
            echo json_encode($data);
        }
    }
    function ins4()
    {
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = str_replace(" ", "", strtolower(time() . "-ins4-" . $_FILES["berkas4"]["name"]));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas4')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            if ($upload_data) {
                $data = array("insfile4" => $upload_data["file_name"]);
            }
            echo json_encode($data);
        }
    }
    function ins5()
    {
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = str_replace(" ", "", strtolower(time() . "-ins5-" . $_FILES["berkas5"]["name"]));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas5')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            if ($upload_data) {
                $data = array("insfile5" => $upload_data["file_name"]);
            }
            echo json_encode($data);
        }
    }
    function ins6()
    {
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = str_replace(" ", "", strtolower(time() . "-ins6-" . $_FILES["berkas6"]["name"]));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas6')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            if ($upload_data) {
                $data = array("insfile6" => $upload_data["file_name"]);
            }
            echo json_encode($data);
        }
    }
    function ins7()
    {
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = str_replace(" ", "", strtolower(time() . "-ins7-" . $_FILES["berkas7"]["name"]));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas7')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            if ($upload_data) {
                $data = array("insfile7" => $upload_data["file_name"]);
            }
            echo json_encode($data);
        }
    }
    function ins8()
    {
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = str_replace(" ", "", strtolower(time() . "-ins8-" . $_FILES["berkas8"]["name"]));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas8')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            if ($upload_data) {
                $data = array("insfile8" => $upload_data["file_name"]);
            }
            echo json_encode($data);
        }
    }
    function ins9()
    {
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = str_replace(" ", "", strtolower(time() . "-ins9-" . $_FILES["berkas9"]["name"]));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas9')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            if ($upload_data) {
                $data = array("insfile9" => $upload_data["file_name"]);
            }
            echo json_encode($data);
        }
    }
    function ins10()
    {
        $config['upload_path']          = "assets/uploaded_file/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 25000;
        $config['file_name']             = str_replace(" ", "", strtolower(time() . "-ins10-" . $_FILES["berkas10"]["name"]));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas10')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            if ($upload_data) {
                $data = array("insfile10" => $upload_data["file_name"]);
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
