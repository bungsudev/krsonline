<?php

class krsmhs_model extends CI_Model{

    public function ambilkrsmhs(){
        $query = $this->db
                    ->get("tblkrsmhs");
        
        return $query;
    }

    public function ambilMatakuliah(){
        $query = $this->db->get("tblmatakuliah");

        return $query;
    }

    public function ambilMahasiswa(){
        $query = $this->db->get("tblmahasiswa");
        
        return $query;
    }

    public function ambilkrsmhsfilter($prodi,$kelas,$semester){
        $query = $this->db
                ->select("a.nim,a.namamhs,a.prodi,a.kelas,a.semester,a.dpa,b.status,b.komentar")
                ->from("tblmahasiswa a")
                ->join("tblkrsmhs b","a.nim=b.nim","right")
                ->where("a.prodi",$prodi)
                ->where("a.kelas",$kelas)
                ->where("a.semester",$semester)
                ->get();

        return $query;
    }

    public function ambilkrsmhsdetil($nim){
        $query = $this->db
                ->select("b.nim,b.idkrsmhsdtl,a.idmatakuliah,a.namamk,a.sks,a.semester")
                ->from("tblmatakuliah a")
                ->join("tblkrsmhsdtl b","a.idmatakuliah=b.idmatakuliah","right")
                ->where("b.nim",$nim)
                ->group_by("a.idmatakuliah,a.namamk,a.sks,a.semester")
                ->get();

        return $query;
    }

    public function hitungsks($nim){
        $query = $this->db
                ->select("SUM(a.sks) as jumlah")
                ->from("tblmatakuliah a")
                ->join("tblkrsmhsdtl b","a.idmatakuliah=b.idmatakuliah","right")
                ->where("b.nim",$nim)
                ->get();

        return $query;
    }

    public function deletekrsmhs($nim){
        $query = $this->db->where("nim",$nim)->delete("tblkrsmhs");
        
        return $query;
    }
    public function deletekrsmhsdtl($nim){
        $query = $this->db->where("nim",$nim)->delete("tblkrsmhsdtl");
        
        return $query;
    }

    public function getkrsmhs($idkrsmhs){
        $query = $this->db
                    ->where("idkrsmhs",$idkrsmhs)
                    ->get("tblkrsmhs");
        
        return $query->row();
    }

    public function hapuskrsmhsdtl($idkrsmhsdtl){
        $query = $this->db->where("idkrsmhsdtl",$idkrsmhsdtl)->delete("tblkrsmhsdtl");
        
        return $query;
    }
}