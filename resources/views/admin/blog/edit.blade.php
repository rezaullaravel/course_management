@extends('admin.master')
@section('title')
{{'Blog  Edit'}}
@endsection
@section('content')
<section class="content">
   <div class="container-fluid" style="padding-top: 20px;">
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header">
                  <h4>Blog   Edit
                     <a href="{{route('admin.blog-post.index')}}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                  </h4>
               </div>
               <div class="card-body">
                  <form action="{{route('admin.blog-post.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label>Select Category Name<span class="text-danger">*</span></label>
                        <select name="blog_category_id" class="form-control">
                           <option value="" selected disabled>Select</option>
                           @foreach ($categories as $row)
                           <option value="{{ $row->id }}" {{$blog->blog_category_id == $row->id ? 'selected':''}}>{{ $row->name }}</option>
                           @endforeach
                        </select>
                        @error('blog_category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Blog title <span class="text-danger">*</span></label>
                        <input type="text" name="title" value="{{$blog->title}}"  class="form-control" placeholder="Enter blog title" rows="5">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Blog content<span class="text-danger">*</span></label>
                        <textarea  class="form-control" id="editor" name="content"  rows="5" >{{$blog->content}}</textarea>
                        @error('content')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Blog image <span class="text-danger">*</span></label>
                        <input type="file" name="image"  class="form-control" onchange="postImgUrl(this)">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <img src="{{ $blog->image ? asset($blog->image) : '' }}" id="postImage" style="margin-top: 5px;">
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