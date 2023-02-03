@extends('seller.layouts.master')
@section('content')
<main>
    <div class="container-fluid px-4">
         <h1 class="mt-4 text-center main-title">Submitted Proposal</h1> 
         <table class="table table-bordered">
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
</main>


@stop
@push('otherscript')


@endpush