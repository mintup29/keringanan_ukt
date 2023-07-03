@extends('template.template_1')
@section('content')

<body>
    <div class="container text-align-center">
        <div class="row" style="text-align: center;">
            <div class="col-lg-8 offset-lg-2 col-sm-12 shadow p-4 rounded-3 mt-3 fw-bold" style="background-color:white; font-size:25px">Kuesioner Keringanan UKT</div>
        </div>
        <div class="row">
            <div class="fw-bolder text-center col-lg-2 col-sm-4 mx-lg-auto mx-sm-auto mt-3">
                <p style="font-size: 20px;">Tahun</p>
            </div>
            <div class="fw-bolder text-center col-lg-2 col-sm-4 mx-lg-auto mx-sm-auto mt-3">
                <p style="font-size: 20px;">Semester</p>
            </div>
        </div>
        <form method="POST" action="/isi-kuesioner/{{ $mahasiswa }}" enctype="multipart/form-data">
            @csrf
            @if($errors->has('id_jawaban'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('id_jawaban') }}</strong>
            </div>
            @endif
            <div class="row">
                <div class="input-group col-lg-2 col-sm-4 mx-lg-auto mx-sm-auto">
                    <input type="text" name="tahun" class="form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ now()->year }}" readonly>
                </div>
                <select name='semester' id="semester" class="form-select shadow col-lg-2 col-sm-4 mx-lg-auto mx-sm-auto" aria-label="Default select example" required>
                    <option value="">Pilih Semester</option>
                    <option value="Ganjil-1">Ganjil - 1</option>
                    <option value="Genap-2">Genap - 2</option>
                    <option value="Ganjil-3">Ganjil - 3</option>
                    <option value="Genap-4">Genap - 4</option>
                    <option value="Ganjil-5">Ganjil - 5</option>
                    <option value="Genap-6">Genap - 6</option>
                    <option value="Ganjil-7">Ganjil - 7</option>
                    <option value="Genap-8">Genap - 8</option>
                    <option value="Ganjil-9">Ganjil - 9</option>
                    <option value="Genap-10">Genap - 10</option>
                    <option value="Ganjil-11">Ganjil - 11</option>
                    <option value="Genap-12">Genap - 12</option>
                    <option value="Ganjil-13">Ganjil - 13</option>
                    <option value="Genap-14">Genap - 14</option>
                </select>
            </div>

            @foreach ($pertanyaan as $item)
            <div class="row my-4">
                <div class="col-lg-8 offset-lg-2 shadow rounded-3" style="background-color: white;">
                    <div class="row">
                        <div class="col-12 mx-2 mt-1">
                            <input type="hidden" name="user_id" value="{{ $mahasiswa}}">
                            <input type="hidden" id="id" name="id_pertanyaan[{{ $item -> id }}]" value="{{ $item -> id }}">
                            <p>{{$item -> pertanyaan}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-2 my-2">
                            <div class="form-check">
                                @foreach ($item->jawaban as $jawaban)
                                <input class="form-check-input {{$errors->has('id_jawaban') ? 'is-invalid' : ''}} mb-3" type="radio" name="id_jawaban[{{ $item->id }}]" id="jawaban{{ $jawaban->id }}" value="{{ $jawaban->id }},{{ $jawaban->skor->skor }}" required>
                                <label for="jawaban{{ $jawaban->id }}">
                                    <p>{{$jawaban->jawaban}}</p>
                                    @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row my-4">
                <div class="col-lg-8 offset-lg-2 shadow rounded-3 p-3" style="background-color: white;">
                    <label for="foto">Foto Rumah</label>
                    <input type="file" class="form-control {{$errors->has('foto') ? 'is-invalid' : ''}} mb-3" id="foto" name="foto">
                    @if($errors->has('foto'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('foto') }}</strong>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <button class="btn btn-primary rounded-4 col-lg-2 col-sm-4 offset-lg-8 offset-sm-4 my-3" id="tombol_simpan" type="submit" style="font-style: Poppins; font-weight:bold;">Submit</button>
            </div>
        </form>
    </div>
</body>