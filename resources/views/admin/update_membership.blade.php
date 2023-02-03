@extends('admin.layouts.master')
@section('content')
<main>
    <div class="container-fluid px-4">
         <h1 class="mt-4 text-center main-title">Update Membership Plan</h1> 
            <form action="{{route('admin.updateMembershipProcess')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="plan_id" value="{{$plan_id}}" />
                <div class="row">
                    <div class="col-md-12 col-left">
                        <div class="shadow-block" id="pills-tabContent">
                            <div class="form-detail">
                                <div class="row">
                                <div class="col-md-12">
                                        <div class="info-input mb-20px">
                                            <label>Plans Type <span class="link-danger">*</span></label>
                                            <select type="text" class="Addmembership"  id="plan_type" name="plan_type" >
                                                <option value="0">-select plan type-</option>
                                                @if($membership->isAdons==1)
                                                <option value="1" selected>Regular Plan</option>
                                                <option value="2">Add-Ons</option>
                                                @elseif($membership->isAdons==2)
                                                <option value="1">Regular Plan</option>
                                                <option value="2"  selected>Add-Ons</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Membership Title <span class="link-danger">*</span></label>
                                            <input type="text" class="Addmembership" placeholder="Write plan title here" id="plan_title" name="plan_title" value="{{$membership->title}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Amount <span class="link-danger">*</span></label>
                                            <input type="text" class="Addmembership" placeholder="Write plan amount here" id="amount" name="amount" value="{{$membership->amount}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="info-input mb-20px">
                                            <label> No of products<span class="link-danger">*</span></label>
                                            <input type="text" class="Addmembership" placeholder="Write product quantity here" id="no_of_product" name="no_of_product" value="{{$membership->noproducts}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Online Directory<span class="link-danger">*</span></label>
                                            <select type="text" class="Addmembership"  id="onlinedirectory" name="onlinedirectory" >
                                                 @if($membership->online_directory==0)                                                
                                                <option value="0" selected>No</option>
                                                <option value="1">Yes</option>
                                                @else
                                                <option value="0">No</option>
                                                <option value="1" selected>Yes</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Online Marketplace<span class="link-danger">*</span></label>
                                            <select type="text" class="Addmembership"  id="marketplace" name="marketplace" >
                                                @if($membership->marketplace==0) 
                                                <option value="0" selected>No</option>
                                                <option value="1">Yes</option>
                                                @else
                                                <option value="0">No</option>
                                                <option value="1" selected>Yes</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                
                                        <div class="col-md-12">
                                            <div class="info-input mb-20px">
                                                <label>Desctiption <span class="link-danger">*</span></label>
                                                <textarea type="text" class="Addmembership" placeholder="plan details" id="plan_details" name="plan_details" >{!! $membership->description !!}</textarea>
                                            </div>
                                        </div>
                                
                                </div>
                                <div class="col-md-12" style="margin-top:20px;">
                                    <div class="info-input mb-20px">
                                        <button type="submit" class="btn btn-success submit">Submit</button>
                                        <button type="button" class="btn btn-danger addmore">Add more</button>
                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</main>


@stop
@push('otherscript')
<script>
    tinymce.init({
        selector:'textarea#plan_details', 
        plugins: 'lists'       
             
    });
</script>

<script>
    $(function(){
        $("button.submit").click(function(e){
              e.preventDefault();
              var isValid = true;                          
             $("input.Addmembership").each(function(){
                    if($.trim($(this).val())==''){
                        isValid = false;
                        $(this).css({
                            "border": "1px solid red",
                            "background": "#FFCECE",
                        })
                        }else{
                        $(this).css({
                            'background':'',
                            'border':''
                        })                        
                    }
                })                

               
                if(isValid !=true){
                    return false;
                }else{
                    $("#cover-spin").show();
                    $("form").submit();
                    
                }
             
          
        })
    })
</script>
@endpush