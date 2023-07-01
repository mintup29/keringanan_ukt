<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengajuan Keringanan UKT</title>

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <!-- start navbar -->
    @include('navbar1')
    <!-- end navbar -->
</head>

<body>
    @yield('content1')
</body>

<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // document.getElementById('tombol_simpan').addEventListener('click', function(e) {
    //     e.preventDefault();
    //     const href = '/isi-kuesioner/{{ $mahasiswa }}';
    //     Swal.fire({
    //         title: 'Apakah anda yakin?',
    //         text: "Data akan disimpan",
    //         icon: 'info',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Simpan'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             fetch(href, {
    //                 method: 'POST',
    //                 url: '/isi-kuesioner/{{ $mahasiswa }}',
    //             })
    //             .then(data => {
    //                 Swal.fire({
    //                     title: 'Data Berhasil Disimpan',
    //                     icon: 'success',
    //                     timer: 2000,
    //                     showConfirmButton: false,
    //                 }).then(function() {
    //                     document.location.href = href;
    //                 })
    //             });
    //         }
    //     })
    // });
    document.getElementById('tombol_simpan').addEventListener('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan disimpan",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Simpan'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the form directly after confirmation
            document.querySelector('form').submit();
        }
    });
});


</script>

</html>