@extends('template.template_2')
@section('content')
<div class="container " style="padding-bottom:5%">
  
    <!-- Judul Halaman -->  
    <div class="row mt-3">
      <div class="col-lg-8 offset-lg-2 col-sm-8 offset-sm-2 text-center div-title-admin" style="font-weight: 900">
        <h2 class="p-2">PENGATURAN KUESIONER</h2>
      </div>
    </div>

    <!-- Awal Form -->
    <form action="">
      <!-- Button Tambah Pertanyaan -->
      <div class="row">
        <div class="d-flex mt-4 justify-content-end" > 
            <button type="button" class="btn btn-success justify-content-center py-2 rounded-3 btn-font" style="color:white" data-toggle="modal" data-target="#detailModal">
              <span class="rounded-3" style="color:white"><i class="fa fa-plus mx-2"></i></span>Tambah Jawaban
            </button>
        </div> 
      </div>

      <!-- Tabel -->
      <div class="row">
          <div class="col-12 col-sm-12">
            <table class="table-responsive mt-4 border-collapse">
              <thead class="shadow-sm" style="background-color:white">
                <!-- Judul Tabel -->
                <tr class="rounded-3 text-center p-3">
                  <th class="col-5 p-3 col-sm-5 div-title-admin" style="font-size:18px">Pertanyaan</th>
                  <th class="col-3 p-3 col-sm-3 div-title-admin" style="font-size:18px">Jawaban</th>
                  <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Skor</th>
                  <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Aksi</th>
                </tr>
              </thead>
              <tbody style="font-size:14px">
                <tr class="shadow-sm" style="background-color:white">
                  <!-- Isi Pertanyaan -->
                  <td class="p-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni in itaque iure cupiditate et soluta nesciunt quia alias facere recusandae illo, obcaecati temporibus impedit fuga? Quasi repudiandae magni aspernatur. Illum?</td>
                  
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
            
                  <!-- Button Edit dan Hapus pertanyaan -->
                  <td class="p-lg-3 p-sm-3 text-center">
                    <button type="button" class="btn btn-primary col-lg-10 col-sm-12 mx-lg-2 my-2 rounded-3" onclick="window.location='{{ url("setting-jawaban") }}'">
                      <i class="fa fa-pencil" style="font-size: 20px"></i>
                    </button>
                    <button type="button" class="btn btn-danger col-lg-10 col-sm-12 mx-lg-2 my-2 rounded-3">
                      <i class="fa fa-trash" style="font-size: 20px"></i>
                    </button>  
                  </td>
                </tr>       
              </tbody>
            </table>
          </div>
      </div>

      <!-- Popup tambah pertanyaan -->
      <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">TAMBAH PERTANYAAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form action="">
                    <table class="table">
                      <tr>
                        <td>
                          Pertanyaan
                          <div class="input-group input-group-sm mx-auto my-1">
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                          </div>
                        </td>
                      </tr>
                    </table>

                    <div class="d-flex mt-4 justify-content-center" > 
                      <button type="button" class="btn btn-danger justify-content-center py-2 rounded-3 btn-font mx-3" style="color:white" data-dismiss="modal">
                        <span class="rounded-3" style="color:white"><i class="fa fa-trash mx-2"></i></span>Batal
                      </button>
                      <button type="button" class="btn btn-success justify-content-center py-2 rounded-3 btn-font mx-3" style="color:white">
                        <span class="rounded-3" style="color:white"><i class="fa fa-check mx-2"></i></span>Simpan
                      </button>
                    </div> 
                     
                  </form>
                </div>
            </div>
        </div>
      </div>

      <!-- Tombol simpan batal -->
      
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>