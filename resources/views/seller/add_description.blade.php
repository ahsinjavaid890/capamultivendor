@extends('seller.layouts.master')
@section('content')
<main>
    <div class="container-fluid px-4">
         <h1 class="mt-4 text-center main-title">Add Description</h1> 
            <form action="{{route('seller.add_description_process')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                    <div class="col-md-12 col-left">
                        <div class="shadow-block" id="pills-tabContent">
                            <div class="form-detail">
                            
                                   
                                <div class="row">
                                   

                                    <div class="col-md-12">
                                        <div class="info-input mb-20px">
                                            <label>Description<span class="link-danger">*</span></label>
                                            <textarea type="text" class="coupons" placeholder="Description" name="desc" rows="5"></textarea>
                                        </div>
                                    </div>
                                
                                      
                                
                                </div>
                                <div class="col-md-12" style="margin-top:20px;">
                                    <div class="info-input mb-20px">
                                        <button type="submit" class="btn btn-success submit">Submit</button>
                                       
                                
                                    </div>
                                </div>
                            </div>
                      
                    </div>
                </div>
            </form>
        <div class="card">
            <div class="card-body">
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$descriptions->description}}</td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </div>
</main>


@stop
@push('otherscript')

<script>
    $(function(){
        $("button.submit").click(function(e){
              e.preventDefault();
              var isValid = true;                          
             $("input.coupons").each(function(){
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


                $("select.coupons").each(function(){
                    if($.trim($(this).val())=='0'){
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
                
                $("textarea.coupons").each(function(){
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