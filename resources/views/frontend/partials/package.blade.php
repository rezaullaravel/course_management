@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
@endphp

<section class="container pricing gap-60">
    <!-- heading -->
    <div class="gap-16 flex-column">
        <!-- Button -->
        <button class="small-btn gap-8 flex-row align-items-center mx-auto">
            <div class="circle-8"></div>

            @if (session()->get('lang') == 'bangla')
                প্রাইসিং
            @else
                Pricing
            @endif
        </button>

        <!-- Heading -->
        <h3 class="section-heading mx-auto">

            @if (session()->get('lang') == 'bangla')
                মেম্বারশিপ
            @else
                Membership
            @endif
            <span class="title-container">
                <span class="highlight">
                    @if (session()->get('lang') == 'bangla')
                        প্রাইসিং
                    @else
                        Pricing
                    @endif
                    <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg" alt="" />
                </span>
            </span>
        </h3>
    </div>

    <!-- cards -->

    {{-- fetch package --}}
    @php
        $packages = App\Models\Package::get();
    @endphp

    <div class="row g-4">
        <!-- card -->
        @foreach ($packages as $package)
            <div class="col-12 col-lg-4">
                <div class="pricing-card gap-32 gradient-border">
                    <!-- heanding -->
                    <div class="gap-12 pricing-card-heading">
                        <button class="small-btn">
                            @if (session()->get('lang') == 'bangla')
                                {{ $package->name_bn }}
                            @else
                                {{ $package->name_en }}
                            @endif
                        </button>
                        <p class="fs-6 color-text">
                            @if (session()->get('lang') == 'bangla')
                                {{ $package->description_bn }}
                            @else
                                {{ $package->description_en }}
                            @endif
                        </p>
                        <div class="gap-24 flex-row align-items-center">
                            <h4>
                                @if (session()->get('lang') == 'bangla')
                                    {{ $numto->bnNum($package->price_bn) }} ৳/মা
                                @else
                                    {{ $package->price_en }} $/m
                                @endif
                            </h4>
                            {{-- <p class="fs-6 d-flex flex-row gap-1 color-gray">
                Currency
                <img src="{{asset('/')}}frontend/images/i-arrow-down.svg" alt="" />
              </p> --}}
                        </div>
                        <div class="line"></div>
                    </div>

                    <!-- feature -->
                    <div class="gap-20 pricing-card-detailes">
                        <p class="p-20">
                            @if (session()->get('lang') == 'bangla')
                                আপনার কেন এটা নেওয়া উচিত?
                            @else
                                Why should you take this?
                            @endif
                        </p>

                        @if (!empty($package->feature1_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature1_status))
                                    @if ($package->feature1_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature1_bn))
                                        {{ $package->feature1_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature1_en))
                                        {{ $package->feature1_en }}
                                    @endif
                                @endif
                            </div>
                        @endif


                        @if (!empty($package->feature2_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature2_status))
                                    @if ($package->feature2_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature2_bn))
                                        {{ $package->feature2_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature2_en))
                                        {{ $package->feature2_en }}
                                    @endif
                                @endif
                            </div>
                        @endif


                        @if (!empty($package->feature3_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature3_status))
                                    @if ($package->feature3_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature3_bn))
                                        {{ $package->feature3_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature3_en))
                                        {{ $package->feature3_en }}
                                    @endif
                                @endif
                            </div>
                        @endif


                        @if (!empty($package->feature4_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature4_status))
                                    @if ($package->feature4_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature4_bn))
                                        {{ $package->feature4_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature4_en))
                                        {{ $package->feature4_en }}
                                    @endif
                                @endif
                            </div>
                        @endif


                        @if (!empty($package->feature5_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature5_status))
                                    @if ($package->feature5_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature5_bn))
                                        {{ $package->feature5_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature5_en))
                                        {{ $package->feature5_en }}
                                    @endif
                                @endif
                            </div>
                        @endif


                        @if (!empty($package->feature6_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature6_status))
                                    @if ($package->feature6_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature6_bn))
                                        {{ $package->feature6_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature6_en))
                                        {{ $package->feature6_en }}
                                    @endif
                                @endif
                            </div>
                        @endif


                        @if (!empty($package->feature7_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature7_status))
                                    @if ($package->feature7_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature7_bn))
                                        {{ $package->feature7_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature7_en))
                                        {{ $package->feature7_en }}
                                    @endif
                                @endif
                            </div>
                        @endif

                        @if (!empty($package->feature8_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature8_status))
                                    @if ($package->feature8_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature8_bn))
                                        {{ $package->feature8_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature8_en))
                                        {{ $package->feature8_en }}
                                    @endif
                                @endif
                            </div>
                        @endif

                        @if (!empty($package->feature9_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature9_status))
                                    @if ($package->feature9_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature9_bn))
                                        {{ $package->feature9_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature9_en))
                                        {{ $package->feature9_en }}
                                    @endif
                                @endif
                            </div>
                        @endif

                        @if (!empty($package->feature10_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature10_status))
                                    @if ($package->feature10_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature10_bn))
                                        {{ $package->feature10_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature10_en))
                                        {{ $package->feature10_en }}
                                    @endif
                                @endif
                            </div>
                        @endif


                    </div>
                    <!-- buttons -->
                    <div class="d-flex mt-5">
                        @if (session()->get('lang') == 'bangla')
                            <a href="{{ route('package.checkout',$package->id) }}" class="btn btn-lg btn-outline-success w-100 rounded-pill">

                                এখনই কিনুন
                            </a>
                        @else
                            <button class="btn btn-lg btn-outline-success w-100 rounded-pill">

                                Buy Now
                            </button>
                        @endif
                        <button class="btn btn-p-18 btn-primary rounded-pill">
                            <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!--Pricing bottom card -->

    {{-- <div
      class="card pricing--bottom-card d-flex flex-column flex-md-row justify-content-between align-items-center"
    >
      <div class="gap-16">
        <h5>Need a custom prizing ?</h5>
        <p class="fs-6">
          Looking for a Custom Pricing Plan? We’re Here to Tailor the Perfect
          Solution <br />
          Just for You!
        </p>
      </div>

      <div class="d-flex justify-content-between pricing--bottom-card-btn">
        <button class="btn btn-lg btn-primary rounded-pill w-100 text-nowrap">
          Read All Books
        </button>
        <button class="btn btn-p-18 btn-primary rounded-pill">
          <img src="{{asset('/')}}frontend/images/arrow.svg" alt="" />
        </button>
      </div>
    </div> --}}
</section>
