@extends('sellerupdated.layouts.main-layout')
@section('title','All submited Proposal')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            All Submited Proposal
                            <div class="text-muted pt-2 font-size-sm">Manage All Submited Proposal</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-separate table-head-custom table-checkable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Request title</th>
                                <th>Customer name</th>
                                <th>Product cost</th>
                                <th>Timeline</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($proposals as $proposal)
                        <tr>
                            <td>{{$proposal->product_name}}</td>
                            <td>{{$proposal->fname}} {{$proposal->lname}}</td>
                            <td>{{$proposal->product_cost}}</td>
                            <td>{{$proposal->product_timeline}}</td>
                            <td>{{$proposal->message}}</td>
                        </tr>
                        @endforeach                               
                    </tbody>
                    </table>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection