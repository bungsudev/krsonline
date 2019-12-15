<?php 
$this->load->view("components/head");
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form action="<?= $action ?>" method="GET">
				<div class="panel panel-info" style="margin:10px;">
					<div class="panel-heading">Dialog KRS Mahasiswa</div>
					<div class="panel-body">
                        <div class="form-group">
                                    <label for="prodi">Program Studi</label>
                                        <select id="prodi" name="prodi" class="form-control">
                                        <option value="ti">Teknik Informatika</option>
                                        <option value="si">Sistem Informasi</option>                                            
                                    </select>
                        </div>
                        <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                            <select id="kelas" name="kelas" class="form-control">
                                            <option value="P1">P1</option>
                                            <option value="P2">P2</option>
                                            <option value="M1">M1</option>
                                            <option value="M2">M2</option>                                            
                                        </select>
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
					</div>
					<div class="panel-footer">
                        <input type="submit" value="Submit" class="btn btn-success">
                    </div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
$this->load->view("components/foot"); 
?>
