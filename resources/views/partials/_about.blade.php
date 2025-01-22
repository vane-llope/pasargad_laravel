<!-- Features Details Section -->
<section id="features-details" class="features-details section" data-aos="fade-left" data-aos-delay="100">

    <div class="container">

        <div class="row gy-4 justify-content-between features-item mb-5   ">

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('images/factory/workshop.jpeg') }}" class="img-fluid" alt="">
            </div>

            <div class="col-lg-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h3>{{ __('messages.aboutUs') }}</h3>
                    <p>{{ __('messages.about') }}</p>
                </div>
            </div>

        </div><!-- Features Item -->

        <div class="row gy-4 justify-content-between features-item my-5  ">

            <div class="col-lg-5 d-flex align-items-center order-2 order-lg-1" data-aos="fade-right" data-aos-delay="100">

                <div class="content">
                    <h3>{{ __('messages.quality_product') }}</h3>
                    <ul class="my-4">
                        <li class="my-3"><i
                                class="bi bi-award flex-shrink-0"></i>{{ __('messages.unique_collection') }}</li>
                        <li class="my-3"><i class="bi bi-easel flex-shrink-0"></i>{{ __('messages.mission') }}</li>
                        <li class="my-3"><i class="bi bi-patch-check flex-shrink-0"></i>{{ __('messages.vision') }}
                        </li>
                        <li class="my-3"><i
                                class="bi bi-brightness-high flex-shrink-0"></i>{{ __('messages.strategy') }}</li>
                    </ul>
                </div>


            </div>

            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('images/factory/machine.jpeg') }}" class="img-fluid" alt="">
            </div>

        </div><!-- Features Item -->

    </div>

</section><!-- /Features Details Section -->

<section id="more-features" class="more-features section">

    <div class="container">

        <div class="row justify-content-around gy-4">

            <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-2" data-aos="fade-up"
                data-aos-delay="100">
                <h3>{{ __('messages.quality_goal') }}</h3>
                <p>{{ __('messages.quality_description') }}</p>

                <div class="row">

                    <div class="col-lg-6 icon-box d-flex">
                        <i class="bi bi-easel flex-shrink-0"></i>
                        <div>
                            <h4>{{ __('messages.strong_support') }}</h4>
                            <p>{{ __('messages.strong_support_description') }}</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="col-lg-6 icon-box d-flex">
                        <i class="bi bi-bar-chart flex-shrink-0"></i>
                        <div>
                            <h4>{{ __('messages.technical_knowledge') }}</h4>
                            <p>{{ __('messages.technical_knowledge_description') }}</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="col-lg-6 icon-box d-flex">
                        <i class="bi bi-bank flex-shrink-0"></i>
                        <div>
                            <h4>{{ __('messages.large_projects') }}</h4>
                            <p>{{ __('messages.large_projects_description') }}</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="col-lg-6 icon-box d-flex">
                        <i class="bi bi-brightness-high flex-shrink-0"></i>
                        <div>
                            <h4>{{ __('messages.customer_needs') }}</h4>
                            <p>{{ __('messages.customer_needs_description') }}</p>
                        </div>
                    </div><!-- End Icon Box -->

                </div>

            </div>

            <div class="features-image col-lg-5 order-1 order-lg-1 tab-content" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('images/factory/slab.jpeg') }}" alt="" class="rounded-5">
            </div>

        </div>


    </div>

</section>
