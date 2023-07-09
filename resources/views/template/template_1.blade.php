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
    // $(document).ready(function() {
    //     const form = $('form');
    //     const submitButton = $('#tombol_simpan');

    //     // Disable the submit button initially
    //     submitButton.prop('disabled', true);

    //     // Add an event listener to the form inputs to check for changes
    //     form.on('input', function() {
    //         // Check if all form fields are filled
    //         const allFieldsFilled = form.find('input').toArray().every(function(element) {
    //             return $(element).val().trim() !== '';
    //         });

    //         // Enable or disable the submit button based on the form validation
    //         submitButton.prop('disabled', !allFieldsFilled);
    //     });

    //     // Add an event listener to the submit button
    //     submitButton.on('click', function(e) {
    //         e.preventDefault();
    //         const href = $(this).attr('href');

    //         Swal.fire({
    //             title: 'Apakah anda yakin?',
    //             text: 'Data akan disimpan',
    //             icon: 'info',
    //             showCancelButton: true,
    //             confirmButtonColor: '#3085d6',
    //             cancelButtonColor: '#d33',
    //             confirmButtonText: 'Simpan'
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 // Submit the form directly after confirmation
    //                 form.submit();
    //             }
    //         });
    //     });
    // });
</script>

@if (session('success'))
<script>
    Swal.fire({
        title: 'Data Berhasil Disimpan',
        icon: 'success',
        timer: 2000,
        showConfirmButton: false,
    });
</script>
@endif

</html>