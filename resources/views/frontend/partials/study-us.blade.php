<section class="study gap-60 position-relative">
    <div class="container gap-60">
        <img class="study-lamp" src="{{ asset('/') }}frontend/images/i-lamp.svg" alt="" />
        <div class="gap-16 flex-column align-items-center">
            <button class="small-btn gap-8 flex-row align-items-center mx-auto">
                <div class="circle-8"></div>
                @if (session()->get('lang') == 'bangla')
                    কেন আমাদের পছন্দ করবেন
                @else
                    Why Choose Us
                @endif
            </button>


            @if (session()->get('lang') == 'bangla')
                <h3 class="section-heading">
                    আমাদের সাথে স্টাডি করার
                    <span class="title-container">
                        <span class="highlight">কারণ
                            <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg"
                                alt="" />
                        </span>
                    </span>
                </h3>
            @else
                <h3 class="section-heading">
                    Reasons To Study
                    <span class="title-container">
                        <span class="highlight">With Us
                            <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg"
                                alt="" />
                        </span>
                    </span>
                </h3>
            @endif

        </div>

        <div class="">
            <img class="study-hand" src="{{ asset('/') }}frontend/images/i-hand.svg" alt="" />
            <div class="row g-4 reasons">
                <div class="line line-1 d-none d-lg-block"></div>
                <div class="line line-2 d-none d-lg-block"></div>

                @php
                    $data = DB::table('whystudy_us')->orderBy('id', 'asc')->get();
                @endphp

                @foreach ($data as $value)
                <div class="col-12 col-md-6 col-lg-4 gap-24 flex-column">
                    <img src="{{ asset($value->image) }}" width="50px" alt="" />
                    <div class="gap-8 flex-column">
                        <h5>
                            @if (session()->get('lang') == 'bangla')
                            {{ $value->title_bn }}
                            @else
                            {{ $value->title_en }}
                            @endif

                        </h5>
                        <p>
                            @if (session()->get('lang') == 'bangla')
                            {{ $value->description_bn }}
                            @else
                            {{ $value->description_en }}
                            @endif
                        </p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
