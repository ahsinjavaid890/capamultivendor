@extends('sellerupdated.layouts.main-layout')
@section('title','All Products')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            All Products
                            <div class="text-muted pt-2 font-size-sm">Manage All Products</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered table-centered mb-0">
                       <thead>
                          <tr>
                             <th>Featured Image</th>
                             <th>Product Title</th>
                             <th>Category</th>
                             <th>Subcategory</th>
                             
                             <th>Status</th>
                             <th>Action</th>
                          </tr>
                       </thead>
                       <tbody>
                          @foreach($product_list as $product)
                          <tr>
                             <td class="text-center"><img class="img-thumbnail" src="{{asset('public/products/'.$product->featured_img)}}" style="width:100px;height: 100px;"/></td>
                             <td>{{$product->product_title}}</td>
                             <td>{{$product->cat_name}}</td>
                             <td>{{$product->subcat_name}}</td>
                             
                             <td>
                                @if($product->status==1)
                                <span class="badge badge-warning" style="font-size:12px;">Pending</span>
                                @elseif($product->status==2)
                                <span class="badge badge-success" style="font-size:12px;">Approved</span>
                                @endif
                             </td>
                             <td>
                                <a href="{{ url('seller/editproduct') }}/{{ $product->id }}" class="btn btn-outline-primary update" title="Edit"><i class="fa fa-edit"></i></a>
                                <button class="btn btn-outline-danger delete" title="Delete" data="{{$product->id}}" ><i class="fa fa-trash"></i></button>
                             </td>
                          </tr>
                          @endforeach    
                       </tbody>
                    </table>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
@section('script')
<script>
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
    $(document).ready(function(){
        @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
    })
</script>

<!-- product attribute -->
<script>
     $(function(){
        $("button.activate").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to change this status")){
                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var form = new FormData();
                form.append('id',id);
                $.ajax({
                    url:"{{route('seller.productActive')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Product activated successfull!');
                            location.reload();
                        }else{
                            toastr.error('somethign went wrong!');
                         return false;   
                    }
                }
                })
            }
        })

        // deactivate vendor
        $("button.deactivate").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to change this status")){
                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var form = new FormData();
                form.append('id',id);
                $.ajax({
                    url:"{{route('seller.productdeactive')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Product deactivated successfull!');
                            location.reload();
                        }else{
                            toastr.error('somethign went wrong!');
                         return false;   
                    }
                }
                })
            }
        })

        // delete vendor

        $("button.delete").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to delete this")){
                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var form = new FormData();
                form.append('id',id);
                $.ajax({
                    url:"{{route('seller.productDelete')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Product deleted successfull!');
                            location.reload();
                        }else{
                            toastr.error('something went wrong!');
                         return false;   
                    }
                }
                })
            }
        })



     })
 </script>

 <!-- type of offer -->
<script>
    $(function(){
        $("button.productmake").click(function(e){
              e.preventDefault();
              var prod_id = [];
              var isValid = true;
              $("input.makecheckbox").each(function(){
                  if($(this).is(':checked')){
                  var products = $(this).val();
                  prod_id.push(products);
                  }
              }) 
              console.log(prod_id.length)
              var typeof_pr = $("#typeof").val();
              if(typeof_pr =='0'){
                isValid = false;
                toastr.error('please select offer');
                return false; 
              }else{
                isValid = true;
              } 
              
              if(prod_id.length==0){
                isValid = false;
                toastr.error('please select product');
                return false; 
              }else{
                isValid=true;
              }
              if(isValid==true){
                  $("#cover-spin").show();
                  var form = new FormData();
                  form.append('prod_id',prod_id);
                  form.append('typeof_pr',typeof_pr);
                  $.ajax({
                      url:"{{route('seller.productDfDAP')}}",
                      type:"POST",
                      data:form,
                      cache:false,
                      contentType:false,
                      processData:false,
                      success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Product type changed successfull!');
                            location.reload();
                        }else{
                            toastr.error('somethign went wrong!');
                         return false;   
                    }
                      }
                  })
              }


              
        })
    })
</script>
@endsection