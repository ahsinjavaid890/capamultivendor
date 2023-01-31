<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <!-- Navbar Brand-->
                    <a class="navbar-brand ps-3" href="{{route('admin.home')}}"><img src="{{asset('seller/assets/img/oben-01__logo.png')}}"></a>
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="{{route('admin.home')}}">
                            <div class="sb-nav-link-icon"><svg id="house" xmlns="http://www.w3.org/2000/svg" width="32" height="30.534" viewBox="0 0 32 30.534">
                            <path id="Path_36" data-name="Path 36" d="M31.7,24.918,16.646,11.451a.423.423,0,0,0-.086-.066.891.891,0,0,0-1.2-.02L.3,24.832a.89.89,0,0,0,1.185,1.33l2.712-2.429v15.7a2.24,2.24,0,0,0,2.238,2.238h4.752a2.1,2.1,0,0,0,2.1-2.1V31.591a.323.323,0,0,1,.323-.323h4.8a.323.323,0,0,1,.323.323v7.984a2.1,2.1,0,0,0,2.1,2.1h4.752a2.544,2.544,0,0,0,2.238-2.8V23.818l2.712,2.429a.895.895,0,0,0,1.257-.072A.906.906,0,0,0,31.7,24.918Zm-5.673,4.39v9.55c0,.638-.316,1.027-.461,1.027H20.819a.323.323,0,0,1-.323-.323v-7.97a2.1,2.1,0,0,0-2.1-2.1H13.6a2.1,2.1,0,0,0-2.1,2.1v7.984a.323.323,0,0,1-.323.323H6.425a.462.462,0,0,1-.461-.461V22.14l9.991-8.925,10.077,9.01v7.082Z" transform="translate(0 -11.141)" fill="#fff"/>
                            </svg>
                            </div>
                            Dashboard
                            </a>

                            <a class="nav-link" href="{{route('admin.customers')}}">
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
                                Customers
                            </a>

                            <a class="nav-link" href="{{route('admin.sellers')}}">
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
                                Vendors <span class="badge border border-light rounded-circle bg-warning p-1" >{{ DB::table('sellers')->where('status' , 1)->count() }}</span>
                            </a>

                           <a class="nav-link" href="javascript:void(0)">
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
                                Profile Management
                            </a>
                            <a class="nav-link" href="{{route('admin.product')}}">
                                <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
								<g id="shopping-cart_2_" data-name="shopping-cart (2)" transform="translate(0)">
								<path id="Path_411" data-name="Path 411" d="M33,26.673c-27.6,0-26.373.005-26.375-.009a18.667,18.667,0,0,1-.271-2.271c13.246-.069-18.427,0,24.442,0a3.071,3.071,0,0,0,3.133-3.148V7.753a2.38,2.38,0,0,0-2.372-2.377l-8.246-.014V3.254A2.127,2.127,0,0,0,21.19,1.129H19.2a2.127,2.127,0,0,0-2.124,2.124v2.1L8.229,5.336,7.566,1.684A2.049,2.049,0,0,0,5.549,0H1A1,1,0,0,0,1,1.992c4.821,0,4.6-.026,4.61.048C6.687,7.992,6,3.832,8.9,22.388L6.349,22.4a2,2,0,0,0-1.98,2.251l.282,2.259a2.006,2.006,0,0,0,1.987,1.754H8.407a3.662,3.662,0,1,0,6.517,0h9.487a3.662,3.662,0,1,0,6.517,0H33a1,1,0,1,0,0-1.992ZM19.068,3.253a.132.132,0,0,1,.132-.132h1.99a.133.133,0,0,1,.133.133v7.371a1,1,0,0,0,1,1H23.8l-3.1,3.106a.7.7,0,0,1-1,0l-3.1-3.106h1.479a1,1,0,0,0,1-1V3.253Zm-1.992,4.09V9.629H15.413A1.5,1.5,0,0,0,14.349,12.2l3.938,3.941a2.7,2.7,0,0,0,3.815,0L26.041,12.2a1.5,1.5,0,0,0-1.063-2.566H23.315V7.354l8.243.014a.385.385,0,0,1,.384.384v13.5A1.087,1.087,0,0,1,30.8,22.405H10.918L8.562,7.329ZM13.337,30.337a1.671,1.671,0,1,1-1.671-1.671,1.673,1.673,0,0,1,1.671,1.671Zm16,0a1.671,1.671,0,1,1-1.671-1.671A1.673,1.673,0,0,1,29.34,30.337Z" fill="#fff"/>
								</g>
								</svg>
								</div>
                                Add Products
                            </a>



                            <a class="nav-link" href="{{route('admin.services')}}">
                                <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
								<g id="shopping-cart_2_" data-name="shopping-cart (2)" transform="translate(0)">
								<path id="Path_411" data-name="Path 411" d="M33,26.673c-27.6,0-26.373.005-26.375-.009a18.667,18.667,0,0,1-.271-2.271c13.246-.069-18.427,0,24.442,0a3.071,3.071,0,0,0,3.133-3.148V7.753a2.38,2.38,0,0,0-2.372-2.377l-8.246-.014V3.254A2.127,2.127,0,0,0,21.19,1.129H19.2a2.127,2.127,0,0,0-2.124,2.124v2.1L8.229,5.336,7.566,1.684A2.049,2.049,0,0,0,5.549,0H1A1,1,0,0,0,1,1.992c4.821,0,4.6-.026,4.61.048C6.687,7.992,6,3.832,8.9,22.388L6.349,22.4a2,2,0,0,0-1.98,2.251l.282,2.259a2.006,2.006,0,0,0,1.987,1.754H8.407a3.662,3.662,0,1,0,6.517,0h9.487a3.662,3.662,0,1,0,6.517,0H33a1,1,0,1,0,0-1.992ZM19.068,3.253a.132.132,0,0,1,.132-.132h1.99a.133.133,0,0,1,.133.133v7.371a1,1,0,0,0,1,1H23.8l-3.1,3.106a.7.7,0,0,1-1,0l-3.1-3.106h1.479a1,1,0,0,0,1-1V3.253Zm-1.992,4.09V9.629H15.413A1.5,1.5,0,0,0,14.349,12.2l3.938,3.941a2.7,2.7,0,0,0,3.815,0L26.041,12.2a1.5,1.5,0,0,0-1.063-2.566H23.315V7.354l8.243.014a.385.385,0,0,1,.384.384v13.5A1.087,1.087,0,0,1,30.8,22.405H10.918L8.562,7.329ZM13.337,30.337a1.671,1.671,0,1,1-1.671-1.671,1.673,1.673,0,0,1,1.671,1.671Zm16,0a1.671,1.671,0,1,1-1.671-1.671A1.673,1.673,0,0,1,29.34,30.337Z" fill="#fff"/>
								</g>
								</svg>
								</div>
                                Services
                            </a>



                            <a class="nav-link" href="{{route('admin.membership')}}">
                                <div class="sb-nav-link-icon"><svg id="Group_770" data-name="Group 770" xmlns="http://www.w3.org/2000/svg" width="45.026" height="30" viewBox="0 0 45.026 30">
								<g id="Group_769" data-name="Group 769" transform="translate(0 0)">
								<path id="Path_410" data-name="Path 410" d="M73.783,3.185H68.232a.934.934,0,0,0-.934.934v.806H64.7a.934.934,0,0,0-.934.934v.269A6.619,6.619,0,0,1,60.352,4.9a56.489,56.489,0,0,0-5.609-2.864L54.7,2.022a7.942,7.942,0,0,0-6.1.1L44.85,3.463,41.684.3a.934.934,0,0,0-1.32,0l-10.4,10.4a.926.926,0,0,0,0,1.32L47.732,29.777a1.009,1.009,0,0,0,1.32,0l9.491-9.491c.247.021.5.033.768.033a7.465,7.465,0,0,0,5.831-3.5h8.641a.934.934,0,0,0,.934-.934V4.118A.934.934,0,0,0,73.783,3.185ZM41.023,2.277,43.151,4.4a4.07,4.07,0,0,1-4.255,0Zm-6.948,11.2-2.128-2.128,2.128-2.128a4.07,4.07,0,0,1,0,4.256ZM48.392,27.8l-2.127-2.127a4.065,4.065,0,0,1,4.255,0Zm3.472-3.472a5.932,5.932,0,0,0-6.945,0l-9.5-9.5a5.933,5.933,0,0,0,0-6.945l2.13-2.13a5.933,5.933,0,0,0,6.945,0l2.019,2.019A3.7,3.7,0,0,0,43.737,9.8a5.321,5.321,0,1,0,6.118,6.587l3.152,1.07A5.96,5.96,0,0,0,54,22.192Zm-5.676-9.178.025.009,1.867.634a3.454,3.454,0,1,1-4.689-3.946A4.133,4.133,0,0,0,46.188,15.146Zm9.153,5.7a4.083,4.083,0,0,1-.6-1.941,7.259,7.259,0,0,0,1.646.891Zm8.421-5.331c-.885,1.451-2.6,2.935-4.451,2.935a6.8,6.8,0,0,1-.974-.069h0a5.347,5.347,0,0,1-3.458-1.892c-.019-.028-.1-.134-.112-.152a.93.93,0,0,0-.514-.428l-7.422-2.519a2.1,2.1,0,0,1-1.524-2.47v0a1.819,1.819,0,0,1,2.234-1.252l8.364,2.65a.934.934,0,0,0,.564-1.78L49.814,8.427l-.058-.058,0,0L46.31,4.923l2.96-1.06.032-.012.01,0,.038-.016A6.05,6.05,0,0,1,54,3.752a54.076,54.076,0,0,1,5.42,2.769A8.4,8.4,0,0,0,63.762,8Zm3.537-.562H65.629V6.792H67.3Zm5.551,0H69.166v-9.9h3.683Z" transform="translate(-29.691 -0.023)" fill="#fff"/>
								</g>
								</svg>
								</div>
                                Membership
                            </a>

                            <a class="nav-link" href="{{route('admin.orders')}}">
                            <div class="sb-nav-link-icon"><svg id="pie-chart" xmlns="http://www.w3.org/2000/svg" width="32" height="32.007" viewBox="0 0 32 32.007">
                              <g id="Group_30" data-name="Group 30">
                                <path id="Path_56" data-name="Path 56" d="M27.711,64.477H15.241V52.007a.9.9,0,0,0-.907-.907A14.284,14.284,0,1,0,28.618,65.384.912.912,0,0,0,27.711,64.477ZM14.334,77.854a12.47,12.47,0,0,1-.907-24.906V65.384a.9.9,0,0,0,.907.907H26.77A12.482,12.482,0,0,1,14.334,77.854Z" transform="translate(-0.05 -47.661)" fill="#fff"/>
                                <path id="Path_57" data-name="Path 57" d="M265.366,14.261A14.306,14.306,0,0,0,251.059,0a.9.9,0,0,0-.909.909v13.4a.9.9,0,0,0,.909.909h13.4a.9.9,0,0,0,.909-.909Zm-13.4-.855V1.857a12.5,12.5,0,0,1,11.549,11.549H251.967Z" transform="translate(-233.366)" fill="#fff"/>
                              </g>
                            </svg>
                            </div>
                                Orders <span class="badge border border-light rounded-circle bg-warning p-1" id="ordernotifyed">0</span>
                            </a>

                            <a class="nav-link" href="{{route('admin.guestorders')}}">
                            <div class="sb-nav-link-icon"><svg id="pie-chart" xmlns="http://www.w3.org/2000/svg" width="32" height="32.007" viewBox="0 0 32 32.007">
                              <g id="Group_30" data-name="Group 30">
                                <path id="Path_56" data-name="Path 56" d="M27.711,64.477H15.241V52.007a.9.9,0,0,0-.907-.907A14.284,14.284,0,1,0,28.618,65.384.912.912,0,0,0,27.711,64.477ZM14.334,77.854a12.47,12.47,0,0,1-.907-24.906V65.384a.9.9,0,0,0,.907.907H26.77A12.482,12.482,0,0,1,14.334,77.854Z" transform="translate(-0.05 -47.661)" fill="#fff"/>
                                <path id="Path_57" data-name="Path 57" d="M265.366,14.261A14.306,14.306,0,0,0,251.059,0a.9.9,0,0,0-.909.909v13.4a.9.9,0,0,0,.909.909h13.4a.9.9,0,0,0,.909-.909Zm-13.4-.855V1.857a12.5,12.5,0,0,1,11.549,11.549H251.967Z" transform="translate(-233.366)" fill="#fff"/>
                              </g>
                            </svg>
                            </div>
                                Guest Orders 
                            </a>

                            <a class="nav-link" href="{{route('admin.memberPayment')}}">
                                <div class="sb-nav-link-icon"><svg id="Group_770" data-name="Group 770" xmlns="http://www.w3.org/2000/svg" width="45.026" height="30" viewBox="0 0 45.026 30">
								<g id="Group_769" data-name="Group 769" transform="translate(0 0)">
								<path id="Path_410" data-name="Path 410" d="M73.783,3.185H68.232a.934.934,0,0,0-.934.934v.806H64.7a.934.934,0,0,0-.934.934v.269A6.619,6.619,0,0,1,60.352,4.9a56.489,56.489,0,0,0-5.609-2.864L54.7,2.022a7.942,7.942,0,0,0-6.1.1L44.85,3.463,41.684.3a.934.934,0,0,0-1.32,0l-10.4,10.4a.926.926,0,0,0,0,1.32L47.732,29.777a1.009,1.009,0,0,0,1.32,0l9.491-9.491c.247.021.5.033.768.033a7.465,7.465,0,0,0,5.831-3.5h8.641a.934.934,0,0,0,.934-.934V4.118A.934.934,0,0,0,73.783,3.185ZM41.023,2.277,43.151,4.4a4.07,4.07,0,0,1-4.255,0Zm-6.948,11.2-2.128-2.128,2.128-2.128a4.07,4.07,0,0,1,0,4.256ZM48.392,27.8l-2.127-2.127a4.065,4.065,0,0,1,4.255,0Zm3.472-3.472a5.932,5.932,0,0,0-6.945,0l-9.5-9.5a5.933,5.933,0,0,0,0-6.945l2.13-2.13a5.933,5.933,0,0,0,6.945,0l2.019,2.019A3.7,3.7,0,0,0,43.737,9.8a5.321,5.321,0,1,0,6.118,6.587l3.152,1.07A5.96,5.96,0,0,0,54,22.192Zm-5.676-9.178.025.009,1.867.634a3.454,3.454,0,1,1-4.689-3.946A4.133,4.133,0,0,0,46.188,15.146Zm9.153,5.7a4.083,4.083,0,0,1-.6-1.941,7.259,7.259,0,0,0,1.646.891Zm8.421-5.331c-.885,1.451-2.6,2.935-4.451,2.935a6.8,6.8,0,0,1-.974-.069h0a5.347,5.347,0,0,1-3.458-1.892c-.019-.028-.1-.134-.112-.152a.93.93,0,0,0-.514-.428l-7.422-2.519a2.1,2.1,0,0,1-1.524-2.47v0a1.819,1.819,0,0,1,2.234-1.252l8.364,2.65a.934.934,0,0,0,.564-1.78L49.814,8.427l-.058-.058,0,0L46.31,4.923l2.96-1.06.032-.012.01,0,.038-.016A6.05,6.05,0,0,1,54,3.752a54.076,54.076,0,0,1,5.42,2.769A8.4,8.4,0,0,0,63.762,8Zm3.537-.562H65.629V6.792H67.3Zm5.551,0H69.166v-9.9h3.683Z" transform="translate(-29.691 -0.023)" fill="#fff"/>
								</g>
								</svg>
								</div>
                                Payments
                            </a>
                            <a class="nav-link" href="{{route('admin.coupons')}}">
                                <div class="sb-nav-link-icon"><svg id="Group_770" data-name="Group 770" xmlns="http://www.w3.org/2000/svg" width="45.026" height="30" viewBox="0 0 45.026 30">
								<g id="Group_769" data-name="Group 769" transform="translate(0 0)">
								<path id="Path_410" data-name="Path 410" d="M73.783,3.185H68.232a.934.934,0,0,0-.934.934v.806H64.7a.934.934,0,0,0-.934.934v.269A6.619,6.619,0,0,1,60.352,4.9a56.489,56.489,0,0,0-5.609-2.864L54.7,2.022a7.942,7.942,0,0,0-6.1.1L44.85,3.463,41.684.3a.934.934,0,0,0-1.32,0l-10.4,10.4a.926.926,0,0,0,0,1.32L47.732,29.777a1.009,1.009,0,0,0,1.32,0l9.491-9.491c.247.021.5.033.768.033a7.465,7.465,0,0,0,5.831-3.5h8.641a.934.934,0,0,0,.934-.934V4.118A.934.934,0,0,0,73.783,3.185ZM41.023,2.277,43.151,4.4a4.07,4.07,0,0,1-4.255,0Zm-6.948,11.2-2.128-2.128,2.128-2.128a4.07,4.07,0,0,1,0,4.256ZM48.392,27.8l-2.127-2.127a4.065,4.065,0,0,1,4.255,0Zm3.472-3.472a5.932,5.932,0,0,0-6.945,0l-9.5-9.5a5.933,5.933,0,0,0,0-6.945l2.13-2.13a5.933,5.933,0,0,0,6.945,0l2.019,2.019A3.7,3.7,0,0,0,43.737,9.8a5.321,5.321,0,1,0,6.118,6.587l3.152,1.07A5.96,5.96,0,0,0,54,22.192Zm-5.676-9.178.025.009,1.867.634a3.454,3.454,0,1,1-4.689-3.946A4.133,4.133,0,0,0,46.188,15.146Zm9.153,5.7a4.083,4.083,0,0,1-.6-1.941,7.259,7.259,0,0,0,1.646.891Zm8.421-5.331c-.885,1.451-2.6,2.935-4.451,2.935a6.8,6.8,0,0,1-.974-.069h0a5.347,5.347,0,0,1-3.458-1.892c-.019-.028-.1-.134-.112-.152a.93.93,0,0,0-.514-.428l-7.422-2.519a2.1,2.1,0,0,1-1.524-2.47v0a1.819,1.819,0,0,1,2.234-1.252l8.364,2.65a.934.934,0,0,0,.564-1.78L49.814,8.427l-.058-.058,0,0L46.31,4.923l2.96-1.06.032-.012.01,0,.038-.016A6.05,6.05,0,0,1,54,3.752a54.076,54.076,0,0,1,5.42,2.769A8.4,8.4,0,0,0,63.762,8Zm3.537-.562H65.629V6.792H67.3Zm5.551,0H69.166v-9.9h3.683Z" transform="translate(-29.691 -0.023)" fill="#fff"/>
								</g>
								</svg>
								</div>
                          Coupon
                            </a>
                            <a class="nav-link" href="{{ route('admin.settings') }}">
                                <div class="sb-nav-link-icon"><svg id="settings" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
								<g id="Group_35" data-name="Group 35">
								<path id="Path_70" data-name="Path 70" d="M30.362,12.642l-2.246-.381a12.683,12.683,0,0,0-.9-2.179L28.537,8.23a1.971,1.971,0,0,0-.214-2.547L26.331,3.691a1.962,1.962,0,0,0-1.4-.582,1.942,1.942,0,0,0-1.143.368L21.933,4.8a12.551,12.551,0,0,0-2.259-.929L19.3,1.652A1.975,1.975,0,0,0,17.347,0H14.533a1.975,1.975,0,0,0-1.952,1.651l-.388,2.273a12.37,12.37,0,0,0-2.173.916L8.182,3.517a1.974,1.974,0,0,0-2.547.214l-2,1.992A1.979,1.979,0,0,0,3.423,8.27L4.76,10.148a12.388,12.388,0,0,0-.889,2.186l-2.219.374A1.975,1.975,0,0,0,0,14.661v2.814a1.975,1.975,0,0,0,1.651,1.952l2.273.388a12.37,12.37,0,0,0,.916,2.173L3.523,23.819a1.971,1.971,0,0,0,.214,2.547l1.992,1.992a1.962,1.962,0,0,0,1.4.582,1.942,1.942,0,0,0,1.143-.368l1.878-1.337a12.646,12.646,0,0,0,2.112.869l.374,2.246A1.975,1.975,0,0,0,14.586,32h2.821a1.975,1.975,0,0,0,1.952-1.651L19.74,28.1a12.682,12.682,0,0,0,2.179-.9l1.852,1.324a1.962,1.962,0,0,0,1.15.368h0a1.962,1.962,0,0,0,1.4-.582l1.992-1.992a1.979,1.979,0,0,0,.214-2.547L27.2,21.914a12.592,12.592,0,0,0,.9-2.179l2.246-.374A1.975,1.975,0,0,0,32,17.408V14.594A1.951,1.951,0,0,0,30.362,12.642Zm-.154,4.766a.173.173,0,0,1-.147.174l-2.808.468a.9.9,0,0,0-.722.662,10.7,10.7,0,0,1-1.163,2.8.9.9,0,0,0,.04.983l1.651,2.326a.182.182,0,0,1-.02.227l-1.992,1.992a.17.17,0,0,1-.127.053.164.164,0,0,1-.1-.033L22.5,25.41a.9.9,0,0,0-.983-.04,10.7,10.7,0,0,1-2.8,1.163.887.887,0,0,0-.662.722l-.475,2.808a.173.173,0,0,1-.174.147H14.593a.173.173,0,0,1-.174-.147l-.468-2.808a.9.9,0,0,0-.662-.722,11.112,11.112,0,0,1-2.741-1.123.925.925,0,0,0-.455-.12.88.88,0,0,0-.521.167l-2.34,1.664a.2.2,0,0,1-.1.033.179.179,0,0,1-.127-.053L5.014,25.109a.181.181,0,0,1-.02-.227l1.644-2.306a.915.915,0,0,0,.04-.989A10.6,10.6,0,0,1,5.5,18.792a.915.915,0,0,0-.722-.662l-2.828-.481a.173.173,0,0,1-.147-.174V14.661a.173.173,0,0,1,.147-.174l2.788-.468a.9.9,0,0,0,.729-.668,10.69,10.69,0,0,1,1.143-2.808.893.893,0,0,0-.047-.976L4.9,7.227A.182.182,0,0,1,4.92,7L6.912,5.008a.17.17,0,0,1,.127-.053.164.164,0,0,1,.1.033L9.446,6.632a.915.915,0,0,0,.989.04A10.6,10.6,0,0,1,13.229,5.5a.915.915,0,0,0,.662-.722l.481-2.828a.173.173,0,0,1,.174-.147H17.36a.173.173,0,0,1,.174.147L18,4.734a.9.9,0,0,0,.668.729,10.85,10.85,0,0,1,2.868,1.177.9.9,0,0,0,.983-.04l2.306-1.658a.2.2,0,0,1,.1-.033.179.179,0,0,1,.127.053l1.992,1.992a.181.181,0,0,1,.02.227L25.415,9.5a.9.9,0,0,0-.04.983,10.7,10.7,0,0,1,1.163,2.8.887.887,0,0,0,.722.662l2.808.475a.173.173,0,0,1,.147.174v2.814Z" transform="translate(0 -0.001)" fill="#fff"/>
								<path id="Path_71" data-name="Path 71" d="M143.017,136a6.917,6.917,0,1,0,6.917,6.917A6.922,6.922,0,0,0,143.017,136Zm0,12.027a5.109,5.109,0,1,1,5.109-5.109A5.113,5.113,0,0,1,143.017,148.028Z" transform="translate(-127.014 -126.922)" fill="#fff"/>
								</g>
								</svg>
								</div>
                                Settings
                            </a>
                            <a class="nav-link" href="{{route('admin.designRequest')}}">
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
                                </div>Design Requests<span class="badge border border-light rounded-circle bg-warning p-1" id="requestsnotifued">0</span>
                            </a>

                            <a class="nav-link" href="{{route('admin.listReturnRequest')}}">
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


                            <a class="nav-link" href="{{route('admin.Banner')}}">
                                <div class="sb-nav-link-icon">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="width: 32px;  height: 32px;"><defs><style>.cls-1{fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.6px;}</style></defs><g data-name="13-chat" id="_13-chat"><path class="cls-1" d="M21,1H3A2,2,0,0,0,1,3V15a2,2,0,0,0,2,2H6v4l4-4H21a2,2,0,0,0,2-2V3A2,2,0,0,0,21,1Z"></path><path class="cls-1" d="M11,20q0,.49,0,1a10,10,0,0,0,2.93,7.07L11,31H21a10,10,0,0,0,5-18.66"></path><line class="cls-1" x1="5" x2="19" y1="7" y2="7"></line><line class="cls-1" x1="5" x2="19" y1="11" y2="11"></line></g></svg>

								</div>
                              Banner
                            </a>

                            <a class="nav-link" href="javascript:void(0)">
                                <div class="sb-nav-link-icon">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="width: 32px;  height: 32px;"><defs><style>.cls-1{fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.6px;}</style></defs><g data-name="13-chat" id="_13-chat"><path class="cls-1" d="M21,1H3A2,2,0,0,0,1,3V15a2,2,0,0,0,2,2H6v4l4-4H21a2,2,0,0,0,2-2V3A2,2,0,0,0,21,1Z"></path><path class="cls-1" d="M11,20q0,.49,0,1a10,10,0,0,0,2.93,7.07L11,31H21a10,10,0,0,0,5-18.66"></path><line class="cls-1" x1="5" x2="19" y1="7" y2="7"></line><line class="cls-1" x1="5" x2="19" y1="11" y2="11"></line></g></svg>

								</div>
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
              url:"{{route('admin.customNotification')}}",
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