// LAZYLOAD IMAGES
$("img.lazyload").lazyload();

function fireworks() {
    const duration = 4 * 1000,
        animationEnd = Date.now() + duration,
        defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 100 };

    function randomInRange(min, max) {
        return Math.random() * (max - min) + min;
    }

    const interval = setInterval(function () {
        const timeLeft = animationEnd - Date.now();

        if (timeLeft <= 0) {
            return clearInterval(interval);
        }

        const particleCount = 60 * (timeLeft / duration);

        // since particles fall down, start a bit higher than random
        confetti(
            Object.assign({}, defaults, {
                particleCount,
                origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 },
            })
        );
        confetti(
            Object.assign({}, defaults, {
                particleCount,
                origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 },
            })
        );
    }, 250);
}

// Go to Top
$(window).on("scroll", function () {
    let scrolled = $(window).scrollTop();
    if (scrolled > 300) $(".go-top").addClass("active");
    if (scrolled < 300) $(".go-top").removeClass("active");
});

$(document).ready(function () {
    // select
    $("select.nc__select").niceSelect();
    // tooltip
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
});

// Click Event
$(".go-top").on("click", function () {
    $("html, body").animate({ scrollTop: "0" }, 500);
});

// swiper
if ($(".hero__big-slider").length) {
    var swiperHero = new Swiper(".hero__big-slider", {
        loop: true,
        autoplay: {
            delay: 10000,
            disableOnInteraction: false,
        },
        preloadImages: false,
        lazy: true,
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
            clickable: true,
        },
    });
}
if ($(".product__item-img").length) {
    var productImageSlider = new Swiper(".product__item-img", {
        slidesPerView: 1,
        spaceBetween: 30,
        effect: "fade",
        fadeEffect: {
            crossFade: true,
        },
    });

    var cards = document.querySelectorAll(".product__item");
    for (var i = 0; i < cards.length; i++) {
        cards[i].addEventListener("mouseenter", function (event) {
            var swiper =
                event.currentTarget.querySelector(".swiper-container").swiper;
            swiper.params.autoplay.delay = 500;
            swiper.autoplay.start();
        });
        cards[i].addEventListener("mouseleave", function (event) {
            var swiper =
                event.currentTarget.querySelector(".swiper-container").swiper;
            swiper.autoplay.stop();
        });
    }
}
$("#copy-proudct-btn").on("click", function () {
    let copyText = document.getElementById("copy-proudct-link");
    copyText.select();
    document.execCommand("copy");
});

let shareBtn = document.getElementById("shareBtn");
let shareShape = document.getElementById("shareShape");
if (shareBtn != null) {
    shareBtn.addEventListener("mouseover", () => {
        shareShape.classList.add("show");
    });

    shareBtn.addEventListener("mouseout", () => {
        shareShape.classList.remove("show");
    });
}
if (shareBtn != null) {
    shareShape.addEventListener("mouseover", () => {
        shareShape.classList.add("show");
    });

    shareShape.addEventListener("mouseout", () => {
        shareShape.classList.remove("show");
    });
}

if ($(".partners__list").length) {
    var swiperPartners = new Swiper(".partners__list", {
        // slidesPerView: 7,
        spaceBetween: 20,
        mousewheel: true,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
            },
            481: {
                slidesPerView: 3,
            },
            576: {
                slidesPerView: 4,
            },
            768: {
                slidesPerView: 5,
            },
            1025: {
                slidesPerView: 6,
            },
            1200: {
                slidesPerView: 8,
            },
        },
    });
}

