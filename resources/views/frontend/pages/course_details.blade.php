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

                            <p class="fw-medium">


                                {{-- course original price show --}}
                                @if (session()->get('lang') == 'bangla')
                                ৳
                                <span class="text-danger text-decoration-line-through"
                                  >{{ $course->original_price_bn }}</span
                                >
                                @else
                                $
                                <span class="text-danger text-decoration-line-through"
                                  >{{ $course->original_price_en }}</span
                                >
                                @endif
                                {{-- course original price show --}}

                                {{-- course offer price show --}}
                                @if (session()->get('lang') == 'bangla')
                                {{ $course->price_bn }}
                                @else
                                {{ $course->price_en }}
                                @endif
                                {{-- course offer price show --}}

                              </p>
                              @if (session()->get('lang') == 'bangla')
                              @else
                              <h5>Enroll now for three free classes</h5>
                              @endif

                            <div class="d-flex justify-content-between">
                                @if (session()->get('lang') == 'bangla')
                                    <a href="{{ route('checkout',$course->id) }}" class="btn btn-lg btn-primary rounded-pill w-100">
                                        এনরোল করুন
                                    </a>
                                @else
                                    <button type="button" class="btn btn-lg btn-primary rounded-pill w-100" data-bs-toggle="modal"
                                    data-bs-target="#myModal">
                                        Enrole Now
                                    </button>
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                <a href="{{ route('checkout',$course->id) }}" class="btn btn-p-18 btn-primary rounded-pill">
                                    <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                                </a>
                                @else
                                <button data-bs-toggle="modal"
                                data-bs-target="#myModal" class="btn btn-p-18 btn-primary rounded-pill">
                                    <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                                </button>
                                @endif

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
                                <a href="{{ route('all.course') }}" class="btn btn-p-18 btn-outline-success rounded-pill">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-primary.svg" alt="" />
                                </a>
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
                <a href="{{ route('all.course') }}" class="btn btn-p-18 btn-primary rounded-pill">
                    <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                </a>
            </div>
        </div>
    </section>
    <!-- our course end -->


    <!-- E-books -->
    @include('frontend.partials.ebook')

    <!-- Blog -->
    @include('frontend.partials.blog')

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- First Form -->
                    <div id="__formStep1" class="card border-none padding-40 gap-32 mx-w-fit">
                        <h5 class="text-center">Personal details</h5>
                        <div class="gap-24">
                            <!-- Name -->
                            <div class="input-group">
                                <input type="text" name="__name" id="__name"
                                    class="form-control rounded-3 padding-12" placeholder="Name" />
                            </div>
                            <!-- Email -->
                            <div class="input-group">
                                <input type="email" name="__email" id="__email"
                                    class="form-control rounded-3 padding-12" placeholder="Email address" />
                            </div>
                            <!-- Phone -->
                            <div class="input-group">
                                <input type="text" name="__phone" id="__phone"
                                    class="form-control rounded-3 padding-12" placeholder="Phone" />
                            </div>

                            <!--country-->
                            <div class="input-group">
                                <input type="text" name="__country" id="__country"
                                    class="form-control rounded-3 padding-12" placeholder="Country" />
                            </div>
                        </div>
                        <button id="__nextToStep2" class="btn btn-primary bg-lg w-100">Next</button>
                    </div>

                    @php
                        $courses = App\Models\Course::where('status', 1)->select('id', 'title_en')->get();
                    @endphp
                    <!-- Second Form -->
                    <div id="__formStep2" class="card border-none padding-40 gap-32 date-picker d-none">
                        <h5>Select your desired course</h5>
                        <div class="row g-4">
                            @foreach ($courses as $course)
                                <div class="col-4">
                                    <div class="position-relative checkbox-box">
                                        <input id="rcourse{{ $course->id }}" name="rcourse_id" type="checkbox"
                                            value="{{ $course->id }}" />
                                        <label for="rcourse{{ $course->id }}"
                                            class="mb-0 position-absolute top-50 start-50 translate-middle">
                                            {{ $course->title_en }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row g-4">
                            <h5>Select Teacher Type You Prefer</h5>


                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="rmale" name="rteacher_type" type="checkbox" value="male" />
                                    <label for="rmale"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Male
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="rfemale" name="rteacher_type" type="checkbox" value="female" />
                                    <label for="rfemale"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Female
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="rother" name="rteacher_type" type="checkbox" value="other" />
                                    <label for="rother"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Other
                                    </label>
                                </div>
                            </div>



                            <button id="rnextToStep3" class="btn btn-primary bg-lg w-100">Next</button>
                        </div>

                    </div>

                    <!--implement third form here-->
                    <div id="__form3" class="card border-none padding-40 gap-32 date-picker d-none">
                        <h5>Select your desired day</h5>
                        <div class="row g-4">
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="__Saturday" name="__day" type="checkbox" value="Saturday" />
                                    <label for="__Saturday"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Saturday
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="__Sunday" name="__day" type="checkbox" value="Sunday" />
                                    <label for="__Sunday"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Sunday
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="__Monday" name="__day" type="checkbox" value="Monday" />
                                    <label for="__Monday"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Monday
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="__Tuesday" name="__day" type="checkbox" value="Tuesday" />
                                    <label for="__Tuesday"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Tuesday
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="__Wednesday" name="__day" type="checkbox" value="Wednesday" />
                                    <label for="__Wednesday"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Wednesday
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="__Thursday" name="__day" type="checkbox" value="Thursday" />
                                    <label for="__Thursday"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Thursday
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="__Friday" name="__day" type="checkbox" value="Friday" />
                                    <label for="__Friday"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Friday
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button id="rsubmitForm" class="btn btn-primary bg-lg w-100">Submit</button>
                    </div>
                    <!--implement third form here end-->


                </div>
            </div>
        </div>
    </div>
        <!--modal end-->
<!-- Include required scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // Listen for changes on checkboxes with name="course_id"
            $('input[name="rcourse_id"]').on('change', function() {
                if ($(this).prop('checked')) {
                    // Uncheck all other checkboxes when one is checked
                    $('input[name="rcourse_id"]').not(this).prop('checked', false);
                }
            });
        </script>
        <script>
            // Listen for changes on checkboxes with name="teacher_type"
            $('input[name="rteacher_type"]').on('change', function() {
                if ($(this).prop('checked')) {
                    // Uncheck all other checkboxes when one is checked
                    $('input[name="rteacher_type"]').not(this).prop('checked', false);
                }
            });
        </script>

        <script>
            // Listen for changes on checkboxes with name="day"
            $('input[name="__day"]').on('change', function() {
                if ($(this).prop('checked')) {
                    // Uncheck all other checkboxes when one is checked
                    $('input[name="__day"]').not(this).prop('checked', false);
                }
            });
        </script>



        <script>
            $(document).ready(function() {
                let ruserId = null; // To store the ID of the user.

                // Show the second form after saving the first form.
                $('#__nextToStep2').click(function(e) {
                    e.preventDefault();
                    const name = $('#__name').val();
                    const email = $('#__email').val();
                    const phone = $('#__phone').val();
                    const country = $('#__country').val();

                    if (!name) {
                        alert('Please enter your name.');
                        return;
                    }
                    if (!email) {
                        alert('Please enter your email address.');
                        return;
                    }
                    if (!phone) {
                        alert('Please enter your phone number.');
                        return;
                    }
                    if (!country) {
                        alert('Please enter your country name.');
                        return;
                    }

                    $.ajax({
                        url: '/save-step1', // Laravel route
                        method: 'POST',
                        data: {
                            name,
                            email,
                            phone,
                            country,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            ruserId = response.user_id; // Store the user ID from the response
                            $('#__formStep1').addClass('d-none');
                            $('#__formStep2').removeClass('d-none');
                            //console.log(response);
                        },
                        error: function(error) {
                            alert('Something went wrong.');
                        },
                    });
                });

                // Show the third form after saving the second form.
                $('#rnextToStep3').click(function(e) {
                    e.preventDefault();

                    // Get the selected course
                    const selectedCourse = $('input[name="rcourse_id"]:checked').val();

                    // Get the selected teacher type
                    const selectedTeacherType = $('input[name="rteacher_type"]:checked').val();

                    if (!selectedCourse) {
                        alert('Please select a course.');
                        return;
                    }

                    if (!selectedTeacherType) {
                        alert('Please select a teacher type.');
                        return;
                    }

                    $.ajax({
                        url: '/save-step2', // Laravel route
                        method: 'POST',
                        data: {
                            user_id: ruserId,
                            course_id: selectedCourse, // Pass the selected course
                            teacher_type: selectedTeacherType, // Pass the selected teacher type
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Assuming you want to handle the response or show some success message
                            //console.log(response); // Check response from server
                            $('#__formStep2').addClass('d-none');
                            $('#__form3').removeClass('d-none');

                        },
                        error: function() {
                            alert('Something went wrong.');
                        },
                    });
                });


                // Submit the final form and hide the modal.
                $('#rsubmitForm').click(function(e) {
                    e.preventDefault();

                    const selectedDays = $('input[name="__day"]:checked').val();

                    if (!selectedDays) {
                        alert('Please select a day.');
                        return;
                    }

                    $.ajax({
                        url: '/save-step3', // Laravel route
                        method: 'POST',
                        data: {
                            user_id: ruserId,
                            days: selectedDays,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            $('#myModal').modal('hide');
                            //alert('Enrollment completed successfully!');

                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Enrollment completed successfully",
                                showConfirmButton: false,
                                timer: 3000 // Show for 5 seconds
                            }).then(() => {
                                // This will be executed after the timer finishes
                                window.location.reload(); // Reload the page after 5 seconds
                            });
                        },
                        error: function() {
                            alert('Something went wrong.');
                        },
                    });
                });
            });
        </script>
@endsection
