@if(count($doctors) > 0)
    @foreach($doctors as $doctor)
    <div class="card mt-3">
        <h5 class="card-header">{{ "$doctor->surname $doctor->name" }}</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    @if($doctor->photo)
                        <img src="{{ $doctor->photo }}" class="img-fluid" alt="Responsive image">
                    @endif
                </div>
                <div class="col-lg-3 col-sm-12 my-4">
                    @foreach($slots[$doctor->id] as $date => $time)
                        <a data-slot="{{ $date }}" data-toggle="modal" data-target="#visitModal"
                           href="#" class="badge badge-info mx-2">{{ $time[0] }} - {{ $time[1] }}</a>
                    @endforeach</div>
                <div class="col-lg-5 col-sm-12">
                    <div data-doctor-id="{{ $doctor->id }}" class="datepicker"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
    <div class="alert alert-danger" role="alert">
        Нет таких специалистов.
    </div>
@endif
