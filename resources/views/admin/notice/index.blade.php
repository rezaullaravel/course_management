@extends('admin.master')
@section('title')
    {{'Notice List'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Notice List
                @can('create-notice')
                 <a href="{{route('admin.notice.create')}}" class="btn btn-primary btn-sm" style="float:right;"><i class="las la-plus-square"></i>Create Notice</a>
                @endcan
                </h4>
              </div>

              <div class="card-body">
                @if($notices->count()>0)
                <table class="table table-bordered table-sm">
                  <thead class="text-center">
                    <tr>
                      <th>Sl</th>
                      <th>Course</th>
                      <th>Class Link</th>
                      <th>Notice</th>
                      <th>Date</th>
                       <th width="150">
                          @if(auth()->user()->can('delete-notice'))
                           Action
                          @endif
                        </th>
                    </tr>
                  </thead>

                  <tbody class="text-center">
                   @foreach($notices as $key => $row)
                    <tr>
                      <td>{{$key+1}}</td>
                     <td>{{ $row->course->title_en }}</td>
                     <td>
                        <a href="{{ $row->class_link }}" target="_blank">{{ $row->class_link }}</a>
                     </td>
                     <td>{{ $row->content }}</td>
                     <td>
                        {{ $row->date }}
                     </td>
                      <td>
                         @can('delete-notice')
                         <a href="{{route('admin.notice.delete',$row->id)}}" class="btn btn-danger btn-sm" title="delete" onclick="confirmation(event)">
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
