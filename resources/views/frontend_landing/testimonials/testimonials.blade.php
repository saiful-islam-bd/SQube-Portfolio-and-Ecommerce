@php
        $landing_testimonial = App\Models\LandingTestimonial::orderBy('id', 'ASC')->get();
    @endphp

<section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Testimonials</h2>
     
        </div>

        <div class="slides-2 swiper">
            <div class="swiper-wrapper">
                @foreach ($landing_testimonial as $item)
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="{{ asset($item->landing_testimonial_image) }}"
                                    class="testimonial-img" alt="">
                                <h3>{{ $item->landing_testimonial_name }}</h3>
                                <h4>{{ $item->landing_testimonial_designation }}</h4>
                                
                                <p>
                                    {!! $item->landing_testimonial_paragraph !!}
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->
                @endforeach
             

            

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>
