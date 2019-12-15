<?php 
$this->load->view("components/head");
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form action="<?= $action ?>" method="GET">
				<div class="panel panel-info" style="margin:10px;">
					<div class="panel-heading">Dialog Mahasiswa</div>
					<div class="panel-body">
                        <div class="form-group">
                        <label for="nim">NIM</label>
                        <select name="nim" id="nim" class="form-control">
                        <?php
                        foreach($mahasiswa as $item):
                            echo "<option value='{$item->nim}'>{$item->nim}-{$item->nama}</option>";
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
