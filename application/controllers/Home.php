<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
		if ($this->session->userdata("login") == TRUE) {
			redirect("user/index");
		}
		$config = array(
			array(
				'field' => 'email',
				'label' => 'Alamat E-Mail',
				'rules' => 'required'
			),
			array(
				'field' => 'pass',
				'label' => 'Password',
				'rules' => 'required'
			),
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
		} else {
			$email = strip_tags($this->input->post("email"), TRUE);
			if ($this->crud->select_nr_where("user_dmt", array('email_user' => $email)) < 1) {
				$this->session->set_flashdata("msg", "<script>
				$(document).ready(function() {
					sweetAlert(
						'Email Belum Terdaftar Sebelumnya!',
						'Silahkan hubungi superadmin.',
						'error'
					);
				});
			</script>");
			} else {
				$arraydata_send = array('email_user' => $email);
				$get_data_crud = $this->crud->select_where("user_dmt",  $arraydata_send)->row_array();
				$pw_bind = $get_data_crud['pass_user'];
				$pass = $this->input->post("pass");
				$password = password_verify($pass, $pw_bind);
				if ($password != TRUE) {
					$this->session->set_flashdata("msg", "<script>
				$(document).ready(function() {
					sweetAlert(
						'Password Salah!',
						'Masukkan password dengan benar',
						'error'
						);
						});
					</script>");
					redirect("home/index");
					die;
				} else {
					$this->crud->set_sess_login($email);
					$akses = $this->session->userdata("access_str");
					$this->session->set_flashdata("msg", "<script>
					$(document).ready(function() {
						sweetAlert(
							'Selamat Datang!',
							'Anda berhasil masuk ke dashboard $akses',
							'success'
						)});
					</script>");
					redirect("user/index");
				}
			}
		}
		$data = array(
			'title' => 'Login - Dashboard Monitoring Training',
		);
		$this->load->view('templating/head', $data);
		$this->load->view('index/login', $data);
		$this->load->view('templating/foot', $data);
	}
	public function logout()
	{
		$this->_destroy_out();
		$this->session->set_flashdata("msg", "<script>
			$(document).ready(function() {
				sweetAlert(
					'Sukses Logout!',
					'Anda berhasil logout. silahkan login kembali untuk melanjutkan!',
					'success'
				)});
			</script>");
		redirect("home/index");
	}
	private function _destroy_out()
	{
		$unset = $this->session->unset_userdata('login', 'nama', 'email', 'access_num');
		return $unset;
	}
}
