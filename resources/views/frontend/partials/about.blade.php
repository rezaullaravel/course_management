<section class="we-are">
    <div class="container gap-30">
        <!-- top -->
        <div class="top gap-30 flex-col justify-content-center flex-lg-row">
            <!-- left -->
            <div class="text-b-x d-flex flex-column justify-content-between flex-basis-50 text-center text-lg-start">
                <div class="">
                    <button class="mx-auto mx-lg-0 small-btn gap-8 align-items-center flex-row">
                        <div class="circle-8"></div>

                        @if (session()->get('lang') == 'bangla')
                            আমাদের সম্পর্কে
                        @else
                            About Us
                        @endif
                    </button>
                </div>
                <h3 class="section-heading">
                    @if (session()->get('lang') == 'bangla')
                        আমরা
                        <span class="title-container">
                            <span class="highlight">কে
                                <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg"
                                    alt="" />
                            </span>
                        </span>
                    @else
                        Who
                        <span class="title-container">
                            <span class="highlight">We Are
                                <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg"
                                    alt="" />
                            </span>
                        </span>
                    @endif

                </h3>

                <p>
                    @if (session()->get('lang') == 'bangla')
                        আমাদের লক্ষ্য সঠিক, সম্মানজনক এবং আকর্ষক প্রদান করা
                        বিষয়বস্তু যা ইসলাম সম্পর্কে গভীর উপলব্ধি বাড়ায়, উন্নত করে
                        আধ্যাত্মিক বৃদ্ধি, এবং সাদৃশ্য প্রচার করে।
                    @else
                        Our mission is to provide accurate, respectful, and engaging
                        content that fosters a deeper understanding of Islam, enhances
                        spiritual growth, and promotes harmony.
                    @endif

                </p>

                <div>
                    <div class="d-none d-lg-flex">
                        <button class="btn btn-lg btn-primary rounded-pill">

                            @if (session()->get('lang') == 'bangla')
                                আমাদের সম্পর্কে পড়ুন
                            @else
                                Read us
                            @endif
                        </button>
                        <button class="btn btn-p-18 btn-primary rounded-pill">
                            <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                        </button>
                    </div>
                </div>
            </div>

            <div class="line"></div>
            <!-- right -->
            <img class="flex-basis-50" src="{{ asset('/') }}frontend/images/three-man.svg" alt="" />
        </div>

        <!-- line -->
        <div class="line"></div>

        <!-- bootom -->
        <div class="row g-2 g-lg-4 bottom">
            <div class="col-6 col-lg-3">
                <div class="custom-card rounded-3 gradient-border">
                    <h2 class="color-primary">
                        @if (session()->get('lang') == 'bangla')
                        ৭ কে
                        @else
                        7k
                        @endif
                    </h2>
                    <p class="color-text fw-medium p-20">

                        @if (session()->get('lang') == 'bangla')
                        সফল কোর্স
                        @else
                        successful Courses
                        @endif
                    </p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="custom-card rounded-3">
                    <h2 class="color-primary">

                        @if (session()->get('lang') == 'bangla')
                        ৩০০+
                        @else
                        300+
                        @endif
                    </h2>
                    <p class="color-text fw-medium p-20">
                        @if (session()->get('lang') == 'bangla')
                        ৫-স্টার রেটিং
                        @else
                        5-Star ratings
                        @endif

                    </p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="custom-card rounded-3">
                    <h2 class="color-primary">
                        @if (session()->get('lang') == 'bangla')
                        ১০০+
                        @else
                        100+
                        @endif

                    </h2>
                    <p class="color-text fw-medium p-20">
                        @if (session()->get('lang') == 'bangla')
                        শিক্ষক
                        @else
                        Teachers
                        @endif
                    </p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="custom-card rounded-3">
                    <h2 class="color-primary">
                        @if (session()->get('lang') == 'bangla')
                        ১২+
                        @else
                        12+
                        @endif
                    </h2>
                    <p class="color-text fw-medium p-20">
                        @if (session()->get('lang') == 'bangla')
                        বছরের অভিজ্ঞ
                        @else
                        Years Experiences
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
