@extends('website.layouts.master')
@section('content')
<div class="categories-breadcrumb ptb-60px" style="background-color: #ecebeb;">
    <div class="container-fluid">
        <div class="archive-header">
         <div class="row align-items-center">
            <div class="col-xl-6">
               <h1 class="mb-4">All Categories</h1>
               <div class="breadcrumb">
                  <a href="{{ url(' ') }}" rel="nofollow"><i class="fa fa-home mx-1"></i>Home</a>
                  <span><i class="fa fa-angle-right mr-5"></i> Categories</span> 
               </div>
            </div>
         </div>
      </div>
    </div>
</div>
<div class="container-fluid category-list p-3" style="background-color: #f5eff7;">
    <div class="row">
        @foreach($categories as $getcat)
        <div class="col-md-2">
            <div class="card card-2">
                <div class="card-body">
                    <div class="card-figure">
                        <a href="{{ url('category') }}/{{ $getcat->url }}">
                        @if($getcat->icon==null)
                            <img src="{{asset('public/website/assets/images/icons/speakers.svg')}}" alt="{{$getcat->category_name}}" />
                            @else
                            <img src="{{asset('public/products/'.$getcat->icon)}}" alt="{{$getcat->category_name}}" />
                        @endif
                        </a>
                    </div>
                    <div class="card-heading">
                        <a href="{{ url('category') }}/{{ $getcat->url }}"><span>{{$getcat->category_name}}</span></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@stop