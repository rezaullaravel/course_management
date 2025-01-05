@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
@endphp

@extends('frontend.master')

@section('title')
    {{ 'Blog Details' }}
@endsection
@section('content')
    {{-- blog details --}}
    <div class="blog-details container padding-top-bottom-40-80 gap-60">
        <!-- heading -->
        <div class="gap-32">
            <div class="d-flex align-items-center">
                <img class="i-black-arrow" src="{{ asset('/') }}frontend/images/i-back-arrow.svg" alt="" />
                <h5 class="text-center w-100">

                    @if (session()->get('lang') == 'bangla')
                        ব্লগের বিবরণ
                    @else
                        Blog <span class="color-primary">/ Details</span>
                    @endif

                </h5>
            </div>
            <div class="line"></div>
        </div>

        <!-- detailes -->
        <div class="gap-24">
            <button class="small-btn bg-white">
                @if (session()->get('lang') == 'bangla')
                    {{ $blog->category->name_bn }}
                @else
                    {{ $blog->category->name_en }}
                @endif
            </button>
            <h5>
                @if (session()->get('lang') == 'bangla')
                    {{ $blog->title_bn }}
                @else
                    {{ $blog->title_en }}
                @endif
            </h5>

            <!-- author -->
            <div class="gap-12 flex-row align-items-center">
                <img class="rounded-circle" src="{{ asset($blog->user->image) }}" height="50" width="50"
                    alt="" />
                <div class="d-flex flex-column flex-md-row">
                    <p class="fw-medium color-text mb-0 me-2">
                        @if (session()->get('lang') == 'bangla')
                            {{ $blog->user->name_bn }}
                        @else
                            {{ $blog->user->name }}
                        @endif
                    </p>
                    <div class="gap-10 flex-row align-items-center time">
                        <p class="mb-0">
                            @if (session()->get('lang') == 'bangla')
                                {{ convertToBanglaDate($blog->created_at) }}
                            @else
                                {{ date('d-F-Y', strtotime($blog->created_at)) }}
                            @endif
                        </p>
                        <div></div>
                        <p class="mb-0">
                            @if (session()->get('lang') == 'bangla')
                                {{ convertToBanglaTimeAgo($blog->created_at, 'bn') }}
                            @else
                                {{ convertToBanglaTimeAgo($blog->created_at, 'en') }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            @if (!empty($blog->video_url))
                <div class="ratio ratio-16x9">
                    {!! $blog->video_url !!}
                </div>
            @else
                <img src="{{ asset($blog->image) }}" alt="" />
            @endif



            <div class="gap-32 flex-column flex-md-row">
                <!-- left -->
                <div class="card left p-4 gap-40">
                    <div class="gap-16">
                        <p calss="fs-6">
                            @if (session()->get('lang') == 'bangla')
                                {!! $blog->content_bn !!}
                            @else
                                {!! $blog->content_en !!}
                            @endif

                        </p>
                    </div>
                    <img src="{{ asset($blog->image2) }}" alt="" />

                    <!-- Ways to Show Gratitude in Islam -->
                    <div class="gap-32">
                        <div class="gap-24">
                            <h5>
                                @if (session()->get('lang') == 'bangla')
                                    {{ $blog->title2_bn }}
                                @else
                                    {{ $blog->title2_en }}
                                @endif

                            </h5>
                            <p calss="fs-6">
                                @if (session()->get('lang') == 'bangla')
                                    {!! $blog->content2_bn !!}
                                @else
                                    {!! $blog->content2_en !!}
                                @endif
                            </p>
                        </div>
                        <!-- facts -->
                        <!-- facts -->
                        <div class="gap-10 facts" id="blog-fact-1">
                            @if (!empty($blog->topic1_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->topic1_bn !!}
                                            @else
                                                {!! $blog->topic1_en !!}
                                            @endif

                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->topic2_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->topic2_bn !!}
                                            @else
                                                {!! $blog->topic2_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->topic3_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->topic3_bn !!}
                                            @else
                                                {!! $blog->topic3_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->topic4_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->topic4_bn !!}
                                            @else
                                                {!! $blog->topic4_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->topic5_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->topic5_bn !!}
                                            @else
                                                {!! $blog->topic5_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->topic6_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                        aria-controls="collapseSix">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->topic6_bn !!}
                                            @else
                                                {!! $blog->topic6_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->topic7_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false"
                                        aria-controls="collapseSeven">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->topic7_bn !!}
                                            @else
                                                {!! $blog->topic7_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->topic8_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false"
                                        aria-controls="collapseEight">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->topic8_bn !!}
                                            @else
                                                {!! $blog->topic8_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->topic9_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false"
                                        aria-controls="collapseNine">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->topic9_bn !!}
                                            @else
                                                {!! $blog->topic9_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->topic10_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false"
                                        aria-controls="collapseTen">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->topic10_bn !!}
                                            @else
                                                {!! $blog->topic10_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>

                    <img src="{{ asset($blog->image3) }}" alt="" />

                    <!-- Ways to Show Gratitude in Islam -->
                    <div class="gap-32">
                        <div class="gap-24">
                            <h5>
                                @if (session()->get('lang') == 'bangla')
                                    {{ $blog->title3_bn }}
                                @else
                                    {{ $blog->title3_en }}
                                @endif

                            </h5>
                            <p>
                                @if (session()->get('lang') == 'bangla')
                                    {!! $blog->content3_bn !!}
                                @else
                                    {!! $blog->content3_en !!}
                                @endif
                            </p>
                        </div>
                        <!-- facts -->
                        <div class="gap-10 facts" id="blog-fact-2">
                            @if (!empty($blog->footer_topic1_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->footer_topic1_bn !!}
                                            @else
                                                {!! $blog->footer_topic1_en !!}
                                            @endif

                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->footer_topic2_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->footer_topic2_bn !!}
                                            @else
                                                {!! $blog->footer_topic2_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->footer_topic3_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->footer_topic3_bn !!}
                                            @else
                                                {!! $blog->footer_topic3_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->footer_topic4_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->footer_topic4_bn !!}
                                            @else
                                                {!! $blog->footer_topic4_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->footer_topic5_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->footer_topic5_bn !!}
                                            @else
                                                {!! $blog->footer_topic5_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->footer_topic6_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                        aria-controls="collapseSix">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->footer_topic6_bn !!}
                                            @else
                                                {!! $blog->footer_topic6_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->footer_topic7_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false"
                                        aria-controls="collapseSeven">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->footer_topic7_bn !!}
                                            @else
                                                {!! $blog->footer_topic7_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->footer_topic8_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false"
                                        aria-controls="collapseEight">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->footer_topic8_bn !!}
                                            @else
                                                {!! $blog->footer_topic8_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->footer_topic9_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false"
                                        aria-controls="collapseNine">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->footer_topic9_bn !!}
                                            @else
                                                {!! $blog->footer_topic9_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($blog->footer_topic10_en))
                                <div class="gap-12">
                                    <div class="gap-12 flex-row align-items-center fact" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false"
                                        aria-controls="collapseTen">
                                        <img src="{{ asset('/') }}frontend/images/i-arrow-block-right.svg"
                                            alt="" />
                                        <p class="p-18 color-text fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                {!! $blog->footer_topic10_bn !!}
                                            @else
                                                {!! $blog->footer_topic10_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                    <!-- Conclusion -->
                    <div class="gap-24">
                        <h5>
                            @if (session()->get('lang') == 'bangla')
                                উপসংহার
                            @else
                                Conclusion
                            @endif

                        </h5>
                        <p>

                            @if (session()->get('lang') == 'bangla')
                                {!! $blog->conclusiton_bn !!}
                            @else
                                {!! $blog->conclusiton_en !!}
                            @endif

                        </p>
                    </div>
                </div>

                <!-- right -->
                <div class="right gap-32">
                    <!-- search -->
                    <div class="gap-32">
                        <h5>
                            @if (session()->get('lang') == 'bangla')
                                ব্লগ অনুসন্ধান করুন:
                            @else
                                Search Blog:
                            @endif

                        </h5>
                        <div class="d-flex">
                            <input type="text" class="form-control rounded-pill" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Type here..." />
                            <button class="btn btn-p-18 btn-primary rounded-pill">
                                <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                            </button>
                        </div>
                    </div>
                    <!-- Follow Us: -->
                    <div class="gap-32 follow">
                        <h5>
                            @if (session()->get('lang') == 'bangla')
                                আমাদের ফলো করুন:
                            @else
                                Follow Us:
                            @endif
                        </h5>
                        <div class="gap-32 flex-row">
                            <img src="{{ asset('/') }}frontend/images/logos_facebook.svg" alt="" />
                            <img src="{{ asset('/') }}frontend/images/flowbite_x-solid.svg" alt="" />
                            <img src="{{ asset('/') }}frontend/images/skill-icons_instagram.svg" alt="" />
                            <img src="{{ asset('/') }}frontend/images/linkedin.svg" alt="" />
                            <img src="{{ asset('/') }}frontend/images/youtube.svg" alt="" />
                        </div>
                    </div>

                    <!-- Featured: -->
                    <div class="gap-32">
                        <h5>
                            @if (session()->get('lang') == 'bangla')
                                বৈশিষ্ট্যযুক্ত ব্লগ:
                            @else
                                Featured Blog:
                            @endif
                        </h5>

                        {{-- fetch featured blog --}}
                        @php
                            $featured_blogs = DB::table('blogs')
                                ->orderBy('id', 'desc')
                                ->where('is_featured', 1)
                                ->where('status', 1)
                                ->limit(4)
                                ->get();
                        @endphp
                        <div class="gap-40">
                            @foreach ($featured_blogs as $blog)
                                <div class="blog-card gap-16">
                                    <img src="{{ asset($blog->image) }}" alt="" />
                                    <h5>
                                        <a
                                            href="{{ route('blog.details', [
                                                'id' => $blog->id,
                                                'slug' => $blog->slug,
                                            ]) }}">
                                            @if (session()->get('lang') == 'bangla')
                                                {{ $blog->title_bn }}
                                            @else
                                                {{ $blog->title_en }}
                                            @endif
                                        </a>

                                        <span><img src="{{ asset('/') }}frontend/images/red-drow.svg"
                                                alt="" /></span>
                                    </h5>
                                    <div class="gap-10 flex-row align-items-center time">
                                        <p>
                                            @if (session()->get('lang') == 'bangla')
                                                {{ convertToBanglaDate($blog->created_at) }}
                                            @else
                                                {{ date('d-F-Y', strtotime($blog->created_at)) }}
                                            @endif
                                        </p>
                                        <div></div>
                                        <p>
                                            @if (session()->get('lang') == 'bangla')
                                                {{ convertToBanglaTimeAgo($blog->created_at, 'bn') }}
                                            @else
                                                {{ convertToBanglaTimeAgo($blog->created_at, 'en') }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- blog details end --}}

    {{-- related blog --}}
    <section class="container blog gap-60 flex-column">
        <!-- Section Heading -->
        <div class="gap-16 flex-column">
            <!-- Heading button -->
            <button class="small-btn gap-8 flex-row align-items-center mx-auto">
                <div class="circle-8"></div>

                @if (session()->get('lang') == 'bangla')
                    সাম্প্রতিক ব্লগ
                @else
                    Recent Blog
                @endif
            </button>
            <!-- Heading -->

            @if (session()->get('lang') == 'bangla')
                <h3 class="section-heading mx-auto">
                    আপডেটেড
                    <span class="title-container">
                        <span class="highlight">জার্নাল
                            <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg"
                                alt="" />
                        </span>
                    </span>
                    পড়ুন
                </h3>
            @else
                <h3 class="section-heading mx-auto">
                    Read updated
                    <span class="title-container">
                        <span class="highlight">journal
                            <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg"
                                alt="" />
                        </span>
                    </span>
                </h3>
            @endif
        </div>
        {{-- fetch related blog --}}
        @php
            $related_blogs = App\Models\Blog::orderBy('id', 'desc')
                ->where('blog_category_id', $blog->blog_category_id)
                ->where('id', '!=', $blog->id)
                ->where('status', 1)
                ->limit(3)
                ->get();
        @endphp

        <!-- Blog -->
        <div class="gap-60">
            <!-- cards -->
            <div class="row g-4">
                <!-- card -->
                @foreach ($related_blogs as $blog)
                    <div class="col-12 col-lg-4">
                        <div class="blog-card gap-16">


                            @if (!empty($blog->video_url))
                                <div class="ratio ratio-16x9">
                                    {!! $blog->video_url !!}
                                </div>
                            @else
                                <img src="{{ asset($blog->image) }}" alt="" />
                            @endif
                            <h5>
                                <a
                                    href="{{ route('blog.details', [
                                        'id' => $blog->id,
                                        'slug' => $blog->slug,
                                    ]) }}">
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $blog->title_bn }}
                                    @else
                                        {{ $blog->title_en }}
                                    @endif
                                </a>
                                <span><img src="{{ asset('/') }}frontend/images/red-drow.svg" alt="" /></span>
                            </h5>
                            <div class="gap-10 flex-row align-items-center time">
                                <p>
                                    @if (session()->get('lang') == 'bangla')
                                        {{ convertToBanglaDate($blog->created_at) }}
                                    @else
                                        {{ date('d-F-Y', strtotime($blog->created_at)) }}
                                    @endif
                                </p>
                                <div></div>
                                <p>
                                    @if (session()->get('lang') == 'bangla')
                                        {{ convertToBanglaTimeAgo($blog->created_at, 'bn') }}
                                    @else
                                        {{ convertToBanglaTimeAgo($blog->created_at, 'en') }}
                                    @endif

                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-center">
                <button class="btn btn-lg btn-primary rounded-pill">
                    @if (session()->get('lang') == 'bangla')
                        সকল ব্লগ দেখুন
                    @else
                        See All Blogs
                    @endif
                </button>
                <button class="btn btn-p-18 btn-primary rounded-pill">
                    <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                </button>
            </div>
        </div>
    </section>
    {{-- related blog --}}

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
            $related_courses = App\Models\Course::where('course_category_id', $blog->blog_category_id)
                ->where('status', 1)
                ->limit(3)
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

            <div class="d-flex justify-content-center">
                <button class="btn btn-lg btn-primary rounded-pill">
                    @if (session()->get('lang') == 'bangla')
                        সব কোর্স দেখুন
                    @else
                        See All Courses
                    @endif
                </button>
                <button class="btn btn-p-18 btn-primary rounded-pill">
                    <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                </button>
            </div>
        </div>
    </section>
    <!-- our course end -->


    <!-- E-books -->
    @include('frontend.partials.ebook')



@endsection
