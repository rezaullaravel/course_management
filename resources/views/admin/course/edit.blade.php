@extends('admin.master')
@section('title')
    {{ 'Course Update' }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Course Update
                                <a href="{{ route('admin.course-post.index') }}" class="btn btn-primary btn-sm"
                                    style="float:right;">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.course-post.update',$course->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Select Category Name<span class="text-danger">*</span></label>
                                    <select name="course_category_id" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($categories as $row)
                                            <option value="{{ $row->id }}" {{ $course->course_category_id == $row->id ? 'selected':'' }}>{{ $row->name_en }}||{{ $row->name_bn }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('course_category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Select Course Instructor<span class="text-danger">*</span></label>
                                    <select name="teacher_id" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($instructors as $row)
                                            <option value="{{ $row->id }}" {{ $course->teacher_id == $row->id ? 'selected':'' }}>{{ $row->name }}||{{ $row->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('teacher_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Course Title English <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="title_en" value="{{ $course->title_en }}" class="form-control"
                                        placeholder="Enter course title english" rows="5">
                                    @error('title_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Course Title Bangla <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="title_bn" value="{{ $course->title_bn }}" class="form-control"
                                        placeholder="Enter course title bangla" rows="5">
                                    @error('title_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Slug <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="slug" value="{{ $course->slug }}" class="form-control"
                                        placeholder="Enter course title bangla" rows="5">
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control" onchange="postImgUrl(this)">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img src="{{ $course->image ? asset($course->image):'' }}" id="postImage" style="margin-top: 5px;" width="200" height="200">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Video Embed Url <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="video_url" value="{{ $course->video_url }}" class="form-control">
                                    <p class="mt-3">
                                        {!! $course->video_url !!}
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Content English<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="content_en" name="content_en" rows="5">{{ $course->content_en }}</textarea>
                                    @error('content_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Content Bangla<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="content_bn" name="content_bn" rows="5">{{ $course->content_bn }}</textarea>
                                    @error('content_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic One English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic1_en" value="{{ $course->topic1_en  }}" class="form-control"
                                        placeholder="Enter topic one english" rows="5">
                                    @error('topic1_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic One Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic1_bn" value="{{ $course->topic1_bn }}" class="form-control"
                                        placeholder="Enter topic one bangla" rows="5">
                                    @error('topic1_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Two English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic2_en" value="{{ $course->topic2_en }}" class="form-control"
                                        placeholder="Enter topic two english" rows="5">
                                    @error('topic2_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Two Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic2_bn" value="{{ $course->topic2_bn }}" class="form-control"
                                        placeholder="Enter topic two bangla" rows="5">
                                    @error('topic2_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Three English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic3_en" value="{{ $course->topic3_en }}" class="form-control"
                                        placeholder="Enter topic three english" rows="5">
                                    @error('topic3_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Three Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic3_bn" value="{{ $course->topic3_bn }}" class="form-control"
                                        placeholder="Enter topic three bangla" rows="5">
                                    @error('topic3_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Four English <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic4_en" value="{{ $course->topic4_en }}" class="form-control"
                                        placeholder="Enter topic four english" rows="5">
                                    @error('topic4_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Topic Four Bangla <span
                                            class="text-danger"></span></label>
                                    <input type="text" name="topic4_bn" value="{{ $course->topic4_bn }}" class="form-control"
                                        placeholder="Enter topic four bangla">
                                    @error('topic4_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic5_en">Topic Five English <span class="text-danger"></span></label>
                                    <input type="text" name="topic5_en" value="{{ $course->topic5_en }}" class="form-control"
                                        placeholder="Enter topic five english">
                                    @error('topic5_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic5_bn">Topic Five Bangla <span class="text-danger"></span></label>
                                    <input type="text" name="topic5_bn" value="{{ $course->topic5_bn }}" class="form-control"
                                        placeholder="Enter topic five bangla">
                                    @error('topic5_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic6_en">Topic Six English <span class="text-danger"></span></label>
                                    <input type="text" name="topic6_en" value="{{ $course->topic6_en }}" class="form-control"
                                        placeholder="Enter topic six english">
                                    @error('topic6_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic6_bn">Topic Six Bangla <span class="text-danger"></span></label>
                                    <input type="text" name="topic6_bn" value="{{ $course->topic6_bn }}" class="form-control"
                                        placeholder="Enter topic six bangla">
                                    @error('topic6_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic7_en">Topic Seven English <span class="text-danger"></span></label>
                                    <input type="text" name="topic7_en" value="{{ $course->topic7_en }}" class="form-control"
                                        placeholder="Enter topic seven english">
                                    @error('topic7_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic7_bn">Topic Seven Bangla <span class="text-danger"></span></label>
                                    <input type="text" name="topic7_bn" value="{{ $course->topic7_bn }}" class="form-control"
                                        placeholder="Enter topic seven bangla">
                                    @error('topic7_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic8_en">Topic Eight English <span class="text-danger"></span></label>
                                    <input type="text" name="topic8_en" value="{{ $course->topic8_en }}" class="form-control"
                                        placeholder="Enter topic eight english">
                                    @error('topic8_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic8_bn">Topic Eight Bangla <span class="text-danger"></span></label>
                                    <input type="text" name="topic8_bn" value="{{ $course->topic8_bn }}" class="form-control"
                                        placeholder="Enter topic eight bangla">
                                    @error('topic8_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic9_en">Topic Nine English <span class="text-danger"></span></label>
                                    <input type="text" name="topic9_en" value="{{ $course->topic9_en }}" class="form-control"
                                        placeholder="Enter topic nine english">
                                    @error('topic9_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic9_bn">Topic Nine Bangla <span class="text-danger"></span></label>
                                    <input type="text" name="topic9_bn" value="{{ $course->topic9_bn }}" class="form-control"
                                        placeholder="Enter topic nine bangla">
                                    @error('topic9_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic10_en">Topic Ten English <span class="text-danger"></span></label>
                                    <input type="text" name="topic10_en" value="{{ $course->topic10_en }}" class="form-control"
                                        placeholder="Enter topic ten english">
                                    @error('topic10_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic10_bn">Topic Ten Bangla <span class="text-danger"></span></label>
                                    <input type="text" name="topic10_bn" value="{{ $course->topic10_bn }}" class="form-control"
                                        placeholder="Enter topic ten bangla">
                                    @error('topic10_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic11_en">Topic Eleven English <span class="text-danger"></span></label>
                                    <input type="text" name="topic11_en" value="{{ $course->topic11_en }}" class="form-control" placeholder="Enter topic eleven english">
                                    @error('topic11_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic11_bn">Topic Eleven Bangla <span class="text-danger"></span></label>
                                    <input type="text" name="topic11_bn" value="{{ $course->topic11_bn }}" class="form-control" placeholder="Enter topic eleven bangla">
                                    @error('topic11_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic12_en">Topic Twelve English <span class="text-danger"></span></label>
                                    <input type="text" name="topic12_en" value="{{ $course->topic12_en }}" class="form-control" placeholder="Enter topic twelve english">
                                    @error('topic12_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic12_bn">Topic Twelve Bangla <span class="text-danger"></span></label>
                                    <input type="text" name="topic12_bn" value="{{ $course->topic12_bn }}" class="form-control" placeholder="Enter topic twelve bangla">
                                    @error('topic12_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic13_en">Topic Thirteen English <span class="text-danger"></span></label>
                                    <input type="text" name="topic13_en" value="{{ $course->topic13_en }}" class="form-control" placeholder="Enter topic thirteen english">
                                    @error('topic13_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic13_bn">Topic Thirteen Bangla <span class="text-danger"></span></label>
                                    <input type="text" name="topic13_bn" value="{{ $course->topic13_bn }}" class="form-control" placeholder="Enter topic thirteen bangla">
                                    @error('topic13_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic14_en">Topic Fourteen English <span class="text-danger"></span></label>
                                    <input type="text" name="topic14_en" value="{{ $course->topic14_en }}" class="form-control" placeholder="Enter topic fourteen english">
                                    @error('topic14_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic14_bn">Topic Fourteen Bangla <span class="text-danger"></span></label>
                                    <input type="text" name="topic14_bn" value="{{ $course->topic14_bn }}" class="form-control" placeholder="Enter topic fourteen bangla">
                                    @error('topic14_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic15_en">Topic Fifteen English <span class="text-danger"></span></label>
                                    <input type="text" name="topic15_en" value="{{ $course->topic15_en }}" class="form-control" placeholder="Enter topic fifteen english">
                                    @error('topic15_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topic15_bn">Topic Fifteen Bangla <span class="text-danger"></span></label>
                                    <input type="text" name="topic15_bn" value="{{ $course->topic15_bn }}" class="form-control" placeholder="Enter topic fifteen bangla">
                                    @error('topic15_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Image Two <span
                                            class="text-danger"></span></label>
                                    <input type="file" name="image2" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Content Two English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="content2_en" name="content2_en" rows="5">{{ $course->content2_en }}</textarea>
                                    @error('content2_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Content Two Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="content2_bn" name="content2_bn" rows="5">{{ $course->content2_bn }}</textarea>
                                    @error('content2_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic One English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic1_en" name="footer_topic1_en" rows="5">{{ $course->footer_topic1_en }}</textarea>
                                    @error('footer_topic1_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic One Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic1_bn" name="footer_topic1_bn" rows="5">{{ $course->footer_topic1_bn }}</textarea>
                                    @error('footer_topic1_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Two English <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic2_en" name="footer_topic2_en" rows="5">{{ $course->footer_topic2_en }}</textarea>
                                    @error('footer_topic2_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Two Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic2_bn" name="footer_topic2_bn" rows="5">{{ $course->footer_topic2_bn }}</textarea>
                                    @error('footer_topic2_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Three English <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic3_en" name="footer_topic3_en" rows="5">{{ $course->footer_topic3_en }}</textarea>
                                    @error('footer_topic3_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Three Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic3_bn" name="footer_topic3_bn" rows="5">{{ $course->footer_topic3_bn }}</textarea>
                                    @error('footer_topic3_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Four English <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic4_en" name="footer_topic4_en" rows="5">{{ $course->footer_topic4_en }}</textarea>
                                    @error('footer_topic4_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Four Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic4_bn" name="footer_topic4_bn" rows="5">{{ $course->footer_topic4_bn }}</textarea>
                                    @error('footer_topic4_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Five English <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic5_en" name="footer_topic5_en" rows="5">{{ $course->footer_topic5_en }}</textarea>
                                    @error('footer_topic5_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Five Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic5_bn" name="footer_topic5_bn" rows="5">{{ $course->footer_topic5_bn }}</textarea>
                                    @error('footer_topic5_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Six English <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic6_en" name="footer_topic6_en" rows="5">{{ $course->footer_topic6_en }}</textarea>
                                    @error('footer_topic6_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Six Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic6_bn" name="footer_topic6_bn" rows="5">{{ $course->footer_topic6_bn }}</textarea>
                                    @error('footer_topic6_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Seven English <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic7_en" name="footer_topic7_en" rows="5">{{ $course->footer_topic7_en }}</textarea>
                                    @error('footer_topic7_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Seven Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic7_bn" name="footer_topic7_bn" rows="5">{{ $course->footer_topic7_bn }}</textarea>
                                    @error('footer_topic7_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Eight English <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic8_en" name="footer_topic8_en" rows="5">{{ $course->footer_topic8_en }}</textarea>
                                    @error('footer_topic8_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Eight Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic8_bn" name="footer_topic8_bn" rows="5">{{ $course->footer_topic8_bn }}</textarea>
                                    @error('footer_topic8_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Nine English <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic9_en" name="footer_topic9_en" rows="5">{{ $course->footer_topic9_en }}</textarea>
                                    @error('footer_topic9_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Nine Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic9_bn" name="footer_topic9_bn" rows="5">{{ $course->footer_topic9_bn }}</textarea>
                                    @error('footer_topic9_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Ten English <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic10_en" name="footer_topic10_en" rows="5">{{ $course->footer_topic10_en }}</textarea>
                                    @error('footer_topic10_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Footer Topic Ten Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" id="footer_topic10_bn" name="footer_topic10_bn" rows="5">{{ $course->footer_topic10_bn }}</textarea>
                                    @error('footer_topic10_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer_topic10_bn">Feature One English<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature1_en" rows="5">{{ $course->feature1_en }}</textarea>
                                    @error('feature1_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer_topic10_bn">Feature One Bangla<span
                                            class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature1_bn" rows="5">{{ $course->feature1_bn }}</textarea>
                                    @error('feature1_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature2_en">Feature Two English <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature2_en" rows="5">{{ $course->feature2_en }}</textarea>
                                    @error('feature2_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature2_bn">Feature Two Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature2_bn" rows="5">{{ $course->feature2_bn }}</textarea>
                                    @error('feature2_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature3_en">Feature Three English <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature3_en" rows="5">{{ $course->feature3_en }}</textarea>
                                    @error('feature3_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature3_bn">Feature Three Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature3_bn" rows="5">{{ $course->feature3_bn }}</textarea>
                                    @error('feature3_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature4_en">Feature Four English <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature4_en" rows="5">{{ $course->feature4_en }}</textarea>
                                    @error('feature4_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature4_bn">Feature Four Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature4_bn" rows="5">{{ $course->feature4_bn }}</textarea>
                                    @error('feature4_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature5_en">Feature Five English <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature5_en" rows="5">{{ $course->feature5_en }}</textarea>
                                    @error('feature5_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature5_bn">Feature Five Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature5_bn" rows="5">{{ $course->feature5_bn }}</textarea>
                                    @error('feature5_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature6_en">Feature Six English <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature6_en" rows="5">{{ $course->feature6_en }}</textarea>
                                    @error('feature6_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature6_bn">Feature Six Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature6_bn" rows="5">{{ $course->feature6_bn }}</textarea>
                                    @error('feature6_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature7_en">Feature Seven English <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature7_en" rows="5">{{ $course->feature7_en }}</textarea>
                                    @error('feature7_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature7_bn">Feature Seven Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature7_bn" rows="5">{{ $course->feature7_bn }}</textarea>
                                    @error('feature7_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature8_en">Feature Eight English <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature8_en" rows="5">{{ $course->feature8_en }}</textarea>
                                    @error('feature8_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature8_bn">Feature Eight Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature8_bn" rows="5">{{ $course->feature8_bn }}</textarea>
                                    @error('feature8_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature9_en">Feature Nine English <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature9_en" rows="5">{{ $course->feature9_en }}</textarea>
                                    @error('feature9_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature9_bn">Feature Nine Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature9_bn" rows="5">{{ $course->feature9_bn }}</textarea>
                                    @error('feature9_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature10_en">Feature Ten English <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature10_en" rows="5">{{ $course->feature10_en }}</textarea>
                                    @error('feature10_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="feature10_bn">Feature Ten Bangla <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="feature10_bn" rows="5">{{ $course->feature10_bn }}</textarea>
                                    @error('feature10_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="feature10_bn">Price English<span class="text-danger"></span></label>
                                    <input type="number" class="form-control" name="price_en" value="{{ $course->price_en }}" rows="5">
                                </div>

                                <div class="form-group">
                                    <label for="feature10_bn">Price Bangla<span class="text-danger"></span></label>
                                    <input type="number" class="form-control" name="price_bn" value="{{ $course->price_bn }}" rows="5">
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
