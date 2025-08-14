<aside class="profile__left">
    <div class="profile__left-data  pt-3 px-3">
        <div class="d-flex align-items-center border-bottom pb-4 mb-4">
            <div class="profile__left-img overflow-hidden mr-3">
                <img src="{{ Auth::user()->image }}" alt="Mirzohid Xudoyberdiyev"
                    class="rounded-circle img-fluid w-100 h-100">
            </div>
            <div class="profile__left-content flex-fill">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="profile__left-title mb-2">
                        {{ Auth::user()->name }} </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">

                    <div class="profile__left-id">
                        ID: {{ Auth::user()->user_code }} </div>
                </div>
            </div>
        </div>
    </div>

    <div class="profile__left-actions px-4">
        <div class="border-bottom pb-4 mb-2">
            <div class="row custom-gutter">
                <div class="col-6">
                    <div class="profile__balance">
                        <div class="label">Balance:</div>
                        <div class="value">0 uzs</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="profile__balance">
                        <div class="label">Score:</div>
                        <div class="value">0 uzs </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <a style="text-wrap: wrap;height: 100%; display:flex; align-items: center; justify-content: center"
                        class="btn default-btn btn-primary-custom  w-100" href="/site/pay?user_id=1852">Top up
                        account</a>
                </div>
                <div class="col-sm-6 col-md-6">
                    <a style="text-wrap: wrap;height: 100%; display:flex; align-items: center; justify-content: center"
                        class="btn default-btn btn-primary-custom  w-100" href="/profile/promo-code">Activate coupon
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="d-flex flex-column profile-tabs mb-1">
        <a class="nav-link tab-item border-0 d-flex align-items-start w-100" href="{{ route('user.profile') }}">
            <img class="mr-3" src="{{ asset('frontend/icons/personaluser.svg') }}" width="24"
                height="24"alt="">
            <span>Profile details</span>
        </a>
        <a class="nav-link tab-item border-0 d-flex align-items-start w-100 " href="/profile/asaxiy-plus">
            <img width="24" height="24" class="mr-3" src="/custom-assets/images/icons/plus.svg"
                alt=""Asaxiy-plus" />
            <span>
                Asaxiy-plus </span>
        </a>
        <a class="nav-link tab-item border-0 d-flex align-items-start w-100 " href="/profile/trust">
            <img width="24" height="24" class="mr-3" src="/custom-assets/images/trust-badge.svg"
                alt=""EL-Yurt Ishonchi"">
            <span>
                "EL-Yurt Ishonchi" </span>
        </a>
        <a class="nav-link tab-item border-0 d-flex align-items-start w-100
" href="/profile/my-cards">
            <svg width="24" height="24" class="mr-3">
                <use xlink:href="/custom-assets/images/asaxiy-icons.svg#card"></use>
            </svg>
            <span>
                Карты </span>
        </a>
        <a class="nav-link tab-item border-0 d-flex align-items-start w-100 " href="/profile/transactions">
            <svg width="24" height="24" class="mr-3">
                <use xlink:href="/custom-assets/images/asaxiy-icons.svg#card"></use>
            </svg>
            <span>
                Транзакции </span>
        </a>
        <a class="nav-link tab-item border-0 d-flex align-items-start w-100 active" href="/profile/orders">
            <svg width="24" height="24" class="mr-3">
                <use xlink:href="/custom-assets/images/asaxiy-icons.svg#box"></use>
            </svg>
            <span>
                Заказы </span>
        </a>
        <a class="nav-link tab-item border-0 d-flex align-items-start w-100 " href="/profile/installments">
            <svg width="24" height="24" class="mr-3">
                <use xlink:href="/custom-assets/images/asaxiy-icons.svg#box"></use>
            </svg>
            <span>
                Рассрочки </span>
        </a>
        <a class="nav-link tab-item border-0 d-flex align-items-start w-100 " href="/profile/chat">
            <svg width="24" height="24" class="mr-3">
                <use xlink:href="/custom-assets/images/asaxiy-icons.svg#book-reading"></use>
            </svg>
            <span>
                Chat </span>
        </a>
        <a class="nav-link tab-item border-0 d-flex align-items-start w-100 " href="/profile/my-address">
            <img src="/custom-assets/images/addres_icon.svg" width="24" height="24" class="mr-3">
            <span>
                Мои адреса </span>
        </a>
    </div>
    <div class="px-4">
        <form method="POST" action="{{ route('logout') }}"
            class="nav-link border-top px-0 tab-item d-flex align-items-start w-100">
            @csrf
            <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
            this.closest('form').submit();">
                <svg width="24" height="24" class="mr-3">
                    <use xlink:href="/custom-assets/images/asaxiy-icons.svg#logout"></use>
                </svg>
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </div>
</aside>
