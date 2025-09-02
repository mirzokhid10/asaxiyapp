<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('admin.dashboard')}}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('admin.dashboard')}}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Products Managment</li>
            <li class="dropdown">
                <a href="{{route('admin.products.index')}}" class="nav-link sidebar__ads">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 2048 2048">
                        <path fill="currentColor" d="m1344 2l704 352v785l-128-64V497l-512 256v258l-128 64V753L768 497v227l-128-64V354L1344 2zm0
                        640l177-89l-463-265l-211 106l497 248zm315-157l182-91l-497-249l-149 75l464 265zm-507 654l-128 64v-1l-384 192v455l384-193v144l-448 224L0 1735v-676l576-288l576 288v80zm-640 710v-455l-384-192v454l384 193zm64-566l369-184l-369-185l-369 185l369 184zm576-1l448-224l448 224v527l-448 224l-448-224v-527zm384 576v-305l-256-128v305l256 128zm384-128v-305l-256 128v305l256-128zm-320-288l241-121l-241-120l-241 120l241 121z"/></svg>
                    <span>Products Management</span></a>
            <li class="dropdown">
                <a href="{{route('admin.products-characters.index')}}" class="nav-link sidebar__ads">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
                        <path fill="currentColor" d="M0 0v26h9V0H0zm2 2h5v3.75l-.906-.875l-1.282.625L3.22 3.594L2 4.656V2zm3.813.594a.602.602 0 0 0-.594.594c0 .321.272.593.593.593a.602.602 0 0 0 .594-.594a.602.602 0 0 0-.593-.593zM12 4v2h6V4h-6zm8 0v2h6V4h-6zM2 11h5v5H2v-5zm3 .813c-.355.053-.688.374-.688.374s-.035-.029-.093-.062c-.2-.114-.684-.34-1-.031c-.41.399-.031 1.094-.031 1.094s-.596.49-.407 1a.575.575 0 0 0
                        .25.28c.316.182.781.095.781.095s.21.44.532.624a.566.566 0 0 0 .312.063c.486-.027.657-.844.657-.844s.807-.09.937-.594c.115-.445-.494-.798-.625-.874c0 0 .158-.812-.281-1.063A.52.52 0 0 0 5 11.812zM12 12v2h6v-2h-6zm8 0v2h6v-2h-6zm-15.219.688c.028-.008.063-.018.094 0c.248.141-.344.687-.344.687s.762-.1.719.188c-.042.287-.719-.094-.719-.094s.317.704.032.75c-.286.046-.125-.75-.125-.75s-.63.537-.72.281c-.09-.254.657-
                        .375.657-.375s-.66-.377-.438-.563c.223-.184.532.5.532.5s.115-.573.312-.624zM2 19h5v5H2v-5zm2.5.75s-.205.634-.406.719c-.201.085-.844-.219-.844-.219s.287.638.219.844c-.048.147-.719.406-.719.406s.642.23.688.406c.067.261-.188.844-.188.844s.59-.322.781-.219c.193.102.469.719.469.719s.205-.634.406-.719c.201-.085.844.219.844.219s-.29-.639-.219-.844c.054-.159.719-.406.719-.406s-.635-.247-.688-.406c-.085-.256.188-.844.188-
                        .844s-.59.322-.781.219c-.192-.102-.469-.719-.469-.719zM12 20v2h6v-2h-6zm8 0v2h6v-2h-6zm-15.5.688a.82.82 0 0 1 .813.812a.82.82 0 0 1-.813.813a.82.82 0 0 1-.813-.813a.82.82 0 0 1 .813-.813z"/></svg>
                    <span>Products Characters</span></a>
            </li>
            <li class="menu-header">Site Managment</li>
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
                <a href="{{route('admin.flash-sale.index')}}" class="nav-link sidebar__ads">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="#808080">
                        <g fill="none" stroke="#808080" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor"><path d="M7.729 15.286h5m-2.502-2.5h.01m-.008 5h.01M6.5 3.697C9.533 6.782 14.536.124 17.496 2.54C19.199 3.93 18.66 7 16.449 9"/>
                            <path d="M18.664 6.578c.983.179 1.204.765 1.497 2.392c.265 1.466.339 3.225.339 3.974a1.3 1.3 0 0 1-.338.743c-2.057 2.035-6.137 5.878-8.196 7.787c-.808.681-2.028.696-2.886.07c-1.756-1.491-3.443-3.178-5.097-4.701c-.664-.808-.648-1.956.076-2.717c2.178-2.135 6.12-5.789 8.346-7.807c.223-.18.496-.294.79-.319c.498 0 1.355.063 2.19.109"/></g></svg>
                    <span>Flash Sale</span></a>
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
