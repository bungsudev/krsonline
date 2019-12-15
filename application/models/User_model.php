<?php

class User_model extends CI_Model{

    public function ambilUser(){
        $query = $this->db
                    ->get("tbluser");
        
        return $query;
    }

    public function createUser($data){
        $query = $this->db
                    ->insert("tblUser",$data);

        return $this->db->affected_rows();
    }

    public function updateUser($userid,$data){
        $query = $this->db
                    ->where("userid",$userid)
                    ->update("tblUser",$data);
        
        return $this->db->affected_rows();
    }

    public function deleteUser($userid){
        $query = $this->db
                    ->where("userid",$userid)
                    ->delete("tblUser");
        
        return $query;
    }

    public function getUser($userid){
        $query = $this->db
                    ->where("userid",$userid)
                    ->get("tblUser");
        
        return $query->row();
    }

    public function cekLogin($userid,$password){
        $query = $this->db
                    ->where("userid",$userid)
                    ->where("password",$password)
                    ->get("tbluser");
        
        return $query;
    }
}