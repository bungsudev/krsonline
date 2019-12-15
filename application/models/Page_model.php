<?php
class Page_model extends CI_Model{
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

    public function ambilMatakuliahKelas($idkelas){
        $query = $this->db
                    ->select("a.idkelas,a.idmatakuliah,b.nama")
                    ->from("tblkelasmatakuliah a")
                    ->join("tblmatakuliah b","a.idmatakuliah=b.idmatakuliah")
                    ->where("a.idkelas",$idkelas)
                    ->get();

        return $query;
    }

    public function ambilMahasiswaKelas($idkelas){
        $query = $this->db
                    ->select("a.nim,b.nama")
                    ->from("tblkelasmahasiswa a")
                    ->join("tblmahasiswa b","a.nim=b.nim")
                    ->where("a.idkelas",$idkelas)
                    ->get();

        return $query; 
    }

    public function simpanabsensi($data){
        $this->db->insert("tblabsensi",$data);

        return $this->db->affected_rows();
    }

    public function ambilsemuamatakuliah(){
        $query = $this->db->get("tblmatakuliah");

        return $query;
    }

    public function ambilabsensimahasiswa($nim,$idmatakuliah){
        $query = $this->db
                    ->where("nim",$nim)
                    ->where("idmatakuliah",$idmatakuliah)
                    ->get("tblabsensi");

        return $query;
    }
}