<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krsmhs extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata("islogin")){
			redirect("login");
		}
		$this->load->model("Krsmhs_model");
	}

	public function hapusdetail($idkrsmhsdtl){
		echo json_encode(array(
			"status" => $this->Krsmhs_model->hapuskrsmhsdtl($idkrsmhsdtl)
		));
	}

	public function index()
	{

		$data["mahasiswa"] = $this->Krsmhs_model->ambilMahasiswa()->result();
		$data["matakuliah"] = $this->Krsmhs_model->ambilMatakuliah()->result();
		$this->load->view('krsmhs_view',$data);
	}

	public function ambilkrsmhs($prodi,$kelas,$semester){
		echo json_encode(
				$this->Krsmhs_model
					->ambilkrsmhsfilter($prodi,$kelas,$semester)->result());
	}

	public function ambilkrsmhsdtl($nim){
		echo json_encode(
				$this->Krsmhs_model
					->ambilkrsmhsdetil($nim)->result());
	}

	public function hitungsks($nim){
		echo json_encode(
				$this->Krsmhs_model
					->hitungsks($nim)->result());
	}

	public function data(){
		echo json_encode($this->Krsmhs_model
							->ambilkrsmhs()->result());
	}

	public function baca($idkrsmhs=null){
		echo json_encode($this->Krsmhs_model
			->getkrsmhs($idkrsmhs));
	}

	public function hapus($nim){
		echo json_encode(array(
			"status" => $this->Krsmhs_model->deletekrsmhs($nim)
		));
	}

	public function hapusdtl($nim){
		echo json_encode(array(
			"status" => $this->Krsmhs_model->deletekrsmhsdtl($nim)
		));
	}
} 
