@extends('user.user_master')
@section('user')
<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        <div class="row no-gutters p-4">

            <!-- MultiStep Form -->
            <form id="regForm" method="post" action="{{route('booking.store')}}">
                @csrf
                <h3>Book Group</h3>
                <!-- One "tab" for each step in the form: -->
                <div class="tab"><strong>User Information</strong> <br>
                    <small class="text-danger">Note: <i>User deatials filled with details logged in user. Click Next to proceed. </i></small>
                    <div class="my-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ Auth::user()->name }}" class="form-control" id="name" disabled>
                    </div>
                    <div class="mb-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" value="{{Auth::user()->phone}}" class="form-control" id="phone" disabled>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" value="{{Auth::user()->email}}" class="form-control" id="email" disabled>
                    </div>

                </div>
                <div class="tab"><strong> Date & Time</strong>
                    <div class="my-2">
                        <label for="date" class="form-label">Date<span class="text-danger">*</span></label>
                        <input type="date" name="date" class="form-control" id="date" required="">
                    </div>
                    <div class="mb-2">
                        <label for="date" class="form-label">Time<span class="text-danger">*</span></label>
                        <select class="form-select" multiple aria-label="multiple select example" name="time_slot_id">
                            <option selected>which time suit you best?</option>
                            @foreach($allData as $key => $time )
                            <option value="{{$time->id}}">{{$time->start_time}}-{{$time->start_time}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="tab"><strong> Payment </strong>
                    @php
                    $editData = DB::table('bank_account_details')->get();
                    @endphp
                    <div class="my-2">
                        <h5 class="text-center">{{$editData[0]->account_number}}</h5>
                        <img id="showImage" class="rounded mx-auto d-block" src="{{ (!empty($editData[0]->qr_code_photo_path))? url('upload/qr_code_images/'.$editData[0]->qr_code_photo_path):url('upload/no_image.png') }}" style="width: 25%; height: 25%; border: 1px solid #000000;">
                    </div>
                </div>
                <div class="tab">
                    <div class="my-2">
                        <h5 class="text-center">Thank You. Now you can submit the form by clicking on Submit</h5>
                    </div>
                </div>
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </form>
        </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script>
    $(document).ready(function() {
        function randomAlert() {
            var min = 5,
                max = 20;
            var rand = Math.floor(Math.random() * (max - min + 1) + min);
            $("#time").html('Next alert in ' + rand + ' seconds');
            $('#timed-alert').fadeIn(500).delay(3000).fadeOut(500);
            setTimeout(randomAlert, rand * 1000);
        };
        randomAlert();
    });

    $('.btn').click(function(event) {
        event.preventDefault();
        var target = $(this).data('target');
        $('#click-alert').html('data-target= ' + target).fadeIn(50).delay(3000).fadeOut(1000);

    });

    // Multi-Step Form
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the crurrent tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

@endsection