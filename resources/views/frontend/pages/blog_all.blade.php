@extends('frontend.master')

@section('title')
    {{ 'Blog Page' }}
@endsection
@section('content')
    <section class="container gap-60">
        <!--Section heading -->
        <div class="gap-32">



            <h3 class="section-heading text-center">
                @if (session()->get('lang') == 'bangla')
                    আমাদের সাম্প্রতিক
                @else
                    Our latest
                @endif
                <span class="title-container">
                    <span class="highlight">
                        @if (session()->get('lang') == 'bangla')
                            ব্লগ
                        @else
                            Blog
                        @endif
                        <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg" alt="" />
                    </span>
                </span>
            </h3>


            <div class="line"></div>
        </div>

        <!-- buttons -->
        <div class="d-flex justify-content-center">
            <ul class="gap-16 flex-row w-100 overflow-x-auto border-0 mx-w-fit" id="myTab" role="tablist">
                <li class="nav-item text-nowrap" role="presentation">
                    <button class="active btn btn-lg btn-primary-50" id="allcourse-tab" data-bs-toggle="tab"
                        data-bs-target="#allblog-tab-pane" type="button" role="tab" aria-controls="allcourse-tab-pane"
                        aria-selected="true">
                        @if (session()->get('lang') == 'bangla')
                            সব ব্লগ
                        @else
                            All Blog
                        @endif
                    </button>
                </li>

                {{-- category fetch --}}
                @php
                    $categories = App\Models\Category::get();
                @endphp

                @foreach ($categories as $category)
                    <li class="nav-item" role="presentation">
                        <button class="btn btn-lg bg-primary-50" id="quran-tab" data-bs-toggle="tab"
                            data-bs-target="#blog-category{{ $category->id }}" type="button" role="tab"
                            aria-controls="quran-tab-pane" aria-selected="false">

                            @if (session()->get('lang') == 'bangla')
                                {{ $category->name_bn }}
                            @else
                                {{ $category->name_en }}
                            @endif
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Course tab wrapper -->
        <div class="tab-content" id="myTabContent">
            <!-- Tab -->
            {{-- all book --}}
            <div class="tab-pane fade show active" id="allblog-tab-pane" role="tabpanel" aria-labelledby="allcourse-tab"
                tabindex="0">
                <!-- Content -->
                <div class="row g-3">
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
                        </div>
                    @endforeach

                    {{-- paginate --}}

                    {{ $blogs->links() }}

                    {{-- paginate --}}
                </div>

            </div>
            {{-- all course --}}
            <!-- category wise blog show -->
            @foreach ($categories as $category)
                <div class="tab-pane fade" id="blog-category{{ $category->id }}" role="tabpanel"
                    aria-labelledby="quran-tab" tabindex="0">
                    <div class="row g-3">
                        @php
                            $catwiseBlog = App\Models\Blog::where('blog_category_id', $category->id)
                                ->where('status', 1)
                                ->orderBy('id', 'desc')
                                ->limit(20)
                                ->get();
                        @endphp
                        @foreach ($catwiseBlog as $blog)
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
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
    </section>


    <!-- course -->
    @include('frontend.partials.course')


    <!-- book -->
    @include('frontend.partials.ebook')
@endsection
