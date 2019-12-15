<?php
class Laporan_model extends CI_Model{
    
    public function getDosen(){
        $query = $this->db->get("tbldosen");
        return $query;
    }

    public function getMahasiswa(){
        $query = $this->db->get("tblmahasiswa");
        return $query;
    }

    public function getMatakuliah(){
        $query = $this->db->get("tblmatakuliah");
        return $query;
    }

    public function getUser(){
        $query = $this->db->get("tbluser");
        return $query;
    }

    
    public function getkrsonline($prodi,$kelas,$semester){
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

    public function getkrsmhsdetil($nim){
        $query = $this->db
                ->select("b.nim,c.namamhs,b.idkrsmhsdtl,a.idmatakuliah,a.namamk,a.sks,a.semester")
                ->from("tblmatakuliah a")
                ->join("tblkrsmhsdtl b","a.idmatakuliah=b.idmatakuliah","right")
                ->join("tblmahasiswa c","c.nim=b.nim","right")
                ->where("b.nim",$nim)
                ->group_by("a.idmatakuliah,a.namamk,a.sks,a.semester")
                ->get();

        return $query;
    }
    

    public function getkrsmhsdosen($nama){
        $query = $this->db
                ->select("c.iddosen,c.nama,a.nim,a.namamhs,a.prodi,a.kelas,a.semester,a.dpa,b.status,b.komentar")
                ->from("tblmahasiswa a")
                ->join("tblkrsmhs b","a.nim=b.nim")
                ->join("tbldosen c","a.dpa=c.nama")
                ->where("c.nama",$nama)
                ->get();

        return $query;
    }
    public function getkrsmhskelas($prodi,$kelas){
        $query = $this->db
                ->select("a.nim,a.namamhs,a.prodi,a.kelas,a.semester,a.dpa,b.status,b.komentar")
                ->from("tblmahasiswa a")
                ->join("tblkrsmhs b","a.nim=b.nim","right")
                ->where("a.prodi",$prodi)
                ->where("a.kelas",$kelas)
                ->get();
        return $query;
    }
}