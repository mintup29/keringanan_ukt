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
            <select class="form-select shadow col-lg-2 col-sm-4 mx-lg-auto mx-sm-auto" aria-label="Default select example">
                <option selected>Pilih Tahun</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <select class="form-select shadow col-lg-2 col-sm-4 mx-lg-auto mx-sm-auto" aria-label="Default select example">
                <option selected>Pilih Semester</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <form action="">
            <div class="row my-4">
                <div class="col-lg-8 offset-lg-2 shadow rounded-3" style="background-color: white;">
                    <div class="row">
                        <div class="col-12 mx-2 mt-1">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi, reprehenderit.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-2 my-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Pilihan 1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Pilihan 2
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <button class="btn btn-primary rounded-4 col-lg-2 col-sm-4 offset-lg-8 offset-sm-4 my-3" type="button" style="font-style: Poppins; font-weight:bold;">Submit</button>
            </div>
        </form>
    </div>

</body>