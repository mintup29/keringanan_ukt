<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengajuan Keringanan UKT</title>

    <link href="/css/styles.css" rel="stylesheet" />
    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/custom.css" rel="stylesheet" />
    <!-- start navbar -->
    <nav class="navbar fixed-top navbar-custom">
        <span onclick="toggleSidenav()"><i class="fa fa-bars"></i></span>
        <img class="rounded ml-auto" alt="profile picture" src="https://pkptki.lppm.uns.ac.id/wp-content/uploads/sites/12/2022/04/Haryono-Setiadi-ST.-M.Eng_-234x300.jpg" />
        <a>Haryono</a>
    </nav>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#" style="margin-top: 200%"><i class="fa fa-home"></i><p>Home</p></a>
        <a href="#"><i class="fa fa-gear"></i><p>Settings</p></a>
    </div>
    <!-- end navbar -->
</head>

<body>
    @yield('content2')
</body>

<script type="text/javascript" src="/js/bootstrap.js"></script>
<script>
function toggleSidenav(){
    var x = document.getElementById("mySidenav");
    if(x.style.width === "0px"){
        x.style.width = "100px";
    }else{
        x.style.width = "0px";
    }
}
</script>
</html>