jQuery(function($){
	$(".btn").on("click",function(){
		$(".active").removeClass("active");
		var $btn = $(".btn").index(this);
		$(".image-selection").eq($btn).addClass("active")
	});

	// $(".blog-image").hover(
	// 	function(){
	// 		$(this).animate({"border-radius":"50px"}, 100);
	// },
	// 	function(){
	// 		$(this).animate({"border-radius":"0"}, 100);
	// 	});

	$(".btn").hover(
		function(){
			$(this).animate({"font-size":"1.5em"}, 100);
	},
		function(){
			$(this).animate({"font-size":"1em"}, 100);
		});

  $('.top').click(function(){
    $('html, body').animate({
      'scrollTop': 0
    }, 500);
  });

});