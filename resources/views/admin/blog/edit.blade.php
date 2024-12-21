@extends('admin.master')
@section('title')
    {{ 'Blog  Update' }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Blog Update
                                <a href="{{ route('admin.blog-post.index') }}" class="btn btn-primary btn-sm"
                                    style="float:right;">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.blog-post.update', $blog->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Select Category Name<span class="text-danger">*</span></label>
                                    <select name="blog_category_id" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($categories as $row)
                                            <option value="{{ $row->id }}"
                                                {{ $blog->blog_category_id == $row->id ? 'selected' : '' }}>
                                                {{ $row->name_en }}||{{ $row->name_bn }}</option>
                                        @endforeach
                                    </select>
                                    @error('blog_category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Blog Title English <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="title_en" value="{{ $blog->title_en }}" class="form-control"
                                        placeholder="Enter blog title english" rows="5">
                                    @error('title_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Blog Title Bangla <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="title_bn" value="{{ $blog->title_bn }}"
                                        class="form-control" placeholder="Enter blog title bangla" rows="5">
                                    @error('title_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Slug <span class="text-danger">*</span></label>
                                    <input type="text" name="slug" value="{{ $blog->slug }}" class="form-control"
                                        rows="5">
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Blog Content English<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="content_en" name="content_en" rows="5">{{ $blog->content_en }}</textarea>
                                    @error('content_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Blog Content Bangla<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="content_bn" name="content_bn" rows="5">{{ $blog->content_bn }}</textarea>
                                    @error('content_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Blog image <span class="text-danger"></span></label>
                                    <input type="file" name="image" class="form-control" onchange="postImgUrl(this)">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img src="{{ $blog->image ? asset($blog->image) : '' }}" id="postImage"
                                        style="margin-top: 5px;">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Blog Image Two <span
                                            class="text-danger"></span></label>
                                    <input type="file" name="image2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Video Embed Url <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="video_url" value="{{ $blog->video_url }}" class="form-control">
                                    <p class="mt-3">
                                        @if (!empty($blog->video_url))
                                            {!! $blog->video_url !!}
                                        @else
                                        @endif
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Title Two English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="title2_en" value="{{ $blog->title2_en }}"
                                        class="form-control" placeholder="Enter blog title two english" rows="5">
                                    @error('title2_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Title Two Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="title2_bn" value="{{ $blog->title2_bn }}"
                                        class="form-control" placeholder="Enter blog title two bangla" rows="5">
                                    @error('title2_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Content Two English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="content2_en" name="content2_en" rows="5">{{ $blog->content2_en }}</textarea>
                                    @error('content2_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Content Two Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="content2_bn" name="content2_bn" rows="5">{{ $blog->content2_bn }}</textarea>
                                    @error('content2_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic One English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic1_en" value="{{ $blog->topic1_en }}"
                                        class="form-control" placeholder="Enter topic one english" rows="5">
                                    @error('topic1_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic One Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic1_bn" value="{{ $blog->topic1_bn }}"
                                        class="form-control" placeholder="Enter topic one bangla" rows="5">
                                    @error('topic1_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Two English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic2_en" value="{{ $blog->topic2_en }}"
                                        class="form-control" placeholder="Enter topic two english" rows="5">
                                    @error('topic2_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Two Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic2_bn" value="{{ $blog->topic2_bn }}"
                                        class="form-control" placeholder="Enter topic two bangla" rows="5">
                                    @error('topic2_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Three English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic3_en" value="{{ $blog->topic3_en }}"
                                        class="form-control" placeholder="Enter topic three english" rows="5">
                                    @error('topic3_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Three Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic3_bn" value="{{ $blog->topic3_bn }}"
                                        class="form-control" placeholder="Enter topic three bangla" rows="5">
                                    @error('topic3_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Four English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic4_en" value="{{ $blog->topic4_en }}"
                                        class="form-control" placeholder="Enter topic four english" rows="5">
                                    @error('topic4_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Four Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic4_bn" value="{{ $blog->topic4_bn }}"
                                        class="form-control" placeholder="Enter topic four bangla">
                                    @error('topic4_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Five English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic5_en" value="{{ $blog->topic5_en }}"
                                        class="form-control" placeholder="Enter topic five english" rows="5">
                                    @error('topic5_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Five Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic5_bn" value="{{ $blog->topic5_bn }}"
                                        class="form-control" placeholder="Enter topic five bangla">
                                    @error('topic5_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Six English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic6_en" value="{{ $blog->topic6_en }}"
                                        class="form-control" placeholder="Enter topic six english" rows="5">
                                    @error('topic6_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Six Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic6_bn" value="{{ $blog->topic6_bn }}"
                                        class="form-control" placeholder="Enter topic six bangla">
                                    @error('topic6_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Seven English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic7_en" value="{{ $blog->topic7_en }}"
                                        class="form-control" placeholder="Enter topic seven english" rows="5">
                                    @error('topic7_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Seven Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic7_bn" value="{{ $blog->topic7_bn }}"
                                        class="form-control" placeholder="Enter topic seven bangla">
                                    @error('topic7_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Eight English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic8_en" value="{{ $blog->topic8_en }}"
                                        class="form-control" placeholder="Enter topic eight english" rows="5">
                                    @error('topic8_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Eight Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic8_bn" value="{{ $blog->topic8_bn }}"
                                        class="form-control" placeholder="Enter topic eight bangla">
                                    @error('topic8_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Nine English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic9_en" value="{{ $blog->topic9_en }}"
                                        class="form-control" placeholder="Enter topic nine english" rows="5">
                                    @error('topic9_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Nine Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic9_bn" value="{{ $blog->topic9_bn }}"
                                        class="form-control" placeholder="Enter topic nine bangla">
                                    @error('topic9_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Ten English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic10_en" value="{{ $blog->topic10_en }}"
                                        class="form-control" placeholder="Enter topic ten english" rows="5">
                                    @error('topic10_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Ten Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic10_bn" value="{{ $blog->topic10_bn }}"
                                        class="form-control" placeholder="Enter topic ten bangla">
                                    @error('topic10_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Blog Image Three <span
                                            class="text-danger"></span></label>
                                    <input type="file" name="image3" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Title Three English<span
                                            class="text-danger"></span></label>
                                    <input type="text" name="title3_en" value="{{ $blog->title3_en }}"
                                        class="form-control" placeholder="Enter title three english">
                                    @error('title3_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Title Three Bangla<span
                                            class="text-danger"></span></label>
                                    <input type="text" name="title3_bn" value="{{ $blog->title3_bn }}"
                                        class="form-control" placeholder="Enter title three bangla">
                                    @error('title3_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Content Three English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="content3_en" name="content3_en" rows="5">{{ $blog->content3_en }}</textarea>
                                    @error('content3_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Content Three Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="content3_bn" name="content3_bn" rows="5">{{ $blog->content3_bn }}</textarea>
                                    @error('content3_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic One English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic1_en" name="footer_topic1_en" rows="5">{{ $blog->footer_topic1_en }}</textarea>
                                    @error('footer_topic1_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic One Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic1_bn" name="footer_topic1_bn" rows="5">{{ $blog->footer_topic1_bn }}</textarea>
                                    @error('footer_topic1_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Two English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic2_en" name="footer_topic2_en" rows="5">{{ $blog->footer_topic2_en }}</textarea>
                                    @error('footer_topic2_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Two Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic2_bn" name="footer_topic2_bn" rows="5">{{ $blog->footer_topic2_bn }}</textarea>
                                    @error('footer_topic2_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Three English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic3_en" name="footer_topic3_en" rows="5">{{ $blog->footer_topic3_en }}</textarea>
                                    @error('footer_topic3_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Three Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic3_bn" name="footer_topic3_bn" rows="5">{{ $blog->footer_topic3_bn }}</textarea>
                                    @error('footer_topic3_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Four English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic4_en" name="footer_topic4_en" rows="5">{{ $blog->footer_topic4_en }}</textarea>
                                    @error('footer_topic4_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Four Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic4_bn" name="footer_topic4_bn" rows="5">{{ $blog->footer_topic4_bn }}</textarea>
                                    @error('footer_topic4_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Five English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic5_en" name="footer_topic5_en" rows="5">{{ $blog->footer_topic5_en }}</textarea>
                                    @error('footer_topic5_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Five Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic5_bn" name="footer_topic5_bn" rows="5">{{ $blog->footer_topic5_bn }}</textarea>
                                    @error('footer_topic5_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Six English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic6_en" name="footer_topic6_en" rows="5">{{ $blog->footer_topic6_en }}</textarea>
                                    @error('footer_topic6_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Six Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic6_bn" name="footer_topic6_bn" rows="5">{{ $blog->footer_topic6_bn }}</textarea>
                                    @error('footer_topic6_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Seven English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic7_en" name="footer_topic7_en" rows="5">{{ $blog->footer_topic7_en }}</textarea>
                                    @error('footer_topic7_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Seven Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic7_bn" name="footer_topic7_bn" rows="5">{{ $blog->footer_topic7_bn }}</textarea>
                                    @error('footer_topic7_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Eight English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic8_en" name="footer_topic8_en" rows="5">{{ $blog->footer_topic8_en }}</textarea>
                                    @error('footer_topic8_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Eight Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic8_bn" name="footer_topic8_bn" rows="5">{{ $blog->footer_topic8_bn }}</textarea>
                                    @error('footer_topic8_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Nine English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic9_en" name="footer_topic9_en" rows="5">{{ $blog->footer_topic9_en }}</textarea>
                                    @error('footer_topic9_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Nine Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic9_bn" name="footer_topic9_bn" rows="5">{{ $blog->footer_topic9_bn }}</textarea>
                                    @error('footer_topic9_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Ten English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic10_en" name="footer_topic10_en" rows="5">{{ $blog->footer_topic10_en }}</textarea>
                                    @error('footer_topic10_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Ten Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic10_bn" name="footer_topic10_bn" rows="5">{{ $blog->footer_topic10_bn }}</textarea>
                                    @error('footer_topic10_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>







                                <div class="form-group">
                                    <label for="exampleInputPassword1">Conclusion English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="conclusiton_en" name="conclusiton_en" rows="5">{{ $blog->conclusiton_en }}</textarea>
                                    @error('conclusiton_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Conclusion Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="conclusiton_bn" name="conclusiton_bn" rows="5">{{ $blog->conclusiton_bn }}</textarea>
                                    @error('conclusiton_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-primary btn-sm"
                                        style="float:right;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content_en'), {
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
            .create(document.querySelector('#content_bn'), {
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
            .create(document.querySelector('#content2_en'), {
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
            .create(document.querySelector('#content2_bn'), {
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
            .create(document.querySelector('#content3_en'), {
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
            .create(document.querySelector('#content3_bn'), {
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


        ClassicEditor
            .create(document.querySelector('#conclusiton_en'), {
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
            .create(document.querySelector('#conclusiton_bn'), {
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
    {{-- javascript for blog   image preview --}}
    <script type="text/javascript">
        function postImgUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#postImage').attr('src', e.target.result).width(300).height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    {{-- javascript for post image end --}}
@endsection
