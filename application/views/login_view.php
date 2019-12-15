<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KRS Online | Sistem Informasi KRS Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url ("assets/css/bootstrap.min.css")?>">
    <script src="<?= base_url("assets/js/jquery.min.js")?>"></script>
    <script src="<?= base_url("assets/js/bootstrap.min.js")?>"></script>
    <style>
        .baner{
            width:300px;
            background-color:rgb(253, 253, 253);
            padding: 10px;
            padding-bottom: 0px;
            margin-top: 10px;
            -moz-box-shadow: 0 0 2em rgb(63, 59, 59);
            -webkit-box-shadow: 0 0 2em rgb(0, 0, 0);
            box-shadow: 0 0 3px rgb(15, 124, 24);
            border-radius: 20px 0px 0px 20px;
 }
    </style>
    </head>
<body>
    <nav class="navbar navbar-default" style="margin-bottom:5px;">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="beranda">AKADEMIK</a>
          </div>
        </div>
    </nav>

    <div>
            <div style="width:100%; background-color: mediumseagreen; padding: 10px;">
                <h1 style="font-size:40px;">Sistem Informasi KRS Online</h1>
                <p>
                    Selamat datang kedalam sistem Informasi KRS Online 
                </p>          
            </div>
    </div>
    <div class="container" style="margin-top: 25px; margin-bottom: 50;">  
    <div class="row">      
        <div class="col-md-4 baner">        
        <?php
            if($this->session->flashdata()){
                echo "<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' 
                            data-dismiss='alert'><span>&times;</span>
                        </button>
                        ".$this->session->flashdata("error-login")."
                    </div>";
            }
            ?>    
            <form class="form-horizontal"  form action="login/ceklogin" method="POST">
            <?php $has_error = validation_errors()?"has-error":""; ?>
                    <div class="form-group" <?= $has_error; ?>>
                    
                    
                      <label class="col-sm-3 control-label">UserID</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="userid" name="userid" placeholder="Nim">
                        <?= form_error("userid"); ?>
                      </div>
                    </div>
                    <div class="form-group" <?= $has_error; ?>>
                      <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <?= form_error("password"); ?>
                      </div>
                    </div>
    
                    <div class="row">
                        <div class="form-group col-sm-9">
                            <div class="col-sm-offset-12">
                                <button type="submit" class="btn btn-default">Sign in</button>
                            </div>
                        </div>
                    </div>
                  </form>
        </div>
        <div class="col-md-8">
            <img src="assets/img/Stmik IBBi.jpg" alt="STMIK IBBI" style="margin-left:25px; border-radius: 25px 25px 15px 15px;">
        </div>
    </div>
    </div>
    <div style="width:100%; height: 15px; background-color: mediumseagreen;"></div>
    
</body>
</html>