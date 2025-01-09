@extends('admin.master')
@section('title')
    {{'Testimonial Create'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Testimonial  Create
                  <a href="{{route('admin.testimonial.index')}}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                </h4>
              </div>

              <div class="card-body">
                <form action="{{route('admin.testimonial.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label>Title English <span class="text-danger">*</span> </label>
                    <input type="text" name="title_en"  class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Title Bangla <span class="text-danger">*</span> </label>
                    <input type="text" name="title_bn"  class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Description English <span class="text-danger">*</span> </label>
                    <textarea name="description_en"  class="form-control" rows="5" required></textarea>
                  </div>

                  <div class="form-group">
                    <label>Description Bangla <span class="text-danger">*</span> </label>
                    <textarea name="description_bn"  class="form-control" rows="5" required></textarea>
                  </div>

                  <div class="form-group">
                    <label>Name English <span class="text-danger">*</span> </label>
                    <input type="text" name="name_en"  class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Name Bangla <span class="text-danger">*</span> </label>
                    <input type="text" name="name_bn"  class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Profession English<span class="text-danger">*</span> </label>
                    <input type="text" name="profession_en"  class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Profession Bangla<span class="text-danger">*</span> </label>
                    <input type="text" name="profession_bn"  class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Country English<span class="text-danger">*</span> </label>
                    <input type="text" name="country_en"  class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Country Bangla<span class="text-danger">*</span> </label>
                    <input type="text" name="country_bn"  class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Logo<span class="text-danger">*</span> </label>
                    <input type="file" name="logo"  class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Image<span class="text-danger">*</span> </label>
                    <input type="file" name="image"  class="form-control">
                  </div>

                  <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary btn-sm" style="float:right;">
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
