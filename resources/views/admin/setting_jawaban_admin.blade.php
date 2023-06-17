@extends('template.template_2')
@section('content')

<!-- Popup tambah jawaban -->
<form action="{{ url('tambah-jawaban') }}" method="POST">
  @method('POST')
  @csrf
  <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">TAMBAH JAWABAN & SKOR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <table class="table">
                <tr>
                  @forelse($pertanyaan as $hiddenpertanyaan)

                    {{-- Hidden input pertanyaan --}}
                    <input type="hidden" name="pertanyaan_id" value="{{ $hiddenpertanyaan->id }}">
                  @empty
                    <p>tidak ada record</p>
                  @endforelse
                </tr>
                <tr>
                  <td>

                    <!-- Input Jawaban -->
                    Jawaban
                    <div class="input-group input-group-sm mx-auto my-1">
                      <input type="text" id='jawaban' name='jawaban' class="form-control @error('jawaban') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                      @error('jawaban')
                        <span class="invalid-feedback" role="alert">
                          <strong>{!! $message !!}</strong>
                        </span>
                      @enderror 
                    </div>

                    <!-- Input Skor -->
                    Skor
                    <div class="input-group input-group-sm mx-auto my-1">
                      <input type="text" id='skor' name='skor' class="form-control @error('skor') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                      @error('skor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{!! $message !!}</strong>
                        </span>
                      @enderror 
                    </div>
                  </td>
                </tr>
              </table>

              <!-- Button simpan dan batal -->
              <div class="d-flex mt-4 justify-content-center" > 
                <button type="button" class="btn btn-danger justify-content-center py-2 rounded-3 btn-font mx-3" style="color:white" data-dismiss="modal">
                  <span class="rounded-3" style="color:white"><i class="fa fa-trash mx-2"></i></span>Batal
                </button>
                <button type="submit" class="btn btn-success justify-content-center py-2 rounded-3 btn-font mx-3" style="color:white">
                  <span class="rounded-3" style="color:white"><i class="fa fa-check mx-2"></i></span>Simpan
                </button>
              </div> 

            </div>
        </div>
    </div>
  </div>
</form>

