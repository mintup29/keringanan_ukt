<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengajuan Keringanan UKT</title>

    <!-- <link href="/css/styles.css" rel="stylesheet" /> -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/custom.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        </div>
    </div>

    <div class="container col-lg-9 shadow table-responsive" >
        <table class="table user_datatable">
            <thead>
                <tr>
                    <th>Tanggal Pengajuan</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
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
                    <table class="table">
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
                    </table>
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
                url: "{{ route('pengajuan.index') }}",
                data: function (d) {
                    d.status = $('#status').val()
                    d.search = $('input[type="search"]').val()
                }
            },
            columns: [
                {data: 'tgl_pengajuan', name: 'tgl_pengajuan'},
                {data: 'nim', name: 'nim'},
                {data: 'nama_mahasiswa', name: 'nama_mahasiswa'},
                {data: 'skor', name: 'skor'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            createdRow: function (row, data, index) {
                if (data['status'] == 'Need Action') {
                    $('td', row).eq(4).addClass('blue-box');
                } else if (data['status'] == 'Accepted') {
                    $('td', row).eq(4).addClass('green-box');
                } else if (data['status'] == 'Rejected') {
                    $('td', row).eq(4).addClass('red-box');
                } 
            },
        });
        $('#status').change(function(){
            table.draw();
        });
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