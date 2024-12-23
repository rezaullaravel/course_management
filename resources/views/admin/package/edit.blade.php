@extends('admin.master')
@section('title')
    {{'Package Update'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Package  Update
                  <a href="{{route('admin.package.index')}}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                </h4>
              </div>

              <div class="card-body">
                <form action="{{route('admin.package.update',$package->id)}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Name English <span class="text-danger">*</span> </label>
                    <input type="text" name="name_en" value="{{ $package->name_en }}"  class="form-control">
                    @error('name_en')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Name Bangla <span class="text-danger">*</span> </label>
                    <input type="text" name="name_bn" value="{{ $package->name_bn }}"   class="form-control">
                    @error('name_bn')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Description English <span class="text-danger">*</span> </label>
                    <textarea name="description_en"  class="form-control" rows="5">{{ $package->description_en }} </textarea>
                    @error('description_en')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Description Bangla <span class="text-danger">*</span> </label>
                    <textarea name="description_bn"  class="form-control" rows="5">{{ $package->description_bn }}</textarea>
                    @error('description_bn')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="feature10_bn">Price English <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="price_en" value="{{ $package->price_en }}">
                    @error('price_en')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature10_bn">Price Bangla <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="price_bn" value="{{ $package->price_bn }}">
                    @error('price_bn')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic10_bn">Feature One English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" name="feature1_en" rows="5">{{ $package->feature1_en }}</textarea>
                    @error('feature1_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic10_bn">Feature One Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" name="feature1_bn" rows="5">{{ $package->feature1_bn }}</textarea>
                    @error('feature1_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="footer_topic10_bn">Feature One Status<span
                            class="text-danger"></span></label>
                    <select name="feature1_status" class="form-control">
                        <option value="" selected disabled>Select</option>
                        <option value="yes" {{ $package->feature1_status=='yes' ? 'selected':'' }}>Yes</option>
                        <option value="no" {{ $package->feature1_status=='no' ? 'selected':'' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="feature2_en">Feature Two English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature2_en" rows="5">{{ $package->feature2_en }}</textarea>
                    @error('feature2_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature2_bn">Feature Two Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature2_bn" rows="5">{{ $package->feature2_bn }}</textarea>
                    @error('feature2_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature2_status">Feature Two Status<span class="text-danger"></span></label>
                    <select name="feature2_status" class="form-control">
                        <option value="" selected disabled>Select</option>
                        <option value="yes" {{ $package->feature2_status=='yes' ? 'selected':'' }}>Yes</option>
                        <option value="no" {{ $package->feature2_status=='no' ? 'selected':'' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="feature3_en">Feature Three English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature3_en" rows="5">{{ $package->feature3_en }}</textarea>
                    @error('feature3_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature3_bn">Feature Three Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature3_bn" rows="5">{{ $package->feature3_bn }}</textarea>
                    @error('feature3_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature3_status">Feature Three Status<span class="text-danger"></span></label>
                    <select name="feature3_status" class="form-control">
                        <option value="" selected disabled>Select</option>
                        <option value="yes" {{ $package->feature3_status=='yes' ? 'selected':'' }}>Yes</option>
                        <option value="no" {{ $package->feature3_status=='no' ? 'selected':'' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="feature4_en">Feature Four English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature4_en" rows="5">{{ $package->feature4_en }}</textarea>
                    @error('feature4_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature4_bn">Feature Four Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature4_bn" rows="5">{{ $package->feature4_bn }}</textarea>
                    @error('feature4_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature4_status">Feature Four Status<span class="text-danger"></span></label>
                    <select name="feature4_status" class="form-control">
                        <option value="" selected disabled>Select</option>
                        <option value="yes" {{ $package->feature4_status=='yes' ? 'selected':'' }}>Yes</option>
                        <option value="no" {{ $package->feature4_status=='no' ? 'selected':'' }}>No</option>
                    </select>
                </div>



                <div class="form-group">
                    <label for="feature5_en">Feature Five English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature5_en" rows="5">{{ $package->feature5_en }}</textarea>
                    @error('feature5_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature5_bn">Feature Five Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature5_bn" rows="5">{{ $package->feature5_bn }}</textarea>
                    @error('feature5_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature5_status">Feature Five Status<span class="text-danger"></span></label>
                    <select name="feature5_status" class="form-control">
                        <option value="" selected disabled>Select</option>
                        <option value="yes" {{ $package->feature5_status=='yes' ? 'selected':'' }}>Yes</option>
                        <option value="no" {{ $package->feature5_status=='no' ? 'selected':'' }}>No</option>
                    </select>
                </div>




                <div class="form-group">
                    <label for="feature6_en">Feature Six English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature6_en" rows="5">{{ $package->feature6_en }}</textarea>
                    @error('feature6_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature6_bn">Feature Six Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature6_bn" rows="5">{{ $package->feature6_bn }}</textarea>
                    @error('feature6_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature6_status">Feature Six Status<span class="text-danger"></span></label>
                    <select name="feature6_status" class="form-control">
                        <option value="" selected disabled>Select</option>
                        <option value="yes" {{ $package->feature6_status=='yes' ? 'selected':'' }}>Yes</option>
                        <option value="no" {{ $package->feature6_status=='no' ? 'selected':'' }}>No</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="feature7_en">Feature Seven English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature7_en" rows="5">{{ $package->feature7_en }}</textarea>
                    @error('feature7_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature7_bn">Feature Seven Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature7_bn" rows="5">{{ $package->feature7_bn }}</textarea>
                    @error('feature7_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature7_status">Feature Seven Status<span class="text-danger"></span></label>
                    <select name="feature7_status" class="form-control">
                        <option value="" selected disabled>Select</option>
                        <option value="yes" {{ $package->feature7_status=='yes' ? 'selected':'' }}>Yes</option>
                        <option value="no" {{ $package->feature7_status=='no' ? 'selected':'' }}>No</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="feature8_en">Feature Eight English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature8_en" rows="5">{{ $package->feature8_en }}</textarea>
                    @error('feature8_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature8_bn">Feature Eight Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature8_bn" rows="5">{{ $package->feature8_bn }}</textarea>
                    @error('feature8_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature8_status">Feature Eight Status<span class="text-danger"></span></label>
                    <select name="feature8_status" class="form-control">
                        <option value="" selected disabled>Select</option>
                        <option value="yes" {{ $package->feature8_status=='yes' ? 'selected':'' }}>Yes</option>
                        <option value="no" {{ $package->feature8_status=='no' ? 'selected':'' }}>No</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="feature9_en">Feature Nine English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature9_en" rows="5">{{ $package->feature9_en }}</textarea>
                    @error('feature9_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature9_bn">Feature Nine Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature9_bn" rows="5">{{ $package->feature9_bn }}</textarea>
                    @error('feature9_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature9_status">Feature Nine Status<span class="text-danger"></span></label>
                    <select name="feature9_status" class="form-control">
                        <option value="" selected disabled>Select</option>
                        <option value="yes" {{ $package->feature9_status=='yes' ? 'selected':'' }}>Yes</option>
                        <option value="no" {{ $package->feature9_status=='no' ? 'selected':'' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="feature10_en">Feature Ten English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature10_en" rows="5">{{ $package->feature10_en }}</textarea>
                    @error('feature10_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature10_bn">Feature Ten Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature10_bn" rows="5">{{ $package->feature10_bn }}</textarea>
                    @error('feature10_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature10_status">Feature Ten Status<span class="text-danger"></span></label>
                    <select name="feature10_status" class="form-control">
                        <option value="" selected disabled>Select</option>
                        <option value="yes" {{ $package->feature10_status=='yes' ? 'selected':'' }}>Yes</option>
                        <option value="no" {{ $package->feature10_status=='no' ? 'selected':'' }}>No</option>
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
