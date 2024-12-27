<footer class="">
    <div class="container">
        <div class="gap-40">
            <!-- footer top content -->
            <div class="gap-40 justify-content-center align-items-center">
                <div>
                    <img src="{{ asset('/') }}frontend/images/logo.svg" alt="" />
                </div>
                <div class="gap-50 flex-row justify-content-center flex-wrap fw-medium">
                    <a href="">
                        @if (session()->get('lang') == 'bangla')
                            হোম
                        @else
                            Home
                        @endif
                    </a>
                    <a href="">
                        @if (session()->get('lang') == 'bangla')
                            কোর্স
                        @else
                            Course
                        @endif
                    </a>
                    <a href="">
                        @if (session()->get('lang') == 'bangla')
                            ইবুক
                        @else
                            E-Book
                        @endif
                    </a>
                    <a href="">
                        @if (session()->get('lang') == 'bangla')
                            ব্লগ
                        @else
                            Blog
                        @endif
                    </a>
                    <a href="">
                        @if (session()->get('lang') == 'bangla')
                            সম্পর্কে
                        @else
                            About
                        @endif
                    </a>
                    <a href="">
                        @if (session()->get('lang') == 'bangla')
                            যোগাযোগ
                        @else
                            Contact
                        @endif
                    </a>
                </div>
            </div>

            <!-- footer middle content -->
            <div class="line"></div>
            <div class="container">
                <div class="row footer-middle text-center text-sm-start">
                    {{-- category fetch --}}
                    @php
                        $categories = App\Models\Category::orderBy('id', 'desc')->limit(4)->get();
                    @endphp

                    @foreach ($categories as $category)
                        <div class="col-12 col-sm-6 col-lg-3 gap-24">
                            <h6>
                                @if (session()->get('lang') == 'bangla')
                                    {{ $category->name_bn }}
                                @else
                                    {{ $category->name_en }}
                                @endif
                            </h6>
                            @php
                                $courses = App\Models\Course::where('course_category_id', $category->id)
                                    ->orderBy('id', 'desc')
                                    ->limit(4)
                                    ->select('title_en','title_bn','id','slug')
                                    ->get();
                            @endphp


                            @foreach ($courses as $course)
                                <div class="gap-12">
                                    <p>
                                        @if (session()->get('lang') == 'bangla')
                                            {{ $course->title_bn }}
                                        @else
                                            {{ $course->title_en }}
                                        @endif
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
                    <img src="{{ asset('/') }}frontend/images/mail.svg" alt="" />
                    support@talimussunnah.com
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
