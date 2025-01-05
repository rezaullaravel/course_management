@extends('admin.master')
@section('title')
    {{ 'Package Order List' }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Package Order List</h4>
                        </div>

                        <div class="card-body">
                            @if ($packageOrders->count() > 0)
                                <table class="table table-bordered table-responsive">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Sl</th>
                                            <th>Customer</th>
                                            <th>Customer Email</th>
                                            <th>Customer Phone</th>
                                            <th>Customer Location</th>
                                            <th>Customer Country</th>
                                            <th>Package</th>
                                            <th>Package Price En</th>
                                            <th>Package Price Bn</th>
                                            <th>Order Total En</th>
                                            <th>Order Total Bn</th>
                                            <th>Order Status</th>
                                            <th>Date</th>

                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        @foreach ($packageOrders as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->user->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->phone_number }}</td>
                                                <td>{{ $row->location }}</td>
                                                <td>{{ $row->country }}</td>
                                                <td>{{ $row->package->name_en }}</td>
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
                                                    @if (!empty($row->order_total_en))
                                                    {{ $row->order_total_en.' '.'$' }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!empty($row->order_total_bn))
                                                    {{ $row->order_total_bn.' '.'৳'  }}
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