if ($(".managers__slider").length) {
    var managersSlider = new Swiper(".managers__slider", {
        slidesPerView: "auto",
        spaceBetween: 32,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
}

if ($(".hd-slider").length) {
    var swiperHd = new Swiper(".hd-slider", {
        slidesPerView: 1,
        loop: true,
        mousewheel: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
}
if ($(".hd-even-slider").length) {
    var swiperHdEven = new Swiper(".hd-even-slider", {
        slidesPerView: 2,
        spaceBetween: 30,
        loop: true,
        mousewheel: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
        },
    });
}
// sidebar
let sidebar = $(".sidebar");
let sidebarOverlay = $(".sidebar__overlay");
let hamburger = $(".hamburger");

$(document).on("click", ".btn-toggle", function (e) {
    e.preventDefault();
    hamburger.toggleClass("active");
    sidebar.toggleClass("active");
    sidebarOverlay.toggleClass("active");
});

$(document).keyup(function (e) {
    if (e.keyCode === 27) {
        hamburger.removeClass("active");
        sidebar.removeClass("active");
        sidebarOverlay.removeClass("active");
    }
});

sidebarOverlay.on("click", function (evt) {
    if (evt.target.matches(".sidebar__overlay")) {
        hamburger.removeClass("active");
        sidebar.removeClass("active");
        sidebarOverlay.removeClass("active");
    }
});

let hamburgerSmall = $(".hamburger-small");
let megaMenu = $(".mega__menu");
const megaMenu = $(".mega__menu");


function openMenu() {
    $(".header__bottom").removeClass("d-none");
    $("body").addClass("overflow-hidden");
    hamburgerSmall.addClass("active");
}

function closeMenu() {
    $("body").removeClass("overflow-hidden");
    hamburgerSmall.removeClass("active");
}

$("#menuToggleBtn").on("click", function (e) {
    e.preventDefault();
    megaMenu.toggleClass("active");
    if (megaMenu.hasClass("active")) {
        openMenu();
    } else {
        closeMenu();
    }
});

$(document).keyup(function (e) {
    if (e.keyCode === 27) {
        closeMenu();
        megaMenu.removeClass("active");
    }
});

let megaMenuSmall = $(".mega__menu-small");
let filtersContent = $(".filters__content");

function openSmallMenu() {
    megaMenuSmall.addClass("active");
}

function closeSmallMenu() {
    megaMenuSmall.removeClass("active");
}

$(".close-nav").on("click", function () {
    hamburger.removeClass("active");
    sidebar.removeClass("active");
    sidebarOverlay.removeClass("active");
});

function openSmallFilter() {
    filtersContent.addClass("active");
    $("body").css("overflow", "hidden");
}

function closeSmallFilter() {
    filtersContent.removeClass("active");
    $("body").css("overflow-y", "auto");
}

// amount counter
function up(id) {
    let amountNumber = $(".amount-number-" + id),
        cnt = parseInt(amountNumber.val()) + 1;
    amountNumber.val(cnt);
    if (id !== "view") {
        $.post("/cart/quantity?id=" + id, { quantity: amountNumber.val() });
    }
    addCartProduct(id);
}

function down(min, id) {
    let amountNumber = $(".amount-number-" + id),
        cnt = Math.max(1, parseInt(amountNumber.val()) - 1);
    amountNumber.val(cnt);
    if (id !== "view") {
        $.post("/cart/quantity?id=" + id, { quantity: cnt });
    }
    removeFromCartProduct(id);
}

function removeFromCart(id, cart = false) {
    $.ajax({
        type: "POST",
        url: "/cart/remove?id=" + id,
        data: { id: id },
        success: function (result) {
            $("#cart-count").text(result);
            //            $("#cart-content").load(location.href + " #cart-content");
            if (cart) {
                $.pjax.reload({ container: "#cart-index" });
            } else {
                $.pjax.reload({ container: "#cart" });
            }
        },
    });
    removeFromCartProduct(id);
}

function g_view_item(id) {
    getProduct(id);
}

function g_add_cart(id) {
    addCartProduct(id);
}

function addToCart(id, tag_id, cart = false) {
    let num = $("#amount-number-" + tag_id).val();
    $.ajax({
        type: "POST",
        url: "/cart/add?id=" + id,
        data: { id: id, quantity: num },
        success: function (result) {
            $("#cart-count").text(result);
            if (cart) {
                $.pjax.reload({ container: "#cart-index" });
            } else {
                $.pjax.reload({ container: "#cart" });
            }
        },
    });
}

function addToCartInView(element, id, tag_id, cart = false) {
    let num = $("#amount-number-" + tag_id).val();
    var language = document.documentElement.lang;
    if ($(window).width() > 992) {
        let addButton = $(element);
        let productImg = addButton.find("img");
        let position = productImg.offset();
        var rt =
            $(window).width() -
            (productImg.offset().left + productImg.outerWidth());
        let cartPosition = $(".header__top__link--cart");
        let cr =
            $(window).width() -
            (cartPosition.offset().left + cartPosition.outerWidth() - 20);

        $.ajax({
            type: "POST",
            url: "/cart/add?id=" + id,
            data: { id: id, quantity: num },
            success: function (result) {
                $("body").append('<div class="floating-cart"></div>');
                var aCart = $("div.floating-cart");
                productImg.clone().appendTo(aCart);
                $(aCart)
                    .css({
                        filter: "invert(57%) sepia(92%) saturate(5252%) hue-rotate(189deg) brightness(101%) contrast(106%)",
                        width: "30px",
                        height: "30px",
                        top: position.top + "px",
                        right: rt + "px",
                    })
                    .fadeIn("slow")
                    .addClass("moveToCart");

                $(aCart).css({
                    top: cartPosition.offset().top + "px",
                    right: cr + "px",
                });

                setTimeout(function () {
                    $("body").addClass("MakeFloatingCart");
                }, 1000);

                setTimeout(function () {
                    $("div.floating-cart").remove();
                    $("body").removeClass("MakeFloatingCart");
                }, 1000);

                $("#cart-count").text(result);
                //                $("#cart-content").load(location.href + " #cart-content");

                if (cart) {
                    $.pjax.reload({ container: "#cart-index" });
                } else {
                    $.pjax.reload({ container: "#cart" });
                }
            },
        });
    } else {
        let messages = {
            ru: {
                title: "РўРѕРІР°СЂ РґРѕР±Р°РІР»РµРЅ РІ РєРѕСЂР·РёРЅСѓ",
                message:
                    "РќР°Р¶РјРёС‚Рµ, С‡С‚Рѕ Р±С‹ РѕС„РѕСЂРјРёС‚СЊ Р·Р°РєР°Р·",
            },
            uz: {
                title: "Mahsulot savatchaga qoК»shildi",
                message: "Savatchaga oК»tish uchun oynani bosing",
            },
            oz: {
                title: "РњР°ТіСЃСѓР»РѕС‚ СЃР°РІР°С‚С‡Р°РіР° Т›СћС€РёР»РґРё",
                message:
                    "РЎР°РІР°С‚С‡Р°РіР° СћС‚РёС€ СѓС‡СѓРЅ РѕР№РЅР°РЅРё Р±РѕСЃРёРЅРі",
            },
        };

        $.ajax({
            type: "POST",
            url: "/cart/add?id=" + id,
            data: { id: id, quantity: num },
            success: function (result) {
                $("#cart-count").text(result);

                if (cart) {
                    $.pjax.reload({ container: "#cart-index" });
                } else {
                    showNotify(
                        "/cart/checkout",
                        messages[language].title,
                        messages[language].message
                    );
                    $.pjax.reload({ container: "#cart" });
                }
            },
        });
    }
}

function addToCartAnim(element, id, tag_id, cart = false) {
    //     g_add_cart(id);
    let num = $("#amount-number-" + tag_id).val();
    var lang = document.documentElement.lang;
    if ($(window).width() > 992) {
        let productCard = $(element)
            .parent()
            .parent()
            .parent()
            .parent()
            .parent();
        let position = productCard.offset();
        let productImg = productCard.find(".swiper-slide-active > img");
        let rt =
            $(window).width() -
            (productCard.offset().left + productCard.outerWidth());
        var cartPosition = $(".header__top__link--cart");
        let cr =
            $(window).width() -
            (cartPosition.offset().left + cartPosition.outerWidth() - 20);
        $.ajax({
            type: "POST",
            url: "/cart/add?id=" + id,
            data: { id: id, quantity: num },
            success: function (result) {
                $("body").append('<div class="floating-cart"></div>');
                var aCart = $("div.floating-cart");
                productImg.clone().addClass("img-fluid").appendTo(aCart);
                $(aCart)
                    .css({
                        top: position.top + "px",
                        right: rt + "px",
                    })
                    .fadeIn("slow")
                    .addClass("moveToCart");

                $(aCart).css({
                    top: cartPosition.offset().top + "px",
                    right: cr + "px",
                });

                setTimeout(function () {
                    $("body").addClass("MakeFloatingCart");
                }, 1000);

                setTimeout(function () {
                    $("div.floating-cart").remove();
                    $("body").removeClass("MakeFloatingCart");
                }, 1000);

                $("#cart-count").text(result);
                //                $("#cart-content").load(location.href + " #cart-content");

                if (cart) {
                    $.pjax.reload({ container: "#cart-index" });
                } else {
                    $.pjax.reload({ container: "#cart" });
                }
            },
        });
    } else {
        let messages = {
            ru: {
                title: "РўРѕРІР°СЂ РґРѕР±Р°РІР»РµРЅ РІ РєРѕСЂР·РёРЅСѓ",
                message:
                    "РќР°Р¶РјРёС‚Рµ, С‡С‚Рѕ Р±С‹ РѕС„РѕСЂРјРёС‚СЊ Р·Р°РєР°Р·",
            },
            uz: {
                title: "Mahsulot savatchaga qoК»shildi",
                message: "Savatchaga oК»tish uchun oynani bosing",
            },
            oz: {
                title: "РњР°ТіСЃСѓР»РѕС‚ СЃР°РІР°С‚С‡Р°РіР° Т›СћС€РёР»РґРё",
                message:
                    "РЎР°РІР°С‚С‡Р°РіР° СћС‚РёС€ СѓС‡СѓРЅ РѕР№РЅР°РЅРё Р±РѕСЃРёРЅРі",
            },
        };
        $.ajax({
            type: "POST",
            url: "/cart/add?id=" + id,
            data: { id: id, quantity: num },
            success: function (result) {
                $("#cart-count").text(result);
                if (cart) {
                    $.pjax.reload({ container: "#cart-index" });
                } else {
                    showNotify(
                        "/cart/checkout",
                        messages[lang].title,
                        messages[lang].message
                    );
                    $.pjax.reload({ container: "#cart" });
                }
            },
        });
    }
}

function addToCompare(id) {
    var ajaxUrl = "/compare/add?id=" + id;

    $.ajax({
        type: "POST",
        url: ajaxUrl,
        data: { id: id },
        success: function (result) {
            let successCompare = $(".success-compare-" + id);
            let buttonElement = $(".add-tocompare-" + id);
            let imageElement = buttonElement.find("img");

            let isAlreadyCompared = imageElement.attr("src").includes("-full");

            if (!isAlreadyCompared) {
                successCompare.show();
                setTimeout(function () {
                    successCompare.hide();
                }, 2000);
            }

            imageElement.attr(
                "src",
                isAlreadyCompared
                    ? "/custom-assets/images/icons/compare_gray.svg"
                    : "/custom-assets/images/icons/compare_gray-full.svg"
            );
        },
    });
}

function removeFromCompare(id, categryId) {
    $.ajax({
        type: "POST",
        url: "/compare/remove?id=" + id,
        data: { id: id },
        success: function (result) {
            let compareBoxDelete = document.querySelector(
                ".compare-box-delete-" + id
            );
            let compareInfoDelete = document.querySelectorAll(
                ".compare-info-" + id
            );
            let allCompareBoxCount = document.querySelectorAll(
                ".compare-box-delete-" + categryId
            );
            if (allCompareBoxCount.length == 1) {
                removeFromCompareCategory(categryId);
            }
            if (allCompareBoxCount.length > 0) {
                compareBoxDelete.remove();
                compareInfoDelete.forEach((item) => {
                    item.remove();
                });
            }
            let imageElement = $(".add-tocompare-" + id).find("img");
            imageElement.attr(
                "src",
                "/custom-assets/images/icons/compare_gray.svg"
            );
        },
    });
}

function removeFromCompareCategory(id) {
    $.ajax({
        type: "POST",
        url: "compare/remove-by-category?id=" + id,
        data: { id: id },
        success: function (result) {
            var categoryList = $(".category_compare");
            var activeIndex;
            categoryList.each(function (index) {
                if ($(this).attr("id") === "delete_list-category-" + id) {
                    activeIndex = index;
                    return false; // exit the loop once found
                }
            });
            document.getElementById(
                "delete_list-category-" + id
            ).style.display = "none";
            document.querySelector(".delete-tab_" + id).style.display = "none";
            if (activeIndex !== undefined) {
                var nextIndex = activeIndex + 1;
                if (nextIndex < categoryList.length) {
                    categoryList.removeClass("_active");
                    categoryList.eq(nextIndex).addClass("_active");
                    $(categoryList.eq(nextIndex).find(".nav-link")).tab("show");
                }
            }
        },
    });
}

function toggleCompare(id) {
    var ajaxUrl = "/compare/add?id=" + id;
    var isAlreadyCompared = $(".add-tocompare-" + id)
        .find("img")
        .attr("src")
        .includes("-full");

    if (isAlreadyCompared) {
        removeFromCompare(id);
    } else {
        addToCompare(id);
    }
}

function setCookie(key, value) {
    let expires = new Date();
    expires.setTime(expires.getTime() + 3600 * 24 * 30); //1 year
    document.cookie = key + "=" + value + ";expires=" + expires.toUTCString();
}

function getCookie(key) {
    let keyValue = document.cookie.match("(^|;) ?" + key + "=([^;]*)(;|$)");
    return keyValue ? keyValue[2] : null;
}

function showNotify(url, title, message, type = "info") {
    $.notify(
        {
            // options
            // icon: 'glyphicon glyphicon-warning-sign',
            title: title,
            message: message,
            url: url,
            target: "_self",
        },
        {
            // settings
            element: "body",
            position: null,
            type: type,
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right",
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            url_target: "_self",
            mouse_over: null,
            animate: {
                enter: "animated fadeInDown",
                exit: "animated fadeOutUp",
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: "class",
            template:
                '<div data-notify="container" class="alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">Г—</button>' +
                '<span style="margin-right: 10px" data-notify="title">{1}</span> ' +
                '<div><span style="margin-right: 10px" data-notify="message">{2}</span></div>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                "</div>" +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                "</div>",
        }
    );
}

function show_modal(id) {
    let url = "/product/quick-view?id=" + id;
    $(".modal-body").load(url);
}

function show_installment(id) {
    $("#installment .modal-content").html("");
    $("#installment .modal-content").load("/product/installment?id=" + id);

    setInterval(() => {
        $("input[type=radio][name='installment']").on("change", function (e) {
            $(this)
                .closest(".i__month")
                .closest(".col-6")
                .closest(".i__months")
                .closest(".modal-body")
                .find(".i__total-price")
                .text($(this).data("value"));
        });
    }, 100);
}

function more_installment() {
    $("#installment .modal-content").html("");
    $("#installment .modal-content").load("/cart/more-installment");
    setInterval(() => {
        $("input[type=radio][name='installment']").on("change", function (e) {
            $(this)
                .closest(".i__month")
                .closest(".col-6")
                .closest(".i__months")
                .closest(".modal-body")
                .find(".i__total-price")
                .text($(this).data("price"));
        });
    }, 100);
}

function not_installment() {
    var url = "/cart/not-installment";
    $("#installment .modal-content").html("");
    $("#installment .modal-content").load(url);
    setInterval(() => {
        $("input[type=radio][name='installment']").on("change", function (e) {
            $(this)
                .closest(".i__month")
                .closest(".col-6")
                .closest(".i__months")
                .closest(".modal-body")
                .find(".i__total-price")
                .text($(this).data("price"));
        });
    }, 100);
}

function show_one_click(id) {
    // $('#one-click .modal-content').html('');
    $("#one-click .modal-body").load("/product/one-click?id=" + id);
    $("#one-click-phone-number").focus();
}

$(document).ready(function () {
    //Open Search
    $(".form-search").click(function (event) {
        $(".instant__results").fadeIn("slow").css("height", "auto");
        event.stopPropagation();
    });

    $("body").click(function () {
        $(".instant__results").fadeOut("500");
    });
});

let typingTimer;
let doneTypingInterval = 500;
let $input = $(".search-input");

//on keyup, start the countdown
$input.keyup(
    delay(function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTyping($(this).val()), doneTypingInterval);
    }, 700)
);

//on keydown, clear the countdown
$input.on("keydown", function () {
    clearTimeout(typingTimer);
});

function delay(callback, ms) {
    var timer = 0;
    return function () {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}

function sanitizeInput(value) {
    // Use a regular expression to remove any HTML tags and JavaScript code
    return value.replace(/<[^>]*>|javascript:|alert\(\)/gi, "");
}

//user is "finished typing," do something
function doneTyping(value) {
    if (sanitizeInput(value) === value) {
        if (value && value.length > 0) {
            $(".instant__results").load(
                "/" +
                    document.documentElement.lang +
                    "/product/list?" +
                    $.param({ key: value })
            );
        } else {
            $(".instant__results").html("");
        }
    }
}

function getMatchingData(data, input) {
    const inputWords = input.toLowerCase().trim().split(/\s+/);
    const results = new Set();
    data.forEach((dataItem) => {
        const dataWords = dataItem.split(/\s+/);
        const normalizedWords = dataWords.map((word) => word.toLowerCase());

        let matchString = [];
        let inputIndex = 0;

        for (let i = 0; i < normalizedWords.length; i++) {
            if (normalizedWords[i].startsWith(inputWords[inputIndex])) {
                matchString.push(dataWords[i]);
                inputIndex++;

                if (inputIndex === inputWords.length) {
                    results.add(matchString.join(" "));
                    break;
                }
            }
        }
    });

    return Array.from(results);
}

function suggestProductNames(value, response) {
    if (value) {
        const suggestions = getMatchingData(response, value);
        renderSuggestions(suggestions);
    }
}

function renderSuggestions(suggestions) {
    const instantResults = document.querySelector(".instant__results");
    const suggestionContainer = instantResults.querySelector(
        ".suggestion-container"
    );

    if (suggestions.length > 0) {
        suggestions.forEach((suggestion) => {
            instantResults.style.display = "block";
            suggestionContainer.classList.remove("d-none");

            const suggestionItem = document.createElement("div");
            suggestionItem.classList.add("suggestion-item");

            const searchIcon = document.createElement("i");
            searchIcon.classList.add("fas");
            searchIcon.classList.add("fa-search");

            const suggestionText = document.createElement("span");
            suggestionText.classList.add("suggestion-text");
            suggestionText.textContent = suggestion;

            suggestionItem.appendChild(searchIcon);
            suggestionItem.appendChild(suggestionText);

            suggestionItem.addEventListener("click", function () {
                document.querySelector("#searchForm .search-input").value =
                    suggestion;
                document
                    .querySelector("#searchForm .header__search__btn")
                    .click();
            });

            suggestionContainer.appendChild(suggestionItem);
        });
    } else {
        suggestionContainer.innerHTML = "";
        suggestionContainer.classList.add("d-none");
    }
}

// login and partner js code
let showPass = 0;
$(".btn-show-pass").on("click", function () {
    if (showPass == 0) {
        $(this).next("input").attr("type", "text");
        $(this).find("i").removeClass("fa-eye");
        $(this).find("i").addClass("fa-eye-slash");
        showPass = 1;
    } else {
        $(this).next("input").attr("type", "password");
        $(this).find("i").removeClass("fa-eye-slash");
        $(this).find("i").addClass("fa-eye");
        showPass = 0;
    }
});

function shareProduct(id) {
    $.ajax({
        url: "/ajax/share-product",
        type: "POST",
        data: { id: id },
    });
}

function showLoader() {
    $("#as__loader").show();
}

function closeLoader() {
    $("#as__loader").hide();
}

var timeout;

function headerLastSearch() {
    document.addEventListener("DOMContentLoaded", function () {
        const searchInputs = document.querySelectorAll(".search-input");
        const maxRecentSearches = 5;

        // Sanitize input
        function sanitizeInput(input) {
            return input.replace(/(<([^>]+)>)/gi, "").trim();
        }

        // Save search query to localStorage
        function saveSearchQuery(query) {
            if (!query.trim()) return;

            let recentSearches = JSON.parse(
                localStorage.getItem("recentSearches") || "[]"
            );
            recentSearches = recentSearches.filter(
                (item) => item.toLowerCase() !== query.toLowerCase()
            );
            recentSearches.push(query);

            if (recentSearches.length > maxRecentSearches) {
                recentSearches.shift();
            }

            localStorage.setItem(
                "recentSearches",
                JSON.stringify(recentSearches)
            );
        }

        // Clear all recent searches
        function clearRecentSearches(customResults) {
            localStorage.removeItem("recentSearches");
            renderRecentSearches(customResults);
        }

        // Remove specific search from localStorage
        function removeSearchItem(query, customResults) {
            let recentSearches = JSON.parse(
                localStorage.getItem("recentSearches") || "[]"
            );
            recentSearches = recentSearches.filter(
                (item) => item.toLowerCase() !== query.toLowerCase()
            );
            localStorage.setItem(
                "recentSearches",
                JSON.stringify(recentSearches)
            );
            renderRecentSearches(customResults);
        }

        // Render recent searches
        // Render recent searches
        function renderRecentSearches(customResults) {
            let messages = {
                recent_searches: {
                    ru: {
                        title: "РџРѕСЃР»РµРґРЅРёРµ Р·Р°РїСЂРѕСЃС‹",
                        message: "",
                    },
                    uz: {
                        title: "SoвЂnggi qidiruvlar",
                        message: "",
                    },
                },
                clear_all: {
                    ru: {
                        title: "РћС‡РёСЃС‚РёС‚СЊ РІСЃРµ",
                        message: "",
                    },
                    uz: {
                        title: "Hammasini tozalash",
                        message: "",
                    },
                },
            };
            const recentSearches = JSON.parse(
                localStorage.getItem("recentSearches") || "[]"
            );
            let suggestionContainer = customResults.querySelector(
                ".custom-suggestion-container"
            );
            if (!suggestionContainer) {
                suggestionContainer = document.createElement("div");
                suggestionContainer.classList.add(
                    "custom-suggestion-container"
                );
                customResults.appendChild(suggestionContainer);
            }

            suggestionContainer.innerHTML = "";

            if (recentSearches.length > 0) {
                customResults.style.display = "block";
                suggestionContainer.classList.remove("d-none");

                // Create flex container for title and clear button
                const headerContainer = document.createElement("div");
                headerContainer.classList.add(
                    "d-flex",
                    "justify-content-between",
                    "align-items-center"
                );

                // Add title
                const title = document.createElement("div");
                title.classList.add("custom-suggestion-title");
                title.textContent =
                    messages["recent_searches"][
                        document.documentElement.lang
                    ].title;
                headerContainer.appendChild(title);

                // Add clear all button
                const clearButton = document.createElement("button");
                clearButton.classList.add("custom-clear-button");
                clearButton.textContent =
                    messages["clear_all"][document.documentElement.lang].title;
                clearButton.addEventListener("click", () =>
                    clearRecentSearches(customResults)
                );
                headerContainer.appendChild(clearButton);

                suggestionContainer.appendChild(headerContainer);

                recentSearches.reverse().forEach((search) => {
                    const suggestionItem = document.createElement("div");
                    suggestionItem.classList.add(
                        "custom-suggestion-item",
                        "d-flex",
                        "justify-content-between",
                        "align-items-center"
                    );

                    const leftContainer = document.createElement("div");
                    leftContainer.classList.add("d-flex", "align-items-center");

                    const searchIcon = document.createElement("i");
                    searchIcon.classList.add("fas", "fa-history");

                    const suggestionText = document.createElement("span");
                    suggestionText.classList.add("custom-suggestion-text");
                    suggestionText.textContent = search;

                    leftContainer.appendChild(searchIcon);
                    leftContainer.appendChild(suggestionText);

                    const removeIcon = document.createElement("i");
                    removeIcon.classList.add("fas", "fa-times", "remove-icon");
                    removeIcon.addEventListener("click", () =>
                        removeSearchItem(search, customResults)
                    );

                    suggestionItem.appendChild(leftContainer);
                    suggestionItem.appendChild(removeIcon);

                    const popularItems = customResults.querySelectorAll(
                        ".popular_request-item"
                    );
                    const inputSearchHeader = customResults
                        .closest(".form-search")
                        .querySelector(".search-input");
                    popularItems.forEach((item) => {
                        item.addEventListener("click", () => {
                            const query = sanitizeInput(item.textContent);
                            if (query) {
                                inputSearchHeader.value = query;
                                saveSearchQuery(query);
                                inputSearchHeader
                                    .closest("form")
                                    .querySelector(".header__search__btn")
                                    .click();
                            }
                        });
                    });

                    suggestionItem.addEventListener("click", function (e) {
                        if (e.target !== removeIcon) {
                            const input = customResults
                                .closest(".form-search")
                                .querySelector(".search-input");
                            input.value = search;
                            saveSearchQuery(search);
                            input
                                .closest("form")
                                .querySelector(".header__search__btn")
                                .click();
                        }
                    });

                    suggestionContainer.appendChild(suggestionItem);
                });
            } else {
                suggestionContainer.classList.add("d-none");
                customResults.style.display = "none";
            }
        }

        // Get matching data
        function getMatchingDataCustom(data, input) {
            const inputWords = input.toLowerCase().trim().split(/\s+/);
            const results = new Set();
            data.forEach((dataItem) => {
                const dataWords = dataItem.split(/\s+/);
                const normalizedWords = dataWords.map((word) =>
                    word.toLowerCase()
                );

                let matchString = [];
                let inputIndex = 0;

                for (let i = 0; i < normalizedWords.length; i++) {
                    if (normalizedWords[i].startsWith(inputWords[inputIndex])) {
                        matchString.push(dataWords[i]);
                        inputIndex++;

                        if (inputIndex === inputWords.length) {
                            results.add(matchString.join(" "));
                            break;
                        }
                    }
                }
            });

            return Array.from(results);
        }

        // Suggest product names
        function suggestProductNamesCustom(value, response) {
            if (value) {
                const suggestions = getMatchingDataCustom(response, value);
                renderSuggestionsCustom(suggestions);
            }
        }

        // Render suggestions
        function renderSuggestionsCustom(suggestions) {
            const customResults = document.querySelector(
                ".custom__search_results"
            );
            let suggestionContainer = customResults.querySelector(
                ".custom-suggestion-container"
            );

            if (!suggestionContainer) {
                suggestionContainer = document.createElement("div");
                suggestionContainer.classList.add(
                    "custom-suggestion-container"
                );
                customResults.appendChild(suggestionContainer);
            }

            suggestionContainer.innerHTML = "";

            if (suggestions.length > 0) {
                customResults.style.display = "block";
                suggestionContainer.classList.remove("d-none");

                suggestions.forEach((suggestion) => {
                    const suggestionItem = document.createElement("div");
                    suggestionItem.classList.add("custom-suggestion-item");

                    const searchIcon = document.createElement("i");
                    searchIcon.classList.add("fas", "fa-search");

                    const suggestionText = document.createElement("span");
                    suggestionText.classList.add("custom-suggestion-text");
                    suggestionText.textContent = suggestion;

                    suggestionItem.appendChild(searchIcon);
                    suggestionItem.appendChild(suggestionText);

                    suggestionItem.addEventListener("click", function () {
                        const input = customResults
                            .closest(".form-search")
                            .querySelector(".search-input");
                        input.value = suggestion;
                        saveSearchQuery(suggestion);
                        input
                            .closest("form")
                            .querySelector(".header__search__btn")
                            .click();
                    });

                    suggestionContainer.appendChild(suggestionItem);
                });
            } else {
                suggestionContainer.innerHTML = "";
                suggestionContainer.classList.add("d-none");
            }
        }

        searchInputs.forEach((input) => {
            const form = input.closest(".form-search");
            const customResults = form.querySelector(".custom__search_results");

            input.addEventListener("focus", function () {
                if (customResults && !this.value.trim()) {
                    customResults.style.display = "block";
                    renderRecentSearches(customResults);
                }
            });

            let typingTimer;
            input.addEventListener("input", function () {
                const hasText = this.value.trim() !== "";
                if (customResults) {
                    if (hasText) {
                        customResults.style.display = "none";
                    } else {
                        customResults.style.display = "block";
                        renderRecentSearches(customResults);
                    }
                }

                clearTimeout(typingTimer);
            });

            input.addEventListener("blur", function () {
                setTimeout(() => {
                    if (customResults) customResults.style.display = "none";
                }, 200);
            });

            form.addEventListener("submit", function (e) {
                const query = input.value.trim();
                if (query) {
                    saveSearchQuery(query);
                }
            });
        });
    });
}

headerLastSearch();

function showStatusNotify(status) {
    var langShowStatusNotify = document.documentElement.lang;
    let text_status = status;
    if (status == "must-login" || status == "incorrect-passport")
        status = "danger";
    let messages = {
        success: {
            ru: {
                title: "РЈСЃРїРµС€РЅРѕ СЃРѕС…СЂР°РЅС‘РЅ",
                massage: "",
            },
            uz: {
                title: "MaКјlumotlar saqlandi",
                massage: "",
            },
            oz: {
                title: "РњР°СЉР»СѓРјРѕС‚Р»Р°СЂ СЃР°Т›Р»Р°РЅРґРё",
                massage: "",
            },
        },
        danger: {
            ru: {
                title: "РћС€РёР±РєР° РІ СЃРѕС…СЂР°РЅРµРЅРёРµ. РџРѕРїСЂРѕР±СѓР№С‚Рµ РїРѕР·Р¶Рµ",
                message: "",
            },
            uz: {
                title: "MaКјlumotlar saqlanmadi. Keyinroq urinib koК»ring",
                message: "",
            },
            oz: {
                title: "РњР°СЉР»СѓРјРѕС‚Р»Р°СЂ СЃР°Т›Р»Р°РЅРґРё. РљРµР№РёРЅСЂРѕТ› СѓСЂРёРЅРёР± РєСћСЂРёРЅРі",
                message: "",
            },
        },
        "must-login": {
            ru: {
                title: "РћС€РёР±РєР° РІ СЃРѕС…СЂР°РЅРµРЅРёРµ. РџРѕР¶Р°Р»СѓР№СЃС‚Р° РІРѕР№РґРёС‚Рµ РІ СЃРёСЃС‚РµРјСѓ",
                message: "",
            },
            uz: {
                title: "MaКјlumotlar saqlanmadi. Avvalo tizimga kirishingiz kerak",
                message: "",
            },
            oz: {
                title: "РњР°СЉР»СѓРјРѕС‚Р»Р°СЂ СЃР°Т›Р»Р°РЅРґРё. РљРµР№РёРЅСЂРѕТ› СѓСЂРёРЅРёР± РєСћСЂРёРЅРі",
                message: "",
            },
        },
        "incorrect-passport": {
            ru: {
                title: "Р’Р°С€Рё РїР°СЃРїРѕСЂС‚РЅС‹Рµ РґР°РЅРЅС‹Рµ РЅРµРІРµСЂРЅС‹",
                message:
                    "Р’РІРµРґРёС‚Рµ СЃРµСЂРёР№РЅС‹Р№ РЅРѕРјРµСЂ РїР°СЃРїРѕСЂС‚Р° Рё РґР°С‚Сѓ СЂРѕР¶РґРµРЅРёСЏ РїСЂР°РІРёР»СЊРЅРѕ",
            },
            uz: {
                title: "Passport ma'lumotlaringiz noto'g'ri",
                message:
                    "Passport seria raqam va tug'ilgan kuningizni to'g'ri kiriting",
            },
            oz: {
                title: "РњР°СЉР»СѓРјРѕС‚Р»Р°СЂ СЃР°Т›Р»Р°РЅРґРё. РљРµР№РёРЅСЂРѕТ› СѓСЂРёРЅРёР± РєСћСЂРёРЅРі",
                message: "",
            },
        },
    };
    $.notify(
        {
            title: messages[text_status][langShowStatusNotify]["title"],
        },
        {
            // settings
            element: "body",
            position: null,
            type: status,
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right",
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            mouse_over: null,
            animate: {
                enter: "animated fadeInDown",
                exit: "animated fadeOutUp",
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: "class",
            template:
                '<div data-notify="container" class="alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">Г—</button>' +
                '<span style="margin-right: 10px" data-notify="title">{1}</span> ' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                "</div>" +
                "</div>",
        }
    );
}

function showStatusPromoNotify(status) {
    var langShowStatusPromoNotify = document.documentElement.lang;
    let text_status = status;
    if (status === "must-login") status = "danger";
    let messages = {
        success: {
            ru: {
                title: "РџСЂРѕРјРѕРєРѕРґ СѓСЃРїРµС€РЅРѕ РґРѕР±Р°РІР»РµРЅ",
                massage: "",
            },
            uz: {
                title: "PromoCode muvaffaqiyatli qo'shildi",
                massage: "",
            },
            oz: {
                title: "РџСЂРѕРјРѕCРѕРґРµ РјСѓРІР°С„С„Р°Т›РёСЏС‚Р»Рё Т›СћС€РёР»РґРё",
                massage: "",
            },
        },
        danger: {
            ru: {
                title: "РџСЂРѕРјРѕРєРѕРґ Р±РѕР»СЊС€Рµ РЅРµ РЅР°Р№РґРµРЅ СЃРЅРѕРІР° РїРѕРїСЂРѕР±СѓР№С‚Рµ РµС‰Рµ СЂР°Р·",
                message: "",
            },
            uz: {
                title: "PromoCode topilmadi qayta urinib ko'ring",
                message: "",
            },
            oz: {
                title: "РџСЂРѕРјРѕCРѕРґРµ С‚РѕРїРёР»РјР°РґРё Т›Р°Р№С‚Р° СѓСЂРёРЅРёР± РєСћСЂРёРЅРі",
                message: "",
            },
        },
        "must-login": {
            ru: {
                title: "РћС€РёР±РєР° РІ СЃРѕС…СЂР°РЅРµРЅРёРµ. РџРѕР¶Р°Р»СѓР№СЃС‚Р° РІРѕР№РґРёС‚Рµ РІ СЃРёСЃС‚РµРјСѓ",
                message: "",
            },
            uz: {
                title: "MaКјlumotlar saqlanmadi. Avvalo tizimga kirishingiz kerak",
                message: "",
            },
            oz: {
                title: "РњР°СЉР»СѓРјРѕС‚Р»Р°СЂ СЃР°Т›Р»Р°РЅРґРё. РљРµР№РёРЅСЂРѕТ› СѓСЂРёРЅРёР± РєСћСЂРёРЅРі",
                message: "",
            },
        },
    };
    $.notify(
        {
            title: messages[text_status][langShowStatusPromoNotify]["title"],
        },
        {
            // settings
            element: "body",
            position: null,
            type: status,
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right",
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            mouse_over: null,
            animate: {
                enter: "animated fadeInDown",
                exit: "animated fadeOutUp",
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: "class",
            template:
                '<div data-notify="container" class="alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">Г—</button>' +
                '<span style="margin-right: 10px" data-notify="title">{1}</span> ' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                "</div>" +
                "</div>",
        }
    );
}

function showPayNotify(status) {
    var langShowStatusPromoNotify = document.documentElement.lang;
    let text_status = status;
    if (status === "must-login") status = "danger";
    let messages = {
        success: {
            ru: {
                title: "OРїР»Р°С‚Р° РїСЂРѕС€Р»Р° СѓСЃРїРµС€РЅРѕ",
                massage: "",
            },
            uz: {
                title: "To'lov muvaffaqiyatli amalga oshirildi",
                massage: "",
            },
        },
        danger: {
            ru: {
                title: "РџР»Р°С‚РµР¶ РЅРµ РІС‹РїРѕР»РЅРµРЅ. РџРѕРІС‚РѕСЂРёС‚Рµ РїРѕРїС‹С‚РєСѓ РїРѕР·Р¶Рµ.",
                message: "",
            },
            uz: {
                title: "To'lov amalga oshmadi, keyinroq qayta urinib ko'ring",
                message: "",
            },
        },
    };
    $.notify(
        {
            title: messages[text_status][langShowStatusPromoNotify]["title"],
        },
        {
            // settings
            element: "body",
            position: null,
            type: status,
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right",
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            mouse_over: null,
            animate: {
                enter: "animated fadeInDown",
                exit: "animated fadeOutUp",
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: "class",
            template:
                '<div data-notify="container" class="alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">Г—</button>' +
                '<span style="margin-right: 10px" data-notify="title">{1}</span> ' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                "</div>" +
                "</div>",
        }
    );
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(".file-upload-image").attr("src", e.target.result);

            $(".image-title").html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        removeUpload();
    }
}

function removeUpload() {
    let input = $("#profileform-avatar");
    $("#if-empty-avatar").val(1);
    input.val("");
    $(".file-upload-image").attr("src", input.data("template"));
}

$(".image-upload-wrap").bind("dragover", function () {
    $(".image-upload-wrap").addClass("image-dropping");
});
$(".image-upload-wrap").bind("dragleave", function () {
    $(".image-upload-wrap").removeClass("image-dropping");
});

var loginWithNumber = $(".login__withnumber");
var loginWithMail = $(".login__withmail");

function withMail() {
    loginWithNumber.hide();
    loginWithMail.show();
}

function withNumber() {
    loginWithMail.hide();
    loginWithNumber.show();
}

$("#pay_card").on("click change", function () {
    $(".pay__with-card").fadeIn();
});

$("#pay_cash").on("click change", function () {
    $(".pay__with-card").fadeOut();
});

$("#pay_balance").on("click change", function () {
    $(".pay__with-card").fadeOut();
});

$("#pay_login").on("click change", function () {
    $(".pay__with-card").fadeOut();
});

var day = document.querySelector("#dayProductCountdown");

function makeTimer() {
    var time = day.getAttribute("data-today");
    var cur = new Date();
    time -= cur.getTime();
    var now = new Date(time);
    time = Math.floor(time / 1000);

    if (time === 0) {
        window.location.reload();
    }

    var days = Math.floor(time / 86400);
    time -= days * 86400;
    var hours = Math.floor(time / 3600);
    time -= hours * 3600;
    var minutes = Math.floor(time / 60);
    time -= minutes * 60;
    var seconds = time;
    if (hours < "10") {
        hours = "0" + hours;
    }
    if (minutes < "10") {
        minutes = "0" + minutes;
    }
    if (seconds < "10") {
        seconds = "0" + seconds;
    }

    $(".day-days").html(days);
    $(".day-hours").html(hours);
    $(".day-minutes").html(minutes);
    $(".day-seconds").html(seconds);
}

if ($("#dayProductCountdown").length > 0)
    setInterval(function () {
        makeTimer();
    }, 1000);

function addToFavourites(elem, product_id) {
    let icon = $(elem).find("img");
    let favourite_elem = document.querySelector("#favourite-count");
    let is_save = 0,
        cnt = parseInt(favourite_elem.textContent);
    if (icon.attr("src") === "/custom-assets/images/icons/heart.svg") {
        is_save = 1;
        icon.attr("src", "/custom-assets/images/icons/heart-full.svg");
        icon.attr("data-value", 1);
    } else {
        icon.attr("src", "/custom-assets/images/icons/heart.svg");
        icon.attr("data-value", -1);
    }

    $.ajax({
        url: "/ajax/add-to-favourite",
        data: { product_id: product_id, save: is_save },
        success: function (result) {
            if (is_save) cnt++;
            else cnt = Math.max(0, --cnt);
            favourite_elem.textContent = cnt.toString();
            // $.pjax.reload({container: "#cart-index"});
        },
    });
}

function removeFromFavourites(product_id) {
    let favourite_elem = document.querySelector("#favourite-count");
    let is_save = 0,
        cnt = parseInt(favourite_elem.textContent);
    $.ajax({
        url: "/ajax/add-to-favourite",
        data: { product_id: product_id, save: is_save },
        success: function (result) {
            if (is_save) cnt++;
            else cnt = Math.max(0, --cnt);
            favourite_elem.textContent = cnt.toString();
            $.pjax.reload({ container: "#favourite-index" });
        },
    });
}

function toScroll(element, defaultAnchorOffset = 0) {
    let anchor = $(element).attr("data-href");

    let anchorOffset = $("." + anchor).attr("data-anchor-offset");
    if (!anchorOffset) anchorOffset = defaultAnchorOffset;

    $("html,body").animate(
        {
            scrollTop: $("." + anchor).offset().top - anchorOffset,
        },
        800
    );
}

$(".chat_widget-button").click(function () {
    $(".chat_widget-content").toggleClass("d-none");
});

$(".chat_widget-close").click(function () {
    $(".chat_widget-content").addClass("d-none");
    $(".chat_widget-types").removeClass("d-none");
    $(".chat_widget-window").addClass("d-none");
});

$(".chat_start_button").click(function () {
    $(".chat_widget-types").addClass("d-none");
    $(".chat_widget-window").removeClass("d-none");
});

$(".chat_hidden_button").click(function () {
    $(".chat_widget-content").addClass("d-none");
});

const inputField = document.getElementById("chatInput");

function autosize() {
    inputField.style.height = "24px";
    inputField.style.height =
        Math.min(100, Math.max(24, inputField.scrollHeight)) + "px";
}

if (inputField) {
    inputField.addEventListener("keydown", function (event) {
        autosize();
    });
}
$(document).ready(function () {
    $(".sort__products-link").on("click", function () {
        var url = $(this).data("href");
        if (url) {
            window.location.href = url;
        }
    });
});
