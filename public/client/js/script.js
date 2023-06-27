var swiper = new Swiper(".slide-container", {
    slidesPerView: 4,
    spaceBetween: 20,
    sliderPerGroup: 4,
    loop: true,
    centerSlide: true,
    fade: true,
    grabCursor: true,
    autoplay: {
      delay: 4000, // thời gian chờ giữa các slide (mili giây)
      disableOnInteraction: false, // tự động chạy lại sau khi người dùng tương tác với slide
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints: {
      0: {
        slidesPerView: 2,
      },
      520: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      950: {
        slidesPerView: 4,
      },
    },
  });
