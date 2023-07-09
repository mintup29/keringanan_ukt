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
            @foreach($item['jawaban_mahasiswa'] as $items)
            <tr>
                <td>{{ $items['pertanyaan']['pertanyaan'] }}</td>
                <td>{{ $items['jawaban']['jawaban'] }}</td>
            </tr>
            @endforeach
            @foreach($item->foto as $foto)
                <tr>
                    <td>Foto Rumah: </td>
                    <td>
                        <img src="{{ asset('storage/' . $foto['foto']) }}" alt="Foto Rumah" width="100%" height="100%">
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="mt-5 mb-4">
            @if ($item->status == 'Need Action')
                <h6 class="mb-3">Apakah Anda ingin menyetujui pengajuan keringanan UKT mahasiswa <span>{{ $item->mahasiswa->nama }}</span>?</h6>
                <button onclick="updateAction('{{ $item->id }}', 'Accepted')" class="btn btn-success col-md-3"><i class="fa fa-check"></i></button>
                <button onclick="updateAction('{{ $item->id }}', 'Rejected')" class="btn btn-danger col-md-3"><i class="fa fa-close"></i></button>
            @endif
        </div>
    </div>
</body>

<script>        
    function updateAction(modelId, newValue) {
        $.ajax({
            url: "{{ url('dashboard-admin') }}" + '/' + modelId + "/update-action",
            type: 'PUT',
            data: {
                _token: "{{ csrf_token() }}",
                status: newValue
            },
            success: function (response) {
                // Handle success response
                console.log(response.message);
                location.reload();
            },
            error: function (xhr, status, error) {
                // Handle error response
                console.error(error);
            }
        });
    }
    
</script>
