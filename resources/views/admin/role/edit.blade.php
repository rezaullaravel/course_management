@extends('admin.master')
@section('title')
    {{'Role Edit'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Role Edit
                  <a href="{{route('admin.role.index')}}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                </h4>
              </div>

              <div class="card-body">
                <form action="{{route('admin.role.update',$role->id)}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$role->name}}" class="form-control">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Assign Permission</label>
                    <div class="row">
                       @foreach ($permissions as $permission)
                        <div class="col-md-3">
                          <input type="checkbox" name="permissions[]" value="{{$permission->name}}" {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                          <label class="form-check-label">{{$permission->name}}</label>
                        </div>
                      @endforeach
                    </div>
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