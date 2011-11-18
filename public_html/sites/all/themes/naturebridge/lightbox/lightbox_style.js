(function ($) {

Drupal.behaviors.initColorboxDefaultStyle = {
  attach: function (context, settings) {
    $(document).bind('cbox_complete', function () {
            
      // Override styles that have been added inline that do not work with our format.
      $("#cboxLoadedContent").attr("style", "overflow-x: visible; overflow-y: visible;");
      $("#cboxClose").attr("style", "");

      // Clone the slideshow pager so it can be wrapped in a div to hide overflow.
      var slides = $("#cboxLoadedContent .field-slideshow-pager").first().clone(true)
      var width = slides.children().length * 75;
      
      // Hide the original pager, but keep it around for later use.
      $("#cboxLoadedContent .field-slideshow-pager").hide();
      
      // Create our wrapper and add the page into it.
      var carousel = "<div id='slide_carousel' style='overflow:hidden;'></div>";
      if ($("#slide_carousel").length > 0){
        $("#slide_carousel").remove();
      }
      $("#cboxLoadedContent .field-slideshow-wrapper").append(carousel);
      $("#slide_carousel").append(slides);
      
      // Add a handler to the thumbnail that will display the title attr in the title element.
      $("#cboxLoadedContent .field-slideshow-pager li a img", context).bind("click",function(){
        $("#image_title").html($(this).attr("title"));
      });
      
      // Adjust width of the pager.
      $("#slide_carousel .field-slideshow-pager").attr("style", "width: " + width + "px;");
      
      // Get the image title and append it to the page on click
      var caption = $("#cboxLoadedContent .field-slideshow-pager li a img").first().attr("title");
      if ($("#image_title", context).length > 0){
        $("#image_title").html(caption);
      } else {
        $("#cboxLoadedContent .field-slideshow-wrapper").after("<h4 id='image_title'>"+ caption +"</h4>");
      }

      // Add controls for scrolling the pager
      var right_button = "<div id='next-page'>Go</div>";
      var left_button = "<div id='last-page'>Go</div>";
      
      if ($("#next-page", context).length == 0){
        $("#slide_carousel").after(right_button);
        $("#next-page", context).bind("click",function(){
          $("#slide_carousel").animate({scrollLeft: "+=475"});
        });
      }
      if ($("#last-page", context).length == 0){
        $("#slide_carousel").after(left_button);
        $("#last-page", context).bind("click",function(){
          $("#slide_carousel").animate({scrollLeft: "-=475"});
        });
      }
      
      
      
      
      // Only run if there is a title.
      if ($('#cboxTitle:empty', context).length == false) {
        setTimeout(function () { $('#cboxTitle', context).slideUp() }, 1500);
        $('#cboxLoadedContent img', context).bind('mouseover', function () {
          $('#cboxTitle', context).slideDown();
        });
        $('#cboxOverlay', context).bind('mouseover', function () {
          $('#cboxTitle', context).slideUp();
        });
      }
      else {
        $('#cboxTitle', context).hide();
      }
    });
  }
};

})(jQuery);
