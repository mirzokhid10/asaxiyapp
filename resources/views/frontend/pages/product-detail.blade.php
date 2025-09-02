@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="view__breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble m-0">
                    <li class="breadcrumb-item">
                        <a href="/">
                            <span itemprop="name">Main</span>
                            <meta itemprop="position" content="1">
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href='/product/knigi/asaxiybooks-kitoblari'>
                            <span itemprop="name">Asaxiy Books китоблари</span>
                            <meta itemprop="position" content="2">
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <span>{{$product->name}}</span>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="view__top-header">
            <div class="anchor__links ">
                <div class="anchor__links-item" data-href="product__review"
                     onclick="toScroll(this, 200)"> Review</div>
                <div class="anchor__links-item" data-href="product__description"
                     onclick="toScroll(this, 140)"> Product Description</div>
                <div class="anchor__links-item" data-href="characteristics__section"
                     onclick="toScroll(this, 140)"> Attributes</div>
                <div class="anchor__links-item" data-href="feedback__section"
                     onclick="toScroll(this, 140)"> Comments</div>
            </div>
        </div>

        <div class="row mb-1 product__review">
            <div class="col-md-12">
                <h1 class="product-title product-name-id-21463">{{$product->name}}</h1>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <!-- CAROUSEL NAV  -->
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="row px-3">
                            <div class="col-lg-2 p-0 d-none d-lg-block overflow-hidden">
                                <div class="slider slider-more-about-nav swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach ($product->productImageGalleries as $productImage)
                                            <div class="swiper-slide" style="height: 98.75px; margin-bottom: 10px;">
                                                <div class="item__img">
                                                    <img class="img-fluid"
                                                         title="{{ $product->name }}"
                                                         src="{{ asset($productImage->image) }}"
                                                         onerror="this.onerror=null; this.src='{{ asset($product->thumb_image) }}';"
                                                         alt="{{ $product->name }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                            <!-- CAROUSEL NAV END  -->

                            <!-- CAROUSEL FOR  -->
                            <div class="col-lg-10  col-sm-12 for-get-image-position">
                                <div class="slider-more-about-for-wrapper position-relative">
                                    <span class="pr_flash pr_discount">{{productType($product->product_type)}}</span>
                                    <span class="pr_flash pr_discount"
                                          style="background-color: #0a53be; top: 60px">{{$product->created_at->format('d.m.Y')}}</span>
                                    <button class="btn view__favourite rounded-circle"
                                            onclick="addToFavourites(this,21463);addToWishlistGtag(this);">
                                        <img data-value="-1" src="{{asset('frontend/icons/heartpg.svg')}}">
                                    </button>
                                    <div class="cart__discount-img view">
                                        <img src="/custom-assets/images/icons/discount_cart.svg" alt="">
                                        <div class="cart__discount-hover">
                                            <ul>
                                                <li>Скидка 5% на 5 книг</li>
                                                <li>Скидка 10% на 10 книг</li>
                                                <li>Скидка 12% на 20 книг</li>
                                                <li>Скидка 15% на 50 книг</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button"
                                            onclick="toggleCompare(21463)"
                                            class="product__item-compare view__compare rounded-circle  add-tocompare-21463">
                                        <img src="/custom-assets/images/icons/compare_gray.svg">
                                    </button>
                                    <div class="slider slider-more-about-for swiper-container"
                                         style="overflow: hidden">
                                        <div class="swiper-wrapper">
                                            @foreach ($product->productImageGalleries as $productImage)
                                                <div class="swiper-slide item__main-img" style="width: 100% !important;">
                                                    <img class="img-fluid lazyload m-o"
                                                         title="{{ $product->name }}"
                                                         src="{{ asset($productImage->image) }}"
                                                         onerror="this.onerror=null; this.src='{{ asset($product->thumb_image) }}';"
                                                         alt="{{ $product->name }}">
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>

                                </div>
                            </div>
                            <!-- CAROUSEL FOR END  -->
                        </div>
                    </div>
                    <!-- PRODUCT INFO  -->
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="more__about-content">
                            <div class="row">
                                <div class="col-8 rating-box"
                                    <span class="d-none">5</span>
                                    <span class="d-none">32</span>
                                    <div class="more__about-stars">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </div>
                                    <div class="more__about-comment pointer__e-none"
                                         data-href="feedback__wrapper"
                                         onclick="toScroll(this)">
                                        <svg width="12" height="12">
                                            <use xlink:href="#comment-icon" x="0" y="0"></use>
                                        </svg>
                                        <span>32 отзывов</span>
                                    </div>
                                </div>
{{--                                <div class="col-4 d-flex align-items-sm-center justify-content-end flex-column flex-sm-row mb-2">--}}
{{--                                    <div class="share_hover">--}}
{{--                                        <button type="button" class="share_link color-primary justify-content-end"--}}
{{--                                                id="shareBtn"><img--}}
{{--                                                src="/custom-assets/images/icons/share.svg">Поделиться                                            </button>--}}
{{--                                        <div class="share_shape" id="shareShape">--}}
{{--                                            <div class="socials">--}}
{{--                                                <ul class="social__list">--}}
{{--                                                    <li><a onclick="shareProduct(21463)"--}}
{{--                                                           id="sharelink-facebook"--}}
{{--                                                           target="_blank"--}}
{{--                                                           class="sc_facebook"--}}
{{--                                                           href="https://www.facebook.com/dialog/share?app_id=296649824842615&u=https%3A%2F%2Fasaxiy.uz%2Fproduct%2Faleksandr-dyuma-graf-monte-kristo-premium-tulik&display=page&href=https%3A%2F%2Fasaxiy.uz%2Fproduct%2Faleksandr-dyuma-graf-monte-kristo-premium-tulik"><i--}}
{{--                                                                class="fab fa-facebook-f"></i></a></li>--}}
{{--                                                    <li><a onclick="shareProduct(21463)"--}}
{{--                                                           id="sharelink-telegram"--}}
{{--                                                           target="_blank"--}}
{{--                                                           class="sc_telegram"--}}
{{--                                                           href="https://t.me/share/url?url=https%3A%2F%2Fasaxiy.uz%2Fproduct%2Faleksandr-dyuma-graf-monte-kristo-premium-tulik&text=%D0%90%D0%BB%D0%B5%D0%BA%D1%81%D0%B0%D0%BD%D0%B4%D1%80+%D0%94%D1%8E%D0%BC%D0%B0%3A+%D0%93%D1%80%D0%B0%D1%84+%D0%9C%D0%BE%D0%BD%D1%82%D0%B5-%D0%9A%D1%80%D0%B8%D1%81%D1%82%D0%BE+%28Asaxiy+Books%29+%282%D1%82%D0%B0+%D0%BA%D0%B8%D1%82%D0%BE%D0%B1%29"><i--}}
{{--                                                                class="fab fa-telegram-plane"></i></a></li>--}}
{{--                                                    <li><a onclick="shareProduct(21463)"--}}
{{--                                                           id="sharelink-twitter"--}}
{{--                                                           target="_blank"--}}
{{--                                                           class="sc_twitter"--}}
{{--                                                           href="https://twitter.com/intent/tweet?text=%D0%90%D0%BB%D0%B5%D0%BA%D1%81%D0%B0%D0%BD%D0%B4%D1%80+%D0%94%D1%8E%D0%BC%D0%B0%3A+%D0%93%D1%80%D0%B0%D1%84+%D0%9C%D0%BE%D0%BD%D1%82%D0%B5-%D0%9A%D1%80%D0%B8%D1%81%D1%82%D0%BE+%28Asaxiy+Books%29+%282%D1%82%D0%B0+%D0%BA%D0%B8%D1%82%D0%BE%D0%B1%29&url=https%3A%2F%2Fasaxiy.uz%2Fproduct%2Faleksandr-dyuma-graf-monte-kristo-premium-tulik&hashtags=asaxiyuz"><i--}}
{{--                                                                class="fab fa-twitter"></i></a></li>--}}
{{--                                                    <li><a onclick="shareProduct(21463)"--}}
{{--                                                           id="sharelink-whatsapp"--}}
{{--                                                           target="_blank"--}}
{{--                                                           class="sc_whatsapp"--}}
{{--                                                           href="https://api.whatsapp.com/send?text=Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)"--}}
{{--                                                           %20"https%3A%2F%2Fasaxiy.uz%2Fproduct%2Faleksandr-dyuma-graf-monte-kristo-premium-tulik "><i--}}
{{--                                                            class=" fab fa-whatsapp"></i></a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                            <div class="copy">--}}
{{--                                                <span class="copy_title">Или поделитесь ссылкой</span>--}}
{{--                                                <div class="copy_rounded">--}}
{{--                                                    <input value="https://asaxiy.uz/product/aleksandr-dyuma-graf-monte-kristo-premium-tulik Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб) "--}}
{{--                                                           class="form-control"--}}
{{--                                                           id="copy-proudct-link"--}}
{{--                                                           type="text"--}}
{{--                                                           style="background-color:transparent;border:transparent">--}}
{{--                                                    <img src="/custom-assets/images/icons/copy.png" alt="copy"--}}
{{--                                                         id="copy-proudct-btn">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-12 p-0">
                                    <div class="product-view__actions bg-transparent pt-0">
                                        <div itemprop="offers" itemscope
                                             itemtype="https://schema.org/Offer">

                                            <div class="price-box">
                                                <link itemprop="url"
                                                      href="/product/aleksandr-dyuma-graf-monte-kristo-premium-tulik"/>
                                                <span class="price-box_old-price">{{number_format($product->price, 0, '.', ' ') }} {{$product->sku}}</span>
                                                <span itemprop="price"
                                                      content="159000"
                                                      class="price-box_new-price product-main-price-id-21463">{{number_format($product->discount_price, 0, '.', ' ')}} {{$product->sku}}</span>
                                                <span class="d-none" itemprop="priceCurrency"
                                                      content="UZS">сум</span>
                                                <div class="price-box__saved">Profit {{number_format($product->price - $product->discount_price, 0, '.', ' ') }} {{$product->sku}}</div>

                                            </div>
                                            <link itemprop="availability" href="https://schema.org/InStock"/>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- This product has group may be it has also group mates-->
                            @foreach($product->variants as $variant)
                                <div class="mb-1">
                                    <div class="mb-1 h6 view__radios-title">
                                        {{ $variant->name }} :
                                        <span class="font-weight-bold">
                                            {{ optional($variant->variantItems->firstWhere('is_default', true))->name ?? '—' }}
                                        </span>
                                    </div>

                                    <ul class="d-flex flex-wrap view__radios">
                                        @foreach($variant->variantItems as $item)
                                            <li>
{{--                                                {{ route('product.show', ['slug' => $item->slug]) }}--}}
                                                <a href="" class="loader-link">
                                                    <input
                                                        id="variant-{{ $variant->id }}-item-{{ $item->id }}"
                                                        type="radio"
                                                        name="variant_{{ $variant->id }}"
                                                        class="sr-only"
                                                        @checked($item->is_default)
                                                        @disabled(!$item->status)
                                                    >

                                                    <label
                                                        for="variant-{{ $variant->id }}-item-{{ $item->id }}"
                                                        class="{{ !$item->status ? 'outStock' : '' }}"
                                                    >
                                                        @if($item->image)
                                                            <img
                                                                src="{{ asset($item->image) }}"
                                                                onerror="this.onerror=null; this.src='{{ asset($product->thumb_image) }}';"
                                                                alt="{{ $item->name }}"
                                                                title="{{ $item->name }}"
                                                            >
                                                        @else
                                                            {{ $item->name }}
                                                        @endif
                                                    </label>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                            <!-- Modifications -->
                            @if($product->brand_id)
                                <div class="mb-1 d-flex flex-wrap">
                                    <div class="text__content d-flex justify-content-between w-100">
                                        <span class="text__content-title">Brand:</span>
                                        <span class="line-text__content"></span>
                                        <span class="text__content-name">
                                            {{ $product->brand->name }}
                                        </span>
                                    </div>
                                </div>
                            @endif

                            @if($product->name)
                                <div class="mb-1 d-flex flex-wrap">
                                    <div class="text__content d-flex justify-content-between w-100">
                                        <span class="text__content-title">Model:</span>
                                        <span class="line-text__content"></span>
                                        <span class="text__content-name">{{$product->name}} </span>
                                    </div>
                                </div>
                           @endif
                            @if($product->qty)
                                <div class="text__content d-flex justify-content-between mb-3">
                                    <span class="text__content-title">How many left: </span>
                                    <span class="line-text__content"></span>
                                    <span class="text__content-name"
                                          style='color:#00BFAF;font-size: 16px;font-weight: 600;'>
                                    ● In stocks: {{$product->qty}}</span>
                                </div>
                           @endif
                            <div class="button-gr w-100 ">
                                <a id="add_to_cart"
                                   onclick="addToCartGtag();cartModalAnim('https://assets.asaxiy.uz/product/main_image/mobile/68249f36ca94c.jpg.webp', 21463,'525c1b8c40c5759c18f3a137b6564741');addToCartInViewAlt(this, 21463, 'https://assets.asaxiy.uz/product/main_image/mobile/68249f36ca94c.jpg.webp');addCartTotal(21463);"
                                   class="btn default-btn btn-green-custom p-2 w-100"
                                   style="display: flex; align-items: center; justify-content: center">
                                    <img src="{{asset('frontend/icons/cart-single.svg')}}"
                                         alt="image description">
                                    Добавить в корзину                                            </a>
                                <a href="/order/one-click/aleksandr-dyuma-graf-monte-kristo-premium-tulik"
                                   onclick="show_one_click(21463)"
                                   class="btn d-flex justify-content-center align-items-center w-100 p-2  default-btn btn-primary-custom">
                                    Купить в один клик                                                </a>

                                <div class="modal fade" id="one-click-order-modal" tabindex="-1" role="dialog"
                                     aria-labelledby="modalLabel-one-click-order-modal"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <span class="modal-title h3" id="modalLabel-one-click-order-modal"></span>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body one__click-order-modal-content">
                                                <div class="product__together-swiper w-100 align-items-center justify-content-between border-bottom mb-3 pb-3">
                                                    <img id="product-image" src="" width="200">
                                                    <div class="product__together-item">
                                                        <span id="product-name" class="product-name-together h6 font-weight-bold mb-0"></span>
                                                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                            <div>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <p class="text-primary bold text-decoration-none h3" id="total-price"></p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center" style="gap: 15px">
                                                                <div class="box__counter-button" id="minus__counter">-</div>
                                                                <div class="counter-together" id="counter_buy-count">1</div>
                                                                <div class="box__counter-button" id="plus__counter">+</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form id="login-form-view" action="/product/aleksandr-dyuma-graf-monte-kristo-premium-tulik" method="post">
                                                    <input type="hidden" name="_csrf-asaxiy" value="imMt6b6FaO_bbQ-4p5JHV-bx_HUyxMYG0w0hiwLQky6zLViCj_cK37k3a9L9p3U41qaWFgaUhUeYblPZOrjVTw==">
                                                    <label for="buy_modal-tel" class="by__modal-label">
                                                        Номер телефона                    <input type="tel" placeholder="+998" id="buy_modal-tel" value="+998" maxlength="13" required
                                                                                                 name="LoginForm[phone]" autocomplete="off">
                                                    </label>

                                                    <label for="buy_modal-name" class="by__modal-label">
                                                        Имя и фамилия                    <input type="text" placeholder="Введите имя и фамилия" id="buy_modal-name"
                                                                                                name="OneClickOrderForm[full_name]">
                                                    </label>

                                                    <label for="loginform-verification" class="by__modal-label d-none">
                                                        <div class="form-group field-loginform-verification required">
                                                            <label class="control-label" for="loginform-verification">СМС код</label>
                                                            <input type="text" id="loginform-verification" class="form-control" name="LoginForm[verification]" prompt="Введите 5-ти значный код активации" autocomplete="off" aria-required="true">

                                                            <div class="help-block"></div>
                                                        </div>                </label>

                                                    <div class="d-flex justify-content-end">
                                                        <button id="buy-btn" class="btn default-btn btn-primary-custom py-2 mt-2 " type="submit">
                                                            Купить                    </button>
                                                    </div>
                                                    <input type="number" hidden="hidden" name="OneClickOrderForm[quantity]" id="one__click-order-quantity"
                                                           value="1">
                                                </form>            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- PRODUCT INFO END  -->
                </div>

                <!-- VOTE PRODUCT BEGIN  -->
                <div class="container">

                    <div class="list_title  mt-2 mb-2">Проголосуйте:</div>
                    <ul class="row justify-content-between align-items-center  w-100 mb-3">
                        <li class="readlist__item   m-0      mt-2 col-md-6 col-lg-3  ">
                            <button
                                data-url="/ajax/set-user-action-on-product?status=10&book_id=21463"
                                class="book-reader-action-button readlist__link d-flex align-items-center justify-content-between w-100 border-0 ">
                                <div class="d-flex">
                                    <svg class="mr-2" width="24" height="24">
                                        <use xlink:href="/custom-assets/images/asaxiy-icons.svg#book-read"></use>
                                    </svg>                    <span class="readlist__link-name">
                                            Прочитал                                            </span>
                                </div>
                                <span class="ml-2 count">3</span>
                            </button>
                        </li>
                        <li class="readlist__item   m-0      mt-2 col-md-6 col-lg-3  ">
                            <button
                                data-url="/ajax/set-user-action-on-product?status=9&book_id=21463"
                                class="book-reader-action-button readlist__link d-flex align-items-center justify-content-between w-100 border-0 ">
                                <div class="d-flex">
                                    <svg class="mr-2" width="24" height="24">
                                        <use xlink:href="/custom-assets/images/asaxiy-icons.svg#book-reading"></use>
                                    </svg>                    <span class="readlist__link-name">
                                            Читаю                                            </span>
                                </div>
                                <span class="ml-2 count">8</span>
                            </button>
                        </li>
                        <li class="readlist__item   m-0      mt-2 col-md-6 col-lg-3  ">
                            <button
                                data-url="/ajax/set-user-action-on-product?status=8&book_id=21463"
                                class="book-reader-action-button readlist__link d-flex align-items-center justify-content-between w-100 border-0 ">
                                <div class="d-flex">
                                    <svg class="mr-2" width="24" height="24">
                                        <use xlink:href="/custom-assets/images/asaxiy-icons.svg#book-will-read"></use>
                                    </svg>                    <span class="readlist__link-name">
                                            Буду читать                                            </span>
                                </div>
                                <span class="ml-2 count">13</span>
                            </button>
                        </li>
                        <li class="readlist__item   m-0      mt-2 col-md-6 col-lg-3  ">
                            <button
                                data-url="/ajax/set-user-action-on-product?status=7&book_id=21463"
                                class="book-reader-action-button readlist__link d-flex align-items-center justify-content-between w-100 border-0 ">
                                <div class="d-flex">
                                    <svg class="mr-2" width="24" height="24">
                                        <use xlink:href="/custom-assets/images/asaxiy-icons.svg#recommended"></use>
                                    </svg>                    <span class="readlist__link-name">
                                            Я рекомендую                                            </span>
                                </div>
                                <span class="ml-2 count">10</span>
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- VOTE PRODUCT END  -->
            </div>
            <!--            CONTRAST INSTALLMENT BEGIN-->
            <div class="col-xl-3 d-xl-block  mt-3 mt-sm-0">
                <div class="i__graphics_company mb-1" style="position: static">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="font-weight-bold text-left h4">Рассрочка платежа</h2>
                        <div class="i__graphics_company">
                            <div class="tooltip-wrapper">
                                <img class="cursor-pointer" style="cursor: pointer;" src="{{ asset('frontend/icons/info_installment.svg') }}"  width="24" height="24" alt="info icon" />
                                <div class="custom-tooltip">
                                    Buy the product from a partner convenient for you and for a suitable installment period
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                        new design isntallment-->
                    <div class="w-100 overflow-hidden">
                        <strong>Months</strong>
                        <ul class="nav nav-pills mb-3 installment__new-design-ul flex-nowrap" id="pills-tab"
                            role="tablist">

                            <li class="nav-item" role="presentation">
                                <a class="nav-link active"
                                   id="pills-home-tab" data-toggle="pill"
                                   href="#installment_month-16" role="tab"
                                   aria-controls="pills-home"
                                   aria-selected="true">4</a>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active"
                             id="installment_month-16" role="tabpanel"
                             aria-labelledby="pills-home-tab">
                            <div class="i__month position-relative">
                                <input type="radio"
                                       name="installment_id_16"
                                       id="input-installment-id-16-company-id-27" checked value="16">
                                <label for="input-installment-id-16-company-id-27">
                                    <ul>
                                        <li class="d-flex justify-content-between align-items-center h6 i__month mt-1"
                                            style="color: #FE7405;">
                                            <img src="https://asaxiy.uz/custom-assets/images/company/asaxiy-nasiya.svg"
                                                 height="30" style="max-width: 135px">
                                            <div class="">
                                                            <span style="font-weight: bold"
                                                                  class="installment-monthly-graphics mr-1 ">44 200</span>
                                                <span style="font-weight: bold">сум</span>
                                            </div>
                                        </li>
                                        <div class="total__price-view d-none">
                                            <span>Общая сумма </span>
                                            <p class="m-0">176 800 сум</p>
                                        </div>
                                    </ul>
                                    <a href="/cart/checkout-installment?slug=aleksandr-dyuma-graf-monte-kristo-premium-tulik&installment_id=16&company_id=27"
                                       class="btn default-btn btn-orange-custom w-100 text-white d-none mt-2">Buy now, pay later</a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center total__price-view-text">
                        <p>Total amount: </p>
                        <p class="total__price-bottom"></p>
                    </div>
                    <a href="#"
                       class="btn finish__installment-link p-2 default-btn btn-orange-custom w-100 text-white mt-2">Buy now, pay later</a>

                </div>

                <div class="delivery-options-box d-none">
                    <div class="delivery-options d-none">
                        <div class="option">
                            <p>Доставка до двери</p>
                            <p>15 000 сум</p>
                        </div>
                        <div class="option_sm">
                            <p>Доставим до 15 ноября</p>
                        </div>
                        <div class="option">
                            <p>Пункт выдачи</p>
                            <p>Бесплатно</p>
                        </div>
                        <div class="option_sm">
                            <p>Забрать завтра из магазинов</p>
                            <span>17 магазинов</span>
                        </div>
                        <hr>
                        <div class="option">
                            <p>Безопасная оплата удобным способом</p>
                        </div>
                        <div class="option_sm">
                            <p>Оплачивайте картой, наличными или в рассрочку</p>
                        </div>
                    </div>
                    <div class="footer__list mb-4 mt-3 mt-md-0">
                        <p class="footer__list-title">Виды оплаты</p>
                        <div class="d-flex payment-row" style="gap: 16px">
                            <div class="payment__item d-flex justify-content-center align-items-center">
                                <img data-src="/custom-assets/images/uzum.svg" class="lazyload"
                                     loading="lazy"
                                     width="40" height="20" alt="uzum">
                            </div>
                            <div class="payment__item d-flex justify-content-center align-items-center">
                                <img data-src="/custom-assets/images/payme.svg" class="lazyload"
                                     loading="lazy"
                                     width="40" height="20" alt="payme">
                            </div>
                            <div class="payment__item d-flex justify-content-center align-items-center">
                                <img data-src="/custom-assets/images/visa.svg" class="lazyload"
                                     loading="lazy"
                                     width="40" height="21" alt="visa">
                            </div>
                            <div class="payment__item d-flex justify-content-center align-items-center">
                                <img data-src="/custom-assets/images/mastercard.svg" class="lazyload"
                                     loading="lazy" width="36" height="28" alt="mastercard">
                            </div>
                            <div class="payment__item d-flex justify-content-center align-items-center">
                                <img data-src="/custom-assets/images/humo.svg" class="lazyload"
                                     loading="lazy"
                                     width="40" height="28" alt="humo">
                            </div>
                            <div class="payment__item d-flex justify-content-center align-items-center">
                                <img data-src="/custom-assets/images/uzcard.svg" class="lazyload"
                                     loading="lazy"
                                     width="21" height="32" alt="uzcard">
                            </div>
                            <div class="payment__item d-flex justify-content-center align-items-center">
                                <img data-src="/custom-assets/images/xazna.png" class="lazyload"
                                     loading="lazy"
                                     height="20" alt="xazna">
                            </div>
                        </div>
                    </div>
                    <div class="delivery-options">
                        <div class="option d-block">
                            <p>Гарантия и быстрый возврат</p>
                            <span>1 год гарантии от производителя Примем товары в течении 10 дней и сразу вернём деньги</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--            CONTRAST INSTALLMENT END-->
        </div>

        <div class="characteristic__content mt-5 pt-3">
            <!-- SMALL CHARACTERISTICS   -->
            <div class="col-md-12 mb-40 p-0">
                <div class="characteristics characteristics__section lg-mb-40">
                    <h2 class="h-4">Характеристики</h2>
                    <div class="table-res--custom collapsed-characteristics" id="characteristics-content">
                        <table class="table table-striped table-borderless">
                            <tbody>
                            @foreach($product->characteristicValues as $value)
                                <tr>
                                    {{-- Characteristic name --}}
                                    <td class="text-left" style="vertical-align: middle;">
                                        {{ $value->characteristic->name }}
                                    </td>

                                    {{-- Characteristic value(s) --}}
                                    <td class="text-right res--custom-link">
                                        {{-- Multiselect --}}
                                        @if($value->options && $value->options->count())
                                            @foreach($value->options as $opt)
                                                <a href="{{ url('/product/'.$product->slug.'/'.Str::slug($value->characteristic->name).'='.Str::slug($opt->label)) }}">
                                                    {{ $opt->label }}
                                                </a>@if(!$loop->last), @endif
                                            @endforeach

                                            {{-- Single select --}}
                                        @elseif($value->option)
                                            <a href="{{ url('/product/'.$product->slug.'/'.Str::slug($value->characteristic->name).'='.Str::slug($value->option->label)) }}">
                                                {{ $value->option->label }}
                                            </a>

                                            {{-- Plain values --}}
                                        @else
                                            {{ $value->value_string
                                                ?? $value->value_text
                                                ?? $value->value_integer
                                                ?? $value->value_decimal
                                                ?? ($value->value_boolean ? 'Да' : ($value->value_boolean === 0 ? 'Нет' : ''))
                                                ?? $value->value_date }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <button id="toggle-characteristics" class="toggle-btn w-100">
                        Показать больше
                    </button>
                </div>
            </div>


            <!-- SMALL CHARACTERISTICS END  -->

            <!-- FEEDBACKS  -->
            <div id="feedback" class="feedback__section col-md-12 mb-40 p-0">
                <div id="review" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">                    <div class="characteristics feedback__wrapper" data-anchor-offset="15">
                        <h2>Отзывы</h2>
                        <div class="feedback">
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Zoidov Nurulloh</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="02-09-2025">
                                            <span>02-09-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Kitob nashri juda sifatli, muqovasi ham zo'r. O'zbek nashriyotlarida bunday kitoblar kam.</p>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Ochilova Mohina Davron Qizi</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="24-08-2025">
                                            <span>24-08-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Menga juda yoqdi ayniqsa muqovasi</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Ushbu kitob sizga yoqqanidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Shomurodov Abbos Tulkinovich</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="21-08-2025">
                                            <span>21-08-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Asaxiyga ushbu asarni o‘zbek tiliga o‘girib, sifatli tarzda qaytadan nashr qilgani uchun chin dildan tashakkur aytaman. Kitobning sifati, dizayni va o‘qishga yengilligi meni juda quvontirdi.</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Ushbu kitob va uning sifati sizga manzur bo`lganidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">NODIRABEGIM</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="16-08-2025">
                                            <span>16-08-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Kitobni hali ŏqimadim. lekin muqova va sifat juda zŏr. Shkafda chiroyli turadi. ŏqilsa eskirib hidi ham yŏqoladi😂</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Ushbu kitob sifati sizga manzur bo`lganidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Ma'mura Nabijonqizi</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="15-08-2025">
                                            <span>15-08-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Ajoyib, juda zo’r, yılning eng yaxshi nashri nominatsiyasini bergan bo’lardim</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Ushbu kitob sizga yoqqanidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Ma'mura Nabijonqizi</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="15-08-2025">
                                            <span>15-08-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Ajoyib, juda zo’r, yılning eng yaxshi nashri nominatsiyasini bergan bo’lardim</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Ushbu kitob sizga yoqqanidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name"></span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="11-08-2025">
                                            <span>11-08-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">24 soatda yetib keldi ,
                                        Ko’rinishi huddi rasmda ko’rsatilgandek ajoyib
                                        Katta rahmat !</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Ushbu kitob va xizmatlarimiz sizga manzur bo`lganidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name"></span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="11-08-2025">
                                            <span>11-08-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">24 soatda yetib keldi ,
                                        Ko’rinishi huddi rasmda ko’rsatilgandek ajoyib
                                        Katta rahmat !</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Ushbu kitob va xizmatlarimiz sizga manzur bo`lganidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Alisher Musayev</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="10-08-2025">
                                            <span>10-08-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Hali o'qimadim, lekin sifati a'lo darajada</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Ushbu kitob sifati sizga manzur bo`lganidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Xursandov Adxamjon Furqat O‘g‘li</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="05-08-2025">
                                            <span>05-08-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Rahmat.</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Izohingiz uchun rahmat!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Nematullayeva Nargiza Uskanovna</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="03-08-2025">
                                            <span>03-08-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Просто нет слов я восторге </p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Добрый день. Мы рады, что вам понравилась эта книга!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Borir Zokirov </span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="24-07-2025">
                                            <span>24-07-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">24 soatga yetmasdan yetib keldi. Juda yaxshi qadoqlangan xolatda. Do'konga va asaxiyga katta rahmat👍</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Xizmatlarimiz sizga manzur bo`lganidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Borir Zokirov </span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="24-07-2025">
                                            <span>24-07-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">24 soatga yetmasdan yetib keldi. Juda yaxshi qadoqlangan xolatda. Do'konga va asaxiyga katta rahmat👍</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Xizmatlarimiz sizga manzur bo`lganidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Borir Zokirov </span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="21-07-2025">
                                            <span>21-07-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Juda zo'r qadoqlangan xolatda 24 soatga yetmasdan sifatli yetib keldi. Kitob sifati ham yaxshi. Kattakon rahmat👍</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Ushbu kitob va xizmatlarimiz sizga manzur bo`lganidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Borir Zokirov </span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="21-07-2025">
                                            <span>21-07-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Juda zo'r qadoqlangan xolatda 24 soatga yetmasdan sifatli yetib keldi. Kitob sifati ham yaxshi. Kattakon rahmat👍</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Ushbu kitob va xizmatlarimiz sizga manzur bo`lganidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Borir Zokirov </span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="21-07-2025">
                                            <span>21-07-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Juda zo'r qadoqlangan xolatda 24 soatga yetmasdan sifatli yetib keldi. Kitob sifati ham yaxshi. Kattakon rahmat👍</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Ushbu kitob va xizmatlarimiz sizga manzur bo`lganidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Borir Zokirov </span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="21-07-2025">
                                            <span>21-07-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Juda zo'r qadoqlangan xolatda 24 soatga yetmasdan sifatli yetib keldi. Kitob sifati ham yaxshi. Kattakon rahmat👍</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Ushbu kitob va xizmatlarimiz sizga manzur bo`lganidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Oybek</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">4</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="20-07-2025">
                                            <span>20-07-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Adashib zakaz qildik 2-marta</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. @asaxiybot ga murojaatingizni yozib qoldirsangiz, menejerlarimiz buyurtmani bekor qilishda yordam berishadi.                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Iskandarjon</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="20-07-2025">
                                            <span>20-07-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">juda zo'r rahmat</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Izohingiz uchun rahmat!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Iskandarjon</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="20-07-2025">
                                            <span>20-07-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">juda zo'r rahmat</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Izohingiz uchun rahmat!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Ди Наврузовна</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="19-07-2025">
                                            <span>19-07-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Tez yetkazib berishdi. men xariddan mamnunman, katta rahmat.</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Xizmatlarimiz sizga manzur bo`lganidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Илхом Юсупов</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">4</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="18-07-2025">
                                            <span>18-07-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Бир умрга эсда қоладигон китоб. </p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Izohingiz uchun rahmat!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Sirojov Bexruzjon Samaritdin O‘g‘li</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="18-07-2025">
                                            <span>18-07-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Асахий мард экан китобни алиштириб беришар экан рахмат каттакон</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Xizmatlarimiz sizga manzur bo`lganidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Shoxjaxon Payziqulov</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="16-07-2025">
                                            <span>16-07-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Oʻylaganimdan ham yaxshiroq keldi</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Ushbu kitob va xizmatlarimiz sizga manuz bo`lganidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Jonibek Arslonov</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">4</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="11-06-2025">
                                            <span>11-06-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Zoe</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Izohingiz uchun rahmat!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Muxtor Babajanov Muaddinovich</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="07-06-2025">
                                            <span>07-06-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Ajoyib asar</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Javhar Chorshanbiyeva                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Ushbu asar sizga yoqqanidan xursandmiz!                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Husayn</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="29-05-2025">
                                            <span>29-05-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Ha yoqdi tavsiya qilaman</p>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Ashurov Xayrullo Xakimovich</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="28-05-2025">
                                            <span>28-05-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Андижон шаҳар Фитрат кўчаси 214-уй деб кўрсатилган манзилда йўқ экан, сарсон-саргардон қилишди. Янги манзилни топгунча ўша китобни пули кетди. Телефон рақамим 99 324 09 73.</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Abdulaziz Muminov                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Avvalo keltirilgan noqulayliklar uchun uzr so'raymiz. Murojaatingizni tekshirib, agarda manzil ko'chgan bo'lsa biz ham o'zgartirib qo'yamiz.                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Nishonov Xasanboy Ahmadjon O‘g‘li</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="27-05-2025">
                                            <span>27-05-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">judayam ajoyib! ko'p minnatdormiz jamoadan)</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Abdulaziz Muminov                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum, kitob sizga yoqqanidan biz ham mamnunmiz.                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Rasulov Muhammadqodir</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="22-05-2025">
                                            <span>22-05-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Super</p>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Azizbek To'lqinov</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="16-05-2025">
                                            <span>16-05-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Nihoyat mening sevimli asarim, men kutgan holatda va sifatda nashr qilinibdi. Juda ham xursand bo'ldim, kitobni qo'limga olishim bilan yuqori sifati yaqqol sezildi. Mahsulotni tayyorlanishiga professionallik bilan yondashganligi uchun Asaxiy jamoasiga tashakkurimni aytib qolaman!</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Abdulaziz Muminov                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Fikrlaringiz uchun rahmat. Kitob sizga yoqqanidan mamnunmiz.                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Muhammadov Sherzod Shodmonboyevich</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="16-05-2025">
                                            <span>16-05-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Assalomu alaykum. Oʻzbek adabiyotida ham masalan, Oʻtgan kunlar, Ufq, jimjitlik, ikki eshik orasi asarlarini ham shunaqa zamonaviy dizayn, sifatli muqova va sahifalarda chop etinglar. Iltimos.</p>
                                    <div class="answer__item">
                                        <div class="answer__admin-pic">
                                            <div class="pic"
                                                 style="background-image: url(https://assets.asaxiy.uz/admin/no-image.jpg);"></div>
                                            <div class="asnwer__admin-name">
                                                Abdulaziz Muminov                                                        </div>
                                        </div>
                                        <div class="answer__body">
                                            <div class="asnwer__admin-text">
                                                Assalomu alaykum. Xo'p, taklifingiz uchun rahmat.                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback__item"
                                 itemprop="review"
                                 itemscope
                                 itemtype="https://schema.org/Review">
                                <span class="d-none" itemprop="itemreviewed">Александр Дюма: Граф Монте-Кристо (Asaxiy Books) (2та китоб)</span>
                                <div class="feedback__header">
                                    <div class="feedback__user"
                                         itemprop="author"
                                         itemscope
                                         itemtype="https://schema.org/Person">
                                        <span itemprop="name">Nafisaxon Parpiyeva</span>

                                        <span title="Отзыв о продукте, купленном в asaxiy"
                                              class="d-none">
                                            <svg width="24" height="20" class="ml-1 text-primary">
                                                <use xlink:href="/custom-assets/images/appbar.svg#cart"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="rating">
                                        <div class="stars"
                                             itemprop="reviewRating"
                                             itemscope itemtype="https://schema.org/Rating">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <meta itemprop="worstRating" content="1">
                                            <meta itemprop="bestRating" content="5">
                                            <span class="d-none"
                                                  itemprop="ratingValue">5</span>
                                        </div>
                                        <div class="date">
                                            <meta itemprop="datePublished"
                                                  content="15-05-2025">
                                            <span>15-05-2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback__body">
                                    <p class="feed__text"
                                       itemprop="reviewBody">Nechta tirajda nashr qilindi?</p>
                                </div>
                            </div>
                        </div>
                        <div class="links">
                            <button id="add-review" class="answer-link btn default-btn btn-orange-custom ml-1"
                                    data-toggle="modal"
                                    data-target="#give-feedback">Оставить отзыв</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FEEDBACKS END  -->
        </div>

        <div class="mb-40 position-relative product_slider_one-container mt-3">
            <div class="row custom-gutter swiper-container carousel-recommends-product position-relative">

                <div class="col-12 ">
                    <h2 class="section__title">
                        Рекомендуем                </h2>
                </div>
                <div class="swiper-wrapper">
                    <div class=" col-xl-15  swiper-slide h-auto swiper-slide-product ">


                        <div class="product__item d-flex flex-column justify-content-between product-installment-item "
                             data-installment-company-ids="27"
                             data-actual-price="59000"
                             data-installment-months="6,12">
                            <button type="button" class="product__item-heart border-0 p-0 bg-transparent" style="top: 45px"
                                    onclick="addToFavourites(this,591);addToWishlistGtag(this);">
                                <img data-value="-1" src="/custom-assets/images/icons/heart.svg" Избранное>
                            </button>

                            <button type="button"
                                    onclick="toggleCompare(591)"
                                    class="product__item-compare border-0 p-0 bg-transparent add-tocompare-591"
                                    style="top: 75px">
                                <img src="/custom-assets/images/icons/compare_gray.svg">
                            </button>
                            <div class="compare_add-success success-compare-591" style="display: none">
                                <div class="text_compare d-flex justify-content-between align-items-center text-center">
                                    <img src="/custom-assets/images/icons/compare_success.svg"
                                         alt="Добавил товар для сравнения">
                                    <p class="m-0"> Добавил товар для сравнения</p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <noindex class="w-100 d-flex justify-content-center align-items-center">
                                        <a href="/compare" class="link_compare-page btn"
                                           rel="nofollow"> Перейти к сравнению</a>
                                    </noindex>
                                </div>
                            </div>
                            <a href="/product/aleksandr-dyuma-graf-monte-kristo-if-kalasining-mahbusi-2-ta-kitob" onclick='selectItemGtag()'>
                                <div class="product__item-img swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img class="img-fluid lazyload"
                                                 data-src="https://cdn.asaxiy.uz/asaxiy-content/product/main_image/desktop/5e15bc142b1aa.jpg.webp"
                                                 loading="lazy"
                                                 itemprop="image"
                                                 onerror="this.onerror=null; this.src='https://assets.asaxiy.uz/product/main_image/desktop/5e15bc142b1aa.jpg.webp';"
                                                 title="Александр Дюма: Граф Монте Кристо Иф қалъасининг махбуси 2 та китоб - фото №1"
                                                 alt="Александр Дюма: Граф Монте Кристо Иф қалъасининг махбуси 2 та китоб">
                                        </div>

                                        <div class="swiper-slide">
                                            <img class="img-fluid lazyload"
                                                 data-src="https://cdn.asaxiy.uz/asaxiy-content/product/items/mobile/5e15bc144acfe.jpg.webp"
                                                 loading="lazy"
                                                 itemprop="image"
                                                 onerror="this.onerror=null; this.src='https://assets.asaxiy.uz/product/items/mobile/5e15bc144acfe.jpg.webp';"
                                                 title="Александр Дюма: Граф Монте Кристо Иф қалъасининг махбуси 2 та китоб - фото №2"
                                                 alt="Александр Дюма: Граф Монте Кристо Иф қалъасининг махбуси 2 та китоб купить">
                                        </div>
                                    </div>
                                </div>

                                <div class="product__item-info position-relative">
                                    <p class="title__link">
                                        <span class="product__item__info-title product-name-id-591">
                                            Александр Дюма: Граф Монте Кристо Иф қалъасининг махбуси 2 та китоб
                                        </span>
                                    </p>
                                    <div class="product__item-info--rating d-flex justify-content-between">
                                        <div class="product__item-rating--stars">

                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                        </div>
                                        <div class="product__item-info--comments">
                                            <svg width="12" height="12">
                                                <use xlink:href="#comment-icon" x="0" y="0"></use>
                                            </svg>
                                            <span>11 отзывов</span>
                                        </div>
                                    </div>

                                    <div class="product__item-info--prices">
                                        <div class="produrct__item-prices--wrapper">
                                                                            <span
                                                                                class="product__item-price product-main-price-id-591">59 000 сум</span>
                                            <div class="installment__price  p-1 mt-2 rounded mb-1 w-100"
                                                 style="border: 1px solid #fe7300 ; color: #fe7300">
                                                16 400 сум x 4 мес</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="mt-3">
                                <div class="row s__custom-gutter">
                                    <div class="col-sm-9 col-9"
                                         style="padding-right: 0">
                                        <a href="/order/one-click/aleksandr-dyuma-graf-monte-kristo-if-kalasining-mahbusi-2-ta-kitob"
                                           onclick="show_one_click(591);oneClickOrderGtag()"
                                           class="btn 1 btn_open_modal default-btn btn-primary-custom p-2 w-100  "
                                           style="font-size: 13px">

                                            <!-- replace long word to short on phone START -->
                                            Купить в один клик                            <!-- replace long word to short on phone END -->
                                        </a>                    </div>
                                    <div class="col-sm-3 col-3">
                                        <button type="button" class="product__item-cart-new border-0"
                                                onclick="addToCartAnim(this, 591);addToCartGtag(); cartModalAnim('https://assets.asaxiy.uz/product/main_image/mobile/5e15bc142b1aa.jpg.webp', 591,'320cac840bd8daa16849ae422cade7d0'); addCartTotal('591');">
                                            <img src="/custom-assets/images/icons/cart-single.svg">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

