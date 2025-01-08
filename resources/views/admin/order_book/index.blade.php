@extends('admin.master')
@section('title')
    {{ 'Ordered Book' }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                @if (!Auth::user()->hasRole('user'))
                                    Ordered Books
                                @else
                                    My All Ebook
                                @endif
                            </h4>
                        </div>

                        <div class="card-body">
                            @if ($orderedBooks->count() > 0)
                                <table class="table table-bordered table-responsive" id="example">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Sl</th>
                                            @if (!Auth::user()->hasRole('user'))
                                                <th>Customer</th>
                                            @endif
                                            @if (!Auth::user()->hasRole('user'))
                                                <th>Customer Email</th>
                                            @endif
                                            @if (!Auth::user()->hasRole('user'))
                                                <th>Customer Phone</th>
                                            @endif
                                            @if (!Auth::user()->hasRole('user'))
                                                <th>Customer Country</th>
                                            @endif
                                            @if (!Auth::user()->hasRole('user'))
                                                <th>Customer Location</th>
                                            @endif
                                            <th>Book Title</th>
                                            <th>Book Image</th>
                                            <th>Book Price Bn</th>
                                            <th>Order Total Bn</th>
                                            <th>Book Price En</th>
                                            <th>Order Total En</th>
                                            @if (!Auth::user()->hasRole('user'))
                                                <th>Order Status</th>
                                            @endif
                                            <th>Date</th>
                                            <th width="150">
                                                @if (auth()->user()->can('update-book-order-status') || auth()->user()->can('read-ordered-book'))
                                                    Action
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        @foreach ($orderedBooks as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                @if (!Auth::user()->hasRole('user'))
                                                    <td>{{ $row->user->name }}</td>
                                                @endif

                                                @if (!Auth::user()->hasRole('user'))
                                                    <td>{{ $row->email }}</td>
                                                @endif

                                                @if (!Auth::user()->hasRole('user'))
                                                    <td>{{ $row->phone_number }}</td>
                                                @endif

                                                @if (!Auth::user()->hasRole('user'))
                                                    <td>{{ $row->country }}</td>
                                                @endif

                                                @if (!Auth::user()->hasRole('user'))
                                                    <td>{{ $row->location }}</td>
                                                @endif

                                                <td>{{ $row->book->title_en }}</td>
                                                <td>
                                                    <img src="{{ asset($row->book->image) }}" width="80" height="80">
                                                </td>
                                                <td>
                                                   @if (!empty($row->book->price_bn))
                                                   {{ $row->book->price_bn }} <span class="h4">৳</span>
                                                   @endif
                                                </td>
                                                <td>
                                                    @if (!empty($row->order_total_bn))
                                                    {{ $row->order_total_bn }} <span class="h4">৳</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if (!empty($row->book->price_en))
                                                    {{ $row->book->price_bn }} $
                                                    @endif
                                                 </td>
                                                 <td>
                                                     @if (!empty($row->order_total_en))
                                                     {{ $row->order_total_bn }} $
                                                     @endif
                                                 </td>
                                                @if (!Auth::user()->hasRole('user'))
                                                    <td>
                                                        <span class="badge badge-primary">{{ $row->status }}</span>
                                                    </td>
                                                @endif

                                                <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                                <td>
                                                    @can('update-book-order-status')
                                                        <a href="{{ route('admin.book-order-status.edit', $row->id) }}"
                                                            class="btn btn-primary btn-sm" title="update order status">
                                                            <i class="las la-pen"></i>
                                                        </a>
                                                    @endcan

                                                    @can('read-ordered-book')
                                                        <a href="{{ route('admin.read.ordered-book', $row->book_id) }}"
                                                            class="btn btn-success btn-sm" title="read book">
                                                            <i class="las la-eye"></i>
                                                        </a>
                                                    @endcan
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
