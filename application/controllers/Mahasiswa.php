<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata("islogin")){
			redirect("login");
		}
		$this->load->model("mahasiswa_model");
		$this->load->helper("security");
	}

	public function index()
	{
		$this->load->view('mahasiswa_view');
	}

	public function data(){
		echo json_encode($this->mahasiswa_model
							->ambilMahasiswa()->result());
	}

	public function baca($id=null){
		echo json_encode($this->mahasiswa_model
			->getMahasiswa($id));
	}

	public function hapus($id){
		echo json_encode(array(
			"status" => $this->mahasiswa_model->deleteMahasiswa($id)
		));
	}

	public function simpan($mode){
		if($this->_validate($mode)){
			$data = array(
				"nim" => $this->input->post("nim"),
				"namamhs" => $this->input->post("nama"),
				"tgllahir" => $this->input->post("tgllahir"),
				"alamat" => $this->input->post("alamat"),
				"prodi" => $this->input->post("prodi"),
				"kelas" => $this->input->post("kelas"),
				"semester" => $this->input->post("semester"),
				"telepon" => $this->input->post("telepon"),
				"dpa" => $this->input->post("dpa"),
				"password" => do_hash("123456","md5")
			);
	
			if($mode=="add"){
				$status = $this->mahasiswa_model->createMahasiswa($data);
			}elseif($mode=="edit"){
				$status = $this->mahasiswa_model
					->updateMahasiswa($this->input->post("nim"),$data);
			}			
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array(
				"status" => FALSE,
				"message" => array(
					"nim" => form_error("nim"),
					"namamhs" => form_error("nama"),
					"tgllahir" => form_error("tgllahir"),
					"kelas" => form_error("kelas"),
					"semester" => form_error("semester"),
					"dpa" => form_error("dpa")
				)
			));
		}
	}

	private function _validate($mode){
		$rules = array(
			array(
				"field" => "nim",
				"label" => "NIM",
				"rules" => "required|exact_length[10]".($mode=="add"?"|is_unique[tblmahasiswa.nim]":"")
			),
			array(
				"field" => "nama",
				"label" => "Nama",
				"rules" => "required|max_length[100]"
			),
			array(
				"field" => "tgllahir",
				"label" => "Tgllahir",
				"rules" => "required"
			),
			array(
				"field" => "kelas",
				"label" => "Kelas",
				"rules" => "required"
			),
			array(
				"field" => "semester",
				"label" => "Semester",
				"rules" => "required"
			),
			array(
				"field" => "dpa",
				"label" => "DPA",
				"rules" => "required|max_length[100]"
			)
		);

		$this->form_validation->set_rules($rules);
		$this->form_validation
			->set_error_delimiters("<span class='help-block'>","</span>");

		return $this->form_validation->run();
	}
	// public function create() 
    // {
    //     // load model dan form helper 
    //     $this->load->model('Dosen_model');
    //     // $this->load->helper('form_helper');
 
    //     $data = array(
    //         'dd_nama' => $this->Dosen_model->dd_nama(),
    //         'nama_selected' => $this->input->post('tbldosen') ? $this->input->post('tbldosen') : '$row->nama', // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
	// );
        
    //     $this->load->view('mahasiswa_view', $data);
    // }
}
