<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengajuan Keringanan UKT</title>

    <!-- <link href="/css/styles.css" rel="stylesheet" /> -->
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="/css/custom.css" rel="stylesheet" />
    <link href="/css/dashboard.css" rel="stylesheet" />
    <!-- <link rel='icon' type='image/png', href='assets/img/LOGO 1.png' /> -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <!-- start navbar -->
    <nav class="navbar fixed-top navbar-custom">
        <span onclick="toggleSidenav()"><i class="fa fa-bars"></i></span>
        <img class="rounded ml-auto" alt="profile picture" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" />
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="box-shadow: 0 0.1875rem 0.1875rem 0 rgba(0, 0, 0, 0.1) !important; text-transform: uppercase; letter-spacing: 0.15rem; ">
                {{ Auth::user()->name }}
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </nav>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ route('dashboard') }}" style="margin-top: 200%"><i class="fa fa-home"></i><p>Home</p></a>
        <a href="{{ route('dashboard-admin.index') }}"><i class="fa fa-book"></i><p>Pengajuan</p></a>
        <a href="{{ route('admin-setting') }}"><i class="fa fa-gear"></i><p>Settings</p></a>
    </div>
</head>

<body style="background-color: #ebf2fc;">
    <main id="main" class="main">
        <div class="pagetitle">
          <h1>Dashboard</h1>
        </div><!-- End Page Title -->
    
        <div class="col-md-4">
                    <p class="mb-1">Filter by Year</p>
                    <form action="{{ route('dashboard') }}" method="GET">
                        <div class="form-group">
                            <select name="year" class="form-control" onchange="this.form.submit()">
                                <option value="">All</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}" {{ Request::get('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
        </div>
        @include('user.session_alert')
        

        <section class="section dashboard">
          <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
              <div class="row">
                

                <!-- Jumlah Pengajuan Card -->
                
                <div class="col-xxl-4 col-xl-8">
                  <a href="{{ route('dashboard-admin.index') }}" style="text-decoration: none;">
                    
                    <div class="card info-card sales-card">
  
                      <div class="card-body">
                        <h5 class="card-title">Jumlah Pengajuan Mahasiswa</h5>
  
                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="fa fa-user-circle"></i>
                          </div>
                      
                          <div class="ps-3 col-md-4">
                            <h6>{{$dataCount}}</h6>
                            <span class="text-success small pt-1 fw-bold">{{$dataCount}}</span> <span class="text-muted small pt-2 ps-1 ">Pengajuan Mahasiswa</span>
  
                          </div>
                        </div>
  
                      </div>
                    </div>
                  </a>


                </div><!-- End Customers Card -->
                
                <!-- Status Menerima Pengajuan Card -->
                
                <div class="col-xxl-4 col-xl-4">
                  <a href="" data-toggle="modal" data-target="#history" style="text-decoration: none;">
                    
                    <div class="card info-card sales-card">
  
                      <div class="card-body">
                        <h5 class="card-title">Status</h5>
  
                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          @if($open == "Closed")
                            <i class="fa fa-times-circle"></i>
                          </div>
                          <div class="ps-3 col-md-10">
                            Tidak Menerima Pengajuan <br>
                            <span class="text-muted small pt-2 ps-1 ">History Pengajuan</span>
                          </div>
                          @else
                            <i class="fa fa-check-circle"></i>
                          </div>
                          <div class="ps-3 col-md-10">
                            Menerima Pengajuan<br>
                            <span class="text-muted small pt-2 ps-1 ">History Pengajuan</span>
                          </div>
                          @endif
                        </div>
  
                      </div>
                    </div>
                  </a>


                </div><!-- End Customers Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-4">
                  <div class="card info-card sales-card">

                    <div class="card-body">
                      <h5 class="card-title">Need Action <span>| Status</span></h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fa fa-eye"></i>
                        </div>
                        <div class="ps-3 col-md-10">
                          <h6>{{$dataNA}}</h6>
                          <span class="text-success small pt-1 fw-bold">{{$dataCount}}</span> <span class="text-muted small pt-2 ps-1 ">Pengajuan Mahasiswa</span>

                        </div>
                      </div>
                    </div>

                  </div>
                </div><!-- End Revenue Card -->

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                  <div class="card info-card revenue-card">

                    <div class="card-body">
                      <h5 class="card-title">Accepted <span>| Status</span></h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fa fa-check"></i>
                        </div>
                        <div class="ps-3 col-md-10">
                          <h6>{{$dataAccepted}}</h6>
                          <span class="text-success small pt-1 fw-bold">{{$dataCount}}</span> <span class="text-muted small pt-2 ps-1">Pengajuan Mahasiswa</span>

                        </div>
                      </div>
                    </div>

                  </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-4">
                  <div class="card info-card customers-card">

                    <div class="card-body">
                      <h5 class="card-title">Rejected <span>| Status</span></h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fa fa-close"></i>
                        </div>
                        
                        <div class="ps-3 col-md-10">
                          <h6>{{$dataRejected}}</h6>
                          <span class="text-success small pt-1 fw-bold">{{$dataCount}}</span> <span class="text-muted small pt-2 ps-1 ">Pengajuan Mahasiswa</span>

                        </div>
                      </div>
                    </div>

                  </div>
                </div><!-- End Revenue Card -->

                
              
            </div><!-- End Left side columns -->



          </div>
        </section>

      </main><!-- End #main -->

<!-- Modal ubah tanggal pengajuan-->
  <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">History Pengajuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('add-history')}}" method="POST">
          @csrf
          <div class="form-row">
          <div class="form-group col-md-5">
            <input type="number" name="year" class="form-control" placeholder="Tahun">
          </div>
          <div class="form-group col-md-5">
            <select name="semester" class="form-control">
              <option value="Genap">Genap</option>
              <option value="Ganjil">Ganjil</option>
            </select>
          </div>
          <div class="form-group col-md-5">
            <label for="accept_since">Mulai</label>
            <input type="date" name="accept_since" class="form-control">
          </div>
          <div class="form-group col-md-5">
            <label for="accept_until">Hingga</label>
            <input type="date" name="accept_until" class="form-control">
          </div>
          <div class="form-group col-md-2">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
          </div>
          </div>
        </form>
        
          <table class="table" style="margin-top: 5px">
            <tr>
              <th>Periode</th>
              <th>tanggal</th>
            </tr>
            @foreach($history as $row)
            <tr>
              <td>{{$row->year}} {{$row->semester}}</td>
              <td>{{$row->accept_since}} - {{$row->accept_until}}</td>
            </tr>
            @endforeach
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

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
