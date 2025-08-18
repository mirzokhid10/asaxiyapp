<!-- PARTNERS  -->
<section class="partners features m-0 p-0 pb-5">
    <div class="container">
        <a href="/product/brands" class="d-flex justify-content-between align-items-center">
            <h3 class="section__title">
                Popular Brands </h3>
            <span class="text-primary h6 mr-3 d-block">All Brands</span>

        </a>
        <div class="swiper myBrandSwiper partners__list swiper-container swiper-initialized swiper-horizontal"
            style="padding: 15px 50px;">
            <div class="swiper-wrapper">
                @foreach ($brands as $brand)
                    <div class="swiper-slide">
                        <div class="feature__item partner__item">
                            <a href="{{ $brand->link }}" rel="nofollow">
                                <img class="partner__img" src="{{ asset($brand->image) }}" alt="{{ $brand->alt_text }}">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- PARTNERS END  -->
