@extends('adminupdated.layouts.main-layout')
@section('title','All Blogs')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <!--begin::Card-->
            <div class="row">
            	 <div class="col-lg-12">
            	 	@include('website.layouts.flash')
            	 </div>
            </div>
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            All Blogs
                            <div class="text-muted pt-2 font-size-sm">Manage All Blogs</div>
                        </h3>
                    </div>
                    <div class="card-btn text-end">
                    	<a href="{{route('admin.addblogs')}}" class="btn btn-outline-success"><i class="fa fa-user" style="margin-right:10px"></i>Add new</a>	
                    </div>
                </div>
                <div class="card-body">
                	<table id="example" class="table table-bordered" >
                        <thead>
                            <tr>
                                <th>Blogs Image</th>
                                <th>Blog Name</th>
                                <th>Blogs Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($blogs as $r)
                            <tr>
                                <td><img src="{{asset('public/images/'.$r->blog_img)}}" style="width: 200px; height: 150px;"> </td>
                                <td>{{$r->blog_name}}</td>
                                <td>{{$r->blog_content}}</td>
                                <td>
                                    <a href="{{ url('admin/editblogs') }}/{{$r->id}}" class="btn btn-outline-primary" title="Edit"><i class="fa fa-pen"></i></a>
                                    <a href="{{ url('admin/deleteblog') }}/{{$r->id}}" class="btn btn-outline-danger" title="Edit"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                             @endforeach                                              
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>        
@endsection