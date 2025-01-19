AOS.init();
$(window).scroll(function () {
  if ($(window).scrollTop() >= 50) {
    $("header").addClass("headerSticky");
  } else {
    $("header").removeClass("headerSticky");
  }
});
$("body").click(function (event) {
  var navigation = $(event.target).parents(".navbar").length;
  if (!navigation) {
    $(".navbar .navbar-collapse").collapse("hide");
  }
});

$(".one-time").slick({
  dots: false,
  autoplay: true,
  autoplaySpeed: 5000,
  infinite: true,
  speed: 200,
  slidesToShow: 1,
  adaptiveHeight: true,
  prevArrow: $(".prev"),
  nextArrow: $(".next"),
});
$(".customerSlide").slick({
  autoplay: true,
  infinite: true,
  slidesToShow: 5,
  speed: 2000,
  loop: true,
  arrows: true,
  cssEase: "linear",
  // pauseOnHover: true,
  autoplaySpeed: 1000,
  focusOnSelect: false,
  prevArrow: $(".Cprev"),
  nextArrow: $(".Cnext"),
  responsive: [
    {
      breakpoint: 1008,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
  ],
});
