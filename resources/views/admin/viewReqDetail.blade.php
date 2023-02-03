@extends('admin.layouts.master')
@section('content')
<main>
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-5">
                            <div class="product-details-img product-details-tab">
                                <img src="{{asset('uploads/'.$designRequests->product_img )}}">
                                
                            </div>
                        </div>
                            <div class="col-xl-7 col-lg-7 col-md-7">
                            <div class="product-details-content ms-5">
                                
                                <ul class="product-cat">
                                    <li><a class="btn low" href="javascript:void(0)">{{$designRequests->catname}}</a></li>
                                    <li><a class="btn medium" href="javascript:void(0)">{{$designRequests->subcat_name}}</a></li>
                                </ul>
                                

                                <h2>{{$designRequests->product_name}}</h2>
                               
                                
                                <div class="pro-details-list">
                                    <p>{{$designRequests->product_desc}} </p>
                                    
                                </div>
                                <div class="pro-options">
                                    <div class="pro-variants mt-0px color-radio">
                                        <label>Cost range</label>
                                        <div class="">{{$designRequests->cost}} </div>
                                        <!-- <div class="input-label">
                                            <input type="radio" name="colors" id="pink" checked>
                                            <label for="pink">Pink</label>
                                        </div>
                                        <div class="input-label">
                                            <input type="radio" name="colors" id="red" checked>
                                            <label for="red">Red</label>
                                        </div>
                                        <div class="input-label">
                                            <input type="radio" name="colors" id="green" checked>
                                            <label for="green">Green</label>
                                        </div>
                                        <div class="input-label">
                                            <input type="radio" name="colors" id="yellow" checked>
                                            <label for="yellow">Yellow</label>
                                        </div>
                                        <div class="input-label">
                                            <input type="radio" name="colors" id="parrot" checked>
                                            <label for="parrot">Parrot</label>
                                        </div>
                                    </div>
                                    <div class="pro-variants mt-0px dimen-radio">
                                        <label>Dimensions</label>
                                            <div class="input-label">
                                                <input type="radio" name="dimension" id="size1" checked>
                                                <label for="size1">4x5x3</label>
                                            </div>
                                            <div class="input-label">
                                                <input type="radio" name="dimension" id="size2" checked>
                                                <label for="size2">4x5x4</label>
                                            </div>
                                            <div class="input-label">
                                                <input type="radio" name="dimension" id="size3" checked>
                                                <label for="size3">4x5x6</label>
                                            </div> -->
                                    </div>
                                
                                </div>
                                
                               
                             
                               
                                
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 product-design">
                                <div class="back btn"><a href="{{route('admin.designRequest')}}">Back</a></div>
                               
                            </div>     
                        </div>
                    </div>
                </main>
                

@stop
