<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/') }}backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item menu-open">
                    <a href="{{ url('user/dashboard') }}"
                        class="nav-link {{ request()->is('user/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                {{-- user --}}
                @if (auth()->user()->can('view user'))
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}"
                            class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>
                @endif
                {{-- user --}}

                {{-- permission --}}
                @if (auth()->user()->can('view permission'))
                    <li class="nav-item">
                        <a href="{{ route('admin.permission.index') }}"
                            class="nav-link {{ request()->is('admin/permission*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Permission
                            </p>
                        </a>
                    </li>
                @endif
                {{-- permission --}}

                {{-- role --}}
                @if (auth()->user()->can('view role'))
                    <li class="nav-item">
                        <a href="{{ route('admin.role.index') }}"
                            class="nav-link {{ request()->is('admin/role*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Role
                            </p>
                        </a>
                    </li>
                @endif
                {{-- role --}}

                {{-- category --}}
                @if (auth()->user()->can('view-category'))
                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}"
                            class="nav-link {{ request()->is('admin/category*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Category
                            </p>
                        </a>
                    </li>
                @endif
                {{-- category --}}

                {{-- blog --}}
                @if (auth()->user()->can('view-blog'))
                    <li class="nav-item">
                        <a href="{{ route('admin.blog-post.index') }}"
                            class="nav-link {{ request()->is('admin/blog/post*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Blog
                            </p>
                        </a>
                    </li>
                @endif
                {{-- blog --}}

                {{-- course --}}
                @if (auth()->user()->can('view-course'))
                    <li class="nav-item">
                        <a href="{{ route('admin.course-post.index') }}"
                            class="nav-link {{ request()->is('admin/course/post*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Course
                            </p>
                        </a>
                    </li>
                @endif
                {{-- course --}}

                {{-- book --}}
                @if (auth()->user()->can('view-book'))
                    <li class="nav-item">
                        <a href="{{ route('admin.book.index') }}"
                            class="nav-link {{ request()->is('admin/book*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Ebook
                            </p>
                        </a>
                    </li>
                @endif
                {{-- book --}}

                {{-- package --}}
                @if (auth()->user()->can('view-package'))
                    <li class="nav-item">
                        <a href="{{ route('admin.package.index') }}"
                            class="nav-link {{ request()->is('admin/package*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Package
                            </p>
                        </a>
                    </li>
                @endif
                {{-- package --}}

                {{-- coupon --}}
                @if (auth()->user()->can('view-coupon'))
                    <li class="nav-item">
                        <a href="{{ route('admin.coupon.index') }}"
                            class="nav-link {{ request()->is('admin/coupon*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Coupon
                            </p>
                        </a>
                    </li>
                @endif
                {{-- coupon --}}



                {{-- payment gateway --}}
                @if (auth()->user()->can('payment-gatway'))
                    <li class="nav-item">
                        <a href="{{ route('admin.payment-gateway') }}"
                            class="nav-link {{ request()->is('admin/payment-gateway*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Payment Gateway
                            </p>
                        </a>
                    </li>
                @endif
                {{-- payment gateway --}}

                {{-- book order --}}
                @if (auth()->user()->can('view-book-order'))
                    <li class="nav-item">
                        <a href="{{ route('admin.view-book-order') }}"
                            class="nav-link {{ request()->is('admin/view-ordered-book*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>

                                @if (Auth::user()->hasRole('user'))
                                    My Ebook
                                @else
                                    Book Order
                                @endif
                            </p>
                        </a>
                    </li>
                @endif
                {{-- book order --}}

                {{-- course order --}}
                @if (auth()->user()->can('view-course-order'))
                    <li class="nav-item">
                        <a href="{{ route('admin.view-course-order') }}"
                            class="nav-link {{ request()->is('admin/view-ordered-course*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>

                                Course Order
                            </p>
                        </a>
                    </li>
                @endif
                {{-- course order --}}

                {{-- package order --}}
                @if (auth()->user()->can('view-package-order'))
                    <li class="nav-item">
                        <a href="{{ route('admin.view-package-order') }}"
                            class="nav-link {{ request()->is('admin/view-ordered-package*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>

                                Package Order
                            </p>
                        </a>
                    </li>
                @endif
                {{-- package order --}}

                {{-- notice --}}
                @if (auth()->user()->can('view-notice'))
                    <li class="nav-item">
                        <a href="{{ route('admin.notice.index') }}"
                            class="nav-link {{ request()->is('admin/notice*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Notice
                            </p>
                        </a>
                    </li>
                @endif
                {{-- notice --}}

                {{-- class link --}}
                @if (auth()->user()->can('class-link'))
                    <li class="nav-item">
                        <a href="{{ route('user.class-link') }}"
                            class="nav-link {{ request()->is('admin/class-link*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Class Link
                            </p>
                        </a>
                    </li>
                @endif
                {{-- class link --}}

                {{-- about us --}}
                @if (auth()->user()->can('view-about-us'))
                    <li class="nav-item">
                        <a href="{{ route('admin.about-us.index') }}"
                            class="nav-link {{ request()->is('admin/about-us*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                About Us
                            </p>
                        </a>
                    </li>
                @endif
                {{-- about us --}}

                {{-- why study us --}}
                @if (auth()->user()->can('why-studyus-view'))
                    <li class="nav-item">
                        <a href="{{ route('admin.why-studyus.index') }}"
                            class="nav-link {{ request()->is('admin/why-studyus*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Why Study With Us
                            </p>
                        </a>
                    </li>
                @endif
                {{-- why study us --}}

                {{-- testimonial --}}
                @if (auth()->user()->can('view-testimonial'))
                    <li class="nav-item">
                        <a href="{{ route('admin.testimonial.index') }}"
                            class="nav-link {{ request()->is('admin/testimonial*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Testimonial
                            </p>
                        </a>
                    </li>
                @endif
                {{-- testimonial --}}

                {{-- contact us message --}}
                @if (auth()->user()->can('view-contact-message'))
                    <li class="nav-item">
                        <a href="{{ route('admin.view-contact-message') }}"
                            class="nav-link {{ request()->is('admin/view-contact-message*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Contact Message
                            </p>
                        </a>
                    </li>
                @endif
                {{-- contact us message --}}

                {{-- course --}}
                {{-- @if (auth()->user()->can('view-course-category') || auth()->user()->can('view-course'))
                    <li class="nav-item {{ request()->is('admin/course*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/course*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Course Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        @can('view-course-category')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.course-category.index') }}"
                                        class="nav-link {{ request()->is('admin/course/category*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Course Category</p>
                                    </a>
                                </li>
                            </ul>
                        @endcan

                        @can('view-course')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.course-post.index') }}"
                                        class="nav-link {{ request()->is('admin/course/post*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Course</p>
                                    </a>
                                </li>
                            </ul>
                        @endcan
                    </li>
                @endif --}}
                {{-- course --}}

                {{-- setting --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.logout') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- setting --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
