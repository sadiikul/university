// newsevent slider
var swiper = new Swiper(".newsevent", {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
    },
});
var swiper = new Swiper(".faculties", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
    },
});


// newsevent slider
var swiper = new Swiper(".gallery", {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 10,
        },
    },
});

var swiper = new Swiper(".seminar_slider", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
    },
});

var swiper = new Swiper(".partner_slider", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 10,
        },
        1024: {
            slidesPerView: 5,
            spaceBetween: 10,
        },
    },
});

$(document).ready(function (e) {
    // live handler
    lc_lightbox(".elem", {
        wrap_class: "lcl_fade_oc",
        gallery: true,
        thumb_attr: "data-lcl-thumb",

        skin: "minimal",
        radius: 0,
        padding: 0,
        border_w: 0,
    });
});

$(function () {
    $("span.close").on("click", function () {
        $(this).addClass("d-none");
        $("span.open").removeClass("d-none");
        $("div.marquee").css("transform", "translateY(64px)");
    });

    $("span.open").on("click", function () {
        $(this).addClass("d-none");
        $("span.close").removeClass("d-none");
        $("div.marquee").css("transform", "translateY(0)");
    });

    $("div.arrow_open").on("click", function () {
        $(this).addClass("d-none");
        $("div.arrow_close").removeClass("d-none");
        $("div.flash_news").css("transform", "translateX(0)");
    });

    $("div.arrow_close").on("click", function () {
        $(this).addClass("d-none");
        $("div.arrow_open").removeClass("d-none");
        $("div.flash_news").css("transform", "translateX(226px)");
    });
});

// menu js
var toggler = $(".drp_open");
for (i = 0; i < toggler.length; i++) {
    toggler[i].addEventListener("click", function () {
        this.parentElement
            .querySelector(".dropdown__menu")
            .classList.toggle("actives");
        this.classList.toggle("drp_down");
    });
}
