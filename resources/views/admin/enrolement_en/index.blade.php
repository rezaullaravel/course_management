@extends('admin.master')
@section('title')
    {{'En Enrolement List'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>English Site Enrolement List
                </h4>
              </div>

              <div class="card-body">
                @if($data->count()>0)
                <table class="table table-bordered table-sm" id="example">
                  <thead class="text-center">
                    <tr>
                      <th>Sl</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Country</th>
                      <th>Course</th>
                      <th>Teacher Type</th>
                      <th>Day</th>
                      <th>Application Date</th>
                    </tr>
                  </thead>

                  <tbody class="text-center">
                   @foreach($data as $key => $row)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->phone}}</td>
                      <td>{{$row->country}}</td>
                      <td>{{$row->course->title_en}}</td>
                      <td>{{$row->teacher_type}}</td>
                      <td>{{$row->days}}</td>
                      <td>{{date('d-m-Y',strtotime($row->created_at))}}</td>
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