<div class="container" style="padding-bottom:5%">

  <!-- alert sukses-->
  <div class="row mt-3">
    <div class="col-12 text-center" style="font-weight: 900">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
          <strong>Success!</strong> <p>{{ session('success') }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif
    </div>
  </div>
  
  <!-- Judul Halaman -->  
  <div class="row mt-3">
    <div class="col-lg-8 offset-lg-2 col-sm-8 offset-sm-2 text-center div-title-admin" style="font-weight: 900">
      <h2 class="p-2">PENGATURAN JAWABAN</h2>
    </div>
  </div>

  <div class="row">

    <div class="d-flex mt-4 justify-content-between" > 
      <!-- Button Kembali -->
      <button type="button" class="btn btn-danger col-lg-2 col-sm-3 mx-2 rounded-3 fw-bold button-font" onclick="window.location='{{ url("admin-setting") }}'">
        Kembali
      </button>

      <!-- Button Tambah Pertanyaan -->
      <button type="button" class="btn btn-success justify-content-center py-2 rounded-3 btn-font" style="color:white" data-toggle="modal" data-target="#detailModal">
        <span class="rounded-3" style="color:white"><i class="fa fa-plus mx-2"></i></span>Tambah Jawaban dan Skor
      </button>
    </div> 

  </div>

  @forelse($pertanyaan as $pertanyaan)
    {{-- Judul Pertanyaan --}}
    <div class="row mt-3">
      <div class="col-lg-12 col-sm-12" style="background-color:#3BAFDA; color:white">
        <p class='mt-2' style="font-weight: 500; font-size: 20px">Pertanyaan Anda</p>
        <div class="row">
          <div class="col-12">
            <p style="font-size: 18px">{{ $pertanyaan->pertanyaan }}</p>
          </div>
        </div>
      </div>
    </div>
  @empty
    <p>tidak ada record</p>
  @endforelse

  <!-- Tabel -->
  <div class="row">
    <div class="col-12 col-sm-12">
      <table class="table mt-4 border-collapse rounded-corners" id="employee-table">
        <thead class="shadow-sm" style="background-color:white">

          <!-- Judul Tabel -->
          <tr class="rounded-3 text-center p-3">
            <th class="col-3 p-3 col-sm-3 div-title-admin" style="font-size:18px">Jawaban</th>
            <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Skor</th>
            <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Aksi</th>
          </tr>

        </thead>
        
        <tbody id="tbody" style="font-size:14px">
          @forelse($jawabanskor as $jawabanskor)
            <tr class="shadow-sm" style="background-color:white">
        
              <!-- Isi Jawaban-->
              <td class="p-3 fw-bold">
                <div class="col-12 text-center shadow my-2 p-2 input-group" style="background-color:white; font-size:15px; font-weight:500">                   
                  <div class="input-group-sm my-lg-1 col-sm-12 justify-content-center">
                    <p class="text-center" name="jawaban">{{ $jawabanskor->jawaban }}</p>
                  </div>
                </div>
              </td>

              <!-- Isi Skor-->
              <td class="p-3 fw-bold">
                <div class="col-12 text-center shadow my-2 p-2 input-group" style="background-color:white; font-size:15px; font-weight:500">                   
                  <div class="input-group-sm my-lg-1 col-sm-12 justify-content-center">
                    <p class="text-center" name="jawaban">{{ $jawabanskor->skor }}</p>
                  </div>
                </div> 
              </td>
              
              <!-- Button hapus dan edit jawaban dan skor -->
              <td class="p-lg-3 p-sm-3 text-center">
                <button type="button" data-toggle="modal" data-target="#editModal{{$jawabanskor->id}}" class="btn btn-primary col-lg-4 col-sm-12 mx-lg-2 my-2 rounded-3">
                  <i class="fa fa-pencil" style="font-size: 20px"></i>        
                </button>
                <button type="button" data-toggle="modal" data-target="#HapusModal{{$jawabanskor->id}}" class="btn btn-danger col-lg-4 col-sm-12 mx-lg-2 my-2 rounded-3" >
                  <i class="fa fa-trash" style="font-size: 20px"></i>
                </button>  
              </td>
            </tr>

            {{-- modal konfirmasi hapus --}}
            <div class="modal fade" id="HapusModal{{$jawabanskor->id}}" tabindex="-1" aria-labelledby="HapusModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form method="post" action="{{url('setting-jawaban/delete/'.$jawabanskor->id)}}">
                    @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="HapusModalLabel">Konfirmasi Hapus</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        {{-- <span aria-hidden="true">&times;</span> --}}
                      </button>
                    </div>
                    <div class="modal-body">
                      Apakah anda yakin ingin menghapus jawaban "{{ $jawabanskor->jawaban }}" dan skor "{{ $jawabanskor->skor }}?
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Ya</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    </div>
                  </form>             
                </div>
              </div>
            </div>

            {{-- modal update --}}
            <div class="modal fade" id="editModal{{$jawabanskor->id}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form method="post" action="{{url('setting-jawaban/update/'.$jawabanskor->id)}}">
                    @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Update Jawaban dan Skor</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        {{-- <span aria-hidden="true">&times;</span> --}}
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="jawaban">Jawaban</label>
                        <input type="text" value="{{$jawabanskor->jawaban}}" class="form-control {{$errors->has('jawaban') ? 'is-invalid' : ''}}" id="jawaban" name="jawaban" required>
                        @if($errors->has('jawaban'))
                          <div class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('jawaban') }}</strong>
                          </div>
                        @endif
                        <label for="skor">Skor</label>
                        <input type="text" value="{{$jawabanskor->skor}}" class="form-control {{$errors->has('skor') ? 'is-invalid' : ''}}" id="skor" name="skor" required>
                        @if($errors->has('skor'))
                          <div class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('skor') }}</strong>
                          </div>
                        @endif
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                  </form>             
                </div>
              </div>
            </div>

          @empty
            <p>tidak ada record</p>
          @endforelse  
        </tbody>
      </table>
    </div>
  </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


