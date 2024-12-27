<section class="container gap-60 flex-column">
    <!-- Section Heading -->
    <div class="gap-32 flex-column justify-content-center">
        <div class="gap-16 flex-column align-items-center">
            <!-- Heading button -->
            <button class="small-btn gap-8 flex-row align-items-center mx-auto">
                <div class="circle-8"></div>

                @if (session()->get('lang') == 'bangla')
                    আমাদের কোর্স সমূহ
                @else
                    Our Courses
                @endif
            </button>

            <!--  heading -->
            <h3 class="section-heading">

                @if (session()->get('lang') == 'bangla')
                    আমাদের জনপ্রিয়
                @else
                    Our Most Popular
                @endif
                <span class="title-container">
                    <span class="highlight">
                        @if (session()->get('lang') == 'bangla')
                            কোর্স সমূহ
                        @else
                            Courses
                        @endif
                        <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg" alt="" />
                    </span>
                </span>
            </h3>
        </div>

        <!-- Tab buttons -->
        <div class="d-flex justify-content-center">
            <ul class="gap-16 flex-row w-100 overflow-x-auto border-0 mx-w-fit" id="myTab" role="tablist">
                <li class="nav-item text-nowrap" role="presentation">
                    <button class="active btn btn-lg btn-primary-50" id="allcourse-tab" data-bs-toggle="tab"
                        data-bs-target="#allcourse-tab-pane" type="button" role="tab"
                        aria-controls="allcourse-tab-pane" aria-selected="true">

                        @if (session()->get('lang') == 'bangla')
                            সব কোর্স
                        @else
                            All Course
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
                            data-bs-target="#category{{ $category->id }}" type="button" role="tab"
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
    </div>

    <!-- Course tab wrapper -->
    <div class="tab-content" id="myTabContent">
        <!-- Tab all -->
        <div class="tab-pane fade show active" id="allcourse-tab-pane" role="tabpanel" aria-labelledby="allcourse-tab"
            tabindex="0">
            <!-- Content -->

            {{-- fetch all course --}}
            @php
                $courses = App\Models\Course::orderBy('id', 'desc')->limit(4)->get();
            @endphp
            <div class="row g-3">
                @foreach ($courses as $course)
                    <div class="col-12 col-md-6">
                        <div class="card p-3 gap-24 flex-column gradient-border">
                            <div class="position-relative">

                                @if (!empty($course->video_url))
                                    <p>{!! $course->video_url !!}</p>
                                @else
                                    <img src="{{ asset($course->image) }}" class="card-img-top"
                                        width="100%" height="320" />
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
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $course->title_bn }}
                                    @else
                                        {{ $course->title_en }}
                                    @endif
                                </h5>
                                <p class="card-text">
                                    @if (session()->get('lang') == 'bangla')
                                        {!! Str::limit($course->content_bn, 80) !!}
                                    @else
                                        {!! Str::limit($course->content_en, 80) !!}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- category wise course show -->
        @foreach ($categories as $category)
            <div class="tab-pane fade" id="category{{ $category->id }}" role="tabpanel" aria-labelledby="quran-tab"
                tabindex="0">
                <div class="row g-3">
                    @php
                        $catwiseCourse = App\Models\Course::where('course_category_id', $category->id)
                            ->orderBy('id', 'desc')
                            ->limit(4)
                            ->get();
                    @endphp
                    @foreach ($catwiseCourse as $course)
                        <div class="col-12 col-md-6">
                            <div class="card p-3 gap-24 flex-column gradient-border">
                                <div class="position-relative">
                                    @if (!empty($course->video_url))
                                        <p>{!! $course->video_url !!}</p>
                                    @else
                                        <img src="{{ asset($course->image) }}" class="card-img-top"
                                            width="100%" height="320"/>
                                    @endif
                                    {{-- <img class="position-absolute top-50 start-50 translate-middle"
                                src="{{ asset('/') }}frontend/images/i-paly.svg" alt="" /> --}}
                                </div>

                                <button class="small-btn">
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $course->category->name_bn }}
                                    @else
                                        {{ $course->category->name_en }}
                                    @endif -

                                </button>
                                <div class="card-body p-0 gap-8 flex-column">
                                    <h5 class="card-title color-text fw-bold">
                                        @if (session()->get('lang') == 'bangla')
                                            {{ $course->title_bn }}
                                        @else
                                            {{ $course->title_en }}
                                        @endif
                                    </h5>
                                    <p class="card-text">
                                        @if (session()->get('lang') == 'bangla')
                                            {!! Str::limit($course->content_bn, 80) !!}
                                        @else
                                            {!! Str::limit($course->content_en, 80) !!}
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
