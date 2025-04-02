 <!--begin::Sidebar-->
 <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
     <!--begin::Sidebar Brand-->
     <div class="sidebar-brand">
         <!--begin::Brand Link-->
         <a href="#" class="brand-link">
             <i class="bi bi-box-seam"></i>
             <span class="brand-text fw-light">MENU</span>
             <!--end::Brand Text-->
         </a>
         <!--end::Brand Link-->
     </div>
     <!--end::Sidebar Brand-->
     <!--begin::Sidebar Wrapper-->
     <div class="sidebar-wrapper">
         <nav class="mt-2">
             <!--begin::Sidebar Menu-->
             <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                 <!--<li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../index.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../index2.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../index3.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>-->
                 <li class="nav-item">
                     <a href="{{ url('/') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                         <i class="nav-icon bi bi-house"></i>
                         <p>Home</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('/user') }}" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                         <i class="nav-icon bi bi-people"></i>
                         <p>User</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('/product') }}" class="nav-link {{ Request::is('product') ? 'active' : '' }}">
                         <i class="nav-icon bi bi-box"></i>
                         <p>Product</p>
                     </a>
                 </li>
                 
                 <li class="nav-item">
                     <a href="{{ url('/logout') }}" class="nav-link">
                         <i class="nav-icon bi bi-box-arrow-left" style="color: tomato"></i>
                         <p style="color: tomato">Logout</p>
                     </a>
             </ul>
             <!--end::Sidebar Menu-->
         </nav>
     </div>
     <!--end::Sidebar Wrapper-->
 </aside>
 <!--end::Sidebar-->
