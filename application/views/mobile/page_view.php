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
    <div data-role="page" id="page-prodi">
        <div data-role="header" data-position="fixed">
            <h1>Home</h1>
            <a href="mobile/login/logout" 
                class="ui-btn-right">Logout</a>
        </div>
        <div role="main" class="ui-content">
            <ul data-role="listview" data-filter="true"
                id="list-prodi">
                <li id='ti'><a href="#page-mahasiswa">Teknik Informatika</a></li>
                <li id='si'><a href="#">Sistem Informasi</a></li>
            </ul>
        </div>
        <div data-role="footer" data-position="fixed"><h3>STMIK IBBI</h3></div>
    </div>
<!-- ============================================================================================= -->
    <div data-role="page" id="page-mahasiswa">
        <div data-role="header" data-position="fixed">
            <a href="" data-rel="back" data-direction="reverse">Back</a>
            <h1>List Mahasiswa</h1>
        </div>
        <div role="main" class="ui-content">
            <ul data-role="listview" data-filter="true"id="list-mahasiswa">
            <li><a href='#page-krsmhsdtl' data-transition='slide'>
                <h2>Andre</h2>
                <p>Belum Disetujui</p> 
                </a>
            </li>
            <li><a href='#page-krsmhsdtl' data-transition='slide'>
                <h2>Loli</h2>
                <p>Belum Disetujui</p> 
                </a>
            </li>
            </ul>
        </div>

        
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
        
        <form action="" style='margin-top:20px;'>
            <div>
                <label for="komentardpa">Komentar DPA</label>
                <textarea id="komentardpa" rows="2" name="komentardpa"></textarea>
            </div>
            
            <div class="ui-field-contain">
                <label for="pilihandpa">Terima KRS Mahasiswa?</label>
                <select name="pilihandpa" id="pilihandpa" data-role="flipswitch" data-mini="true">
                    <option value="tidak">Tidak</option>
                    <option value="ya">Ya</option>
                </select>
            </div>

            <button class="ui-btn ui-btn-inline">Submit</button>
            <button class="ui-btn ui-btn-inline">Cancel</button>
        </form>
        </div>
        <div data-role="footer" data-position="fixed"><h3>STMIK IBBI</h3></div>
    </div>

    
    

    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/myfunction.js"></script>
    <script src="assets/js/app/mobile.js"></script>
    <script src="assets/js/jquery.mobile-1.4.5.min.js"></script>
</body>
</html>