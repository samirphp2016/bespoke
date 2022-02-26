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


$(document).ready(function(){
    var lastScrollTop = 0, delta = 5;
     $(window).scroll(function(){
		 var nowScrollTop = $(this).scrollTop();
		 if(Math.abs(lastScrollTop - nowScrollTop) >= delta){
            
		 	if (nowScrollTop > lastScrollTop){
                var position = $(this).scrollTop();
				console.log(position);
                if(position > 1180  && position < 1785){
                    $(".Problem-Animation").css("opacity","1");
                }else{
                    $(".Problem-Animation").css("opacity","0");
                }

                if(position > 1780  && position < 2200){
                    $(".Problem-Animation_second").css("opacity","1");
                    /* if(position >= 2150){
                        $(".solution-animation").addClass("active");
                    } */
                }else{
					$(".Problem-Animation_second").css("opacity","0");
					if(position >2200){
						$(".solution-section").addClass("active");
					}
                }
		 	} else {
                var position = $(this).scrollTop();
                if(position > 1200  && position < 1800){
                    $(".Problem-Animation").css("opacity","1");
                }else{
                    $(".Problem-Animation").css("opacity","0");
                }

                if(position > 1800  && position < 2200){
                    $(".Problem-Animation_second").css("opacity","1");
                   /*  if(position > 2000){
                        $(".solution-animation").removeClass("active");
                    } */
                }else{
                    $(".Problem-Animation_second").css("opacity","0");
					if(position <= 2250){						
						$(".solution-section").removeClass("active");
					}
                }
			}
		 lastScrollTop = nowScrollTop;
		}
	 });
});


