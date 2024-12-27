<section class="container gap-60 flex-column testimonial">
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
        @if (session()->get('lang')=='bangla')
            <h3 class="section-heading mx-auto">
                ছাত্র ছাত্রীরা আমাদের
                <span class="title-container">
                    <span class="highlight">প্ল্যাটফর্ম
                        <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg" alt="" />
                    </span>
                </span>
                সম্পর্কে যা বলে
            </h3>
        @else
            <h3 class="section-heading mx-auto">
                What students say about our
                <span class="title-container">
                    <span class="highlight">platform
                        <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg" alt="" />
                    </span>
                </span>
            </h3>
        @endif

    </div>

    <!-- main -->
    <div
        class="d-flex flex-wrap flex-lg-nowrap flex-col flex-lg-row justify-content-center justify-content-lg-between align-items-center testimonial-card">
        <div class="icon d-flex justify-content-center align-items-center bg-white order-2 order-lg-1">
            <img class="" src="{{ asset('/') }}frontend/images/i-left-arrow.svg" alt=""
                width="24px" />
        </div>

        <div class="gap-40 align-items-center order-1 order-lg-2">
            <img src="{{ asset('/') }}frontend/images/logo-testimonial.svg" alt="" />
            <p class="fs-5">
                We provide Quran lessons and all of our courses round the clock.
                Which help you and your kids to learn holy Quran / all courses
                quickly and smoothly. We provide Quran lessons and all of our
                courses round the clock. Which help you and your kids to learn holy
                Quran / all courses quickly and smoothly.
            </p>

            <div class="gap-16 flex-row">
                <img class="" src="{{ asset('/') }}frontend/images/avatar.svg" alt="" />

                <div class="text-nowrap text-start d-flex flex-column justify-content-between">
                    <p class="fs-6 fw-medium">Abdul Karim</p>
                    <p class="p-12">Graduate Student</p>
                </div>
            </div>
        </div>


        <div class="icon d-flex justify-content-center align-items-center bg-white order-3 rigth-arrow active">
            <img class="" src="{{ asset('/') }}frontend/images/i-left-arrow.svg" alt=""
                width="24px" />
        </div>
    </div>

    <div class="ruled-grid"></div>
</section>
