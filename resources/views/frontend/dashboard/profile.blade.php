@extends('frontend.layouts.master')

@section('title')
    Profile
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
                            <div class="profile__content">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="profile__content-title mb-5">Profile Details</h2>
                                    <div class="subscription_hover position-absolute   bg-white" style="z-index: 99;">
                                        <p> Вы всегда будете в курсе скидок и акций!</p>
                                    </div>
                                    <div class="subscription hover_sub">
                                        <p class="m-0"> Subscribe</p>
                                        <form action="#">
                                            <label class="switch m-0" data-toggle="modal" data-target="#preorderModal">
                                                <input type="checkbox">
                                                <span class="slider-subscription round"></span>
                                            </label>
                                        </form>
                                        <!-- Modal -->
                                        <div class="modal fade" id="preorderModal" data-backdrop="static"
                                            data-keyboard="true" tabindex="-1" aria-labelledby="preorderModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content p-4 px-5 position-relative">
                                                    <button type="button"
                                                        class="btn preorder__close close bg-white rounded-circle"
                                                        data-dismiss="modal">
                                                        <img src="{{ Auth::user()->image }}" width="18">

                                                    </button>
                                                    <h5 class="modal-title font-weight-bold text-center h2"
                                                        id="preorderModalLabel">Введите адрес электронной почты и мы сообщим
                                                        вам</h5>
                                                    <div class="w-100 pt-2">
                                                        <form id="product-subscribe-form" action="/ajax/subscribe"
                                                            method="post">
                                                            <input type="hidden" name="_csrf-asaxiy"
                                                                value="ubdLflW3ooeVzH4D-hou4KAfdjaQt3UzeV1WoBP4xEjYxT86Gu7M8vmmOTWrKV_VzXo4Z-XtDUo-MgL_VpWjEg==">
                                                            <label for="preorderNameInput " style="font-size: 18px">Ваше
                                                                Имя</label>
                                                            <input type="text" required
                                                                class="form-control mb-3 mt-2 py-4" style="font-size: 16px"
                                                                id="preorderNameInput" name="full_name"
                                                                placeholder="Введите Ваше имя" aria-describedby="emailHelp"
                                                                value="Mirzohid Xudoyberdiyev">

                                                            <label for="preorderEmailInput"
                                                                style="font-size: 18px">Электронная почта</label>
                                                            <input type="email" class="form-control py-4" required
                                                                id="preorderEmailInput" name="mail"
                                                                placeholder="Введите Электронную почту"
                                                                aria-describedby="emailHelp" style="font-size: 16px"
                                                                value="mxudoyberdiyev21@gmail.com">
                                                    </div>

                                                    <div class="w-100 d-flex justify-content-center pt-3">
                                                        <button type="submit" id="checkSuccess"
                                                            class="btn default-btn btn-gray-custom w-50 text-center">Подтверждение</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--MODAL PREORDER END-->


                                        <!--MODAL PREORDER SUCCES START-->
                                        <!-- Button trigger modal -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="preorderModalSuccess" data-backdrop="static"
                                            data-keyboard="true" tabindex="-1" aria-labelledby="preorderModalSuccessLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content p-5 position-relative">
                                                    <button type="button"
                                                        class="btn preorder__close close bg-white rounded-circle"
                                                        data-dismiss="modal">
                                                        <img src="/custom-assets/images/icons/close_icon.svg"
                                                            width="18">

                                                    </button>
                                                    <div class="modal__success-top w-100 mb-3 text-center">
                                                        <img src="/custom-assets/images/success-modal.svg" class="w-35"
                                                            alt="">
                                                    </div>

                                                    <div class="modal__success-bottom text-center">
                                                        <h4 class="font-weight-bold">Поздравляем!</h4>
                                                        <h6 class="p-0 m-0 text-gray-custom">
                                                            Благодарим вас за интерес к продукту. Наши операторы свяжутся с
                                                            вами, как только начнется продажа. </h6>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--MODAL PREORDER SUCCES END-->
                                    </div>
                                </div>
                                <div class="profile__content-img overflow-hidden mb-4">
                                    <img src="{{ Auth::user()->image }}" class="rounded-circle img-fluid w-100 h-100"
                                        alt="Mirzohid Xudoyberdiyev">
                                </div>
                                <div class="row custom-gutter">
                                    <div class="col-xl-4">
                                        <div class="profile__content-data">
                                            <span class="profile__content-label">Full Name:</span>
                                            <span class="profile__content-value">{{ Auth::user()->name }}</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="profile__content-data">
                                            <span class="profile__content-label">Passport Series:</span>
                                            <span
                                                class="profile__content-value">{{ Auth::user()->passport_seria ?? 'Passport Serie Not Yet Provided' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="profile__content-data">
                                            <span class="profile__content-label">Birth Date:</span>
                                            <span
                                                class="profile__content-value">{{ Auth::user()->birth_date ?? 'Birth Date Not Yet Provided' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="profile__content-data">
                                            <span class="profile__content-label">Email:</span>
                                            <span
                                                class="profile__content-value">{{ Auth::user()->email ?? 'Email Not Yet Provided' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="profile__content-data">
                                            <span class="profile__content-label">Phone:</span>
                                            <span class="profile__content-value"> <span
                                                    class="profile__content-value">{{ Auth::user()->phone ?? 'Phone Number Not Yet Provided' }}
                                                </span></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="profile__content-data">
                                            <span class="profile__content-label">Address: </span>
                                            <span
                                                class="profile__content-value">{{ Auth::user()->address ?? 'Address Not Yet Provided' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="profile__content-data">
                                            <span class="profile__content-label">Job Address: </span>
                                            <span
                                                class="profile__content-value">{{ Auth::user()->job_address ?? 'Job Address Not Yet Provided' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="profile__content-data">
                                            <span class="profile__content-label">Пол:</span>
                                            <span class="profile__content-value"> Неизвестный</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mt-5">
                                    <a href="{{ route('user.profile.edit') }}"
                                        class="btn default-btn btn-primary-custom py-2 px-5 mx-auto">
                                        Edit</a>
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
                    <a class="payment_items" href="/uzumbank/M" .><img
                            src="/custom-assets/images/logos/uzum_logo.svg"></a>
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
@endsection
