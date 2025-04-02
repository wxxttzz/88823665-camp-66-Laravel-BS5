 <!--begin::Header-->
 <nav class="app-header navbar navbar-expand bg-body">
     <!--begin::Container-->
     <div class="container-fluid">
         <!--begin::Start Navbar Links-->
         <ul class="navbar-nav">
             <li class="nav-item">
                 <a class="nav-link" php artisan="sidebar" href="#" role="button">
                     <i class="bi bi-list"></i>
                 </a>
             </li>
             <li class="nav-item">
                 <a href="#" class="nav-link align-middle">
                    <i class="bi bi-github me-2"></i>
                    <span class="text-dark">CatCool<span class="badge bg-primary ms-2 align-middle"></span>
                     <!--end::Brand Text-->
                 </a>
             </li>

         </ul>
         <!--end::Start Navbar Links-->
         <!--begin::End Navbar Links-->
         <ul class="navbar-nav ms-auto">
             <!--begin::Fullscreen Toggle-->
             <li class="nav-item">
                 <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                     <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                     <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                 </a>
             </li>
             <!--end::Fullscreen Toggle-->
             <!--begin::User Menu Dropdown-->
             <li class="nav-item dropdown user-menu">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                     <i class="bi bi-person-circle me-1"></i>
                     <span class="d-none d-md-inline">{{ session('user')->name ?? 'Guest' }}</span>
                 </a>
                 <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                     <!--begin::User Image-->
                     <li class="user-header text-bg-primary">
                         <i class="bi bi-person-circle me-1 fa-lg pt-3 " style='font-size:56px;'></i>
                         <p class="fw-bold">
                             {{ session('user')->name ?? 'Guest' }}
                             <small class="fw-light">{{ session('user')->email ?? 'Guest' }}</small>
                         </p>
                     </li>
                     <!--end::User Image-->
                     <!--begin::Menu Footer-->
                     <li class="user-footer">
                         <a href="#" class="btn btn-outline-danger btn-flat d-flex justify-content-center">Sign
                             out</a>
                     </li>
                     <!--end::Menu Footer-->
                 </ul>
             </li>
             <!--end::User Menu Dropdown-->
         </ul>
         <!--end::End Navbar Links-->
     </div>
     <!--end::Container-->
 </nav>
 <!--end::Header-->
