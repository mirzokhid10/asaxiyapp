@extends('frontend.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <main>
        <section class="profile-section pt-2 mb-40">
            <div class="container">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble" itemscope
                        itemtype="https://schema.org/BreadcrumbList">
                        <li class="breadcrumb-item" itemprop="itemListElement" itemscope
                            itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="/">
                                <span itemprop="name">
                                    Main </span>
                                <img src="{{ asset('frontend/icons/arrow-right.svg') }}" alt="arrow-right" height="12"
                                    width="12">
                            </a>
                        </li>
                        <li class=" active" aria-current="page">
                            <span>Profile</span>
                        </li>
                    </ol>
                </nav>

                <div>
                    <div class="row">
                        <div class="col-lg-4 mb-4 mb-lg-0">
                            @include('frontend.dashboard.layouts.sidebar')
                        </div>
                        <div class="col-lg-8">
                            <div class="profile__content profil_oreder_table">
                                <h4 class="profile__content-title mb-4">
                                    Мои заказы </h4>

                                <div id="p0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
                                    <div id="w0" class="grid-view">
                                        <div class='profile-tables'>
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>#</th>
                                                        <th>Номер заказа</th>
                                                        <th>Дата заказа</th>
                                                        <th>Сумма</th>
                                                        <th>Статус</th>
                                                        <th class="action-column">Действии</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="6">
                                                            <div class="empty">Ничего не найдено.</div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <nav class='pagination__nav'></nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="payment-modal">
            <div class="payment_modal-content">
                <h2 class="text-center">Выберите тип платежа</h2>
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <a class="payment_items" href="/uzumbank/M" .><img src="/custom-assets/images/logos/uzum_logo.svg"></a>
                    <a class="payment_items" href="/payme/M"><img src="/custom-assets/images/logos/payme_logo.svg"></a>
                    <button class="payment_items border-0" id="open_asaxiy_balans"><img
                            src="/custom-assets/images/company/favicon-16x16.png" width="35">Asaxiy Баланс </button>
                    <button class="payment_items border-0" id="open_my_cards-1"><img
                            src="/custom-assets/images/logos/my_cards.svg"> Мои карты </button>
                </div>
            </div>
            <div class="payment_asaxiy-balans">
                <div class="d-flex w-75 justify-content-between align-items-center">
                    <button class="go_back-payments-asaxiy border-0 p-0" style="border-radius: 50%">
                        <img src="/custom-assets/images/icons/go_back.svg" width="48" height="48">
                    </button>
                    <h2 class="text-center">Asaxiy Баланс</h2>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="profile__balance d-flex justify-content-between">
                            <div class="label">Баланс:</div>
                            <div class="value">0 сум</div>
                        </div>
                    </div>
                    <div class="col-12 mt-3 d-none">
                        <form class="form_asaxiy-balans" action="/profile/pay-via-asaxiy" method="post">
                            <input type="hidden" name="_csrf-asaxiy"
                                value="EG9Aow4vXXTgS-Xg_iQuYqTbGaWOw4Xm4L9cNx9TnthxHTTnQXYzAYwhotavF19Xyb5X9PuZ_Z-n0AhoWj75gg==">
                            <div class="d-flex justify-content-start flex-column d-none">
                                <label for="input_asaxiy-balans" style="text-align: start">Сумма платёжи</label>
                                <input type="text" id="input_asaxiy-balans" name="amount"
                                    placeholder="Miqdorni kiriting" value="0">
                            </div>
                    </div>
                    <span class="text-warning text-center w-100 mt-3 ">
                        Hisobingizda mablag’ yetarli emas. Oldin hisobingizni to’ldiring </span>
                </div>
                <div class="w-100 mx-auto d-flex justify-content-center align-items-center mt-3  d-none">
                    <button type="submit" class="btn default-btn btn-primary-custom"> Оплатить</button>
                </div>
            </div>
            <div class="my_cards_payment">
                <div class="d-flex w-75 justify-content-between align-items-center">
                    <button class="go_back-payments-cards border-0 p-0" style="border-radius: 50%">
                        <img src="/custom-assets/images/icons/go_back.svg" width="48" height="48">
                    </button>
                    <h2 class="text-center">Мои карты</h2>
                </div>
                <div class="row mt-5">
                    <div class="position-relative">
                        <img src="/custom-assets/images/icons/next-weekly.png" class="icon_carusel-cantrol next-card"
                            style="right: -35px; w">
                        <img src="/custom-assets/images/icons/prev-weekly.png" class="icon_carusel-cantrol prew-card"
                            style="left: 0">
                        <div class="row swiper-container carousel-cards position-relative">
                            <div class="swiper-wrapper">
                                <div class=" col-6 swiper-slide">
                                    <img class="w-100" src="/custom-assets/images/student/card_img.png">
                                </div>
                                <div class="col-6  swiper-slide">
                                    <img class="w-100" src="/custom-assets/images/student/card_img.png">
                                </div>
                                <div class="col-6  swiper-slide">
                                    <img class="w-100" src="/custom-assets/images/student/card_img.png">
                                </div>
                                <div class="col-6  swiper-slide">
                                    <img class="w-100" src="/custom-assets/images/student/card_img.png">
                                </div>
                                <div class="col-6  swiper-slide">
                                    <img class="w-100" src="/custom-assets/images/student/card_img.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="text-secondary my-4 mx-auto">
                        <input type="checkbox">
                        Hisobingizda mablag’ yetarli emas. Oldin hisobingizni to’ldiring </span>
                </div>
                <div class="w-75 mx-auto d-flex justify-content-between align-items-center mt-3">
                    <a href="#" class="btn default-btn outline__default-btn primary-outline-custom"> Yangi karta
                        qo'shish</a>
                    <a href="#" class="btn default-btn btn-primary-custom "> Оплатить</a>
                </div>
            </div>
        </div>
        <div id="degree-modal-id" class="fade modal" size="modal-lg" role="dialog">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body">
                        <div id='degree-modal-content'></div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <section class="features" style="background: #006bff">
        <div class="container ">
            <div class="features__list">
                <a href="#" class="feature__item pointer__e-none">
                    <div class="feature__img">
                        <img class="img-fluid lazyload" data-src="/custom-assets/images/icons/market.svg" alt="market"
                            loading="lazy">
                    </div>
                    <div class="feature__text">
                        <div class="feature__title">Больше не нужно ходить на базар</div>
                        <p>У нас выгодные цены и доставка до дома</p>
                    </div>
                </a>
                <a href="/page/delivery" class="feature__item">
                    <div class="feature__img">
                        <img class="img-fluid lazyload" data-src="/custom-assets/images/icons/fast-delivery.svg"
                            alt="delivery" loading="lazy">
                    </div>
                    <div class="feature__text">
                        <div class="feature__title">Быстрая доставка</div>
                        <p>Наш сервис удивит вас</p>
                    </div>
                </a>
                <a href="/page/rules" class="feature__item">
                    <div class="feature__img">
                        <img class="img-fluid lazyload" data-src="/custom-assets/images/icons/return.svg" alt="return"
                            loading="lazy" style="max-width: none;">
                    </div>
                    <div class="feature__text">
                        <div class="feature__title">Удобства для вас</div>
                        <p>Быстрое оформление и гарантия на возврат в случае неисправности</p>
                    </div>
                </a>
                <a href="/page/usloviya-rassrochki" class="feature__item">
                    <div class="feature__img">
                        <img class="img-fluid lazyload" data-src="/custom-assets/images/icons/card.svg" alt="card"
                            loading="lazy">
                    </div>
                    <div class="feature__text">
                        <div class="feature__title">Рассрочка</div>
                        <p>Без предоплаты на 3, 6 или 12 месяцев</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection
