@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
@endphp

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
                        <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg" alt="" />
                    </span>
                </span>
                পড়ুন
            </h3>
        @else
            <h3 class="section-heading mx-auto">
                Read updated
                <span class="title-container">
                    <span class="highlight">journal
                        <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg" alt="" />
                    </span>
                </span>
            </h3>
        @endif
    </div>
    {{-- fetch blog --}}
    @php
        $blogs = App\Models\Blog::orderBy('id', 'desc')->where('status',1)->limit(3)->get();
    @endphp

    <!-- Blog -->
    <div class="gap-60">
        <!-- cards -->
        <div class="row g-4">
            <!-- card -->
            @foreach ($blogs as $blog)
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
                            <a href="{{ route('blog.details',[
                            'id'=>$blog->id,
                            'slug'=>$blog->slug
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
            <a href="{{ route('all.blog') }}" class="btn btn-lg btn-primary rounded-pill">
                @if (session()->get('lang') == 'bangla')
                    সকল ব্লগ দেখুন
                @else
                    See All Blogs
                @endif
            </a>
            <a href="{{ route('all.blog') }}" class="btn btn-p-18 btn-primary rounded-pill">
                <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
            </a>
        </div>
    </div>
</section>
