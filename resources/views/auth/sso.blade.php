
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
                                    Masukkan email dan password anda
                            </div>
            <div class="login-box-body">
                                <form action="?" method="post" name="f">
                                            <input type="hidden" name="AuthState" value="_181f9ab5d57f7e0188926e83d1c880e04e72cd9139:https://sso.uns.ac.id/saml2/idp/SSOService.php?spentityid=https%3A%2F%2Focw.uns.ac.id&amp;RelayState=https%3A%2F%2Focw.uns.ac.id%2Fsaml%2Flogin&amp;cookieTime=1685084909"/>
                                        <div class="form-group has-feedback ">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Email UNS"
                            name="username"
                                                        autofocus                            tabindex="1"
                            data-toggle="tooltip"
                            title="Username atau alamat email UNS Anda"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback ">
                        <input type="password" class="form-control" placeholder="Kata sandi" name="password"  tabindex="2"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label data-toggle="tooltip" title="Jika anda mencentang ini, maka akun anda akan aktif selama 7 hari">
                                    <input type="checkbox" name="remember_me" tabindex="3">
                                    Ingat saya
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn btn-primary btn-block btn-flat" tabindex="4"><a href="/pengajuan" style="color:white;">Masuk</a></button>
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
                    <div class="col-xs-12">
                        <a href="https://sso.uns.ac.id/module.php/uns/oauth2/google.php" class="btn btn-danger btn-block" style="font-size: 15px;">
                            <i class="fa fa-google"></i>
                            &nbsp;
                            Login Mahasiswa MBKM dengan Google
                        </a>
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
