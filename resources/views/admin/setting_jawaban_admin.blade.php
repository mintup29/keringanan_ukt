@extends('template.template_2')
@section('content')

<div class="container" style="padding-bottom:5%">
    <!-- Judul Halaman -->  
    <div class="row mt-3">
      <div class="col-lg-8 offset-lg-2 col-sm-8 offset-sm-2 text-center div-title-admin" style="font-weight: 900">
        <h2 class="p-2">PENGATURAN JAWABAN</h2>
      </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-12 col-sm-12" style="background-color:#3BAFDA; color:white">
          <p style="font-weight: 500">Pertanyaan Anda</p>
          <div class="row">
            <div class="col-12">
                <p>{{$pertanyaan->pertanyaan}}</p>
            </div>
          </div>
        </div>
    </div>

    <!-- Awal Form -->
    <form action="">
      @csrf
      <!-- Button Tambah Pertanyaan -->
      <div class="row">
        <div class="d-flex mt-4 justify-content-end" > 
            <button type="button" class="btn btn-success justify-content-center py-2 rounded-3 btn-font" style="color:white" onclick="addNewRow()">
              <span class="rounded-3" style="color:white"><i class="fa fa-plus mx-2"></i></span>Tambah Jawaban dan Skor
            </button>
        </div> 
      </div>

      <!-- Tabel -->
      <div class="row">
          <div class="col-12 col-sm-12">
            <table class="table-responsive mt-4 border-collapse" id="employee-table">
              <thead class="shadow-sm" style="background-color:white">
                <!-- Judul Tabel -->
                <tr class="rounded-3 text-center p-3">
                  <th class="col-3 p-3 col-sm-3 div-title-admin" style="font-size:18px">Jawaban</th>
                  <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Skor</th>
                  <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Aksi</th>
                </tr>
              </thead>
              <tbody id="tbody" style="font-size:14px">
                <tr class="shadow-sm" style="background-color:white">
                  <!-- Isi Jawaban-->
                  <td class="p-3 fw-bold">
                    <div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">
                      <input type="text" class="form-control col-lg-9" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                  </td>
                  <!-- Isi Skor-->
                  <td class="p-3 fw-bold">
                    <div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">
                      <input type="text" class="form-control col-lg-3 mx-1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">                      
                    </div>
                  </td>
                  <!-- Button Hapus jawaban dan skor -->
                  <td class="p-lg-3 p-sm-3 text-center">
                    <button type="button" class="btn btn-danger col-lg-4 col-sm-12 mx-lg-2 my-2 rounded-3 remove" onclick="deleteRow()">
                      <i class="fa fa-trash" style="font-size: 20px"></i>
                    </button>  
                  </td>
                </tr>       
              </tbody>
            </table>
          </div>
      </div>

      <!-- Button Simpan dan Batalkan Ubah jawaban -->
      <div class="row my-4">
        <div class="d-flex justify-content-end justify-content-sm-center">
            <button type="button" class="btn btn-primary col-lg-2 col-sm-3 mx-2 rounded-3 p-2 fw-bold button-font">
                Simpan
            </button>
            <button type="button" class="btn btn-danger col-lg-2 col-sm-3 mx-2 rounded-3 fw-bold button-font">
                Batal
            </button> 
        </div> 
      </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


