@php
    $main_team = App\Models\LandingTeam::orderBy('id', 'ASC')->get();
@endphp
<section id="team" class="team">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Our Team</h2>
        </div>

        <div class="row gy-5">

            @foreach ($main_team as $item)
                <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-img">
                        <a href="{{ route('subteam', $item->id) }}">
                            <img src="{{ asset($item->landing_team_image) }}" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="member-info text-center">
                        <a href="sub_team.php">
                            <h4>{{ $item->landing_team_name }}</h4>
                        </a>
                        <span>{{ $item->landing_team_designation }}</span>
                        <p>{{ $item->landing_team_paragraph }}</p>
                    </div>
                </div><!-- End Team Member -->
            @endforeach



        </div>

    </div>
</section>
