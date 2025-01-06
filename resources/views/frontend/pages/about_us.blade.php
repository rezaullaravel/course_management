@extends('frontend.master')

@section('title')
    {{ 'About Us Page' }}
@endsection
@section('content')


    <div class="container gap-60 our-mission">
        <!-- heading -->
        <div class="gap-32">


            @if (session()->get('lang') == 'bangla')
                <h3 class="section-heading text-center">
                    আমাদের
                    <span class="title-container">
                        <span class="highlight">
                            অভিযান ও লক্ষ্য
                            <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector-ex-lg.svg"
                                alt="" />
                        </span>
                    </span>
                </h3>
            @else
                <h3 class="section-heading text-center">
                    What Is Our
                    <span class="title-container">
                        <span class="highlight">
                            Mission & Vision
                            <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector-ex-lg.svg"
                                alt="" />
                        </span>
                    </span>
                </h3>
            @endif

            <div class="line"></div>
        </div>

        <div class="gap-24">
            <h5 class="d-none d-lg-flex">
                @if (session()->get('lang') == 'bangla')
                    {{ $about->title_bn }}
                @else
                    {{ $about->title_en }}
                @endif
            </h5>
            <!-- our mission detailes -->
            <div class="our-mission-detailes d-flex">
                <!-- top -->
                <div class="gap-24 flex-column flex-lg-row">
                    <!-- left -->
                    <div class="row g-4 align-items-start">
                        <div class="col-5">
                            <img width="100%" src="{{ asset($about->image1) }}" alt="" />
                            <div class="mt-4">
                                <p class="p-50">SINCE</p>
                                <p class="p-70">2011</p>
                            </div>
                        </div>

                        <img class="col-7 object-fit-cover" src="{{ asset($about->image2) }}" alt=""
                            width="100%" />
                    </div>

                    <!-- right -->
                    <div class="gap-32 basis-40">
                        <div class="gap-24">
                            <h5>
                                @if (session()->get('lang') == 'bangla')
                                    {{ $about->title1_bn }}
                                @else
                                    {{ $about->title1_en }}
                                @endif
                            </h5>
                            <p class="fs-6">
                                @if (session()->get('lang') == 'bangla')
                                    {!! $about->description1_bn !!}
                                @else
                                    {!! $about->description1_en !!}
                                @endif
                            </p>
                        </div>

                        <div class="gap-10">

                            @if (!empty($about->feature1_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->feature1_bn !!}
                                        @else
                                            {!! $about->feature1_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->feature2_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/frontend/images/i-arrow-block-right.svg') }}" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->feature2_bn !!}
                                        @else
                                            {!! $about->feature2_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->feature3_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/frontend/images/i-arrow-block-right.svg') }}" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->feature3_bn !!}
                                        @else
                                            {!! $about->feature3_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->feature4_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/frontend/images/i-arrow-block-right.svg') }}" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->feature4_bn !!}
                                        @else
                                            {!! $about->feature4_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->feature5_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/frontend/images/i-arrow-block-right.svg') }}" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->feature5_bn !!}
                                        @else
                                            {!! $about->feature5_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->feature6_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/frontend/images/i-arrow-block-right.svg') }}" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->feature6_bn !!}
                                        @else
                                            {!! $about->feature6_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->feature7_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/frontend/images/i-arrow-block-right.svg') }}" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->feature7_bn !!}
                                        @else
                                            {!! $about->feature7_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->feature8_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/frontend/images/i-arrow-block-right.svg') }}" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->feature8_bn !!}
                                        @else
                                            {!! $about->feature8_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->feature9_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/frontend/images/i-arrow-block-right.svg') }}" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->feature9_bn !!}
                                        @else
                                            {!! $about->feature9_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->feature10_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/frontend/images/i-arrow-block-right.svg') }}" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->feature10_bn !!}
                                        @else
                                            {!! $about->feature10_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- bottom -->
                <div class="gap-24 flex-col flex-lg-row">
                    <!-- left -->
                    <div class="gap-32 basis-40">
                        <div class="gap-24">
                            <h5>
                                @if (session()->get('lang') == 'bangla')
                                    {{ $about->title2_bn }}
                                @else
                                    {{ $about->title2_en }}
                                @endif
                            </h5>
                            <p class="fs-6">
                                @if (session()->get('lang') == 'bangla')
                                    {!! $about->description2_bn !!}
                                @else
                                    {!! $about->description2_en !!}
                                @endif
                            </p>
                        </div>

                        <div class="gap-10">

                            @if (!empty($about->footer_topic1_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->footer_topic1_bn !!}
                                        @else
                                            {!! $about->footer_topic1_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->footer_topic2_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->footer_topic2_bn !!}
                                        @else
                                            {!! $about->footer_topic2_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->footer_topic3_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->footer_topic3_bn !!}
                                        @else
                                            {!! $about->footer_topic3_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->footer_topic4_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->footer_topic4_bn !!}
                                        @else
                                            {!! $about->footer_topic4_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->footer_topic5_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->footer_topic5_bn !!}
                                        @else
                                            {!! $about->footer_topic5_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->footer_topic6_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->footer_topic6_bn !!}
                                        @else
                                            {!! $about->footer_topic6_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->footer_topic7_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->footer_topic7_bn !!}
                                        @else
                                            {!! $about->footer_topic7_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->footer_topic8_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->footer_topic8_bn !!}
                                        @else
                                            {!! $about->footer_topic8_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->footer_topic9_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->footer_topic9_bn !!}
                                        @else
                                            {!! $about->footer_topic9_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif

                            @if (!empty($about->footer_topic10_en))
                                <div class="gap-12 flex-row fact">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $about->footer_topic10_bn !!}
                                        @else
                                            {!! $about->footer_topic10_en !!}
                                        @endif
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- right -->
                    <div class="row g-2 g-lg-4 align-items-start basis-60 right">
                        <div class="gap-28 order-2 order-lg-1 col-5">
                            <img class="img-fluid" src="{{ asset($about->image3) }}"
                                alt="" />
                            <div class="text-end">
                                <p class="p-50">30k+</p>
                                <p class="p-38 text-nowrap">Happy Clients</p>
                            </div>
                        </div>

                        <img class="img-fluid order-1 order-lg-2 col-7"
                            src="{{ asset($about->image4) }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Our Instructors -->
    @include('frontend.partials.teacher')

    <!-- our course -->
    @include('frontend.partials.course')

    <!-- E-books -->
    @include('frontend.partials.ebook')


    <!-- Blog -->
    @include('frontend.partials.blog')


@endsection
