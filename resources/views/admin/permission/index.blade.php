@extends('admin.master')
@section('title')
    {{'Permission List'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Permission List
                @can('create permission')
                 <a href="{{route('admin.permission.create')}}" class="btn btn-primary btn-sm" style="float:right;"><i class="las la-plus-square"></i>Create Permission</a> 
                @endcan
                </h4>
              </div>

              <div class="card-body">
                <table class="table table-bordered">
                  <thead class="text-center">
                    <tr>
                      <th>Sl</th>
                      <th>Name</th>
                       <th width="150">
                          @if(auth()->user()->can('edit permission')||auth()->user()->can('delete permission'))
                           Action
                          @endif
                        </th>
                    </tr>
                  </thead>

                  <tbody class="text-center">
                    @foreach($permissions as $key => $row)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$row->name}}</td>
                      <td>
                        @can('edit permission')
                         <a href="{{route('admin.permission.edit',$row->id)}}" class="btn btn-primary btn-sm" title="edit">
                          <i class="las la-pen"></i>
                        </a> 
                        @endcan

                         @can('delete permission')
                         <a href="{{route('admin.permission.delete',$row->id)}}" class="btn btn-danger btn-sm" title="delete" onclick="confirmation(event)">
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