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
            );
            $this->load->view('templating/head', $data);
            $this->load->view('templating/modal', $data);

            switch ($this->session->userdata("access_num")) {

                    //Super Admin
                case 1:
                    $this->load->view('index/index_sa', $data);
                    break;
                    //PND
                case 2:
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
                'dis' => $this,
            );
            $this->load->view('templating/head', $data);
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

            if (!$_FILES["berkas"]['name']) {
                $postdata = array(
                    'nama_plth' => $this->input->post('nama'),
                    'ketpros_plth' => $status,
                    'batch_plth' => $this->input->post('batch'),
                    'tglmulai_plth' => strtotime($this->input->post('tglmulai')),
                    'tgldone_plth' => strtotime($this->input->post('tglsls')),
                    'sifat_plth' => $this->input->post('sifat'),
                    'vendor_plth' => $this->input->post('vonv'),
                    'sertifikasi_plth' => $this->input->post('cert'),
                    'nmvendor_plth' => $this->input->post('vend'),
                    'hrgkspvend_plth' => $this->input->post('harga'),
                    'ketkspvend_plth' => $this->input->post('ket'),
                    'memopem_plth' => $select['memopem_plth'],
                    'uniquefile_plth' => $select['uniquefile_plth'],
                );
            } else {
                $new_name = time() . $_FILES["berkas"]['name'];
                $old_name = $_FILES["berkas"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $new_name
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('berkas')) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $postdata = array(
                        'nama_plth' => $this->input->post('nama'),
                        'ketpros_plth' => $status,
                        'batch_plth' => $this->input->post('batch'),
                        'tglmulai_plth' => strtotime($this->input->post('tglmulai')),
                        'tgldone_plth' => strtotime($this->input->post('tglsls')),
                        'sifat_plth' => $this->input->post('sifat'),
                        'vendor_plth' => $this->input->post('vonv'),
                        'sertifikasi_plth' => $this->input->post('cert'),
                        'nmvendor_plth' => $this->input->post('vend'),
                        'hrgkspvend_plth' => $this->input->post('harga'),
                        'ketkspvend_plth' => $this->input->post('ket'),
                        'memopem_plth' => $old_name,
                        'uniquefile_plth' => $file_name,
                    );
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->crud->update("plth_dmt", "id_plth", $select['id_plth'], $postdata);
            $this->session->set_flashdata("msg", "<script>
        $(document).ready(function() {
            sweetAlert(
                'Sukses Mengubah Data!',
                'Data telah di ubah',
                'success'
            )});
        </script>");
            redirect("user/index");
        }

        public function input_pelatihan_core()
        {
            if ($this->session->userdata("access_num") > 2) {
                redirect('user/index');
            }
            if (!$this->input->post("status")) {
                $status = "Pending";
            } else {
                $status = $this->input->post("status");
            }

            if ($_FILES and $_FILES['berkas']['name']) {
                $new_name = time() . $_FILES["berkas"]['name'];
                $old_name = $_FILES["berkas"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $new_name
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('berkas')) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $postdata = array(
                        'nama_plth' => $this->input->post('nama'),
                        'ketpros_plth' => $status,
                        'batch_plth' => $this->input->post('batch'),
                        'tglmulai_plth' => strtotime($this->input->post('tglmulai')),
                        'tgldone_plth' => strtotime($this->input->post('tglsls')),
                        'sifat_plth' => $this->input->post('sifat'),
                        'vendor_plth' => $this->input->post('vonv'),
                        'sertifikasi_plth' => $this->input->post('cert'),
                        'nmvendor_plth' => $this->input->post('vend'),
                        'hrgkspvend_plth' => $this->input->post('harga'),
                        'ketkspvend_plth' => $this->input->post('ket'),
                        'memopem_plth' => $old_name,
                        'uniquefile_plth' => $file_name,
                    );
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $postdata = array(
                    'nama_plth' => $this->input->post('nama'),
                    'ketpros_plth' => $status,
                    'batch_plth' => $this->input->post('batch'),
                    'tglmulai_plth' => strtotime($this->input->post('tglmulai')),
                    'tgldone_plth' => strtotime($this->input->post('tglsls')),
                    'sifat_plth' => $this->input->post('sifat'),
                    'vendor_plth' => $this->input->post('vonv'),
                    'sertifikasi_plth' => $this->input->post('cert'),
                    'nmvendor_plth' => $this->input->post('vend'),
                    'hrgkspvend_plth' => $this->input->post('harga'),
                    'ketkspvend_plth' => $this->input->post('ket'),
                    'memopem_plth' => "N/A",
                    'uniquefile_plth' => "N/A"
                );
            }


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
            $query_seldata = $this->crud->select_where("ins_dmt", array("id_plth" => $id));
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
            if (!$this->input->post("ins1")) {
                $ins1 = "N/A";
            } else {
                $ins1 = $this->input->post("ins1");
            }

            //INSTRUKTUR 2
            if (!$this->input->post("ins2")) {
                $ins2 = "N/A";
            } else {
                $ins2 = $this->input->post("ins2");
            }

            //INSTRUKTUR 3
            if (!$this->input->post("ins3")) {
                $ins3 = "N/A";
            } else {
                $ins3 = $this->input->post("ins3");
            }

            //INSTRUKTUR 4
            if (!$this->input->post("ins4")) {
                $ins4 = "N/A";
            } else {
                $ins4 = $this->input->post("ins4");
            }

            //INSTRUKTUR 5
            if (!$this->input->post("ins5")) {
                $ins5 = "N/A";
            } else {
                $ins5 = $this->input->post("ins5");
            }

            if (!$this->input->post("ins6")) {
                $ins6 = "N/A";
            } else {
                $ins6 = $this->input->post("ins6");
            }

            //INSTRUKTUR 2
            if (!$this->input->post("ins7")) {
                $ins7 = "N/A";
            } else {
                $ins7 = $this->input->post("ins7");
            }

            //INSTRUKTUR 3
            if (!$this->input->post("ins8")) {
                $ins8 = "N/A";
            } else {
                $ins8 = $this->input->post("ins8");
            }

            //INSTRUKTUR 4
            if (!$this->input->post("ins9")) {
                $ins9 = "N/A";
            } else {
                $ins9 = $this->input->post("ins9");
            }

            //INSTRUKTUR 5
            if (!$this->input->post("ins10")) {
                $ins10 = "N/A";
            } else {
                $ins10 = $this->input->post("ins10");
            }

            //SESI INSTRUKTUR 1
            if (!$this->input->post("sesins1")) {
                $sesins1 = "N/A";
            } else {
                $sesins1 = $this->input->post("sesins1");
            }

            //Sesi INSTRUKTUR 2
            if (!$this->input->post("sesins2")) {
                $sesins2 = "N/A";
            } else {
                $sesins2 = $this->input->post("sesins2");
            }

            //Sesi INSTRUKTUR 3
            if (!$this->input->post("sesins3")) {
                $sesins3 = "N/A";
            } else {
                $sesins3 = $this->input->post("sesins3");
            }

            //Sesi INSTRUKTUR 4
            if (!$this->input->post("sesins4")) {
                $sesins4 = "N/A";
            } else {
                $sesins4 = $this->input->post("sesins4");
            }
            //Sesi INSTRUKTUR 5
            if (!$this->input->post("sesins5")) {
                $sesins5 = "N/A";
            } else {
                $sesins5 = $this->input->post("sesins5");
            }

            //SESI INSTRUKTUR 1
            if (!$this->input->post("sesins6")) {
                $sesins6 = "N/A";
            } else {
                $sesins6 = $this->input->post("sesins6");
            }

            //Sesi INSTRUKTUR 2
            if (!$this->input->post("sesins7")) {
                $sesins7 = "N/A";
            } else {
                $sesins7 = $this->input->post("sesins7");
            }

            //Sesi INSTRUKTUR 3
            if (!$this->input->post("sesins8")) {
                $sesins8 = "N/A";
            } else {
                $sesins8 = $this->input->post("sesins8");
            }

            //Sesi INSTRUKTUR 4
            if (!$this->input->post("sesins9")) {
                $sesins9 = "N/A";
            } else {
                $sesins9 = $this->input->post("sesins9");
            }
            //Sesi INSTRUKTUR 5
            if (!$this->input->post("sesins10")) {
                $sesins10 = "N/A";
            } else {
                $sesins10 = $this->input->post("sesins10");
            }

            //Biaya Instruktur 1
            if (!$this->input->post("beains1")) {
                $beains1 = "N/A";
            } else {
                $beains1 = $this->input->post("beains1");
            }

            //Biaya Instruktur 2
            if (!$this->input->post("beains2")) {
                $beains2 = "N/A";
            } else {
                $beains2 = $this->input->post("beains2");
            }

            //Biaya Instruktur 3
            if (!$this->input->post("beains3")) {
                $beains3 = "N/A";
            } else {
                $beains3 = $this->input->post("beains3");
            }

            //Biaya Instruktur 4
            if (!$this->input->post("beains4")) {
                $beains4 = "N/A";
            } else {
                $beains4 = $this->input->post("beains4");
            }

            //Biaya Instruktur 5
            if (!$this->input->post("beains5")) {
                $beains5 = "N/A";
            } else {
                $beains5 = $this->input->post("beains5");
            }

            //Biaya Instruktur 1
            if (!$this->input->post("beains6")) {
                $beains6 = "N/A";
            } else {
                $beains6 = $this->input->post("beains6");
            }

            //Biaya Instruktur 2
            if (!$this->input->post("beains7")) {
                $beains7 = "N/A";
            } else {
                $beains7 = $this->input->post("beains7");
            }

            //Biaya Instruktur 3
            if (!$this->input->post("beains8")) {
                $beains8 = "N/A";
            } else {
                $beains8 = $this->input->post("beains8");
            }

            //Biaya Instruktur 4
            if (!$this->input->post("beains9")) {
                $beains9 = "N/A";
            } else {
                $beains9 = $this->input->post("beains9");
            }

            //Biaya Instruktur 5
            if (!$this->input->post("beains10")) {
                $beains10 = "N/A";
            } else {
                $beains10 = $this->input->post("beains10");
            }

            //Biaya Instruktur 5
            if (!$this->input->post("noven1")) {
                $noven1 = 0;
            } else {
                $noven1 = $this->input->post("noven1");
            }

            //Biaya Instruktur 5
            if (!$this->input->post("noven2")) {
                $noven2 = 0;
            } else {
                $noven2 = $this->input->post("noven2");
            }
            //Biaya Instruktur 5
            if (!$this->input->post("noven3")) {
                $noven3 = 0;
            } else {
                $noven3 = $this->input->post("noven3");
            }
            //Biaya Instruktur 5
            if (!$this->input->post("noven4")) {
                $noven4 = 0;
            } else {
                $noven4 = $this->input->post("noven4");
            }
            //Biaya Instruktur 5
            if (!$this->input->post("noven5")) {
                $noven5 = 0;
            } else {
                $noven5 = $this->input->post("noven5");
            }
            //Biaya Instruktur 5
            if (!$this->input->post("noven6")) {
                $noven6 = 0;
            } else {
                $noven6 = $this->input->post("noven6");
            }
            //Biaya Instruktur 5
            if (!$this->input->post("noven7")) {
                $noven7 = 0;
            } else {
                $noven7 = $this->input->post("noven7");
            }
            //Biaya Instruktur 5
            if (!$this->input->post("noven8")) {
                $noven8 = 0;
            } else {
                $noven8 = $this->input->post("noven8");
            }
            //Biaya Instruktur 5
            if (!$this->input->post("noven9")) {
                $noven9 = 0;
            } else {
                $noven9 = $this->input->post("noven9");
            }
            //Biaya Instruktur 5
            if (!$this->input->post("noven10")) {
                $noven10 = 0;
            } else {
                $noven10 = $this->input->post("noven10");
            }
            if ($_FILES and $_FILES['file1']['name']) {
                $file1 = time() . $_FILES["file1"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $file1
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file1')) {
                    $upload_data = $this->upload->data();
                    $file1 = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund1_ins"] == "" or $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund1_ins"] == NULL) {
                    $file1 = "N/A";
                } else {
                    $file1 = $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund1_ins"];
                }
            }

            if ($_FILES and $_FILES['file2']['name']) {
                $file2 = time() . $_FILES["file2"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $file2
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file2')) {
                    $upload_data = $this->upload->data();
                    $file2 = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund2_ins"] == "" or $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund2_ins"] == NULL) {
                    $file2 = "N/A";
                } else {
                    $file2 = $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund2_ins"];
                }
            }

            if ($_FILES and $_FILES['file3']['name']) {
                $file3 = time() . $_FILES["file3"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $file3
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file3')) {
                    $upload_data = $this->upload->data();
                    $file3 = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund3_ins"] == "" or $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund3_ins"] == NULL) {
                    $file3 = "N/A";
                } else {
                    $file3 = $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund1_ins"];
                }
            }

            if ($_FILES and $_FILES['file4']['name']) {
                $file4 = time() . $_FILES["file4"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $file4
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file4')) {
                    $upload_data = $this->upload->data();
                    $file4 = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund4_ins"] == "" or $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund4_ins"] == NULL) {
                    $file4 = "N/A";
                } else {
                    $file4 = $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund4_ins"];
                }
            }
            if ($_FILES and $_FILES['file5']['name']) {
                $file5 = time() . $_FILES["file5"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $file5
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file5')) {
                    $upload_data = $this->upload->data();
                    $file5 = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund5_ins"] == "" or $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund5_ins"] == NULL) {
                    $file5 = "N/A";
                } else {
                    $file5 = $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund5_ins"];
                }
            }
            if ($_FILES and $_FILES['file6']['name']) {
                $file6 = time() . $_FILES["file6"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $file6
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file6')) {
                    $upload_data = $this->upload->data();
                    $file6 = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund6_ins"] == "" or $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund6_ins"] == NULL) {
                    $file6 = "N/A";
                } else {
                    $file6 = $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund6_ins"];
                }
            }
            if ($_FILES and $_FILES['file7']['name']) {
                $file7 = time() . $_FILES["file7"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $file7
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file7')) {
                    $upload_data = $this->upload->data();
                    $file7 = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund7_ins"] == "" or $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund7_ins"] == NULL) {
                    $file7 = "N/A";
                } else {
                    $file7 = $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund7_ins"];
                }
            }
            if ($_FILES and $_FILES['file8']['name']) {
                $file8 = time() . $_FILES["file8"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $file8
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file8')) {
                    $upload_data = $this->upload->data();
                    $file8 = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund8_ins"] == "" or $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund8_ins"] == NULL) {
                    $file8 = "N/A";
                } else {
                    $file8 = $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund8_ins"];
                }
            }
            if ($_FILES and $_FILES['file9']['name']) {
                $file9 = time() . $_FILES["file9"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $file9
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file9')) {
                    $upload_data = $this->upload->data();
                    $file9 = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund9_ins"] == "" or $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund9_ins"] == NULL) {
                    $file9 = "N/A";
                } else {
                    $file9 = $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund9_ins"];
                }
            }
            if ($_FILES and $_FILES['file10']['name']) {
                $file10 = time() . $_FILES["file10"]['name'];
                $config = array(
                    'upload_path' => 'assets/uploaded_file/',
                    'allowed_types' => '*',
                    'max_size' => '25000',
                    'file_name' => $file10
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file10')) {
                    $upload_data = $this->upload->data();
                    $file10 = $upload_data['file_name'];
                } else {
                    $this->upload->display_errors();
                }
            } else {
                if ($this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund10_ins"] == "" or $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund10_ins"] == NULL) {
                    $file10 = "N/A";
                } else {
                    $file10 = $this->crud->select_where("ins_dmt", array("id_plth" => $id))->row_array()["surund10_ins"];
                }
            }
            //Biaya Instruktur 5
            if (!$this->input->post("status")) {
                $status = "Pending";
            } else {
                $status = $this->input->post("status");
            }

            if ($query_seldata->num_rows() < 1) {
                $array_biarrapih = array(
                    "id_plth" => $id,
                    "ins1_ins" => $ins1,
                    "ins2_ins" => $ins2,
                    "ins3_ins" => $ins3,
                    "ins4_ins" => $ins4,
                    "ins5_ins" => $ins5,
                    "ins6_ins" => $ins6,
                    "ins7_ins" => $ins7,
                    "ins8_ins" => $ins8,
                    "ins9_ins" => $ins9,
                    "ins10_ins" => $ins10,

                    "sesins1_ins" => $sesins1,
                    "sesins2_ins" => $sesins2,
                    "sesins3_ins" => $sesins3,
                    "sesins4_ins" => $sesins4,
                    "sesins5_ins" => $sesins5,
                    "sesins6_ins" => $sesins6,
                    "sesins7_ins" => $sesins7,
                    "sesins8_ins" => $sesins8,
                    "sesins9_ins" => $sesins9,
                    "sesins10_ins" => $sesins10,

                    "beasesins1_ins" => $beains1,
                    "beasesins2_ins" => $beains2,
                    "beasesins3_ins" => $beains3,
                    "beasesins4_ins" => $beains4,
                    "beasesins5_ins" => $beains5,
                    "beasesins6_ins" => $beains6,
                    "beasesins7_ins" => $beains7,
                    "beasesins8_ins" => $beains8,
                    "beasesins9_ins" => $beains9,
                    "beasesins10_ins" => $beains10,

                    "novend1_ins" => $noven1,
                    "novend2_ins" => $noven2,
                    "novend3_ins" => $noven3,
                    "novend4_ins" => $noven4,
                    "novend5_ins" => $noven5,
                    "novend6_ins" => $noven6,
                    "novend7_ins" => $noven7,
                    "novend8_ins" => $noven8,
                    "novend9_ins" => $noven9,
                    "novend10_ins" => $noven10,

                    "surund1_ins" => $file1,
                    "surund2_ins" => $file2,
                    "surund3_ins" => $file3,
                    "surund4_ins" => $file4,
                    "surund5_ins" => $file5,
                    "surund6_ins" => $file6,
                    "surund7_ins" => $file7,
                    "surund8_ins" => $file8,
                    "surund9_ins" => $file9,
                    "surund10_ins" => $file10,

                    "status_ins" => $status,
                );
                $this->crud->insert("ins_dmt", $array_biarrapih);
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
                    "ins1_ins" => $ins1,
                    "ins2_ins" => $ins2,
                    "ins3_ins" => $ins3,
                    "ins4_ins" => $ins4,
                    "ins5_ins" => $ins5,
                    "ins6_ins" => $ins6,
                    "ins7_ins" => $ins7,
                    "ins8_ins" => $ins8,
                    "ins9_ins" => $ins9,
                    "ins10_ins" => $ins10,

                    "sesins1_ins" => $sesins1,
                    "sesins2_ins" => $sesins2,
                    "sesins3_ins" => $sesins3,
                    "sesins4_ins" => $sesins4,
                    "sesins5_ins" => $sesins5,
                    "sesins6_ins" => $sesins6,
                    "sesins7_ins" => $sesins7,
                    "sesins8_ins" => $sesins8,
                    "sesins9_ins" => $sesins9,
                    "sesins10_ins" => $sesins10,

                    "beasesins1_ins" => $beains1,
                    "beasesins2_ins" => $beains2,
                    "beasesins3_ins" => $beains3,
                    "beasesins4_ins" => $beains4,
                    "beasesins5_ins" => $beains5,
                    "beasesins6_ins" => $beains6,
                    "beasesins7_ins" => $beains7,
                    "beasesins8_ins" => $beains8,
                    "beasesins9_ins" => $beains9,
                    "beasesins10_ins" => $beains10,

                    "status_ins" => $status,
                );
                $this->crud->update("ins_dmt", "id_plth", $id, $array_biarrapih);
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

        function get_time()
        {
            $time = $this->input->get("time");
            $out_date = date("d-m-Y", $time);
            echo $out_date;
        }
        function ajaxgetdata_ins()
        {
            $id = $this->input->post("id_pelatihan");
            $getdata = $this->crud->select_where("ins_dmt", array("id_plth" => $id))->result_array();
            echo json_encode($getdata);
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
                $opr1_unique = time() . $_FILES["opr1"]['name'];
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
                $opr4_unique = time() . $_FILES["opr4"]['name'];
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
                $opr5_unique = time() . $_FILES["opr5"]['name'];
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
                $opr8_unique = time() . $_FILES["opr8"]['name'];
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
                "title" => "(Keuangan) Kelengkapan Data | Dashboard Monitoring Training",
                "dis" => $this,
                "whdb" => $this->crud->select_where("plth_dmt", array("id_plth" => $id))->row_array(),
                "whdb2" => $this->crud->select_where("keu_dmt", array("id_plth" => $id))->row_array()
            );
            $this->load->view('templating/head', $data);
            $this->load->view("edit/keu_edit", $data);
            $this->load->view('templating/modal', $data);
            $this->load->view('templating/foot', $data);
        }

        public function edit_keu_core()
        {
            if ($this->session->userdata("access_num") != 5) {
                redirect('user/index');
                die;
            }

            $id = $this->input->post("id");
            $bind_db = $this->crud->select_where("keu_dmt", array("id_plth" => $id));

            if (!$this->input->post("keu1")) {
                $keu1 = "N/A";
            } else {
                $keu1 = $this->input->post("keu1");
            }

            if (!$this->input->post("keu2")) {
                $keu2 = "N/A";
            } else {
                $keu2 = $this->input->post("keu2");
            }

            if (!$this->input->post("keu3")) {
                $keu3 = 0;
            } else {
                $keu3 = $this->input->post("keu3");
            }

            if (!$this->input->post("keu4")) {
                $keu4 = 0;
            } else {
                $keu4 = $this->input->post("keu4");
            }

            if (!$this->input->post("keu5")) {
                $keu5 = 0;
            } else {
                $keu5 = $this->input->post("keu5");
            }

            if (!$this->input->post("keu6")) {
                $keu6 = 0;
            } else {
                $keu6 = $this->input->post("keu6");
            }

            if (!$this->input->post("keu7")) {
                $keu7 = 0;
            } else {
                $keu7 = $this->input->post("keu7");
            }

            if (!$this->input->post("keu8")) {
                $keu8 = 0;
            } else {
                $keu8 = $this->input->post("keu8");
            }

            if (!$this->input->post("keu9")) {
                $keu9 = 0;
            } else {
                $keu9 = $this->input->post("keu9");
            }

            if (!$this->input->post("keu10")) {
                $keu10 = 0;
            } else {
                $keu10 = $this->input->post("keu10");
            }

            if (!$this->input->post("keu11")) {
                $keu11 = 0;
            } else {
                $keu11 = $this->input->post("keu11");
            }

            if (!$this->input->post("keu12")) {
                $keu12 = 0;
            } else {
                $keu12 = $this->input->post("keu12");
            }

            if (!$this->input->post("keu13")) {
                $keu13 = "Pending";
            } else {
                $keu13 = $this->input->post("keu13");
            }


            if ($bind_db->num_rows() < 1) {
                $array_biarrapih = array(
                    "id_plth" => $id,

                    "tgldelinv_keu" => strtotime($keu3),
                    "tglkorekinv_keu" => strtotime($keu4),
                    "tglprocessinv_keu" => strtotime($keu5),
                    "tglpayven_keu" => strtotime($keu6),

                    "tgldelinvako_keu" => strtotime($keu7),
                    "tglkorekinvako_keu" => strtotime($keu8),
                    "tglprocessinvako_keu" => strtotime($keu9),
                    "tglpayvenako_keu" => strtotime($keu10),

                    "tgldeldokins_keu" => strtotime($keu11),
                    "tglpayhon_keu" => strtotime($keu12),
                    "status_keu" => $keu13
                );
                $this->crud->insert("keu_dmt", $array_biarrapih);
                $this->session->set_flashdata("msg", "<script>
                $(document).ready(function() {
                    sweetAlert(
                        'Berhasil!',
                        'Anda berhasil menambah kelengkapan data.',
                        'success'
                    )});
                </script>");
                redirect("user/index");
            } else {
                $array_biarrapih = array(

                    "tgldelinv_keu" => strtotime($keu3),
                    "tglkorekinv_keu" => strtotime($keu4),
                    "tglprocessinv_keu" => strtotime($keu5),
                    "tglpayven_keu" => strtotime($keu6),

                    "tgldelinvako_keu" => strtotime($keu7),
                    "tglkorekinvako_keu" => strtotime($keu8),
                    "tglprocessinvako_keu" => strtotime($keu9),
                    "tglpayvenako_keu" => strtotime($keu10),

                    "tgldeldokins_keu" => strtotime($keu11),
                    "tglpayhon_keu" => strtotime($keu12),
                    "status_keu" => $keu13
                );
                $this->crud->update("keu_dmt", "id_plth", $id, $array_biarrapih);
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
                'dis' => $this,
            );
            $this->load->view('templating/head', $data);
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



            $arraydata_send = array(
                "jnsplth_realisasi" => $pos_real1,
                "nama_realisasi" => $pos_real2,
                "batch_realisasi" => $pos_real3,
                "tglmulai_realisasi" => $pos_real4,
                "tglsls_realisasi" => $pos_real5,
                "lokasi_realisasi" => $pos_real6,
                "durasi_realisasi" => $pos_real7,
                "jmlsesi_realisasi" => $pos_real8,
                "undpersero_realisasi" => $pos_real9,
                "undnonpersero_realisasi" => $pos_real10,
                "dtgpersero_realisasi" => $pos_real11,
                "dtgnonpersero_realisasi" => $pos_real12,
                "lndhours_realisasi" => ($pos_real11 * $pos_real8),
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
            if (!$id) {
                redirect('user/index');
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
                "row" => $this->crud->select_where("realisasi_dmt", array("id_realisasi" => $id))->row_array()
            );
            $this->load->view('templating/head', $data);
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

            $arraydata_send = array(
                "jnsplth_realisasi" => $pos_real1,
                "nama_realisasi" => $pos_real2,
                "batch_realisasi" => $pos_real3,
                "tglmulai_realisasi" => $pos_real4,
                "tglsls_realisasi" => $pos_real5,
                "lokasi_realisasi" => $pos_real6,
                "durasi_realisasi" => $pos_real7,
                "jmlsesi_realisasi" => $pos_real8,
                "undpersero_realisasi" => $pos_real9,
                "undnonpersero_realisasi" => $pos_real10,
                "dtgpersero_realisasi" => $pos_real11,
                "dtgnonpersero_realisasi" => $pos_real12,
                "lndhours_realisasi" => ($pos_real11 * $pos_real8),
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
                $pnd4_unique = time() . $_FILES["psrtpnd4"]['name'];
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
    }
