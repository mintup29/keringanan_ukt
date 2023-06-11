@extends('template.template_2')
@section('content')

<body>
    <div class="container col-lg-9 shadow table-responsive" style="padding-top: 40px; padding-bottom: 20px;">
        <h5>Detail Data Keringanan Mahasiswa</h5>
        <table class="table">
            <tr>
                <td>Nama: {{ $item->mahasiswa->nama }}</td>
            </tr>
            <tr>
                <td>NIM: {{ $item->mahasiswa->nim }}</td>
            </tr>
            <tr>
                <td>Tahun: {{ $item->tahun }}</td>                    
            </tr>
            <tr>
                <td>Semester: {{ $item->semester }}</td>                    
            </tr>
            <tr>
                <td>Program Studi: {{ $item->mahasiswa->prodi }}</td>                    
            </tr>
            <tr>
                <td>Nominal UKT: {{ $item }}</td>                    
            </tr>
            <tr>
                <td>Kelengkapan Orang Tua: {{ $item}}</td>                    
            </tr>
            <tr>
                <td>Apakah Orang Tua Bekerja: {{ $item}}</td>                    
            </tr>
            <tr>
                <td>Orang Tua yang Bekerja: {{ $item}}</td>                    
            </tr>
            <tr>
                <td>Total Pendapatan Orang Tua: {{ $item}}</td>                    
            </tr>
            <tr>
                <td>Pekerjaan Orang Tua: {{ $item}}</td>                    
            </tr>
            <tr>
                <td>Jabatan dan Golongan Orang Tua: {{ $item}}</td>                    
            </tr>
            <tr>
                <td>Jumlah Anak: {{ $item}}</td>                    
            </tr>
            <tr>
                <td>Urutan Anak: {{ $item}}</td>                    
            </tr>
            <tr>
                <td>Biaya Listrik perBulan: {{ $item}}</td>                    
            </tr>
            <tr>
                <td>Jumlah Kendaraan: {{ $item}}</td>                    
            </tr>
            <tr>
                <td>Tanggungan Orang Tua: {{ $item}}</td>                    
            </tr>
            <tr>
                <td>Status Saudara: {{ $item}}</td>                    
            </tr>
            <tr>
                <td>Status Kepemilikan Rumah: {{ $item}}</td>                    
            </tr>
            <tr>
                <td>Deskripsi Kondisi Rumah: {{ $item}}</td>                    
            </tr>
        </table>
    </div>
</body>
