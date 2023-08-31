var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
    breakpoints: {
      640: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      1124: {
        slidesPerView: 3,
        spaceBetween: 10,
      },
    },
  });




  var swiper = new Swiper(".mySwiper2", {
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    loop: true,
    effect: "fade",
    pagination: {
      el: ".swiper-pagination2",
    },
  });