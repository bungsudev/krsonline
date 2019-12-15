<?php 
$this->load->view("components/head");
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form action="<?= $action ?>" method="GET">
				<div class="panel panel-info" style="margin:10px;">
					<div class="panel-heading">Dialog KRS Mahasiswa Detail</div>
					<div class="panel-body">
                        <div class="form-group">
                        <label for="nama">NIM</label>
                        <select name="nama" id="nama" class="form-control">
                        <?php
                        foreach($dosen as $item):
                            echo "<option value='{$item->nama}'>{$item->iddosen}-{$item->nama}</option>";
                        endforeach;
                        ?>
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
