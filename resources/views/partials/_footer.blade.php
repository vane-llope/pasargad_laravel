<hr>
<footer id="footer" class="footer position-relative light-background">
    <div class="container mt-5">
        <div class="row gy-4">
            <div class="col-md-3">
                <h4>{{ __('messages.contact_ways') }}</h4>
                <div class="footer-contact pt-3">
                    <p><strong><i class="bi bi-phone"></i></strong> <span>{{ __('messages.sales_commerce') }}</span></p>
                    <p class="mt-3"><strong><i class="bi bi-telephone"></i></strong>
                        <span>{{ __('messages.factory') }}</span></p>
                    <p class="mt-3"><strong><i class="bi bi-envelope"></i></strong>
                        <span>{{ __('messages.pasargadEmail') }}</span>
                    </p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-whatsapp"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-md-4 p-3 pt-0">
                <h4> <i class="bi bi-geo-alt"></i>{{ __('messages.pasargad') }}</h4>
                <p>{{ __('messages.pasargadAddress') }}</p>

                <h4 class="mt-5"> <i class="bi bi-clock"></i>{{ __('messages.working_hours') }}</h4>
                <p>{{ __('messages.working_days') }}</p>
            </div>

            <div class="col-md-5">
                <h4>{{ __('messages.other_factories') }}</h4>
                <p><i class="bi bi-geo-alt"></i>{{ __('messages.other_factories_address') }}</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="container mt-4 d-flex justify-content-between flex-wrap">
        <p>{{ __('messages.copyright') }}</p>
        <!--<p> <i class="bi bi-feather"></i>{{ __('messages.designer') }}</p>-->
    </div>
</footer>
