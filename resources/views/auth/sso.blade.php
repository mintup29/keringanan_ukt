
<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <title>Single Sign On Universitas Sebelas Maret - Login</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
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
            .login-page {
                background-image: url("https://sso.uns.ac.id/module.php/uns/img/symphony.png");
                background-repeat: repeat;
            }

            .separator {
              display: flex;
              align-items: center;
              text-align: center;
            }

            .separator::before,
            .separator::after {
              content: '';
              flex: 1;
              border-bottom: 1px solid lightgrey;
            }

            .separator:not(:empty)::before {
              margin-right: .25em;
            }

            .separator:not(:empty)::after {
              margin-left: .25em;
            }


        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <img src="https://sso.uns.ac.id/module.php/uns/img/logo-uns.png" alt="Logo Universitas Sebelas Maret" width="50%" height="50%">
            </div>
            <div class="login-box-header ">
                                    Masukkan email dan password anda!
                            </div>
            <div class="login-box-body">
            @include('user.session_alert')
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="E-mail" name="email" id="email" tabindex="2"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Kata sandi" name="password" id="password"  tabindex="2"/>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-primary btn-user btn-block" tabindex="4">Masuk</button>
                        </div>
                    </div>
                </form>
                                <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                    <div class="col-xs-12">
                        <div class="separator">
                            atau
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <a href="{{route('register')}}"><button class="btn btn-danger btn-user btn-block" tabindex="4">Daftar</button></a>
                    </div>
                </div>
                <hr/>
            </div>
            <div class="login-footer">
                <p>
                    <a href="https://profil.uns.ac.id/site/lupaPassword">Lupa password?</a>
                    |
                    <a href="https://profil.uns.ac.id">Aktivasi akun</a>
                    |
                    <a href="https://sso.uns.ac.id/module.php/uns/faq.php">Bantuan</a>
                </p>

            </div>

            <!-- jQuery 3.4.1 -->
            <script src="https://sso.uns.ac.id/module.php/uns/js/jquery-3.4.1.min.js"></script>
            <!-- Bootstrap 3.3.2 JS -->
            <script src="https://sso.uns.ac.id/module.php/uns/js/bootstrap.min.js" type="text/javascript"></script>
            <!-- iCheck -->
            <script src="https://sso.uns.ac.id/module.php/uns/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
            <script>
                $(function() {
                    $('input').iCheck({checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue', increaseArea: '20%'});
                });
            </script>
        </body>

    </html>
