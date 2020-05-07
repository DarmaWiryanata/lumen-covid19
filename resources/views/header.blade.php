<div class="topbar">
            
  <!-- Navbar -->
  <nav class="topbar-main">  
      <!-- LOGO -->
      <div class="topbar-left">
          <a href="../projects/projects-index.html" class="logo">
              <span>
                  <img src="{{ url('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
              </span>
              <span>
                  <img src="{{ url('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg">
              </span>
          </a>
      </div><!--topbar-left-->
      <!--end logo-->
      <ul class="list-unstyled topbar-nav float-right mb-0"> 
          <li class="menu-item">
              <!-- Mobile menu toggle-->
              <a class="navbar-toggle nav-link" id="mobileToggle">
                  <div class="lines">
                      <span></span>
                      <span></span>
                      <span></span>
                  </div>
              </a>
              <!-- End mobile menu toggle-->
          </li> <!--end menu item-->   
      </ul><!--end topbar-nav-->
  </nav>
  <!-- end navbar-->
   <!-- MENU Start -->
  <div class="navbar-custom-menu">
      <div class="container-fluid">
          <div id="navigation">
              <!-- Navigation Menu-->
              <ul class="navigation-menu">
                <li class="has-submenu">
                    <a href="{{ route('admin.index') }}">
                        <svg class="nav-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>
                                <path d="M184,448h48c4.4,0,8-3.6,8-8V72c0-4.4-3.6-8-8-8h-48c-4.4,0-8,3.6-8,8v368C176,444.4,179.6,448,184,448z"/>
                                <path class="svg-primary" d="M88,448H136c4.4,0,8-3.6,8-8V296c0-4.4-3.6-8-8-8H88c-4.4,0-8,3.6-8,8V440C80,444.4,83.6,448,88,448z"/>
                                <path class="svg-primary" d="M280.1,448h47.8c4.5,0,8.1-3.6,8.1-8.1V232.1c0-4.5-3.6-8.1-8.1-8.1h-47.8c-4.5,0-8.1,3.6-8.1,8.1v207.8
                                    C272,444.4,275.6,448,280.1,448z"/>
                                <path d="M368,136.1v303.8c0,4.5,3.6,8.1,8.1,8.1h47.8c4.5,0,8.1-3.6,8.1-8.1V136.1c0-4.5-3.6-8.1-8.1-8.1h-47.8
                                    C371.6,128,368,131.6,368,136.1z"/>
                            </g>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li><!--end has-submenu-->

                <li class="has-submenu">
                    <a href="#">
                        <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path class="svg-primary" d="M256 32C132.288 32 32 132.288 32 256s100.288 224 224 224 224-100.288 224-224S379.712 32 256 32zm135.765 359.765C355.5 428.028 307.285 448 256 448s-99.5-19.972-135.765-56.235C83.972 355.5 64 307.285 64 256s19.972-99.5 56.235-135.765C156.5 83.972 204.715 64 256 64s99.5 19.972 135.765 56.235C428.028 156.5 448 204.715 448 256s-19.972 99.5-56.235 135.765z"/>
                            <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"/>
                        </svg>
                        <span>Projects</span>
                    </a>
                    <ul class="submenu">
                        @foreach ($navBarKasus as $item)
                            <li><a href="{{ $item->id }}"><i class="dripicons-dot"></i>{{ $item->nama }}</a></li>
                        @endforeach
                    </ul>
                </li><!--end submenu-->
                <li class="has-submenu">
                    
                </li><!--end has-submenu-->
                <li class="has-submenu">

                </li><!--end has-submenu-->
              </ul><!-- End navigation menu -->
          </div> <!-- end navigation -->
      </div> <!-- end container-fluid -->
  </div> <!-- end navbar-custom -->
</div>
