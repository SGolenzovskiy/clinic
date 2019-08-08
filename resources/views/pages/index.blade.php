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
                        @include('menu.top', [
                            'specializations' => $specializations,
                            'activeSlug' => $activeSlug ?? ''
                        ])
                    </div>

                    <div class="col-12 mt-3">
                        @if(isset($doctors))
                            @include('includes.doctors', ['doctors' => $doctors])
                        @else
                            <div class="alert alert-warning" role="alert">
                                Пожалуйста, выберите категорию для записи.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
