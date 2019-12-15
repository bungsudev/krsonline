<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("login_model");
		$this->load->helper("security");
	}

	public function index()
	{
		$this->load->view("mobile/login_view");
	}

	public function ceklogin(){
		if($this->input->post()){
			if($this->_validate()){
				$userid = $this->input->post("iduser");
				$password = do_hash($this->input->post("password"),
								"md5");
				$user = $this->login_model
							->ambilUser($userid,$password);
				if($user->num_rows() > 0){
					$data_user = $user->row();
					if($data_user->status=="DOS" ||
						$data_user->status=="MHS" ){
						$this->session->set_userdata(
							array(
								"userid-mobile" => $data_user->userid,
								"islogin-mobile" => TRUE
							)
						);
						if($data_user->status=="DOS"){
							$this->session->set_userdata(
								array(
									"userid" => $data_user->userid,
									"nama"=> $data_user->nama,
									"islogin" => TRUE
								)
							);
							redirect("mobile/page");
						}else{
							redirect("mobile/pagemhs");
						}
					}else{
						$this->session->set_flashdata("error-login",
						"Anda tidak memiliki hak akses ke sistem");
						redirect("mobile/login");
					}
				}else{
					$this->session->set_flashdata("error-login",
						"Userid dan Password Salah");
					redirect("mobile/login");
				}
			}else{
				$this->load->view("mobile/login_view");
			}
		}else{
			$this->session->set_flashdata("error-login",
				"Anda belum memasukkan Userid dan Password");
			redirect("mobile/login");
		}
	}

	public function logout(){
		$this->session->unset_userdata("islogin-mobile");
		$this->session->sess_destroy();
		redirect("mobile/login");
	}

	private function _validate(){
		$rules = array(
			array(
				"field" => "iduser",
				"label" => "ID User",
				"rules" => "required|min_length[5]|max_length[20]"
			),
			array(
				"field" => "password",
				"label" => "Password",
				"rules" => "required|min_length[5]"
			)
		);
		$this->form_validation->set_rules($rules);
		$this->form_validation
			->set_error_delimiters("<span class='help-block'>",
				"</span>");
			
		return $this->form_validation->run();
	}
}
