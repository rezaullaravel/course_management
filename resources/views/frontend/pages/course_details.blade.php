@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
@endphp

@extends('frontend.master')

@section('title')
    {{ 'Course Details' }}
@endsection
@section('content')
    {{-- course details --}}
    <section class="course-details gap-60 container">
        <!-- Page heading -->
        <div class="gap-32">
            <div class="d-flex align-items-center">
                <img class="i-black-arrow" src="{{ asset('/') }}frontend/images/i-back-arrow.svg" alt="" />
                <h5 class="text-center w-100">

                    @if (session()->get('lang') == 'bangla')
                        কোর্সের <span class="color-primary">/ বিস্তারিত</span>
                    @else
                        Course <span class="color-primary">/ Details</span>
                    @endif
                </h5>
            </div>
            <div class="line"></div>
        </div>

        <!-- detailes -->
        <div class="gap-24 detailes">
            <h4>
                @if (session()->get('lang') == 'bangla')
                    {{ $course->title_bn }}
                @else
                    {{ $course->title_en }}
                @endif /
                @if (session()->get('lang') == 'bangla')
                    {{ $numto->bnNum($course->price_bn) }} ৳
                @else
                    {{-- {{ $course->price_en }} $ --}}
                @endif
            </h4>

            <div class="position-relative">
                @if (!empty($course->video_url))
                    <div class="ratio ratio-16x9">
                        {!! $course->video_url !!}
                    </div>
                @else
                    <img class="w-100" src="{{ asset($course->image) }}" alt="" />
                    <img class="position-absolute top-50 start-50 translate-middle"
                        src="{{ asset('/') }}frontend/images/i-paly.svg" alt="" />
                @endif
            </div>

            <!-- Information In Details -->
            <div class="gap-32 flex-column flex-md-row">
                <!-- left -->
                <div class="left gap-60">
                    <!--Tab buttons -->

                    <ul class="gap-16 flex-row w-100 overflow-x-auto p-0" id="myTab" role="tablist">
                        <li class="nav-item text-nowrap" role="presentation">
                            <button class="active btn btn-lg btn-primary-50" id="" data-bs-toggle="tab"
                                data-bs-target="#overview-tab-pane" type="button" role="tab"
                                aria-controls="overview-tab-pane" aria-selected="true">
                                @if (session()->get('lang') == 'bangla')
                                    কোর্স ওভারভিউ
                                @else
                                    Course Overview
                                @endif
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <!-- Details tabs -->
                        <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel"
                            aria-labelledby="overview-tab" tabindex="0">
                            <!-- Details -->
                            <div class="gap-32">
                                <!-- Information In Details -->
                                <div class="gap-24">
                                    <h5>
                                        @if (session()->get('lang') == 'bangla')
                                            বিস্তারিত তথ্য
                                        @else
                                            Information In Details
                                        @endif
                                    </h5>

                                    <p>
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $course->content_bn !!}
                                        @else
                                            {!! $course->content_en !!}
                                        @endif
                                    </p>

                                    <h5>
                                        @if (session()->get('lang') == 'bangla')
                                            এই কোর্সে আপনি যা শিখবেন
                                        @else
                                            In this course what you will learn
                                        @endif
                                    </h5>

                                    <!-- facts -->
                                    <div class="gap-10 facts" id="accordionExample">
                                        @if (!empty($course->topic1_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic1_bn }}
                                                        @else
                                                            {{ $course->topic1_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($course->topic2_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic2_bn }}
                                                        @else
                                                            {{ $course->topic2_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($course->topic3_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic3_bn }}
                                                        @else
                                                            {{ $course->topic3_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($course->topic4_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic4_bn }}
                                                        @else
                                                            {{ $course->topic4_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($course->topic5_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic5_bn }}
                                                        @else
                                                            {{ $course->topic5_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                        @if (!empty($course->topic6_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic6_bn }}
                                                        @else
                                                            {{ $course->topic6_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($course->topic7_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic7_bn }}
                                                        @else
                                                            {{ $course->topic7_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($course->topic8_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic8_bn }}
                                                        @else
                                                            {{ $course->topic8_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($course->topic9_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic9_bn }}
                                                        @else
                                                            {{ $course->topic9_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                        @if (!empty($course->topic10_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic10_bn }}
                                                        @else
                                                            {{ $course->topic10_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($course->topic11_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic11_bn }}
                                                        @else
                                                            {{ $course->topic11_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                        @if (!empty($course->topic12_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic12_bn }}
                                                        @else
                                                            {{ $course->topic12_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($course->topic13_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic13_bn }}
                                                        @else
                                                            {{ $course->topic13_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($course->topic14_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic14_bn }}
                                                        @else
                                                            {{ $course->topic14_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($course->topic15_en))
                                            <div class="gap-12">
                                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                        alt="" />
                                                    <p class="p-18 color-text fw-medium">

                                                        @if (session()->get('lang') == 'bangla')
                                                            {{ $course->topic15_bn }}
                                                        @else
                                                            {{ $course->topic15_en }}
                                                        @endif

                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>{{-- gap-10 --}}
                                </div>
                                <!-- Another Important Information You have to know -->
                                <div class="gap-32">
                                    <div class="gap-24">
                                        <h5>
                                            @if (session()->get('lang') == 'bangla')
                                                অন্যান্য গুরুত্বপূর্ণ তথ্য আপনি শিখতে পারবেন
                                            @else
                                                Another Important Information You will learn
                                            @endif
                                        </h5>
                                        @if (File::exists($course->image2))
                                            <img src="{{ asset($course->image2) }}" alt="" />
                                        @else
                                        @endif

                                        <p>
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $course->content2_bn !!}
                                            @else
                                                {!! $course->content2_en !!}
                                            @endif
                                        </p>
                                    </div>

                                    <!-- facts -->
                                    <div class="gap-10">
                                        @if (!empty($course->footer_topic1_en))
                                            <div class="gap-12 flex-row fact">
                                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                    alt="" />
                                                <p class="p-18 color-text fw-medium">
                                                    <span class="fw-medium color-text">
                                                        @if (session()->get('lang') == 'bangla')
                                                            {!! $course->footer_topic1_bn !!}
                                                        @else
                                                            {!! $course->footer_topic1_en !!}
                                                        @endif
                                                    </span>

                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($course->footer_topic2_en))
                                            <div class="gap-12 flex-row fact">
                                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                    alt="" />
                                                <p class="p-18 color-text fw-medium">
                                                    <span class="fw-medium color-text">
                                                        @if (session()->get('lang') == 'bangla')
                                                            {!! $course->footer_topic2_bn !!}
                                                        @else
                                                            {!! $course->footer_topic2_en !!}
                                                        @endif
                                                    </span>

                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($course->footer_topic3_en))
                                            <div class="gap-12 flex-row fact">
                                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                    alt="" />
                                                <p class="p-18 color-text fw-medium">
                                                    <span class="fw-medium color-text">
                                                        @if (session()->get('lang') == 'bangla')
                                                            {!! $course->footer_topic3_bn !!}
                                                        @else
                                                            {!! $course->footer_topic3_en !!}
                                                        @endif
                                                    </span>

                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($course->footer_topic4_en))
                                            <div class="gap-12 flex-row fact">
                                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                    alt="" />
                                                <p class="p-18 color-text fw-medium">
                                                    <span class="fw-medium color-text">
                                                        @if (session()->get('lang') == 'bangla')
                                                            {!! $course->footer_topic4_bn !!}
                                                        @else
                                                            {!! $course->footer_topic4_en !!}
                                                        @endif
                                                    </span>

                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($course->footer_topic5_en))
                                            <div class="gap-12 flex-row fact">
                                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                    alt="" />
                                                <p class="p-18 color-text fw-medium">
                                                    <span class="fw-medium color-text">
                                                        @if (session()->get('lang') == 'bangla')
                                                            {!! $course->footer_topic5_bn !!}
                                                        @else
                                                            {!! $course->footer_topic5_en !!}
                                                        @endif
                                                    </span>

                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($course->footer_topic6_en))
                                            <div class="gap-12 flex-row fact">
                                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                    alt="" />
                                                <p class="p-18 color-text fw-medium">
                                                    <span class="fw-medium color-text">
                                                        @if (session()->get('lang') == 'bangla')
                                                            {!! $course->footer_topic6_bn !!}
                                                        @else
                                                            {!! $course->footer_topic6_en !!}
                                                        @endif
                                                    </span>

                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($course->footer_topic7_en))
                                            <div class="gap-12 flex-row fact">
                                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                    alt="" />
                                                <p class="p-18 color-text fw-medium">
                                                    <span class="fw-medium color-text">
                                                        @if (session()->get('lang') == 'bangla')
                                                            {!! $course->footer_topic7_bn !!}
                                                        @else
                                                            {!! $course->footer_topic7_en !!}
                                                        @endif
                                                    </span>

                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($course->footer_topic8_en))
                                            <div class="gap-12 flex-row fact">
                                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                    alt="" />
                                                <p class="p-18 color-text fw-medium">
                                                    <span class="fw-medium color-text">
                                                        @if (session()->get('lang') == 'bangla')
                                                            {!! $course->footer_topic8_bn !!}
                                                        @else
                                                            {!! $course->footer_topic8_en !!}
                                                        @endif
                                                    </span>

                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($course->footer_topic9_en))
                                            <div class="gap-12 flex-row fact">
                                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                    alt="" />
                                                <p class="p-18 color-text fw-medium">
                                                    <span class="fw-medium color-text">
                                                        @if (session()->get('lang') == 'bangla')
                                                            {!! $course->footer_topic9_bn !!}
                                                        @else
                                                            {!! $course->footer_topic9_en !!}
                                                        @endif
                                                    </span>

                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($course->footer_topic10_en))
                                            <div class="gap-12 flex-row fact">
                                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                                    alt="" />
                                                <p class="p-18 color-text fw-medium">
                                                    <span class="fw-medium color-text">
                                                        @if (session()->get('lang') == 'bangla')
                                                            {!! $course->footer_topic10_bn !!}
                                                        @else
                                                            {!! $course->footer_topic10_en !!}
                                                        @endif
                                                    </span>

                                                </p>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right -->
                <div class="right">
                    <div class="gap-32">
                        <!-- Course features -->
                        <div class="gap-32 course-feature">
                            <h5>
                                @if (session()->get('lang') == 'bangla')
                                    কোর্সের বৈশিষ্ট্য সমূহ
                                @else
                                    Course Features
                                @endif
                            </h5>
                            <div class="gap-20">
                                @if (!empty($course->feature1_en))
                                    <div class="gap-12 flex-row">
                                        <img src="{{ asset('/') }}frontend/images/video.svg" alt="" />
                                        <p>
                                            @if (session()->get('lang') == 'bangla')
                                                {{ $course->feature1_bn }}
                                            @else
                                                {{ $course->feature1_en }}
                                            @endif
                                        </p>
                                    </div>
                                @endif
                                @if (!empty($course->feature2_en))
                                    <div class="gap-12 flex-row">
                                        <img src="{{ asset('/') }}frontend/images/coding.svg" alt="" />
                                        <p>
                                            @if (session()->get('lang') == 'bangla')
                                                {{ $course->feature2_bn }}
                                            @else
                                                {{ $course->feature2_en }}
                                            @endif
                                        </p>
                                    </div>
                                @endif

                                @if (!empty($course->feature3_en))
                                    <div class="gap-12 flex-row">
                                        <img src="{{ asset('/') }}frontend/images/artical.svg" alt="" />
                                        <p>
                                            @if (session()->get('lang') == 'bangla')
                                                {{ $course->feature3_bn }}
                                            @else
                                                {{ $course->feature3_en }}
                                            @endif
                                        </p>
                                    </div>
                                @endif

                                @if (!empty($course->feature4_en))
                                    <div class="gap-12 flex-row">
                                        <img src="{{ asset('/') }}frontend/images/tv.svg" alt="" />
                                        <p>

                                            @if (session()->get('lang') == 'bangla')
                                                {{ $course->feature4_bn }}
                                            @else
                                                {{ $course->feature4_en }}
                                            @endif
                                        </p>
                                    </div>
                                @endif

                                @if (!empty($course->feature5_en))
                                    <div class="gap-12 flex-row">
                                        <img src="{{ asset('/') }}frontend/images/certicicate.png" alt="" />
                                        <p>
                                            @if (session()->get('lang') == 'bangla')
                                                {{ $course->feature5_bn }}
                                            @else
                                                {{ $course->feature5_en }}
                                            @endif
                                        </p>
                                    </div>
                                @endif

                                @if (!empty($course->feature6_en))
                                    <div class="gap-12 flex-row">
                                        <img src="{{ asset('/') }}frontend/images/artical.svg" alt="" />
                                        <p>
                                            @if (session()->get('lang') == 'bangla')
                                                {{ $course->feature6_bn }}
                                            @else
                                                {{ $course->feature6_en }}
                                            @endif
                                        </p>
                                    </div>
                                @endif

                                @if (!empty($course->feature7_en))
                                    <div class="gap-12 flex-row">
                                        <img src="{{ asset('/') }}frontend/images/artical.svg" alt="" />
                                        <p>
                                            @if (session()->get('lang') == 'bangla')
                                                {{ $course->feature7_bn }}
                                            @else
                                                {{ $course->feature7_en }}
                                            @endif
                                        </p>
                                    </div>
                                @endif

                                @if (!empty($course->feature8_en))
                                    <div class="gap-12 flex-row">
                                        <img src="{{ asset('/') }}frontend/images/artical.svg" alt="" />
                                        <p>
                                            @if (session()->get('lang') == 'bangla')
                                                {{ $course->feature8_bn }}
                                            @else
                                                {{ $course->feature8_en }}
                                            @endif
                                        </p>
                                    </div>
                                @endif

                                @if (!empty($course->feature9_en))
                                    <div class="gap-12 flex-row">
                                        <img src="{{ asset('/') }}frontend/images/artical.svg" alt="" />
                                        <p>
                                            @if (session()->get('lang') == 'bangla')
                                                {{ $course->feature9_bn }}
                                            @else
                                                {{ $course->feature9_en }}
                                            @endif
                                        </p>
                                    </div>
                                @endif

                                @if (!empty($course->feature10_en))
                                    <div class="gap-12 flex-row">
                                        <img src="{{ asset('/') }}frontend/images/artical.svg" alt="" />
                                        <p>
                                            @if (session()->get('lang') == 'bangla')
                                                {{ $course->feature10_bn }}
                                            @else
                                                {{ $course->feature10_en }}
                                            @endif
                                        </p>
                                    </div>
                                @endif
                            </div>

                            <div class="d-flex justify-content-between">
                                @if (session()->get('lang') == 'bangla')
                                    <a href="{{ route('checkout',$course->id) }}" class="btn btn-lg btn-primary rounded-pill w-100">
                                        এনরোল করুন
                                    </a>
                                @else
                                    <a href="" class="btn btn-lg btn-primary rounded-pill w-100">
                                        Enrole Now
                                    </a>
                                @endif
                                <button class="btn btn-p-18 btn-primary rounded-pill">
                                    <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                                </button>
                            </div>
                        </div>
                        <!-- Course teacher -->
                        <div class="gap-32 course-teacher">
                            <h5>
                                @if (session()->get('lang') == 'bangla')
                                    কোর্স ইন্সট্রাক্টর
                                @else
                                    Course Instructor
                                @endif
                            </h5>

                            <div class="gap-16">
                                <div class="gap-16 flex-row align-items-center">
                                    <img class="img-fluid rounded-circle" src="{{ asset($course->teacher->image) }}"
                                        width="50" alt="" />
                                    <p class="fs-6 fw-medium color-text">

                                        @if (session()->get('lang') == 'bangla')
                                            {{ $course->teacher->name_bn }}
                                        @else
                                            {{ $course->teacher->name }}
                                        @endif
                                    </p>
                                </div>
                                <p>
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $course->teacher->teacher_description_bn }}
                                    @else
                                        {{ $course->teacher->teacher_description }}
                                    @endif
                                </p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('all.course') }}" class="btn btn-lg btn-outline-success rounded-pill w-100">
                                    @if (session()->get('lang') == 'bangla')
                                        সকল কোর্স দেখুন
                                    @else
                                        View All Course
                                    @endif
                                </a>
                                <button class="btn btn-p-18 btn-outline-success rounded-pill">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-primary.svg" alt="" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- course details end --}}

    <!-- related course -->
    <section class="container gap-60 flex-column">
        <!-- Section Heading -->
        <div class="gap-32 flex-column justify-content-center">
            <div class="gap-16 flex-column align-items-center">
                <!-- Heading button -->
                <button class="small-btn gap-8 flex-row align-items-center mx-auto">
                    <div class="circle-8"></div>

                    @if (session()->get('lang') == 'bangla')
                        সাজেস্ট কোর্স
                    @else
                        Suggest Course
                    @endif
                </button>

                <!--  heading -->
                @if (session()->get('lang') == 'bangla')
                    <h3 class="section-heading">
                        আমাদের অন্য কোর্স
                        <span class="title-container">
                            <span class="highlight">চেক করুন
                                <img class="svg-underline" src="../images/Vector.svg" alt="" />
                            </span>
                        </span>
                    </h3>
                @else
                    <h3 class="section-heading">
                        Check Our Other
                        <span class="title-container">
                            <span class="highlight">Courses
                                <img class="svg-underline" src="../images/Vector.svg" alt="" />
                            </span>
                        </span>
                    </h3>
                @endif

            </div>
        </div>

        {{-- fetch related course --}}
        @php
            $related_courses = App\Models\Course::where('course_category_id', $course->course_category_id)
                ->where('id', '!=', $course->id)
                ->where('status', 1)
                ->get();
        @endphp

        <!-- cards -->
        <div class="row g-3">
            @if($related_courses->count()>0)
            @foreach ($related_courses as $course)
                <div class="col-12 col-md-6">
                    <div class="card p-3 gap-24 flex-column gradient-border">
                        <div class="position-relative">


                            @if (!empty($course->video_url))
                                <div class="ratio ratio-16x9">
                                    {!! $course->video_url !!}
                                </div>
                            @else
                                <img src="{{ asset($course->image) }}" class="card-img-top" width="100%" />

                                <img class="position-absolute top-50 start-50 translate-middle"
                                    src="{{ asset('/') }}frontend/images/i-paly.svg" alt="" />
                            @endif
                        </div>

                        <button class="small-btn">
                            @if (session()->get('lang') == 'bangla')
                                {{ $course->category->name_bn }}
                            @else
                                {{ $course->category->name_en }}
                            @endif
                        </button>
                        <div class="card-body p-0 gap-8 flex-column">
                            <h5 class="card-title color-text fw-bold">
                                <a
                                    href="{{ route('course-details', [
                                        'id' => $course->id,
                                        'slug' => $course->slug,
                                    ]) }}">
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $course->title_bn }}
                                    @else
                                        {{ $course->title_en }}
                                    @endif
                                </a>
                            </h5>
                            <p class="card-text">
                                <a
                                    href="{{ route('course-details', [
                                        'id' => $course->id,
                                        'slug' => $course->slug,
                                    ]) }}">
                                    @if (session()->get('lang') == 'bangla')
                                        {!! Str::limit($course->content_bn, 80) !!}
                                    @else
                                        {!! Str::limit($course->content_en, 80) !!}
                                    @endif
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <div class="col-12 col-md-12">
                <h4 class="text-danger text-center">
                    @if (session()->get('lang') == 'bangla')
                        এই কোর্সের সাথে সম্পৃক্ত অন্য কোনো কোর্স নেই।
                        @else
                       There is no course related with this course.
                        @endif
                </h4>
            </div>
            @endif

            <div class="d-flex justify-content-center">
                <a href="{{ route('all.course') }}" class="btn btn-lg btn-primary rounded-pill">
                    @if (session()->get('lang') == 'bangla')
                        সব কোর্স দেখুন
                    @else
                        See All Courses
                    @endif
                </a>
                <button class="btn btn-p-18 btn-primary rounded-pill">
                    <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                </button>
            </div>
        </div>
    </section>
    <!-- our course end -->


    <!-- E-books -->
    @include('frontend.partials.ebook')

    <!-- Blog -->
    @include('frontend.partials.blog')
@endsection
