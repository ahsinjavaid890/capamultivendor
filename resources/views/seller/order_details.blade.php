@extends('seller.layouts.master')
@section('content')
<main>
<div class="container-fluid px-4">
                        <h1 class="mt-4 text-center main-title">Orders Details </h1>
                        <p class="mb-5 text-center main-para">Order id:{{$order_id}}</p>
                       
                    <div class="card mb-4">
                        
                                <div class="card-body">
                                <a href="{{route('seller.exportPDF',[encrypt($order_id)])}}"><button class="btn btn-outline-warning">Generate Invoice</button></a>
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Sl.no</th>
                                                <th>Product name</th>
                                                <th>image</th>
                                                <th>Qty</th>
                                                <th>Amount</th>                                                                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php $i=0; 
                                                   
                                            ?>
                                            @foreach($product_details as $product)
                                            <?php 
                                            $amt=$product->quantity*$product->sale_price;
                                            $i++;
                                             ?>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$product->product_title}}</td>
                                                <td><img src="{{asset('products/'.$product->featured_img)}}" style="width:150px"/></td>
                                                <td>{{$product->quantity}}X{{$product->sale_price}}</td>
                                                <td>{{$amt}}</td>
                                            </tr>
                                                 @endforeach                                  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
</div>
                </main>
 @stop 
 @push('otherscript')



 @endpush