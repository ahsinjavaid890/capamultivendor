<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{route('seller.home')}}"><img src="{{asset('seller/assets/img/oben-01__logo.png')}}"></a>
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="{{route('seller.home')}}">
                        <i class="fa fa-dashboard"></i>  
                        Dashboard
                    </a>
                    <a class="nav-link" href="{{route('seller.storesettings')}}">
                        <i class="fa fa-cog"></i>  
                        Store Settings
                    </a>
                    <a class="nav-link" href="{{route('seller.profilemgt')}}">
                        <i class="fa fa-user"></i>  
                        Profile Management
                    </a>
                    @if(Auth::guard('seller')->user()->isMembership==2 && Auth::guard('seller')->user()->status==2)
                        <a class="nav-link" href="{{route('seller.allproducts')}}">
                            <i class="fa fa-product-hunt"></i>  
                            All Products
                        </a>
                        <a class="nav-link" href="{{route('seller.product')}}">
                            <i class="fa fa-shopping-cart"></i>  
                            Add Products/Services
                        </a>
                        <a class="nav-link" href="{{route('seller.orders')}}">
                            <i class="fa fa-first-order"></i>  
                            Orders
                        </a>
                        <a class="nav-link" href="{{route('seller.memberPayment')}}">
                            <i class="fa fa-credit-card"></i>  
                            Payments
                        </a>
                        <a class="nav-link" href="{{route('seller.description')}}">
                            <i class="fa fa-info-circle"></i>  
                            Add Description
                        </a>
                        <a class="nav-link" href="{{route('seller.submitted_proposal')}}">
                            <i class="fa fa-sticky-note-o"></i>  
                            Submitted Proposal
                        </a>
                        <a class="nav-link" href="{{route('seller.designRequest')}}">
                            <i class="fa fa-bars"></i>
                            Design Requests
                        </a>
                    @endif
                    <a class="nav-link" href="javascript:void(0)">
                        <i class="fa fa-comments-o"></i>
                        Messages
                    </a>
                </div>
            </div>
           
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <nav class="sb-topnav navbar navbar-expand navbar-dark">
    
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="top-search-bar d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control rounded-pill" type="text" placeholder="Search" aria-label="Search" aria-describedby="btnNavbarSearch" />
        </div>
    </form>
    <!-- Navbar-->

@push('otherscript')
<script>
$(function(){
$.ajax({
  url:"{{route('seller.customNotification')}}",
  type:"POST",
  data:'',
  cache:false,
  contentType:false,
  processData:false,
  success:function(res){
    js_data = JSON.parse(JSON.stringify(res));
    if(js_data.status==200){
        $("#notifyed").text(js_data.msg);
        $("#ordernotifyed").text(js_data.orders);
        $("#requestsnotifued").text(js_data.requests);
    }
    
  }
})
})
</script>
@endpush