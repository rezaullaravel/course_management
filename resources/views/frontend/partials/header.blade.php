<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Logo Section -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('/') }}frontend/images/logo.svg" alt="" />
            </a>

            <!-- Hamburger Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Links Section -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-24">
                    <li class="nav-item">
                        <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                            @if (session()->get('lang') == 'bangla')
                                হোম
                            @else
                                Home
                            @endif
                        </a>
                    </li>

                    <!-- Dropdown Link -->
                    <li class="nav-item dropdown">
                        <a class="b dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                            @if (session()->get('lang') == 'bangla')
                                কোর্স
                            @else
                                Course
                            @endif
                        </a>
                        {{-- category fetch --}}
                        @php
                            $categories = App\Models\Category::get();
                        @endphp
                        <ul class="dropdown-menu" style="min-height: fit-content">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('categorywise.course', [
                                        'category_id' => $category->id,
                                        'slug' => $category->slug,
                                    ]) }}"
                                        class="dropdown-item" href="#">
                                        @if (session()->get('lang') == 'bangla')
                                            {{ $category->name_bn }}
                                        @else
                                            {{ $category->name_en }}
                                        @endif

                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="{{ request()->is('book-all') ? 'active' : '' }}" href="{{ route('all.book') }}">
                            @if (session()->get('lang') == 'bangla')
                                ইবুক
                            @else
                                E-Book
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->is('blog-all') ? 'active' : '' }}" href="{{ route('all.blog') }}">
                            @if (session()->get('lang') == 'bangla')
                                ব্লগ
                            @else
                                Blog
                            @endif
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="{{ request()->is('teacher-all') ? 'active' : '' }}" href="{{ route('all.teacher') }}">
                            @if (session()->get('lang') == 'bangla')
                                শিক্ষক মন্ডলী
                            @else
                                Instructors
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->is('about-us') ? 'active' : '' }}" href="{{ route('about.us') }}">
                            @if (session()->get('lang') == 'bangla')
                                সম্পর্কে
                            @else
                                About
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->is('contact-us') ? 'active' : '' }}" href="{{ route('contact.us') }}">
                            @if (session()->get('lang') == 'bangla')
                                যোগাযোগ
                            @else
                                Contact
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->is('package-pricing') ? 'active' : '' }}" href="{{ route('pricing') }}">
                            @if (session()->get('lang') == 'bangla')
                                প্রাইসিং
                            @else
                                Pricing
                            @endif
                        </a>
                    </li>
                </ul>

                <!-- Buttons Section -->

                <div class="header-buttons gap-16 flex-row align-items-center">
                    <div id="nav-small-btn">
                        @if (session()->get('lang') == 'bangla')
                            <a href="{{ route('lang.bangla') }}" class="active">BN</a>
                            <a href="{{ route('lang.english') }}" class="">EN</a>
                        @else
                            <a href="{{ route('lang.bangla') }}" class="">BN</a>
                            <a href="{{ route('lang.english') }}" class="active">EN</a>
                        @endif

                    </div>
                    <img src="{{ asset('/') }}frontend/images/search.svg" alt="" />

                    @if (Auth::check())
                    <a href="{{ url('/user/dashboard') }}" class="btn btn-outline-success rounded-pill">

                        @if (session()->get('lang') == 'bangla')
                            ড্যাশবোর্ড
                        @else
                            Dashboard
                        @endif
                    </a>
                    @else
                    <a href="{{ url('/login') }}" class="btn btn-outline-success rounded-pill">

                        @if (session()->get('lang') == 'bangla')
                            লগিন/সাইন আপ
                        @else
                            Log In/SignUp
                        @endif
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
