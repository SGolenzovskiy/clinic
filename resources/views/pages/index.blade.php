@extends('master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pt-4">
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="p-3 mb-1">
                        <h1>Запись к стоматологу</h1>
                    </div>

                    <div class="col-12">
                        <a href="#1" class="btn btn-outline-primary m-1" role="button" aria-pressed="true">детская стоматология</a>
                        <a href="#2" class="btn btn-outline-primary m-1" role="button" aria-pressed="true">профессиональная гигиена полости рта</a>
                        <a href="#3" class="btn btn-outline-primary m-1" role="button" aria-pressed="true">стоматологическая диагностика</a>
                        <a href="#4" class="btn btn-outline-primary m-1" role="button" aria-pressed="true">лечение зубов (терапия)</a>
                        <a href="#5" class="btn btn-outline-primary m-1" role="button" aria-pressed="true">стоматологическая хирургия</a>
                        <a href="#6" class="btn btn-outline-primary m-1" role="button" aria-pressed="true">протезирование зубов (ортопедия)</a>
                        <a href="#7" class="btn btn-outline-primary m-1 active" role="button" aria-pressed="true">лечение дёсен (пародонтология)</a>
                        <a href="#8" class="btn btn-outline-primary m-1" role="button" aria-pressed="true">исправление прикуса (ортодонтия)</a>
                        <a href="#9" class="btn btn-outline-primary m-1" role="button" aria-pressed="true">имплантация зубов</a>
                        <a href="#10" class="btn btn-outline-primary m-1" role="button" aria-pressed="true">отбеливание зубов</a>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="card">
                            <h5 class="card-header">Василь Петрович</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <img src="//cdn.pixabay.com/photo/2017/06/17/04/17/doctor-2411135_960_720.png" class="img-fluid" alt="Responsive image">
                                    </div>
                                    <div class="col-lg-3 col-sm-12 my-sm-4 text-center">
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                    </div>
                                    <div class="col-lg-5 col-sm-12">
                                        <functional-calendar :is-date-picker='true'></functional-calendar>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="card">
                            <h5 class="card-header">Василь Петрович</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <img src="//cdn.pixabay.com/photo/2017/06/17/04/17/doctor-2411135_960_720.png" class="img-fluid" alt="Responsive image">
                                    </div>
                                    <div class="col-lg-3 col-sm-12 my-sm-4 text-center">
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                    </div>
                                    <div class="col-lg-5 col-sm-12">
                                        <functional-calendar :is-date-picker='true'></functional-calendar>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="card">
                            <h5 class="card-header">Василь Петрович</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <img src="//cdn.pixabay.com/photo/2017/06/17/04/17/doctor-2411135_960_720.png" class="img-fluid" alt="Responsive image">
                                    </div>
                                    <div class="col-lg-3 col-sm-12 my-sm-4 text-center">
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                        <a href="#" class="badge badge-info mx-2">09:00 - 09:30</a>
                                    </div>
                                    <div class="col-lg-5 col-sm-12">
                                        <functional-calendar :is-date-picker='true'></functional-calendar>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
