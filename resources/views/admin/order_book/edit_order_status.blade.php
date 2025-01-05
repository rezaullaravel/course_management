@extends('admin.master')
@section('title')
    {{'Book order status Update'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Book order status Updat
                  <a href="{{route('admin.view-book-order')}}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                </h4>
              </div>

              <div class="card-body">
                <form action="{{route('admin.book-order-status.update',$data->id)}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Book Order Status <span class="text-danger">*</span> </label>
                    <select name="status" class="form-control">
                        <option {{ $data->status=='received' ? 'selected':'' }} value="received">Received</option>
                        <option {{ $data->status=='completed' ? 'selected':'' }} value="completed">Completed</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary btn-sm" style="float:right;">
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
