<?php $this->load->view('components/head'); ?>
<?php $this->load->view('components/navbar'); ?>
    

    <div class="container">
        <div class="modal fade" tabindex="-1" role="dialog" id="form-dosen">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header"><h3>Form <span id="mode"></span> Dosen</h3></div>
                    <!--body---------------------------------------------------------------->
                    <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="iddosen">ID Dosen</label>
                            <input type="text" id="iddosen" name="iddosen" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control">
                        </div>                         
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" id="telepon" name="telepon" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    </form>
                    <!--Footer------------------------------------------------------------------->
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
            Dosen <small>Berisi Informasi Data Dosen</small></h1>
        </div>
        
        <button class="btn btn-default" id="reload">
        <span class="glyphicon glyphicon-refresh"></span> Reload
        </button>
        <button class="btn btn-success pull-right" id="tambah">
        <span class="glyphicon glyphicon-plus"></span> Tambah</button>          
        <div class="clearfix"></div>    

        <table  class="table table-bordered table-striped table-hover" style="margin-top:10px;">            
            <thead>
                <tr>
                    <th>ID Dosen</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th colspan="2">Action</th>
                </tr>                
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <script src="assets/js/app/dosen.js"></script>
<?php $this->load->view('components/foot'); ?>
