<html lang="en">
<head>
    <base href="<?= base_url() ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AbsensiApp Mobile</title>
    <link rel="stylesheet" 
        href="assets/css/absensi-theme.min.css">
    <link rel="stylesheet" 
        href="assets/css/jquery.mobile.icons.min.css">
    <link rel="stylesheet" 
        href="assets/css/jquery.mobile.structure-1.4.5.min.css">
</head>
<body  style='margin-top:20px; font-family:Times New Rowman;'>
    
<div data-role="page" id="page-akademik">
        <div data-role="header" data-position="fixed">
            <h1>Akademik</h1>
            <a href="mobile/login/logout" 
                class="ui-btn-right">Logout</a>
        </div>
        <div role="main" class="ui-content">
        
        <ul data-role="listview" id="list-mahasiswa">
            <table style="font-size:14px; margin-bottom:15px; margin-left:10px;">
            <tr>
                <td>Nim</td>
                <td>:</td>
                <td>1513121497</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>Al azmi</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>P-1</td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td>:</td>
                <td>Teknik Informatika</td>
            </tr>
            </table>
                    <li><a href='#page-krs' data-transition='slide'>
                        <h2>KRS Mahsiswa</h2>
                        </a>
                    </li>
                </ul>
        </div>
        <div data-role="footer" data-position="fixed"><h3>STMIK IBBI</h3></div>
    </div>
    <!-- ======================================================================================== -->
    <div data-role="page" id="page-krs">
        <div data-role="header" data-position="fixed">
            <a href="" data-rel="back" data-direction="reverse">Back</a>
            <h1>List Mahasiswa</h1>
        </div>
        <div role="main" class="ui-content">
            <ul data-role="listview" id="list-prodi" style='margin-top:10px;'>
            <h3>Pilih Menu</h3>
                <li id='ti'><a href="#page-lihatkrs">Lihat KRS</a></li>
                <li id='si'><a href="#page-isikrs">Isi KRS</a></li>
            </ul>
        </div>
        <div data-role="footer" data-position="fixed"><h3>STMIK IBBI</h3></div>
    </div>

<!-- ======================================================================================== -->
<div data-role="page" id="page-lihatkrs">
        <div data-role="header" data-position="fixed">
            <a href="" data-rel="back" data-direction="reverse">Back</a>
            <h1>List Mahasiswa</h1>
        </div>
        <form>
        <div class="ui-field-contain">
            <label for="select-native-1">Pilih Semester:</label>
            <select name="select-native-1" id="select-native-1" data-mini="true">
                <option value="1"> I</a> </option>
                <option value="2">II</option>
                <option value="3">III</option>
                <option value="4">IV</option>
                <option value="5">V</option>
                <option value="6">VI</option>
                <option value="7">VII</option>
                <option value="8">VIII</option>
            </select>
        </div>
	
        <a href="#page-krsmhsdtl" class="ui-btn">Submit</a>
        </form>
        <div data-role="footer" data-position="fixed"><h3>STMIK IBBI</h3></div>
    </div>
<!-- ========================================================================================== -->
    <div data-role="page" id="page-krsmhsdtl">
        <div data-role="header" data-position="fixed">
            <a href="" data-rel="back" data-direction="reverse">Back</a>
            <h1>KRS Mahasiswa </h1>
        </div>
        <div role="main" class="ui-content">
            <!-- <ul data-role="listview" id="list-mahasiswa">
                <li>Nama  : Alazmi</li>
                <li>Nim   : 1513121497</li>
                <li>Kelas : P-1</li>
                <li>Prodi : Teknik Informatika</li>
            </ul> -->
            
            <table style="font-size:12px; margin-bottom:15px;">
            <tr>
                <td>Nim</td>
                <td>:</td>
                <td>1513121497</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>Al azmi</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>P-1</td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td>:</td>
                <td>Teknik Informatika</td>
            </tr>
            </table>
            <span style="font-style:italic; font-size:10;">Mata kuliah pilihan Mahasiswa</span>
            <table border="1" style="margin-top:10px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th width="200px">Nama MK</th>
                        <th>SKS</th>                                                
                    </tr>                
                </thead>
                <tbody id="krsmhsdtl">
                    <tr>
                        <td align="center">1</td>
                        <td>Kalkulus</td>
                        <td align="center">2</td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td>Projek</td>
                        <td align="center">3</td>
                    </tr>
                    <tr>
                        <td align="center">3</td>
                        <td>Design</td>
                        <td align="center">1</td>
                    </tr>
                </tbody>
            </table> 
        </div>
        <div data-role="footer" data-position="fixed"><h3>STMIK IBBI</h3></div>
    </div>

    <!-- ========================================================================================== -->
    <div data-role="page" id="page-isikrs">
        <div data-role="header" data-position="fixed">
            <a href="" data-rel="back" data-direction="reverse">Back</a>
            <h1>KRS Mahasiswa </h1>
        </div>
        <div role="main" class="ui-content">
            <!-- <ul data-role="listview" id="list-mahasiswa">
                <li>Nama  : Alazmi</li>
                <li>Nim   : 1513121497</li>
                <li>Kelas : P-1</li>
                <li>Prodi : Teknik Informatika</li>
            </ul> -->
            
            <table style="font-size:12px; margin-bottom:15px;">
            <tr>
                <td>Nim</td>
                <td>:</td>
                <td>1513121497</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>Al azmi</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>P-1</td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td>:</td>
                <td>Teknik Informatika</td>
            </tr>
            </table>
            <span style="font-style:italic; font-size:10;">Daftar Matakuliah</span>

        <form>
            <fieldset data-role="controlgroup">
                <legend>Pilih Matakuliah:</legend>
                <input name="checkbox-v-2a" id="checkbox-v-2a" type="checkbox">
                <label for="checkbox-v-2a">Projek</label>
                <input name="checkbox-v-2b" id="checkbox-v-2b" type="checkbox">
                <label for="checkbox-v-2b">Design Grafis</label>
                <input name="checkbox-v-2c" id="checkbox-v-2c" type="checkbox">
                <label for="checkbox-v-2c">Matematika Diskrit</label>

                <input name="1" id="1" type="checkbox">
                <label for="1">VB 1</label>
                <input name="2" id="2" type="checkbox">
                <label for="2">Analisa & Perancangan</label>
                
            </fieldset>
            <button class="ui-btn ui-btn-inline">Submit</button>
            <button class="ui-btn ui-btn-inline">Cancel</button>
        </form> 
        </div>
        <div data-role="footer" data-position="fixed"><h3>STMIK IBBI</h3></div>
    </div>


    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/myfunction.js"></script>
    <script src="assets/js/app/mobilemhs.js"></script>
    <script src="assets/js/jquery.mobile-1.4.5.min.js"></script>
</body>
</html>