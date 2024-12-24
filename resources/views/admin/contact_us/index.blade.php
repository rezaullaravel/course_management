@extends('admin.master')
@section('title')
    {{'Contact Message List'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Contact Message  List
                </h4>
              </div>

              <div class="card-body">
                @if($messages->count()>0)
                <table class="table  table-sm">
                  <thead class="text-center">
                    <tr>
                      <th>Sl</th>
                      <th>Sender Name </th>
                      <th>Email</th>
                      <th>Phone </th>
                      <th>Subject </th>
                      <th>Message</th>
                      <th>Status</th>
                    </tr>
                  </thead>

                  <tbody class="text-center">
                   @foreach($messages as $key => $row)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->phone}}</td>
                      <td>{{$row->subject}}</td>
                      <td>{{$row->message}}</td>
                      <td>
                        @if ($row->view_status=='0')
                             <a href="{{ route('admin.message-status-change',$row->id) }}" class="btn btn-danger btn-sm">Pending</a>
                        @else
                        <a href="javascript:void(0);" class="btn btn-primary btn-sm">Viewed</a>
                        @endif
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
