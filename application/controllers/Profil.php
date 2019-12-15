<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profil extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("user_model");
	}
	public function index()
	{
		$data["profil"] = $this->user_model
			->getUser($this->session->userdata("userid"));
		$this->load->view('profil_view',$data);
	}
	public function simpan(){
		if($this->input->post()){
			//echo $this->_validate(); exit();
			if($this->_validate()){
				$data = array(
					"userid" => $this->input->post("userid"),
					"nama" => $this->input->post("nama"),
					"alamat" => $this->input->post("alamat"),
					"telepon" => $this->input->post("telepon"),
					"email" => $this->input->post("email")
				);
				$this->user_model->updateUser(
					$this->input->post("userid"),$data);
					// $this->session->set_userdata
					$config = array(
						"upload_path" => "assets/img",
						"allowed_types" => "png",
						"overwrite" => TRUE,
						"file_name" => $this->input->post("userid")
					);

					$this->load->library("upload",$config);
					if($this->upload->do_upload("gambar")){
						$this->session->set_flashdata("error-message",
						"Berhasil UPDATE data user");
					}else{
						$this->session->set_flashdata("error-message",
						$this->upload->display_errors());
					}

				redirect("profil");
			}else{
				$this->load->view('profil_view');
			}
		}else{
			redirect("profil");
		}
		
	}
	private function _validate(){
		$rules = array(
			array(
				"field" => "nama",
				"label" => "Nama",
				"rules" => "required|max_length[100]"
			),
			array(
				"field" => "telepon",
				"label" => "Telepon",
				"rules" => "max_length[15]"
			),
			array(
				"field" => "email",
				"label" => "Email",
				"rules" => "valid_email|max_length[50]"
			)
		);
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters(
			"<span class='help-block'>","</span>"
		);
		return $this->form_validation->run();
	}
}