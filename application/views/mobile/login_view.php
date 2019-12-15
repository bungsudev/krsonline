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
<body>
    <div data-role="page">
        <div data-role="header"><h1>Form Login</h1></div>
        <div role="main" class="ui-content">
            <form action="mobile/login/ceklogin" 
                id="form-login" data-ajax="false"
                method="POST">
                <div class="ui-field-content">
                    <label for="iduser">ID User</label>
                    <input type="text" name="iduser" id="iduser">
                </div>
                <div class="ui-field-content">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <input type="submit" value="Login">
            </form>
        </div>
        <div data-role="footer"
            data-position="fixed"><h3>STMIK IBBI</h3></div>
    </div>

    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/jquery.mobile-1.4.5.min.js"></script>
</body>
</html>