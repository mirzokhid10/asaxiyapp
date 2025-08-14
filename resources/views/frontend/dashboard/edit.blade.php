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
                            <div class="profile__content edit__profile-content">
                                <h2 class="profile__content-title mb-4">Profile Details</h2>
                                <form action="{{ route('user.profile.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="_csrf-asaxiy"
                                        value="dRtiBJvUmiK2hfDnQ-usR4fcA5ZWncdbaqboEu5W3C8UaRZA1I30V9rvt9ES2N1y6rlNxyPHvyItybxNqzu7dQ==">
                                    <div class="d-flex justify-content-center">
                                        <div class="profile__content-img position-relative mb-4">
                                            <img class="file-upload-image rounded-lg img-fluid rounded-circle"
                                                src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/icons/no-image.png') }}"
                                                alt="your image" />
                                            <label for="image"
                                                class="file-upload-btn btn btn-white-custom rounded-circle d-flex justify-content-center align-items-center"
                                                style="cursor: pointer;">
                                                <img width="28px" src="{{ asset('frontend/icons/image_edit.svg') }}"
                                                    alt="">
                                            </label>
                                            <input type="file" name="image" id="image" style="display: none;">
                                            @if ($errors->has('image'))
                                                <div class="text-danger">{{ $errors->first('image') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <div class="form-group field-passport_seria_">
                                                <label class="control-label" for="passport_seria">Passport Series</label>
                                                <input type="text" class="form-control" name="passport_seria"
                                                    value="{{ Auth::user()->passport_seria }}" maxlength="9">
                                                @if ($errors->has('passport_seria'))
                                                    <div class="text-danger">{{ $errors->first('passport_seria') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group field-name">
                                                <label class="control-label" for="name">Full Name</label>
                                                <input type="text" class="form-control  date-class read-only-class"
                                                    name="name" value="{{ Auth::user()->name }}" autocomplete="off"
                                                    placeholder="Full Name" data-plugin-inputmask="inputmask_cbb1a66c">

                                                @if ($errors->has('name'))
                                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group field-full_phone">
                                                <label class="control-label" for="full_phone">Phone</label>
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{ Auth::user()->phone }}" maxlength="255">

                                                @if ($errors->has('phone'))
                                                    <div class="text-danger">{{ $errors->first('phone') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group field-email_">
                                                <label class="control-label" for="email_">Email</label>
                                                <input type="text" class="form-control" name="email"
                                                    value="{{ Auth::user()->email }}" maxlength="255">

                                                @if ($errors->has('email'))
                                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <div class="form-group field-birht_date">
                                                <label class="control-label" for="birht_date">Birth Date</label>
                                                <input type="text" class="form-control" name="birth_date"
                                                    value="{{ Auth::user()->birth_date }}" placeholder="18.12.1995">
                                                @if ($errors->has('birth_date'))
                                                    <div class="text-danger">{{ $errors->first('birth_date') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group field-phone+">
                                                <label class="control-label" for="phone+">Address</label>
                                                <input type="text" class="form-control" name="address"
                                                    value="{{ Auth::user()->address }}">
                                                @if ($errors->has('address'))
                                                    <div class="text-danger">{{ $errors->first('address') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group field-phone+">
                                                <label class="control-label" for="phone+">Job Address</label>
                                                <input type="text" class="form-control" name="job_address"
                                                    value="{{ Auth::user()->job_address }}">

                                                @if ($errors->has('job_address'))
                                                    <div class="text-danger">{{ $errors->first('job_address') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-32 text-center">
                                        <button type="submit" class="btn btn-primary-custom default-btn"
                                            style="background-color: #006bff;">
                                            Save Changes </button>
                                    </div>
                                </form>
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
