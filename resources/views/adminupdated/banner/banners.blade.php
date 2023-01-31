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
                            Coupons details
                            <div class="text-muted pt-2 font-size-sm">Check all the details of Coupons</div>
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
                                    <td><img src="{{asset('uploads/'.$banner->banner)}}" style="width:200px"/></td>
                                    <td>{{ $banner->type }}</td>
                                    <td>{{ $banner->url }}</td>
                                    <td>
                                        <a href="{{route('admin.deleteBanner',[encrypt($banner->id)])}}"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>
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