var productNavSlider = new Swiper(".product-nav-slider", {
    calculateHeight: true,
    loop: !1,
    spaceBetween: 10,
    slidesPerView: 5,
    freeMode: !0,
    watchSlidesProgress: !0,
  }),
  productThubnailSlider = new Swiper(".product-thumbnail-slider", {
    autoHeight: true,
    loop: !1,
    spaceBetween: 24,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: productNavSlider,
    },
  });
