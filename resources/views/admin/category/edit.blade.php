@extends('admin.master')
@section('title')
    {{'Category Edit'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Category  Edit
                  <a href="{{route('admin.category.index')}}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                </h4>
              </div>

              <div class="card-body">
                <form action="{{route('admin.category.update',$category->id)}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Category Name English <span class="text-danger">*</span> </label>
                    <input type="text" name="name_en" value="{{$category->name_en}}"   class="form-control">
                    @error('name_en')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Category Name Bangla <span class="text-danger">*</span> </label>
                    <input type="text" name="name_bn" value="{{$category->name_bn}}"  class="form-control">
                    @error('name_bn')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Category Slug <span class="text-danger"></span> </label>
                    <input type="text" name="slug" value="{{$category->slug}}"  class="form-control">
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
