@extends('user.user_master')
@section('user')
<section class="counts section-bg">
    <div class="container">
        <div class="row mb-2">
            <h5 class="text-center">TIME SLOT</h5>
            @foreach($timeSlot as $key => $time )
            <div class="col-sm-3">
                <div class="inner-count-box m-2 p-2 inner-count-box-hover text-center rounded " style="cursor: pointer;">
                    <h6 class="m-0 p-2">{{$time->start_time}} - {{$time->end_time}}</h6>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <h5 class="text-center">GROUND FREE FOR ONE HOUR</h5>
            @foreach($allData as $key => $pricing )
            <div class="col-sm-4">
                <div class="card my-2">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$pricing->type}}</h5>
                        <div class="inner-count-box-promo bg-info text-light rounded" disabled style=" display: flex;  flex: 1 1 auto;">
                            <img class="card-img" src="{{ url('userbackend/panel/assets/img/promo.png') }}" style="width: 150px; width: 150px; ">
                            <div class="m-3">
                                <h6 class="card-subtitle mb-3 text-white">{{$pricing->time}}</h6>
                                <h6 class="card-subtitle text-white">Nu.{{$pricing->pricing}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!-- End Counts Section -->
@endsection