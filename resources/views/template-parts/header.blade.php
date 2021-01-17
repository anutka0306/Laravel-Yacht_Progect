
    <div class="header_content d-flex flex-row align-items-center justify-content-start">
        <div class="covid-link">COVID-19</div>
        <div class="logo"><a href="{{ route('Index') }}">
                <img class="logo-top" src="{{ asset('storage/images/logo_white.png')}}" alt="">

            </a></div>
        <div class="ml-auto d-flex flex-row align-items-center justify-content-start">


        <!--<div class="header_phone d-flex flex-row align-items-center justify-content-center">
                    <img src="{{ asset('storage/images/phone.png')}}" alt="">
                    <span>0183-12345678</span>
                </div>-->

            <div class="top-line__right-wrapper d-flex flex-column align-items-end justify-content-between">
                <div class="top-line__right-wrapper_phones d-flex flex-column">
                    <div class="top-line__right-wrapper_first-phone d-flex flex-row justify-content-between">
                            <span class="first-phone__weekDays">
                                lu - dom
                            </span>
                        <div class="phone-wrapper">
                            <a href="tel:+41788791998">
                                <img src="{{ asset('storage/images/phone.png')}}" alt="">
                                <span>+41788791998</span>
                            </a>
                        </div>
                    </div>

                    <div class="top-line__right-wrapper_second-phone d-flex flex-row justify-content-between">
                            <span class="first-phone__hours">
                                09h - 19h
                            </span>
                        <div class="phone-wrapper">
                            <a href="tel:+41792070667">
                                <img src="{{ asset('storage/images/phone.png')}}" alt="">
                                <span>+41792070667</span>
                            </a>
                        </div>
                    </div>
                </div>

            <div class="d-flex justify-content-between">
                <div>
                    @include('template-parts/auth-top')
                </div>
                <div class="top-line__right-wrapper_languages">
                    @include('template-parts/languages-select')
                </div>

            </div>

            </div>

            <!-- Hamburger Menu -->
            <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
        </div>
    </div>

