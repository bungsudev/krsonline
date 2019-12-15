<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagemhs extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("page_model");
	}
	public function index()
	{
		$this->load->view("mobile/pagemhs_view");
	}

	public function ambilkelas($nama){
		echo json_encode(
				$this->page_model
					->ambilKelas($this->session->userdata("nama"))->result());
	}

	public function ambilmatakuliah(){
		echo json_encode(
			$this->page_model
				->ambilMatakuliahKelas($this->input->post("idkelas"))
				->result()
		);
	}

	public function ambilmahasiswa(){
		echo json_encode(
			$this->page_model
				->ambilMahasiswaKelas($this->input->post("idkelas"))
				->result()
		);
	}

	public function simpanabsensi(){
		$affected = 0;
		foreach($this->input->post("status") as $nim => $status):
			$affected += 
				$this->page_model->simpanabsensi(array(
					"idkelas" => $this->input->post("idkelas"),
					"idmatakuliah" => $this->input->post("idmatakuliah"),
					"pertemuan" => $this->input->post("pertemuan"),
					"nim" => $nim,
					"status" => $status));
		endforeach;

		echo json_encode(
			array(
				"status" => ($affected>0?TRUE:FALSE)
			)
		);
	}

	public function pagemhs(){
		$this->load->view("mobile/pagemhs_view");
	}

	public function ambilsemuamatakuliah(){
		echo json_encode($this->page_model->ambilsemuamatakuliah()->result());
	}

	public function ambilabsensimahasiswa(){
		echo json_encode(
			$this->page_model
				->ambilabsensimahasiswa(
					$this->session->userdata("userid-mobile"),
					$this->input->post("idmatakuliah"))
				->result());
	}
}
