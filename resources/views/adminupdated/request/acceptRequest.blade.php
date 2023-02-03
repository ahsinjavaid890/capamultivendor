@extends('adminupdated.layouts.main-layout')
@section('title','Design Request')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <!--begin::Card-->
            <div class="row">
            	 <div class="col-lg-12">
            	 	@include('website.layouts.flash')
            	 </div>
            </div>
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Accept Request
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                	<form action="{{route('admin.requestAcceptMail')}}" method="POST" id="reqFrm">
                        @csrf
                        <div class="row">
                            
                            <input type="hidden" name="reqid" value={{$reqId}} />
                            <input type="hidden" name="reqemail" value={{$reqEmail}} />
                            <div class="col-md-12">
                                <div class="info-input mb-20px">
                                    <label>Request </label>
                                    <input type="text" value="{{$reqTitle}}" name="reqTitle" class="reqQuestions form-control"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="info-input mb-20px">
                                    <label>Question </label>
                                    <input type="text"  class="acceptRequest form-control" name="reqQuestions"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <div class="info-input mb-20px">
                                <label>Message </label>
                                <textarea placeholder="Write Your Message Here" rows="8" class="acceptRequest form-control" name="reqMsg"></textarea>
                            </div>
                        </div>
                           
                        <div class="d-flex">
                        <div class="next btn"><a class="btn btn-primary" href="javascript:void(0)" id="acceptBtnReq">Submit</a></div>
                        <!-- <div class="next btn"><a href="javascript:void(0)" id="rejectBtnReq">Reject</a></div> -->
                        </div>
                    </div>
                    </form>        
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function(){
        $("a#acceptBtnReq").click(function(e){
            e.preventDefault();
            var isValid = true;
            $("input.acceptRequest").each(function(){
                if($(this).val()==''){
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

            $("textarea.acceptRequest").each(function(){
                if($(this).val()==''){
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

            if(isValid!=true){
                e.preventDefault();
                return false;
            }else{
                e.preventDefault();
                $("#cover-spin").show(); 
                $("form#reqFrm").submit();
            }


        })
    })
</script>

@endsection