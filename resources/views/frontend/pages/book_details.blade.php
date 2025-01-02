@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
@endphp

@extends('frontend.master')

@section('title')
    {{ 'Course Details' }}
@endsection
@section('content')
    {{-- book details --}}
    <div class="book-detailes container padding-top-bottom-40-80 gap-60">
        <!-- Page heading -->
        <div class="gap-32">
            <div class="d-flex align-items-center">
                <img class="i-black-arrow" src="{{ asset('/') }}frontend/images/i-back-arrow.svg" alt="" />
                <h5 class="text-center w-100">

                    @if (session()->get('lang') == 'bangla')
                        বইয়ের <span class="color-primary">/ বিস্তারিত</span>
                    @else
                        Book <span class="color-primary">/ Details</span>
                    @endif
                </h5>
            </div>
            <div class="line"></div>
        </div>

        <!-- details -->
        <div class="gap-40">
            <div class="gap-24">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>
                        @if (session()->get('lang') == 'bangla')
                            {{ $book->title_bn }}
                        @else
                            {{ $book->title_en }}
                        @endif
                    </h5>
                    <p class="p-20 fw-medium color-primary">
                        @if (session()->get('lang') == 'bangla')
                            {{ $numto->bnNum($book->price_bn) }} ৳
                        @else
                            {{ $book->price_en }} $
                        @endif
                    </p>
                </div>

                {{-- <img src="{{asset('/')}}frontend/images/book-quran.svg" alt="" /> --}}
                @if (!empty($book->video_url))
                    <div class="ratio ratio-16x9">
                        {!! $book->video_url !!}
                    </div>
                @else
                    <img class="w-100" src="{{ asset($book->image) }}" alt="" />
                @endif
            </div>

            <!-- Information In Details -->
            <div class="card p-4 rounded-3 gap-32">
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
                            {!! $book->description_bn !!}
                        @else
                            {!! $book->description_en !!}
                        @endif
                    </p>
                </div>

                <!-- facts -->
                <div class="gap-10 facts" id="Information">

                    @if (!empty($book->topic1_en))
                        <div class="gap-12">
                            <div class="gap-12 flex-row align-items-center fact" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse4">
                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                <p class="p-18 color-text fw-medium">
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $book->topic1_bn }}
                                    @else
                                        {{ $book->topic1_en }}
                                    @endif
                                </p>
                            </div>
                            <div id="collapse1" data-bs-parent="#Information">
                                @if (session()->get('lang') == 'bangla')
                                    {!! $book->description1_bn !!}
                                @else
                                    {!! $book->description1_en !!}
                                @endif
                            </div>
                        </div>
                    @endif

                    @if (!empty($book->topic2_en))
                        <div class="gap-12">
                            <div class="gap-12 flex-row align-items-center fact" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse5">
                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                <p class="p-18 color-text fw-medium">
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $book->topic2_bn }}
                                    @else
                                        {{ $book->topic2_en }}
                                    @endif
                                </p>
                            </div>
                            <div id="collapse2" data-bs-parent="#Information">
                                @if (session()->get('lang') == 'bangla')
                                    {!! $book->description2_bn !!}
                                @else
                                    {!! $book->description2_en !!}
                                @endif
                            </div>
                        </div>
                    @endif

                    @if (!empty($book->topic3_en))
                        <div class="gap-12">
                            <div class="gap-12 flex-row align-items-center fact" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse6">
                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                <p class="p-18 color-text fw-medium">
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $book->topic3_bn }}
                                    @else
                                        {{ $book->topic3_en }}
                                    @endif
                                </p>
                            </div>
                            <div id="collapse3" data-bs-parent="#Information">
                                @if (session()->get('lang') == 'bangla')
                                    {!! $book->description3_bn !!}
                                @else
                                    {!! $book->description3_en !!}
                                @endif
                            </div>
                        </div>
                    @endif

                    @if (!empty($book->topic4_en))
                        <div class="gap-12">
                            <div class="gap-12 flex-row align-items-center fact" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse7">
                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                <p class="p-18 color-text fw-medium">
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $book->topic4_bn }}
                                    @else
                                        {{ $book->topic4_en }}
                                    @endif
                                </p>
                            </div>
                            <div id="collapse4" data-bs-parent="#Information">
                                @if (session()->get('lang') == 'bangla')
                                    {!! $book->description4_bn !!}
                                @else
                                    {!! $book->description4_en !!}
                                @endif
                            </div>
                        </div>
                    @endif

                    @if (!empty($book->topic5_en))
                        <div class="gap-12">
                            <div class="gap-12 flex-row align-items-center fact" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse8">
                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                <p class="p-18 color-text fw-medium">
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $book->topic5_bn }}
                                    @else
                                        {{ $book->topic5_en }}
                                    @endif
                                </p>
                            </div>
                            <div id="collapse5" data-bs-parent="#Information">
                                @if (session()->get('lang') == 'bangla')
                                    {!! $book->description5_bn !!}
                                @else
                                    {!! $book->description5_en !!}
                                @endif
                            </div>
                        </div>
                    @endif

                    @if (!empty($book->topic6_en))
                        <div class="gap-12">
                            <div class="gap-12 flex-row align-items-center fact" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse9">
                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                <p class="p-18 color-text fw-medium">
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $book->topic6_bn }}
                                    @else
                                        {{ $book->topic6_en }}
                                    @endif
                                </p>
                            </div>
                            <div id="collapse6" data-bs-parent="#Information">
                                @if (session()->get('lang') == 'bangla')
                                    {!! $book->description6_bn !!}
                                @else
                                    {!! $book->description6_en !!}
                                @endif
                            </div>
                        </div>
                    @endif


                    @if (!empty($book->topic7_en))
                        <div class="gap-12">
                            <div class="gap-12 flex-row align-items-center fact" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse7">
                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                <p class="p-18 color-text fw-medium">
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $book->topic7_bn }}
                                    @else
                                        {{ $book->topic7_en }}
                                    @endif
                                </p>
                            </div>
                            <div id="collapse7" data-bs-parent="#Information">
                                @if (session()->get('lang') == 'bangla')
                                    {!! $book->description7_bn !!}
                                @else
                                    {!! $book->description7_en !!}
                                @endif
                            </div>
                        </div>
                    @endif


                    @if (!empty($book->topic8_en))
                        <div class="gap-12">
                            <div class="gap-12 flex-row align-items-center fact" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse11">
                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                <p class="p-18 color-text fw-medium">
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $book->topic8_bn }}
                                    @else
                                        {{ $book->topic8_en }}
                                    @endif
                                </p>
                            </div>
                            <div id="collapse8" data-bs-parent="#Information">
                                @if (session()->get('lang') == 'bangla')
                                    {!! $book->description8_bn !!}
                                @else
                                    {!! $book->description8_en !!}
                                @endif
                            </div>
                        </div>
                    @endif


                    @if (!empty($book->topic9_en))
                        <div class="gap-12">
                            <div class="gap-12 flex-row align-items-center fact" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse12">
                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                <p class="p-18 color-text fw-medium">
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $book->topic9_bn }}
                                    @else
                                        {{ $book->topic9_en }}
                                    @endif
                                </p>
                            </div>
                            <div id="collapse9" data-bs-parent="#Information">
                                @if (session()->get('lang') == 'bangla')
                                    {!! $book->description9_bn !!}
                                @else
                                    {!! $book->description9_en !!}
                                @endif
                            </div>
                        </div>
                    @endif

                    @if (!empty($book->topic10_en))
                        <div class="gap-12">
                            <div class="gap-12 flex-row align-items-center fact" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse13">
                                <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg" alt="" />
                                <p class="p-18 color-text fw-medium">
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $book->topic10_bn }}
                                    @else
                                        {{ $book->topic10_en }}
                                    @endif
                                </p>
                            </div>
                            <div id="collapse10" data-bs-parent="#Information">
                                @if (session()->get('lang') == 'bangla')
                                    {!! $book->description10_bn !!}
                                @else
                                    {!! $book->description10_en !!}
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <div class="">
                    @if ($book->paid_status=='paid')

                            @if (session()->get('lang') == 'bangla')
                            <a href="" class="btn btn-lg bg-color-button">
                                অর্ডার করুন
                            </a>
                            @else
                            <a href="" class="btn btn-lg bg-color-button">
                                Order Now
                                {{-- <img src="{{ asset('/') }}frontend/images/download-black.svg" alt="" /> --}}
                            </a>
                            @endif
                    @else


                            <a href="" class="btn btn-lg bg-color-button">

                                @if (session()->get('lang') == 'bangla')
                                পড়ুন
                                @else
                                Read
                                @endif

                            </a>
                    @endif
                </div>
            </div>

            <!-- samll -->
            <div class="gap-24 card p-4 rounded-3 flex-column flex-lg-row-reverse">
                <img src="{{ asset($book->another_image) }}" alt="" />
                <div class="gap-24">
                    <div class="gap-12">
                        <h5>
                            @if (session()->get('lang') == 'bangla')
                                অন্যান্য গুরুত্বপূর্ণ তথ্য আপনি জানতে পারবেন
                            @else
                                Another Important Information You will learn
                            @endif
                        </h5>
                        <p>
                            @if (session()->get('lang') == 'bangla')
                                {!! $book->another_description_bn !!}
                            @else
                                {!! $book->another_description_en !!}
                            @endif
                        </p>
                    </div>
                    <!-- facts -->
                    <div class="gap-10 facts" id="anotherInformatio">
                        @if (!empty($book->footer_topic1_en))
                            <div class="gap-12">
                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $book->footer_topic1_bn !!}
                                        @else
                                            {!! $book->footer_topic1_en !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if (!empty($book->footer_topic2_en))
                            <div class="gap-12">
                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true"
                                    aria-controls="collapseTwo">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $book->footer_topic2_bn !!}
                                        @else
                                            {!! $book->footer_topic2_en !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if (!empty($book->footer_topic3_en))
                            <div class="gap-12">
                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true"
                                    aria-controls="collapseThree">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $book->footer_topic3_bn !!}
                                        @else
                                            {!! $book->footer_topic3_en !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if (!empty($book->footer_topic4_en))
                            <div class="gap-12">
                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true"
                                    aria-controls="collapseFour">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $book->footer_topic4_bn !!}
                                        @else
                                            {!! $book->footer_topic4_en !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if (!empty($book->footer_topic5_en))
                            <div class="gap-12">
                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true"
                                    aria-controls="collapseFive">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $book->footer_topic5_bn !!}
                                        @else
                                            {!! $book->footer_topic5_en !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if (!empty($book->footer_topic6_en))
                            <div class="gap-12">
                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true"
                                    aria-controls="collapseSix">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $book->footer_topic6_bn !!}
                                        @else
                                            {!! $book->footer_topic6_en !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if (!empty($book->footer_topic7_en))
                            <div class="gap-12">
                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true"
                                    aria-controls="collapseSeven">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $book->footer_topic7_bn !!}
                                        @else
                                            {!! $book->footer_topic7_en !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if (!empty($book->footer_topic8_en))
                            <div class="gap-12">
                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="true"
                                    aria-controls="collapseEight">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $book->footer_topic8_bn !!}
                                        @else
                                            {!! $book->footer_topic8_en !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if (!empty($book->footer_topic9_en))
                            <div class="gap-12">
                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="true"
                                    aria-controls="collapseNine">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $book->footer_topic9_bn !!}
                                        @else
                                            {!! $book->footer_topic9_en !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if (!empty($book->footer_topic10_en))
                            <div class="gap-12">
                                <div class="gap-12 flex-row align-items-center fact" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="true"
                                    aria-controls="collapseTen">
                                    <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                        alt="" />
                                    <p class="p-18 color-text fw-medium">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! $book->footer_topic10_bn !!}
                                        @else
                                            {!! $book->footer_topic10_en !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- book details end --}}

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
                                <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg"
                                    alt="" />
                            </span>
                        </span>
                    </h3>
                @else
                    <h3 class="section-heading">
                        Check Our Other
                        <span class="title-container">
                            <span class="highlight">Courses
                                <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg"
                                    alt="" />
                            </span>
                        </span>
                    </h3>
                @endif

            </div>
        </div>

        {{-- fetch related course --}}
        @php
            $related_courses = App\Models\Course::where('course_category_id', $book->category_id)
                ->where('status', 1)
                ->get();
        @endphp

        <!-- cards -->
        <div class="row g-3">
            @if ($related_courses->count() > 0)
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
        </div>
    </section>
    <!-- our course end -->


    <!-- E-books -->
    <section class="container gap-60 flex-column">
        <div class="gap-16 flex-column">
            <button class="small-btn gap-8 flex-row align-items-center mx-auto">
                <div class="circle-8"></div>

                @if (session()->get('lang') == 'bangla')
                    ইবুক
                @else
                    Ebook
                @endif




            </button>

            <h3 class="section-heading mx-auto">

                @if (session()->get('lang') == 'bangla')
                    আমাদের সাম্প্রতিক
                @else
                    Our latest
                @endif
                <span class="title-container">
                    <span class="highlight">
                        @if (session()->get('lang') == 'bangla')
                            ইবুক
                        @else
                            E-Book
                        @endif
                        <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg" alt="" />
                    </span>
                </span>
            </h3>
        </div>

        {{-- fetch related books --}}
        @php
            $books = App\Models\Book::where('category_id', $book->category_id)
                ->where('id', '!=', $book->id)
                ->where('status', 1)
                ->orderBy('id', 'desc')
                ->limit(4)
                ->get();
        @endphp

        <div class="gap-60">
            <div class="row g-4">
                @foreach ($books as $book)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="book-card p-4 bg-white gap-16 align-items-center gradient-border">
                            <img class="img-fluid w-100" src="{{ asset($book->image) }}" alt="" />
                            <h5>
                                @if (session()->get('lang') == 'bangla')
                                    {{ $book->category->name_bn }}
                                @else
                                    {{ $book->category->name_en }}
                                @endif

                            </h5>

                            <div class="gap-16 flex-row justify-content-between w-100">
                                <div class="flex-grow-1">
                                    <a href="{{ route('book.details', [
                                        'id' => $book->id,
                                        'slug' => $book->slug,
                                    ]) }}"
                                        class="btn btn-lg btn-outline-success rounded-pill w-100 h-100">

                                        @if (session()->get('lang') == 'bangla')
                                            দেখুন
                                        @else
                                            View
                                        @endif
                                    </a>
                                </div>
                                {{-- <buptton class="btn btn-p-18 btn-outline-success rounded-pill">
                                    <img src="{{ asset('/') }}frontend/images/download-01.svg" class="download-icon"
                                        alt="" />
                                </buptton> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                <button class="btn btn-lg btn-primary rounded-pill">

                    @if (session()->get('lang') == 'bangla')
                        সব বই দেখুন
                    @else
                        View All Books
                    @endif




                </button>
                <button class="btn btn-p-18 btn-primary rounded-pill">
                    <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                </button>
            </div>
        </div>
    </section>

    <!---Ebook end-->

    <!-- Blog -->
    @include('frontend.partials.blog')
@endsection
