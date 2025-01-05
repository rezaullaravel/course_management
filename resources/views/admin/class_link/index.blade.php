@extends('admin.master')
@section('title')
    {{ 'Class Link' }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Class Link
                                @php
                                    $date = date('d-m-Y');
                                @endphp

                                    <span style="float: right;">Date-<strong class="text-danger">{{ $date }}</strong></span>


                            </h4>
                        </div>

                        <div class="card-body">
                            @if ($orderdCourses->count() > 0)
                                <table class="table table-bordered table-sm">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Sl</th>
                                            <th>Course</th>
                                            <th>Class Link</th>
                                            <th>Notice</th>

                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        @foreach ($orderdCourses as $key => $row)

                                         @php
                                             $classLinks = App\Models\Notice::where('course_id',$row->course_id)->where('date',$date)->get();
                                         @endphp
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->course->title_en }}</td>
                                                <td>
                                                    @foreach ( $classLinks as $link)
                                                       <a href="{{ $link->class_link }}" target="_blank">{{ $link->class_link }}

                                                       </a> <br/>
                                                    @endforeach
                                                </td>

                                                <td>
                                                    @foreach ( $classLinks as $link)
                                                    {{ $link->content }}
                                                 @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h4 class="text-center text-danger">No data available.....</h4>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
