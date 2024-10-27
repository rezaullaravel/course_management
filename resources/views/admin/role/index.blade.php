@extends('admin.master')
@section('title')
    {{'Role List'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Role List
                  
                  @can('create role')
                   <a href="{{route('admin.role.create')}}" class="btn btn-primary btn-sm" style="float:right;"><i class="las la-plus-square"></i>Create Role</a> 
                  @endcan
                </h4>
              </div>

              <div class="card-body">
                <table class="table table-bordered">
                  <thead class="text-center">
                    <tr>
                      <th>Sl</th>
                      <th>Name</th>
                      <th>Permission</th>
                      
                        <th width="150">
                          @if(auth()->user()->can('edit role')||auth()->user()->can('delete role'))
                           Action
                          @endif
                        </th>
                    </tr>
                  </thead>

                  <tbody class="text-center">
                    @foreach($roles as $key => $row)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$row->name}}</td>
                     
                      <td>
                        <ul style="padding: 0;">
                          @foreach ($row->permissions as $permission)
                              <li style="float: left; margin-left:20px;">
                                <span style="margin-right:15px;">{{ $permission->name }}</span>
                              </li>
                          @endforeach
                        </ul>
                      </td>
                      <td>
                        
                        @can('edit role')
                          <a href="{{route('admin.role.edit',$row->id)}}" class="btn btn-primary btn-sm" title="edit">
                          Edit
                          </a>
                        @endcan
                        @can('delete role')
                         <a href="{{route('admin.role.delete',$row->id)}}" class="btn btn-danger btn-sm" title="delete" onclick="confirmation(event)">
                          Delete
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