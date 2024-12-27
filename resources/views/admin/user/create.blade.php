@extends('admin.master')
@section('title')
{{'User Create'}}
@endsection
@section('content')
<section class="content">
   <div class="container-fluid" style="padding-top: 20px;">
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header">
                  <h4>User Create
                     <a href="{{route('admin.user.index')}}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                  </h4>
               </div>
               <div class="card-body">
                  <form method="POST" action="{{route('admin.user.store')}}" enctype="multipart/form-data">
                     @csrf
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                           <div class="form-group">
                              <strong>Name English<span class="text-danger">*</span></strong>
                              <input type="text" name="name" placeholder="Name" class="form-control">
                              @error('name')
                                 <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <strong>Name Bangla<span class="text-danger"></span></strong>
                               <input type="text" name="name_bn" placeholder="Name" class="form-control">
                            </div>
                         </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                           <div class="form-group">
                              <strong>Email<span class="text-danger">*</span></strong>
                              <input type="email" name="email" placeholder="Email" class="form-control">
                               @error('email')
                                 <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                           <div class="form-group">
                              <strong>Password<span class="text-danger">*</span></strong>
                              <input type="password" name="password" placeholder="Password" class="form-control">
                               @error('password')
                                 <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                           <div class="form-group">
                              <strong>Confirm Password<span class="text-danger">*</span></strong>
                              <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
                           </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <strong>Image<span class="text-danger"></span></strong>
                               <input type="file" name="image"  class="form-control">
                            </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <strong>Teacher Linked In Address<span class="text-danger"></span></strong>
                               <input type="text" name="teacher_linkedin"   class="form-control">
                            </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <strong>Teacher Description English<span class="text-danger"></span></strong>
                               <textarea name="teacher_description"   class="form-control" rows="5"></textarea>
                            </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <strong>Teacher Description Bangla<span class="text-danger"></span></strong>
                               <textarea name="teacher_description_bn"   class="form-control" rows="5"></textarea>
                            </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <strong>Teacher's Graduation Institute Name English<span class="text-danger"></span></strong>
                               <input type="text" name="teacher_degree_inst" class="form-control">
                            </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <strong>Teacher's Graduation Institute Name Bangla<span class="text-danger"></span></strong>
                               <input type="text" name="teacher_degree_inst_bn" class="form-control">
                            </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <strong>Teacher's Degree English<span class="text-danger"></span></strong>
                               <input type="text" name="teacher_degree" class="form-control">
                            </div>
                         </div>
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <strong>Teacher's Degree Bangla<span class="text-danger"></span></strong>
                               <input type="text" name="teacher_degree_bn" class="form-control">
                            </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <strong>Teacher's Degree Subject English<span class="text-danger"></span></strong>
                               <input type="text" name="t_degree_subject" class="form-control" placeholder="example: bangla, math,al quran">
                            </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <strong>Teacher's Degree Subject Bangla<span class="text-danger"></span></strong>
                               <input type="text" name="t_degree_subject_bn" class="form-control">
                            </div>
                         </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                           <div class="form-group">
                              <strong>Role<span class="text-danger">*</span>:</strong>
                              <select name="roles[]" class="form-control" multiple="multiple">
                                 @foreach ($roles as $value => $role)
                                 <option value="{{ $value }}">
                                    {{ $role }}
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                           <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
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
@endsection
