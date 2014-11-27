//Place all additional javascript functions here
$(document).ready(function(){
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide",
   //    controlNav: false,
			// directionNav: false  
    });
  });

  bodyHeight('.flexslider');
  bodyHeight('.page-template-page-contact-php ');
  $(window).on("resize", bodyHeight('.flexslider'));
  $(window).on("resize", bodyHeight('.page-template-page-contact-php '));
});

function bodyHeight(selector){
  var windowHeight = $(window).height();
  $(selector).height(windowHeight);
}
