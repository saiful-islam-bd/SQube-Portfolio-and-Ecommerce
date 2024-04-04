@php
    $landing_service = App\Models\LandingService::orderBy('id', 'ASC')->get();
@endphp

<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Services</h2>

        </div>

        <div class="row gy-4">
            @foreach ($landing_service as $item)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item  position-relative">

                        <img src="{{ asset($item->landing_service_image) }}" class="testimonial-img" alt="">

                        <h3>{{ $item->landing_service_title }}</h3>
                        <p style="text-align:justify;margin-top:10px"> {!! $item->landing_short_title !!}</p>
                        <a href="service-details.html" class="readmore stretched-link">Learn more <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->
            @endforeach


        </div>

    </div>
</section>
