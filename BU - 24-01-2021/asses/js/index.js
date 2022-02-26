document.addEventListener("DOMContentLoaded", function () {
  var e = [].slice.call(document.querySelectorAll("img.lazy"));
  if ("IntersectionObserver" in window) {
    let n = new IntersectionObserver(function (e, t) {
      e.forEach(function (e) {
        if (e.isIntersecting) {
          let t = e.target;
          (t.src = t.dataset.src), t.classList.remove("lazy"), n.unobserve(t);
        }
      });
    });
    e.forEach(function (e) {
      n.observe(e);
    });
  }
});

$(".nav__toggle").click(function () {
  $(".site-header__middle").addClass("active");
});
$(".nav_circle").click(function () {
  $(".site-header__middle").removeClass("active");
});

$(".Problem-qna-box-titile").click(function () {
  $(this).next(".Problem-qna-box-pera").toggleClass("active");
});

$(".foo-menu-title").click(function () {
  const value = $(this).attr("data-filter");
  $(".foo-menu")
    .not("." + value)
    .removeClass("active");
  $(".foo-menu")
    .filter("." + value)
    .toggleClass("active");
});

$(".Service-filter-title-box").click(function () {
  const value = $(this).attr("data-filter");
  $(".Service-filter-itme")
    .not("." + value)
    .hide();
  $(".Service-filter-itme")
    .filter("." + value)
    .show();

  $(this).addClass("active").siblings().removeClass("active");
});

// $(document).ready(function(){
//     var lastScrollTop = 0, delta = 5;
//      $(window).scroll(function(){
// 		 var nowScrollTop = $(this).scrollTop();
// 		 if(Math.abs(lastScrollTop - nowScrollTop) >= delta){

// 		 	if (nowScrollTop > lastScrollTop){
//                 var position = $(this).scrollTop();
// 				console.log(position);
//                 if(position > 1180  && position < 1785){
//                     $(".Problem-Animation").css("opacity","1");
//                 }else{
//                     $(".Problem-Animation").css("opacity","0");
//                 }

//                 if(position > 1780  && position < 2200){
//                     $(".Problem-Animation_second").css("opacity","1");
//                     /* if(position >= 2150){
//                         $(".solution-animation").addClass("active");
//                     } */
//                 }else{
// 					$(".Problem-Animation_second").css("opacity","0");
// 					if(position >2200){
// 						$(".solution-section").addClass("active");
// 					}
//                 }
// 		 	} else {
//                 var position = $(this).scrollTop();
//                 if(position > 1200  && position < 1800){
//                     $(".Problem-Animation").css("opacity","1");
//                 }else{
//                     $(".Problem-Animation").css("opacity","0");
//                 }

//                 if(position > 1800  && position < 2200){
//                     $(".Problem-Animation_second").css("opacity","1");
//                    /*  if(position > 2000){
//                         $(".solution-animation").removeClass("active");
//                     } */
//                 }else{
//                     $(".Problem-Animation_second").css("opacity","0");
// 					if(position <= 2250){
// 						$(".solution-section").removeClass("active");
// 					}
//                 }
// 			}
// 		 lastScrollTop = nowScrollTop;
// 		}
// 	 });
// });

$(document).ready(function () {
  var Brand__list = $(".Brand__list-logo");
  Brand__list.owlCarousel({
    nav: false,
    dots: false,
    loop: true,
    autoplay: true,
    autoplayTimeout: 20000,
    responsive: {
      0: {
        margin: 20,
        items: 3,
        autoWidth: false,
      },
      700: {
        items: 3,
        autoWidth: false,
        margin: 50,
      },
      1200: {
        margin: 80,
        items: 6,
      },
      1800: {
        margin: 103,
        autoWidth: true,
      },
    },
  });
  var Protection__Business = $(".Protection-Business-docs");
  Protection__Business.owlCarousel({
    nav: false,
    dots: false,
    loop: true,
    autoplay: true,
    autoplayTimeout: 20000,
    margin: 22,
    autoWidth: true,
    /* center: true, */
  });
  /* $(window).scrollTop();
  console.log($(window).scrollTop( ));
      $(window).scroll(function() {
          var positiontop = $(document).scrollTop()
          if ((positiontop => 1632) && (positiontop <= 2346)) {
              console.log($(window).scrollTop());
              // $("#sa-img-1").css("bottom", "100%")
          }

      }) */
});
