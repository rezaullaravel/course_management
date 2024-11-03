@extends('admin.master')
@section('title')
{{'Course  Create'}}
@endsection
@section('content')
<section class="content">
   <div class="container-fluid" style="padding-top: 20px;">
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header">
                  <h4>Course   Create
                     <a href="{{route('admin.course-post.index')}}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                  </h4>
               </div>
               <div class="card-body">
                  <form action="{{route('admin.course-post.store')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label>Select Category Name<span class="text-danger">*</span></label>
                        <select name="course_category_id" class="form-control">
                           <option value="" selected disabled>Select</option>
                           @foreach ($categories as $row)
                           <option value="{{ $row->id }}">{{ $row->name }}</option>
                           @endforeach
                        </select>
                        @error('course_category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Course title <span class="text-danger">*</span></label>
                        <input type="text" name="title"  class="form-control" placeholder="Enter course title" rows="5">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Course content<span class="text-danger">*</span></label>
                        <textarea  class="form-control" id="editor" name="content"  rows="5" ></textarea>
                        @error('content')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Course image <span class="text-danger">*</span></label>
                        <input type="file" name="image"  class="form-control" onchange="postImgUrl(this)">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <img src="" id="postImage" style="margin-top: 5px;">
                     </div>

                     <div class="form-group">
                        <label for="exampleInputPassword1">Video Embed Url <span class="text-danger"></span></label>
                        <input type="text" name="video_url"  class="form-control">
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
   </div>
   <!-- /.container-fluid -->
</section>
<script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
<script>
   ClassicEditor
           .create( document.querySelector( '#editor' ),{
               ckfinder:{
                   uploadUrl:'{{ route('ckeditor.upload').'?_token='.csrf_token() }}'
               }
           } )
           .then( editor => {
                   console.log( editor );
           } )
           .catch( error => {
                   console.error( error );
           } );
</script>
{{-- javascript for blog   image preview --}}
<script type="text/javascript">
   function postImgUrl(input){
   if (input.files && input.files[0]) {
       var reader = new FileReader();
       reader.onload = function(e){
       $('#postImage').attr('src',e.target.result).width(300).height(200);
       };
       reader.readAsDataURL(input.files[0]);
   }
   }
</script>
{{-- javascript for post image end --}}
@endsection
