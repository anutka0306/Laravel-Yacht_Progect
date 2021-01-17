<div class="menu trans_400 d-flex flex-column align-items-end justify-content-start">
    <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="menu_content">
        <nav class="menu_nav text-right">
            <ul>
                <li class="active"><a href="#">Chi siamo</a></li>
                <li><a href="#">Distinazioni</a></li>
                <li><a href="#">Barche</a></li>
                <li><a href="#">Offerte</a></li>
                <li><a href="#">Lavora con noi</a></li>
            </ul>
        </nav>
    </div>
    <div class="menu_extra">
        <div class="top-line__right-wrapper_languages d-flex justify-content-end">
            @include('template-parts/auth-mobile')
            @include('template-parts/languages-select')
        </div>

        <div class="menu_book text-right"><a href="#">Book online</a></div>
        <div class="menu_phone d-flex flex-row align-items-center justify-content-center">
            <img src="{{ asset('storage/images/phone-2.png')}}" alt="">
            <span><a href="tel:+41788791998"> +41788791998</a></span>
        </div>
        <div class="menu_phone d-flex flex-row align-items-center justify-content-center">
            <img src="{{ asset('storage/images/phone-2.png')}}" alt="">
            <span><a href="tel:+41792070667"> +41792070667</a></span>
        </div>
    </div>
</div>
