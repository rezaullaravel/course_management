@extends('admin.master')
@section('title')
    {{'Payment Gateway Setting'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Payment Gateway Setting
                </h4>
              </div>

              <div class="card-body">
                <form action="{{route('admin.aamarpay.update',$aamarpay->id)}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Gateway Name<span class="text-danger">*</span> </label>
                    <input type="text" name="gateway_name" value="{{ $aamarpay->gateway_name }}"  class="form-control" required readonly>
                  </div>

                  <div class="form-group">
                    <label>Store Id<span class="text-danger">*</span> </label>
                    <input type="text" name="store_id" value="{{ $aamarpay->store_id }}"   class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Signature Key<span class="text-danger">*</span> </label>
                    <input type="text" name="signature_key" value="{{ $aamarpay->signature_key }}"    class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Status<span class="text-danger">*</span> </label>
                    <select name="status"  class="form-control">
                        <option value="" selected disabled>Select</option>
                        <option value="0" {{ $aamarpay->status =='0' ? 'selected' :'' }}>Sandbox</option>
                        <option value="1" {{ $aamarpay->status =='1' ? 'selected':'' }}>Live</option>
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
