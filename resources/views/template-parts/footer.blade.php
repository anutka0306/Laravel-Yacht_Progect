<footer class="footer">
    <div class="footer_content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer_logo_container text-center">
                        <div class="footer_logo">
                            <a href="{{ route('Index') }}"></a>
                            <div><img src="{{asset('storage/images/logo_white.png')}}" alt=""></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row footer_row">

                <!-- Footer Menu First -->
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="footer_list__wrapper">
                        <div class="footer_list">
                            @include('menu/footer-menu_first')
                        </div>
                    </div>
                </div>

                <!-- Footer Menu Second -->
                <div class="col-lg-4 col-sm-4 col-6">
                    <div class="footer_list__wrapper">
                        <div class="footer_list">
                            @include('menu/footer-menu_second')
                        </div>
                    </div>
                </div>

                <!-- Footer Menu Third -->
                <div class="col-lg-4 col-sm-4 col-6">
                    <div class="footer_list__wrapper">

                        <div class="footer_list">

                            @include('menu/footer-menu_third')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="copyright">

        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
    </div>
</footer>
