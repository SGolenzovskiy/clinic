@if(count($doctors) > 0)
<div class="row">
    @foreach($doctors as $doctor)
        <div class="col-lg-6 col-sm-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <h5>{{ "$doctor->surname $doctor->name" }}</h5>
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 mb-3">
                                    @if($doctor->photo)
                                        <img src="{{ $doctor->photo }}" class="img-fluid" alt="Responsive image">
                                    @endif
                                </div>
                            </div>
                            <div data-doctor-id="{{ $doctor->id }}" class="datepicker"></div>
                        </div>
                        <div class="col-lg-6 col-sm-12 my-4">
                            @if(count($slots[$doctor->id]) > 0)
                                @foreach($slots[$doctor->id] as $date => $time)
                                    <a data-slot="{{ $date }}" data-doctor-id="{{ $doctor->id }}"
                                       data-toggle="modal" data-target="#visitModal"
                                       href="#" class="badge badge-info ml-4">{{ $time[0] }} - {{ $time[1] }}</a>
                                @endforeach
                            @else
                                <div class="alert alert-warning" role="alert">Нет номерков для записи.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@else
    <div class="alert alert-danger" role="alert">
        Нет таких специалистов.
    </div>
@endif
