@extends('website.layouts.master')
@section('content') 
<link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/customerdashboard.css') }}">
<main class="main bg-grey min-height-600">
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg">
                @include('website.customer.sidebar')
                <div class="tab-content mb-6 bg-white p-4">
                    <div class="tab-pane active in" id="account-dashboard">
                        <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Order Number#{{$data->order_number}}</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-centered mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Variations</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                        $subtotal = 0;
                                        $shippingcost = 0;
                                    @endphp
                            @foreach($orderdetails as $r)
                            <tr>
                                <td> <a target="_blank" href="{{ url('product') }}/{{ $r->url }}">{{$r->product_title}}</a> </td>
                                <td>{{$r->quantity}}</td>
                                <td>AED {{ $r->sale_price }}</td>
                                <td>

                                    @if(DB::table('order_variations')->where('orderdetails' , $r->id)->count() > 0)
                                    <button data-toggle="modal" data-target="#myModal{{ $r->id }}" class="btn btn-primary">View Variations</button>


                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModal{{ $r->id }}">
                                      <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                          <!-- Modal Header -->
                                          <div class="modal-header">
                                            <h4 class="modal-title">Ordered Variations</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          </div>

                                          <!-- Modal body -->
                                          <div class="modal-body">
                                            
                                                <table class="table table-centered table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Variation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach(DB::table('order_variations')->where('orderdetails' , $r->id)->get() as $v)
                                                        <tr>
                                                            <td>{{ DB::table('global_attributes')->where('id' , DB::table('attributes')->where('id' , $v->main_variation)->get()->first()->attribute_id)->get()->first()->name  }}</td>
                                                            <td>{{ $v->variation_name }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                
                                                
                                                </table>
                                          </div>

                                          <!-- Modal footer -->
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                          </div>

                                        </div>
                                      </div>
                                    </div>

                                    @else

                                    <span style="color:red;"> No Variations </span>

                                    @endif

                                </td>
                                <td>AED {{$r->price}}</td>

                            </tr>
                            @php
                                $subtotal += $r['price']*$r['quantity'];
                            @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->

                </div>
            </div>
            <br>
            <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Order Summary</h4>

                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered">
                                <thead class="thead-light">
                                <tr>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Sub Total :</td>
                                    <td>AED {{$orderdetails->sum('price')}}</td>
                                </tr>
                                <?php 
                                $total = $subtotal;
                                ?>

                                <tr class="cart-subtotal bb-no">
                                    <td>
                                        <b>Total</b>
                                    </td>
                                    <td>
                                        <b>AED {{$total}}</b>
                                    </td>
                                </tr>
                                
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->

                    </div>
                </div>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Shipping Address</h4>
                            @if($address)



                            @else
                            <h4>{{ $data->name }}</h4>
                            <h4>{{ $data->email }}</h4>
                            <h5>{{ $data->phonenumber }} </h5>
                            
                            <address class="mb-0 font-14 address-lg">
                                {{$data->address}} {{ $data->emirates }}{{ $data->area }}<br>
                                <abbr title="Phone">Mobile:</abbr> {{ $data->phonenumber }}<br/>
                            </address>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Order Notes</h4>
                            @if($data->ordernotes)
                            {{$data->ordernotes}}
                            @else

                            No Order Notes

                            @endif
                        </div>
                    </div>
                </div> <!-- end col -->

                 <!-- end col -->

                <!-- end col -->
            </div>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop 