<section class="hero">
    <div class="container hero__container">
        <div class="col-lg-12 col-12  mt-3 mt-lg-0 weekly__discount">
            <div class="weekly__discount-head">
                <a href="/product/product-list/super-price"
                   class="d-flex  w-100 justify-content-between align-items-center">
                    <h3 class="section__title mb-2">Super Prices</h3>
                    <span class="text-primary h6 mr-1 d-block">All Products</span>
                </a>
            </div>
            <div class="weekly__discount-carousel swiper-container ">
                <div class="d-flex justify-content-around control-carusel carousel-icon-box">
                    <img src="{{asset('frontend/icons/prev-weekly.svg')}}"
                         style="left: 10px;"
                         class="icon_carusel-cantrol   weekly-btn-prev mr-2">
                    <img src="{{asset('frontend/icons/next-weekly.svg')}}"
                         style="right: -25px;"
                         class="icon_carusel-cantrol   weekly-btn-next">
                </div>
                <div class="weekly__discount-box swiper-wrapper super-price">
                    @foreach( $flashSaleItems as $item)
                        @php
                            $product = \App\Models\Products::find($item->product_id);
                        @endphp
                        <a class="swiper-slide p-2 weekly__product-link m-0" href="{{route('product-detail', $product->slug)}}"
                       style="width: 210px">
                        <div class="weekly__discount-product ">
                            <div class="weekly__product">
                                <div class="img-blog">
                                    <img class="mx-auto" src="{{asset($product->thumb_image)}}" alt="{{$product->name}}"
                                         onerror="this.onerror=null; this.src='{{$product->name}}';">

                                </div>
                                <div class="weekly__product-details">
                                    <p class="weekly__product-title box-right-slider "> {{$product->name}} </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p>{{$product->price}} {{$product->sku}}</p>
                                        @if(checkDiscount($product))
                                            <span class="text-danger" style="text-decoration: none">-{{calculateDiscountPercent($product->price, $product->discount_price)}}%</span>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center "><p
                                            class=" color__blue-weekly bold text-decoration-none h3"> {{$product->discount_price}} {{$product->sku}}</p>
                                        <span><i class="fas fa-star"
                                                 style="color:#fe7300"></i>5</span>
                                    </div>
                                    <button
                                        class="mt-2 text-bold"> {{$product->created_at->format('d.m.Y')}}</button>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- HERO END  -->
