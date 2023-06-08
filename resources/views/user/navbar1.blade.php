    <link href="/css/styles.css" rel="stylesheet" />
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/custom.css" rel="stylesheet" />
    <!-- start navbar -->
    <nav class="navbar fixed-top navbar-custom">
        <img class="rounded ml-auto" alt="profile picture" src="https://pkptki.lppm.uns.ac.id/wp-content/uploads/sites/12/2022/04/Haryono-Setiadi-ST.-M.Eng_-234x300.jpg" />
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                {{ Auth::user()->name }}
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- add this at the footer -->
    <!-- <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->