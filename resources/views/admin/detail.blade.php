@extends('template.template_2')
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
            <tr>
                <td>Nominal UKT: </td> 
                <td>{{ $item['jawaban_mahasiswa']->where('id_jawaban', 1)->first()['jawaban']['jawaban'] }}</td>
            </tr>
            <tr>
                <td>Keadaan Orang Tua: </td>                    
                <td>{{ $item['jawaban_mahasiswa']->where('id_jawaban', 5)->first()['jawaban']['jawaban'] }}</td>
            </tr>
            <tr>
                <td>Pekerjaan Orang Tua: </td>                    
                <td>{{ $item['jawaban_mahasiswa']->where('id_jawaban', 9)->first()['jawaban']['jawaban'] }}</td>
            </tr>
            <tr>
                <td>Kedua Orang Tua Bekerja: </td>                    
                <td>{{ $item['jawaban_mahasiswa']->where('id_jawaban', 13)->first()['jawaban']['jawaban'] }}</td>
            </tr>
            <tr>
                <td>Orang Tua yang Bekerja: </td>                    
                <td>{{ $item['jawaban_mahasiswa']->where('id_jawaban', 15)->first()['jawaban']['jawaban'] }}</td>
            </tr>
            <tr>
                <td>Pendapatan Orang Tua: </td>                    
                <td>{{ $item['jawaban_mahasiswa']->where('id_jawaban', 17)->first()['jawaban']['jawaban'] }}</td>
            </tr>
            <tr>
                <td>Jumlah Anak: </td>                    
                <td>{{ $item['jawaban_mahasiswa']->where('id_jawaban', 21)->first()['jawaban']['jawaban'] }}</td>
            </tr>
            <tr>
                <td>Urutan Anak: </td>                    
                <td>{{ $item['jawaban_mahasiswa']->where('id_jawaban', 25)->first()['jawaban']['jawaban'] }}</td>
            </tr>
            <tr>
                <td>Tanggungan Orang Tua: </td>                    
                <td>{{ $item['jawaban_mahasiswa']->where('id_jawaban', 29)->first()['jawaban']['jawaban'] }}</td>
            </tr>
            <tr>
                <td>Status Saudara: </td>                    
                <td>{{ $item['jawaban_mahasiswa']->where('id_jawaban', 33)->first()['jawaban']['jawaban'] }}</td>
                </tr>
            <tr>
                <td>Status Kepemilikan Rumah: </td>                    
                <td>{{ $item['jawaban_mahasiswa']->where('id_jawaban', 37)->first()['jawaban']['jawaban'] }}</td>
                </tr>
            <tr>
                <td>Deskripsi Kondisi Rumah: </td>                    
                <td>{{ $item['jawaban_mahasiswa']->where('id_jawaban', 41)->first()['jawaban']['jawaban'] }}</td>
                </tr>
            <tr>
                <td>Biaya Listrik perBulan: </td>                    
                <td>{{ $item['jawaban_mahasiswa']->where('id_jawaban', 44)->first()['jawaban']['jawaban'] }}</td>
                </tr>
            <tr>
                <td>Jumlah Kendaraan: </td>                    
                <td>{{ $item['jawaban_mahasiswa']->where('id_jawaban', 48)->first()['jawaban']['jawaban'] }}</td>
                </tr>
        </table>
    </div>
</body>
