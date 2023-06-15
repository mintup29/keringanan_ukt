@extends('template.template_2')
@section('content')

<!-- Popup tambah pertanyaan -->
<form action="{{ url('tambah-pertanyaan') }}" method="POST">
  @method('POST')
  @csrf
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
                        <input type="text" id='pertanyaan' name='pertanyaan' class="form-control @error('pertanyaan') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        @error('pertanyaan')
                          <span class="invalid-feedback" role="alert">
                            <strong>{!! $message !!}</strong>
                          </span>
                        @enderror 
                      </div>
                    </td>
                  </tr>
                </table>

                <div class="d-flex mt-4 justify-content-center" > 
                  <button type="button" class="btn btn-danger justify-content-center py-2 rounded-3 btn-font mx-3" style="color:white" data-dismiss="modal">
                    <span class="rounded-3" style="color:white"><i class="fa fa-trash mx-2"></i></span>Batal
                  </button>
                  <button type="submit" class="btn btn-success justify-content-center py-2 rounded-3 btn-font mx-3" style="color:white">
                    <span class="rounded-3" style="color:white"><i class="fa fa-check mx-2"></i></span>Simpan
                  </button>
                </div> 
                 
              </form>
            </div>
        </div>
    </div>
  </div>
</form>

<div class="container " style="padding-bottom:5%">
  
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
        <h2 class="p-2">PENGATURAN KUESIONER</h2>
      </div>
    </div>

    <!-- Button Tambah Pertanyaan -->
    <div class="row">
      <div class="d-flex mt-4 justify-content-end" > 
          <button type="button" class="btn btn-success justify-content-center py-2 rounded-3 btn-font" style="color:white" data-toggle="modal" data-target="#detailModal">
            <span class="rounded-3" style="color:white"><i class="fa fa-plus mx-2"></i></span>Tambah Pertanyaan
          </button>
      </div> 
    </div>

    <!-- Tabel -->
    <div class="row">
      <div class="col-12 col-sm-12">
        <table class="table-responsive mt-4 border-collapse">
          <thead class="shadow-sm" style="background-color:#EBF2FC">
            <!-- Judul Tabel -->
            <tr class="rounded-3 text-center p-3">
              <th class="col-5 p-3 col-sm-5 div-title-admin" style="font-size:18px">Pertanyaan</th>
              <th class="col-3 p-3 col-sm-3 div-title-admin" style="font-size:18px">Jawaban</th>
              <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Skor</th>
              <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Aksi</th>
            </tr>
          </thead>

          <tbody style="font-size:14px">
            @forelse($pertanyaan as $pertanyaan)

              <tr class="shadow-sm my-2" style="background-color:#EBF2FC">
                <!-- Isi Pertanyaan -->
                <td class="p-3">
                  <a href="{{ url('setting-jawaban/'.$pertanyaan->id) }}" style="font-size:15px">
                    {{ $pertanyaan->pertanyaan }}
                  </a>
                </td>       
                
                <!-- Isi Jawaban-->
                <td class="p-3 fw-bold">
                  <div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">
                    @forelse($pertanyaan->jawaban as $jawaban)
                      <div class="col-12 text-center shadow my-2 p-2" style="background-color:white; font-size:15px; font-weight:500">
                        {{ $jawaban->jawaban }}
                      </div>
                    @empty
                      <p>tidak ada record</p>
                    @endforelse
                  </div>
                </td>

                <!-- Isi Skor-->
                <td class="p-3 fw-bold">
                  <div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">
                    @forelse($pertanyaan->skor as $skor)
                      <div class="col-12 text-center shadow my-2 p-2" style="background-color:white; font-size:15px; font-weight:500">
                        {{ $skor->skor }}
                      </div>
                    @empty
                      <p>tidak ada record</p>
                    @endforelse                     
                  </div>
                </td>
              
                <!-- Button Edit dan Hapus pertanyaan -->
                <td class="p-lg-3 p-sm-3 text-center">
                  <button type="button" class="btn btn-primary col-lg-10 col-sm-12 mx-lg-2 my-2 rounded-3" data-target="#editModal{{$pertanyaan->id}}" data-toggle="modal">
                    <i class="fa fa-pencil" style="font-size: 20px"></i>        
                  </button>
                  <button type="submit" class="btn btn-danger col-lg-10 col-sm-12 mx-lg-2 my-2 rounded-3" data-bs-target="#HapusModal{{$pertanyaan->id}}" data-bs-toggle="modal">
                    <i class="fa fa-trash" style="font-size: 20px"></i>
                  </button>  
                </td>
              </tr>

              {{-- Modal konfirmasi hapus --}}
              <div class="modal fade" id="HapusModal{{$pertanyaan->id}}" tabindex="-1" aria-labelledby="HapusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" action="{{url('admin-setting/delete/'.$pertanyaan->id)}}">
                      @csrf
                      <div class="modal-header">
                        <h5 class="modal-title" id="HapusModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Apakah anda yakin ingin menghapus pertanyaan: "{{ $pertanyaan->pertanyaan }}"?
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ya</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                      </div>
                    </form>             
                  </div>
                </div>
              </div>

              {{-- Modal update --}}
              <div class="modal fade" id="editModal{{$pertanyaan->id}}" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="POST" action="{{url('admin-setting/update/'.$pertanyaan->id)}}">
                      @csrf
                      <div class="modal-header">
                        <h5 class="modal-title" id="UpdateModalLabel">Update Pertanyaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="pertanyaan">Pertanyaan</label>
                          <input type="text" value="{{$pertanyaan->pertanyaan}}" class="form-control {{$errors->has('pertanyaan') ? 'is-invalid' : ''}}" id="pertanyaan" name="pertanyaan">
                          @if($errors->has('pertanyaan'))
                              <div class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('pertanyaan') }}</strong>
                              </div>
                          @endif
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
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
