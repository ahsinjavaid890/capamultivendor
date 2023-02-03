@extends('website.layouts.master')
@section('content')

<div class="container-fluid category-list">
    <div class="row">
        @foreach($categories as $getcat)
            <div class="col-md-2 p-0 pb-0">
                <a href="{{ url('category') }}/{{ $getcat->url }}" class="category-list">
                    <div class="card category-card rounded-0">
                        <div class="card-body text-center">
                            <div class="category-img">
                            @if($getcat->icon==null)
                                <img src="{{asset('public/website/assets/images/icons/speakers.svg')}}" alt="{{$getcat->category_name}}" />
                                @else
                                <img src="{{asset('products/'.$getcat->icon)}}" alt="{{$getcat->category_name}}" />
                            @endif
                            </div>
                            <div class="category-discript"><span>{{$getcat->category_name}}</span></div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>


@stop