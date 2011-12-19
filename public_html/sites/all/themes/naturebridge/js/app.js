jQuery(document).ready(function() {
  jQuery("#twitter-feed").tweet({
    join_text: "auto",
    username: "NatureBridge",
    avatar_size: 48,
    count: 3,
    auto_join_text_default: "", 
    auto_join_text_ed: "",
    auto_join_text_ing: "",
    auto_join_text_reply: "",
    auto_join_text_url: "",
    loading_text: "loading tweets..."
  });
  
  jQuery('.simple-form .form-text').each(function() {
    var $this = jQuery(this);
    if($this.val() === '') {
      $this.val($this.attr('title'));
    }
    $this.focus(function() {
      if($this.val() === $this.attr('title')) {
        $this.val('');
      }
    });
    $this.blur(function() {
      if($this.val() === '') {
        $this.val($this.attr('title'));
      }
    });
  });

  
  jQuery(function(){
    jQuery("#First-Name").validate({
        expression: "if ('VAL' != '' && 'VAL' != 'First Name') return true; else return false;",
        message: "Please enter your first name."
    });
    jQuery("#Last-Name").validate({
        expression: "if ('VAL' != '' && 'VAL' != 'Last Name') return true; else return false;",
        message: "Please enter your last name."
    });
    jQuery("#Email-Address").validate({
        expression: "if ('VAL'.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
        message: "Please enter a valid email."
    });
  });
  
  // For slideshow when they are in displayed in iframes.
  //
  // Clone the slideshow pager so it can be wrapped in a div to hide overflow.
  var slides = jQuery(".field-slideshow-pager").first().clone(true)
  var width = slides.children().length * 75;
  slides.attr("style", "width: " + width + "px;");

  // Hide the original pager, but keep it around for later use.
  jQuery(".field-slideshow-pager").hide();

  // Create our wrapper and add the page into it.
  var carousel = "<div id='slide_carousel' style='overflow:hidden; width: 580px; margin-top: -3px;'></div>";
  if (jQuery("#slide_carousel").length > 0){
    jQuery("#slide_carousel").remove();
  }
  jQuery(".node-type-photo-gallery .field-slideshow-wrapper").append(carousel);
  jQuery("#slide_carousel").append(slides);

  // Add a handler to the thumbnail that will display the title attr in the title element.
  jQuery(".field-slideshow-pager li a img").bind("click",function(){
    jQuery("#image_title").html(jQuery(this).attr("alt") + " " + jQuery(this).attr("title"));
  });

  // Get the image title and append it to the page on click
  var caption = jQuery(".field-slideshow-pager li a img").first().attr("title");
  jQuery(".node-type-photo-gallery .field-slideshow-wrapper").after("<p id='image_title'>" + caption + "</p>");
  
  // Add controls for scrolling the pager
  var right_button = "<div id='next-page'>Go</div>";
  var left_button = "<div id='last-page'>Go</div>";
  
  //If the video is being loaded as a node... update the author field with a label.
  var author = jQuery(".field-name-field-youtubeauthor .field-item").text();
  jQuery(".field-name-field-youtubeauthor .field-item").text("Posted by " + author + ",");

  jQuery("#slide_carousel").after(right_button);
  jQuery("#next-page").bind("click",function(){
    jQuery("#slide_carousel").animate({scrollLeft: "+=475"});
  });

  jQuery("#slide_carousel").after(left_button);
  jQuery("#last-page").bind("click",function(){
    jQuery("#slide_carousel").animate({scrollLeft: "-=475"});
  });
  
  jQuery(".node-type-photo-gallery #page-title").hide();
  
  jQuery(".pane-node-field-inthenews a").click(function(e){
    e.preventDefault();
    parent.document.location.href= jQuery(this).attr("href");
  });
  
  jQuery("#biorecentblogs a").click(function(e){
    e.preventDefault();
    parent.document.location.href= jQuery(this).attr("href");
  });
  
  //Fix for active trail highlighting inner anchor element.
  jQuery("ul.menu a.active").closest("li").attr("class", "active");
  
  // Hide drupal messages
  jQuery(".messages").animate({opacity: 1.0}, 5000);
  jQuery(".messages").fadeOut("slow", function() {
    jQuery(this).remove();
  });
  
  // Resize videos that arent' quite the right size
  jQuery(".view-content div div.media-youtube-outer-wrapper").attr("style", "width: 465px; height: 349px;");
  
  // Fix for views accordion
  jQuery(".views-accordion-header").click(function(e){
    var elementClicked = jQuery(this).parent().prev();
    var destination = jQuery(elementClicked).offset().top;
    jQuery("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination - 75}, 500 );
      return false;
  });
  
  // find the right panel and ajust the height to fill screen. 
  var timeout = setTimeout("adjustBorder()", 1000);
  var timeout2 = setTimeout("adjustSharing()", 1000);
  
  jQuery(".page-search404 #search-form #edit-submit").click(function(e){
    //e.preventDefault();
    var keys = jQuery(".page-search404 #search-form #edit-keys").val();
    var url = "/search/node/" + escape(keys);
    jQuery(".page-search404 #search-form").attr("action", url);
    return true;
  });
});

function adjustBorder(){
  var height = jQuery(".panels-flexible-region-25-center").height();
  jQuery(".panels-flexible-region-25-right").attr("style", "height: " + height + "px;");
  
  var hp_height = jQuery(".panels-flexible-region-21-centermost").height();
  jQuery(".panels-flexible-region-21-rightmost").attr("style", "height: " + (hp_height) + "px;");
}

function adjustSharing(){
  jQuery("#node-1965").fadeIn("slow");
}




