@extends('admin.master')
@section('title')
    {{ 'Notice Create' }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Notice Create
                                <a href="{{ route('admin.notice.index') }}" class="btn btn-primary btn-sm"
                                    style="float:right;">Back</a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.notice.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Course <span class="text-danger">*</span> </label>
                                    <select name="course_id" class="form-control" required>
                                        <option value="" selected disabled>Select a course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">
                                                {{ $course->title_en }}||{{ $course->title_bn }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>Class Link <span class="text-danger"></span> </label>
                                    <input type="text" name="class_link" class="form-control">

                                </div>

                                <div class="form-group">
                                    <label>Notice Description <span class="text-danger"></span> </label>
                                    <textarea name="content" class="form-control" rows="4"></textarea>

                                </div>
                                @php
                                    $date = date('d-m-Y');
                                @endphp
                                <input type="hidden" name="date" value="{{ $date }}">
                                <div class="form-group">
                                    <input type="submit" value="Submit" class="btn btn-primary btn-sm"
                                        style="float:right;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
