<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata("islogin")){
			redirect("login");
		}
		$this->load->model("user_model");
		$this->load->helper("security");
	}

	public function index()
	{
		$this->load->view('user_view');
	}

	public function data(){
		echo json_encode($this->user_model
							->ambilUser()->result());
	}

	public function baca($id=null){
		echo json_encode($this->user_model
			->getUser($id));
	}

	public function hapus($id){
		echo json_encode(array(
			"status" => $this->user_model->deleteUser($id)
		));
	}

	public function simpan($mode){
		if($this->_validate($mode)){
			$data = array(
				"userid" => $this->input->post("userid"),
				"nama" => $this->input->post("nama"),
				"alamat" => $this->input->post("alamat"),
				"telepon" => $this->input->post("telepon"),
				"email" => $this->input->post("email"),
				"status" => $this->input->post("status"),
				"password" => do_hash("123456","md5")
			);
	
			if($mode=="add"){
				$status = $this->user_model->createUser($data);
			}elseif($mode=="edit"){
				$status = $this->user_model
					->updateUser($this->input->post("userid"),$data);
			}

			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array(
				"status" => FALSE,
				"message" => array(
					"userid" => form_error("userid"),
					"nama" => form_error("nama"),
					"email" => form_error("email"),
					"status" => form_error("status")
				)
			));
		}
	}

	public function reset($userid){
        $data = array(
            "userid" => $userid,
            "password" => do_hash("123456","md5")
        );

    	echo json_encode(array(
			"status" => ($this->user_model->updateUser($userid,$data) > 0)));
	}
	
	public function gantipass(){
        $this->load->view("gantipassword_view");
    }

    public function ganti(){
        $rules = array(
            array(
                "field" => "password-lama",
                "label" => "Password Lama",
                "rules" => "required"
            ),
            array(
                "field" => "password-baru",
                "label" => "Password Baru",
                "rules" => "required|min_length[5]"
            ),
            array(
                "field" => "konfirm",
                "label" => "Konfirm Password Baru",
                "rules" => "required|min_length[5]|matches[password-baru]"
            )
        );
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters("<span class='help-block'>","</span>");

        if($this->form_validation->run()){
            $userid = $this->input->post("userid");
            $password_lama = do_hash($this->input->post("password-lama"),"md5");
            $password_baru = do_hash($this->input->post("password-baru"),"md5"); 
						
            if($this->user_model->cekLogin($userid,$password_lama)->num_rows()>0){
                $data = array(
                    "userid" => $userid,
                    "password" => $password_baru
                );

				$this->user_model->updateUser($userid,$data);				
                redirect("login/logout");
            }else{
                redirect("user/gantipass");
            }
        }else{
            $this->load->view("gantipassword_view");
        }
    }

	private function _validate($mode){
		$rules = array(
			array(
				"field" => "userid",
				"label" => "userid",
				"rules" => "required|max_length[20]".($mode=="add"?"|is_unique[tbluser.userid]":"")
			),
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
				"rules" => "required|valid_email|max_length[50]"
			),
			array(
				"field" => "status",
				"label" => "Status",
				"rules" => "required"
			)
		);

		$this->form_validation->set_rules($rules);
		$this->form_validation
			->set_error_delimiters("<span class='help-block'>","</span>");

		return $this->form_validation->run();
	}
}
