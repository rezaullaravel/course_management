@extends('admin.master')
@section('title')
    {{'Testimonial Update'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Testimonial  Update
                  <a href="{{route('admin.testimonial.index')}}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                </h4>
              </div>

              <div class="card-body">
                <form action="{{route('admin.testimonial.update',$testimonial->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label>Title English <span class="text-danger">*</span> </label>
                    <input type="text" name="title_en" value="{{ $testimonial->title_en }}"  class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Title Bangla <span class="text-danger">*</span> </label>
                    <input type="text" name="title_bn" value="{{ $testimonial->title_bn }}"  class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Description English <span class="text-danger">*</span> </label>
                    <textarea name="description_en"  class="form-control" rows="5" required>{{ $testimonial->description_en }}</textarea>
                  </div>

                  <div class="form-group">
                    <label>Description Bangla <span class="text-danger">*</span> </label>
                    <textarea name="description_bn"  class="form-control" rows="5" required>{{ $testimonial->description_bn }}</textarea>
                  </div>

                  <div class="form-group">
                    <label>Name English <span class="text-danger">*</span> </label>
                    <input type="text" name="name_en" value="{{ $testimonial->name_en }}"  class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Name Bangla <span class="text-danger">*</span> </label>
                    <input type="text" name="name_bn" value="{{ $testimonial->name_bn }}"  class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Profession English<span class="text-danger">*</span> </label>
                    <input type="text" name="profession_en" value="{{ $testimonial->profession_en }}"  class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Profession Bangla<span class="text-danger">*</span> </label>
                    <input type="text" name="profession_bn" value="{{ $testimonial->profession_bn }}"  class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Logo<span class="text-danger"></span> </label>
                    <input type="file" name="logo"  class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Image<span class="text-danger"></span> </label>
                    <input type="file" name="image"  class="form-control">
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
