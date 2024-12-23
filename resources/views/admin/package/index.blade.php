@extends('admin.master')
@section('title')
    {{'Package List'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Package List
                @can('create-package')
                 <a href="{{route('admin.package.create')}}" class="btn btn-primary btn-sm" style="float:right;"><i class="las la-plus-square"></i>Create Package</a>
                @endcan
                </h4>
              </div>

              <div class="card-body">
                @if($packages->count()>0)
                <table class="table table-bordered table-sm">
                  <thead class="text-center">
                    <tr>
                      <th>Sl</th>
                      <th>Name</th>
                      <th>Price En</th>
                      <th>Price Bn</th>
                       <th width="150">
                          @if(auth()->user()->can('edit-package')||auth()->user()->can('delete-package'))
                           Action
                          @endif
                        </th>
                    </tr>
                  </thead>

                  <tbody class="text-center">
                   @foreach($packages as $key => $row)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$row->name_en}}</td>
                      <td>{{$row->price_en}}</td>
                      <td>{{$row->price_bn}}</td>
                      <td>
                        @can('edit-package')
                         <a href="{{route('admin.package.edit',$row->id)}}" class="btn btn-primary btn-sm" title="edit">
                          <i class="las la-pen"></i>
                        </a>
                        @endcan

                         @can('delete-package')
                         <a href="{{route('admin.package.delete',$row->id)}}" class="btn btn-danger btn-sm" title="delete" onclick="confirmation(event)">
                          <i class="las la-trash"></i>
                         </a>
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                <h4 class="text-center text-danger">No package available.....</h4>
                @endif
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
