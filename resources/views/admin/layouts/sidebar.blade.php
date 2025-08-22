<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Bootstrap</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                    <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                    <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
                    <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
                    <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
                    <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
                    <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
                    <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
                    <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
                    <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
                    <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
                    <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
                    <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
                    <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
                    <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
                    <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
                    <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
                    <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
                    <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
                    <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li>
                </ul>
            </li>
            <li class="menu-header">Stisla</li>
            <li class="dropdown">
                <a href="{{route('admin.category.index')}}" class="nav-link sidebar__ads">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                        viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M4 4h5v5H4zm-2 7V2h9v9zm2 4h5v5H4zm-2
                        7v-9h9v9zM20 4h-5v5h5zm-7-2v9h9V2zm2 13h5v5h-5zm-2 7v-9h9v9z"/></svg>
                    <span>Category Management</span></a>
            </li>
            <li class="dropdown">
                <a href="{{route('admin.sub-category.index')}}" class="nav-link sidebar__ads">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M4 4h6v6H4zm10 0h6v6h-6zM4 14h6v6H4zm10 3a3 3 0 1 0 6 0a3 3 0 1 0-6 0"/></svg>
                    <span>SubCategory</span></a>
            </li>
            <li class="dropdown">
                <a href="{{route('admin.child-category.index')}}" class="nav-link sidebar__ads">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor"stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="17" cy="7" r="3"/><circle cx="7" cy="17" r="3"/>
                            <path d="M14 14h6v5a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-5ZM4 4h6v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V4Z"/></g></svg>
                    <span>ChildCategory</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i>
                    <span>Google Maps</span></a>
                <ul class="dropdown-menu">
                    <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                    <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                    <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                    <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                    <li><a href="gmaps-marker.html">Marker</a></li>
                    <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                    <li><a href="gmaps-route.html">Route</a></li>
                    <li><a href="gmaps-simple.html">Simple</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i>
                    <span>Modules</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                    <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                    <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                    <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                    <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                    <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                    <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                    <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                    <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                    <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                    <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                    <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                </ul>
            </li>
            <li class="menu-header">Web Site Managment</li>
            <li class="dropdown">
                <a href="{{ route('admin.advertisements.index') }}" class="nav-link sidebar__ads">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" color="currentColor">
                            <path
                                d="M5.506 15.992L8.03 9.029c.46-.967 1.162-1.766 1.967.151c.743 1.77 1.85 5.01 2.505 6.815m-5.85-2.993h4.669" />
                            <path
                                d="M3.464 4.318C2 5.636 2 7.758 2 12s0 6.364 1.464 7.682C4.93 21 7.286 21 12 21s7.071 0 8.535-1.318S22 16.242 22 12s0-6.364-1.465-7.682C19.072 3 16.714 3 12 3S4.929 3 3.464 4.318" />
                            <path
                                d="M18.484 8.987v2.995m0 0v3.943m0-3.943h-2.018c-.24 0-.478.044-.702.131c-1.693.657-1.693 3.1 0 3.757c.225.087.462.131.702.131h2.018" />
                        </g>
                    </svg>
                    <span>Ads Management</span></a>

            </li>
            <li class="dropdown">
                <a href="{{ route('admin.brands.index') }}" class="nav-link sidebar__ads">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2">
                            <path
                                d="M14 11s6.054-1.05 6-4.5c-.038-2.324-2.485-3.19-3.016-1.5c0 0-.502-2-2.01-2c-1.508 0-2.984 3-.974 8z" />
                            <path
                                d="M13.98 11S20.055 9.95 20 6.5c-.038-2.324-2.493-3.19-3.025-1.5c0 0-.505-2-2.017-2c-1.513 0-3 3-.977 8zM13 13.98l.062.309l.081.35l.075.29l.092.328l.11.358l.061.188l.139.392c.64 1.73 1.841 3.837 3.88 3.805c2.324-.038 3.19-2.493 1.5-3.025l.148-.045l.165-.058a4.13 4.13 0 0 0 .098-.039l.222-.098c.586-.28 1.367-.832 1.367-1.777c0-1.513-3-3-8-.977zM10.02 13l-.309.062l-.35.081l-.29.075l-.328.092l-.358.11l-.188.061l-.392.139c-1.73.64-3.837 1.84-3.805 3.88c.038 2.324 2.493 3.19 3.025 1.5l.045.148l.058.165l.039.098l.098.222c.28.586.832 1.367 1.777 1.367c1.513 0 3-3 .977-8zm.98-2.98l-.062-.309l-.081-.35l-.075-.29l-.092-.328l-.11-.358l-.128-.382l-.148-.399C9.646 5.917 8.46 3.97 6.5 4C4.176 4.038 3.31 6.493 5 7.025l-.148.045l-.164.058a4.13 4.13 0 0 0-.1.039l-.22.098C3.78 7.545 3 8.097 3 9.042c0 1.513 3 3 8 .977z" />
                        </g>
                    </svg>
                    <span>Brands Management</span></a>

            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i>
                    <span>Features</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                    <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                    <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                    <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                    <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                    <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                    <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i>
                    <span>Utilities</span></a>
                <ul class="dropdown-menu">
                    <li><a href="utilities-contact.html">Contact</a></li>
                    <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                    <li><a href="utilities-subscribe.html">Subscribe</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i>
                    <span>Credits</span></a></li>
        </ul>
    </aside>
</div>
