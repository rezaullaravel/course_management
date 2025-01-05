@extends('admin.master')
@section('title')
    {{'Why Study Us Create'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Why Study With Us  Create
                  <a href="{{route('admin.why-studyus.index')}}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                </h4>
              </div>

              <div class="card-body">
                <form action="{{route('admin.why-studyus.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group">
                    <label>Image<span class="text-danger">*</span> </label>
                    <input type="file" name="image"  class="form-control" required>
                  </div>
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
                    <textarea name="description_en"  class="form-control" required rows="5"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Description Bangla <span class="text-danger">*</span> </label>
                    <textarea name="description_bn"  class="form-control" required rows="5"></textarea>
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
