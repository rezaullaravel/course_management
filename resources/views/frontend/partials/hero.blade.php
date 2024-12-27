<section class="hero">
    <div class="container">
        <!-- Support image -->
        <div class="hero-left-card d-none d-sm-block">
            <img class="img-fluid hero-left-img" src="{{ asset('/') }}frontend/images/hero-left-card.svg"
                alt="" />

            <img class="spread" src="{{ asset('/') }}frontend/images/spread.svg" alt="" />
        </div>
        <!-- Support image -->
        <img class="hero-right-card img-fluid d-none d-sm-block"
            src="{{ asset('/') }}frontend/images/hero-right-card.svg" alt="" />

        <!-- Hero heading -->
        <div class="text-box flex-column gap-32 text-center position-relative">
            <!--Small heading -->
            <div class="">
                <p class="hero-small-heading rounded-100">

                    @if (session()->get('lang') == 'bangla')
                        # বিশ্বের ১ নং ইসলামিক অনলাইন প্ল্যাটফর্ম
                    @else
                        # World 01 Islamic Online platform
                    @endif
                </p>
            </div>

            <!-- heading -->
            <h1 class="position-relative w-100 mx-w-fit">
                @if (session()->get('lang') == 'bangla')
                    <img class="spread d-sm-none" src="{{ asset('/') }}frontend/images/spread.svg" alt="" />
                    তালিমুস
                    <span>সুন্নাহ
                        <img class="arrow-line d-none d-md-block"
                            src="{{ asset('/') }}frontend/images/arrow-line.svg" alt="" />
                    </span>
                @else
                    <img class="spread d-sm-none" src="{{ asset('/') }}frontend/images/spread.svg" alt="" />
                    Talimus
                    <span>Sunnah
                        <img class="arrow-line d-none d-md-block"
                            src="{{ asset('/') }}frontend/images/arrow-line.svg" alt="" />
                    </span>
                @endif

            </h1>
            <p>

                @if (session()->get('lang') == 'bangla')
                    বিশ্বস্ত আলেমদের দ্বারা পরিচালিত ইসলামী জ্ঞানের যাত্রা শুরু করুন
                    হৃদয়কে অনুপ্রাণিত করতে এবং <br />
                    মন, বিশ্বাস এবং বোঝার সমৃদ্ধি
                @else
                    Embark on a journey of Islamic knowledge, guided by trusted scholars
                    to inspire hearts and <br />
                    minds, enriching faith and understanding
                @endif
            </p>

            <div class="d-flex margin-auto">
                <button class="btn btn-lg btn-primary rounded-pill">

                    @if (session()->get('lang') == 'bangla')
                        ফ্রি ক্লাসের জন্য
                    @else
                        For Free Class
                    @endif
                </button>
                <button class="btn btn-p-18 btn-primary rounded-pill">
                    <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                </button>
            </div>
        </div>

        <img src="{{ asset('/') }}frontend/images/hero-image.svg" width="100%" alt="" />
    </div>
</section>
