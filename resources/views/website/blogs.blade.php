@extends('website.layouts.master')
@section('content')
<div class="offcanvas-overlay"></div>
<div class="blog-page mt-30">
	<div class="container-fluid">
		<div class="archive-header mb-3">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <h1 class="mb-4">Expolor All Blogs</h1>
                    <div class="breadcrumb">
                        <a href="{{ url(' ') }}" rel="nofollow"><i class="fa fa-home mx-1"></i>Home</a>
                        <span><i class="fa fa-angle-right mr-5"></i></span> 
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach(DB::table('blogs')->get() as $r)
                    <div class="col-md-3 mb-3">
                        <div class="card blog-card">
                            <div class="card-body p-0">
                                <div class="blog-image">
                                    <a href="#">
                                        <img src="{{asset('public/images/'.$r->blog_img)}}" style="width: 100%;border-radius: 8px 8px 0px 0px;">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h6 class="mb-10 font-sm"><a class="entry-meta text-muted" href="#">Salad</a></h6>
                                    <div class="blog-title">
                                        <h4><a href="{{ url('blogsdetail') }}/{{ $r->id }}">{{ $r->blog_name }}</a> </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
	</div>
</div>
@stop