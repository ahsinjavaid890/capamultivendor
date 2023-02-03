@extends('admin.layouts.master')
@section('content')
<main>
<div class="container-fluid px-4">
<h1 class="mt-4 text-center main-title">Website Banner</h1>
<div class="form-details catbody" style="display:none;">
    <table class="table table-bordered">
        <tbody>                                   
            <td>
                <div class="info-input">
                    <input type="file" id="caticon" class="form-control caticon" placeholder="upload category icons"/>
                </div>
            </td>
            <td>
                <button class="btn btn-success addcatprocess">Add</button>                                        
                <button class="btn btn-danger removecat">Remove</button>
            </td>
        </tbody>
    </table>
</div>
<div class="col-md-12">
    <button class="btn btn-outline-success" onclick="showmodal()" title="add category">
        <i class="fa fa-plus"></i> Add New Banner
    </button>
</div>
<br>
<div class="card mb-4">
<div class="card-body">
    <table id="datatablesSimple">
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
</div>                            
</div>
</main>
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
 @stop

 @push('otherscript')
<script type="text/javascript">
    function showmodal()
    {
        $('#addnewbanner').modal('toggle');
    }
</script>
@endpush
 
