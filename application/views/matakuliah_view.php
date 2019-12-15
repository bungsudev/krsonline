<?php $this->load->view('components/head'); ?>
<?php $this->load->view('components/navbar'); ?>
        

    <div class="container">
        <div class="modal fade" tabindex="-1" role="dialog" id="form-matakuliah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h3>Form <span id="mode"></span> Mata Kuliah</h3></div>
                    <!--body---------------------------------------------------------------->
                    <div class="modal-body">
                        <form action="">
                        <div class="form-group">
                            <label for="idmatakuliah">ID MK</label>
                            <input type="text" id="idmatakuliah" name="idmatakuliah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="namamk">Nama MK</label>
                            <input type="text" id="namamk" name="namamk" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="sks">SKS</label>
                                <input type="text" id="sks" name="sks" class="form-control">
                            </div>
                        <div class="form-group">
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
                        </form>               
                    </div>
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
            Mata Kuliah <small>Berisi Informasi Mata Kuliah</small></h1>
        </div>
        <!-- <div>
            <div>
                <div class="col-md-3">
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
                                <button class="btn btn-default" type="button" style="margin-top:25px; margin-left: 20px;">Ok</button>
                            </span>
                    </div>
                </div>
            </div> -->
        <button class="btn btn-default" id="reload">
            <span class="glyphicon glyphicon-refresh"></span> Reload
        </button>
        <button class="btn btn-success pull-right" id="tambah">
        <span class="glyphicon glyphicon-plus"></span> Tambah</button>   
        <div class="clearfix"></div>    

        <table  class="table table-bordered table-striped table-hover" style="margin-top:10px; ">            
            <thead>
                <tr>
                    <th>ID MK</th>
                    <th>namamk MK</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th colspan="2">Action</th>
                </tr>                
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <script src="assets/js/myfunction.js"></script>
    <script src="assets/js/app/matakuliah.js"></script>
<?php $this->load->view('components/foot'); ?>
