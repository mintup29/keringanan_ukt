@extends('template.template_2')
@section('content')

<body>
    <div class="container col-lg-9" style="padding-top: 40px; padding-bottom: 20px;">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="filter">Filter:</label>
                <select class="form-control" id="filter">
                    <option value="">All</option>
                    <option value="option1">Need Action</option>
                    <option value="option2">Accepted</option>
                    <option value="option3">Rejected</option>
                </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="search">Search:</label>
                <input type="text" class="form-control" id="search" placeholder="NIM/Nama">
                </div>
            </div>
        </div>
    </div>
    <div class="container col-lg-9 shadow table-responsive" >
        <table class="table">
            <tr>
                <th>Tanggal Pengajuan</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Skor</th>
                <th>Status</th>
                <th class="col-md-3">Aksi</th>
            </tr>
            <tr>
                <td>20 Februari 2020</td>
                <td>M0520009</td>
                <td>Lorem ipsum dolor</td>
                <td>60</td>
                <td>
                    <div class="blue-box">
                        Need Action
                    </div>
                </td>
                <td>
                    <button class="btn btn-success col-md-3">
                         <i class="fa fa-check"></i>
                    </button>
                    <button class="btn btn-danger col-md-3">
                        <i class="fa fa-close"></i>
                    </button>
                    <button class="btn btn-info col-md-3" data-toggle="modal" data-target="#detailModal">
                        <i class="fa fa-eye"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td>20 Februari 2020</td>
                <td>M0520009</td>
                <td>Lorem ipsum dolor</td>
                <td>60</td>
                <td>
                    <div class="blue-box">
                        Need Action
                    </div>
                </td>
                <td>
                    <button class="btn btn-success col-md-3">
                         <i class="fa fa-check"></i>
                    </button>
                    <button class="btn btn-danger col-md-3">
                        <i class="fa fa-close"></i>
                    </button>
                    <button class="btn btn-info col-md-3">
                        <i class="fa fa-eye"></i>
                    </button>
                </td>
            </tr>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>