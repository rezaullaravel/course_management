@extends('admin.master')
@section('title')
    {{'Permission Edit'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Permission Edit
                  <a href="{{route('admin.permission.index')}}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                </h4>
              </div>

              <div class="card-body">
                <form action="{{route('admin.permission.update',$permission->id)}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$permission->name}}" class="form-control">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
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