@extends('admin.master')
@section('title')
    {{'Join Us List'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Join Us List
                </h4>
              </div>

              <div class="card-body">
                @if($newsletters->count()>0)
                <table class="table table-bordered table-sm" id="example">
                  <thead class="text-center">
                    <tr>
                      <th>Sl</th>
                      <th>Email/Phone</th>
                    </tr>
                  </thead>

                  <tbody class="text-center">
                   @foreach($newsletters as $key => $row)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{ $row->email_or_phone }}</td>
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
