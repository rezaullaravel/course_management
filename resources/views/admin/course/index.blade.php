@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
@endphp

@extends('admin.master')
@section('title')
    {{ 'Course  List' }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Course List
                                @can('create-course')
                                    <a href="{{ route('admin.course-post.create') }}" class="btn btn-primary btn-sm"
                                        style="float:right;"><i class="las la-plus-square"></i>Create Course</a>
                                @endcan
                            </h4>
                        </div>

                        <div class="card-body">
                            @if ($courses->count() > 0)
                                <table class="table table-bordered table-responsive" id="example">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Sl</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Image</th>
                                            <th>Image2</th>
                                            <th>Content</th>
                                            <th>Created By</th>
                                            <th>Instructor</th>
                                            <th>Offer Price En</th>
                                            <th>Offer Price Bn</th>
                                            <th>Original Price En</th>
                                            <th>Original Price Bn</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th width="150">
                                                @if (auth()->user()->can('edit-course') ||
                                                        auth()->user()->can('delete-course') ||
                                                        auth()->user()->can('edit-course-status'))
                                                    Action
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        @foreach ($courses as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->category->name_en }}</td>
                                                <td>{{ $row->title_en }}</td>
                                                <td>
                                                    {{ $row->slug }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset($row->image) }}" width="100" height="100">
                                                </td>
                                                <td>
                                                    @if (File::exists($row->image2))
                                                        <img src="{{ asset($row->image2) }}" width="100" height="100">
                                                    @else
                                                        <span>N/A</span>
                                                    @endif

                                                </td>
                                                <td>{!! Str::limit($row->content_en, 50) !!}</td>
                                                <td>{{ $row->user->name }}</td>
                                                <td>{{ $row->teacher->name }}</td>
                                                <td>{{ $row->price_en }} $</td>
                                                {{-- <td>{{$numto->bnNum($row->price_bn) }}</td> --}}
                                                <td>{{ $row->price_bn }}  <span class="h4">৳</span></td>
                                                <td>{{ $row->original_price_en }} $</td>

                                                <td>{{ $row->original_price_bn }}  <span class="h4">৳</span></td>
                                                <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                                <td>
                                                    @if ($row->status == 1)
                                                        <span class="badge badge-primary">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @can('edit-course-status')
                                                        @if ($row->status == 1)
                                                            <a href="{{ route('admin.course-post.deactive', $row->id) }}"
                                                                class="btn btn-success btn-sm" title="update status">
                                                                <i class="las la-arrow-up"></i>
                                                            </a>
                                                        @endif

                                                        @if ($row->status == 0)
                                                            <a href="{{ route('admin.course-post.active', $row->id) }}"
                                                                class="btn btn-danger btn-sm" title="update status">
                                                                <i class="las la-arrow-down"></i>
                                                            </a>
                                                        @endif
                                                    @endcan


                                                    @can('edit-course')
                                                        <a href="{{ route('admin.course-post.edit', $row->id) }}"
                                                            class="btn btn-primary btn-sm" title="edit">
                                                            <i class="las la-pen"></i>
                                                        </a>
                                                    @endcan

                                                    @can('delete-course')
                                                        <a href="{{ route('admin.course-post.delete', $row->id) }}"
                                                            class="btn btn-danger btn-sm" title="delete"
                                                            onclick="confirmation(event)">
                                                            <i class="las la-trash"></i>
                                                        </a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h4 class="text-center text-danger">No course available.....</h4>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
