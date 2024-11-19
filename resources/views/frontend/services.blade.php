@extends('frontend.home')
@section('frontend')


<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Services</h1>
                        <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint
                            voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores.
                            Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="current">Services</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item  position-relative">
                        <div class="icon">
                            <i class="bi bi-activity"></i>
                        </div>
                        <a href="service-details.html" class="stretched-link">
                            <h3>Nesciunt Mete</h3>
                        </a>
                        <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure
                            perferendis tempore et consequatur.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-broadcast"></i>
                        </div>
                        <a href="service-details.html" class="stretched-link">
                            <h3>Eosle Commodi</h3>
                        </a>
                        <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic
                            non ut nesciunt dolorem.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-easel"></i>
                        </div>
                        <a href="service-details.html" class="stretched-link">
                            <h3>Ledo Markt</h3>
                        </a>
                        <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas
                            adipisci eos earum corrupti.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-bounding-box-circles"></i>
                        </div>
                        <a href="service-details.html" class="stretched-link">
                            <h3>Asperiores Commodit</h3>
                        </a>
                        <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit
                            provident adipisci neque.</p>
                        <a href="service-details.html" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-calendar4-week"></i>
                        </div>
                        <a href="service-details.html" class="stretched-link">
                            <h3>Velit Doloremque</h3>
                        </a>
                        <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi
                            at autem alias eius labore.</p>
                        <a href="service-details.html" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-chat-square-text"></i>
                        </div>
                        <a href="service-details.html" class="stretched-link">
                            <h3>Dolori Architecto</h3>
                        </a>
                        <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure.
                            Corrupti recusandae ducimus enim.</p>
                        <a href="service-details.html" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->




                @foreach ($services as $service)

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">

                        <div class="service-item position-relative">
                            <div>
                                <!-- <a href="https://icons.getbootstrap.com/icons/{{$service->photo}}" class="icon"
                                                    target="blank"><i class="bi bi-{{$service->photo}}"></i></a>-->
                                <a href="https://icons.getbootstrap.com/icons/{{$service->photo}}" class="icon"
                                    target="blank"><i class="bi {{$service->photo}}"></i></a>

                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>
                                    {{$service->title}}
                                </h3>
                            </a>
                            <p>{{$service->description}}</p>
                            <a href="service-details.html" class="stretched-link"></a>
                        </div>

                    </div><!-- End Service Item -->
                @endforeach



            </div>

        </div>

    </section><!-- /Services Section -->

</main>


@endsection