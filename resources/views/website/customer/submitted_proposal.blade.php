@extends('website.layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/website/assets/css/customerdashboard.css') }}">
<main class="main bg-grey min-height-600">
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg us-nav-cover-cls">
                @include('website.customer.sidebar')
                <div class="tab-content mb-6 bg-white p-4 us-md-cls">
                        <div class="tab-body-head">
                        <div class="">
                            <h2 class="">
                                Proposal Requests
                            </h2>
                        </div>
                    </div>
                    <div class="tab-pane active in" id="account-dashboard">                                
                       <table style=" border-color: ; " class="table table-bordered table-hover">
                                    <thead style=" background-color: #fbfbfb !important " class="">
                                <tr>
                                    <th>Request title</th>
                                    <th>Vendor Name</th>
                                    <th>Product cost</th>
                                    <th>Timeline</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($proposals as $proposal)
                                <tr>
                                    <td>{{$proposal->product_name}}</td>
                                    <td>{{$proposal->company_name}}</td>
                                    <td>{{$proposal->product_cost}}</td>
                                    <td>{{$proposal->product_timeline}}</td>
                                    <td>{{$proposal->message}}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</main>

@stop
@push('otherscript')


@endpush

