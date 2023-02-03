@extends('seller.layouts.master')
@section('content')
@include('alerts')
<main>
        <div class="row">
                <div class="col-md-8">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <h5 class="text-primary">Basic Information</h5> <hr>
                                </div>
                            </div>
                            <form class="" action="{{ route('seller.updatestoresettings') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <label class="col-md-4 col-form-label">Shop Name<span class="text-danger text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control mb-3" placeholder="Shop Name" name="shop_name" value="{{$store->shop_name}}" required="" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label">Shop Logo</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control" name="shop_logo">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-form-label">
                                        Shop Phone
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control mb-3" placeholder="Phone" name="shop_phone" value="{{$store->shop_phone}}" required="" />
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-form-label">Shop Address <span class="text-danger text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control mb-3" placeholder="Address" name="shop_address" value="{{$store->shop_address}}" required="" />
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 col-form-label">Meta Title<span class="text-danger text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control mb-3" placeholder="Meta Title" name="meta_title" value="{{$store->meta_title}}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-form-label">Meta description</label>
                                    <div class="col-md-8">
                                        <textarea name="meta_description" rows="3" class="form-control mb-3" >{{$store->meta_description}}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-form-label">About Store</label>
                                    <div class="col-md-8">
                                        <textarea  name="shop_about" rows="3" class="form-control mb-3" >{{$store->shop_about}}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-form-label">Policies Store</label>
                                    <div class="col-md-8">
                                        <textarea  name="shop_policy" rows="3" class="form-control mb-3" >{{$store->shop_policy}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <h5 class="text-primary">Social Media Accounts</h5> <hr>
                                </div>
                            </div>
                            <form class="" action="{{ route('seller.updatestoresocialmedia') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $store->id }}" name="id">
                                <div class="form-box-content p-3">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label">Facebook</label>
                                        <div class="col-md-9">
                                            <input value="{{$store->facebook_link}}" type="text" class="form-control" placeholder="Facebook" name="facebook" value="" />
                                            <small class="text-muted">Insert link with https</small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label">Twitter</label>
                                        <div class="col-md-9">
                                            <input value="{{$store->twitter_link}}" type="text" class="form-control" placeholder="Twitter" name="twitter" value="" />
                                            <small class="text-muted">Insert link with https</small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label">Google</label>
                                        <div class="col-md-9">
                                            <input value="{{$store->google_link}}" type="text" class="form-control" placeholder="Google" name="google" value="" />
                                            <small class="text-muted">Insert link with https</small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label">Youtube</label>
                                        <div class="col-md-9">
                                            <input value="{{$store->youtube_link}}" type="text" class="form-control" placeholder="Youtube" name="youtube" value="" />
                                            <small class="text-muted">Insert link with https</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form enctype="multipart/form-data" method="POST" action="{{ route('seller.updatestorebanners') }}">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <h5 class="text-primary">Store Banners</h5>
                                </div>
                                
                                    @csrf
                                    <input type="hidden" value="{{ $store->id }}" name="id">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="lable-control">Banners</label>
                                            <input type="file" class="form-control" name="banner">
                                        </div>
                                    </div>
                                    <br><br><br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                
                            </div>
                            </form>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                    <div class="card">
                        <div class="card-header">
                            Logo and Banners
                        </div>
                        <div class="card-body">
                            @if($store->shop_logo)
                            <img style="width:100px;height:100px;" src="{{ url('images') }}/{{ $store->shop_logo }}">
                            @else
                            <img style="width:100px;height:100px;"  src="https://peacemakersnetwork.org/wp-content/uploads/2019/09/placeholder.jpg">
                            @endif
                            <br>
                            <br>
                            @if($store->shop_banner)
                            <img style="width:100%;height:300px;" src="{{ url('images') }}/{{ $store->shop_banner }}">
                            @else
                            <img style="width:100%;height:300px;"  src="https://peacemakersnetwork.org/wp-content/uploads/2019/09/placeholder.jpg">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
</main>
@stop

