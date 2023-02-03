@extends('admin.layouts.master')
@section('content')
<main>
                    <div class="container-fluid px-4">
                       
                        
                        <div class="form-detail">
                            <form action="{{route('admin.requestAcceptMail')}}" method="POST" id="reqFrm">
                                @csrf
                                <div class="row">
                                    
                                    <input type="hidden" name="reqid" value={{$reqId}} />
                                    <input type="hidden" name="reqemail" value={{$reqEmail}} />
                                    <div class="col-md-12">
                                        <div class="info-input mb-20px">
                                            <label>Request </label>
                                            <input type="text" value="{{$reqTitle}}" name="reqTitle" class="acceptRequest"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="info-input mb-20px">
                                            <label>Question </label>
                                            <input type="text"  class="acceptRequest" name="reqQuestions"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="info-input mb-20px">
                                        <label>Message </label>
                                        <textarea placeholder="Write Your Message Here" rows="8" class="acceptRequest" name="reqMsg"></textarea>
                                    </div>
                                </div>
                                   
								<div class="d-flex">
                                <div class="next btn"><a href="javascript:void(0)" id="acceptBtnReq">Submit</a></div>
                                <!-- <div class="next btn"><a href="javascript:void(0)" id="rejectBtnReq">Reject</a></div> -->
                                </div>
                            </div>
                            </form>
                    </div>
                    </div>
                </main>

@stop

@push('otherscript')
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

@endpush