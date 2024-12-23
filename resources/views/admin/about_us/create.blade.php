@extends('admin.master')
@section('title')
    {{'About Us Create'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>About Us  Create
                  <a href="{{route('admin.about-us.index')}}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                </h4>
              </div>

              <div class="card-body">
                <form action="{{route('admin.about-us.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label>Title English <span class="text-danger">*</span> </label>
                    <input type="text" name="title_en"  class="form-control">
                    @error('title_en')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Title Bangla <span class="text-danger">*</span> </label>
                    <input type="text" name="title_bn"  class="form-control">
                    @error('title_bn')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Image One <span class="text-danger">*</span> </label>
                    <input type="file" name="image1"  class="form-control">
                    @error('image1')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Image Two <span class="text-danger">*</span> </label>
                    <input type="file" name="image2" class="form-control">
                    @error('image2')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Image Three <span class="text-danger">*</span> </label>
                    <input type="file" name="image3" class="form-control">
                    @error('image3')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Image Four <span class="text-danger">*</span> </label>
                    <input type="file" name="image4" class="form-control">
                    @error('image4')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Title One English <span class="text-danger">*</span> </label>
                    <input type="text" name="title1_en"  class="form-control">
                    @error('title1_en')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Title One Bangla <span class="text-danger">*</span> </label>
                    <input type="text" name="title1_bn"  class="form-control">
                    @error('title1_bn')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Description One English<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" id="description1_en" name="description1_en" rows="5"></textarea>
                    @error('description1_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description One Bangla<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" id="description1_bn" name="description1_bn" rows="5"></textarea>
                    @error('description1_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic10_bn">Feature One English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" name="feature1_en" id="feature1_en" rows="5"></textarea>
                    @error('feature1_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic10_bn">Feature One Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" name="feature1_bn" id="feature1_bn" rows="5"></textarea>
                    @error('feature1_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature2_en">Feature Two English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature2_en" id="feature2_en" rows="5"></textarea>
                    @error('feature2_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature2_bn">Feature Two Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature2_bn" id="feature2_bn" rows="5"></textarea>
                    @error('feature2_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature3_en">Feature Three English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature3_en" id="feature3_en" rows="5"></textarea>
                    @error('feature3_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature3_bn">Feature Three Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature3_bn" id="feature3_bn" rows="5"></textarea>
                    @error('feature3_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature4_en">Feature Four English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature4_en" id="feature4_en" rows="5"></textarea>
                    @error('feature4_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature4_bn">Feature Four Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature4_bn" id="feature4_bn" rows="5"></textarea>
                    @error('feature4_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature5_en">Feature Five English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature5_en" id="feature5_en" rows="5"></textarea>
                    @error('feature5_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature5_bn">Feature Five Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature5_bn" id="feature5_bn" rows="5"></textarea>
                    @error('feature5_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature6_en">Feature Six English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature6_en" id="feature6_en" rows="5"></textarea>
                    @error('feature6_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature6_bn">Feature Six Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature6_bn" id="feature6_bn" rows="5"></textarea>
                    @error('feature6_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature7_en">Feature Seven English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature7_en" id="feature7_en" rows="5"></textarea>
                    @error('feature7_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature7_bn">Feature Seven Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature7_bn" id="feature7_bn" rows="5"></textarea>
                    @error('feature7_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature8_en">Feature Eight English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature8_en" id="feature8_en" rows="5"></textarea>
                    @error('feature8_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature8_bn">Feature Eight Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature8_bn" id="feature8_bn" rows="5"></textarea>
                    @error('feature8_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature9_en">Feature Nine English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature9_en" id="feature9_en" rows="5"></textarea>
                    @error('feature9_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature9_bn">Feature Nine Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature9_bn" id="feature9_bn" rows="5"></textarea>
                    @error('feature9_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature10_en">Feature Ten English<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature10_en" id="feature10_en" rows="5"></textarea>
                    @error('feature10_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature10_bn">Feature Ten Bangla<span class="text-danger"></span></label>
                    <textarea class="form-control" name="feature10_bn" id="feature10_bn" rows="5"></textarea>
                    @error('feature10_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Title Two English <span class="text-danger">*</span> </label>
                    <input type="text" name="title2_en"  class="form-control">
                    @error('title2_en')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Title Two Bangla <span class="text-danger">*</span> </label>
                    <input type="text" name="title2_bn"  class="form-control">
                    @error('title2_bn')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Description Two English<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" id="description2_en" name="description2_en" rows="5"></textarea>
                    @error('description2_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Two Bangla<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" id="description2_bn" name="description2_bn" rows="5"></textarea>
                    @error('description2_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Footer Topic One English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic1_en" name="footer_topic1_en" rows="5"></textarea>
                    @error('footer_topic1_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Footer Topic One Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic1_bn" name="footer_topic1_bn" rows="5"></textarea>
                    @error('footer_topic1_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Footer Topic Two English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic2_en" name="footer_topic2_en" rows="5"></textarea>
                    @error('footer_topic2_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Footer Topic Two Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic2_bn" name="footer_topic2_bn" rows="5"></textarea>
                    @error('footer_topic2_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Footer Topic Three English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic3_en" name="footer_topic3_en" rows="5"></textarea>
                    @error('footer_topic3_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Footer Topic Three Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic3_bn" name="footer_topic3_bn" rows="5"></textarea>
                    @error('footer_topic3_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic4_en">Footer Topic Four English <span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic4_en" name="footer_topic4_en" rows="5"></textarea>
                    @error('footer_topic4_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic4_bn">Footer Topic Four Bangla <span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic4_bn" name="footer_topic4_bn" rows="5"></textarea>
                    @error('footer_topic4_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic5_en">Footer Topic Five English <span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic5_en" name="footer_topic5_en" rows="5"></textarea>
                    @error('footer_topic5_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic5_bn">Footer Topic Five Bangla <span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic5_bn" name="footer_topic5_bn" rows="5"></textarea>
                    @error('footer_topic5_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic6_en">Footer Topic Six English <span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic6_en" name="footer_topic6_en" rows="5"></textarea>
                    @error('footer_topic6_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic6_bn">Footer Topic Six Bangla <span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic6_bn" name="footer_topic6_bn" rows="5"></textarea>
                    @error('footer_topic6_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic7_en">Footer Topic Seven English <span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic7_en" name="footer_topic7_en" rows="5"></textarea>
                    @error('footer_topic7_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic7_bn">Footer Topic Seven Bangla <span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic7_bn" name="footer_topic7_bn" rows="5"></textarea>
                    @error('footer_topic7_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic8_en">Footer Topic Eight English <span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic8_en" name="footer_topic8_en" rows="5"></textarea>
                    @error('footer_topic8_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic8_bn">Footer Topic Eight Bangla <span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic8_bn" name="footer_topic8_bn" rows="5"></textarea>
                    @error('footer_topic8_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic9_en">Footer Topic Nine English <span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic9_en" name="footer_topic9_en" rows="5"></textarea>
                    @error('footer_topic9_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic9_bn">Footer Topic Nine Bangla <span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic9_bn" name="footer_topic9_bn" rows="5"></textarea>
                    @error('footer_topic9_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic10_en">Footer Topic Ten English <span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic10_en" name="footer_topic10_en" rows="5"></textarea>
                    @error('footer_topic10_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="footer_topic10_bn">Footer Topic Ten Bangla <span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="footer_topic10_bn" name="footer_topic10_bn" rows="5"></textarea>
                    @error('footer_topic10_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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

    <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#feature1_en'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })

            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#feature1_bn'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })

            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

            ClassicEditor
    .create(document.querySelector('#feature2_en'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#feature2_bn'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

    ClassicEditor
    .create(document.querySelector('#feature3_en'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#feature3_bn'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

    ClassicEditor
    .create(document.querySelector('#feature4_en'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#feature4_bn'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#feature5_en'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#feature5_bn'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#feature6_en'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#feature6_bn'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#feature7_en'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#feature7_bn'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#feature8_en'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#feature8_bn'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#feature9_en'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#feature9_bn'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#feature10_en'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#feature10_bn'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });


    ClassicEditor
            .create(document.querySelector('#footer_topic1_en'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })

            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic1_bn'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })

            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic2_en'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })

            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic2_bn'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })

            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic3_en'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })

            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic3_bn'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })

            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic4_en'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic4_bn'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic5_en'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic5_bn'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic6_en'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic6_bn'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic7_en'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic7_bn'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic8_en'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic8_bn'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic9_en'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic9_bn'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic10_en'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#footer_topic10_bn'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });




    </script>

@endsection
