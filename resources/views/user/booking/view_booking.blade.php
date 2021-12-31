@extends('user.user_master')
@section('user')
<section id="about" class="about">
    <div class="container">
        <div class="row">
            @foreach($allData as $key=> $value)
            <div class="col-lg-6 col-md-6 text-center" data-aos="fade-up">
                @php
                $date=date_create($value[0]['date'])->format('l, d F, Y');
                @endphp
                <span>Available timeslots for <strong>{{$date}}.</strong></span>
                <div class="count-box mt-2 mb-4">
                    <div class="row">
                        @foreach($value as $key1 =>$booking)
                        <div class="col-lg-4 col-md-4 text-center">
                            @if($booking['is_booked']==1)
                            <div class="inner-count-box my-2 bg-danger text-light" disabled style="cursor: not-allowed; ">
                                {{$booking['start_time']}}-{{$booking['end_time']}} <br />
                                <small>{{$booking['name']}} </small>
                            </div>
                            @else
                            <a href="{{ route('booking.edit',[$booking['id'],$value[0]['date']]) }}" style="text-decoration: none; color:#343a40;">
                                <div class="inner-count-box my-2 inner-count-box-hover" style="cursor: pointer;">
                                    {{$booking['start_time']}}-{{$booking['end_time']}} <br />
                                    <small>Available</small>
                                </div>
                            </a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!-- End Counts Section -->
@endsection