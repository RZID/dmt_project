  <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class User extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model("crud");
            $this->load->model("miscellaneous");
            $this->load->library('form_validation');
            $this->load->helper(array('form', 'url'));
            if (!$this->session->userdata("login")) {
                $this->session->set_flashdata("msg", "<script>
            $(document).ready(function() {
                sweetAlert(
                    'Anda tidak punya akses ini!',
                    'Silahkan login untuk melanjutkan.',
                    'error'
                )
            });
        </script>");
                redirect("home/index");
            }
        }

        public function register()
        {
            if ($this->session->userdata("access_num") !== "1") {
                $this->session->set_flashdata("msg", "<script>
            $(document).ready(function() {
                sweetAlert(
                    'Anda tidak punya akses ini!',
                    'Silahkan hubungi Super Admin.',
                    'error'
                )
            });
        </script>");
                redirect("user/index");
            }
            $config = array(
                array(
                    'field' => 'nama',
                    'label' => 'Nama Lengkap',
                    'rules' => 'required'
                ),

                array(
                    'field' => 'email',
                    'label' => 'Alamat E-Mail',
                    'rules' => 'required|is_unique[user_dmt.email_user]',
                    'errors' => array(
                        'is_unique' => "<script>
					$(document).ready(function() {
						sweetAlert(
							'Email Sudah Terdaftar Sebelumnya!',
							'Silahkan gunakan email lain.',
							'error'
						)
					});
				</script>",
                    ),
                ),
                array(
                    'field' => 'lv',
                    'label' => 'Hak Akses',
                    'rules' => 'required'
                ),

                array(
                    'field' => 'pass',
                    'label' => 'Password',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'pass2',
                    'label' => 'Password Confirmation',
                    'rules' => 'required|matches[pass]',
                    'errors' => array(
                        'matches' => "<script>
					$(document).ready(function() {
						sweetAlert(
							'Password Tidak Sama!',
							'Masukkan password yang sama pada kolom repeat password',
							'error'
						)
					});
				</script>",
                    ),
                ),

            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Tambah User - Dashboard Monitoring Training',
                );
                $this->load->view('templating/head', $data);
                $this->load->view('index/register', $data);
                $this->load->view('templating/modal', $data);
                $this->load->view('templating/foot', $data);
            } else {

                $data_send = array(
                    'nama_user' => strip_tags($this->input->post("nama"), TRUE),
                    'email_user' => strip_tags($this->input->post("email"), TRUE),
                    'pass_user' => password_hash($this->input->post("pass"), PASSWORD_DEFAULT),
                    'lv_user' => strip_tags($this->input->post("lv"), TRUE),
                );

                $this->crud->insert("user_dmt", $data_send);
                $this->session->set_flashdata("msg", "<script>
			$(document).ready(function() {
				sweetAlert(
					'Sukses Menambahkan User!',
					'User yang anda masukkan sudah dapat login',
					'success'
				)});
			</script>");
                redirect("user/user_manager");
            }
        }

        public function index()
        {
            $data = array(
                'title' => 'Dashboard - Dashboard Monitoring Training',
                'dis' => $this,
                'index' => "active",
                'dashboard' => "active",
            );
            $this->load->view('templating/head', $data);
            $this->load->view('templating/modal', $data);

            switch ($this->session->userdata("access_num")) {

                    //Super Admin
                case 1:
                    $this->load->view('navbar/sa', $data);
                    $this->load->view('index/index_sa', $data);
                    break;
                    //PND
                case 2:
                    $this->load->view('navbar/pnd', $data);
                    $this->load->view('index/index_pnd', $data);
                    break;

                    //Instruktur
                case 3:
                    $this->load->view('navbar/ins', $data);
                    $this->load->view('index/index_ins', $data);
                    break;

                    //Operation
                case 4:
                    $this->load->view('index/index_opr', $data);
                    break;

                    //Keuangan
                case 5:
                    $this->load->view('navbar/keu', $data);
                    $this->load->view('index/index_keu', $data);
                    break;
            }
            $this->load->view('templating/foot', $data);
        }

        public function insert_pelatihan()
        {
            if ($this->session->userdata("access_num") > 2) {
                $this->session->set_flashdata("msg", "<script>
            $(document).ready(function() {
                sweetAlert(
                    'Anda tidak punya akses ini!',
                    'Silahkan login untuk melanjutkan.',
                    'error'
                )
            });
            </script>");
                redirect('user/index');
            }

            $data = array(
                'title' => 'Input Pelatihan - Dashboard Monitoring Training',
                'insert' => 'active',
                'dis' => $this,
            );
            $this->load->view('templating/head', $data);
            if ($this->session->userdata("access_num") == 1) {
                $this->load->view('navbar/sa', $data);
            } else {
                $this->load->view('navbar/pnd', $data);
            }
            $this->load->view('edit/inputpelatihan', $data);
            $this->load->view('templating/modal', $data);
            $this->load->view('templating/foot', $data);
        }

        public function delete_pelatihan()
        {
            if ($this->session->userdata("access_num") > 2) {
                $this->session->set_flashdata("msg", "<script>
            $(document).ready(function() {
                sweetAlert(
                    'Anda tidak punya akses ini!',
                    'Silahkan login untuk melanjutkan.',
                    'error'
                )
            });
        </script>");
                redirect('user/index');
            }
            $id = $this->input->get("id_pelatihan");
            if (!$id) {
                redirect("user/index");
            } else {
                $this->crud->delete("plth_dmt", array('id_plth' => $id));
                $this->crud->delete("ins_dmt", array('id_plth' => $id));
                $this->crud->delete("keu_dmt", array('id_plth' => $id));
                $this->crud->delete("realisasi_dmt", array('id_plth' => $id));
                $this->crud->delete("opr_dmt", array('id_plth' => $id));
                $this->session->set_flashdata("msg", "<script>
			$(document).ready(function() {
				sweetAlert(
					'Sukses Menghapus Data!',
					'Data telah di hapus',
					'success'
				)});
			</script>");
                redirect("table/pelatihan");
            }
        }

        public function delete_user()
        {
            if ($this->session->userdata("access_num") != 1) {
                $this->session->set_flashdata("msg", "<script>
            $(document).ready(function() {
                sweetAlert(
                    'Anda tidak punya akses ini!',
                    'Silahkan login untuk melanjutkan.',
                    'error'
                )
            });
        </script>");
                redirect('user/index');
            }
            $id = $this->input->get("id_user");
            $cek = $this->crud->select_where("user_dmt", array('id_user' => $id))->row_array();
            if ($this->session->userdata("email") == $cek['email_user']) {
                $this->session->set_flashdata("msg", "<script>
            $(document).ready(function() {
                sweetAlert(
                    'Galat Akses!',
                    'Anda tidak dapat mengubah data anda sendiri',
                    'error'
                )
            });
        </script>");
                redirect("user/index");
                die;
            }
            if (!$id) {
                redirect("user/index");
            } else {
                $this->crud->delete("user_dmt", array('id_user' => $id));
                $this->session->set_flashdata("msg", "<script>
			$(document).ready(function() {
				sweetAlert(
					'Sukses Menghapus Data!',
					'Data telah di hapus',
					'success'
				)});
			</script>");
                redirect("user/user_manager");
            }
        }

        public function edit_pelatihan()
        {
            if ($this->session->userdata("access_num") > 2) {
                $this->session->set_flashdata("msg", "<script>
            $(document).ready(function() {
                sweetAlert(
                    'Anda tidak punya akses ini!',
                    'Silahkan login untuk melanjutkan.',
                    'error'
                )
            });
        </script>");
                redirect('user/index');
            }
            $id = $this->input->get("id_pelatihan");
            if (!$id) {
                redirect("user/index");
            } else {
                $data = array(
                    'title' => 'Edit Pelatihan - Dashboard Monitoring Training',
                    'dis' => $this,
                    'whdb' => $this->crud->select_where("plth_dmt", array("id_plth" => $id))->row_array(),
                );
                $this->load->view('templating/head', $data);
                if ($this->session->userdata("access_num") == 1) {
                    $this->load->view('navbar/sa', $data);
                } else {
                    $this->load->view('navbar/pnd', $data);
                }
                $this->load->view('edit/editplth', $data);
                $this->load->view('templating/modal', $data);
                $this->load->view('templating/foot', $data);
            }
        }

        public function edit_user()
        {
            $id = $this->input->get("id_user");
            $cek = $this->crud->select_where("user_dmt", array("id_user" => $id))->num_rows();
            if ($this->session->userdata("access_num") != 1) {
                redirect('user/index');
                die;
            }
            if ($this->session->userdata("email") == $cek['email_user']) {
                $this->session->set_flashdata("msg", "<script>
            $(document).ready(function() {
                sweetAlert(
                    'Galat Akses!',
                    'Anda tidak dapat mengubah data anda sendiri',
                    'error'
                )
            });
        </script>");
                redirect("user/index");
                die;
            }
            if (!$id) {
                redirect("user/index");
            } else {
                $data = array(
                    'title' => 'Input Pelatihan - Dashboard Monitoring Training',
                    'dis' => $this,
                    'whdb' => $this->crud->select_where("user_dmt", array("id_user" => $id))->row_array(),
                );
                $this->load->view('templating/head', $data);
                $this->load->view('edit/edituser', $data);
                $this->load->view('templating/modal', $data);
                $this->load->view('templating/foot', $data);
            }
        }

        public function edit_pelatihan_core()
        {
            if ($this->session->userdata("access_num") > 2) {
                redirect('user/index');
            }

            $select = $this->crud->select_where("plth_dmt", array('id_plth' => $this->input->post("id")))->row_array();
            if (!$this->input->post("status")) {
                $status = "Pending";
            } else {
                $status = $this->input->post("status");
            }

            if ($this->input->post("berkaslap_up")) {
                $fileberkas = $this->input->post("berkaslap_up");
            } else {
                if ($select["filelapor_plth"] != "" or $select["filelapor_plth"] != null) {
                    $fileberkas = $select["filelapor_plth"];
                } else {
                    $fileberkas = "";
                }
            }
            if ($this->input->post("berkasmemo_up")) {
                $filememo = $this->input->post("berkasmemo_up");
            } else {
                if ($select["filememo_plth"] != "" or $select["filememo_plth"] != null) {
                    $filememo = $select["filememo_plth"];
                } else {
                    $filememo = "";
                }
            }

            if (!$this->input->post("feedback")) {
                $fb = 0;
            } else {
                $fb = 1;
            }
            if (!$this->input->post("vend")) {
                $vend = "N/A";
            } else {
                $vend = $this->input->post("vend");
            }
            $postdata = array(
                'jenis_plth' => $this->input->post('jenis'),
                'lokasi_plth' => $this->input->post('lokasi'),
                'tgllpr_plth' => strtotime($this->input->post('tgllpr')),
                'nama_plth' => $this->input->post('nama'),
                'ketpros_plth' => $status,
                'batch_plth' => $this->input->post('batch'),
                'tglmulai_plth' => strtotime($this->input->post('tglmulai')),
                'tgldone_plth' => strtotime($this->input->post('tglsls')),
                'sifat_plth' => $this->input->post('sifat'),
                'vendor_plth' => $this->input->post('vonv'),
                'sertifikasi_plth' => $this->input->post('cert'),
                'nmvendor_plth' => $vend,
                'hrgkspvend_plth' => $this->input->post('harga'),
                'ketkspvend_plth' => $this->input->post('ket'),
                'filememo_plth' => $filememo,
                'uniquememo_plth' => $filememo,
                'filelapor_plth' => $fileberkas,
                'pretest_plth' => strtotime($this->input->post("pretest")),
                'postest_plth' => strtotime($this->input->post("postest")),
                'feedback_plth' => $fb,
                'tglmemo_plth' => strtotime($this->input->post("tglmemo")),
            );
            $this->crud->update("plth_dmt", "id_plth", $select['id_plth'], $postdata);
            $this->session->set_flashdata("msg", "<script>$(document).ready(function() {sweetAlert('Sukses Mengubah Data!','Data telah di ubah','success')});</script>");
            redirect("user/index");
        }

        public function input_pelatihan_core()
        {
            $select = $this->crud->select_where("realisasi_dmt", array("id_plth" => $this->input->post("id")))->row_array();
            if ($this->session->userdata("access_num") > 2) {
                redirect('user/index');
            }
            if (!$this->input->post("status")) {
                $status = "Pending";
            } else {
                $status = $this->input->post("status");
            }



            if (!$this->input->post("feedback")) {
                $fb = 0;
            } else {
                $fb = 1;
            }
            if (!$this->input->post("vend")) {
                $vend = "N/A";
            } else {
                $vend = $this->input->post("vend");
            }

            $postdata = array(
                'jenis_plth' => $this->input->post('jenis'),
                'lokasi_plth' => $this->input->post('lokasi'),
                'tgllpr_plth' => strtotime($this->input->post('tgllpr')),
                'filelapor_plth' => $this->input->post("berkaslap_up"),
                'nama_plth' => $this->input->post('nama'),
                'ketpros_plth' => $status,
                'batch_plth' => $this->input->post('batch'),
                'tglmulai_plth' => strtotime($this->input->post('tglmulai')),
                'tgldone_plth' => strtotime($this->input->post('tglsls')),
                'sifat_plth' => $this->input->post('sifat'),
                'vendor_plth' => $this->input->post('vonv'),
                'sertifikasi_plth' => $this->input->post('cert'),
                'nmvendor_plth' => $vend,
                'hrgkspvend_plth' => $this->input->post('harga'),
                'ketkspvend_plth' => $this->input->post('ket'),
                'filememo_plth' => $this->input->post("berkasmemo_up"),
                'uniquememo_plth' => $this->input->post("berkasmemo_up"),
                'pretest_plth' => strtotime($this->input->post("pretest")),
                'postest_plth' => strtotime($this->input->post("postest")),
                'feedback_plth' => $fb,
                'tglmemo_plth' => strtotime($this->input->post("tglmemo")),
            );

            $this->crud->insert("plth_dmt", $postdata);
            $this->session->set_flashdata("msg", "<script>
			$(document).ready(function() {
				sweetAlert(
					'Sukses Menambahkan Data!',
					'Data telah di input',
					'success'
				)});
			</script>");
            redirect("user/index");
        }

        public function user_manager()
        {
            if ($this->session->userdata("access_num") != 1) {
                redirect('user/index');
            }

            $data = array(
                'title' => 'User Management - Dashboard Monitoring Training',
                'dis' => $this,
            );
            $this->load->view('templating/head', $data);
            $this->load->view('table/user_mng', $data);
            $this->load->view('templating/modal', $data);
            $this->load->view('templating/foot', $data);
        }

        function edit_user_core()
        {
            if ($this->session->userdata("access_num" != 1)) {
                redirect("user/index");
            }

            $id = $this->input->post("id");

            if (!$id) {
                redirect("user/index");
            } else {
                $new_pass = $this->input->post("new_pass");
                $old_pass = $this->input->post("old_pass");
                $conf_pass = $this->input->post("conf_pass");

                $bind_db_data = $this->crud->select_where("user_dmt", array('id_user' => $id))->row_array();

                if ($new_pass != $conf_pass) {
                    $this->session->set_flashdata("msg", "<script>
                                $(document).ready(function() {
                                    sweetAlert(
                                        'Gagal Mengubah User!',
                                        'Password baru tidak sama',
                                        'error'
                                    )});
                                </script>");
                    redirect("user/edit_user?id_user=" . $id);
                    die;
                }
                //Tes Password
                if (!password_verify($old_pass, $bind_db_data['pass_user'])) {
                    $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Gagal Mengubah User!',
                        'Password lama tidak benar',
                        'error'
                    )});
                </script>");
                    redirect("user/edit_user?id_user=" . $id);
                    die;
                } else {
                    $arraysend_upd = array(
                        "nama_user" => $this->input->post("nama"),
                        "email_user" => $this->input->post("email"),
                        "lv_user" => $this->input->post("lv"),
                        "pass_user" => password_hash($this->input->post("new_pass"), PASSWORD_DEFAULT),
                    );
                    $this->crud->update("user_dmt", "id_user", $id, $arraysend_upd);
                    $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Sukses Mengubah Data!',
                        'Data user berhasil diubah',
                        'success'
                    )});
                </script>");
                    redirect("user/user_manager");
                }
            }
        }

        function ajaxgetdata()
        {
            $id = $this->input->post("id_pelatihan");
            $getdata = $this->crud->select_where("plth_dmt", array("id_plth" => $id))->result_array();
            echo json_encode($getdata);
        }

        public function ins_edit()
        {
            $id = $this->input->get("id_pelatihan");
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
            if (!$id) {
                redirect("user/index");
                die;
            }
            $data = array(
                "title" => "(Instruktur) Kelengkapan Data | Dashboard Monitoring Training",
                "dis" => $this,
                "edit" => "Active",
                "whdb" => $this->crud->select_where("plth_dmt", array("id_plth" => $id))->row_array(),
                "whdb2" => $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()
            );
            $this->load->view('templating/head', $data);
            $this->load->view('navbar/ins', $data);
            $this->load->view("edit/ins_edit", $data);
            $this->load->view('templating/modal', $data);
            $this->load->view('templating/foot', $data);
        }

        public function edit_ins_core()
        {
            $id = $this->input->post("id");
            $query_seldata = $this->crud->select_where("ins_dmt", array("id_plth" => $id))->result_array();
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

            //INSTRUKTUR 1
            //SET DATA DULU BIAR GA PUYENG
            $noven = $this->input->post("noven", true);
            $ins = $this->input->post("ins", true);
            $sesins = $this->input->post("sesins", true);
            $beains = $this->input->post("beains", true);
            $pemberkasan = $this->input->post("pemberkasan", true);
            $tglmulai = $this->input->post("tglmulai", true);
            $tglselesai = $this->input->post("tglselesai", true);

            if ($this->db->like("no_ins", "1", "none")->get_where("addins_dmt", array("id_plth" => $id))->num_rows() > 0) {
                $this->crud->update_where("addins_dmt", array("id_plth" => $id, "no_ins" => "1"),  array(
                    "no_ins" => 1,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[0],
                    "ins_ins" => $ins[0],
                    "sesins_ins" => $sesins[0],
                    "beasesins_ins" => $beains[0],
                    "surund_ins" => $pemberkasan[0],
                    "tglmulaiajar_ins" => strtotime($tglmulai[0]),
                    "tgldoneajar_ins" => strtotime($tglselesai[0]),
                ));
            } else {
                $this->crud->insert("addins_dmt", array(
                    "no_ins" => 1,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[0],
                    "ins_ins" => $ins[0],
                    "sesins_ins" => $sesins[0],
                    "beasesins_ins" => $beains[0],
                    "surund_ins" => $pemberkasan[0],
                    "tglmulaiajar_ins" => strtotime($tglmulai[0]),
                    "tgldoneajar_ins" => strtotime($tglselesai[0]),
                ));
            }
            if ($this->db->like("no_ins", "2", "none")->get_where("addins_dmt", array("id_plth" => $id))->num_rows() > 0) {
                $this->crud->update_where("addins_dmt", array("id_plth" => $id, "no_ins" => "2"),  array(
                    "no_ins" => 2,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[1],
                    "ins_ins" => $ins[1],
                    "sesins_ins" => $sesins[1],
                    "beasesins_ins" => $beains[1],
                    "surund_ins" => $pemberkasan[1],
                    "tglmulaiajar_ins" => strtotime($tglmulai[1]),
                    "tgldoneajar_ins" => strtotime($tglselesai[1]),
                ));
            } else {
                $this->crud->insert("addins_dmt", array(
                    "no_ins" => 2,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[1],
                    "ins_ins" => $ins[1],
                    "sesins_ins" => $sesins[1],
                    "beasesins_ins" => $beains[1],
                    "surund_ins" => $pemberkasan[1],
                    "tglmulaiajar_ins" => strtotime($tglmulai[1]),
                    "tgldoneajar_ins" => strtotime($tglselesai[1]),
                ));
            }
            if ($this->db->like("no_ins", "3", "none")->get_where("addins_dmt", array("id_plth" => $id))->num_rows() > 0) {
                $this->crud->update_where("addins_dmt", array("id_plth" => $id, "no_ins" => "3"),  array(
                    "no_ins" => 3,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[2],
                    "ins_ins" => $ins[2],
                    "sesins_ins" => $sesins[2],
                    "beasesins_ins" => $beains[2],
                    "surund_ins" => $pemberkasan[2],
                    "tglmulaiajar_ins" => strtotime($tglmulai[2]),
                    "tgldoneajar_ins" => strtotime($tglselesai[2]),
                ));
            } else {
                $this->crud->insert("addins_dmt", array(
                    "no_ins" => 3,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[2],
                    "ins_ins" => $ins[2],
                    "sesins_ins" => $sesins[2],
                    "beasesins_ins" => $beains[2],
                    "surund_ins" => $pemberkasan[2],
                    "tglmulaiajar_ins" => strtotime($tglmulai[2]),
                    "tgldoneajar_ins" => strtotime($tglselesai[2]),
                ));
            }
            if ($this->db->like("no_ins", "4", "none")->get_where("addins_dmt", array("id_plth" => $id))->num_rows() > 0) {
                $this->crud->update_where("addins_dmt", array("id_plth" => $id, "no_ins" => "4"),  array(
                    "no_ins" => 4,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[3],
                    "ins_ins" => $ins[3],
                    "sesins_ins" => $sesins[3],
                    "beasesins_ins" => $beains[3],
                    "surund_ins" => $pemberkasan[3],
                    "tglmulaiajar_ins" => strtotime($tglmulai[3]),
                    "tgldoneajar_ins" => strtotime($tglselesai[3]),
                ));
            } else {
                $this->crud->insert("addins_dmt", array(
                    "no_ins" => 4,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[3],
                    "ins_ins" => $ins[3],
                    "sesins_ins" => $sesins[3],
                    "beasesins_ins" => $beains[3],
                    "surund_ins" => $pemberkasan[3],
                    "tglmulaiajar_ins" => strtotime($tglmulai[3]),
                    "tgldoneajar_ins" => strtotime($tglselesai[3]),
                ));
            }
            if ($this->db->like("no_ins", "5", "none")->get_where("addins_dmt", array("id_plth" => $id))->num_rows() > 0) {
                $this->crud->update_where("addins_dmt", array("id_plth" => $id, "no_ins" => "5"),  array(
                    "no_ins" => 5,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[4],
                    "ins_ins" => $ins[4],
                    "sesins_ins" => $sesins[4],
                    "beasesins_ins" => $beains[4],
                    "surund_ins" => $pemberkasan[4],
                    "tglmulaiajar_ins" => strtotime($tglmulai[4]),
                    "tgldoneajar_ins" => strtotime($tglselesai[4]),
                ));
            } else {
                $this->crud->insert("addins_dmt", array(
                    "no_ins" => 5,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[4],
                    "ins_ins" => $ins[4],
                    "sesins_ins" => $sesins[4],
                    "beasesins_ins" => $beains[4],
                    "surund_ins" => $pemberkasan[4],
                    "tglmulaiajar_ins" => strtotime($tglmulai[4]),
                    "tgldoneajar_ins" => strtotime($tglselesai[4]),
                ));
            }
            if ($this->db->like("no_ins", "6", "none")->get_where("addins_dmt", array("id_plth" => $id))->num_rows() > 0) {
                $this->crud->update_where("addins_dmt", array("id_plth" => $id, "no_ins" => "6"),  array(
                    "no_ins" => 6,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[5],
                    "ins_ins" => $ins[5],
                    "sesins_ins" => $sesins[5],
                    "beasesins_ins" => $beains[5],
                    "surund_ins" => $pemberkasan[5],
                    "tglmulaiajar_ins" => strtotime($tglmulai[5]),
                    "tgldoneajar_ins" => strtotime($tglselesai[5]),
                ));
            } else {
                $this->crud->insert("addins_dmt", array(
                    "no_ins" => 6,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[5],
                    "ins_ins" => $ins[5],
                    "sesins_ins" => $sesins[5],
                    "beasesins_ins" => $beains[5],
                    "surund_ins" => $pemberkasan[5],
                    "tglmulaiajar_ins" => strtotime($tglmulai[5]),
                    "tgldoneajar_ins" => strtotime($tglselesai[5]),
                ));
            }
            if ($this->db->like("no_ins", "7", "none")->get_where("addins_dmt", array("id_plth" => $id))->num_rows() > 0) {
                $this->crud->update_where("addins_dmt", array("id_plth" => $id, "no_ins" => "7"),  array(
                    "no_ins" => 7,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[6],
                    "ins_ins" => $ins[6],
                    "sesins_ins" => $sesins[6],
                    "beasesins_ins" => $beains[6],
                    "surund_ins" => $pemberkasan[6],
                    "tglmulaiajar_ins" => strtotime($tglmulai[6]),
                    "tgldoneajar_ins" => strtotime($tglselesai[6]),
                ));
            } else {
                $this->crud->insert("addins_dmt", array(
                    "no_ins" => 7,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[6],
                    "ins_ins" => $ins[6],
                    "sesins_ins" => $sesins[6],
                    "beasesins_ins" => $beains[6],
                    "surund_ins" => $pemberkasan[6],
                    "tglmulaiajar_ins" => strtotime($tglmulai[6]),
                    "tgldoneajar_ins" => strtotime($tglselesai[6]),
                ));
            }
            if ($this->db->like("no_ins", "8", "none")->get_where("addins_dmt", array("id_plth" => $id))->num_rows() > 0) {
                $this->crud->update_where("addins_dmt", array("id_plth" => $id, "no_ins" => "8"),  array(
                    "no_ins" => 8,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[7],
                    "ins_ins" => $ins[7],
                    "sesins_ins" => $sesins[7],
                    "beasesins_ins" => $beains[7],
                    "surund_ins" => $pemberkasan[7],
                    "tglmulaiajar_ins" => strtotime($tglmulai[7]),
                    "tgldoneajar_ins" => strtotime($tglselesai[7]),
                ));
            } else {
                $this->crud->insert("addins_dmt", array(
                    "no_ins" => 8,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[7],
                    "ins_ins" => $ins[7],
                    "sesins_ins" => $sesins[7],
                    "beasesins_ins" => $beains[7],
                    "surund_ins" => $pemberkasan[7],
                    "tglmulaiajar_ins" => strtotime($tglmulai[7]),
                    "tgldoneajar_ins" => strtotime($tglselesai[7]),
                ));
            }
            if ($this->db->like("no_ins", "9", "none")->get_where("addins_dmt", array("id_plth" => $id))->num_rows() > 0) {
                $this->crud->update_where("addins_dmt", array("id_plth" => $id, "no_ins" => "9"),  array(
                    "no_ins" => 9,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[8],
                    "ins_ins" => $ins[8],
                    "sesins_ins" => $sesins[8],
                    "beasesins_ins" => $beains[8],
                    "surund_ins" => $pemberkasan[8],
                    "tglmulaiajar_ins" => strtotime($tglmulai[8]),
                    "tgldoneajar_ins" => strtotime($tglselesai[8]),
                ));
            } else {
                $this->crud->insert("addins_dmt", array(
                    "no_ins" => 9,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[8],
                    "ins_ins" => $ins[8],
                    "sesins_ins" => $sesins[8],
                    "beasesins_ins" => $beains[8],
                    "surund_ins" => $pemberkasan[8],
                    "tglmulaiajar_ins" => strtotime($tglmulai[8]),
                    "tgldoneajar_ins" => strtotime($tglselesai[8]),
                ));
            }
            if ($this->db->like("no_ins", "10", "none")->get_where("addins_dmt", array("id_plth" => $id))->num_rows() > 0) {
                $this->crud->update_where("addins_dmt", array("id_plth" => $id, "no_ins" => "10"),  array(
                    "no_ins" => 10,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[9],
                    "ins_ins" => $ins[9],
                    "sesins_ins" => $sesins[9],
                    "beasesins_ins" => $beains[9],
                    "surund_ins" => $pemberkasan[9],
                    "tglmulaiajar_ins" => strtotime($tglmulai[9]),
                    "tgldoneajar_ins" => strtotime($tglselesai[9]),
                ));
            } else {
                $this->crud->insert("addins_dmt", array(
                    "no_ins" => 10,
                    "id_plth" => $this->input->post("id"),
                    "novend_ins" => $noven[9],
                    "ins_ins" => $ins[9],
                    "sesins_ins" => $sesins[9],
                    "beasesins_ins" => $beains[9],
                    "surund_ins" => $pemberkasan[9],
                    "tglmulaiajar_ins" => strtotime($tglmulai[9]),
                    "tgldoneajar_ins" => strtotime($tglselesai[9]),
                ));
            }
            if (!$this->input->post("status")) {
                $status = "Pending";
            } else {
                $status = "Completed";
            }
            if ($this->crud->select_where("ins_dmt", array("id_plth" => $id))->num_rows() < 1) {
                $this->crud->insert("ins_dmt", array("id_plth" => $id, "status_ins" => $status));
            } else {
                $this->crud->update("ins_dmt", "id_plth", "$id", array("id_plth" => $id, "status_ins" => $status));
            }
            $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Berhasil!',
                        'Anda berhasil input/ubah kelengkapan data.',
                        'success'
                    )});
                </script>");

            redirect("user/index");
        }

        function get_time()
        {
            $time = $this->input->get("time");
            $out_date = date("d-m-Y", $time);
            echo $out_date;
        }


        function ajaxgetdata_pstpnd()
        {
            $id = $this->input->post("id_pelatihan");
            $getdata = $this->crud->select_where("pesertapnd_dmt", array("id_plth" => $id))->result_array();
            echo json_encode($getdata);
        }

        function ajaxgetdata_pstkeu()
        {
            $id = $this->input->post("id_pelatihan");
            $getdata = $this->crud->select_where("pesertakeu_dmt", array("id_plth" => $id))->result_array();
            echo json_encode($getdata);
        }

        function ajaxgetdata_opr()
        {
            $id = $this->input->post("id_pelatihan");
            $getdata = $this->crud->select_where("opr_dmt", array("id_plth" => $id))->result_array();
            echo json_encode($getdata);
        }

        function ajaxgetdata_keu()
        {
            $id = $this->input->post("id_pelatihan");
            $getdata = $this->crud->select_where("keu_dmt", array("id_plth" => $id))->result_array();
            echo json_encode($getdata);
        }
        function ajaxgetdata2_keu()
        {
            $id = $this->input->post("id_pelatihan");
            $getdata = $this->crud->select_where("ins_dmt", array("id_plth" => $id))->result_array();
            echo json_encode($getdata);
        }
        function ajaxgetdata_ins()
        {
            $id = $this->input->post("id_pelatihan");
            $getdata = $this->db->order_by("no_ins", "ASC")->get_where("addins_dmt", array("id_plth" => $id))->result_array();
            echo json_encode($getdata);
        }

        function ajaxgetdata_pnd()
        {
            $id = $this->input->post("id_pelatihan");
            $getdata = $this->db->get_where("plth_dmt", array("id_plth" => $id))->result_array();
            echo json_encode($getdata);
        }

        function ajaxgetdata_keubc()
        {
            $id = $this->input->post("id_pelatihan");
            $getdata = $this->crud->select_where("keu_bc_dmt", array("id_plth" => $id))->result_array();
            echo json_encode($getdata);
        }

        public function opr_edit()
        {
            $id = $this->input->get("id_pelatihan");
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
            if (!$id) {
                redirect("user/index");
                die;
            }
            $data = array(
                "title" => "(Operation) Kelengkapan Data | Dashboard Monitoring Training",
                "dis" => $this,
                "whdb" => $this->crud->select_where("plth_dmt", array("id_plth" => $id))->row_array(),
                "whdb2" => $this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()
            );
            $this->load->view('templating/head', $data);
            $this->load->view("edit/opr_edit", $data);
            $this->load->view('templating/modal', $data);
            $this->load->view('templating/foot', $data);
        }

        public function edit_opr_core()
        {
            $id = $this->input->post("id");
            $query_seldata = $this->crud->select_where("opr_dmt", array("id_plth" => $id));
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

            //INSTRUKTUR 1
            if ($_FILES and $_FILES['opr1']['name']) {
                $opr1_unique = time() . "_1opr." . pathinfo($_FILES["opr1"]['name'], PATHINFO_EXTENSION);

                $opr1 = $_FILES["opr1"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/operation',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $opr1_unique
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('opr1')) {
                    $upload_data = $this->upload->data();
                    $opr1_unique = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["glsarfas_opr"] == "" or $this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["glsarfas_opr"] == NULL) {
                    $opr1 = "N/A";
                    $opr1_unique = "N/A";
                } else {
                    $opr1 = $this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["glsarfas_opr"];
                    $opr1_unique = $this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["filesarfasunique_opr"];
                }
            }

            //INSTRUKTUR 2
            if (!$this->input->post("opr2")) {
                $opr2 = 0;
            } else {
                $opr2 = $this->input->post("opr2");
            }

            //INSTRUKTUR 2
            if (!$this->input->post("opr3")) {
                $opr3 = "N/A";
            } else {
                $opr3 = $this->input->post("opr3");
            }

            //INSTRUKTUR 4
            if ($_FILES and $_FILES['opr4']['name']) {
                $opr4_unique = time() . "_4opr." . pathinfo($_FILES["opr4"]['name'], PATHINFO_EXTENSION);

                $opr4 = $_FILES["opr4"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/operation',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $opr4_unique
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('opr4')) {
                    $upload_data = $this->upload->data();
                    $opr4_unique = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["dokumen_opr"] == "" or $this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["dokumen_opr"] == NULL) {
                    $opr4 = "N/A";
                    $opr4_unique = "N/A";
                } else {
                    $opr4 = $this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["dokumen_opr"];
                    $opr4_unique = $this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["file_opr"];
                }
            }

            //INSTRUKTUR 5
            if ($_FILES and $_FILES['opr5']['name']) {
                $opr5_unique = time() . "_5opr." . pathinfo($_FILES["opr5"]['name'], PATHINFO_EXTENSION);

                $opr5 = $_FILES["opr5"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/operation',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $opr5_unique
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('opr5')) {
                    $upload_data = $this->upload->data();
                    $opr5_unique = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["addcostfile_opr"] == "" or $this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["addcostfile_opr"] == NULL) {
                    $opr5 = "N/A";
                    $opr5_unique = "N/A";
                } else {
                    $opr5 = $this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["addcostfile_opr"];
                    $opr5_unique = $this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["fileaddcostunique_opr"];
                }
            }

            //INSTRUKTUR 6
            if (!$this->input->post("opr6")) {
                $opr6 = 0;
            } else {
                $opr6 = $this->input->post("opr6");
            }

            //INSTRUKTUR 4
            if (!$this->input->post("opr7")) {
                $opr7 = "N/A";
            } else {
                $opr7 = $this->input->post("opr7");
            }

            //INSTRUKTUR 4
            if ($_FILES and $_FILES['opr8']['name']) {
                $opr8_unique = time() . "_8opr." . pathinfo($_FILES["opr8"]['name'], PATHINFO_EXTENSION);

                $opr8 = $_FILES["opr8"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/operation',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $opr8_unique
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('opr8')) {
                    $upload_data = $this->upload->data();
                    $opr8_unique = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["pkba_opr"] == "" or $this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["pkba_opr"] == NULL) {
                    $opr8 = "N/A";
                    $opr8_unique = "N/A";
                } else {
                    $opr8 = $this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["pkba_opr"];
                    $opr8_unique = $this->crud->select_where("opr_dmt", array("id_plth" => $id))->row_array()["filepkbaunique_opr"];
                }
            }

            if (!$this->input->post("opr9")) {
                $opr9 = "Pending";
            } else {
                $opr9 = $this->input->post("opr9");
            }

            if ($query_seldata->num_rows() < 1) {
                $array_biarrapih = array(
                    "id_plth" => $id,
                    "glsarfas_opr" => $opr1,
                    "dokumen_opr" => $opr4,
                    "addcost_opr" => $opr6,
                    "addcostfile_opr" => $opr5,
                    "addcostdesk_opr" => $opr7,
                    "pkba_opr" => $opr8,
                    "file_opr" => $opr4_unique,
                    "filesarfasunique_opr" => $opr1_unique,
                    "fileaddcostunique_opr" => $opr5_unique,
                    "filepkbaunique_opr" => $opr8_unique,
                    "jmlpsrt_plth" => $opr2,
                    "nmvenakom_plth" => $opr3,
                    "status_opr" => $opr9,
                );
                $this->crud->insert("opr_dmt", $array_biarrapih);
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Berhasil!',
                        'Anda berhasil input kelengkapan data.',
                        'success'
                    )});
                </script>");
                redirect("user/index");
            } else {
                $array_biarrapih = array(
                    "glsarfas_opr" => $opr1,
                    "dokumen_opr" => $opr4,
                    "addcost_opr" => $opr6,
                    "addcostfile_opr" => $opr5,
                    "addcostdesk_opr" => $opr7,
                    "pkba_opr" => $opr8,
                    "file_opr" => $opr4_unique,
                    "filesarfasunique_opr" => $opr1_unique,
                    "fileaddcostunique_opr" => $opr5_unique,
                    "filepkbaunique_opr" => $opr8_unique,
                    "jmlpsrt_plth" => $opr2,
                    "nmvenakom_plth" => $opr3,
                    "status_opr" => $opr9,
                );
                $this->crud->update("opr_dmt", "id_plth", $id, $array_biarrapih);
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Berhasil!',
                        'Anda berhasil mengubah kelengkapan data.',
                        'success'
                    )});
                </script>");
                redirect("user/index");
            }
        }

        public function edit_keu()
        {
            $id = $this->input->get("id_pelatihan");
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
            if (!$id) {
                redirect("user/index");
                die;
            }
            $data = array(
                "title" => "(Keuangan) Kelengkapan Data IP | Dashboard Monitoring Training",
                "dis" => $this,
                "keu_ip" => "active",
                "whdb" => $this->crud->select_where("plth_dmt", array("id_plth" => $id))->row_array(),
                "whdb2" => $this->crud->select_where("keu_dmt", array("id_plth" => $id))->row_array()
            );
            $this->load->view('templating/head', $data);
            $this->load->view('navbar/keu', $data);
            $this->load->view("edit/keu_edit", $data);
            $this->load->view('templating/modal', $data);
            $this->load->view('templating/foot', $data);
        }

        public function edit_keu_core()
        {
            if ($this->session->userdata("access_num" < 5)) {
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

            if (!$this->input->post("pro1")) {
                $pro1 = "";
            } else {
                $pro1 = $this->input->post("pro1");
            }
            if (!$this->input->post("pro2")) {
                $pro2 = "N/A";
            } else {
                $pro2 = $this->input->post("pro2");
            }
            if (!$this->input->post("pro3")) {
                $pro3 = "";
            } else {
                $pro3 = $this->input->post("pro3");
            }
            if (!$this->input->post("pro4")) {
                $pro4 = "";
            } else {
                $pro4 = $this->input->post("pro4");
            }
            if (!$this->input->post("pro5")) {
                $pro5 = "";
            } else {
                $pro5 = $this->input->post("pro5");
            }
            if (!$this->input->post("pro6")) {
                $pro6 = "";
            } else {
                $pro6 = $this->input->post("pro6");
            }
            if (!$this->input->post("pro7")) {
                $pro7 = "N/A";
            } else {
                $pro7 = $this->input->post("pro7");
            }
            if (!$this->input->post("ako1")) {
                $ako1 = "";
            } else {
                $ako1 = $this->input->post("ako1");
            }
            if (!$this->input->post("ako2")) {
                $ako2 = "N/A";
            } else {
                $ako2 = $this->input->post("ako2");
            }
            if (!$this->input->post("ako3")) {
                $ako3 = "";
            } else {
                $ako3 = $this->input->post("ako3");
            }
            if (!$this->input->post("ako4")) {
                $ako4 = "";
            } else {
                $ako4 = $this->input->post("ako4");
            }
            if (!$this->input->post("ako5")) {
                $ako5 = "";
            } else {
                $ako5 = $this->input->post("ako5");
            }
            if (!$this->input->post("ako6")) {
                $ako6 = "";
            } else {
                $ako6 = $this->input->post("ako6");
            }
            if (!$this->input->post("ako7")) {
                $ako7 = "N/A";
            } else {
                $ako7 = $this->input->post("ako7");
            }
            if (!$this->input->post("status1")) {
                $status1 = "N/A";
            } else {
                $status1 = $this->input->post("status1");
            }
            if (!$this->input->post("status2")) {
                $status2 = "N/A";
            } else {
                $status2 = $this->input->post("status2");
            }
            if (!$this->input->post("status3")) {
                $status3 = "N/A";
            } else {
                $status3 = $this->input->post("status3");
            }
            if (!$this->input->post("status4")) {
                $status4 = "N/A";
            } else {
                $status4 = $this->input->post("status4");
            }
            if (!$this->input->post("status5")) {
                $status5 = "N/A";
            } else {
                $status5 = $this->input->post("status5");
            }
            if (!$this->input->post("status6")) {
                $status6 = "N/A";
            } else {
                $status6 = $this->input->post("status6");
            }
            if (!$this->input->post("status7")) {
                $status7 = "N/A";
            } else {
                $status7 = $this->input->post("status7");
            }
            if (!$this->input->post("status8")) {
                $status8 = "N/A";
            } else {
                $status8 = $this->input->post("status8");
            }
            if (!$this->input->post("status9")) {
                $status9 = "N/A";
            } else {
                $status9 = $this->input->post("status9");
            }
            if (!$this->input->post("status10")) {
                $status10 = "N/A";
            } else {
                $status10 = $this->input->post("status10");
            }
            if (!$this->input->post("stat")) {
                $stat = "Pending";
            } else {
                $stat = $this->input->post("stat");
            }
            $id = $this->input->post("id");
            if ($this->crud->select_where("keu_dmt", array("id_plth" => $id))->num_rows() < 1) {
                $array_biarrapih = array(
                    'id_plth' => $id,

                    'ako1' => $ako1,
                    'ako2' => $ako2,
                    'ako3' => $ako3,
                    'ako4' => $ako4,
                    'ako5' => $ako5,
                    'ako6' => $ako6,
                    'ako7' => $ako7,

                    'pro1' => $pro1,
                    'pro2' => $pro2,
                    'pro3' => $pro3,
                    'pro4' => $pro4,
                    'pro5' => $pro5,
                    'pro6' => $pro6,
                    'pro7' => $pro7,

                    'status1' => $status1,
                    'status2' => $status2,
                    'status3' => $status3,
                    'status4' => $status4,
                    'status5' => $status5,
                    'status6' => $status6,
                    'status7' => $status7,
                    'status8' => $status8,
                    'status9' => $status9,
                    'status10' => $status10,

                    'status_keu' => $stat
                );
                $this->crud->insert("keu_dmt", $array_biarrapih);
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Sukses!',
                        'Anda berhasil menambah data Finance IP',
                        'success'
                    )});
                </script>");
                redirect("user/index");
            } else {
                $array_biarrapih = array(
                    'ako1' => $ako1,
                    'ako2' => $ako2,
                    'ako3' => $ako3,
                    'ako4' => $ako4,
                    'ako5' => $ako5,
                    'ako6' => $ako6,
                    'ako7' => $ako7,

                    'pro1' => $pro1,
                    'pro2' => $pro2,
                    'pro3' => $pro3,
                    'pro4' => $pro4,
                    'pro5' => $pro5,
                    'pro6' => $pro6,
                    'pro7' => $pro7,

                    'status1' => $status1,
                    'status2' => $status2,
                    'status3' => $status3,
                    'status4' => $status4,
                    'status5' => $status5,
                    'status6' => $status6,
                    'status7' => $status7,
                    'status8' => $status8,
                    'status9' => $status9,
                    'status10' => $status10,

                    'status_keu' => $stat
                );
                $this->crud->update("keu_dmt", "id_plth", $id, $array_biarrapih);
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Sukses!',
                        'Anda berhasil mengubah data Finance IP',
                        'success'
                    )});
                </script>");
                redirect("user/index");
            }
        }
        public function insert_realisasi()
        {
            if ($this->session->userdata("access_num") > 2) {
                $this->session->set_flashdata("msg", "<script>
            $(document).ready(function() {
                sweetAlert(
                    'Anda tidak punya akses ini!',
                    'Silahkan login untuk melanjutkan.',
                    'error'
                )
            });
            </script>");
                redirect('user/index');
            }

            $data = array(
                'title' => 'Realisasi Pelatihan - Dashboard Monitoring Training',
                'realisasi' => 'active',
                'dis' => $this,
            );
            $this->load->view('templating/head', $data);
            if ($this->session->userdata("access_num") == 1) {
                $this->load->view('navbar/sa', $data);
            } else {
                $this->load->view('navbar/pnd', $data);
            }
            $this->load->view('index/realisasi', $data);
            $this->load->view('templating/modal', $data);
            $this->load->view('templating/foot', $data);
        }

        public function insert_realisasi_core()
        {
            if ($this->session->userdata("access_num") > 2) {
                $this->session->set_flashdata("msg", "<script>
            $(document).ready(function() {
                sweetAlert(
                    'Anda tidak punya akses ini!',
                    'Silahkan login untuk melanjutkan.',
                    'error'
                )
            });
            </script>");
                redirect('user/index');
            }
            $real1 = $this->input->post("real1");
            $real2 = $this->input->post("real2");
            $real3 = $this->input->post("real3");
            $real4 = $this->input->post("real4");
            $real5 = $this->input->post("real5");
            $real6 = $this->input->post("real6");
            $real7 = $this->input->post("real7");
            $real8 = $this->input->post("real8");
            $real9 = $this->input->post("real9");
            $real10 = $this->input->post("real10");
            $real11 = $this->input->post("real11");
            $real12 = $this->input->post("real12");
            $real13 = $this->input->post("real13");

            if (!$real1) {
                $pos_real1 = "N/A";
            } else {
                $pos_real1 = $real1;
            }

            if (!$real2) {
                $pos_real2 = "N/A";
            } else {
                $pos_real2 = $real2;
            }

            if (!$real3) {
                $pos_real3 = 0;
            } else {
                $pos_real3 = $real3;
            }

            if (!$real4) {
                $pos_real4 = 0;
            } else {
                $pos_real4 = strtotime($real4);
            }

            if (!$real5) {
                $pos_real5 = 0;
            } else {
                $pos_real5 = strtotime($real5);
            }

            if (!$real6) {
                $pos_real6 = "N/A";
            } else {
                $pos_real6 = $real6;
            }

            if (!$real7) {
                $pos_real7 = 0;
            } else {
                $pos_real7 = $real7;
            }

            if (!$real8) {
                $pos_real8 = 0;
            } else {
                $pos_real8 = $real8;
            }

            if (!$real9) {
                $pos_real9 = 0;
            } else {
                $pos_real9 = $real9;
            }

            if (!$real10) {
                $pos_real10 = 0;
            } else {
                $pos_real10 = $real10;
            }

            if (!$real11) {
                $pos_real11 = 0;
            } else {
                $pos_real11 = $real11;
            }

            if (!$real12) {
                $pos_real12 = 0;
            } else {
                $pos_real12 = $real12;
            }
            if (!$this->input->post("stat")) {
                $stat = "Pending";
            } else {
                $stat = "Completed";
            }

            $arraydata_send = array(
                "id_plth" => $this->input->post("id"),
                "durasi_realisasi" => $pos_real7,
                "jmlsesi_realisasi" => $pos_real8,
                "undpersero_realisasi" => $pos_real9,
                "undnonpersero_realisasi" => $pos_real10,
                "dtgpersero_realisasi" => $pos_real11,
                "dtgnonpersero_realisasi" => $pos_real12,
                "lndhours_realisasi" => ($pos_real11 * $pos_real8),
                "status_realisasi" => $stat,
            );
            $this->crud->insert("realisasi_dmt", $arraydata_send);
            $this->session->set_flashdata("msg", "<script>
            $(document).ready(function() {
                sweetAlert(
                    'Berhasil!',
                    'Anda sukses mengisi data realisasi',
                    'success'
                )
            });
            </script>");
            redirect('user/index');
        }

        public function edit_realisasi()
        {
            $id = $this->input->get("id_pelatihan");
            if ($this->crud->select_where("realisasi_dmt", array("id_plth" => $id))->num_rows() < 1) {
                redirect('user/insert_realisasi?id_pelatihan=' . $id);
                die;
            }
            if ($this->session->userdata("access_num") > 2) {
                $this->session->set_flashdata("msg", "<script>
            $(document).ready(function() {
                sweetAlert(
                    'Anda tidak punya akses ini!',
                    'Silahkan login untuk melanjutkan.',
                    'error'
                )
            });
            </script>");
                redirect('user/index');
                die;
            }
            $data = array(
                "title" => "Update Data Realisasi - Dashboard Monitoring Training",
                "dis" => $this,
                "realisasi" => "active",
                "row" => $this->crud->select_where("realisasi_dmt", array("id_plth" => $id))->row_array()
            );
            $this->load->view('templating/head', $data);
            if ($this->session->userdata("access_num") == 1) {
                $this->load->view('navbar/sa', $data);
            } else {
                $this->load->view('navbar/pnd', $data);
            }
            $this->load->view("edit/realisasi_edit.php", $data);
            $this->load->view('templating/modal', $data);
            $this->load->view('templating/head', $data);
        }
        public function core_realisasi_core()
        {
            if ($this->session->userdata("access_num") > 2) {
                $this->session->set_flashdata("msg", "<script>
            $(document).ready(function() {
                sweetAlert(
                    'Anda tidak punya akses ini!',
                    'Silahkan login untuk melanjutkan.',
                    'error'
                )
            });
            </script>");
                redirect('user/index');
            }
            $real1 = $this->input->post("real1");
            $real2 = $this->input->post("real2");
            $real3 = $this->input->post("real3");
            $real4 = $this->input->post("real4");
            $real5 = $this->input->post("real5");
            $real6 = $this->input->post("real6");
            $real7 = $this->input->post("real7");
            $real8 = $this->input->post("real8");
            $real9 = $this->input->post("real9");
            $real10 = $this->input->post("real10");
            $real11 = $this->input->post("real11");
            $real12 = $this->input->post("real12");
            $real13 = $this->input->post("real13");

            if (!$real1) {
                $pos_real1 = "N/A";
            } else {
                $pos_real1 = $real1;
            }

            if (!$real2) {
                $pos_real2 = "N/A";
            } else {
                $pos_real2 = $real2;
            }

            if (!$real3) {
                $pos_real3 = 0;
            } else {
                $pos_real3 = $real3;
            }

            if (!$real4) {
                $pos_real4 = 0;
            } else {
                $pos_real4 = strtotime($real4);
            }

            if (!$real5) {
                $pos_real5 = 0;
            } else {
                $pos_real5 = strtotime($real5);
            }

            if (!$real6) {
                $pos_real6 = "N/A";
            } else {
                $pos_real6 = $real6;
            }

            if (!$real7) {
                $pos_real7 = 0;
            } else {
                $pos_real7 = $real7;
            }

            if (!$real8) {
                $pos_real8 = 0;
            } else {
                $pos_real8 = $real8;
            }

            if (!$real9) {
                $pos_real9 = 0;
            } else {
                $pos_real9 = $real9;
            }

            if (!$real10) {
                $pos_real10 = 0;
            } else {
                $pos_real10 = $real10;
            }

            if (!$real11) {
                $pos_real11 = 0;
            } else {
                $pos_real11 = $real11;
            }

            if (!$real12) {
                $pos_real12 = 0;
            } else {
                $pos_real12 = $real12;
            }
            if (!$this->input->post("stat")) {
                $stat = "Pending";
            } else {
                $stat = "Completed";
            }


            $arraydata_send = array(
                "durasi_realisasi" => $pos_real7,
                "jmlsesi_realisasi" => $pos_real8,
                "undpersero_realisasi" => $pos_real9,
                "undnonpersero_realisasi" => $pos_real10,
                "dtgpersero_realisasi" => $pos_real11,
                "dtgnonpersero_realisasi" => $pos_real12,
                "lndhours_realisasi" => ($pos_real11 * $pos_real8),
                "status_realisasi" => $stat,
            );
            $this->crud->update("realisasi_dmt", "id_realisasi", $this->input->post("id"), $arraydata_send);
            $this->session->set_flashdata("msg", "<script>
            $(document).ready(function() {
                sweetAlert(
                    'Berhasil!',
                    'Anda sukses meng-update data realisasi',
                    'success'
                )
            });
            </script>");
            redirect('user/index');
        }
        function delete_realisasi()
        {
            if (!$this->input->get("id_pelatihan")) {
                redirect('user/index');
            }
            if ($this->session->userdata("access_num") > 2) {
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Anda tidak punya akses ini!',
                        'Silahkan login untuk melanjutkan.',
                        'error'
                    )
                });
                </script>");
                redirect('user/index');
            } else {
                $this->crud->delete("realisasi_dmt", array("id_realisasi" => $this->input->get("id_pelatihan")));
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Sukses!',
                        'Anda berhasil meng-hapus data realisasi.',
                        'success'
                    )
                });
                </script>");
                redirect('user/index');
            }
        }

        public function edit_peserta_pnd()
        {
            if ($this->session->userdata("access_num") > 2) {
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Anda tidak punya akses ini!',
                        'Silahkan login untuk melanjutkan.',
                        'error'
                    )
                });
                </script>");
                redirect('user/index');
                die;
            }
            $id = $this->input->get("id_pelatihan");
            if (!$id) {
                redirect('user/index');
                die;
            }
            $data = array(
                "title" => "Update Kelengkapan Peserta Tambahan - Dashboard Monitoring Training",
                "dis" => $this,
                "whdb" => $this->crud->select_where("plth_dmt", array("id_plth" => $id))->row_array(),
                "whdb2" => $this->crud->select_where("pesertapnd_dmt", array("id_plth" => $id))->row_array()
            );
            $this->load->view('templating/head', $data);
            $this->load->view("edit/pesertapnd_edit", $data);
            $this->load->view('templating/modal', $data);
            $this->load->view('templating/foot', $data);
        }

        public function core_peserta_pnd()
        {
            if ($this->session->userdata("access_num") > 2) {
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Anda tidak punya akses ini!',
                        'Silahkan login untuk melanjutkan.',
                        'error'
                    )
                });
                </script>");
                redirect('user/index');
                die;
            }
            $id = $this->input->post("id");
            if (!$id) {
                redirect('user/index');
                die;
            }

            if ($this->input->post("psrtpnd1") == "" or $this->input->post("psrtpnd1") == NULL) {
                $pnd1 = 0;
            } else {
                $pnd1 = $this->input->post("psrtpnd1");
            }
            if ($this->input->post("psrtpnd2") == "" or $this->input->post("psrtpnd2") == NULL) {
                $pnd2 = 0;
            } else {
                $pnd2 = $this->input->post("psrtpnd2");
            }
            if ($this->input->post("psrtpnd3") == "" or $this->input->post("psrtpnd2") == NULL) {
                $pnd3 = "N/A";
            } else {
                $pnd3 = $this->input->post("psrtpnd3");
            }
            if ($_FILES and $_FILES['psrtpnd4']['name']) {
                $pnd4_unique = time() . "_psrt_pnd." . pathinfo($_FILES["psrtpnd4"]['name'], PATHINFO_EXTENSION);
                $pnd4 = $_FILES["psrtpnd4"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $pnd4_unique
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('psrtpnd4')) {
                    $upload_data = $this->upload->data();
                    $pnd4_unique = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("pesertapnd_dmt", array("id_plth" => $id))->row_array()["surund_pesertapnd"] == "" or $this->crud->select_where("pesertapnd_dmt", array("id_plth" => $id))->row_array()["surund_pesertapnd"] == NULL) {
                    $pnd4 = "N/A";
                    $pnd4_unique = "N/A";
                } else {
                    $pnd4 = $this->crud->select_where("pesertapnd_dmt", array("id_plth" => $id))->row_array()["surund_pesertapnd"];
                    $pnd4_unique = $this->crud->select_where("pesertapnd_dmt", array("id_plth" => $id))->row_array()["rawsurund_pesertapnd"];
                }
            }
            if (!$this->input->post("status")) {
                $status = "Pending";
            } else {
                $status = $this->input->post("status");
            }

            if ($this->crud->select_where("pesertapnd_dmt", array("id_plth" => $id))->num_rows() < 1) {
                $array_biarrapih = array(
                    "id_plth" => $id,
                    "trfplth_pesertapnd" => $pnd1,
                    "jmldtgh_pesertapnd" => $pnd2,
                    "nmptmeng_pesertapnd" => $pnd3,
                    "surund_pesertapnd" => $pnd4,
                    "rawsurund_pesertapnd" => $pnd4_unique,
                    "status_pesertapnd" => $status,
                );
                $this->crud->insert("pesertapnd_dmt", $array_biarrapih);
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Berhasil!',
                        'Sukses menambahkan data peserta tambahan.',
                        'success'
                    )
                });
                </script>");
                redirect('user/index');
            } else {
                $array_biarrapih = array(
                    "trfplth_pesertapnd" => $pnd1,
                    "jmldtgh_pesertapnd" => $pnd2,
                    "nmptmeng_pesertapnd" => $pnd3,
                    "surund_pesertapnd" => $pnd4,
                    "rawsurund_pesertapnd" => $pnd4_unique,
                    "status_pesertapnd" => $status,
                );
                $this->crud->update("pesertapnd_dmt", "id_plth", $id, $array_biarrapih);
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Berhasil!',
                        'Sukses mengubah data peserta tambahan.',
                        'success'
                    )
                });
                </script>");
                redirect('user/index');
            }
        }
        public function edit_peserta_keu()
        {
            if ($this->session->userdata("access_num") != 5) {
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Anda tidak punya akses ini!',
                        'Silahkan login untuk melanjutkan.',
                        'error'
                    )
                });
                </script>");
                redirect('user/index');
                die;
            }
            $id = $this->input->get("id_pelatihan");
            if (!$id) {
                redirect('user/index');
                die;
            }
            $data = array(
                "title" => "Update Kelengkapan Peserta Tambahan - Dashboard Monitoring Training",
                "dis" => $this,
                "whdb" => $this->crud->select_where("plth_dmt", array("id_plth" => $id))->row_array(),
                "whdb2" => $this->crud->select_where("pesertakeu_dmt", array("id_plth" => $id))->row_array()
            );
            $this->load->view('templating/head', $data);
            $this->load->view("edit/pesertakeu_edit", $data);
            $this->load->view('templating/modal', $data);
            $this->load->view('templating/foot', $data);
        }
        function core_peserta_keu()
        {
            if ($this->session->userdata("access_num") != 5) {
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Anda tidak punya akses ini!',
                        'Silahkan login untuk melanjutkan.',
                        'error'
                    )
                });
                </script>");
                redirect('user/index');
                die;
            }
            $id = $this->input->post("id");
            if (!$id) {
                redirect('user/index');
                die;
            }

            if (!$this->input->post("psrtkeu1")) {
                $keu1 = 0;
            } else {
                $keu1 = strtotime($this->input->post("psrtkeu1"));
            }

            if (!$this->input->post("psrtkeu2")) {
                $keu2 = 0;
            } else {
                $keu2 = strtotime($this->input->post("psrtkeu2"));
            }

            if (!$this->input->post("psrtkeu3")) {
                $keu3 = 0;
            } else {
                $keu3 = strtotime($this->input->post("psrtkeu3"));
            }

            if (!$this->input->post("psrtkeu4")) {
                $keu4 = 0;
            } else {
                $keu4 = strtotime($this->input->post("psrtkeu4"));
            }

            if (!$this->input->post("psrtkeu5")) {
                $keu5 = "N/A";
            } else {
                $keu5 = $this->input->post("psrtkeu5");
            }

            if (!$this->input->post("status")) {
                $status = "Pending";
            } else {
                $status = $this->input->post("status");
            }

            if ($this->crud->select_where("pesertakeu_dmt", array("id_plth" => $id))->num_rows() < 1) {
                $array_biarrapih = array(
                    "id_plth" => $id,
                    "tglbuatinv_pesertakeu" => $keu1,
                    "tglkiriminv_pesertakeu" => $keu2,
                    "tglterimainv_pesertakeu" => $keu3,
                    "tglpayinv_pesertakeu" => $keu4,
                    "ket_pesertakeu" => $keu5,
                    "status_pesertakeu" => $status,
                );
                $this->crud->insert("pesertakeu_dmt", $array_biarrapih);
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Berhasil!',
                        'Sukses menambahkan data peserta tambahan.',
                        'success'
                    )
                });
                </script>");
                redirect('user/index');
            } else {
                $array_biarrapih = array(
                    "tglbuatinv_pesertakeu" => $keu1,
                    "tglkiriminv_pesertakeu" => $keu2,
                    "tglterimainv_pesertakeu" => $keu3,
                    "tglpayinv_pesertakeu" => $keu4,
                    "ket_pesertakeu" => $keu5,
                    "status_pesertakeu" => $status,
                );
                $this->crud->update("pesertakeu_dmt", "id_plth", $id, $array_biarrapih);
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Berhasil!',
                        'Sukses mengubah data peserta tambahan.',
                        'success'
                    )
                });
                </script>");
                redirect('user/index');
            }
        }
        function edit_bc()
        {
            if ($this->session->userdata("access_num") < 5) {
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Anda tidak punya akses ini!',
                        'Silahkan login untuk melanjutkan.',
                        'error'
                    )
                });
                </script>");
                redirect('user/index');
                die;
            }
            $id = $this->input->get("id_pelatihan");
            $data = array(
                "title" => "(Keuangan) Kelengkapan Data | Dashboard Monitoring Training",
                "dis" => $this,
                "keu_bc" => "active",
                "whdb" => $this->crud->select_where("plth_dmt", array("id_plth" => $id))->row_array(),
                "whdb2" => $this->crud->select_where("keu_bc_dmt", array("id_plth" => $id))->row_array()
            );
            $this->load->view("templating/head", $data);
            $this->load->view("navbar/keu", $data);
            $this->load->view("edit/keu_edit_bc", $data);
            $this->load->view("templating/foot", $data);
        }
        function edit_keu_bc_core()
        {
            if ($this->session->userdata("access_num") < 5) {
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Anda tidak punya akses ini!',
                        'Silahkan login untuk melanjutkan.',
                        'error'
                    )
                });
                </script>");
                redirect('user/index');
                die;
            }
            if (!$this->input->post("stat")) {
                $stat = "Pending";
            } else {
                $stat = $this->input->post("stat");
            }
            if (!$this->input->post("absenkehadiran_up")) {
                $file1 = "";
            } else {
                $file1 = $this->input->post("absenkehadiran_up");
            }


            if ($this->crud->select_where("keu_bc_dmt", array("id_plth" => $this->input->post("id")))->num_rows() < 1) {
                $array_biarrapih = array(
                    "id_plth" => $this->input->post("id"),

                    "nocs_ptmn" => $this->input->post("nocustom1"),
                    "namacs_ptmn" => $this->input->post("namacustom1"),

                    "nocs_tp" => $this->input->post("nocustom2"),
                    "namacs_tp" => $this->input->post("namacustom2"),

                    "trf_trf" => $this->input->post("trf"),

                    "cash_pro" => $this->input->post("cash"),
                    "internal_pro" => $this->input->post("internal"),
                    "aptp_pro" => $this->input->post("aptp"),
                    "ttlrev_pro" => $this->input->post("tr"),
                    "noso_pro" => $this->input->post("noso"),
                    "idssc_pro" => $this->input->post("idssc"),
                    "noinv_pro" => $this->input->post("invno"),
                    "stat_pro" => $this->input->post("status"),

                    "status_keu_bc" => $stat,
                );
                $this->crud->insert("keu_bc_dmt", $array_biarrapih);
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Sukses!',
                        'Anda berhasil menambah data Finance BC',
                        'success'
                    )});
                </script>");
                redirect("user/index");
            } else {
                $array_biarrapih = array(

                    "nocs_ptmn" => $this->input->post("nocustom1"),
                    "namacs_ptmn" => $this->input->post("namacustom1"),

                    "nocs_tp" => $this->input->post("nocustom2"),
                    "namacs_tp" => $this->input->post("namacustom2"),

                    "trf_trf" => $this->input->post("trf"),

                    "cash_pro" => $this->input->post("cash"),
                    "internal_pro" => $this->input->post("internal"),
                    "aptp_pro" => $this->input->post("aptp"),
                    "ttlrev_pro" => $this->input->post("tr"),
                    "noso_pro" => $this->input->post("noso"),
                    "idssc_pro" => $this->input->post("idssc"),
                    "noinv_pro" => $this->input->post("invno"),
                    "stat_pro" => $this->input->post("status"),

                    "status_keu_bc" => $stat,
                );
                $this->crud->update("keu_bc_dmt", "id_plth", $this->input->post("id"), $array_biarrapih);
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Sukses!',
                        'Anda berhasil mengubah data Finance BC',
                        'success'
                    )});
                </script>");
                redirect("user/index");
            }
        }
    }
