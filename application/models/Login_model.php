<?php

class Login_model extends CI_Model {

    public function ambilUser($userid,$password){
        $query = $this->db
                    ->where("userid",$userid)
                    ->where("password",$password)
                    ->get("tbluser");
        
        return $query;
    }
}