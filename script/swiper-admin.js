var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
    },
        breakpoints: {
        1200: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        },
    });