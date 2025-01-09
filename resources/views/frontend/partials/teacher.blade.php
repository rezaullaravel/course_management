<section class="our-instructors gap-60 flex-column container">
    <!-- Heading -->
    <div class="gap-16 flex-column align-items-center">
        <button class="small-btn gap-8 flex-row align-items-center mx-auto">
            <div class="circle-8"></div>
            @if (session()->get('lang') == 'bangla')
                শিক্ষক মন্ডলী
            @else
                Teachers
            @endif

        </button>

        <h3 class="section-heading">
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
    </div>

    {{-- fetch teacher --}}
    @php
        $teachers = App\Models\User::role('teacher')->get();
    @endphp

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

        <!-- Buttons -->
        <div class="d-flex justify-content-center">
            <a href="{{ route('all.teacher') }}" class="btn btn-lg btn-primary rounded-pill">

                @if (session()->get('lang') == 'bangla')
                    সকল শিক্ষকদের দেখুন
                @else
                    See All Teachers
                @endif
            </a>
            <a href="{{ route('all.teacher') }}" class="btn btn-p-18 btn-primary rounded-pill">
                <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
            </a>
        </div>
    </div>
</section>
