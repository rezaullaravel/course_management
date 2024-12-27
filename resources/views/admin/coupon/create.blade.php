@extends('admin.master')
@section('title')
    {{'Coupon Create'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Coupon  Create
                  <a href="{{route('admin.coupon.index')}}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                </h4>
              </div>

              <div class="card-body">
                <form action="{{route('admin.coupon.store')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Coupon Code <span class="text-danger">*</span> </label>
                    <input type="text" name="code"  class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Coupon Discount Amount English <span class="text-danger">*</span> </label>
                    <input type="number" name="discount_amount_en"  class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Coupon Discount Amount Bangla <span class="text-danger">*</span> </label>
                    <input type="number" name="discount_amount_bn"  class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Validity <span class="text-danger">*</span> </label>
                    <input type="date" name="validity"  class="form-control" required>
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
