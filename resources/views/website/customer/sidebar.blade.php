<ul class="nav nav-tabs mb-6 us-nav-class" role="tablist">
    <li class="link-item border-0">

        <a  href="{{route('website.customerDashboard')}}" class="nav-link-new active">
    <!-- <img src="{{asset('products/profile.svg')}}" alt="" class="icon-head" > -->

            <i class="fa fa-home"></i>
            &nbsp; Dashboard</a>
                <img src="{{asset('public/products/nav-arrow.svg')}}" alt="" class="nav-li-arrow">

    </li>
    <li class="link-item">
        <a href="{{route('website.custProfile')}}" class="nav-link-new">
    <img src="{{asset('public/products/profile.svg')}}" alt="" class="icon-head" >

            <!-- <i class="fa fa-user"></i> --> &nbsp; Profile</a>
                <img src="{{asset('public/products/nav-arrow.svg')}}" alt="" class="nav-li-arrow">

    </li>
    <li class="link-item">
        <a href="{{route('website.cust_order')}}" class="nav-link-new">
    <img src="{{asset('public/products/orders.svg')}}" alt="" class="icon-head circle" >

            <!-- <i class="fa fa-address-card"></i> --> &nbsp; Orders</a>
                <img src="{{asset('public/products/nav-arrow.svg')}}" alt="" class="nav-li-arrow">

    </li>
    <li class="link-item">
        <a href="{{route('website.wishlist')}}" class="nav-link-new">
            <i class="fa fa-user"></i> &nbsp; Wishlist</a>
            <img src="{{asset('public/products/nav-arrow.svg')}}" alt="" class="nav-li-arrow">

    </li>
    <li class="link-item">
        <a href="{{route('website.myaddress')}}" class="nav-link-new">
                         <img src="{{asset('public/products/address.svg')}}" alt="" class="icon-head circle" >
            <!-- <i class="fa fa-user"></i> --> &nbsp; My Address</a>
                        <img src="{{asset('public/products/nav-arrow.svg')}}" alt="" class="nav-li-arrow">
    </li>
    
    <li class="link-item">
        <a href="{{route('website.submitted_proposal')}}" class="nav-link-new">
            <i class="fa fa-address-card rq" style="margin:1px;"></i> &nbsp; Request Proposal</a>
            <img src="{{asset('public/products/nav-arrow.svg')}}" alt="" class="nav-li-arrow">

    </li>
    <li class="link-item">
        <a href="{{route('website.cust_designReq')}}" class="nav-link-new">   
             <img src="{{asset('public/products/wallet.svg')}}" alt="" class="icon-head circle" >
            <!-- <i class="fa fa-user"></i> --> &nbsp; Design Request</a>            
            <img src="{{asset('public/products/nav-arrow.svg')}}" alt="" class="nav-li-arrow">
    </li>

    <li class="link-item">
        <a href="{{route('website.listReturnRequest')}}" class="nav-link-new">
    <img src="{{asset('public/products/returns.svg')}}" alt="" class="icon-head circle return" >

            <!-- <i class="fa fa-heart"></i> --> &nbsp; Return Request</a>
            <img src="{{asset('public/products/nav-arrow.svg')}}" alt="" class="nav-li-arrow">

    </li>
    <li class="link-item">
        <a class="nav-link-new" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#">
             <!-- <i class="fa fa-sign-out" aria-hidden="true"></i> -->
             <img src="{{asset('public/products/logout.svg')}}" alt="" class="icon-head circle return" style="width:38px; padding: 2px 10px 1px;"> &nbsp; Logout</a>
            <!-- <img src="{{asset('products/nav-arrow.svg')}}" alt="" class="nav-li-arrow"> -->

    </li>
     <form id="logout-form" action="" method="POST" style="display: none;">
	  {{ csrf_field() }}
	</form>
</ul>