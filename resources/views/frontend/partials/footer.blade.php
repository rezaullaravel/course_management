<footer class="position-relative">
    <div class="container join-us-container position-absolute top-0 start-50 translate-middle">
        <div class="join-us">
            <div class="join-us-bg gap-24">
                <h2>


                    @if (session()->get('lang') == 'bangla')
                        আমাদের সাথে থাকুন <br />
                        ভবিষ্যতের জন্য আপডেট
                    @else
                        Stay With Us <br />
                        Update For Future
                    @endif
                </h2>
                <p>

                    @if (session()->get('lang') == 'bangla')
                        বিশ্বস্ত দ্বারা পরিচালিত ইসলামী জ্ঞানের যাত্রা শুরু করুন
                        পণ্ডিতদের হৃদয় ও মনকে অনুপ্রাণিত করতে, বিশ্বাসকে সমৃদ্ধ করতে এবং
                        বোঝা
                    @else
                        Embark on a journey of Islamic knowledge, guided by trusted
                        scholars to inspire hearts and minds, enriching faith and
                        understanding
                    @endif
                </p>

                <div class="mx-lg-auto">
                    <form action="{{ route('newsletter.store') }}" method="post">
                        @csrf
                        <div class="gap-12 flex-md-row mx-auto w-100">

                            <div class="input-group rounded-pill">
                                <span class="input-group-text rounded-start-pill bg-white border-0 ps-4"
                                    id="basic-addon1">
                                    <img src="{{ asset('/') }}frontend//images/mail.svg" alt="" /></span>
                                <input type="text" name="email_or_phone" required class="form-control border-0 ps-0"
                                    @if (session()->get('lang') == 'bangla') placeholder="ইমেল বা ফোন"
                            @else
                            placeholder="Email" @endif
                                    aria-label="Username" aria-describedby="basic-addon1" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-lg btn-primary rounded-pill text-nowrap">

                                    @if (session()->get('lang') == 'bangla')
                                        আমাদের সাথে যোগ দিন
                                    @else
                                        Join Us
                                    @endif
                                </button>
                                <button class="btn btn-p-18 btn-primary rounded-pill">
                                    <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="gap-40">
            <!-- footer top content -->
            <div class="gap-40 justify-content-center align-items-center">
                <div>
                    <img src="{{ asset('/') }}frontend/images/logo.svg" alt="" />
                </div>

                <div class="gap-50 flex-row justify-content-center flex-wrap fw-medium">
                    <a href="{{ url('/') }}">
                        @if (session()->get('lang') == 'bangla')
                            হোম
                        @else
                            Home
                        @endif
                    </a>
                    <a href="{{ route('all.course') }}">
                        @if (session()->get('lang') == 'bangla')
                            কোর্স
                        @else
                            Course
                        @endif
                    </a>
                    <a href="{{ route('all.book') }}">
                        @if (session()->get('lang') == 'bangla')
                            ইবুক
                        @else
                            E-Book
                        @endif
                    </a>
                    <a href="{{ route('all.blog') }}">
                        @if (session()->get('lang') == 'bangla')
                            ব্লগ
                        @else
                            Blog
                        @endif
                    </a>
                    <a href="{{ route('about.us') }}">
                        @if (session()->get('lang') == 'bangla')
                            সম্পর্কে
                        @else
                            About
                        @endif
                    </a>
                    <a href="{{ route('contact.us') }}">
                        @if (session()->get('lang') == 'bangla')
                            যোগাযোগ
                        @else
                            Contact
                        @endif
                    </a>

                </div>
            </div>

            {{-- category fetch --}}
            @php
                $categories = App\Models\Category::orderBy('id', 'desc')->limit(4)->get();
            @endphp
            <!-- footer middle content -->
            <div class="line"></div>
            <div class="container">
                <div class="row footer-middle text-center text-sm-start">
                    @foreach ($categories as $category)
                        <div class="col-12 col-sm-6 col-lg-3 gap-24">
                            <h6>
                                @if (session()->get('lang') == 'bangla')
                                    {{ $category->name_bn }}
                                @else
                                    {{ $category->name_en }}
                                @endif

                            </h6>

                            {{-- fetch category wise course --}}
                            @php
                                $courses = App\Models\Course::where('course_category_id', $category->id)
                                    ->orderBy('id', 'desc')
                                    ->limit(4)
                                    ->select('title_en', 'title_bn', 'id', 'slug')
                                    ->get();
                            @endphp
                            @foreach ($courses as $course)
                                <div class="gap-12">
                                    <p>
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
                                    </p>

                                </div>
                            @endforeach

                        </div>
                    @endforeach
                </div>
            </div>
            <div class="line"></div>

            <!-- footer bottom content -->
            <div
                class="container d-flex gap-4 justify-content-between align-items-center flex-column flex-lg-row text-center">
                <p class="order-2 order-lg-1">
                    <img src="{{ asset('/') }}frontend//images/mail.svg" alt="" />
                    <a href="mailto:support@talimussunnah.com">support@talimussunnah.com</a>
                </p>

                <div class="d-flex flex-row gap-3 order-1 order-lg-2">
                    <img src="{{ asset('/') }}frontend/images/logos_facebook.svg" alt="" />
                    <img src="{{ asset('/') }}frontend/images/flowbite_x-solid.svg" alt="" />
                    <img src="{{ asset('/') }}frontend/images/skill-icons_instagram.svg" alt="" />
                </div>

                <p class="order-3">
                    © 2024 Talimus sunnah Academy • All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</footer>
