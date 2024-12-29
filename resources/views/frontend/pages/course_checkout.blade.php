@extends('frontend.master')

@section('title')
    {{ 'Course Checkout' }}
@endsection
@section('content')
    <div class="w-100 h-100 d-flex justify-content-center align-items-center">

        <div class="modal-card border-0">
            @if (session('error_message'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>সতর্কতা!</strong> {{ session('error_message') }}.
                </div>
            @endif

            @if (session('success_message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>অভিনন্দন!</strong> {{ session('success_message') }}.
                </div>
            @endif

            {{-- for remeber me  functionality--}}
            @php
                $userInfo = App\Models\UserInfo::where('user_id', Auth::id())->first();
            @endphp


            {{-- calculate order total --}}
            @if (session()->get('discount_amount_bn'))
                @php
                    $total = $course->price_bn - session()->get('discount_amount_bn');
                @endphp
            @else
                @php
                    $total = $course->price_bn;
                @endphp
            @endif
            <div class="gap-40 flex-lg-row">
                <!-- Personal details -->
                <form action="{{ route('course-order.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="total" value="{{ $total }}">
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <input type="hidden" name="price_bn" value="{{ $course->price_bn }}">

                    <div class="billing-details gap-32 padding-40 card">
                        <div class="d-flex justify-content-between">
                            <h5>কোর্স অর্ডার সংক্রান্ত তথ্য</h5>
                            <div class="gap-8 flex-row align-items-center text-nowrap">
                            </div>
                        </div>

                        <!-- Input Info -->
                        <div class="gap-24">
                            <!-- email -->
                            <div class="input-group">
                                <input type="text" name="email" value="{{ Auth::user()->email }}" readonly
                                    class="form-control rounded-3 padding-12"
                                    aria-label="Dollar amount (with dot and two decimal places)" placeholder="email address"
                                    required />
                            </div>
                            <!-- phone -->
                            <div class="input-group">
                                <input type="text" name="phone_number" value="{{ $userInfo->phone_number ?? '' }}"  class="form-control rounded-3 padding-12"
                                    aria-label="Dollar amount (with dot and two decimal places)" placeholder="ফোন নাম্বার"
                                    required />
                            </div>


                            <!-- country -->
                            <div class="input-group">
                                <input type="text" name="country" value="{{ $userInfo->country ?? '' }}" class="form-control rounded-3 padding-12"
                                    aria-label="Dollar amount (with dot and two decimal places)" placeholder="দেশের নাম"
                                    required />
                            </div>
                            <!-- location -->
                            <div class="input-group">
                                <input type="text" name="location" value="{{ $userInfo->location ?? '' }}"
                                    class="form-control rounded-3 padding-12"
                                    aria-label="Dollar amount (with dot and two decimal places)" placeholder="অবস্থান"
                                    required />
                            </div>
                        </div>

                        <!-- payment method -->
                        <div class="gap-16">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check gap-8 flex-row align-items-center">
                                    <input class="form-check-input mt-0" type="radio" name="payment_method"
                                        value="aamar_pay" id="flexRadioDefault1" checked required />
                                    <label class="form-check-label">
                                        বিকাশ/নগদ/রকেট
                                    </label>
                                </div>

                                <div class="gap-8 flex-row">
                                    <img src="../images/card-visa.svg" alt="" />
                                    <img src="../images/card-mastar.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <!-- payment method -->
                        <!-- agree -->
                        <div class="form-check gap-8 flex-row align-items-center">
                            <input class="form-check-input mt-0" type="checkbox" name="save_info" value="1"
                                id="flexCheckChecked" checked />
                            <label class="form-check-label mb-0" for="flexCheckChecked">
                                পরবর্তীতে দ্রুত চেক আউট করার জন্য এই তথ্য সংরক্ষণ করুন
                            </label>
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-primary bg-lg w-100">কনফার্ম অর্ডার</button>
                        </div>
                    </div>
                </form>
                <!-- right -->
                <div class="card padding-40 gap-32 flex-column align-content-between">
                    <div class="gap-32">
                        <!-- product -->
                        <div class="gap-32 flex-row p-1 justify-content-between align-items-center">
                            <div class="gap-16 flex-row align-items-center">
                                <img class="black-and-white" src="../images/book-al-quran.svg" width="56px"
                                    alt="" />
                                <p class="p-16">{{ $course->title_bn }}</p>
                            </div>

                            <p class="p-18 fw-medium">৳ {{ $course->price_bn }}</p>
                        </div>

                        <!-- price -->
                        <div class="gap-16">
                            <div class="d-flex justify-content-between">
                                <p class="p-16">সাব টোটাল :</p>
                                <p class="p-16">
                                    ৳ {{ $course->price_bn }}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="p-16"> কুপন ডিসকাউন্ট:</p>
                                <p class="p-16">
                                    @if (session()->get('discount_amount_bn'))
                                        ৳ {{ session()->get('discount_amount_bn') }}
                                    @else
                                    @endif
                                </p>
                            </div>

                            <div class="border w-100"></div>
                            <div class="d-flex justify-content-between">
                                <p class="p-18 color-text">টোটাল :</p>
                                <p class="p-18 color-text">
                                    @if (session()->get('discount_amount_bn'))
                                        ৳ {{ $course->price_bn - session()->get('discount_amount_bn') }}
                                    @else
                                        ৳ {{ $course->price_bn }}
                                    @endif
                                </p>
                            </div>
                        </div>


                        <!--   Apply coupon -->
                        <form action="{{ route('coupon.apply') }}" method="POST">
                            @csrf
                            <div class="gap-16 flex-row">
                                <input type="text" name="code" class="form-control rounded-3 padding-12 w-100"
                                    placeholder="কুপন কোড (যদি থাকে)" required />
                                <button type="submit"
                                    class="gap-8 rounded-2 btn btn-lg border flex-row align-items-center justify-content-center text-lg-nowrap btn btn-success">
                                    এপ্লাই কুপন
                                </button>

                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
