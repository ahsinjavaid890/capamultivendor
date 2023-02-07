@extends('adminupdated.layouts.main-layout')
@section('title','Edit Blogs')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <!--begin::Card-->
            <div class="row">
                <div class="col-md-12">
                    @include('website.layouts.flash')
                </div>
            </div>
            <div class="card card-custom mt-5">
            	<div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Edit Blogs
                            <div class="text-muted pt-2 font-size-sm">Manage All Blogs</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.editblog')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-20px">
                                   <label>Blog Name <span class="link-danger">*</span></label>
                                   <input type="text" value="{{ $data->blog_name }}" class="form-control" placeholder="Write Blog Name here" id="blog_name" name="blog_name"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-20px">
                                   <label>Blog Content <span class="link-danger">*</span></label>
                                   <textarea class="form-control" name="blog_content">{{ $data->blog_content }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-20px">
                                   <label>Blog Image <span class="link-danger">*</span></label>
                                   <input type="file" class="form-control"  name="blog_img"/>
                                   <img class="mt-3" style="width: 100px;height: 100px" src="{{asset('public/images/'.$data->blog_img)}}">
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Add Blog</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>             
        </div>
    </div>
</div>
@endsection