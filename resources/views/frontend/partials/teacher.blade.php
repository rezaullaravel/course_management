<section class="our-instructors gap-60 flex-column container">
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
          <span class="highlight"
            >
            @if (session()->get('lang') == 'bangla')
            প্রশিক্ষক
            @else
            Instructors
            @endif
            <img class="svg-underline" src="{{asset('/')}}frontend/images/Vector-lg.svg" alt="" />
          </span>
        </span>
      </h3>
    </div>

    {{-- fetch teacher --}}
    @php
          $teachers = App\Models\User::role('teacher')->get();
    @endphp

    <div class="gap-60 flex-column">
      <div class="row">
        @foreach ($teachers as $teacher)
        <img
          src="{{asset($teacher->image)}}"
          alt=""
          class="col-12 col-sm-6 col-lg-3"
        />
        @endforeach
      </div>

      <div class="d-flex justify-content-center">
        <button class="btn btn-lg btn-primary rounded-pill">
            @if (session()->get('lang') == 'bangla')
            সকল শিক্ষক
            @else
            All Teacher
            @endif
        </button>
        <button class="btn btn-p-18 btn-primary rounded-pill">
          <img src="{{asset('/')}}frontend/images/arrow.svg" alt="" />
        </button>
      </div>
    </div>
  </section>
