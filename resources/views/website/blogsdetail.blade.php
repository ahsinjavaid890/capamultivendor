@extends('website.layouts.master')
@section('content')
<div class="vendor-top-bar ptb-60px" style="background-color: #ecebeb;">
    <div class="container-fluid">
      <div class="archive-header mb-3">
         <div class="row align-items-center">
            <div class="col-xl-6">
               <h1 class="mb-4">{{$blogs->blog_name}}</h1>
               <div class="breadcrumb">
                  <a href="{{ url(' ') }}" rel="nofollow"><i class="fa fa-home mx-1"></i>Home</a><span><i class="fa fa-angle-right mr-3"></i> Blogs</span>
                  <span><i class="fa fa-angle-right mr-5"></i> {{ $blogs->blog_name }}</span> 
               </div>
            </div>
         </div>
      </div>
    </div>
</div> 

<div class="shop-category-area mt-30px">
    <div class="container-fluid">
        <div class="row">
         <div class="col-lg-8">
          <div class="content-box">
              @if($blogs->blog_img)
              <img class="bg-img d-flex" src="{{asset('public/images/'.$blogs->blog_img)}}" style="width: 100%;height: 100%;" />
              @else
              <img style="width: 100%;height: 100%;" src="https://img.freepik.com/free-vector/gradient-minimalist-background_23-2149989166.jpg?w=2000">
              @endif
          </div>
            <div class="blog-content mt-3">
              <h1>{{$blogs->blog_name}}</h1> 
            </div>
            <div class="ven-shop-text mt-3">
            <p>
                {{$blogs->blog_content}}
            </p>
            </div>
         </div>
            <div class="col-lg-12 order-lg-last col-md-12 order-md-first">
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
        </div>
    </div>
</div>
@stop