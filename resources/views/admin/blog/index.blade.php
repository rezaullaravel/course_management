@extends('admin.master')
@section('title')
    {{'Blog  List'}}
@endsection
@section('content')
 <section class="content">
      <div class="container-fluid" style="padding-top: 20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Blog  List
                @can('create-blog')
                 <a href="{{route('admin.blog-post.create')}}" class="btn btn-primary btn-sm" style="float:right;"><i class="las la-plus-square"></i>Create Blog</a> 
                @endcan
                </h4>
              </div>

              <div class="card-body">
                @if($blogs->count()>0)
                <table class="table table-bordered table-sm">
                  <thead class="text-center">
                    <tr>
                      <th>Sl</th>
                      <th>Category</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Content</th>
                      <th>Author</th>
                      <th>Created</th>
                      <th>Status</th>
                       <th width="150">
                          @if(auth()->user()->can('edit-blog')||auth()->user()->can('delete-blog')||auth()->user()->can('edit-blog-status'))
                           Action
                          @endif
                        </th>
                    </tr>
                  </thead>

                  <tbody class="text-center">
                   @foreach($blogs as $key => $row)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$row->category->name}}</td>
                      <td>{{$row->title}}</td>
                      <td>
                      	<img src="{{asset($row->image)}}" width="100" height="100">
                      </td>
                      <td>{!!Str::limit($row->content,100)!!}</td>
                      <td>{{$row->author}}</td>
                      <td>{{date('d-m-Y',strtotime($row->created_at))}}</td>
                      <td>
                      	@if($row->status==1)
                      	 <span class="badge badge-primary">Active</span>
                      	@else
                      	<span class="badge badge-danger">Deactive</span>
                      	@endif
                      </td>
                      <td>
                      	@can('edit-blog-status')
                      	@if($row->status==1)
                      	 <a href="{{route('admin.blog-post.deactive',$row->id)}}" class="btn btn-success btn-sm" title="update status">
                          <i class="las la-arrow-up"></i>
                        </a> 
                      	@endif

                      	@if($row->status==0)
                      	 <a href="{{route('admin.blog-post.active',$row->id)}}" class="btn btn-success btn-sm" title="update status">
                          <i class="las la-arrow-down"></i>
                        </a> 
                      	@endif
                      	@endcan
                      	

                        @can('edit-blog')
                         <a href="{{route('admin.blog-post.edit',$row->id)}}" class="btn btn-primary btn-sm" title="edit">
                          <i class="las la-pen"></i>
                        </a> 
                        @endcan

                         @can('delete-blog')
                         <a href="{{route('admin.blog-post.delete',$row->id)}}" class="btn btn-danger btn-sm" title="delete" onclick="confirmation(event)">
                          <i class="las la-trash"></i>
                         </a>
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                <h4 class="text-center text-danger">No blog available.....</h4>
                @endif
              </div>
            </div>
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
@endsection