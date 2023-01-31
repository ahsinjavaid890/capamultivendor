@extends('website.layouts.master')
@section('content')
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style type="text/css">
   .checkbox-input input {
   width: 27px !important;
   }
   .checkbox-input label {
   font-size: 11px !important;
   }
</style>
<div id="Events">
<div class="breadcrumb-area" style="background:#ecebeb;">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="breadcrumb-content">
               <ul class="nav">
                  <li><a href="{{route('website.index')}}">Home</a></li>
                  <li><a href="{{route('website.playevent')}}">Plan your Event</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="events-tabs">
   <div class="row">
      <div class="events-tab-block">
         <!-- Shop Top Area Start -->
         <div class="event-tab-top-bar">
            <!-- Left Side start -->
            <div class="container">
               <div class="events-tab nav">
                  <a href="#event-details" data-bs-toggle="tab" @if(!isset($data)) class="active"  @endif>
                     <span>Event Details</span>
                     <div id="basictab" class="event-icon">
                        <img src="{{asset('website/assets/images/icons/event-poster-with-white-details.png')}}">
                     </div>
                  </a>
                  <a  href="#choose-products" data-bs-toggle="tab">
                     <span>Choose Required Products</span>
                     <div id="choseproducts" class="event-icon">
                        <img src="{{ asset('website/assets/images/icons/categories.png')}}">
                     </div>
                  </a>
                  <a href="#recommended-products" data-bs-toggle="tab" @if(isset($data)) class="active"  @endif>
                     <span>Recommended Products</span>
                     <div class="event-icon">
                        <img src="{{ asset('website/assets/images/icons/new-product.png')}}">
                     </div>
                  </a>
               </div>
            </div>
         </div>
         <!-- Events Tabs Top Area End -->
         <!-- Events Tabs Bottom Area Start -->
         <div class="tab-bottom-area mt-35">
            <!-- Events Tabs Content Start -->
            <div class="tab-content jump">
               <!-- Tab One Start -->
               <form id="planeventsubmitform" method="POST" action="{{ url('submitplanevent') }}">
                @csrf
               <div id="event-details" class="tab-pane @if(!isset($data)) active @endif">
                  <div class="container">
                     <div class="row">
                        <div class="tab-content">
                           <h1>1-Event Details</h1>
                           <div class="form-detail">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="info-input mb-20px">
                                       <label>Type of Event</label>
                                       <select>
                                          <option value="">Choose event type</option>
                                          <option value="">Birthday</option>
                                          <option value="">Wedding</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="info-input mb-20px">
                                       <label>Event Location</label>
                                       <input type="text" name="google_location" id="personal_companyadd" />
                                       <div class="map-pin icon"><a href="#"><img src="{{ asset('website/assets/images/icons/location-pin.svg')}}"></a></div>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="info-input mb-20px">
                                       <label>Event Date</label>
                                       <input type="date" placeholder="Choose event date from calendar or enter manually" class="form-control">
                                       <!--  <div class="map-pin icon"><a href="#"><img src="{{ asset('website/assets/images/icons/calendar.png')}}"></a></div> -->
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="info-input mb-20px">
                                       <label>Budget Range</label>
                                       <select>
                                          <option value="">Select budget range</option>
                                          <option value="">5000</option>
                                          <option value="">10000</option>
                                          <option value="">15000</option>
                                          <option value="">20000</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="info-input mb-20px">
                                       <label>Number of Invitees</label>
                                       <select>
                                          <option value="">Select number of invitees</option>
                                          <option value="0">1</option>
                                          <option value="1">2</option>
                                          <option value="2">3</option>
                                          <option value="3">4</option>
                                          <option value="3">5</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="btn-main-block text-center">
                              <div class="next btn"><a href="javascript:void(0)" class="btnNext" onclick="nexttab()">Next Step</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Tab One End -->
               <!-- Tab Two Start -->
               <div id="choose-products" class="tab-pane">
                  <div class="container">
                     <div class="row">
                        <div class="tab-content">
                           <h1>2-Choose Required Products/Categories</h1>
                           <div class="form-detail">
                              <h4 class="categories-title">Please select desired product categories from the list below:</h4>
                              <div class="row">
                                 @foreach(DB::table('categories')->where('status' , 2)->get() as $getcat)
                                 <div class="col-md-3 d-flex checkbox-input">
                                    <input name="categories[]" onclick="showcategoryname('{{ $getcat->category_name }}' , {{ $getcat->id }})" type="checkbox" id="cat{{ $getcat->id }}" value="{{$getcat->id}}">
                                    <label for="cat{{ $getcat->id }}">{{$getcat->category_name}}</label>
                                 </div>
                                 @endforeach
                              </div>
                              <br>
                              <h4 class="categories-title">Your Selected categories:</h4>
                              <div class="selected-categories">
                              </div>
                           </div>
                           <div class="btn-main-block text-center">
                              <div class="back btn"><a href="javascript:void(0)" onclick="bactab()" class="btnPrevious">Go Back</a></div>
                              <div class="next btn" ><a href="javascript:void(0)" onclick="submitform()" class="btnNext">Next Step</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               </form>
               <!-- Tab Two End -->
               <!-- Tab Three Start -->
               <div id="recommended-products" class="tab-pane @if(isset($data)) active  @endif">
                  <h1 class="text-center">3- Recommended Products Based On Selected Categories</h1>
                  <div class="shop-category-area mt-30px">
                     <div class="container">
                        <div class="row">
                           <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                              <!-- Shop Bottom Area Start -->
                              <div class="shop-bottom-area mt-35">
                                 <!-- Seller End -->
                                 <!-- Seller Start -->
                                 <!-- New Arrivals Area Start -->
                                 <div id="new-arrivals" class="deal-area pt-60px pb-30px">
                                    <div class="container">
                                        @if(isset($data))
                                        @foreach($data as $c)


                                        @php

                                        $products=App\Models\Product::leftJoin('categories','categories.id','=','products.category')
                                        ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory') 
                                        ->leftJoin('reviews','reviews.prod_id','=','products.id')
                                        ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name','rating','message')
                                        ->where('products.category','=',$c->id)
                                        ->where('products.status','=','2')
                                        ->orderBy('products.id','desc')
                                        ->limit(3)
                                        ->get();

                                        @endphp
                                        <div class="btn-main-block view-all" style="margin-bottom:16px;">
                                          <div class="btn" style="padding:10px 16px; background:#01a0bd;"><a class="text-white" href="{{ url('') }}">{{ $c->category_name }}</a></div>
                                          <div class="btn"><a href="#">View All {{ $c->category_name }}</a></div>
                                        </div>
                                        
                                       <div class="row">
                                          <div class="col-xs-12 col-sm-12">
                                            @if(count($products)!=0)
                                            <div class="arrival-products d-flex" id="filterproducts"></div>
                                            <div class="arrival-products d-flex" id="oldData">
                                                @foreach($products as $r)
                                                    @include('website.show.product')
                                                @endforeach  
                                            </div>
                                            @else
                                            <div style="margin-bottom: 10px;" class="col-md-12">
                                                <p style="text-align: center;">No products are found in {{ $c->category_name }}!!</p>
                                            </div>
                                            @endif
                                         </div>
                                       </div>
                                       @endforeach
                                       @endif
                                    </div>
                                 </div>
                                 <!-- New Arrivals Area End -->
                              </div>
                              <!-- Shop Bottom Area End -->
                           </div>
                           <!-- Sidebar Area Start -->
                           <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-md-60px mb-lm-60px">
                              <div class="shop-sidebar-wrap">
                                 <div class="sidebar-widget-group padding-30px mb-30px">
                                    <div class="accordion" id="accordionExample">
                                       <div class="card">
                                          <div class="card-header" id="headingOne">
                                             <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="collapsed">
                                                <h4 class="pro-sidebar-title">Brand</h4>
                                             </a>
                                          </div>
                                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                             <div class="card-body">
                                                <!-- Sidebar single item -->
                                                <div class="sidebar-widget mt-30">
                                                   <div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder=""> </div>
                                                   <div class="sidebar-widget-list">
                                                      <ul>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox"> <a href="#">Mango<span>(2345)</span> </a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox" value=""> <a href="#">Casio<span>(2345)</span></a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox"> <a href="#">Generic<span>(233)</span> </a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox" value=""> <a href="#">Zoot<span>(124)</span></a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox"> <a href="#">Convex<span>(445)</span> </a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox" value=""> <a href="#">Zenta<span>(124)</span></a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox"> <a href="#">Nexus<span>(524)</span> </a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox" value=""> <a href="#">Cisco<span>(432)</span></a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                   <a href="#">View All</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- card -->
                                       <div class="card">
                                          <div class="card-header" id="headingTwo">
                                             <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                <h4 class="pro-sidebar-title">Price (AED)</h4>
                                             </a>
                                          </div>
                                          <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                                             <div class="card-body">
                                                <div class="price-filters">
                                                   <label><input type="text" value=""></label>
                                                   <span>To</span>
                                                   <label><input type="text" value=""></label>
                                                   <button>GO</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- card -->
                                       <div class="card">
                                          <div class="card-header" id="headingThree">
                                             <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                <h4 class="pro-sidebar-title">Product Rating</h4>
                                             </a>
                                          </div>
                                          <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                                             <div class="card-body">
                                                <div class="rating-filter mt-10">
                                                   <a href="#">1.0 Stars or More<span>(5334)</span></a>
                                                   <input type="range" class="form-range" min="0" max="5" step="0.5" id="ratingRange3">
                                                   <div class="review-rating">
                                                      <span class="min-rating">1 Star</span>
                                                      <span class="max-rating">5 Stars</span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- card -->
                                       <div class="card">
                                          <div class="card-header" id="headingFour">
                                             <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="headingFour" class="collapsed">
                                                <h4 class="pro-sidebar-title">Seller</h4>
                                             </a>
                                          </div>
                                          <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordionExample" style="">
                                             <div class="card-body">
                                                <!-- Sidebar single item -->
                                                <div class="sidebar-widget mt-30">
                                                   <div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder=""> </div>
                                                   <div class="sidebar-widget-list">
                                                      <ul>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox"> <a href="#">Mango<span>(2345)</span> </a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox" value=""> <a href="#">Casio<span>(2345)</span></a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox"> <a href="#">Generic<span>(233)</span> </a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox" value=""> <a href="#">Zoot<span>(124)</span></a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox"> <a href="#">Convex<span>(445)</span> </a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox" value=""> <a href="#">Zenta<span>(124)</span></a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox"> <a href="#">Nexus<span>(524)</span> </a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox" value=""> <a href="#">Cisco<span>(432)</span></a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                   <a href="#">View All</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- card -->
                                       <div class="card">
                                          <div class="card-header" id="headingFive">
                                             <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="headingFive" class="collapsed">
                                                <h4 class="pro-sidebar-title">New Arrivals</h4>
                                             </a>
                                          </div>
                                          <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                                             <div class="card-body">
                                                <!-- Sidebar single item -->
                                                <div class="sidebar-widget mt-30">
                                                   <div class="sidebar-widget-list">
                                                      <ul>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox"> <a href="#">Last 24 Hours<span>(2345)</span> </a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox" value=""> <a href="#">Last 3 Days<span>(2345)</span></a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox"> <a href="#">Last 7 Days<span>(233)</span> </a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox" value=""> <a href="#">Last 30 Days<span>(124)</span></a>
                                                               <span class="checkmark"></span>
                                                            </div>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                   <a href="#">View All</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- card -->
                                       <div class="card">
                                          <div class="card-header" id="headingSix">
                                             <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                <h4 class="pro-sidebar-title">Color</h4>
                                             </a>
                                          </div>
                                          <div id="collapseSix" class="collapse show" aria-labelledby="headingSix" data-parent="#accordionExample">
                                             <div class="card-body">
                                                <div class="sidebar-widget mt-30">
                                                   <div class="sidebar-widget-list">
                                                      <ul>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox"> <a href="#">Red<span>(2)</span> </a>
                                                               <span class="checkmark red"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox" value=""> <a href="#">Green<span>(4)</span></a>
                                                               <span class="checkmark green"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox" value=""> <a href="#">Black<span>(4)</span> </a>
                                                               <span class="checkmark black"></span>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="sidebar-widget-list-left">
                                                               <input type="checkbox" value=""> <a href="#">Blue<span>(4)</span> </a>
                                                               <span class="checkmark blue"></span>
                                                            </div>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                   <a href="#">View All</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Tab Three End -->
               <!-- Tab Four Start -->
               <!-- Events Tabs Content End -->
            </div>
            <!-- Events Tabs Bottom Area End -->
         </div>
      </div>
   </div>
