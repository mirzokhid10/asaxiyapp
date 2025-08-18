<script>
    const swiper = new Swiper('.myBrandSwiper', {
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            reverseDirection: true, // 👈 Slides right to left
        },
        slidesPerView: 1,
        spaceBetween: 20,
        allowTouchMove: true,
        direction: 'horizontal',
        speed: 600,
        navigation: false, // 👈 No arrows

        breakpoints: {
            640: {
                slidesPerView: 3
            },
            768: {
                slidesPerView: 5
            },
            1024: {
                slidesPerView: 6
            },
        }
    });
</script>
