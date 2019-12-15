<?php $this->load->view('components/head'); ?>
<?php $this->load->view('components/navbar'); ?>
   
    <div class="container">
            <div class="page-header">
                    <h1><span class="glyphicon glyphicon-book"></span> 
                        Daftar KRS Mahasiswa<small> Selamat datang di Sistem Informasi KRS Online</small></h1>
            </div>

            <div class="form-inline" style="margin-left:20px; margin-bottom:20px;">
                <div class="form-group">
                    <label for="Podi">Prodi</label>
                    <select name="prodi" id="prodi" class="form-control">
                        <option value="ti">Teknik Informatika</option>
                        <option value="si">Sistem Informasi</option>                                            
                    </select>                
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" class="form-control">
                        <option value="P1">P1</option>
                        <option value="P2">P2</option>
                        <option value="M1">M1</option>
                        <option value="M2">M2</option>                                            
                    </select>   
                </div>
                <div class="form-group">
                <label for="semester">Semester</label>
                    <select name="semester" id="semester" class="form-control">
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
            <button id="filter" class="btn btn-primary">Filter</button>
        </div>
        <!-- modal LIHAT -->
            <div class="modal fade" tabindex="-1" role="dialog" id="form-lihatmb">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header"><b>Rincian KRS Mahasiswa</b></div>

                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <table style="margin-bottom:25px; font-style: italic; margin-top:25px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                        <?php 
                                        
                                        ?>
                                        <tr>
                                            <td width="125"><b>NIM</b> </td>
                                            <td width="17" align="center">:</td>
                                            <td width="130" id="nimtampil"><span ></span></td>
                                           
                                        </tr>
                                        <tr>
                                            <td width="125"><b>Nama</b> </td>
                                            <td width="17" align="center">:</td>
                                            <td width="130" id="namatampil"><span ></span></td>
                                        </tr>
                                        <tr>
                                            <td width="125"><b>Nama DPA</b> </td>
                                            <td width="17" align="center">:</td>
                                            <td width="130" id="dpatampil"><span ></span></td>
                                        </tr>
                                        
                                        </table>
                                        
                                    </div>
                                    <div class="col-md-6">
                                    <table style="margin-bottom:25px; font-style: italic; margin-top:25px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                        <tr>
                                            <td width="125"><b>SKS Maksimal</b> </td>
                                            <td width="17" align="center">:</td>
                                            <td width="130">21</td>
                                            </tr>
                                            <tr>
                                            <td><b>SKS Terpakai</b></td>
                                            <td align="center">:</td>
                                            <td id="skstotal"></td>
                                            </tr>
                                            <tr>
                                            <td><b>SKS Sisa</b></td>
                                            <td align="center">:</td>
                                            <td id="skssisa"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            
                                <span style="font-style:italic; font-size:10;">Mata kuliah pilihan Mahasiswa</span>
                                <table  class="table table-bordered table-striped table-hover" style="margin-top:10px; ">
                                    <thead>
                                            <tr >
                                                <th>No</th>
                                                <th>Kode MK</th>
                                                <th>Nama MK</th>
                                                <th>SKS</th>
                                                <th>Semester</th>
                                            </tr>                
                                        </thead>
                                        <tbody id="krsmhsdtl">
                                            <!-- <tr>
                                                <td>1</td>
                                                <td>MK107</td>
                                                <td>Kalkulus</td>
                                                <td>2</td>
                                                <td align="center">II</td>
                                            </tr> -->
                                        </tbody>
                                </table>  
                                <textarea name="komentardtl" id="komentardtl" cols="87" rows="3" disabled></textarea>                   
                    </div>
                        <!--Konten------------------------------------------------------------------->
                        <div class="modal-footer">
                            <button class="btn btn-warning" data-dismiss="modal">
                                <span class="glyphicon glyphicon-ok-sign"></span>
                                Kembali
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        
            
            <div class="clearfix"></div> 
            <table  class="table table-bordered table-striped table-hover" style="margin-top:10px; ">            
                <thead >
                    <tr>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Kelas</th>
                        <th>KRS Semester</th>
                        <th>Status KRS</th>
                        <th colspan="2">Action</th>
                    </tr>                
                </thead>
                <tbody id="krsmhs">
                    <!-- <tr>
                        <td>1</td>
                        <td>151312197</td>
                        <td>Anjasmara</td>
                        <td align="center">III</td>
                        <td ><span class="glyphicon glyphicon-ok-circle" style="color:rgb(224, 224, 33);"></span> Disetujui PA</td>
                        <td style="width:100px;">
                            <button class="btn btn-info btn-block" data-toggle="modal" data-target="#form-lihatmb">Lihat 
                                    <span class="glyphicon glyphicon-eye-open"></span>
                            </button>    
                        </td>
                        <td style="width:100px;">
                                <button class="btn btn-danger btn-block">Hapus
                                        <span class="glyphicon glyphicon-trash"></span>
                                </button>                            
                        </td>
                    </tr>
                    -->
                                                            
                </tbody>
            </table>
        </div>
<script src="assets/js/myfunction.js"></script>
<script src="assets/js/app/krsmhs.js"></script>
<?php $this->load->view('components/foot'); ?>
