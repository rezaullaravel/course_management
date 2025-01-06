@extends('frontend.master')

@section('title')
    {{ 'Category Wise Course' }}
@endsection
@section('content')
    <section class="container gap-60">
        <!--Section heading -->
        <div class="gap-32">


            @if (session()->get('lang') == 'bangla')
                <h3 class="section-heading text-center">
                    ক্যাটাগরি
                    <span class="title-container">
                        <span class="highlight">কোর্স সমূহ
                            <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg" alt="" />
                        </span>
                        ({{ $category->name_bn }})
                    </span>
                </h3>
            @else
                <h3 class="section-heading text-center">
                    Category
                    <span class="title-container">
                        <span class="highlight">Courses
                            <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg" alt="" />
                        </span>

                    </span>
                    ({{ $category->name_en }})
                </h3>
            @endif

            <div class="line"></div>
        </div>


        <!-- Course tab wrapper -->
        <div class="tab-content" id="myTabContent">
            <!-- Tab -->
            {{-- all course --}}
            <div class="tab-pane fade show active" id="allcourse-tab-pane" role="tabpanel" aria-labelledby="allcourse-tab"
                tabindex="0">
                <!-- Content -->
                <div class="row g-3">
                    @foreach ($courses as $course)
                        <div class="col-12 col-md-6">
                            <div class="card p-3 gap-24 flex-column gradient-border">
                                <div class="position-relative">

                                    @if (!empty($course->video_url))
                                        <div class="ratio ratio-16x9">
                                            {!! $course->video_url !!}
                                        </div>
                                    @else
                                        <img src="{{ asset($course->image) }}" class="card-img-top" width="100%"
                                            height="320" />
                                    @endif
                                    {{-- <img class="position-absolute top-50 start-50 translate-middle"
                                    src="{{ asset('/') }}frontend/images/i-paly.svg" alt="" /> --}}
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

                    {{-- paginate --}}

                    {{ $courses->links() }}

                    {{-- paginate --}}
                </div>

            </div>
            {{-- all course --}}
        </div>
    </section>


    <!-- E-books -->
    @include('frontend.partials.ebook')


    <!-- Blog -->
    @include('frontend.partials.blog')
@endsection
