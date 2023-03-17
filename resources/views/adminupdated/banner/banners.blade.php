@extends('adminupdated.layouts.main-layout')
@section('title','All Banners')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
       <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header flex-wrap py-5 d-flex justify-content-between">
                    <div class="card-title">
                        <h3 class="card-label">
                            Banner details
                            <div class="text-muted pt-2 font-size-sm">Check all the details of Banner</div>
                        </h3>
                    </div>
                    <div class="card-btn text-end">
                        <button class="btn btn-outline-success" onclick="showmodal()" title="add category">
                            <i class="fa fa-plus"></i> Add New Banner
                        </button>  
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered" >
                        <thead>
                            <tr>
                                <th>Banner</th>  
                                <th>Type</th>
                                <th>URL</th>                                          
                                <th>Action</th>                                                
                            </tr>
                        </thead>
                        <tbody id="catlist">
                            @foreach($banners as $banner)
                                <tr>
                                    <td class="text-center"><img class="img-thumbnail" src="{{asset('public/uploads/'.$banner->banner)}}" style="width:100px;height: 100px;"/></td>
                                    <td>{{ $banner->type }}</td>
                                    <td>{{ $banner->url }}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#updateBanner{{ $banner->id }}" title="add category" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                        <a href="{{route('admin.deleteBanner',[encrypt($banner->id)])}}"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>

                                <!-- Update banner -->

                                <div class="modal" id="updateBanner{{ $banner->id }}">
                                  <div class="modal-dialog">
                                    <div class="modal-content">

                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Update Banner</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      <form enctype="multipart/form-data" method="POST" action="{{ route('admin.updateBanner') }}">
                                         @csrf 
                                         <input type="hidden" name="id" value="{{ $banner->id }}">
                                      <!-- Modal body -->
                                      <div class="modal-body">
                                            <div class="form-group">
                                                <label>Banner</label>
                                                <input type="file" id="caticon" class="form-control " name="caticon" placeholder="upload category icons"/>
                                                <img class="img-thumbnail mt-2" src="{{asset('public/uploads/'.$banner->banner)}}" style="width:100px;height: 100px;"/>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Banner Type</label>
                                                <select class="form-control" name="type" id="type">
                                                    <option value="homepagemain"  @if($banner->type == 'homepagemain') selected @endif>Homepage Hero Banner</option>
                                                    <option value="homepagedeal" @if($banner->type == 'homepagedeal') selected @endif>Homepage Deal Banner</option>
                                                    <option value="homepagetop" @if($banner->type == 'homepagetop') selected @endif>Homepage Top Banner</option>
                                                    <option value="homepagenewarrival" @if($banner->type == 'homepagenewarrival') selected @endif>Homepage New Arrival Banner</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Banner Type</label>
                                                <input type="text" value="{{ $banner->type }}"  name="url" id="url" class="form-control">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Update</button> 
                                            </div>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="addnewbanner">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Add New Banner</h4>
                        <button type="button" class="close" onclick="showmodal()" data-dismiss="modal">&times;</button>
                      </div>
                      <form enctype="multipart/form-data" method="POST" action="{{ route('admin.addBanner') }}">
                          {{ csrf_field() }}
                      
                      <!-- Modal body -->
                      <div class="modal-body">
                            <div class="form-group">
                                <label>Banner</label>
                                <input type="file" id="caticon" class="form-control " name="caticon" placeholder="upload category icons"/>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Banner Type</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="homepagemain">Homepage Hero Banner</option>
                                    <option value="homepagedeal">Homepage Deal Banner</option>
                                    <option value="homepagetop">Homepage Top Banner</option>
                                    <option value="homepagenewarrival">Homepage New Arrival Banner</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Banner Type</label>
                                <input type="text"  name="url" id="url" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-success addcatprocess">Add</button> 
                            </div>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    function showmodal()
    {
        $('#addnewbanner').modal('toggle');
    }
</script>
 @endsection