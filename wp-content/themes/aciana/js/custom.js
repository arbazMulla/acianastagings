(function ($) {
  $(document).on("click", ".loadmore", function (e) {
    e.preventDefault();
    var $el = $(this),
      link = $el.attr("href");
    if ($el.attr("disabled")) return;
    $el.addClass("loading").attr("disabled", true);
    $el.find("span").html("Loading...");
    $("<div>").load(link + " #loadmorecontainer", function () {
      $("#loadmorecontainer").append($(this).find("#loadmorecontainer").html());
      $el.parents(".load-more").removeAttr("disabled").remove();
    });
  });
  /**
      Share popup window
    **/
  var popupCenter = function (url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft =
      window.screenLeft !== undefined ? window.screenLeft : screen.left;
    var dualScreenTop =
      window.screenTop !== undefined ? window.screenTop : screen.top;

    var width = window.innerWidth
      ? window.innerWidth
      : document.documentElement.clientWidth
      ? document.documentElement.clientWidth
      : screen.width;
    var height = window.innerHeight
      ? window.innerHeight
      : document.documentElement.clientHeight
      ? document.documentElement.clientHeight
      : screen.height;

    var left = width / 2 - w / 2 + dualScreenLeft;
    var top = height / 3 - h / 3 + dualScreenTop;

    var newWindow = window.open(
      url,
      title,
      "scrollbars=yes, width=" +
        w +
        ", height=" +
        h +
        ", top=" +
        top +
        ", left=" +
        left
    );

    // Puts focus on the newWindow
    if (window.focus) {
      newWindow.focus();
    }
  };
  $(document).on("click", ".share-popup", function (e) {
    var _this = $(this);
    popupCenter(_this.attr("href"), _this.find(".text").html(), 580, 470);
    e.preventDefault();
  });
  $(document).on("click", ".nav-toggle", function (e) {
    $(this).toggleClass("open");
    $("html").toggleClass("nav-open");
    // console.log(e);
  });
  $(".animate-it").addClass("animate-hidden").viewportChecker({
    classToAdd: "animate-visible animated fadeInUp", // Class to add to the elements when they are visible
    offset: 100,
  });
  $(".open-demo-popup").magnificPopup({
    type: "inline",
    midClick: true,
  });
  $(".solution-carousel").slick({
    dots: false,
    infinite: true,
    autoplay: false,
    speed: 500,
    arrows: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    prevArrow:
      '<span class="slick-arrow slick-prev"><i class="icon-angle-left"></i></span>',
    nextArrow:
      '<span class="slick-arrow slick-next"><i class="icon-angle-right"></i></span>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 500,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ],
  });
})(jQuery);

