@php
    $company = App\Models\LandingCompany::orderBy('id', 'ASC')->get();
@endphp

<section id="companies" class="projects">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Our Companies</h2>

        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
            data-portfolio-sort="original-order">



            <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($company as $item)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                        <a href="{{ url('fashion') }}">
                            <div class="portfolio-content h-100">
                                <img src="{{ asset($item->landing_company_image) }}" class="img-fluid" alt=""
                                    style="height: 267px;">
                                <div class="portfolio-info">


                                    <h4 style="font-size: 40px;">{{ $item->landing_company_title }}</h4>


                                </div>
                            </div>
                        </a>
                    </div><!-- End Projects Item -->
                @endforeach
            </div><!-- End Projects Container -->

        </div>

    </div>
</section>
