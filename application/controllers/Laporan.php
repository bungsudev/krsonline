<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function  __construct(){ 
        parent::__construct();
        $this->load->model('laporan_model');
    }
	public function index()
	{
		$this->load->view('welcome_message');
    }

    public function mahasiswa(){
        $this->load->view("laporan/mahasiswa_laporan",array(
                    "mahasiswa" => $this->laporan_model->getMahasiswa()->result(),
                    "title" => "Laporan Mahasiswa"
                    ));
    }
    public function dosen(){
        $this->load->view("laporan/dosen_laporan",array(
                    "dosen" => $this->laporan_model->getDosen()->result(),
                    "title" => "Laporan Dosen"
                    ));
    }
    public function matakuliah(){
        $this->load->view("laporan/matakuliah_laporan",array(
                    "dosen" => $this->laporan_model->getmatakuliah()->result(),
                    "title" => "Laporan Matakuliah"
                    ));
    }
    public function user(){
        $this->load->view("laporan/user_laporan",array(
                    "dosen" => $this->laporan_model->getuser()->result(),
                    "title" => "Laporan User"
                    ));
    }

    public function krsonline(){
        if($this->input->get()){
            $this->load->view("laporan/krsonline_laporan",array(
                "krsonline" => $this->laporan_model
                            ->getkrsonline(
                                            $this->input->get("prodi"),
                                            $this->input->get("kelas"),
                                            $this->input->get("semester"))
                            ->result(),
                "title" => "Laporan KRS Mahasiswa"
            ));
        }else{
            $this->load->view("dialog/krsmhs_dialog",
                array(
                    "action" => "krsonline"
                    // "krsmhs" => $this->laporan_model->getkrsonline()->result(),
                    // "matakuliah" => $this->laporan_model->getMatakuliah()->result(),
                    // "mahasiswa" => $this->laporan_model->getMahasiswa()->result(),
                    
                ));
        }
        
        
    }

    public function krsmhsdtl(){
        if($this->input->get()){
            $this->load->view("laporan/krsmhsdtl_laporan",array(
                "krsmhsdtl" => $this->laporan_model
                            ->getkrsmhsdetil($this->input->get("nim"))
                            ->result(),
                "title" => "Laporan KRS Mahasiswa Detail"
            ));
        }else{
            $this->load->view("dialog/krsmhsdtl_dialog",
                array(
                    "action" => "krsmhsdtl",
                    // "krsmhs" => $this->laporan_model->getkrsonline()->result(),
                    // "matakuliah" => $this->laporan_model->getMatakuliah()->result(),
                    "mahasiswa" => $this->laporan_model->getMahasiswa()->result()
                    
                ));
        }
        
        
    }

    public function krsmhsdosen(){
        if($this->input->get()){
            $this->load->view("laporan/krsmhsdosen_laporan",array(
                "krsmhsdosen" => $this->laporan_model
                            ->getkrsmhsdosen($this->input->get("nama"))
                            ->result(),
                "title" => "Laporan KRS Mahasiswa Detail"
            ));
        }else{
            $this->load->view("dialog/krsmhsdosen_dialog",
                array(
                    "action" => "krsmhsdosen",
                    // "krsmhs" => $this->laporan_model->getkrsonline()->result(),
                    // "matakuliah" => $this->laporan_model->getMatakuliah()->result(),
                    "dosen" => $this->laporan_model->getDosen()->result(),
                    "mahasiswa" => $this->laporan_model->getMahasiswa()->result()
                    
                ));
        }
        
        
    }
    public function krsmhskelas(){
        if($this->input->get()){
            $this->load->view("laporan/krsmhskelas_laporan",array(
                "krsmhsdosen" => $this->laporan_model
                            ->getkrsmhskelas($this->input->get("prodi"),$this->input->get("kelas"))
                            ->result(),
                "title" => "Laporan Kelas KRS Mahasiswa"
            ));
        }else{
            $this->load->view("dialog/krsmhskelas_dialog",
                array(
                    "action" => "krsmhskelas",
                    // "krsmhs" => $this->laporan_model->getkrsonline()->result(),
                    // "matakuliah" => $this->laporan_model->getMatakuliah()->result(),
                    // "dosen" => $this->laporan_model->getDosen()->result(),
                    "mahasiswa" => $this->laporan_model->getMahasiswa()->result()
                    
                ));
        }
        
        
    }
}
