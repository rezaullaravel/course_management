@extends('admin.master')

@section('title')
    {{ 'Profile' }}
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h4>Your Profile.

                            </h4>
                        </div>
                        {{-- card body --}}
                        <form action="{{ route('admin.profile.update',$user->id) }}" method="POST"
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
                                            <input type="text" name="password"
                                                class="form-control">
                                        </a> <br>
                                        <p class="text-danger">If you want to change your password, plz enter new password...</p>
                                    </li>

                                    @if (Auth::user()->hasRole('teacher'))
                                    <li class="list-group-item">
                                        <b>Linkded In</b>
                                            <input type="text" name="teacher_linkedin" value=" {{ $user->teacher_linkedin }} "
                                                class="form-control">

                                    </li>

                                    <li class="list-group-item">
                                        <b>Description English</b>
                                            <textarea name="teacher_description"
                                                class="form-control" rows="4">
                                                {{ $user->teacher_description }}
                                            </textarea>

                                    </li>

                                    <li class="list-group-item">
                                        <b>Description Bangla</b>
                                            <textarea name="teacher_description_bn"
                                                class="form-control" rows="4">
                                                {{ $user->teacher_description_bn }}
                                            </textarea>

                                    </li>

                                    <li class="list-group-item">
                                        <b>Education Institute English</b> <a class="float-right">
                                            <input type="text" name="teacher_degree_inst" value=" {{ $user->teacher_degree_inst }} "
                                                class="form-control">
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Education Institute Bangla</b> <a class="float-right">
                                            <input type="text" name="teacher_degree_inst_bn" value=" {{ $user->teacher_degree_inst_bn }} "
                                                class="form-control">
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Teacher Degree English</b> <a class="float-right">
                                            <input type="text" name="teacher_degree" value=" {{ $user->	teacher_degree }} "
                                                class="form-control">
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Teacher Degree Bangla</b> <a class="float-right">
                                            <input type="text" name="teacher_degree_bn" value=" {{ $user->	teacher_degree_bn }} "
                                                class="form-control">
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Graduation Subject English</b> <a class="float-right">
                                            <input type="text" name="t_degree_subject" value=" {{ $user->	t_degree_subject }} "
                                                class="form-control">
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Graduation Subject Bangla</b> <a class="float-right">
                                            <input type="text" name="t_degree_subject_bn" value=" {{ $user->t_degree_subject_bn }} "
                                                class="form-control">
                                        </a>
                                    </li>
                                    @endif

                                    <li class="list-group-item">
                                        <b>Profile Picture</b> <a class="float-right">
                                            <input type="file" name="image" class="form-control">
                                        </a>
                                    </li>

                                    <li class="list-group-item">

                                        <input type="submit" value="Update Profile" class="form-control btn btn-primary">

                                    </li>
                                </ul>


                            </div>
                        </form>
                        {{-- card body --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
