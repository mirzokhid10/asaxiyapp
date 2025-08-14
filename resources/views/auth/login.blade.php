<div class="modal fade" id="profile-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal" role="document">
        <div class="modal-content position-relative">

            <button type="button" class="btn login__close close bg-white rounded-circle" data-bs-dismiss="modal">
                <img src="{{ asset('frontend/icons/close.svg') }}" width="18">
            </button>
            <div class="d-flex flex-row ">
                <div class="login__modal-left">
                    <div class="modal-body">
                        <div class="login__modal-content">
                            <ul class="nav nav-pills text-center d-flex justify-content-center align-items-center mb-4"
                                id="pills-tab" role="tablist">
                                <li class="login-title text-center border-none m-0" role="presentation">
                                    <button class="bg-white border-0 active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Sign In</button>
                                </li>
                                <p class="login-title text-center d-flex justify-content-center align-items-center m-0">
                                    Or
                                </p>
                                <li class="login-title text-center m-0" role="presentation">
                                    <button class="bg-white border-0" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Register</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <form method="post" action="{{ route('login') }}">
                                        @csrf
                                        <input type="hidden" name="_token" value="...">
                                        <div class="login__withnumber">

                                            <div class="form-group field-loginform-phone required">
                                                <label class="control-label" for="loginform-phone">Email</label>
                                                <input class="form-control" style="font-weight:300 !important;"
                                                    id="email" type="email" name="email"
                                                    placeholder="user@example.com" autocomplete="off"
                                                    aria-required="true">
                                            </div>

                                            <div class="form-group field-loginform-phone required">
                                                <label class="control-label" for="loginform-phone">Password</label>
                                                <input class="form-control" style="font-weight:300 !important;"
                                                    id="password" type="password" name="password" placeholder="****"
                                                    aria-required="true">
                                            </div>


                                            <button class="btn default-btn btn-primary-custom login__modal-btn"
                                                type="submit">login</button>

                                            <!--                            <a href="#" class="withmail__btn trigger__btn" onclick="withMail()">Email bilan ro`yxatdan o`ting</a>-->
                                        </div>
                                    </form>
                                    <div class="sign__in ">
                                        <div class="sign__in-title my-4">or</div>
                                        <div id="w0">
                                            <ul class="auth-clients">
                                                <li><a class="google auth-link"
                                                        href="{{ route('auth.redirect', ['provider' => 'google']) }}"
                                                        title="Google"><img
                                                            src="{{ asset('frontend/icons/google.svg') }}"
                                                            style="width: 24px; height:24px;" alt="Google"></a>
                                                </li>
                                                <li><a class="facebook auth-link"
                                                        href="{{ route('auth.redirect', ['provider' => 'facebook']) }}"
                                                        title="Facebook"><img
                                                            src="{{ asset('frontend/icons/facebook.svg') }}"
                                                            style="width: 24px; height:24px;" alt="Facebook"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <input type="hidden" name="_token" value="...">
                                        <div class="login__withnumber">

                                            <div class="form-group field-loginform-phone required">
                                                <label class="control-label" for="loginform-phone">Name</label>
                                                <input id="name" class="form-control"
                                                    style="font-weight:300 !important;" type="text" name="name"
                                                    placeholder="Name" autocomplete="off" aria-required="true">
                                            </div>

                                            <div class="form-group field-loginform-phone required">
                                                <label class="control-label" for="loginform-phone">Email</label>
                                                <input id="email" class="form-control"
                                                    style="font-weight:300 !important;" type="email" name="email"
                                                    placeholder="Email" autocomplete="off" aria-required="true">
                                            </div>

                                            <div class="form-group field-loginform-phone required">
                                                <label class="control-label" for="loginform-phone">Password</label>
                                                <input id="password" class="form-control"
                                                    style="font-weight:300 !important;" type="password"
                                                    name="password" placeholder="****" autocomplete="off"
                                                    aria-required="true">
                                            </div>

                                            <div class="form-group field-loginform-phone required">
                                                <label class="control-label" for="loginform-phone">Password
                                                    Confirmation</label>
                                                <input class="form-control" style="font-weight:300 !important;"
                                                    id="password_confirmation" type="password"
                                                    name="password_confirmation" placeholder="****"
                                                    aria-required="true">
                                            </div>


                                            <button class="btn default-btn btn-primary-custom login__modal-btn"
                                                type="submit">Register</button>

                                            <!--                            <a href="#" class="withmail__btn trigger__btn" onclick="withMail()">Email bilan ro`yxatdan o`ting</a>-->
                                        </div>
                                    </form>

                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="login__modal-right">
                    <div class="login__modal-right--list">
                        <div class="login-modal__right__item d-flex align-items-center">
                            <div
                                class="icon rounded-circle bg-white flex-shrink-0 d-flex align-items-center justify-content-center">
                                <img src="/custom-assets/images/icons/market.svg" alt="market icon" width="35.2"
                                    height="32">
                            </div>
                            <div class="info">
                                <div class="info__title">Больше не нужно ходить на базар</div>
                                <span>У нас выгодные цены и доставка до дома</span>
                            </div>
                        </div>
                        <div class="login-modal__right__item d-flex align-items-center">
                            <div
                                class="icon rounded-circle bg-white flex-shrink-0 d-flex align-items-center justify-content-center">
                                <img src="/custom-assets/images/icons/fast-delivery.svg" alt="fast-delivery"
                                    width="30.8" height="28">
                            </div>
                            <div class="info">
                                <div class="info__title">Быстрая доставка</div>
                                <span>Наш сервис удивит вас</span>
                            </div>
                        </div>
                        <div class="login-modal__right__item d-flex align-items-center">
                            <div
                                class="icon rounded-circle bg-white flex-shrink-0 d-flex align-items-center justify-content-center">
                                <img src="/custom-assets/images/icons/return.svg" alt="return" width="32.4"
                                    height="24">
                            </div>
                            <div class="info">
                                <div class="info__title">Удобства для вас</div>
                                <span>Быстрое оформление и гарантия на возврат в случае неисправности</span>
                            </div>
                        </div>
                        <div class="login-modal__right__item d-flex align-items-center">
                            <div
                                class="icon rounded-circle bg-white flex-shrink-0 d-flex align-items-center justify-content-center">
                                <img src="/custom-assets/images/icons/card.svg" alt="card" width="30"
                                    height="20">
                            </div>
                            <div class="info">
                                <div class="info__title">Рассрочка</div>
                                <span>Без предоплат</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
