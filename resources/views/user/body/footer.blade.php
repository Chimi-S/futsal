<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-info">
                    <h3>Bangdu Futsal</h3>
                    <p>
                        <strong>Phone:</strong> +97577403035<br>
                        <strong>Email:</strong> bangdufutsal@gmail.com<br>
                    </p>
                    <div class="social-links mt-3">
                        <!-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> -->
                        <a href="https://www.facebook.com/Bangdu-Futsal-106156581673286" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/bangdufutsal/" class="instagram"><i class="bi bi-instagram"></i></a>
                        <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> -->
                        <!-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        @auth
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('dashboard') }}">Home</a></li>
                        @else
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('welcome') }}">Home</a></li>
                        @endauth
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('booking.add')}}">Book Now</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('pricing')}}">Pricing & Timing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('booking.view')}}">Booking Chart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy;2022 Copyright <strong><a href="{{route('welcome')}}">Bangdu Futsal</a></strong>. All Rights Reserved
        </div>
    </div>
</footer>