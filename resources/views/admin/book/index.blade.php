@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
@endphp

@extends('admin.master')
@section('title')
    {{ 'Book  List' }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ebook List
                                @can('create-book')
                                    <a href="{{ route('admin.book.create') }}" class="btn btn-primary btn-sm"
                                        style="float:right;"><i class="las la-plus-square"></i>Create Ebook</a>
                                @endcan
                            </h4>
                        </div>

                        <div class="card-body">
                            @if ($books->count() > 0)
                                <table class="table table-bordered table-responsive" id="example">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Sl</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Image</th>
                                            <th>Image2</th>
                                            <th>Uploaded By</th>
                                            <th>Offer Price En</th>
                                            <th>Offer Price Bn</th>
                                            <th>Original Price En</th>
                                            <th>Original Price Bn</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th width="150">
                                                @if (auth()->user()->can('edit-book') || auth()->user()->can('delete-book') || auth()->user()->can('edit-book-status')||auth()->user()->can('book-details'))
                                                    Action
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        @foreach ($books as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->category->name_en }}</td>
                                                <td>{{ $row->title_en }}</td>
                                                <td>
                                                    {{ $row->slug }}
                                                </td>
                                                <td>
                                                     <img src="{{ asset($row->image)}}" width="100" height="100">

                                                </td>
                                                <td>
                                                    @if (File::exists($row->another_image))
                                                        <img src="{{ asset($row->another_image) }}" width="100"
                                                            height="100">
                                                    @else
                                                        <span>N/A</span>
                                                    @endif

                                                </td>
                                                <td>{{ $row->user->name }}</td>
                                                <td>
                                                    @if (!empty($row->price_en)) $
                                                        {{ $row->price_en }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                {{-- <td>{{$numto->bnNum($row->price_bn) }}</td> --}}
                                                <td>
                                                    @if (!empty($row->price_bn)) <span class="h4">৳</span>
                                                        {{ $row->price_bn }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>

                                                <td>
                                                    @if (!empty($row->original_price_en)) $
                                                        {{ $row->original_price_en }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!empty($row->original_price_bn)) <span class="h4">৳</span>
                                                        {{ $row->original_price_bn }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                                <td>
                                                    @if ($row->status == 1)
                                                        <span class="badge badge-primary">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @can('edit-book-status')
                                                        @if ($row->status == 1)
                                                            <a href="{{ route('admin.book.deactive', $row->id) }}"
                                                                class="btn btn-success btn-sm" title="update status">
                                                                <i class="las la-arrow-up"></i>
                                                            </a>
                                                        @endif

                                                        @if ($row->status == 0)
                                                            <a href="{{ route('admin.book.active', $row->id) }}"
                                                                class="btn btn-danger btn-sm" title="update status">
                                                                <i class="las la-arrow-down"></i>
                                                            </a>
                                                        @endif
                                                    @endcan

                                                    @can('book-details')
                                                    <a href="{{ asset($row->book_pdf_file) }}"
                                                        class="btn btn-info btn-sm" title="view details" target="_blank">
                                                        <i class="las la-eye"></i>
                                                    </a>
                                                @endcan


                                                    @can('edit-book')
                                                        <a href="{{ route('admin.book.edit', $row->id) }}"
                                                            class="btn btn-primary btn-sm" title="edit">
                                                            <i class="las la-pen"></i>
                                                        </a>
                                                    @endcan

                                                    @can('delete-book')
                                                        <a href="{{ route('admin.book.delete', $row->id) }}"
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
                                <h4 class="text-center text-danger">No book available.....</h4>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
