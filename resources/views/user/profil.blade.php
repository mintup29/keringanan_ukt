<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengajuan Keringanan UKT</title>
    @include('navbar1')
</head>

<body>
    <div class="row h-100">
    <div class="container col-lg-5 h-100" style="text-align: center;">
        <img class="rounded-big ml-auto shadow" alt="profile picture" src="https://pkptki.lppm.uns.ac.id/wp-content/uploads/sites/12/2022/04/Haryono-Setiadi-ST.-M.Eng_-234x300.jpg" /><br>
        <div class="profile-text shadow">Haryono</div>
        <div class="profile-text shadow">Informatika</div>
        
    </div>
    <div class="container col-lg-7 shadow" >
        @if(!empty($pengajuan))
        <table class="table rounded-corners">
            <tr>
                {{-- <th>Tanggal Pengajuan</th> --}}
                {{-- <th>Tahun</th> --}}
                <th>Semester</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            @foreach($pengajuan as $row)
                <tr>
                    {{-- <td>{{ $row->tgl_pengajuan }}</td> --}}
                    {{-- <td>{{ substr($row->tgl_pengajuan, 0, 4) }}</td> --}}
                    <td>{{ $row->semester}}</td>
                    <td>@if($row->status == 1)
                            <div class="status-p p-processing">Processing</div>
                        @elseif($row->status == 2)
                            <div class="status-p p-approved"> Approved </div>
                        @else
                            <div class="status-p p-rejecter">Rejected</div>
                        @endif
                    </td>
                    <td><button class="btn-detail">Detail</button></td>
                </tr>
            @endforeach
        </table>
        @else
            <img src="assets/img/empty-removebg-preview.png" class="mx-auto d-block" alt="empty box image">
            <div style="text-align:center">Maaf, anda tidak memiliki riwayat pengajuan</div>
        @endif
    </div>
    </div>

</body>
</html>