<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata("islogin")){
			redirect("login");
		}
		$this->load->model("dosen_model");
		$this->load->helper("security");
	}

	public function index()
	{
		$this->load->view('dosen_view');
	}

	public function data(){
		echo json_encode($this->dosen_model
							->ambilDosen()->result());
	}

	public function baca($id=null){
		echo json_encode($this->dosen_model
			->getDosen($id));
	}

	public function hapus($id){
		echo json_encode(array(
			"status" => $this->dosen_model->deleteDosen($id)
		));
	}

	public function simpan($mode){
		if($this->_validate($mode)){
			$data = array(
				"iddosen" => $this->input->post("iddosen"),
				"nama" => $this->input->post("nama"),
				"alamat" => $this->input->post("alamat"),
				"telepon" => $this->input->post("telepon"),
				"email" => $this->input->post("email"),
				"password" => do_hash("123456","md5")
			);
	
			if($mode=="add"){
				$status = $this->dosen_model->createDosen($data);
			}elseif($mode=="edit"){
				$status = $this->dosen_model
					->updateDosen($this->input->post("iddosen"),$data);
			}
			
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array(
				"status" => FALSE,
				"message" => array(
					"iddosen" => form_error("iddosen"),
					"nama" => form_error("nama"),
					"telepon" => form_error("telepon"),
					"email" => form_error("email"),
				)
			));
		}
	}

	private function _validate($mode){
		$rules = array(
			array(
				"field" => "iddosen",
				"label" => "iddosen",
				"rules" => "required|exact_length[5]".($mode=="add"?"|is_unique[tbldosen.iddosen]":"")
			),
			array(
				"field" => "nama",
				"label" => "Nama",
				"rules" => "required|max_length[100]"
			),
			array(
				"field" => "alamat",
				"label" => "Alamat",
				"rules" => "required"
			),
			array(
				"field" => "telepon",
				"label" => "Telepon",
				"rules" => "max_length[15]"
			),
			array(
				"field" => "email",
				"label" => "Email",
				"rules" => "required|valid_email|max_length[50]"
			)
		);

		$this->form_validation->set_rules($rules);
		$this->form_validation
			->set_error_delimiters("<span class='help-block'>","</span>");

		return $this->form_validation->run();
	}
}
