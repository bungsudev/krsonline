
<?php $this->load->view('components/head'); ?>
<?php $this->load->view('components/navbar'); ?>
  
    <div class="container">
        <div class="modal fade" tabindex="-1" role="dialog" id="form-mahasiswa">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header"><h3>Form <span id="mode"></span> Mahasiswa</h3></div>
                    <div class="modal-body">  
                        <form action=""> 
                            <div class="row">
                            <div class="class form-group col-md-6">
                                <label for="nim">NIM</label>
                                <input type="text" id="nim" name="nim" class="form-control">
                            </div>
                            <div class="class form-group col-md-6">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control">
                            </div>
                            </div>
                            <div class="class form-group">
                                    <label for="tgllahir">Tanggal Lahir</label>
                                    <input type="date" id="tgllahir" name="tgllahir" class="form-control">
                            </div>
                            <div class="row">
                            <div class="class form-group col-md-6">
                                    <label for="kelas">Kelas</label>
                                <select id="kelas" name="kelas" class="form-control">
                                    <option value="P1">P1</option>
                                    <option value="P2">P2</option>
                                    <option value="M1">M1</option>                                            
                                </select>                
                                </div>                                             
                            <div class="class form-group col-md-6">
                                <label for="telepon">Telepon</label>
                                <input type="text" id="telepon" name="telepon" class="form-control">
                            </div>
                            </div>
                            <div class="class form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control">
                            </div>
                                                                                    
                            <div class="class form-group">
                                <label for="prodi">Program Studi</label>
                                <select id="prodi" name="prodi" class="form-control">
                                    <option value="ti">Teknik Informatika</option>
                                    <option value="si">Sistem Informasi</option>                                            
                                </select>                
                            </div>
                            
                            <div class="class form-group">
                                <label for="semester">Semester</label>
                                    <select id="semester" name="semester" class="form-control">
                                        <option value="1">I</option>
                                        <option value="2">II</option>
                                        <option value="3">III</option>
                                        <option value="4">IV</option>
                                        <option value="5">V</option>
                                        <option value="6">VI</option>
                                        <option value="7">VII</option>
                                        <option value="8">VIII</option>            
                                    </select>                
                            </div>
                            
                            <div class="class form-group" style="width:200px;">
                                    <label for="dpa">Dosen PA</label>
                                    <!-- <input type="text" id="dpa" name="dpa" class="form-control"> -->
                                    <select id="dpa" name="dpa" class="form-control">
                                    <?php
                                    $namadsn = $this->db->query("select nama from tbldosen");
                                    foreach($namadsn->result() as $row)
                                    {
                                        echo "<option value='".$row->nama."'>".$row->nama."</option>";
                                    }
                                    ?>
                                    </select>

                            </div>
                            </form>
                        </div>
                            <div class="modal-footer">
                                <button class="btn btn-success" id="simpan">
                                    <span class="glyphicon glyphicon-floppy-disk"></span>
                                    Simpan</button>
                                <button class="btn btn-danger" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove"></span>
                                    Batal</button>
                            </div>
                    
                </div>
            </div>
        </div>
        <div class="page-header">
           <h1><span class="glyphicon glyphicon-briefcase"></span> 
            Mahasiswa <small>Berisi Informasi Data Mahasiswa</small></h1>
        </div>
        <div>
            <!-- <div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group">                        
                                <div class="form-group">
                                        <label for="prodi">Program Studi</label>
                                        <select id="prodi" class="form-control">
                                        <option value="1">Teknik Informatika</option>
                                        <option value="2">Sistem Informasi</option>                                            
                                    </select>                
                                </div>
                        </div>  
                    </div>

                    <div class="col-md-1">
                            <div class="input-group">                        
                                    <div class="form-group">
                                            <label for="kelas">Kelas</label>
                                            <select id="kelas" class="form-control">
                                            <option value="1">P1</option>
                                            <option value="2">P2</option>
                                            <option value="1">M1</option>
                                            <option value="2">M2</option>                                            
                                        </select>                
                                    </div>
                            </div>      
                    </div>

                    <div class="col-md-1"> 
                        <div class="input-group">                        
                                <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <select id="semester" class="form-control">
                                        <option value="1">I</option>
                                        <option value="2">II</option>
                                        <option value="3">III</option>
                                        <option value="4">IV</option>
                                        <option value="5">V</option>
                                        <option value="6">VI</option>
                                        <option value="7">VII</option>
                                        <option value="8">VIII</option>            
                                    </select>               
                                </div>
                                <span class="input-group-btn" >
                                    <button class="btn btn-default" type="button" style="margin-top:25px; margin-left: 20px;">OK</button>
                                </span>
                        </div>
                    </div>    
                </div>
                
            </div> -->
            <button class="btn btn-default " id="reload"><span class="glyphicon glyphicon-refresh"></span> Reload</button>
            <button class="btn btn-success pull-right" id="tambah">
        <span class="glyphicon glyphicon-plus"></span> Tambah</button>
            <div class="clearfix"></div>    
        </div>
        <table  class="table table-bordered table-striped table-hover" style="margin-top:10px;">            
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>Alamat</th>
                    <th>Program Studi</th>                    
                    <th>Kelas</th>
                    <th>Sem</th>
                    <th>Telepon</th>
                    <th>Dosen PA</th>
                    <th colspan="2">Action</th>
                </tr>                
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script src="assets/js/myfunction.js"></script>
<script src="assets/js/app/mahasiswa.js"></script>
<?php $this->load->view('components/foot'); ?>