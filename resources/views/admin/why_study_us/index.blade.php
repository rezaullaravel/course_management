@extends('admin.master')
@section('title')
    {{'Why Study Us List'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Why Study With Us  List
                @can('why-studyus-create')
                 <a href="{{route('admin.why-studyus.create')}}" class="btn btn-primary btn-sm" style="float:right;"><i class="las la-plus-square"></i>Create Study Us</a>
                @endcan
                </h4>
              </div>

              <div class="card-body">
                @if($data->count()>0)
                <table class="table  table-sm">
                  <thead class="text-center">
                    <tr>
                      <th>Sl</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Description</th>
                       <th width="150">
                          @if(auth()->user()->can('why-studyus-edit')||auth()->user()->can('why-studyus-delete'))
                           Action
                          @endif
                        </th>
                    </tr>
                  </thead>

                  <tbody class="text-center">
                   @foreach($data as $key => $row)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>
                        <img src="{{ asset($row->image) }}" alt="" width="80" height="80">
                      </td>
                      <td>{{$row->title_en}}</td>
                      <td>{{$row->description_en}}</td>
                      <td>
                        @can('why-studyus-edit')
                         <a href="{{route('admin.why-studyus.edit',$row->id)}}" class="btn btn-primary btn-sm" title="edit">
                          <i class="las la-pen"></i>
                        </a>
                        @endcan

                         @can('why-studyus-delete')
                         <a href="{{route('admin.why-studyus.delete',$row->id)}}" class="btn btn-danger btn-sm" title="delete" onclick="confirmation(event)">
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
