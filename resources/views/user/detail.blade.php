@extends('template.template_1')
@section('content')

<body>
    <div class="container col-lg-9 shadow table-responsive" style="padding-top: 40px; padding-bottom: 20px;">
        <h5>Detail Data Keringanan Mahasiswa</h5>
        <table class="table">
            <tr>
                <td>Nama: </td>
                <td>{{ $item->mahasiswa->nama }}</td>
            </tr>
            <tr>
                <td>NIM: </td>
                <td>{{ $item->mahasiswa->nim }}</td>
            </tr>
            <tr>
                <td>Tahun: </td>                    
                <td>{{ $item->tahun }}</td>
            </tr>
            <tr>
                <td>Semester: </td>        
                <td>{{ $item->semester }}</td>            
            </tr>
            <tr>
                <td>Program Studi: </td>                    
                <td>{{ $item->mahasiswa->prodi }}</td>
            </tr>
            @foreach($item['jawaban_mahasiswa'] as $items)
            <tr>
                <td>{{ $items['pertanyaan']['pertanyaan'] }}</td>
                <td>{{ $items['jawaban']['jawaban'] }}</td>
            </tr>
            @endforeach
        </table>
        <div class="float-right">
            <a href="{{route('pengajuan')}}"><button class="btn btn-primary">Kembali</button></a>
        </div>
    </div>
</body>

