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
        <img class="rounded-big ml-auto shadow" alt="profile picture" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" /><br>
        @foreach($profile as $profil)
        <div class="profile-text shadow">{{ $profil->nama }}</div>
        <div class="profile-text shadow">{{ $profil->prodi }}</div>
        @endforeach
    </div>
    <div class="container col-lg-7 shadow" >
        @if(!empty($pengajuan))
        <table class="table rounded-corners">
            <tr><th>Tahun</th>
                <th>Semester</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            @foreach($pengajuan as $row)
                <tr>
                    <td>{{ $row->tahun }}</td>
                    <td>{{ $row->semester}}</td>
                    <td>@if($row->status == "Rejected")
                            <div class="status-p p-rejected">Processing</div>
                        @elseif($row->status == "Accepted")
                            <div class="status-p p-approved"> Accepted </div>
                        @else
                            <div class="status-p p-processing">Need Action</div>
                        @endif
                    </td>
                    <td><a href="{{route('items.mhs', [$row->id])}}"><button class="btn-detail">Detail</button></a></td>
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