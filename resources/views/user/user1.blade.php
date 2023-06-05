<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengajuan Keringanan UKT</title>
    @include('user.navbar1')
</head>

<body>
    <div class="row h-100">
    <div class="container col-lg-5 h-100" style="text-align: center;">
        <img class="rounded-big ml-auto shadow" alt="profile picture" src="https://pkptki.lppm.uns.ac.id/wp-content/uploads/sites/12/2022/04/Haryono-Setiadi-ST.-M.Eng_-234x300.jpg" /><br>
        <div class="profile-text shadow">Haryono</div>
        <div class="profile-text shadow">Informatika</div>
    </div>
    <div class="container col-lg-7 shadow" >
        <table class="table rounded-corners">
            <tr>
                <th>Tanggal Pengajuan</th>
                <th>Tahun</th>
                <th>Semester</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>2000</td>
                    <td>4</td>
                    <td>approved</td>
                    <td>detail</td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
</body>

<script type="text/javascript" src="/js/bootstrap.js"></script>

</html>