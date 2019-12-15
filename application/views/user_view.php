<?php 
$this->load->view("components/head");
$this->load->view("components/navbar"); 
?>
<div class="container">    
    <div class="modal fade" tabindex="-1" role="dialog" id="form-user">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header"><h3>Form <span id="mode"></span> User</h3></div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="userid">User ID</label>
                            <input type="text" class="form-control" name="userid"
                                id="userid">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama"
                                id="nama">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" rows="5" name="alamat"
                                class="form-control"></textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control" name="telepon"
                                    id="telepon">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email"
                                    id="email">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="status">Status</label>
                                <select id="status" class="form-control" name="status">
                                    <option value="AKD">Akademik</option>
                                    <option value="DOS">Dosen</option>
                                    <option value="MHS">Mahasiswa</option>
                                </select>
                            </div>    
                        </div>
                    </form>                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="simpan">
                    <span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
                    <button class="btn btn-danger" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> Batal</button>
                </div>
            </div>
        </div>
    </div>

    <div class="page-header">
        <h1><span class="glyphicon glyphicon-user"></span> 
            User <small>Berisi Informasi Profil User</small></h1> 
    </div>

    <button class="btn btn-default" id="reload">
        <span class="glyphicon glyphicon-refresh"></span> Reload
    </button>
    <button class="btn btn-success pull-right" id="tambah">
        <span class="glyphicon glyphicon-plus"></span> Tambah</button>
    <div class="clearfix"></div>
    <table class="table table-bordered table-striped table-hover"
        style="margin-top:10px;">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>            
        </tbody>
    </table>
</div>
<script src="assets/js/myfunction.js"></script>
<script src="assets/js/app/user.js"></script>
<?php 
$this->load->view("components/foot"); 
?>