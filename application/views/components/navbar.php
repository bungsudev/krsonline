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
        
    

            <div class="collapse navbar-collapse" id="navbar-menu">

                <ul class="nav navbar-nav">
                    <li class="dropdown">
                    <a href="#" class="dropdown-toogle" data-toggle="dropdown" role="button">
                            <span class="glyphicon glyphicon-hdd"></span>
                        INFORMASI<span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <li><a href="mahasiswa">Mahasiswa</a></li>
                            <li><a href="dosen">Dosen</a></li>
                            <li><a href="matakuliah">Mata Kuliah</a></li>
                            <li class="divider"></li>
                            <li><a href="user">User</a></li>
                        </ul>   
                       
                        <li class="dropdown">                                
                                <a href="krsmhs" class="" role="button">
                                    <span class="glyphicon glyphicon-tasks"></span>
                                        Kartu Rancangan Studi (KRS)</a>                              
                        </li>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" 
                    data-toggle="dropdown" role="button">
                    <span class="glyphicon glyphicon-print"></span> 
                    Laporan <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="laporan/mahasiswa" target="_blank">Lap.Mahasiswa</a></li>
                        <li><a href="laporan/dosen" target="_blank">Lap.Dosen</a></li>
                        <li><a href="laporan/matakuliah" target="_blank">Lap.Matakuliah</a></li>
                        <li><a href="laporan/user" target="_blank">Lap.User</a></li>
                        <li class="divider"></li>
                        <li><a href="laporan/krsonline"target="_blank">Lap.KRS Mahasiswa</a></li>
                        <li><a href="laporan/krsmhsdtl"target="_blank">Lap.KRS Mahasiswa Detail</a></li>
                        <li><a href="laporan/krsmhsdosen"target="_blank">Lap.DPA KRS Mahasiswa</a></li>
                        <li><a href="laporan/krsmhskelas"target="_blank">Lap.Kelas KRS Mahasiswa</a></li>
                    </ul>
                </li>
                </ul>

                <ul class="nav navbar-nav navbar navbar-right">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toogle" data-toggle="dropdown" role="button">
                                <span class="glyphicon glyphicon-user"></span>
                            <?= $this->session->userdata("nama"); ?> <span class="caret"></span></a>
                            
                            <ul class="dropdown-menu">
                                <li><a href="profil">Profile</a></li>
                                <li><a href="user/gantipass">Rubah Password</a></li>
                                <li class="divider"></li>
                                <li><a href="logout">Logout</a></li>
                            </ul>
                        </li>
                </ul>
                            
            </div>
        </div>
    </nav>