</div>
<!-- checkout area end -->      
@stop
@push('otherscript')
<script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPraI53LsplwhkIsXED0pMxPniz3YKYfg&libraries=places&callback=initMap">
 </script>

 <script>
     function initMap(){
         const center = { lat: 50.064192, lng: -130.605469 };
// Create a bounding box with sides ~10km away from the center point
         const defaultBounds = {
             north: center.lat + 0.1,
             south: center.lat - 0.1,
             east: center.lng + 0.1,
             west: center.lng - 0.1,
         };
         const input = document.getElementById("personal_companyadd");
         const options = {
             bounds: defaultBounds,
             componentRestrictions: { country: "ae" },
             fields: ["place_id", "geometry", "name"],
             strictBounds: false,
             types: ["establishment"],
         };
         const autocomplete = new google.maps.places.Autocomplete(input, options);

     }


 </script>
<script type="text/javascript">
   function showcategoryname(value , id)
   {
       if($('#cat' + id).is(":checked"))
       {
           $('.selected-categories').append('<a id="removename'+id+'" href="#" class="selected mx-2" id="selected">'+value+'</a>')
       }else{
           $('#removename'+id).remove();
       }
   }
function nexttab() {
    $('#choseproducts').click();
}
function bactab() {
    $('#basictab').click();   
}
function submitform() {
    $('#planeventsubmitform').submit();
}
</script>
@endpush