@extends('website.layouts.master')
@section('content')
<div class="offcanvas-overlay"></div>

<div class="shop-category-area mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-lg-last col-md-12 order-md-first">
                 <section class="product-tabs section-padding position-relative">
                    <div class="container">
                        <div class="section-title style-2 wow animate__animated animate__fadeIn">
                            <h3>Explore All Products</h3>
                        </div>
                        @if(count($products)!=0)
                        <!--End nav-tabs-->
                        <div class="row product-grid-4">
                            @foreach($products as $r)
                               @include('website.show.product')
                            @endforeach
                            <!--end product card-->
                        </div>
                        @else

                        <div class="col-md-12">
                            <p style="padding-top: 60px;border: 1px solid #009fbd; text-align: center; padding-bottom: 60px; background: #009fbd;color: #fff;">No products are found !!</p>
                        </div>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@stop