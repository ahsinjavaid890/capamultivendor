<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <!-- Navbar Brand-->
                    <a class="navbar-brand ps-3" href="{{route('website.index')}}"><img src="{{asset('public/seller/assets/img/oben-01__logo.png')}}"></a>
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="{{route('website.customerDashboard')}}">
                            <div class="sb-nav-link-icon"><svg id="house" xmlns="http://www.w3.org/2000/svg" width="32" height="30.534" viewBox="0 0 32 30.534">
                            <path id="Path_36" data-name="Path 36" d="M31.7,24.918,16.646,11.451a.423.423,0,0,0-.086-.066.891.891,0,0,0-1.2-.02L.3,24.832a.89.89,0,0,0,1.185,1.33l2.712-2.429v15.7a2.24,2.24,0,0,0,2.238,2.238h4.752a2.1,2.1,0,0,0,2.1-2.1V31.591a.323.323,0,0,1,.323-.323h4.8a.323.323,0,0,1,.323.323v7.984a2.1,2.1,0,0,0,2.1,2.1h4.752a2.544,2.544,0,0,0,2.238-2.8V23.818l2.712,2.429a.895.895,0,0,0,1.257-.072A.906.906,0,0,0,31.7,24.918Zm-5.673,4.39v9.55c0,.638-.316,1.027-.461,1.027H20.819a.323.323,0,0,1-.323-.323v-7.97a2.1,2.1,0,0,0-2.1-2.1H13.6a2.1,2.1,0,0,0-2.1,2.1v7.984a.323.323,0,0,1-.323.323H6.425a.462.462,0,0,1-.461-.461V22.14l9.991-8.925,10.077,9.01v7.082Z" transform="translate(0 -11.141)" fill="#fff"/>
                            </svg>
                            </div>
                            Dashboard
                            </a>
                           <a class="nav-link" href="{{route('website.custProfile')}}">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="30.125" height="34" viewBox="0 0 30.125 34">
                            <g id="Group_2935" data-name="Group 2935" transform="translate(-30 1)">
                            <g id="Group_760" data-name="Group 760" transform="translate(36.625)">
                            <g id="Group_759" data-name="Group 759">
                            <path id="Path_405" data-name="Path 405" d="M129.438,0a8.438,8.438,0,1,0,8.438,8.438A8.447,8.447,0,0,0,129.438,0Z" transform="translate(-121)" fill="none" stroke="#fff" stroke-width="2"/>
                            </g>
                            </g>
                            <g id="Group_762" data-name="Group 762" transform="translate(31 18.75)">
                            <g id="Group_761" data-name="Group 761">
                            <path id="Path_406" data-name="Path 406" d="M55.56,303.637A12.028,12.028,0,0,0,46.938,300h-3.75a12.028,12.028,0,0,0-8.623,3.637A12.3,12.3,0,0,0,31,312.313a.938.938,0,0,0,.938.938h26.25a.938.938,0,0,0,.938-.937A12.3,12.3,0,0,0,55.56,303.637Z" transform="translate(-31 -300)" fill="none" stroke="#fff" stroke-width="2"/>
                            </g>
                            </g>
                            </g>
                            </svg>
                            </div>
                                Profile
                            </a>
                            
                           
                            <a class="nav-link" href="{{route('website.cust_order')}}">
                            <div class="sb-nav-link-icon"><svg id="pie-chart" xmlns="http://www.w3.org/2000/svg" width="32" height="32.007" viewBox="0 0 32 32.007">
                              <g id="Group_30" data-name="Group 30">
                                <path id="Path_56" data-name="Path 56" d="M27.711,64.477H15.241V52.007a.9.9,0,0,0-.907-.907A14.284,14.284,0,1,0,28.618,65.384.912.912,0,0,0,27.711,64.477ZM14.334,77.854a12.47,12.47,0,0,1-.907-24.906V65.384a.9.9,0,0,0,.907.907H26.77A12.482,12.482,0,0,1,14.334,77.854Z" transform="translate(-0.05 -47.661)" fill="#fff"/>
                                <path id="Path_57" data-name="Path 57" d="M265.366,14.261A14.306,14.306,0,0,0,251.059,0a.9.9,0,0,0-.909.909v13.4a.9.9,0,0,0,.909.909h13.4a.9.9,0,0,0,.909-.909Zm-13.4-.855V1.857a12.5,12.5,0,0,1,11.549,11.549H251.967Z" transform="translate(-233.366)" fill="#fff"/>
                              </g>
                            </svg>
                            </div>
                                Orders
                            </a>
                           
                            <a class="nav-link" href="{{route('website.wishlist')}}">
                            <div class="sb-nav-link-icon">
                              <i class="fa fa-heart" style="font-size:30px"></i>
                            </div>
                                Wishlist
                            </a>

                            <a class="nav-link" href="{{route('website.myaddress')}}">
                            <div class="sb-nav-link-icon">
                              <i class="fa fa-map-marker" style="font-size:30px"></i>
                            </div>
                                My Address
                            </a>

                            <a class="nav-link" href="{{route('website.submitted_proposal')}}">
                            <div class="sb-nav-link-icon">
                              <i class="fa fa-sticky-note" style="font-size:30px"></i>
                            </div>
                                my request proposal
                            </a>
                           
                            <a class="nav-link" href="{{route('website.cust_designReq')}}">
                                <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="38.195" height="38" viewBox="0 0 38.195 38">
                                  <g id="checklist" transform="translate(-105.278 -111.31)">
                                    <g id="Group_2858" data-name="Group 2858" transform="translate(105.278 111.31)">
                                      <g id="Group_2855" data-name="Group 2855" transform="translate(0 0)">
                                        <g id="Group_2848" data-name="Group 2848">
                                          <g id="Group_2844" data-name="Group 2844">
                                            <path id="Path_830" data-name="Path 830" d="M105.278,118.656v-6.118a1.227,1.227,0,0,1,1.227-1.227h6.118a1.227,1.227,0,0,1,1.227,1.227v6.118a1.227,1.227,0,0,1-1.227,1.227h-6.118A1.227,1.227,0,0,1,105.278,118.656Z" transform="translate(-105.278 -111.31)" fill="#fff"/>
                                            <path id="Path_831" data-name="Path 831" d="M105.278,242.7v-6.118a1.227,1.227,0,0,1,1.227-1.227h6.118a1.227,1.227,0,0,1,1.227,1.227V242.7a1.227,1.227,0,0,1-1.227,1.227h-6.118A1.227,1.227,0,0,1,105.278,242.7Z" transform="translate(-105.278 -222.603)" fill="#fff"/>
                                            <path id="Path_832" data-name="Path 832" d="M105.278,366.735v-6.118a1.227,1.227,0,0,1,1.227-1.227h6.118a1.227,1.227,0,0,1,1.227,1.227v6.118a1.227,1.227,0,0,1-1.227,1.227h-6.118A1.227,1.227,0,0,1,105.278,366.735Z" transform="translate(-105.278 -333.896)" fill="#fff"/>
                                          </g>
                                          <g id="Group_2845" data-name="Group 2845" transform="translate(1.797 2.095)">
                                            <path id="Path_833" data-name="Path 833" d="M124.738,136.081h0a1.108,1.108,0,0,1-.889-.454l-.927-1.273a.794.794,0,1,1,1.284-.935l.538.738,1.572-2.135a.794.794,0,1,1,1.279.941l-1.964,2.668A1.107,1.107,0,0,1,124.738,136.081Z" transform="translate(-122.767 -131.699)" fill="#f6f9f9"/>
                                          </g>
                                          <g id="Group_2846" data-name="Group 2846" transform="translate(1.797 15.119)">
                                            <path id="Path_834" data-name="Path 834" d="M124.738,262.82h0a1.107,1.107,0,0,1-.889-.454l-.927-1.273a.794.794,0,0,1,1.284-.935l.538.738,1.572-2.135a.794.794,0,1,1,1.279.941l-1.964,2.668A1.106,1.106,0,0,1,124.738,262.82Z" transform="translate(-122.767 -258.438)" fill="#f6f9f9"/>
                                          </g>
                                          <g id="Group_2847" data-name="Group 2847" transform="translate(1.797 27.589)">
                                            <path id="Path_835" data-name="Path 835" d="M124.738,384.162h0a1.107,1.107,0,0,1-.889-.454l-.927-1.273a.794.794,0,0,1,1.284-.935l.537.738,1.572-2.135a.794.794,0,1,1,1.279.941l-1.964,2.668A1.108,1.108,0,0,1,124.738,384.162Z" transform="translate(-122.767 -379.78)" fill="#f6f9f9"/>
                                          </g>
                                        </g>
                                        <g id="Group_2851" data-name="Group 2851" transform="translate(11.733 1.834)">
                                          <g id="Group_2849" data-name="Group 2849">
                                            <path id="Path_836" data-name="Path 836" d="M230.06,130.741h-9.815a.794.794,0,0,1,0-1.588h9.815a.794.794,0,0,1,0,1.588Z" transform="translate(-219.451 -129.153)" fill="#fff"/>
                                          </g>
                                          <g id="Group_2850" data-name="Group 2850" transform="translate(0 3.318)">
                                            <path id="Path_837" data-name="Path 837" d="M225.154,163.028h-4.908a.794.794,0,0,1,0-1.588h4.908a.794.794,0,0,1,0,1.588Z" transform="translate(-219.452 -161.44)" fill="#fff"/>
                                          </g>
                                        </g>
                                        <g id="Group_2854" data-name="Group 2854" transform="translate(11.733 14.58)">
                                          <g id="Group_2852" data-name="Group 2852" transform="translate(0)">
                                            <path id="Path_838" data-name="Path 838" d="M226.832,254.781h-6.586a.794.794,0,0,1,0-1.588h6.586a.794.794,0,0,1,0,1.588Z" transform="translate(-219.452 -253.193)" fill="#fff"/>
                                          </g>
                                          <g id="Group_2853" data-name="Group 2853" transform="translate(0 3.318)">
                                            <path id="Path_839" data-name="Path 839" d="M225.154,287.068h-4.908a.794.794,0,1,1,0-1.588h4.908a.794.794,0,0,1,0,1.588Z" transform="translate(-219.452 -285.48)" fill="#fff"/>
                                          </g>
                                        </g>
                                      </g>
                                      <g id="Group_2857" data-name="Group 2857" transform="translate(13.267 0.898)">
                                        <g id="Group_2856" data-name="Group 2856" transform="translate(1.304)">
                                          <path id="Path_840" data-name="Path 840" d="M267.6,175.081l-.78-1.027-2.917-1.847-1.121-.177-14.936,23.6a6.147,6.147,0,0,0-.783,1.848,4.811,4.811,0,0,1,4.264,2.7,6.147,6.147,0,0,0,1.336-1.5Z" transform="translate(-247.067 -166.688)" fill="#fff"/>
                                          <path id="Path_841" data-name="Path 841" d="M420.967,121.169l-1.26-.8a2.105,2.105,0,0,0-2.905.653l-1.156,1.826.369.743,3.507,2.221.942.087,1.156-1.828A2.105,2.105,0,0,0,420.967,121.169Z" transform="translate(-398.321 -120.044)" fill="#fff"/>
                                        </g>
                                        <path id="Path_842" data-name="Path 842" d="M0,0H3V5.7H0Z" transform="matrix(0.535, -0.845, 0.845, 0.535, 17.024, 5.336)" fill="#fff"/>
                                        <path id="Path_843" data-name="Path 843" d="M239.946,422.391l-4.253,3.427A.807.807,0,0,1,234.4,425l1.28-5.31a4.811,4.811,0,0,1,4.264,2.7Z" transform="translate(-234.378 -388.898)" fill="#fff"/>
                                        <path id="Path_844" data-name="Path 844" d="M265.993,208.358l15.657-24.725-1.342-.85-15.657,24.725A4.813,4.813,0,0,1,265.993,208.358Z" transform="translate(-261.54 -176.337)" fill="#fff"/>
                                      </g>
                                    </g>
                                  </g>
                                </svg>
                                </div>Design Requests
                            </a>

                            <a class="nav-link" href="{{route('website.listReturnRequest')}}">
                                <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="38.195" height="38" viewBox="0 0 38.195 38">
                                  <g id="checklist" transform="translate(-105.278 -111.31)">
                                    <g id="Group_2858" data-name="Group 2858" transform="translate(105.278 111.31)">
                                      <g id="Group_2855" data-name="Group 2855" transform="translate(0 0)">
                                        <g id="Group_2848" data-name="Group 2848">
                                          <g id="Group_2844" data-name="Group 2844">
                                            <path id="Path_830" data-name="Path 830" d="M105.278,118.656v-6.118a1.227,1.227,0,0,1,1.227-1.227h6.118a1.227,1.227,0,0,1,1.227,1.227v6.118a1.227,1.227,0,0,1-1.227,1.227h-6.118A1.227,1.227,0,0,1,105.278,118.656Z" transform="translate(-105.278 -111.31)" fill="#fff"/>
                                            <path id="Path_831" data-name="Path 831" d="M105.278,242.7v-6.118a1.227,1.227,0,0,1,1.227-1.227h6.118a1.227,1.227,0,0,1,1.227,1.227V242.7a1.227,1.227,0,0,1-1.227,1.227h-6.118A1.227,1.227,0,0,1,105.278,242.7Z" transform="translate(-105.278 -222.603)" fill="#fff"/>
                                            <path id="Path_832" data-name="Path 832" d="M105.278,366.735v-6.118a1.227,1.227,0,0,1,1.227-1.227h6.118a1.227,1.227,0,0,1,1.227,1.227v6.118a1.227,1.227,0,0,1-1.227,1.227h-6.118A1.227,1.227,0,0,1,105.278,366.735Z" transform="translate(-105.278 -333.896)" fill="#fff"/>
                                          </g>
                                          <g id="Group_2845" data-name="Group 2845" transform="translate(1.797 2.095)">
                                            <path id="Path_833" data-name="Path 833" d="M124.738,136.081h0a1.108,1.108,0,0,1-.889-.454l-.927-1.273a.794.794,0,1,1,1.284-.935l.538.738,1.572-2.135a.794.794,0,1,1,1.279.941l-1.964,2.668A1.107,1.107,0,0,1,124.738,136.081Z" transform="translate(-122.767 -131.699)" fill="#f6f9f9"/>
                                          </g>
                                          <g id="Group_2846" data-name="Group 2846" transform="translate(1.797 15.119)">
                                            <path id="Path_834" data-name="Path 834" d="M124.738,262.82h0a1.107,1.107,0,0,1-.889-.454l-.927-1.273a.794.794,0,0,1,1.284-.935l.538.738,1.572-2.135a.794.794,0,1,1,1.279.941l-1.964,2.668A1.106,1.106,0,0,1,124.738,262.82Z" transform="translate(-122.767 -258.438)" fill="#f6f9f9"/>
                                          </g>
                                          <g id="Group_2847" data-name="Group 2847" transform="translate(1.797 27.589)">
                                            <path id="Path_835" data-name="Path 835" d="M124.738,384.162h0a1.107,1.107,0,0,1-.889-.454l-.927-1.273a.794.794,0,0,1,1.284-.935l.537.738,1.572-2.135a.794.794,0,1,1,1.279.941l-1.964,2.668A1.108,1.108,0,0,1,124.738,384.162Z" transform="translate(-122.767 -379.78)" fill="#f6f9f9"/>
                                          </g>
                                        </g>
                                        <g id="Group_2851" data-name="Group 2851" transform="translate(11.733 1.834)">
                                          <g id="Group_2849" data-name="Group 2849">
                                            <path id="Path_836" data-name="Path 836" d="M230.06,130.741h-9.815a.794.794,0,0,1,0-1.588h9.815a.794.794,0,0,1,0,1.588Z" transform="translate(-219.451 -129.153)" fill="#fff"/>
                                          </g>
                                          <g id="Group_2850" data-name="Group 2850" transform="translate(0 3.318)">
                                            <path id="Path_837" data-name="Path 837" d="M225.154,163.028h-4.908a.794.794,0,0,1,0-1.588h4.908a.794.794,0,0,1,0,1.588Z" transform="translate(-219.452 -161.44)" fill="#fff"/>
                                          </g>
                                        </g>
                                        <g id="Group_2854" data-name="Group 2854" transform="translate(11.733 14.58)">
                                          <g id="Group_2852" data-name="Group 2852" transform="translate(0)">
                                            <path id="Path_838" data-name="Path 838" d="M226.832,254.781h-6.586a.794.794,0,0,1,0-1.588h6.586a.794.794,0,0,1,0,1.588Z" transform="translate(-219.452 -253.193)" fill="#fff"/>
                                          </g>
                                          <g id="Group_2853" data-name="Group 2853" transform="translate(0 3.318)">
                                            <path id="Path_839" data-name="Path 839" d="M225.154,287.068h-4.908a.794.794,0,1,1,0-1.588h4.908a.794.794,0,0,1,0,1.588Z" transform="translate(-219.452 -285.48)" fill="#fff"/>
                                          </g>
                                        </g>
                                      </g>
                                      <g id="Group_2857" data-name="Group 2857" transform="translate(13.267 0.898)">
                                        <g id="Group_2856" data-name="Group 2856" transform="translate(1.304)">
                                          <path id="Path_840" data-name="Path 840" d="M267.6,175.081l-.78-1.027-2.917-1.847-1.121-.177-14.936,23.6a6.147,6.147,0,0,0-.783,1.848,4.811,4.811,0,0,1,4.264,2.7,6.147,6.147,0,0,0,1.336-1.5Z" transform="translate(-247.067 -166.688)" fill="#fff"/>
                                          <path id="Path_841" data-name="Path 841" d="M420.967,121.169l-1.26-.8a2.105,2.105,0,0,0-2.905.653l-1.156,1.826.369.743,3.507,2.221.942.087,1.156-1.828A2.105,2.105,0,0,0,420.967,121.169Z" transform="translate(-398.321 -120.044)" fill="#fff"/>
                                        </g>
                                        <path id="Path_842" data-name="Path 842" d="M0,0H3V5.7H0Z" transform="matrix(0.535, -0.845, 0.845, 0.535, 17.024, 5.336)" fill="#fff"/>
                                        <path id="Path_843" data-name="Path 843" d="M239.946,422.391l-4.253,3.427A.807.807,0,0,1,234.4,425l1.28-5.31a4.811,4.811,0,0,1,4.264,2.7Z" transform="translate(-234.378 -388.898)" fill="#fff"/>
                                        <path id="Path_844" data-name="Path 844" d="M265.993,208.358l15.657-24.725-1.342-.85-15.657,24.725A4.813,4.813,0,0,1,265.993,208.358Z" transform="translate(-261.54 -176.337)" fill="#fff"/>
                                      </g>
                                    </g>
                                  </g>
                                </svg>
                                </div>Return Requests
                            </a>
                          
                           
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <nav class="sb-topnav navbar navbar-expand navbar-dark">
            
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <div class="complete-your-profile"><a href="{{route('website.index')}}">Continue Shopping</a></div>  
            <!-- Navbar Search-->
            <form class="top-search-bar d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control rounded-pill" type="text" placeholder="Search" aria-label="Search" aria-describedby="btnNavbarSearch" />
                </div>
            </form>
            <!-- Navbar-->