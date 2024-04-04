@php
        $landing_about = App\Models\LandingAbout::orderBy('id', 'ASC')->get();
    @endphp

<section id="about" class="about" style="margin-top: 0px;margin-bottom: 3rem;">
    <div class="container" data-aos="fade-up">

        @foreach ($landing_about as $item)
        <div class="row position-relative">

            <div class="col-lg-7 about-img"
                style="background-image: url({{ asset($item->landing_about_image) }})"></div>

            <div class="col-lg-7">
                <div class="our-story">
                    <h3>About Sqube</h3>
                    <p>{!! $item->landing_about_description !!}</p>

                </div>
            </div>

        </div>
        @endforeach

    </div>
</section>
