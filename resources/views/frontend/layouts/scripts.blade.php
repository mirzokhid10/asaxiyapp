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

    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById("menuToggleBtn");
        const hamburger = toggleBtn.querySelector(".hamburger-small");
        const megaMenu = document.querySelector(".mega__menu");

        toggleBtn.addEventListener("click", function (e) {
            e.preventDefault();

            // toggle active class on hamburger
            hamburger.classList.toggle("active");

            // toggle visibility of mega__menu
            megaMenu.classList.toggle("active");
        });
    });


    $(document).ready(function () {
        var timeout = null; // Ensure 'timeout' is defined

        $(".mega__menu-list > li > .tab-open").on("mouseenter", function () {
            console.log("Hover detected on:", $(this).attr("data-id")); // Debug
            var thisElement = $(this);

            if (timeout != null) {
                clearTimeout(timeout);
            }

            timeout = setTimeout(function () {
                $(".mega__menu-right > .tab-content").removeClass("tab-active");
                $(
                    ".mega__menu-right > .tab-content[data-id='" +
                    thisElement.attr("data-id") +
                    "']"
                ).addClass("tab-active");
                $(".mega__menu-list > li > .tab-open").removeClass("opened");
                thisElement.addClass("opened");
                $(
                    ".mega__menu-right > .tab-content[data-id='" +
                    thisElement.attr("data-id") +
                    "'] .mega__menu-button-icon"
                ).addClass("active");
                setTimeout(function () {
                    $(
                        ".mega__menu-right > .tab-content[data-id='" +
                        thisElement.attr("data-id") +
                        "'] .mega__menu-button-icon"
                    ).removeClass("active");
                }, 1200);
            }, 250);
        });

        $(".mega__menu-list > li > .tab-open").on("mouseleave", function () {
            if (timeout != null) {
                clearTimeout(timeout);
                timeout = null;
            }
        });
    });

</script>
