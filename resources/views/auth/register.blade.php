<html>
<head>
    <link href="https://sso.uns.ac.id/module.php/uns/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://sso.uns.ac.id/module.php/uns/css/font-awesome.min.css" type="text/css"/>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://sso.uns.ac.id/module.php/uns/css/ionicons.min.css" type="text/css"/>
    <!-- Theme style -->
    <link href="https://sso.uns.ac.id/module.php/uns/css/AdminLTE.css" rel="stylesheet" type="text/css"/>
    <link href="https://sso.uns.ac.id/module.php/uns/css/skins/skin-blue.css" rel="stylesheet" type="text/css"/>
    <!-- iCheck -->
    <link href="https://sso.uns.ac.id/module.php/uns/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="https://sso.uns.ac.id/module.php/uns/css/custom-login.css" type="text/css" media="screen" charset="utf-8">
    <style>
    .register-page {
                background-image: url("https://sso.uns.ac.id/module.php/uns/img/symphony.png");
                background-repeat: repeat;
            }
    </style>
</head>
<body class="register-page">
    <div class="register-box" style=" margin: 2% auto;">
        <div class="login-box-header">
            Masukkan data diri anda!
        </div>
        <div class="register-box-body" style="height:540px;">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Angkatan</label>
                    <input type="number" name="angkatan" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-primary btn-user btn-block" tabindex="4">Daftar</button>
                </div>
            </form>
            <div>
                <a href="{{route('login')}}"><button class="btn btn-danger btn-user btn-block" tabindex="4">Login</button></a>
            </div>
        </div>
    </div>
</body>
</html>