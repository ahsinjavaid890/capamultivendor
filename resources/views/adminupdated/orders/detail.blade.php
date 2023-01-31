@extends('adminupdated.layouts.main-layout')
@section('title','Order Detail')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="row">
            <div class="col-md-12">
                @include('sellerupdated.alerts.index')
            </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Order Number#{{$data->order_number}}</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-centered mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th>Product Name</th>
                                <th>Seller</th>
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
                                <td>{{ $r->shop_name }}</td>
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
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Shipping Address</h4>
                            @if($address)
                            @php
                                $user = DB::table('customers')->where('id' , $address->cust_id)->first();
                            @endphp
                            <h4>{{ $user->fname }} {{ $user->lname }}</h4>
                            <h4>{{ $user->email }}</h4>
                            <address class="mb-0 font-14 address-lg">
                                {{$address->address}} {{ $address->emirates }}{{ $address->area }}<br>
                                <abbr title="Phone">Mobile:</abbr> {{ $user->mobile }}<br/>
                            </address>

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
        </div> <!-- end col -->

        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <select onchange="location = this.value;" class="form-control">
                        <!-- <option value="">Change Status</option> -->
                        <!-- <option value="{{ url('admin/ecommerece/changeorderstatus') }}/{{ $data->id }}/completed" @if($data->status == 'completed') selected @endif>Completed</option> -->
                        <option value="{{ url('admin/orders/changeorderstatus') }}/{{ $data->id }}/packed" @if($data->status == 'packed') selected @endif>Packed</option>
                        <option value="{{ url('admin/orders/changeorderstatus') }}/{{ $data->id }}/shipped" @if($data->status == 'shipped') selected @endif>Shipped</option>
                        <option value="{{ url('admin/orders/changeorderstatus') }}/{{ $data->id }}/received" @if($data->status == 'received') selected @endif>Received</option>
                        <option value="{{ url('admin/orders/changeorderstatus') }}/{{ $data->id }}/cancled" @if($data->status == 'cancled') selected @endif>Cancled</option>
                    </select>
                </div>
                <div class="col-lg-6 text-right">
                    <a href="{{ url('admin/orders/downloadinvoice') }}/{{ $data->id }}" class="btn btn-block btn-primary mb-2"><i class="mdi mdi-download"></i>Download Invoice</a>
                </div>
            </div>
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
                                <td>Delivery :</td>
                                <td>AED @if($data->delivery == 'express') 30 @else 0 @endif</td>
                            </tr> 
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
                                    <b>AED @if($data->delivery == 'express') {{$total+30}} @else 0 @endif </b>
                                </td>
                            </tr>
                            
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->

                </div>
            </div>
        </div> <!-- end col -->
    </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection