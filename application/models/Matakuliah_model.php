<?php

class Matakuliah_model extends CI_Model{

    public function ambilMatakuliah(){
        $query = $this->db
                    ->get("tblmatakuliah");
        
        return $query;
    }

    public function createMatakuliah($data){
        $query = $this->db 
                    ->insert("tblmatakuliah",$data);

        return $this->db->affected_rows();
    }

    public function updateMatakuliah($idmatakuliah,$data){
        $query = $this->db
                    ->where("idmatakuliah",$idmatakuliah)
                    ->update("tblmatakuliah",$data);
        
        return $this->db->affected_rows();
    }

    public function deleteMatakuliah($idmatakuliah){
        $query = $this->db
                    ->where("idmatakuliah",$idmatakuliah)
                    ->delete("tblmatakuliah");
        
        return $query;
    }

    public function getMatakuliah($idmatakuliah){
        $query = $this->db
                    ->where("idmatakuliah",$idmatakuliah)
                    ->get("tblmatakuliah");
        
        return $query->row();
    }
}