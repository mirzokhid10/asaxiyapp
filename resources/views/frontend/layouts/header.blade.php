<header class="header">
    <div class="xazna-popup d-none">
        <img src="/custom-assets/images/company/xaznaNasiya.svg" alt="xazna-nasiya" />
        <span></span>
    </div>

    <div class="header__top position-relative">
        <div class="container">
            <div class="header__top-group">
                <a class="header__logo pointer__e-none" href="/">
                    <img class="img-fluid" src="{{ asset('frontend/logo/asaxiy-logo.svg') }}" alt="asaxiy logo">
                </a>

                <a id="menuToggleBtn" class="open__menu header__nav__link text-white d-flex justify-content-between align-items-center btn default-btn btn-primary-custom py-2 "
                    href="javascript:void(0)" >
                    <div class="hamburger-small">
                        <div class="hamburger__inner">
                            <div class="hamburger__item"></div>
                            <div class="hamburger__item"></div>
                            <div class="hamburger__item"></div>
                        </div>
                    </div>
                    <span>Categories</span>
                </a>

                <div class="header__search ">
                    <form id="searchForm" action="/product" class="position-relative form-search">
                        <input id="key" value="" name="key" autocomplete="off" type="text"
                            class="search-input" placeholder="Search...">
                        <button type="submit" class="btn  header__search__btn shadow-none ">
                            Search </button>

                        <div class="instant__results" style="display: none">
                        </div>
                        <div class="custom__search_results" style="display: none;">
                            <div class="popular_request d-none">
                                <span class="title">
                                    Популярные запросы </span>
                                <div class="popular_request-items mt-2">
                                    <div class="popular_request-item">
                                        iphone16 pro
                                    </div>
                                    <div class="popular_request-item">
                                        холодильник
                                    </div>
                                    <div class="popular_request-item">
                                        смартфон
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="header__top-list">
                    <noindex><span onclick="location.href='/compare'" class="header__top__link cursor-pointer"
                            title="Compare" rel="nofollow">
                            <img class="header__top__link--img" style="width: 26px; height: 26px;"
                                src="{{ asset('frontend/icons/compare.svg') }}" alt="Compare">
                            <span>Compare</span>
                        </span>
                    </noindex>
                    <noindex><span onclick="location.href='/order-pay'" class="header__top__link cursor-pointer"
                            title="Payment" rel="nofollow">
                            <img class="header__top__link--img" style="width: 26px; height: 26px;"
                                src="{{ asset('frontend/icons/payment.svg') }}" alt="Оплатить">
                            <span>Payment</span>
                        </span>
                    </noindex>
                    <noindex>
                        <span onclick="location.href='/order-status'" class="header__top__link cursor-pointer"
                            title="Delivery Order" rel="nofollow">
                            <img class="header__top__link--img" style="width: 26px; height: 26px;"
                                src="{{ asset('frontend/icons/delivered.svg') }}" alt="Delivery Order">
                            <span>Tracking</span>
                        </span>
                    </noindex>


                    <div class="dropdown cart_dropdown">
                        <button type="button" class="header__top__link header__top__link--cart btn h-cart"
                            data-toggle="dropdown">
                            <img class="header__top__link--img" style="width: 26px; height: 26px;"
                                src="{{ asset('frontend/icons/cart.svg') }}" alt="Cart">
                            <span>Cart</span>
                            <span id="cart-count" class="cart_count">0</span>
                        </button>
                        <div class="cart__modal dropdown-menu dropdown-menu-right" style="width: 500px;">
                            <div class="cart-wrapper">
                                <div id="test-cart" data-pjax-container="" data-pjax-push-state
                                    data-pjax-timeout="1000">
                                    <div class="cart__modal-top" style="overflow-y: auto">
                                        <ul class="cart__product-list" id="cart-content">
                                        </ul>
                                    </div>
                                </div>
                                <div class="cart__modal-footer">
                                    <div class="cart__modal-total">
                                        <span>Сумма</span>
                                        <span class="total-count">0 сум</span>
                                    </div><!-- /.cart__modal-total -->
                                </div>
                                <div class="cart__modal-footer">
                                    <div class="cart__modal-total-buttons">
                                        <noindex>
                                            <span onclick="location.href='/cart/checkout'"
                                                class="w-100 btn default-btn btn-primary-custom cursor-pointer "
                                                rel="nofollow">ОФОРМИТЬ ПОКУПКУ</span>
                                            <span onclick="location.href='/cart/index'"
                                                class="btn reset__btn reset__primary cursor-pointer w-100 mt-2"
                                                rel="nofollow">ПЕРЕЙТИ В КОРЗИНКУ</span>
                                        </noindex>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <noindex>
                        <span onclick="location.href='/site/favourites'"
                            class="header__top__link position-relative cursor-pointer" rel="nofollow">
                            <img src="{{ asset('frontend/icons/heart.svg') }}" style="width: 26px; height: 26px;"
                                alt="Favorites">
                            <span>Favorites</span>
                            <span id="favourite-count" class="cart_count" style="right: 24px;">0</span>
                        </span>
                    </noindex>
                    <a href="/uz/" class="header__top__link header__top__link--lang">
                        <img class="header__top__link--img" style="filter: none; width: 26px; height: 26px;"
                            src="{{ asset('frontend/icons/uzbekistan.svg') }}">
                        <span class="">O'zbekcha</span>
                    </a>
                    <a class="d-none" id="google_translate_element"></a>


                    <noindex>
                        @auth
                            <span class="header__top__link h-avatar cursor-pointer" data-toggle="modal"
                                data-target="#profile-modal" title="Dashboard" rel="nofollow">
                                <a href="{{ url('/dashboard') }}">
                                    <img src="{{ asset('frontend/icons/dashboard.svg') }}"
                                        class="d-flex justify-content-center align-items-center text-center mx-auto"
                                        style="width: 26px; height: 26px;">
                                    <span class="text-center header__top__link">Dashboard</span>
                                </a>
                            </span>
                        @else
                            <a class="header__top__link h-avatar cursor-pointer" href="#" data-bs-toggle="modal"
                                data-bs-target="#profile-modal" title="Log In" rel="nofollow">
                                <img src="{{ asset('frontend/icons/user.svg') }}"
                                    class="d-flex justify-content-center align-items-center text-center mx-auto"
                                    style="width: 26px; height: 26px;">
                                <span class="header__top__link text-center">Log In</span>
                            </a>
                        @endauth
                    </noindex>

                </div>
            </div>
        </div>
    </div>

    <div class="header__bottom position-relative">

        <div class="container">
            <nav class="header__nav">
                <a class="header__nav__link" href="/product/product-list/super-price">Super Prices</a>
                </a>
                <a class="header__nav__link" href="/product/product-list/0-0-6">0-0-6</a>
                </a>
                <a class="header__nav__link" href="/product/klimaticheskaya-tehnika/kondicionery">Air Conditioner</a>
                <a class="header__nav__link" href="/product/telefony-i-gadzhety/telefony/smartfony">Smartphones</a>
                <a class="header__nav__link" href="/product/bytovaya-tehnika">Household Appliances</a>
                <a class="header__nav__link" href="/product/knigi">Books</a>
                <a class="header__nav__link" href="/product/televizory-video-i-audio/televizory">
                    TV</a>
                <a class="header__nav__link" href="/product/kompyutery-i-orgtehnika/noutbuki/noutbuki-2">Laptops</a>

            </nav>
        </div> <!-- container -->
    </div>
</header>
