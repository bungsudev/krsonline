<?php
$this->load->view("components/head");
$this->load->view("components/navbar");
?>
<div class="container">
    <div class="page-header">
        <h1><span class="glyphicon glyphicon-user"></span> 
            Form Profil <small>Menampilkan profil mahasiswa </small></h1> 
    </div>
    <div class="row">
        <div class="col-md-6">
            <img src="assets/img/<?=$this->session->userdata("userid")?>.png" 
                class="img-circle img-thumbnail">
        </div>
        <div class="col-md-6">
            <?php
            $message = $this->session->flashdata('error-message');
            if($message){
                echo "<div class='alert alert-success alert-dismissible'>
                            <button type='button' class='close' 
                                data-dismiss='alert'>
                                <span>&times;</span>
                            </button>".$message."</div>";
            }
            ?>
            <form action="profil/simpan" method="POST" enctype="multipart/form-data">
                <div class="form-group <?= form_error("userid")?"has-error":"" ?>">
                    <label for="userid">User ID</label>
                    <input type="text" class="form-control"
                        id="userid" readonly name="userid"
                        value="<?= isset($profil)?$profil->userid:set_value("userid") ?>">
                </div>
                <div class="form-group <?= form_error("nama")?"has-error":"" ?>">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control"
                        id="nama" name="nama"
                        value="<?= isset($profil)?$profil->nama:set_value("nama") ?>">
                    <?= form_error("nama") ?>
                </div>
                <div class="form-group <?= form_error("alamat")?"has-error":"" ?>">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="5"
                        class="form-control"><?= isset($profil)?$profil->alamat:set_value("alamat") ?>
                    </textarea>
                </div>
                <div class="form-group <?= form_error("telepon")?"has-error":"" ?>">
                    <label for="telepon">Telepon</label>
                    <input type="text" class="form-control"
                        id="telepon" name="telepon"
                        value="<?= isset($profil)?$profil->telepon:set_value("telepon") ?>">
                    <?= form_error("telepon") ?>
                </div>
                <div class="form-group <?= form_error("email")?"has-error":"" ?>">
                    <label for="email">Email</label>
                    <input type="text" class="form-control"
                        id="email" name="email"
                        value="<?= isset($profil)?$profil->email:set_value("email") ?>">
                    <?= form_error("email") ?>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input class="form-control" type="file" name="gambar" id="gambar" accept="image/x-png">
                </div>
                <input type="submit" class="btn btn-success" value="Simpan">
            </form>
        </div>
    </div>
</div>
<?php
$this->load->view("components/foot");
?>