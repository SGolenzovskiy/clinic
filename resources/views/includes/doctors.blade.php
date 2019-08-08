@if(count($doctors) > 0)
    @foreach($doctors as $doctor)
    <div class="card mt-3">
        <h5 class="card-header">{{ "$doctor->surname $doctor->name" }}</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <img src="//cdn.pixabay.com/photo/2017/06/17/04/17/doctor-2411135_960_720.png" class="img-fluid"
                         alt="Responsive image">
                </div>
                <div class="col-lg-3 col-sm-12 my-4">
                    @foreach(array_fill(0, rand(1, 24), 'TEMP!') as $temp)
                        <a data-toggle="modal" data-target="#visitModal" href="#" class="badge badge-info mx-2">
                            09:00 - 09:30
                        </a>
                    @endforeach
                </div>
                <div class="col-lg-5 col-sm-12">
                    <functional-calendar :is-date-picker='true'></functional-calendar>
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
