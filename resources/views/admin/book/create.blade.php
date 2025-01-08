@extends('admin.master')
@section('title')
    {{'Book Create'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Ebook  Create
                  <a href="{{route('admin.book.index')}}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                </h4>
              </div>

              <div class="card-body">
                <form action="{{route('admin.book.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label>Select Category Name<span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control">
                        <option value="" selected disabled>Select</option>
                        @foreach ($categories as $row)
                            <option value="{{ $row->id }}">{{ $row->name_en }}||{{ $row->name_bn }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Title English <span
                            class="text-danger">*</span></label>
                    <input type="text" name="title_en" class="form-control"
                        placeholder="Enter book title english" rows="5">
                    @error('title_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"> Title Bangla <span
                            class="text-danger">*</span></label>
                    <input type="text" name="title_bn" class="form-control"
                        placeholder="Enter book title bangla" rows="5">
                    @error('title_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Image <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control" onchange="postImgUrl(this)">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <img src="" id="postImage" style="margin-top: 5px;">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Video Embed Url <span
                            class="text-danger"></span></label>
                    <input type="text" name="video_url" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Book Pdf File <span class="text-danger">*</span></label>
                    <input type="file" name="book_pdf_file" class="form-control">
                    @error('book_pdf_file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description English<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" id="description_en" name="description_en" rows="5"></textarea>
                    @error('description_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description Bangla<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" id="description_bn" name="description_bn" rows="5"></textarea>
                    @error('description_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Topic One English <span
                            class="text-danger"></span></label>
                    <input type="text" name="topic1_en" class="form-control"
                        placeholder="Enter topic one english" rows="5">
                    @error('topic1_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Topic One Bangla <span
                            class="text-danger"></span></label>
                    <input type="text" name="topic1_bn" class="form-control"
                        placeholder="Enter topic one bangla" rows="5">
                    @error('topic1_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description One English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description1_en" name="description1_en" rows="5"></textarea>
                    @error('description1_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description One Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description1_bn" name="description1_bn" rows="5"></textarea>
                    @error('description1_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">Topic Two English <span
                            class="text-danger"></span></label>
                    <input type="text" name="topic2_en" class="form-control"
                        placeholder="Enter topic two english" rows="5">
                    @error('topic2_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Topic Two Bangla <span
                            class="text-danger"></span></label>
                    <input type="text" name="topic2_bn" class="form-control"
                        placeholder="Enter topic Two bangla" rows="5">
                    @error('topic2_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Two English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description2_en" name="description2_en" rows="5"></textarea>
                    @error('description2_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Two Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description2_bn" name="description2_bn" rows="5"></textarea>
                    @error('description2_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Topic Three English <span
                            class="text-danger"></span></label>
                    <input type="text" name="topic3_en" class="form-control"
                        placeholder="Enter topic three english" rows="5">
                    @error('topic3_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Topic Three Bangla <span
                            class="text-danger"></span></label>
                    <input type="text" name="topic3_bn" class="form-control"
                        placeholder="Enter topic three bangla" rows="5">
                    @error('topic3_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Three English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description3_en" name="description3_en" rows="5"></textarea>
                    @error('description3_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Three Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description3_bn" name="description3_bn" rows="5"></textarea>
                    @error('description3_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Topic Four English <span
                            class="text-danger"></span></label>
                    <input type="text" name="topic4_en" class="form-control"
                        placeholder="Enter topic four english" rows="5">
                    @error('topic4_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Topic Four Bangla <span
                            class="text-danger"></span></label>
                    <input type="text" name="topic4_bn" class="form-control"
                        placeholder="Enter topic four bangla">
                    @error('topic4_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Four English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description4_en" name="description4_en" rows="5"></textarea>
                    @error('description4_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Four Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description4_bn" name="description4_bn" rows="5"></textarea>
                    @error('description4_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="topic5_en">Topic Five English <span class="text-danger"></span></label>
                    <input type="text" name="topic5_en" class="form-control"
                        placeholder="Enter topic five english">
                    @error('topic5_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="topic5_bn">Topic Five Bangla <span class="text-danger"></span></label>
                    <input type="text" name="topic5_bn" class="form-control"
                        placeholder="Enter topic five bangla">
                    @error('topic5_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Five English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description5_en" name="description5_en" rows="5"></textarea>
                    @error('description5_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Five Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description5_bn" name="description5_bn" rows="5"></textarea>
                    @error('description5_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="topic6_en">Topic Six English <span class="text-danger"></span></label>
                    <input type="text" name="topic6_en" class="form-control"
                        placeholder="Enter topic six english">
                    @error('topic6_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="topic6_bn">Topic Six Bangla <span class="text-danger"></span></label>
                    <input type="text" name="topic6_bn" class="form-control"
                        placeholder="Enter topic six bangla">
                    @error('topic6_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Six English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description6_en" name="description6_en" rows="5"></textarea>
                    @error('description6_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Six Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description6_bn" name="description6_bn" rows="5"></textarea>
                    @error('description6_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="topic7_en">Topic Seven English <span class="text-danger"></span></label>
                    <input type="text" name="topic7_en" class="form-control"
                        placeholder="Enter topic seven english">
                    @error('topic7_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="topic7_bn">Topic Seven Bangla <span class="text-danger"></span></label>
                    <input type="text" name="topic7_bn" class="form-control"
                        placeholder="Enter topic seven bangla">
                    @error('topic7_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Seven English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description7_en" name="description7_en" rows="5"></textarea>
                    @error('description7_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Seven Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description7_bn" name="description7_bn" rows="5"></textarea>
                    @error('description7_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="topic8_en">Topic Eight English <span class="text-danger"></span></label>
                    <input type="text" name="topic8_en" class="form-control"
                        placeholder="Enter topic eight english">
                    @error('topic8_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="topic8_bn">Topic Eight Bangla <span class="text-danger"></span></label>
                    <input type="text" name="topic8_bn" class="form-control"
                        placeholder="Enter topic eight bangla">
                    @error('topic8_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Eight English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description8_en" name="description8_en" rows="5"></textarea>
                    @error('description8_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Eight Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description8_bn" name="description8_bn" rows="5"></textarea>
                    @error('description8_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="topic9_en">Topic Nine English <span class="text-danger"></span></label>
                    <input type="text" name="topic9_en" class="form-control"
                        placeholder="Enter topic nine english">
                    @error('topic9_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="topic9_bn">Topic Nine Bangla <span class="text-danger"></span></label>
                    <input type="text" name="topic9_bn" class="form-control"
                        placeholder="Enter topic nine bangla">
                    @error('topic9_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Nine English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description9_en" name="description9_en" rows="5"></textarea>
                    @error('description9_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Nine Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description9_bn" name="description9_bn" rows="5"></textarea>
                    @error('description9_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="topic10_en">Topic Ten English <span class="text-danger"></span></label>
                    <input type="text" name="topic10_en" class="form-control"
                        placeholder="Enter topic ten english">
                    @error('topic10_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="topic10_bn">Topic Ten Bangla <span class="text-danger"></span></label>
                    <input type="text" name="topic10_bn" class="form-control"
                        placeholder="Enter topic ten bangla">
                    @error('topic10_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Teen English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description10_en" name="description10_en" rows="5"></textarea>
                    @error('description10_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description Teen Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="description10_bn" name="description10_bn" rows="5"></textarea>
                    @error('description10_bn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="feature10_bn">Offer Price English<span class="text-danger"></span></label>
                    <input type="number" class="form-control" name="price_en" rows="5">
                </div>

                <div class="form-group">
                    <label for="feature10_bn">Offer Price Bangla<span class="text-danger"></span></label>
                    <input type="number" class="form-control" name="price_bn" rows="5">
                </div>

                <div class="form-group">
                    <label for="feature10_bn">Original Price English<span class="text-danger"></span></label>
                    <input type="number" class="form-control" name="original_price_en" rows="5">
                </div>

                <div class="form-group">
                    <label for="feature10_bn">Original Price Bangla<span class="text-danger"></span></label>
                    <input type="number" class="form-control" name="original_price_bn" rows="5">
                </div>

                <div class="form-group">
                    <label for="feature10_bn">Paid Status<span class="text-danger"></span></label>
                    <select class="form-control" name="paid_status" rows="5">
                        <option value="" selected disabled>Select One</option>
                        <option value="free">Free</option>
                        <option value="paid">Paid</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Another Image  <span
                            class="text-danger"></span></label>
                    <input type="file" name="another_image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Another Description English<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="another_description_en" name="another_description_en" rows="5"></textarea>
                    @error('another_description_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Another Description Bangla<span
                            class="text-danger"></span></label>
                    <textarea class="form-control" id="another_description_bn" name="another_description_bn" rows="5"></textarea>
                    @error('another_description_bn')
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
            .create(document.querySelector('#description_en'), {
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
            .create(document.querySelector('#description_bn'), {
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
            .create(document.querySelector('#description1_en'), {
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
            .create(document.querySelector('#description2_en'), {
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
            .create(document.querySelector('#description3_en'), {
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
            .create(document.querySelector('#description4_en'), {
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
            .create(document.querySelector('#description5_en'), {
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
            .create(document.querySelector('#description6_en'), {
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
            .create(document.querySelector('#description7_en'), {
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
            .create(document.querySelector('#description8_en'), {
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
            .create(document.querySelector('#description9_en'), {
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
            .create(document.querySelector('#description10_en'), {
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
            .create(document.querySelector('#description1_bn'), {
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
            .create(document.querySelector('#description2_bn'), {
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
            .create(document.querySelector('#description3_bn'), {
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
            .create(document.querySelector('#description4_bn'), {
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
            .create(document.querySelector('#description5_bn'), {
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
            .create(document.querySelector('#description6_bn'), {
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
            .create(document.querySelector('#description7_bn'), {
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
            .create(document.querySelector('#description8_bn'), {
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
            .create(document.querySelector('#description9_bn'), {
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
            .create(document.querySelector('#description10_bn'), {
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
            .create(document.querySelector('#another_description_bn'), {
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
            .create(document.querySelector('#another_description_en'), {
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
