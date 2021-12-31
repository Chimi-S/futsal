<section class="team">
    @php
    $date = date_create(date('Y-m-d',time() + (6 * 24 * 60 * 60)));
    $to_date = date_format($date,"d F Y");
    $from_date = date_format(new DateTime(),"d F Y");
    @endphp
    <div class="container">
        <div class="section-title">
            <h4>Booking for <strong>{{$from_date}}</strong> to <strong>{{$to_date}}</strong> </h4>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center" data-aos="fade-up">
                <div class="count-box mt-2 mb-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Booked By</th>
                                <th>Day</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Booked On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookedInfo as $key => $info)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$info->user}}</td>
                                <td>{{$info->match_day}}</td>
                                <td>{{$info->match_date}}</td>
                                <td>{{$info->start_time}}-{{$info->end_time}}</td>
                                <td>{{$info->booked_on}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>