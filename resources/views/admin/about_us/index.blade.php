@extends('admin.master')
@section('title')
    {{'About Us List'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>About Us List
                @can('create-category')
                 <a href="javascript:void(0)" class="btn btn-primary btn-sm" style="float:right;"><i class="las la-plus-square"></i>Create About Us</a>
                @endcan
                </h4>
              </div>

              <div class="card-body">
                @if($aboutus->count()>0)
                <table class="table table-bordered table-sm">
                  <thead class="text-center">
                    <tr>
                      <th>Sl</th>
                      <th>Title</th>
                      <th>Image1</th>
                      <th>Image2</th>
                      <th>Image3</th>
                      <th>Image4</th>
                       <th width="150">
                          @if(auth()->user()->can('edit-about-us')||auth()->user()->can('delete-about-us'))
                           Action
                          @endif
                        </th>
                    </tr>
                  </thead>

                  <tbody class="text-center">
                   @foreach($aboutus as $key => $row)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$row->title_en}}</td>
                      <td>
                        <img src="{{ asset($row->image1) }}" alt="" width="80" height="80">
                      </td>
                      <td>
                        <img src="{{ asset($row->image2) }}" alt="" width="80" height="80">
                      </td>
                      <td>
                        <img src="{{ asset($row->image3) }}" alt="" width="80" height="80">
                      </td>
                      <td>
                        <img src="{{ asset($row->image4) }}" alt="" width="80" height="80">
                      </td>
                      <td>
                        @can('edit-about-us')
                         <a href="{{route('admin.about-us.edit',$row->id)}}" class="btn btn-primary btn-sm" title="edit">
                          <i class="las la-pen"></i>
                        </a>
                        @endcan

                         @can('delete-about-us')
                         <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="delete">
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
