<footer class="footer pt-5">
    <div class="container-fluid">
        <div class=" row">
            <div class="col-md-3 mb-4 ms-auto">
                <div>
                    <div class="footer-logo" >
                        <img src="{{asset('public/images/footerlogo.png')}}" style="max-height: 50px; width: 150px; ">
                    </div>
                    <div class="footer-description">
                        <p class="text-white">CAPA was born as a small enterprise with big dreams in Chandigarh in 2017. We aimed to introduce the bakery as a career choice for entrepreneur.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-3 col-sm-6 col-6 mb-4 me-auto ">
                <div class="footer-list">
                    <h3 style="border-bottom:4px solid #ffffff;width: 160px;" class="text-white">UseFull Links</h3>
                    <ul class="flex-column  nav ">
                        <li class="nav-item">
                            <a class="nav-link" href="/home" target="_blank">
                                {{__('Home Page')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog" target="_blank">
                                {{__('Blog')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/course" target="_blank">
                                {{__('Courses')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/shop" target="_blank">
                                {{__('shop')}}
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-6 mb-4 me-auto">
                <div class="footer-list">
                    <h3 style="border-bottom:4px solid #ffffff;width: 160px;" class="text-white">Company Links</h3>
                    <ul class="flex-column  nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('privacy')}}" target="_blank">
                                {{__(' Privacy Policy')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('termsandconditions')}}" target="_blank">
                                {{__(' Terms of Service')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('cookie-policy')}}" target="_blank">
                                {{__(' Cookie Policy')}}
                            </a>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6 mb-4 me-auto">
                <div class="footer-list">
                    <h3 style="border-bottom:4px solid #ffffff;width: 160px;" class="text-white">Contact Us</h3>
                    <ul class="flex-column  nav contact-list">
                        <li class="nav-item">
                            <i class="fa fa-location-arrow"></i>
                            <p class="pl-3">CAPA Chandigarh - Quite Office No. 1, First Floor, ( Flower Market, Opposite Khukhrain Bhawan) Sector 35-A Chandigarh!</p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tel:+18555008999" target="_blank">
                                <i class="fa fa-phone"></i>
                                <p class="pl-3"><span>Phone: </span>+91 79732-45822</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">
                                <i class="fa fa-envelope"></i>
                                <p class="pl-3"><span>Email: </span> cakeuncle.com@gmail.com</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div style=" border-top: 1px solid white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-icon">
                        <ul class="d-flex my-4 " style="color: #06346e">
                            <li class="mx-2"><a href="#"><i class="fa fa-twitter mr-2 favicon"></i></a></li>
                            <li class="mx-2"><a href="#"><i class="fa fa-instagram mr-2 favicon"></i></a></li>
                            <li class="mx-2"><a href="#"><i class="fa fa-facebook mr-2 favicon"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-end ">
                        <p class="my-4 ms-3 text-sm text-white">
                            All rights reserved. Copyright © <script>
                                document.write(new Date().getFullYear())
                            </script>  by CAPA
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>