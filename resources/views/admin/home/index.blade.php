@extends('admin.master')
@section('title')
    {{ 'Dashboard' }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            {{-- if user type admin --}}
            @if (Auth::user()->hasRole('admin'))
                <div class="row">
                    <div class="col-lg-3 col-6">
                        @php
                            $category = App\Models\Category::count();
                            $active_course = App\Models\Course::where('status', 1)->count();
                            $total_course = App\Models\Course::count();
                            $active_blog = App\Models\Blog::where('status', 1)->count();
                            $total_blog = App\Models\Blog::count();
                            $active_book = App\Models\Book::where('status', 1)->count();
                            $total_book = App\Models\Book::count();
                            $total_user = App\Models\User::count();

                        @endphp
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $category }}</h3>

                                <p>Categories</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('admin.category.index') }}" class="small-box-footer">View All<i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">

                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $active_course }}<sup style="font-size: 20px"></sup></h3>

                                <p>Active Course</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('admin.course-post.index') }}" class="small-box-footer">View All <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $total_course }}</h3>

                                <p>Total Course</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('admin.course-post.index') }}" class="small-box-footer">View All <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $active_blog }}</h3>

                                <p>Active Blog</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('admin.blog-post.index') }}" class="small-box-footer">View all <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $total_blog }}</h3>

                                <p>Total Blog</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('admin.blog-post.index') }}" class="small-box-footer">View All<i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $total_book }}</h3>

                                <p>Total Book</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('admin.book.index') }}" class="small-box-footer">View All<i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>


                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $active_book }}</h3>

                                <p>Active Book</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('admin.book.index') }}" class="small-box-footer">View all <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $total_user }}</h3>

                                <p>Total Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('admin.user.index') }}" class="small-box-footer">View All <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            @endif
            {{-- if user type admin end --}}
            {{-- if user type not admin --}}
            @if (!Auth::user()->hasRole('admin'))
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                {{-- <h4>Your Profile.

                                </h4> --}}
                            </div>
                            {{-- card body --}}
                            @php
                                $user = Auth::user();
                            @endphp
                            <form action="{{ route('admin.profile.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ $user->image ? asset($user->image) : asset('backend/dist/img/avatar5.png') }}"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">
                                        <input type="text" name="name" value="{{ $user->name }}"
                                            class="form-control text-center" required>
                                    </h3>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Name Bangla</b> <a class="float-right">
                                                <input type="text" name="name_bn" value=" {{ $user->name_bn }} "
                                                    class="form-control">
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Email</b> <a class="float-right">
                                                <input type="email" name="email" value=" {{ $user->email }} "
                                                    class="form-control" required readonly>
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <b>Password</b> <a class="float-right">
                                                <input type="text" name="password" class="form-control">
                                            </a> <br>
                                            <p class="text-danger">If you want to change your password, plz enter new
                                                password...</p>
                                        </li>

                                        @if (Auth::user()->hasRole('teacher'))
                                            <li class="list-group-item">
                                                <b>Linkded In</b>
                                                <input type="text" name="teacher_linkedin"
                                                    value=" {{ $user->teacher_linkedin }} " class="form-control">

                                            </li>

                                            <li class="list-group-item">
                                                <b>Description English</b>
                                                <textarea name="teacher_description" class="form-control" rows="4">
                                                {{ $user->teacher_description }}
                                            </textarea>

                                            </li>

                                            <li class="list-group-item">
                                                <b>Description Bangla</b>
                                                <textarea name="teacher_description_bn" class="form-control" rows="4">
                                                {{ $user->teacher_description_bn }}
                                            </textarea>

                                            </li>

                                            <li class="list-group-item">
                                                <b>Education Institute English</b> <a class="float-right">
                                                    <input type="text" name="teacher_degree_inst"
                                                        value=" {{ $user->teacher_degree_inst }} " class="form-control">
                                                </a>
                                            </li>

                                            <li class="list-group-item">
                                                <b>Education Institute Bangla</b> <a class="float-right">
                                                    <input type="text" name="teacher_degree_inst_bn"
                                                        value=" {{ $user->teacher_degree_inst_bn }} "
                                                        class="form-control">
                                                </a>
                                            </li>

                                            <li class="list-group-item">
                                                <b>Teacher Degree English</b> <a class="float-right">
                                                    <input type="text" name="teacher_degree"
                                                        value=" {{ $user->teacher_degree }} " class="form-control">
                                                </a>
                                            </li>

                                            <li class="list-group-item">
                                                <b>Teacher Degree Bangla</b> <a class="float-right">
                                                    <input type="text" name="teacher_degree_bn"
                                                        value=" {{ $user->teacher_degree_bn }} " class="form-control">
                                                </a>
                                            </li>

                                            <li class="list-group-item">
                                                <b>Graduation Subject English</b> <a class="float-right">
                                                    <input type="text" name="t_degree_subject"
                                                        value=" {{ $user->t_degree_subject }} " class="form-control">
                                                </a>
                                            </li>

                                            <li class="list-group-item">
                                                <b>Graduation Subject Bangla</b> <a class="float-right">
                                                    <input type="text" name="t_degree_subject_bn"
                                                        value=" {{ $user->t_degree_subject_bn }} " class="form-control">
                                                </a>
                                            </li>
                                        @endif

                                        <li class="list-group-item">
                                            <b>Profile Picture</b> <a class="float-right">
                                                <input type="file" name="image" class="form-control">
                                            </a>
                                        </li>

                                        <li class="list-group-item">

                                            <input type="submit" value="Update Profile"
                                                class="form-control btn btn-primary">

                                        </li>
                                    </ul>


                                </div>
                            </form>
                            {{-- card body --}}
                        </div>
                    </div>
                </div>
            @endif
            {{-- if user type not admin end --}}
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
