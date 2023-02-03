<div class="topbar-icon">        
            <a href="" class="position-relative notification">
				<svg xmlns="http://www.w3.org/2000/svg" width="23.988" height="30.316" viewBox="0 0 23.988 30.316">
                  <g id="Group_94" data-name="Group 94" transform="translate(0 0)">
                    <path id="notification" d="M76.927,24.126A4.71,4.71,0,0,1,75.5,22.177C74.263,19.567,74,15.89,74,13.265c0-.011,0-.023,0-.034a8.6,8.6,0,0,0-5.063-7.8V3.377A3.378,3.378,0,0,0,65.568,0h-.279a3.378,3.378,0,0,0-3.372,3.377V5.429a8.6,8.6,0,0,0-5.064,7.836c0,2.625-.259,6.3-1.492,8.912a4.71,4.71,0,0,1-1.431,1.949.863.863,0,0,0-.474.982.9.9,0,0,0,.891.694h6.51A4.573,4.573,0,0,0,70,25.8h6.51a.9.9,0,0,0,.891-.694A.864.864,0,0,0,76.927,24.126ZM63.693,3.377a1.6,1.6,0,0,1,1.6-1.6h.279a1.6,1.6,0,0,1,1.6,1.6V4.853a8.6,8.6,0,0,0-3.47,0V3.377Zm1.735,25.16a2.8,2.8,0,0,1-2.8-2.735h5.592A2.8,2.8,0,0,1,65.428,28.537ZM69,24.023H56.37a9.311,9.311,0,0,0,.465-.817c1.19-2.347,1.794-5.692,1.794-9.941a6.8,6.8,0,1,1,13.6,0c0,.011,0,.022,0,.033,0,4.232.607,7.565,1.794,9.905a9.319,9.319,0,0,0,.465.817Z" transform="translate(-53.434)" fill="#272d3b"/>
                  </g>
                </svg>
            <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-primary p-1" id="notifyed">0</span>
            </a>     
            <a class="logout" href="{{ route('seller.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"role="button" >
                <svg id="logout" xmlns="http://www.w3.org/2000/svg" width="28.101" height="30.316" viewBox="0 0 28.101 30.316">
                  <g id="Group_26" data-name="Group 26">
                    <path id="Path_40" data-name="Path 40" d="M30.756,28.579H22.849a3.9,3.9,0,0,1-3.892-3.892V5.63a3.9,3.9,0,0,1,3.892-3.892h8.036a.869.869,0,0,0,0-1.737H22.849a5.636,5.636,0,0,0-5.63,5.63V24.687a5.636,5.636,0,0,0,5.63,5.63h7.907a.869.869,0,0,0,0-1.737Z" transform="translate(-17.219)" fill="#272d3b"/>
                    <path id="Path_41" data-name="Path 41" d="M141.719,142.1l-5.52-5.52a.869.869,0,0,0-1.229,1.229l4.04,4.04H121.388a.869.869,0,0,0,0,1.737H139.01l-4.04,4.04a.872.872,0,0,0,.611,1.486.848.848,0,0,0,.611-.257l5.52-5.52A.868.868,0,0,0,141.719,142.1Z" transform="translate(-113.873 -127.554)" fill="#272d3b"/>
                  </g>
                </svg>
            </a>
            <form id="logout-form" action="{{ route('seller.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
             </div>      
         
        </nav>

       