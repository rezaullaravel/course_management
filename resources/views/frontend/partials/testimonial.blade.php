<section class="testimonial position-relative">
    <img src="{{ asset('/') }}frontend/images/testimonial-flower.svg" class="position-absolute top-0 start-0"
        alt="" width="20%" />
    <img src="{{ asset('/') }}frontend/images/testimonial-flower.svg" class="position-absolute top-0 end-0"
        alt="" width="20%" />
    <img src="{{ asset('/') }}frontend/images/testimonial-flower.svg"
        class="position-absolute bottom-0 start-0 left-img-flower" alt="" width="20%" />
    <img src="{{ asset('/') }}frontend/images/testimonial-flower.svg" class="position-absolute bottom-0 end-0"
        alt="" width="20%" />

    <div class="container gap-60">
        <!-- section heading -->
        <div class="gap-16 flex-column">
            <!-- Heading button -->
            <button class="small-btn gap-8 flex-row align-items-center mx-auto">
                <div class="circle-8"></div>
                @if (session()->get('lang') == 'bangla')
                    প্রশংসাপত্র
                @else
                    Testimonial
                @endif
            </button>

            <!-- heading -->
            @if (session()->get('lang') == 'bangla')
                <h3 class="section-heading mx-auto">
                    ছাত্র ছাত্রীরা আমাদের
                    <span class="title-container">
                        <span class="highlight">প্ল্যাটফর্ম
                            <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg"
                                alt="" />
                        </span>
                    </span>
                    সম্পর্কে যা বলে
                </h3>
            @else
                <h3 class="section-heading mx-auto">
                    What students say about our
                    <span class="title-container">
                        <span class="highlight">platform
                            <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg"
                                alt="" />
                        </span>
                    </span>
                </h3>
            @endif

        </div>

        {{-- fetch testimonials --}}
        @php
            $testimonials = App\Models\Testimonial::get();
        @endphp
        <!-- main -->
        <div id="carouselExampleControlsNoTouching" data-bs-touch="true"
            class="carousel slide d-flex flex-wrap flex-lg-nowrap flex-col flex-lg-row justify-content-center justify-content-lg-between align-items-center testimonial-card">
            <div type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev"
                class="icon carousel-control-prev d-flex justify-content-center align-items-center bg-white order-2 order-lg-1">
                <img class="" src="{{ asset('/') }}frontend/images/i-left-arrow.svg" alt=""
                    width="24px" />
            </div>


            <div class="carousel-inner order-1 order-lg-2">
                @foreach ($testimonials as $index => $row)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="gap-40 align-items-center">
                            <img src="{{ asset('/') }}frontend/images/logo-testimonial.svg" alt="" />
                            <p class="text">
                                @if (session()->get('lang') == 'bangla')
                                    {{ $row->description_bn }}
                                @else
                                    {{ $row->description_en }}
                                @endif
                            </p>

                            <div class="gap-16 flex-row">
                                <img class="img-fluid rounded-circle" src="{{ asset($row->image) }}" alt="" width="50" />
                                <div class="text-nowrap text-start d-flex flex-column justify-content-between">
                                    <p class="fs-6 fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {{ $row->name_bn }}
                                        @else
                                            {{ $row->name_en }}
                                        @endif
                                    </p>
                                    <p class="p-12">
                                        @if (session()->get('lang') == 'bangla')
                                            {{ $row->country_bn }}
                                        @else
                                            {{ $row->country_en }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <div type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next"
                class="icon carousel-control-next d-flex justify-content-center align-items-center bg-white order-3 rigth-arrow active">
                <img class="" src="{{ asset('/') }}frontend/images/i-left-arrow.svg" alt=""
                    width="24px" />
            </div>
        </div>
    </div>
</section>
