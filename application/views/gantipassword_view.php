<html lang="en">
<head>
    <base href="<?= base_url(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KRS Online | Sistem Informasi KRS Mahasiswa</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    $this->load->view("components/navbar");
?>
<div class="container">
    <div class="page-header">
        <h1>Form Rubah Password 
            <small>form untuk rubah password</small></h1>
    </div>

    <form action="user/ganti" method="POST">
        <input type="hidden" name="userid" value='<?= $this->session->userdata("userid"); ?>'>
        <div class="form-group
            <?= form_error("password-lama")?"has-error":"" ?>">
            <label for="password-lama">Password Lama</label>
            <input type="password" id="password-lama" class="form-control" name="password-lama"
                value='<?= set_value("password-lama"); ?>'>
            <?= form_error("password-lama"); ?>
        </div>
        <div class="form-group
            <?= form_error("password-baru")?"has-error":"" ?>">
            <label for="password-baru">Password Baru</label>
            <input type="password" id="password-baru" class="form-control" name="password-baru"
                value='<?= set_value("password-baru"); ?>'>
            <?= form_error("password-baru"); ?>
        </div>
        <div class="form-group
            <?= form_error("konfirm")?"has-error":"" ?>">
            <label for="konfirm">Konfirm Password Baru</label>
            <input type="password" id="konfirm" class="form-control" name="konfirm"
                value='<?= set_value("konfirm"); ?>'>
            <?= form_error("konfirm"); ?>
        </div>
        <button class="btn btn-success"> 
            <span class="glyphicon glyphicon-floppy-disk"></span>
            Simpan
        </button>
        <a href="dosen" class="btn btn-danger">
            <span class="glyphicon glyphicon-remove"></span>
            Batal 
        </a>
    </form>
</div>
<?php
    $this->load->view("components/foot");
?>