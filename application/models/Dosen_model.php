<?php

class Dosen_model extends CI_Model{

    public function ambilDosen(){
        $query = $this->db
                    ->get("tbldosen");
        
        return $query;
    }

    public function createDosen($data){
        $query = $this->db
                    ->insert("tbldosen",$data);

        return $this->db->affected_rows();
    }

    public function updateDosen($iddosen,$data){
        $query = $this->db
                    ->where("iddosen",$iddosen)
                    ->update("tbldosen",$data);
        
        return $this->db->affected_rows();
    }

    public function deleteDosen($iddosen){
        $query = $this->db
                    ->where("iddosen",$iddosen)
                    ->delete("tbldosen");
        
        return $query;
    }

    public function getDosen($iddosen){
        $query = $this->db
                    ->where("iddosen",$iddosen)
                    ->get("tbldosen");
        
        return $query->row();
    }
}