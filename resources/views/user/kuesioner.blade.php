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
        <div class="row">
            <select class="form-select shadow col-lg-2 col-sm-4 mx-lg-auto mx-sm-auto">
                <option selected>Pilih Tahun</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <select class="form-select shadow col-lg-2 col-sm-4 mx-lg-auto mx-sm-auto">
                <option selected>Pilih Semester</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <form action="{{ url('tambah-pertanyaan') }}" method="POST">
            @foreach ($pertanyaan as $item)
            <div class="row my-4">
                <div class="col-lg-8 offset-lg-2 shadow rounded-3" style="background-color: white;">
                    <div class="row">
                        <div class="col-12 mx-2 mt-1">
                            <p>{{$item -> pertanyaan}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-2 my-2">
                            <div class="form-check">
                                @foreach ($item->jawaban as $jawaban)
                                <input class="form-check-input" type="radio" name={{ $jawaban->id }} id={{ $jawaban->id }}>
                                <label class="form-check-label" for={{ $jawaban->id }}>
                                    <p>{{$jawaban->jawaban}}</p>
                                @endforeach
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row">
                <button class="btn btn-primary rounded-4 col-lg-2 col-sm-4 offset-lg-8 offset-sm-4 my-3" type="button" style="font-style: Poppins; font-weight:bold;">Submit</button>
            </div>
        </form>
    </div>

</body>