<?php

class Mahasiswa_model extends CI_Model{

    public function ambilMahasiswa(){
        $query = $this->db
                    ->get("tblmahasiswa");
        
        return $query;
    }

    public function createMahasiswa($data){
        $query = $this->db
                    ->insert("tblmahasiswa",$data);

        return $this->db->affected_rows();
    }

    public function updateMahasiswa($nim,$data){
        $query = $this->db
                    ->where("nim",$nim)
                    ->update("tblmahasiswa",$data);
        
        return $this->db->affected_rows();
    }

    public function deleteMahasiswa($nim){
        $query = $this->db
                    ->where("nim",$nim)
                    ->delete("tblmahasiswa");
        
        return $query;
    }

    public function getMahasiswa($nim){
        $query = $this->db
                    ->where("nim",$nim)
                    ->get("tblmahasiswa");
        
        return $query->row();
    }
    
    
	// get data dropdown
    // function dd_nama()
    // {
    //     // ambil data dari db
    //     $this->db->order_by('tbldosen', 'asc');
    //     $result = $this->db->get('tbldosen');
        
    //     // bikin array
    //     // please select berikut ini merupakan tambahan saja agar saat pertama
    //     // diload akan ditampilkan text please select.
    //     $dd[''] = 'Pilih DPA';
    //     if ($result->num_rows() > 0) {
    //         foreach ($result->result() as $row) {
    //         // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
    //             $dd[$row->nama] = $row->nama;
    //         }
    //     }
    //     return $dd;
    // }
}