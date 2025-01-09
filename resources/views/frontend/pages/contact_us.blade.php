@extends('frontend.master')

@section('title')
    {{ 'Contact Page' }}
@endsection
@section('content')
    <div class="container padding-top-bottom-40-80 gap-60">

        @if (session('success_message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> {{ session('success_message') }}.
          </div>
        @endif
        <!-- heading -->
        <div class="gap-32">


            @if (session()->get('lang') == 'bangla')
                <h3 class="section-heading text-center">
                    আপনার কোন প্রশ্ন আছে বা
                    <span class="title-container">
                        <span class="highlight">
                            সাহায্য প্রয়োজন?
                            <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector-lg.svg" alt="" />
                        </span>
                    </span>
                </h3>
            @else
                <h3 class="section-heading text-center">
                    Have you any questions or need
                    <span class="title-container">
                        <span class="highlight">
                            assistance?
                            <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector-lg.svg"
                                alt="" />
                        </span>
                    </span>
                </h3>
            @endif

            <div class="line"></div>
        </div>

        <div class="row g-4">
            <!-- info -->

            <div class="col-12 col-lg-6">
                <div class="info-bg">
                    <div class="info">
                        <div class="gap-24">
                            <div class="gap-12 flex-row align-items-center">
                                <img src="{{ asset('/') }}frontend/images/location.svg" alt="" />
                                <p class="text-lg-nowrap">
                                    123 Peachtree Street NE, Atlanta, GA 30309
                                </p>
                            </div>

                            <div class="gap-12 flex-row align-items-center">
                                <img src="{{ asset('/') }}frontend/images/info-email.svg" alt="" />
                                <p><a href="mailto:support@talimussunnah.com">support@talimussunnah.com</a></p>
                            </div>

                            <div class="gap-12 flex-row align-items-center">
                                <img src="{{ asset('/') }}frontend/images/phone.svg" alt="" />
                                <p><a href="tel:+8801623886890">+8801623886890</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card p-3 p-lg-5 rounded-3">
                    <div class="gap-40">
                        <div class="text-center">
                            <h5>
                                @if (session()->get('lang') == 'bangla')
                                    যোগাযোগ করুন
                                @else
                                    Get in touch
                                @endif
                            </h5>
                            <p>
                                @if (session()->get('lang') == 'bangla')
                                    যেকোনো অনুসন্ধান, প্রশ্নের জন্য আমাদের যোগাযোগ ফোরামের মাধ্যমে আমাদের সাথে যোগাযোগ করুন।
                                @else
                                    Connect with us through our contact forum for any inquiries, questions.
                                @endif
                            </p>
                        </div>
                        <div class="gap-24">
                            <form action="{{ route('store.contact.message') }}" method="post">
                                @csrf
                                <input type="text" name="name" class="form-control py-3 px-4 rounded-3" required
                                    @if (session()->get('lang') == 'bangla') placeholder="আপনার নাম"
                @else
                placeholder="Your name" @endif />
                                <input type="email" name="email" required class="form-control py-3 px-4 rounded-3" id=""
                                    @if (session()->get('lang') == 'bangla') placeholder="আপনার ইমেইল এড্রেস"
                @else
                placeholder="Your emai address" @endif />

                                <input type="text" name="phone" required class="form-control py-3 px-4 rounded-3" id=""
                                    @if (session()->get('lang') == 'bangla') placeholder="ফোন নাম্বার"
                @else
                placeholder="Phone number" @endif />

                <input type="text" name="country" required class="form-control py-3 px-4 rounded-3" id=""
                                    @if (session()->get('lang') == 'bangla') placeholder="দেশের নাম"
                @else
                placeholder="Country Name" @endif />

                                <input type="text" name="subject" required class="form-control py-3 px-4 rounded-3" id=""
                                    @if (session()->get('lang') == 'bangla') placeholder="বিষয়"
                @else
                placeholder="Subject" @endif />

                                <textarea name="message" required class="form-control py-3 px-4 rounded-3" id="exampleFormControlTextarea1" rows="3"
                                    @if (session()->get('lang') == 'bangla') placeholder="আপনার বার্তা লিখুন"
                @else
                placeholder="Write your message" @endif></textarea>
                        </div>
                        <div class="d-flex w-100">
                            <button type="submit" class="btn btn-lg btn-primary w-100 rounded-pill">
                                @if (session()->get('lang') == 'bangla')
                                    সেন্ড করুন
                                @else
                                    Send
                                @endif
                            </button>

                            <button class="btn btn-p-18 btn-primary rounded-pill">
                                <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                            </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="container gap-60 map">
            <h4 class="text-center">Find Us On Google Map</h4>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2786.109213543445!2d9.678594675190062!3d45.708845817083706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47815160d828c0e9%3A0x5d15db7abf68ffe3!2sAtalanta%20B.C.!5e0!3m2!1sen!2sbd!4v1734845966635!5m2!1sen!2sbd"
                width="100%" height="550" style="border: 0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    </div>

    <!-- our course -->
    @include('frontend.partials.course')

    <!-- E-books -->
    @include('frontend.partials.ebook')

    <!-- Blog -->
    @include('frontend.partials.blog')
@endsection
