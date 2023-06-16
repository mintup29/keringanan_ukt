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
        <a href="{{ route('dashboard-admin.index') }}" style="margin-top: 200%"><i class="fa fa-home"></i><p>Home</p></a>
        <a href="{{ route('admin-setting') }}"><i class="fa fa-gear"></i><p>Settings</p></a>
    </div>
</head>

<body style="background-color: #ebf2fc;">
    <div class="container col-lg-9" style="padding-top: 40px; padding-bottom: 20px;">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="filter">Filter:</label>
                <select class="form-control" id="status">
                    <option value="">All</option>
                    <option value="Need Action">Need Action</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                </select>
                </div>
            </div>
            <div class="col-md-6">
                <br><a href="{{ route('dashboard-admin.export') }}"><button class="btn btn-success float-right" title="expor rekap admin">Export</button></a>
            </div>
        </div>
    </div>

    <div class="container col-lg-9 shadow table-responsive" >
        <table class="table user_datatable">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Tahun</th>
                    <th>Semester</th>
                    <th>Skor</th>
                    <th>Status</th>
                    <th class="col-md-3">Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Data Keringanan Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <table class="table">
                        <tr>
                           <td>NIM</td>
                        </tr>
                        <tr>
                            <td>Tahun</td>                    
                        </tr>
                        <tr>
                            <td>Semester</td>                    
                        </tr>
                        <tr>
                            <td>LAIN LAIN</td>                    
                        </tr>
                    </table> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
</body>

<script type="text/javascript">
    $(function () {
        var table = $('.user_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('dashboard-admin.index') }}",
                data: function (d) {
                    d.status = $('#status').val()
                    d.search = $('input[type="search"]').val()
                }
            },
            columns: [
                {data: 'nim', name: 'nim'},
                {data: 'nama', name: 'nama'},
                {data: 'tahun', name: 'tahun'},
                {data: 'semester', name: 'semester'},
                {data: 'skor_total', name: 'skor_total'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            createdRow: function (row, data, index) {
                if (data['status'] == 'Need Action') {
                    $('td', row).eq(5).addClass('blue-box');
                } else if (data['status'] == 'Accepted') {
                    $('td', row).eq(5).addClass('green-box');
                } else if (data['status'] == 'Rejected') {
                    $('td', row).eq(5).addClass('red-box');
                } 
            },
        });
        $('#status').change(function(){
            table.draw();
        });
        // $('input[type="search"]').on('keyup', function () {
        //     table.search(this.value).draw();
        // });
    });
</script>

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