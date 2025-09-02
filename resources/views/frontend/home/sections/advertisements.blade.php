
<section class="section mb-40 ">
    <div class="row flex-lg-nowrap flex-wrap m-0 static_banner-box " style="gap: 20px;">
        @foreach ($homepage_secion_banner_ads as $homepage_secion_banner_ad)
            <div class="download__app  {{ $homepage_secion_banner_ad->banner_style }} col-lg-6 col-12"
                style="margin-top: 200px">
                <div class="circle circle--large"></div>
                <div class="circle circle--small"></div>
                <div class="app-content">
                    <div class="download__app-header">
                        <a class="logo" href="{{ $homepage_secion_banner_ad->banner_url }}">
                            <img src="{{ $homepage_secion_banner_ad->banner_logo }}" class="lazyload" alt="asaxiy logo"
                                loading="lazy">
                        </a>
                        <p>{{ $homepage_secion_banner_ad->banner_text }}</p>
                    </div>
                    <div class="qr_code d-flex justify-content-center mb-2 p-1 rounded">
                        <img src="{{ $homepage_secion_banner_ad->banner_qr }}" alt="" width="100"
                            height="100">
                    </div>
                    <div class="download__app-footer">
                        <a class="app-link" href="https://apps.apple.com/uz/app/asaxiy-market/id1532401944"
                            rel="nofollow" target="_blank">
                            <img src="{{ $homepage_secion_banner_ad->banner_appstore }}" class="lazyload rounded"
                                alt="asaxiy market app" loading="lazy">
                        </a>
                        <a class="app-link" href="https://play.google.com/store/apps/details?id=uz.asaxiy.market"
                            rel="nofollow" target="_blank">
                            <img src="{{ $homepage_secion_banner_ad->banner_googleplay }}" class="lazyload rounded"
                                alt="asaxiy market app" loading="lazy">
                        </a>
                    </div>
                </div>
                <div class="app-img d-none d-md-flex justify-content-md-center">
                    <img src="{{ $homepage_secion_banner_ad->banner_app_image }}" class="lazyload"
                        alt="asaxiy app image" loading="lazy">
                </div>
            </div>
        @endforeach
    </div>
</section>
