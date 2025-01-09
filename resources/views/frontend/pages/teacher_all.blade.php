@extends('frontend.master')

@section('title')
    {{ 'All Teacher Page' }}
@endsection
@section('content')
    <section class="container padding-top-bottom-40-80 gap-60">
        <div class="container gap-60 flex-column">
            <!-- heading -->
            <div class="gap-32">
                <h3 class="section-heading text-center">
                    @if (session()->get('lang') == 'bangla')
                        আমাদের অভিজ্ঞ
                    @else
                        Our Expert
                    @endif
                    <span class="title-container">
                        <span class="highlight">
                            @if (session()->get('lang') == 'bangla')
                                প্রশিক্ষক
                            @else
                                Instructors
                            @endif
                            <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector-lg.svg" alt="" />
                        </span>
                    </span>
                </h3>

                <div class="line"></div>
            </div>

            <div class="gap-60 flex-column">
                <div class="row g-4">
                    @foreach ($teachers as $teacher)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="rounded-top-pill rounded-bottom-5 position-relative teacher-card">
                            <img src="{{ asset($teacher->image) }}" alt=""
                                class="rounded-top-pill rounded-bottom-2 object-fit-cover" width="100%" height="400px" />
                            <div class="card border-0 position-absolute start-50 translate-middle-x p-2 rounded-1">
                                <h5>
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $teacher->name_bn }}
                                    @else
                                        {{ $teacher->name }}
                                    @endif

                                </h5>
                                <p>
                                    @if (session()->get('lang') == 'bangla')
                                        {{ $teacher->teacher_degree_inst_bn }}
                                    @else
                                        {{ $teacher->teacher_degree_inst }}
                                    @endif

                                </p>
                                <p>
                                    @if (session()->get('lang') == 'bangla')
                                    {{ $teacher->t_degree_subject_bn }}
                                @else
                                    {{ $teacher->t_degree_subject }}
                                @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- our course -->
    @include('frontend.partials.course')

    <!-- E-books -->
    @include('frontend.partials.ebook')


    <!-- Blog -->
    @include('frontend.partials.blog')
@endsection
