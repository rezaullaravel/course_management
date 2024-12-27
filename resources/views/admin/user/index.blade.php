@extends('admin.master')
@section('title')
    {{ 'User List' }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>User List

                                @can('create user')
                                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm" style="float:right;">
                                        <i class="las la-plus-square"></i> Create User</a>
                                @endcan
                            </h4>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Photo</th>
                                        <th>Role</th>
                                        <th>
                                            @if (auth()->user()->can('edit user') || auth()->user()->can('delete user'))
                                                Action
                                            @endif
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="text-center">
                                    @foreach ($users as $key => $row)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>
                                                @if (File::exists($row->image))
                                                    <img src="{{ asset($row->image) }}" alt="" width="80"
                                                        height="80">
                                                @else
                                                <span>N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (!empty($row->getRoleNames()))
                                                    @foreach ($row->getRoleNames() as $value)
                                                        <label class="badge bg-primary">{{ $value }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>

                                                @can('edit user')
                                                    <a href="{{ route('admin.user.edit', $row->id) }}"
                                                        class="btn btn-primary btn-sm" title="edit">
                                                        <i class="las la-pen"></i>
                                                    </a>
                                                @endcan

                                                @can('delete user')
                                                    <a href="{{ route('admin.user.delete', $row->id) }}"
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
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
