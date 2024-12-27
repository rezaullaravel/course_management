@extends('admin.master')
@section('title')
    {{ 'Coupon List' }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Coupon List
                                @can('create-coupon')
                                    <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary btn-sm"
                                        style="float:right;"><i class="las la-plus-square"></i>Create Coupon</a>
                                @endcan
                            </h4>
                        </div>

                        <div class="card-body">
                            @if ($coupons->count() > 0)
                                <table class="table table-bordered table-sm">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Sl</th>
                                            <th>Coupon code</th>
                                            <th>Discount Amount En</th>
                                            <th>Discount Amount Bn</th>
                                            <th>Validity</th>
                                            <th>Status</th>
                                            <th width="150">
                                                @if (auth()->user()->can('edit-category') || auth()->user()->can('delete-category'))
                                                    Action
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        @foreach ($coupons as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->code }}</td>
                                                <td>{{ $row->discount_amount_en }}</td>
                                                <td>{{ $row->discount_amount_bn }}</td>
                                                <td>{{ $row->validity }}</td>
                                                <td>
                                                    @if (\Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($row->validity)))
                                                        <span class="badge badge-danger">Deactive</span>
                                                    @else
                                                        <span class="badge badge-success">Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @can('edit-coupon')
                                                        <a href="{{ route('admin.coupon.edit', $row->id) }}"
                                                            class="btn btn-primary btn-sm" title="edit">
                                                            <i class="las la-pen"></i>
                                                        </a>
                                                    @endcan

                                                    @can('delete-coupon')
                                                        <a href="{{ route('admin.coupon.delete', $row->id) }}"
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
