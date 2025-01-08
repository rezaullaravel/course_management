@extends('admin.master')
@section('title')
    {{ 'Course Order List' }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Course Order List</h4>
                        </div>

                        <div class="card-body">
                            @if ($courseOrders->count() > 0)
                                <table class="table table-bordered table-responsive" id="example">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Sl</th>
                                            <th>Customer</th>
                                            <th>Customer Email</th>
                                            <th>Customer Phone</th>
                                            <th>Customer Location</th>
                                            <th>Customer Country</th>
                                            <th>Course</th>
                                            <th>Course Price En</th>
                                            <th>Course Price Bn</th>
                                            <th>Order Total En</th>
                                            <th>Order Total Bn</th>
                                            <th>Order Status</th>
                                            <th>Date</th>

                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        @foreach ($courseOrders as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->user->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->phone_number }}</td>
                                                <td>{{ $row->location }}</td>
                                                <td>{{ $row->country }}</td>
                                                <td>{{ $row->course->title_en }}</td>
                                                <td>
                                                    @if (!empty($row->price_en))
                                                    {{ $row->price_en.' '.'$' }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!empty($row->price_bn))
                                                    {{ $row->price_bn.' '.'৳' }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!empty($row->total_en))
                                                    {{ $row->total_en.' '.'$' }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!empty($row->total_bn))
                                                    {{ $row->total_bn.' '.'৳'  }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($row->status == 'received')
                                                        <span class="badge badge-primary">Completed</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ date('d-m-Y',strtotime($row->created_at)) }}
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
