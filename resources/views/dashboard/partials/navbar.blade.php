 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

     <!-- Logo -->
     <div class="d-flex align-items-center justify-content-between">
         <a href="/dashboard" class="logo d-flex align-items-center">
             <img src="/admin/assets/img/logo1.png" alt="">
             <span class="d-none d-lg-block">Setara Office</span>
         </a>
         <i class="bi bi-list toggle-sidebar-btn"></i>
     </div><!-- End Logo -->

     <!-- Icons Navigation -->
     <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center">

             <li class="nav-item dropdown">

                 <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                     <i class="bi bi-chat-left-text"></i>
                     <span class="badge bg-success badge-number">3</span>
                 </a><!-- End Messages Icon -->

                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                     <li class="dropdown-header">
                         You have 3 new messages
                         <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li class="message-item">
                         <a href="#">
                             <img src="/admin/assets/img/messages-1.jpg" alt="" class="rounded-circle">
                             <div>
                                 <h4>Maria Hudson</h4>
                                 <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                 <p>4 hrs. ago</p>
                             </div>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li class="dropdown-footer">
                         <a href="#">Show all messages</a>
                     </li>

                 </ul><!-- End Messages Dropdown Items -->

             </li><!-- End Messages Nav -->
             @auth
                 <li class="nav-item dropdown pe-5">

                     <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                         data-bs-toggle="dropdown">
                         @if (auth()->user()->photo)
                             <img class="img-fluid rounded-circle" src="/storage/{{ auth()->user()->photo }}"
                                 alt="profile">
                         @else
                             <img class="img-fluid rounded-circle" src="/storage/photos/blank.jpg" alt="profile">
                         @endif
                     </a><!-- End Profile Iamge Icon -->

                     <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                         <li class="dropdown-header">
                             <h6>{{ auth()->user()->name }}</h6>
                             <span>{{ auth()->user()->role }}</span>
                         </li>
                         <li>
                             <hr class="dropdown-divider">
                         </li>

                         <li>
                             <a class="dropdown-item d-flex align-items-center"
                                 href="/dashboard/profile/{{ auth()->user()->username }}">
                                 <i class="bi bi-person"></i>
                                 <span>My Profile</span>
                             </a>
                         </li>

                         <li>
                             <hr class="dropdown-divider">
                         </li>
                         <li>

                         <li>
                             <form class="d-flex align-items-center" action="/logout" method="post">
                                 @csrf
                                 <button class="dropdown-item " type="submit">
                                     <i class="bi bi-box-arrow-right"></i>Logout
                                 </button>
                             </form>
                         </li>

                     </ul><!-- End Profile Dropdown Items -->
                 </li><!-- End Profile Nav -->
             @endauth

         </ul>
     </nav><!-- End Icons Navigation -->

 </header><!-- End Header -->

 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <!-- Dashboard -->
         <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="/dashboard">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li><!-- End Dashboard Nav -->

         <!-- Users -->
         <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/users*') ? '' : 'collapsed' }}" href="/dashboard/users">
                 <i class="bi bi-person-gear"></i>
                 <span>Users</span>
             </a>
         </li><!-- End Users Nav -->

         <li class="nav-heading">Office</li>

         <!-- Jobs -->
         <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/jobs*') ? '' : 'collapsed' }}" href="/dashboard/jobs">
                 <i class="bi bi-list-stars"></i>
                 <span>Jobs List</span>
             </a>
         </li><!-- End jobs Nav -->

         <!-- Employees -->
         <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/employees*') ? '' : 'collapsed' }}"
                 href="/dashboard/employees">
                 <i class="bi bi-people"></i>
                 <span>Employees</span>
             </a>
         </li><!-- End Employees Nav -->

         <!-- Mails -->
         <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/mails*') ? '' : 'collapsed' }}" data-bs-target="#mails-nav"
                 data-bs-toggle="collapse" href="#">
                 <i class="bi bi-journal-text"></i><span>Mails</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="mails-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a class="nav-link {{ Request::is('dashboard/mails/incoming-mails*') ? '' : 'collapsed' }}"
                         href="/dashboard/mails/incoming-mails">
                         <i class="bi bi-circle"></i><span>Incoming Mails</span>
                     </a>
                 </li>
                 <li>
                     <a class="nav-link {{ Request::is('dashboard/mails/outgoing-mails*') ? '' : 'collapsed' }}"
                         href="/dashboard/mails/outgoing-mails">
                         <i class="bi bi-circle"></i><span>Outgoing Mails</span>
                     </a>
                 </li>
             </ul>
         </li><!-- End Mails Nav -->

         <!-- Social Media -->
         <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/social*') ? '' : 'collapsed' }}"
                 data-bs-target="#social-media-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-whatsapp"></i><span>Social Media</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="social-media-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="/dashboard/social/instagram">
                         <i class="bi bi-circle"></i><span>Instagram Post</span>
                     </a>
                 </li>
                 <li>
                     <a href="/dashboard/social/whatsapp">
                         <i class="bi bi-circle"></i><span>Whatsapp Chat</span>
                     </a>
                 </li>
             </ul>
         </li><!-- End Social Media Nav -->

         <!-- Calendar -->
         <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/calendar*') ? '' : 'collapsed' }}"
                 href="/dashboard/calendar">
                 <i class="bi bi-calendar2-week"></i>
                 <span>Calendar</span>
             </a>
         </li><!-- End Calendar Page Nav -->

         <li class="nav-heading">Pages</li>

         <!-- My Profile -->
         <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/profile*') ? '' : 'collapsed' }}"
                 href="/dashboard/profile/{{ auth()->user()->username }}">
                 <i class="bi bi-person"></i>
                 <span>Profile</span>
             </a>
         </li><!-- End Profile Page Nav -->

     </ul>

 </aside><!-- End Sidebar-->
