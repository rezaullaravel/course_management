@extends('admin.master')
@section('title')
    {{'Testimonial List'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Testimonial List
                @can('create-testimonial')
                 <a href="{{route('admin.testimonial.create')}}" class="btn btn-primary btn-sm" style="float:right;"><i class="las la-plus-square"></i>Create Testimonial</a>
                @endcan
                </h4>
              </div>

              <div class="card-body">
                @if($testimonials->count()>0)
                <table class="table table-bordered table-sm">
                  <thead class="text-center">
                    <tr>
                      <th>Sl</th>
                      <th>Title</th>
                      <th>Name</th>
                      <th>Profession</th>
                      <th>Logo</th>
                      <th>Image</th>
                       <th width="150">
                          @if(auth()->user()->can('edit-testimonial')||auth()->user()->can('delete-testimonial'))
                           Action
                          @endif
                        </th>
                    </tr>
                  </thead>

                  <tbody class="text-center">
                   @foreach($testimonials as $key => $row)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$row->title_en}}</td>
                      <td>{{$row->name_en}}</td>
                      <td>{{$row->profession_en}}</td>
                      <td>
                        <img src="{{ asset($row->logo) }}" alt="" width="80" height="80">
                      </td>
                      <td>
                        <img src="{{ asset($row->image) }}" alt="" width="80" height="80">
                      </td>
                      <td>
                        @can('edit-testimonial')
                         <a href="{{route('admin.testimonial.edit',$row->id)}}" class="btn btn-primary btn-sm" title="edit">
                          <i class="las la-pen"></i>
                        </a>
                        @endcan

                         @can('delete-testimonial')
                         <a href="{{route('admin.testimonial.delete',$row->id)}}" class="btn btn-danger btn-sm" title="delete" onclick="confirmation(event)">
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
